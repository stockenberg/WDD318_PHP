<?php

namespace app\dtos;

use app\models\Role;

class Users {

  private $id;
  private $username;
  private $email;
  private $firstname;
  private $lastname;
  private $updated_at;
  private $role_id;
  private $password;
  private $created_at;


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


  public function getFirstname() {
    return $this->firstname;
  }

  public function setFirstname($firstname) {
    $this->firstname = $firstname;
  }


  public function getLastname() {
    return $this->lastname;
  }

  public function setLastname($lastname) {
    $this->lastname = $lastname;
  }


  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }


  public function getRoleId() {
    return $this->role_id;
  }

  public function getRole()
  {
      return Role::getRoleNameById($this->getRoleId());
  }

  public function setRoleId($roles_id) {
    $this->role_id = $roles_id;
  }


  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
  }


  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

}
