<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.12.18
 * Time: 14:32
 */

namespace app\controllers;


use app\App;
use app\dtos\Auth;
use app\dtos\Users;
use app\helpers\Mailer;
use app\helpers\Security;
use app\helpers\Session;
use app\helpers\Status;
use app\models\User;
use app\dtos\PasswordResets;
use PHPMailer\PHPMailer\PHPMailer;

class LoginController
{
    public function __construct()
    {

    }

    public function run()
    {

        switch ($_GET['action'] ?? null) {

            case 'logout':
                session_destroy();
                App::redirect('home');
                break;

            case 'replace_password':

                $pwReset = new PasswordResets();
                $pwReset->setResetHash($_GET['hash']);
                $pwReset->setUserId($_GET['user_id']);

                $model = new \app\models\Auth();

                if ($this->validateResetPasswordForm(array_merge($_POST, $_GET))) {
                    $pwRaw = $_POST['pw'];
                    $pw = password_hash($pwRaw, PASSWORD_DEFAULT, ['cost' => 12]);
                    $user = new Users();
                    $user->setId($pwReset->getUserId());
                    $user->setPasswordPreHashed($pw);
                    if ($model->replacePassword($user)) {
                        Session::setFlash('feedback', 'Passwort erfolgreich geändert');
                        App::redirect('home');
                    }
                } else {
                    $pwReset = $model->getPWResetHash($pwReset);
                    return $pwReset;
                }

                break;

            case 'change_password':
                $pwReset = new PasswordResets();
                $pwReset->setResetHash($_GET['hash']);



                $pwReset = (new \app\models\Auth())->getPWResetHash($pwReset);

                if (count($pwReset) === 0) {
                    App::redirect('login');
                    Session::setFlash('feedback', 'Sorry, irgendwas hat nicht geklappt - bitte kontaktiere den Support!');
                }

                return $pwReset;

                break;

            case 'sendMail':
                $user = new User();
                $match = $user->getUserByEmail($_POST['email']);
                if (!is_null($match)) {
                    $match->setEmail($_POST['email']);
                    $hash = md5($match->getId() . $match->getEmail() . time());

                    if ($user->savePasswordResetHash($match, $hash)) {
                        $mailContent = [$match, $hash];
                        Mailer::sendPasswordResetMail($mailContent);
                        return true;
                    }
                }
                echo "no user found";
                break;

            case 'login':

                // 1. Login form validation
                $auth = $this->validateLoginForm($_POST);

                if ($auth) {

                    $model = new \app\models\Auth();

                    if ($model->authenticate($auth)) {
                        App::redirect('home');
                    } else {
                        App::redirect('login');
                    }

                }


                break;
        }

    }

    /**
     * Validates the Input from Login Formular and returns:
     * 1. if false => false
     * 2. if true Auth object
     * @param array $post
     * @return Auth|bool
     */
    public function validateLoginForm(array $post)
    {
        $auth = new Auth();

        if (!empty($post)) {
            if (!empty($post['username'])) {
                $auth->setUsername($post['username']);
            } else {
                Status::setStatus('username', 'Bitte gib deinen Nutzernamen ein');
            }

            if (!empty($post['password'])) {
                $auth->setPassword($post['password']);
            } else {
                Status::setStatus('password', 'Bitte gib dein Passwort ein');
            }

            if (!Status::hasErrors()) {
                return $auth;
            }
            return false;
        }
    }


    public function validateResetPasswordForm($request)
    {
        $regexpPass = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";

        if ($request['pw'] === '' || $request['pw_retype'] === '') {
            Status::setStatus('pw', 'Bitte gib beide Felder ein');
            return false;
        } else {
            if (preg_match($regexpPass, $request['pw'])) {
                if ($request['pw'] !== $request['pw_retype']) {
                    Status::setStatus('pw', 'Deine Passwörter stimmen nicht überein');
                    return false;
                } else {
                    return true;
                }
            } else {
                Status::setStatus('pw', 'Dein Passwort ist kein gültiges Passwort - bitte beachte die Passwortregeln');
                return false;
            }
        }
    }
}