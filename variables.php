<?php

$string = "String";
$string2 = 'String';

$float = 2.23;
$int = 2;

$arr = array("key" => "value");

$arr = [5 => "Value"];

$arr = [1,2,3,4,5,6,7,8];

$arr[5]; // 6

$arr = [
    0 => [
        'firstname' => 'Marten',
        'lastname' => 'Stockenberg'
    ],
    1 => [
        //...
    ]
];

$arr[0]['firstname']; // Marten

$arr[] = "Hallo";
$arr[1] = "Hallo";
/*
echo "<pre>";
print_r($arr);
unset($arr[2]);
print_r($arr);
echo "</pre>";
*/

$bool = false;
$null = null;

$bool = $null;
var_dump($bool);



?>
