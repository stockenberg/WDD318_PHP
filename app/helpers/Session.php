<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 23.01.19
 * Time: 15:46
 */

namespace app\helpers;


class Session
{

    public static function init()
    {
        session_name('wdd318');
        session_start();
    }

    public static function setFlash($key, $message)
    {
        $_SESSION[$key] = $message;
    }

    public static function flash($key)
    {
        if(isset($_SESSION[$key])){
            $flash = $_SESSION[$key] ;
            unset($_SESSION[$key]);
            return $flash;
        }

        return null;
    }

    public static function addToCart($item)
    {
        $_SESSION['cart'][] = $item;
    }

    public static function cart()
    {
        return $_SESSION['cart'] ?? null;
    }

}