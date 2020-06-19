<?php 
require "../../MySql.php"; 
require "user/UserStore.php";
require "block/CourseBlock.php";
require "course/CourseStore.php";
require "Database.php";

$connSet = new MySql();
$db = new Database($connSet->getConn());
//$uStore = new UserStore($db);

$cStore = new CourseStore($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "test";
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $type = $_GET['type'];
  $id = $_GET['id'];
  if ($type == "user") {
    $condition = "Teacher = '" . $id . "'";
    $courses = $cStore->getCourses($condition);
    $block = new CourseBlock();
    $title = "Courses";
    echo $block->getBlock($title, $courses);
    //$response = doGetUser($id, $uStore, $db);
    //echo $response;
   
  }/** else if ($type == "getCourse") {
    $course = $uCourse->getCourse($id);
    echo = $course->getName();
  }*/
}
/**
function doGetUser($id, $uStore, $db) {
  $user = $uStore->getUser($id);
   $block = new CourseBlock();
   $title = "User";
   $response = $block->getBlock($title, $user);
  return $response;
}*/

?>