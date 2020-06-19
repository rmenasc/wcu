<?php 
include "Course.php";

class CourseStore {

  const TABLE = "Courses";
  const FIELDS = array("Teacher", "Name", "Active", "Description", "DegreeValue", "Accredited");
  private $db;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  function getCourse($id) {
    $rs= $this->db->getById(self::TABLE, $id);
    $course = new Course($rs['id'], $rs['Teacher'], $rs['Name'], $rs['Active'], $rs['Description'], $rs['DegreeValue'], $rs['Accredited']);
    return $course;
  }
  
  public function getCourses($condition) {
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $courses;
    for ($x = 0; $x < count($results); $x++) {
      $rs = $results[$x];
      $course = new Course($rs['id'], $rs['Teacher'], $rs['Name'], $rs['Active'], $rs['Description'], $rs['DegreeValue'], $rs['Accredited']);
      $courses[$x] = $course;
    }
    return $courses;
  }
  
  function updateCourse($id, $values) {
    $check = $this->db->update(self::TABLE, self::FIELDS, $values, $id);
    echo $check;
    $course = $this->getCourse($id);
    return $course;
  }
  
  function createCourse($values) {
    $this->db->createNewTable(self::TABLE, self::FIELDS);
    $rsCheck = $this->db->insert(self::TABLE, self::FIELDS, $values);
    //add error handling 
    $condition = "";
    for ($x = 0; $x < count(self::FIELDS); $x++) {
      if ($x != 0) {
        $condition .= " AND ";
      }
      $condition .= self::FIELDS[$x] . " = '" . $values[$x] . "'";
    }
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $rs = $results[0];
    $course = $this->getCourse($rs['id']);
    return $course;
  }
  
}