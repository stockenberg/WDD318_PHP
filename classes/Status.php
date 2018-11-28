<?php
/**
 *
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 26.11.18
 * Time: 12:12
 */
require 'Kernel.php';

class Status extends Kernel
{
    private $entryCount;
    private static $staticCount;

    public function __construct(Int $count = 0)
    {
        $this->setup();
        $this->setEntryCount($count);
    }

    public function printEntryCount()
    {
        return $this->entryCount;
    }

    public function setEntryCount(Int $number) : Int
    {
        $this->entryCount = $number;
    }

    public static function iamStaticTo()
    {
        echo "test";
    }

    public static function checkMe()
    {
        echo "Hallo!";
        self::iamStaticTo();
        self::$staticCount = 23;
    }
}