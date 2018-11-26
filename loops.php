<?php
/**
 * Created by PhpStorm.
 * User: mstockenberg
 * Date: 26.11.18
 * Time: 11:44
 */

for($i = 0; $i < 10; $i++){
    echo $i;
}

$i = 0;

while($i < 10){
    echo $i;
    $i++;
}

do{
    echo $i;
    $i++;
}while($i < 10);

$arr = [
    'key' => 'value',
    'key2' => 'value',
    'key3' => 'value',
    'key4' => 'value',
    'key5' => [
        1,2,3,4,5,6,7,8
    ],
];

foreach ($arr as $key => $value){
    echo $key;

    if(is_array($value)){
        foreach ($value as $key2 => $value2){
            echo $value2;
        }
    }else{
        echo $value;
    }
}