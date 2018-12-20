<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:24
 */

namespace app\controllers;


use app\models\News;

class HomeController
{
    public function __construct()
    {
        echo "Homepage loaded";
    }

    public function run()
    {
        $model = new News();
        // return $model->getAllNews();
    }
}