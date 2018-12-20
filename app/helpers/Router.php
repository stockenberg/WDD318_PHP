<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.12.18
 * Time: 15:26
 */

namespace app\helpers;


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

            case 'about':
                return "about logic";
                break;

            case 'contact':
                $contact = new ContactController();
                $contact->run();
                break;

            case 'manage_users':
                $user = new UserController();
                $user->run();
                break;

            case 'login':
                $login = new LoginController();
                $login->run();
                break;




            default:
                echo "whatever";
                break;

        }
    }

}