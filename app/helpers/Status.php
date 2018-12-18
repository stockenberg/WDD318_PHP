<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.12.18
 * Time: 15:51
 */

namespace app\helpers;


class Status
{

    private static $status = [];

    /**
     * @param $key
     * @return mixed|null
     */
    public static function getStatus($key)
    {
        return self::$status[$key] ?? null;
    }

    /**
     * @param $key
     * @param $value
     */
    public static function setStatus($key, $value): void
    {
        self::$status[$key] = $value;
    }

    /**
     * @return bool
     */
    public static function hasErrors() : bool
    {
        if(!empty(self::$status)){
            return true;
        }
        return false;
    }

}