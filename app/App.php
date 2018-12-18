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
use app\helpers\GetHelper;
use app\helpers\Router;
use app\models\User;

class App
{
    public $data;
    public $pageName;

    public function run()
    {

        $this->pageName = GetHelper::getValidatedPage($_GET['p']);

        /**
         * Redirects the Get request to Controllers and returns data if data is returned
         * @var data
         */
        $this->data = Router::run();

    }



    public function includePage()
    {
        if(file_exists($this->pageName)){
            require_once $this->pageName;
        }else{
            // TODO : clean this up
            require_once "pages/404.php";
        }
    }
    
}