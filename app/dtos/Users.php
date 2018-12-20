<?php

namespace app\dtos;

class Users extends Auth {

  private $id;
  private $email;
  private $created_at;
  private $updated_at;
  private $roles_id;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }


  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
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

  public function getRolesId() {
    return $this->roles_id;
  }

  public function setRolesId($roles_id) {
    $this->roles_id = $roles_id;
  }

}
