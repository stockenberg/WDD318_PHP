<?php

namespace app\dtos;


class ProductsHasCategories {

  private $id;
  private $products_id;
  private $categories_id;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }


  public function getProductsId() {
    return $this->products_id;
  }

  public function setProductsId($products_id) {
    $this->products_id = $products_id;
  }


  public function getCategoriesId() {
    return $this->categories_id;
  }

  public function setCategoriesId($categories_id) {
    $this->categories_id = $categories_id;
  }

}
