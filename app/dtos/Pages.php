<?php

namespace app\dtos;


class Pages {

  private $id;
  private $headline;
  private $content;
  private $created_at;
  private $updated_at;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }


  public function getHeadline() {
    return $this->headline;
  }

  public function setHeadline($headline) {
    $this->headline = $headline;
  }


  public function getContent() {
    return $this->content;
  }

  public function setContent($content) {
    $this->content = $content;
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
