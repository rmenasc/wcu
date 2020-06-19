<?php
include "School.php";

class SchoolStore {
  const TABLE = "Schools";
  const FIELDS = array("Name", "Dean");
  private $db;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function getSchool($id) {
    $rs = $this->db->getById(self::TABLE, $id);
    $school = new School($rs['id'], $rs['Name'], $rs['Dean']);
    return $school;
  }
  
  public function getSchools($condition) {
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $schools;
    for ($x = 0; $x < count($results); $x++) {
      $rs = $results[$x];
      $schools[$x] = $this->getSchool($rs['id']);
    }
    return $schools;
  }
  
  public function updateSchool($id, $values) {
    $check = $this->db->update(self::TABLE, self::FIELDS, $values, $id);
    echo $check;
    $school = $this->getSchool($id);
    return $school;
  }
  
  public function createSchool($values) {
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
    $school = $this->getSchool($rs['id']);
    return $school;
  }

}
?>