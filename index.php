<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:15
 */

require_once "vendor/autoload.php";



$whoops = new Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

$app = new \app\App();
$app->run();

\Kint\Kint::dump($_GET, $_POST);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <nav>
        <a href="?p=home">Home</a>
        <a href="?p=about">About</a>
        <a href="?p=contact">Contact</a>
    </nav>

    <ul>

    </ul>
    <?php $app->includePage(); ?>
</body>
</html>
