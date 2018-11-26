<?php


if (true) {

} elseif (false) {

} else {

}

switch ($_GET['test']){
    case 'Hallo':

        break;

    case 'test':

        break;

    default:

        break;
}

try{
    // load users from database
}catch (Exception $e){
    echo $e->getMessage();
}

$ternary = (false) ? 'Hallo' : 'Tschüss';
