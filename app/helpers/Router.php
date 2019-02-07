<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.12.18
 * Time: 15:26
 */

namespace app\helpers;


use app\App;
use app\controllers\ContactController;
use app\controllers\HomeController;
use app\controllers\LoginController;
use app\controllers\UserController;

class Router
{

    public static function run()
    {
        switch ($_GET['p'] ?? null){

            case 'home':
                $home = new HomeController();
                return $home->run();
                break;

            case 'manage_products':
                JSHelper::set($_GET['p'], 'products');
                break;

            case 'contact':
                $contact = new ContactController();
                $contact->run();
                break;


            case 'manage_users':
            case 'edit_users':
            case 'create_users':
                $user = new UserController();
                return $user->run();
                break;

            case 'pw_reset':
            case 'login':
            case 'change_password':
                $login = new LoginController();
                return $login->run();
                break;

        }
    }

}