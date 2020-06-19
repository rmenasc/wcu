<?php //require "../../mySql.php";

class Database {
  private $conn;
  function __construct($conn) {
    $this->conn = $conn;
  }
  
  function createNewTable($table, $fields) {
    $sql = "CREATE TABLE IF NOT EXISTS " . $table . " ( id integer PRIMARY KEY AUTO_INCREMENT";
    
    $str2 = ");";
    foreach ($fields as $field) {
      $str1 = ", " . $field . " TEXT";
      $sql .= $str1;
    }
    $sql .= $str2;
    $this->conn->query($sql);
  }
  
  function insert($table, $fields, $values) {
     $sql = "INSERT INTO " . $table . " (";
     for ($x = 0; $x < count($fields); $x++) {
       if ($x != 0) {
         $sql .= ", ";
       }
       $sql .= $fields[$x];
     }
     $sql .= ") VALUES (";
     for ($x = 0; $x < count($values); $x++) {
       if ($x != 0) {
         $sql .= " ,";
       } 
       $sql .= "'".$values[$x]."'";
     }
     $sql .= ")";
     if ($this->conn->query($sql) === TRUE) {
       return "New record reated";
     } else {
       return "Error: " . $sql . "<br>" . $this->conn->error;
     }
  }
  
  function getById($table, $id) { 
    $sql = "SELECT * FROM ". $table . " WHERE id = '". $id ."'"; 
    $result = $this->conn->query($sql);
    //$row;
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    } else {
      //return "0";
    } 
    //return $row;
  }
  
  function getByCondition($table, $condition) {
    $sql = "SELECT * FROM ". $table ." WHERE ". $condition;
    $result = $this->conn->query($sql);
    $returnArray;
    $count = 0;
    while($row = $result->fetch_assoc()) {
      $returnArray[$count] = $row;
      $count++;
    }
    return $returnArray;
  }
  
  function update($table, $fields, $values, $id) {
    $sql = "UPDATE ". $table ." SET ";
    for ($x = 0; $x < count($fields); $x++) {
      if ($x != 0) {
        $sql .= " ,";
      }
      $sql .= $fields[$x] ." = '". $values[$x] ."'";
    }
    $sql .= " WHERE id = '". $id ."'";
    if ($this->conn->query($sql) === TRUE) {
      return "Record updated successfully";
    } else {
      return "Error updateing record: " . $conn->error;
    }
  }
  
  function delete($table, $id) {
    $sql = "DELETE FROM ". $table ." WHERE id = '". $id . "'";
    $this->conn->query($sql);
  }

  private function nextId($table) {
    $sql = "SELECT id FROM " . $table . " OREDER BY id DESC LIMIT 1";
    $rs = $this->conn->query($sql);
    $row = $rs->fetch_assoc();
    $lastId = $row['id'] + 1;
    return $lastId;
  }
}
?>