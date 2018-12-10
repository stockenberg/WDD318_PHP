<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:39
 */

spl_autoload_register(function($class){
   require_once str_replace('\\', '/', $class) . ".php";
});