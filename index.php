<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:15
 */

require_once "vendor/autoload.php";

$app = new \app\App();
$app->run();
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
        <a href="?page=home">Home</a>
        <a href="?page=about">About</a>
        <a href="?page=contact">Contact</a>
    </nav>
    <h2>Hallo Website</h2>
    <ul>
        <?php
        /**
         * @var \app\dtos\News $news
         */
        foreach ($app->data as $key => $news) : ?>
            <li><?= $news->getHeadline(); ?> <br> <?= $news->getContent() ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
