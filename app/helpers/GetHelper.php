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
    const WHITE_LIST = [
        'public' => [
            'about' => 'About Page',
            'home' => 'Home Page',
            'contact' => 'Contact Page',
            'login' => 'Login Page',
            'pw_reset' => '',
            'change_password' => ''
        ],
        'logged_in' => [
            'manage_users' => 'User Management',
            'create_users' => 'Create a new User',
            'edit_users' => 'Update a User',
            'manage_products' => 'Product Management',
        ]
    ];
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
                if(
                    array_key_exists($pageParam, self::WHITE_LIST['public'])
                    || array_key_exists($pageParam, self::WHITE_LIST['logged_in'])
                ) {
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