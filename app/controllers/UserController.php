<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 18.12.18
 * Time: 13:59
 */

namespace app\controllers;


use app\App;
use app\dtos\Users;
use app\helpers\Security;
use app\helpers\Session;
use app\helpers\Status;
use app\models\User;

class UserController
{

    public function run()
    {

        Security::allow([ADMIN, AUTHOR]);

        switch ($_GET['action'] ?? null) {

            // do stuff

            case 'update':

                /** @var Users|bool $userObj */
                $userObj = $this->validate($_POST ?? []);
                if ($userObj) {
                    $user = new User();

                    if ($user->update($userObj, $_GET['id'])) {
                        Session::setFlash('feedback', 'Der User wurde erfolgreich verändert');

                        App::redirect('manage_users');
                    }
                }
                break;

            case 'edit':
                $user = new User();
                $data = $user->getUserById($_GET['id']);

                if(!is_null($data)){
                    return $data;
                }else{
                    App::redirect('manage_users');
                }

                break;

            case 'delete':
                $user = new User();
                if ($user->destroy($_GET['id'])) {
                    Session::setFlash('feedback', 'Der User wurde gelöscht');
                    App::redirect('manage_users');
                }
                break;

            case 'store':

                /** @param Users|bool $user */
                $userObj = $this->validate($_POST ?? []);

                if ($userObj) {
                    $user = new \app\models\User();

                    if ($user->save($userObj)) {
                        Session::setFlash('feedback', 'Der User wurde erfolgreich erstellt');

                        App::redirect('manage_users');
                    }
                }

                // 1.1 generate error messages
                // 2. Submit Data
                break;

            default:
                $userModel = new \app\models\User();
                return $userModel->getAllUsers();
                break;
        }
    }

    /**
     * Gets a POST Array and validates the array to the following outputs:
     * if empty = false
     * if !empty User Object
     * @param array $post
     * @return Users|bool
     */
    private function validate(array $post)
    {
        $user = new Users();
        if (!empty($post)) {

            if ($post['username'] !== '') {
                $user->setUsername($post['username']);
            } else {
                Status::setStatus('username', 'Bitte fülle den Benutzernamen aus');
            }

            if ($post['firstname'] !== '') {
                $user->setFirstname($post['firstname']);
            } else {
                Status::setStatus('firstname', 'Bitte fülle den Vornamen aus');
            }

            if ($post['lastname'] !== '') {
                $user->setLastname($post['lastname']);
            } else {
                Status::setStatus('lastname', 'Bitte fülle den Nachnamen aus');
            }

            if ($post['email'] !== '') {
                if (filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
                    $user->setEmail($post['email']);
                } else {
                    Status::setStatus('email', 'Deine E-Mail-Adresse ist nicht korrekt');
                }
            } else {
                Status::setStatus('email', 'Bitte fülle deine Email-Adresse aus');
            }
            if (isset($post['password'])) {
                if ($post['password'] !== '' AND $post['password_retyped'] !== '') {
                    if ($post['password'] === $post['password_retyped']) {
                        $user->setPassword($post['password']);
                    } else {
                        Status::setStatus('password', 'Deine Passwörter stimmen nicht überein');
                    }
                } else {
                    Status::setStatus('password', 'Bitte gib dein Passwort erneut ein');
                }
            }

            if ($post['role_id'] !== '') {
                $user->setRoleId($post['role_id']);
            } else {
                Status::setStatus('role_id', 'Bitte wähle eine Rechtestufe');
            }
        }

        if (Status::hasErrors()) {
            return false;
        }

        return $user;
    }

}