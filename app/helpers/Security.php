<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 16.01.19
 * Time: 14:24
 */

namespace app\helpers;


use app\App;

class Security
{

    public static function allow(array $userRoles = null, String $to = 'home')
    {
       if(isset($_SESSION['auth'])){
           if($_SESSION['auth']['role_id']){
               if(in_array($_SESSION['auth']['role_id'], $userRoles)){
                   return true;
               }
           }
       }
       App::redirect($to);
    }
    
}