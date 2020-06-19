<?php

class Submission {
  private $id;
  private $title;
  private $grade;
  private $author;
  private $assignmentId;
  private $description;
  private $filePath;
  private $date;
  
  public function __construct($id, $title, $grade, $author, $assignmentId, $description, $filePath, $date) {
    $this->id = $id;
    $this->title = $title;
    $this->grade = $grade;
    $this->author = $author;
    $this->assignmentId = $assignmentId;
    $this->description = $description;
    $this->filePath = $filePath;
    $this->date = $date;
  }
  
  public function getId() {
    return $this->id;
  }
  
  public function getTitle() {
    return $this->title;
  }
  
  public function getGrade() {
    return $this->grade;
  }
  
  public function getAuthor() {
    return $this->author;
  }
  
  public function getAssignmentId() {
    return $this->assignmentId;
  }
  
  public function getDescription() {
    return $this->description;
  }
  
  public function getFilePath() {
    return $this->filePath;
  }
  
  public function getDate() {
    return $this->date;
  }

}
?>