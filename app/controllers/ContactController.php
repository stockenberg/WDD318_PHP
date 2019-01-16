<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:25
 */

namespace app\controllers;


use app\helpers\Security;

class ContactController
{

    public function run()
    {
        switch ($_GET['action'] ?? null){
            case 'sayHello':
                // print_r($this->validateContactForm($_POST));
                break;
        }
    }

    /*
     * Contact Validation deleted @18.12.18
     */
    
    public function __construct()
    {
       // echo "das ist die contact page";
    }
}