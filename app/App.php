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
use app\helpers\Security;
use app\models\Role;
use app\models\User;

class App
{
    public $data;
    public $pageName;

    /**
     * Root Method to boot the entire Application
     */
    public function run()
    {
        /*
         * Comfort Feature to have Constants by the Name of the Roles
         * e.g. ADMIN = 1, AUTHOR = 2, USER = 3
         */
        $roleModel = new Role();
        $roleModel->buildConstants();

        /*
         * Get the Valid Page from URL
         */
        $this->pageName = GetHelper::getValidatedPage($_GET['p'] ?? null);

        /*
         * Redirects the Get request to Controllers and returns data to the app if data exists
         */
        $this->data = Router::run();

    }

    /**
     * Redirect the user to a given Page
     * @param $page
     */
    public static function redirect($page)
    {
        header('Location: ?p=' . $page);
        exit();
    }

    /**
     * Include valid Page for Navigation
     */
    public function includePage()
    {
        if(file_exists($this->pageName)){
            return $this->pageName;
        }else{
            // TODO : clean this up
            return "pages/404.php";
        }
    }
    
}