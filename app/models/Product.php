<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 30.01.19
 * Time: 13:55
 */

namespace app\models;


use app\dtos\Products;
use app\traits\Database;

class Product
{
    use Database;

    public function getAllProducts()
    {
        $sql = 'SELECT * FROM products ORDER BY id DESC';
        return Database::getAsArray($sql);
    }

    /**
     * @param Products $product
     * @return bool
     */
    public function store(Products $product)
    {
        $sql = 'INSERT INTO products (title, description) VALUES (:title, :description)';
        $execArr = [':title' => $product->getTitle(), ':description' => $product->getDescription()];

        return Database::set($sql, $execArr);
    }
}