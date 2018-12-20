<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 20.12.18
 * Time: 15:05
 */

namespace app\models;


use app\dtos\Users;
use app\traits\Database;

class Auth
{

    use Database;

    public function authenticate(\app\dtos\Auth $auth): bool
    {
        // 2. check if username is in database

        /** @var Users $user */
        $user = $this->getUserByUsername($auth->getUsername());

        // BUG: what if no entry was found ?
        // 3. check if password matches
        if ($user) {
            if (password_verify($auth->getPassword(), $user->getPassword())) {

                // 4. write into session logged in = true
                $_SESSION['auth']['id'] = $user->getId();
                $_SESSION['auth']['username'] = $user->getUsername();
                $_SESSION['auth']['role_id'] = $user->getRolesId();
                $_SESSION['auth']['email'] = $user->getEmail();
                return true;
            }
        }
        return false;
    }

    private function getUserByUsername(String $username)
    {
        $sql = 'SELECT username, email, password, roles_id FROM users WHERE username = :username';
        $db = $this->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute([':username' => $username]);

        $res = $stmt->fetchAll(\PDO::FETCH_CLASS, Users::class);
        return $res[0] ?? false;
    }

    public static function isLoggedIn()
    {
        if (isset($_SESSION['auth'])) {
            if (!empty($_SESSION['auth'])) {
                return true;
            }
        }
        return false;
    }

}