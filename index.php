<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:15
 */

require_once "vendor/autoload.php";

\app\helpers\Session::init();


$whoops = new Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

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
    <!--     BUG : check local asset loading - wtf.. -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

            <?php foreach (\app\helpers\GetHelper::WHITE_LIST['public'] as $param => $niceName) :
                if($param === 'pw_reset' || $param === 'login'){
                    continue;
                }
                ?>
                <li class="nav-item <?= (($_GET['p'] ?? null) === $param) ? 'active' : '' ?>">
                    <a class="nav-link" href="?p=<?= $param ?>"><?= $niceName ?></a>
                </li>
            <?php endforeach; ?>

            <?php if(\app\models\Auth::isLoggedIn()): ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Area</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <?php foreach (\app\helpers\GetHelper::WHITE_LIST['logged_in'] as $param => $niceName) : ?>
                            <a class="dropdown-item" href="?p=<?= $param ?>"><?= $niceName ?></a>
                        <?php endforeach; ?>
                        <a class="dropdown-item" href="?p=login&action=logout">Logout</a>

                    </div>
                </li>


            <?php else:  ?>
                <li class="nav-item <?= (($_GET['p'] ?? null) === 'login') ? 'active' : '' ?>">
                    <a class="nav-link" href="?p=login">Login</a>
                </li>
            <?php endif; ?>


        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<h1><?= \app\helpers\Session::flash('feedback') ?></h1>
<?php \Kint\Kint::dump($_GET, $_POST, $_SESSION); ?>
<main role="main" class="container">
    <div class="row">
    <?php require $app->includePage(); ?>
    </div>
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script src="assets/js/app.js"></script>
<?= \app\helpers\JSHelper::render($_GET['p']); ?>

</body>
</html>
