<?php

class School {
  private $id;
  private $name;
  private $dean;
  
  public function __construct($id, $name, $dean) {
    $this->id = $id;
    $this->name = $name;
    $this->dean = $dean;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getName() {
    return $this->name;
  }
  
  public function getDean() {
    return $this->dean;
  }

}
?>