<?php

namespace app\dtos;

class Users {

  private $id;
  private $username;
  private $email;
  private $password;
  private $created_at;
  private $updated_at;
  private $roles_id;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }


  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }


  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }


  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
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
