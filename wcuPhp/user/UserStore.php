<?php include "User.php";

class UserStore {
  const TABLE = "Users";
  const FIELDS = array("FirstName", "LastName", "GPA", "Photo", "Title");
  private $db;

  function __construct($db) {
    $this->db = $db;
  }
  
  function getUser($id) { 
    $result = $this->db->getById(self::TABLE, $id);
    $user = new User($result['id'], $result['FirstName'], $result['LastName'], $result['GPA'], $result['Photo'], $result['Title']);
    return $user; 
  }
  
  function updateUser($id, $values) {
    $check = $this->db->update(self::TABLE, self::FIELDS, $values, $id);
    echo $check; //add if statement for error handeling with the $result var
    $updatedUser = $this->getUser($id);
    return $updatedUser;
  }
  
  function createUser($values) {
    $this->db->createNewTable(self::TABLE, self::FIELDS);
    $check = $this->db->insert(self::TABLE, self::FIELDS, $values);
    echo $check; // add test statement for error handeling
    $condition = "";
    for ($x = 0; $x < count(self::FIELDS); $x++) {
      if ($x != 0) {
        $condition .= " AND ";
      }
      $condition .= self::FIELDS[$x] ." = '". $values[$x] ."'";
    }
    $results = $this->db->getByCondition(self::TABLE, $condition);
    $rs = $results[0];
    $user = $this->getUser($rs['id']);
    return $user;
  }

}
?>