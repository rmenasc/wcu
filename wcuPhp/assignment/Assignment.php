<?php

class Assignment {
  
  private $id;
  private $title;
  private $details;
  private $dueDate;
  private $course;
  
  public function __construct($id, $title, $details, $dueDate, $course) {
    $this->id = $id;
    $this->title = $title;
    $this->details = $details;
    $this->dueDate = $dueDate;
    $this->course = $course;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getTitle() {
    return $this->title;
  }
  
  public function getDetails() {
    return $this->details;
  }
  
  public function getDueDate() {
    return $this->dueDate;
  }
  
  public function getCourse() {
    return $this->course;
  }

}
?>