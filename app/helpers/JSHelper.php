<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 06.02.19
 * Time: 14:48
 */

namespace app\helpers;


class JSHelper
{
    private static $arr = [];


    public static function set($page, $scripts)
    {
        self::$arr[$page][] = $scripts;
    }


    public static function render($currentPage)
    {

        $output = '';

        if (!empty(self::$arr)) {
            foreach (self::$arr[$currentPage] as $script) {
                $output .= '<script src="assets/js/' . $script . '.js"></script>';
            }
        }
        return $output;
    }

}