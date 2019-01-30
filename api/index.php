<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 30.01.19
 * Time: 13:52
 */

require_once '../vendor/autoload.php';

switch ($_GET['ressource']) {
    case 'products':
        $productController = new \app\controllers\ProductController();
        $productController->run();
        break;
}