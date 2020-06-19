<?php

class Course {
  private $id;
  private $teacher;
  private $name;
  private $active;
  private $description;
  private $degreeValue;
  private $accredited;
  
  public function __construct($id, $teaher, $name, $active, $description, $degreeValue, $accredited) {
    $this->id = $id;
    $this->teacher = $teacher;
    $this->name = $name;
    $this->active = $active;
    $this->description = $description;
    $this->degreeValue = $degreeValue;
    $this->accredited = $accredited;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getTeacher() {
    return $this->teacher;
  }
  
  function getName() {
    return $this->name;
  }
  
  function getActive() {
    return $this->active;
  }
  
  function getDescription() {
    return $this->description;
  }
  
  function getDegreeValue() {
    return $this->degreeValue;
  }
  
  function getAccredited() {
    return $this->accredited;
  }
  
}
?>
  