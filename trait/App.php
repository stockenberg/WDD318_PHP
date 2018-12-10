<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:34
 */

require_once "Database.php";

class App
{
    use Database;

    public function __construct()
    {
        $this->getStuf();
    }
}