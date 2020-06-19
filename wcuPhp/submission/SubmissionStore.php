<?php
include "Submission.php";

class SubmissionStore {
  const TABLE = "Submissions";
  const FIELDS = array("Title", "Grade", "Author", "AssignmentId", "Description", "FilePath", "Date");
  private $db;
  
  public function __construct($db) {
    $this->db = $db;
  }
  
  public function getSubmission($id) {
    $rs = $this->db->getById(self::TABLE, $id);
    $submission = new Submission($rs['id'], $rs['Title'], $rs['Grade'], $rs['Author'], $rs['AssignmentId'], $rs['Description'], $rs['FilePath'], $rs['Date']);
    return $submission;
  }
  
  public function updateSubmission($id, $values) {
    $check = $this->db->update(self::TABLE, self::FIELDS, $values, $id);
    echo $check;
    $submission = $this->getSubmission($id);
    return $submission;
  }
  
  public function createSubmission($values) {
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
    $submission = $this->getSubmission($rs['id']);
    return $submission;
  }

}
?>