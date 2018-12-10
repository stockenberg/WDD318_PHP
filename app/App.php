<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:16
 */

namespace app;

use app\controllers\AboutController;
use app\controllers\ContactController;
use app\controllers\HomeController;

class App
{
    public $data;

    public function run()
    {
        echo "PHP läuft";

        $page = $_GET['page'];

        // routing
        switch ($page){
            case 'home':
                $home = new HomeController();
                $this->data = $home->run();
                break;

            case 'about':
                $about = new AboutController();
                break;

            case 'contact':
                $contact = new ContactController();
                $contact->run();
                break;
        }

    }


    
}