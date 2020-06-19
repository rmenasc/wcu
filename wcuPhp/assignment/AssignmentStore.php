<?php
include "Assignment.php";

class AssignmentStore {
  const TABLE = "Assignments";
  const FIELDS = array("Title", "Details", "DueDate", "Course");
  private $db;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function getAssignment($id) {
    $rs = $this->db->getById(self::TABLE, $id);
    $assignment = new Assignment($rs['id'], $rs['Title'], $rs['Details'], $rs['DueDate'], $rs['Course']);
    return $assignment;
  }
  
  public function updateAssignment($id, $values) {
    $check = $this->db->update(self::TABLE, self::FIELDS, $values, $id);
    echo $check;
    $assignment = $this->getAssignment($id);
    return $assignment;
  }
  
  public function createAssignment($values) {
    $this->db->createNewTable(self::TABLE, self::FIELDS);
    $check = $this->db->insert(self::TABLE, self::FIELDS, $values);
    echo $check;
    $condition = "";
    for ($x = 0; $x < count(self::FIELDS); $x++) {
      if ($x != 0) {
        $condition .= " AND ";
      }
      $condition .= self::FIELDS[$x] . " = '" . $values[$x] . "'";
    }
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $rs = $results[0];
    $assignment = $this->getAssignment($rs['id']);
    return $assignment;
  }
}
?>