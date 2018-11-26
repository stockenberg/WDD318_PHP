<?php

/**
 * This function is awesome
 * @param String $string
 * @param Int $int
 * @param mixed ...$test
 * @return String
 */
function myFunction (String $string, Int $int = 2, ...$test) : String
{

    print_r($test);
    
    function test () {
        echo "Hallo";
    }

    test(); 
    
    return $string . $int;
}
myFunction("Hallo", 2);
$test = "myFunction";
$test();