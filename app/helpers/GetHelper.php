<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.12.18
 * Time: 14:44
 */

namespace app\helpers;


use app\interfaces\GetHelperInterface;

class GetHelper implements GetHelperInterface
{
    /**
     * Config
     */
    const HOME_PAGE = "home";
    const WHITE_LIST = ['about', 'home', 'contact', 'manage_users', 'login'];
    const ERROR_PAGE = "404";
    const PATH = "pages/";
    const EXT = ".php";
    const validAction = ['home' => ['read', 'delete'], 'about' => ['edit']];

    /**
     * Get the validated GET[p] parameter as Pagename
     * @param string $pageParam
     * @return string
     */
    public static function getValidatedPage($pageParam): string
    {
        if (isset($pageParam)) {
            if (!empty($pageParam)) {
                if(in_array($pageParam, self::WHITE_LIST)){
                    return self::PATH . $pageParam . self::EXT;
                }
                return self::PATH . self::ERROR_PAGE . self::EXT;
            }
            return self::PATH . self::HOME_PAGE . self::EXT;
        }
        return self::PATH . self::HOME_PAGE . self::EXT;
    }

    /**
     * checks if a given action is allowed
     * returns true if action is allowed
     * @param string $actionParam
     * @param string $pageParam
     * @return bool
     */
    public static function isValidAction(string $actionParam, string $pageParam): bool
    {
        if(isset($actionParam)){
            if(!empty($actionParam)){
                if(in_array($actionParam, self::validAction[$pageParam])){
                    return true;
                }
            }
        }
        return false;
    }


}