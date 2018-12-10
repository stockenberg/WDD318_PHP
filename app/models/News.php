<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 10.12.18
 * Time: 11:47
 */

namespace app\models;


class News
{


    public function  getAllNews()
    {
        $news = new \app\dtos\News();
        $news->setId(1);
        $news->setHeadline("OOP MVC is in da house!");
        $news->setContent("lorem ipsum zeuch");
        $news->setCreatedAt("10.12.2018 12:00:30");
        // verbindung mit db
        // sql -> select * from news
        return [$news];
    }
}