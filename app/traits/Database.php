<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.12.18
 * Time: 13:41
 */

namespace app\traits;

trait Database {

    public static function connect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=wdd318;charset=utf8',
            'homestead', 'secret');
        return $db;
    }

}