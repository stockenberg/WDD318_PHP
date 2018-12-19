<?php

namespace app\dtos;

class Categories {

  private $id;
  private $value;
  private $created_at;
  private $updated_at;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }


  public function getValue() {
    return $this->value;
  }

  public function setValue($value) {
    $this->value = $value;
  }


  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }


  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }

}
