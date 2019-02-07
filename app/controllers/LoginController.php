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
use app\helpers\Status;
use app\models\User;
use PHPMailer\PHPMailer\PHPMailer;

class LoginController
{
    public function __construct()
    {

    }

    public function run()
    {

        switch ($_GET['action'] ?? null){

            case 'logout':

                session_destroy();
                App::redirect('home');
                break;

            case 'change_password':
                $regexp = "^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$";
                // validate password  
                // check password against regexp
                // reset password in database
                // return user to login form
                // message user -> change of password is done
                break;

            case 'sendMail':
                $user = new User();
                $match = $user->getUserByEmail($_POST['email']);
                if(!is_null($match)){
                    $match->setEmail($_POST['email']);
                    $hash = md5($match->getId() . $match->getEmail() . time());
                    $userModel = new User();
                    if($userModel->savePasswordResetHash($match, $hash)){
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

                if($auth){

                    $model = new \app\models\Auth();

                    if($model->authenticate($auth)){
                        App::redirect('home');
                    }else{
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

        if(!empty($post)){
            if(!empty($post['username'])){
                $auth->setUsername($post['username']);
            }else{
                Status::setStatus('username', 'Bitte gib deinen Nutzernamen ein');
            }

            if(!empty($post['password'])){
                $auth->setPassword($post['password']);
            }else{
                Status::setStatus('password', 'Bitte gib dein Passwort ein');
            }

            if(!Status::hasErrors()){
                return $auth;
            }
            return false;
        }
    }
}