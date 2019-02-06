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

    /**
     * @return array
     */
    public function getAllProducts()
    {
        $sql = 'SELECT * FROM products ORDER BY id DESC';
        return Database::getAsArray($sql);
    }

    /**
     * Deletes a Product
     * @param $id
     * @return bool
     */
    public function destroy($id)
    {
        $SQL = 'DELETE FROM products WHERE id = :id';
        return Database::set($SQL, [':id' => $id]);
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

    public function updateData (Products $products) {
        $sql = 'UPDATE products SET title = :title, description = :description WHERE id = :id';
        $execArr = [
            ':title' => $products->getTitle(),
            ':description' => $products->getDescription(),
            ':id' => $products->getId()
        ];
        return Database::set($sql, $execArr);
    }
}