<?php

class Enrollment {
  private $id;
  private $course;
  private $user;
  private $grade;
  private $active;
  private $date;
  
  public function __construct($id, $course, $user, $grade, $active, $date) {
    $this->id = $id;
    $this->course = $course;
    $this->user = $user;
    $this->grade = $grade;
    $this->active = $active;
    $this->date = $date;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getCourse() {
    return $this->course;
  }
  
  public function getUser() {
    return $this->user;
  }
  
  public function getGrade() {
    return $this->grade;
  }
  
  public function getActive() {
    return $this->active;
  }
  
  public function getDate() {
    return $this->date;
  }
}
?>