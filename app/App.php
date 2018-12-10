<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:16
 */

namespace app;

use app\controller\AboutController;
use app\controller\ContactController;
use app\controller\HomeController;

class App
{

    public function run()
    {
        echo "PHP läuft";

        $page = $_GET['page'];

        // routing
        switch ($page){
            case 'home':
                $home = new HomeController();
                break;

            case 'about':
                $about = new AboutController();
                break;

            case 'contact':
                $contact = new ContactController();
                break;
        }

    }


    
}