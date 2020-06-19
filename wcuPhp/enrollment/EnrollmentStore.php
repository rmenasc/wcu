<?php
include "Enrollment.php";

class EnrollmentStore {
  const TABLE = "Enrollments";
  const FIELDS = array("Course", "User", "Grade", "Active", "Date");
  private $db;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function getEnrollment($id) {
    $rs = $this->db->getById(self::TABLE, $id);
    $enrollment = new Enrollment($rs['id'], $rs['Course'], $rs['User'], $rs['Grade'], $rs['Active'], $rs['Date']);
    return $enrollment;
  }
  
  public function getEnrollments($condition) {
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $enrollments;
    for ($x = 0; $x < count($results); $x++) {
      $rs = $results[$x];
      $enrollments[$x] = $this->getEnrollment($rs['id']);
    }
    return $enrollments;
  }
  
  public function updateEnrollment($id, $values) {
    $check = $this->db->update(self::TABLE, self::FIELDS, $values, $id);
    echo $check;
    $enrollment = $this->getEnrollment($id);
    return $enrollment;
  }
  
  public function createEnrollment($values) {
    $this->db->createNewTable(self::TABLE, self::FIELDS);
    $check = $this->db->insert(self::TABLE, self::FIELDS, $values);
    echo $check;
    $condition = "";
    for ($x = 0; $x < count($values); $x++) {
      if ($x != 0) {
        $condition .= " AND ";
      }
      $condition .= self::FIELDS[$x] . " = '" . $values[$x] . "'";
    }
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $rs = $results[0];
    $enrollment = $this->getEnrollment($rs['id']);
    return $enrollment;
  }
}
?>