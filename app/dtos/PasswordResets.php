<?php

namespace app\dtos;

class PasswordResets {

  private $id;
  private $user_id;
  private $reset_hash;
  private $updated_at;
  private $created_at;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }


  public function getUserId() {
    return $this->user_id;
  }

  public function setUserId($user_id) {
    $this->user_id = $user_id;
  }


  public function getResetHash() {
    return $this->reset_hash;
  }

  public function setResetHash($reset_hash) {
    $this->reset_hash = $reset_hash;
  }


  public function getUpdatedAt() {
    return $this->updated_at;
  }

  public function setUpdatedAt($updated_at) {
    $this->updated_at = $updated_at;
  }


  public function getCreatedAt() {
    return $this->created_at;
  }

  public function setCreatedAt($created_at) {
    $this->created_at = $created_at;
  }

}
