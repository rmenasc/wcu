<?php
class User {
  private $id;
  private $firstName;
  private $lastName;
  private $gpa;
  private $photo;
  private $title;
  
  function __construct($id, $firstName, $lastName, $gpa, $photo, $title) {
    $this->id = $id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->gpa = $gpa;
    $this->photo = $photo;
    $this ->title = $title;
  }
  
  function getId() {
    return $this->id;
  }
  
  function getFirstName() {
    return $this->firstName;
  }
  
  function getLastName() {
    return $this->lastName;
  }
  
  function getGpa() {
    return $this->gpa;
  }
  
  function getPhoto() {
    return $this->photo;
  }
  
  function getTitle() {
    return $this->title;
  }

}
?>