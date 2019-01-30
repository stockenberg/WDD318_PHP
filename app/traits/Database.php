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

    public static function getAsObjArr($sql, $FQCN, $execArray = [])
    {
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute($execArray);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, $FQCN);
    }

    public static function getAsArray($sql, $execArray = [])
    {
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute($execArray);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function getAsObj($sql, $FQCN, $execArray = [])
    {
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute($execArray);
        return $stmt->fetchObject($FQCN);
    }

    public static function set($sql, $execArray = [])
    {
        $db = Database::connect();
        $stmt = $db->prepare($sql);
        return $stmt->execute($execArray);
    }

}