<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 12.12.18
 * Time: 14:40
 */

namespace app\interfaces;


interface GetHelperInterface
{
    /**
     * Get the validated GET[p] parameter as Pagename
     * @param string $pageParam
     * @return string
     */
    public static function getValidatedPage($pageParam) : string;

    /**
     * checks if a given action is allowed
     * returns true if action is allowed
     * @param string $actionParam
     * @param string $pageParam
     * @return bool
     */
    public static function isValidAction(string $actionParam, string $pageParam) : bool;
}