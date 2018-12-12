<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:25
 */

namespace app\controllers;


use app\dtos\User;
use app\helpers\Status;

class ContactController
{

    public function run()
    {
        switch ($_GET['action'] ?? null){
            case 'sayHello':
                print_r($this->validateContactForm($_POST));
                break;
        }
    }

    public function validateContactForm(array $post) : User
    {

        $user = new User();

        if(!empty($post)){
            if(empty($post['firstname'])){
                Status::setStatus('firstname', 'Deine Eingabe ist Leer');
            }else {
                $user->setFirstname($post['firstname']);
            }

            if(empty($post['lastname'])){
                Status::setStatus('lastname', 'Deine EIngabe ist leer');
            }else{
                $user->setLastname($post['lastname']);
            }
        }

        return $user;
    }
    
    public function __construct()
    {
        echo "das ist die contact page";
    }
}