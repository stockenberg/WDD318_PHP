<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 18.12.18
 * Time: 13:59
 */

namespace app\controllers;


use app\dtos\User;
use app\dtos\Users;
use app\helpers\Security;
use app\helpers\Status;

class UserController
{

    public function run()
    {
        Security::allow([ADMIN, AUTHOR]);
        switch ($_GET['action'] ?? null) {

            // do stuff
            case 'save':

                /** @param User|bool $user */
                $userObj = $this->validate($_POST ?? []);

                if ($userObj) {
                    $user = new \app\models\User();
                    if ($user->save($userObj)) {
                        header('Location: ?p=manage_users');
                        exit();
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
     * @return User|bool
     */
    private function validate(array $post)
    {
        // TODO : Fix broken user
        $user = new Users();
        if (!empty($post)) {
            if ($post['firstname'] !== '') {
                $user->setFirstname($post['firstname']);
            } else {
                Status::setStatus('firstname', 'Bitte fülle deinen Vornamen aus');
            }

            if ($post['lastname'] !== '') {
                $user->setLastname($post['lastname']);
            } else {
                Status::setStatus('lastname', 'Bitte fülle deinen Nachnamen aus');
            }

            if ($post['email'] !== '') {
                $user->setEmail($post['email']);
                // TODO : do a more complex email validation duddde;
            } else {
                Status::setStatus('email', 'Bitte fülle deine Email-Adresse aus');
            }
        }

        if (Status::hasErrors()) {
            return false;
        }

        return $user;
    }

}