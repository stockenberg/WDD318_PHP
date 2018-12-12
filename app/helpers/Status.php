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
     * @return array
     */
    public static function getStatus($key)
    {
        return self::$status[$key] ?? null;
    }

    /**
     * @param array $status
     */
    public static function setStatus($key, $value): void
    {
        self::$status[$key] = $value;
    }



}