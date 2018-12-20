<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:15
 */

require_once "vendor/autoload.php";

// TODO : find a better spot for it
session_name('wdd318');
session_start();


$whoops = new Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

$app = new \app\App();
$app->run();

\Kint\Kint::dump($_GET, $_POST, $_SESSION);
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

    <?php if(\app\models\Auth::isLoggedIn()): ?>
        <h2>Du bist eingeloggt</h2>
    <?php endif; ?>
    <nav>
        <a href="?p=home">Home</a>
        <a href="?p=about">About</a>
        <a href="?p=contact">Contact</a>

        <?php if(\app\models\Auth::isLoggedIn()): ?>
            <a href="?p=login&action=logout">Logout</a>
        <?php else:  ?>
            <a href="?p=login">Login</a>
        <?php endif; ?>
    </nav>

    <ul>

    </ul>
    <?php $app->includePage(); ?>
</body>
</html>
