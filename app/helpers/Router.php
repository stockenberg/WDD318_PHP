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

            default:
                echo "whatever";
                break;

        }
    }

}