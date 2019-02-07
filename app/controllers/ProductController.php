<?php
/**
 * Created by PhpStorm.
 * User: workstation
 * Date: 30.01.19
 * Time: 15:11
 */

namespace app\controllers;


use app\dtos\Products;
use app\models\Product;

class ProductController
{
    public function run()
    {

        switch ($_GET['action'] ?? ''){
            case 'store':
                $err = $this->validate($_POST);
                if(count($err) > 0){
                    echo json_encode(['status' => '422', 'message' => $err]);
                    return;
                }

                $productObj = new Products();

                $productObj->setTitle(strip_tags($_POST['title']));
                $productObj->setDescription(strip_tags($_POST['description']));

                $product = new Product();
                if($product->store($productObj)){
                    echo json_encode(['status' => 200, 'message' => 'Inhalt wurde gespeichert']);
                }

                break;

            case 'delete':
                $product = new Product();
                if($product->destroy($_GET['id'])){
                    echo json_encode(['status' => 200, 'message'     => 'product was deleted']);
                }
                break;

            case 'get':
                $product = new \app\models\Product();
                echo json_encode($product->getAllProducts());
                break;

            case 'edit':

                $product = new Products();
                $product->setTitle($_POST['title']);
                $product->setDescription($_POST['description']);
                $product->setId($_POST['id']);

                $model = new Product();
                if($model->updateData($product)){
                    echo json_encode([
                        'status' => 200,
                        'message' => 'product edited'
                    ]);

                }

                break;
        }




    }

    public function validate($post)
    {
        $err = [];
        if(!empty($post)){
            foreach ($post as $key => $value){
                if($value === ''){
                    $err[$key] = $key . " feld ist leer";
                }
            }
        }
        return $err;
    }
}