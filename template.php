<?php
// database connection
// fetch user

$desc = "this is a description";
$users = ['Marten', 'Thomas', 'Felix', 'Hannes', 'Tom'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="<?= $desc; ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <?php include_once 'includes/userlist.php'; ?>
    <?php include 'includes/userlist.php'; ?>
    <?php require 'includes/userlist.php'; ?>
    <?php require_once 'includes/userlist.php'; ?>
</body>
</html>