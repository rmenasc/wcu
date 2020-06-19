<?php
session_start();
include "../../MySql.php";
include "Database.php";
include "user/UserStore.php";
include "course/CourseStore.php";
include "enrollment/EnrollmentStore.php";
include "block/Block.php";
include "block/UserBlock.php";
include "block/CourseBlock.php";
?>
<!DOCTYPE html>
<html>
<title>WCU</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> ÊMenu</button>
  <span class="w3-bar-item w3-right">WCU</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <?php
      $conn = new MySql();
      $db = new Database($conn->getConn());
      $store = new UserStore($db);
      $user = $store->getUser('1');
      echo "<img src='". $user->getPhoto() ."' class='w3-circle w3-margin-right' style='width:46px'>"
    ." </div>"
    ."  <div class='w3-col s8 w3-bar'>"
    ."  <span>Welcome, <strong>". $user->getFirstName() ."</strong></span><br>";
    ?>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Ê Close Menu</a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-dashboard fa-fw"></i>Ê Overview</a>
    <a href="learn.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book fa-fw"></i>Ê Learn</a>
    <a href="teach.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>Ê Teach</a>
    <a href="library.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>Ê Library</a>
    <a href="transcrpits.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bookmark fa-fw"></i>Ê Transcripts</a>
    <a href="index.php#news" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>Ê News</a>
    <a href="index.php#stats" class="w3-bar-item w3-button w3-padding"><i class="fa fa-compass fa-fw"></i>Ê Stats</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>Ê History</a>
    <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>Ê Settings</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter"><a href="learn.pnp" style="text-decoration:none;">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-book w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
          $conn = new MySql();
          $db = new Database($conn->getConn());
          $store = new EnrollmentStore($db);
          $enrollments = $store->getEnrollments("User = '1'");
          echo "          <h3>". count($enrollments) ."</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Learn</h4>
      </div></a>
    </div>
    <div class="w3-quarter"><a href="teach.php" style="text-decoration:none;">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <?php
          $conn = new MySql();
          $db = new Database($conn->getConn());
          $store = new CourseStore($db);
          $courses = $store->getCourses("Teacher = '1'");
          echo "<h3>". count($courses) ."</h3>";
          ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Learn</h4>
      </div></a>
    </div>
    <div class="w3-quarter"><a href="library.php" style="text-decoration:none;">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-bank w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Library</h4>
      </div></a>
    </div>
    <div class="w3-quarter"><a href="transcripts.php" style="text-decoration:none;">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-bookmark w3-xxxlarge"></i></div>
        <div class="w3-right">
        <?php
        $conn = new MySql();
        $db = new Database($conn->getConn());
        $store = new UserStore($db);
        $user = $store->getUser('1');
        echo "  <h3>GPA:". $user->getGpa() ."</h3>";
        ?>
        </div>
        <div class="w3-clear"></div>
        <h4>Transcripts</h4>
      </div></a>
    </div>
  </div>

  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half" id="txtHint">
        <?php
        $conn = new MySql();
        $db = new Database($conn->getConn());
        $store = new UserStore($db);
        $user = $store->getUser('1');
        $block = new UserBlock();
        $title = "Profile";
        echo $block->getBlock($title, $user);
        ?>
      </div>
      <div class="w3-half">
        <h5>Degrees and Skills</h5>
        <table class="w3-table w3-striped w3-white w3-card-4">
          <tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </table>
      </div>
      <div class="w3-half">
       <?php
       $conn = new MySql();
       $db = new Database($conn->getConn());
       $eStore = new EnrollmentStore($db);
       $cStore = new CourseStore($db);
       $enrollments = $eStore->getEnrollments("User = '1'");
       $courses;
       for ($x = 0; $x < count($enrollments); $x++) {
         $enr = $enrollments[$x];
         $courses[$x] = $cStore->getCourse($enr->getCourse());
       }
       $block = new CourseBlock();
       $title = "Enrollments";
       echo $block->getBlock($title, $courses);
       ?>
      </div>
      <div class="w3-half">
        <?php 
        $conn = new MySql();
        $db = new Database($conn->getConn());
        $store = new CourseStore($db);
        $courses = $store->getCourses("Teacher = '1'");
        $block = new CourseBlock();
        $title = "Teaching";
        echo $block->getBlock($title, $courses);
        ?>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Ratings</h5>
    <p>Submission Rating</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
    </div>

    <p>Teacher Rating</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
    </div>

    <p>Completion rate</p>
    <div class="w3-grey">
      <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
    </div>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Comments</h5>
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
        <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>

    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
      </div>
      <div class="w3-col m10 w3-container">
        <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      </div>
    </div>
  </div>
  <br>
  <div class="w3-container w3-dark-grey w3-padding-32">
    <div class="w3-row">
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-green">Demographic</h5>
        <p>Language</p>
        <p>Country</p>
        <p>City</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-red">System</h5>
        <p>Browser</p>
        <p>OS</p>
        <p>More</p>
      </div>
      <div class="w3-container w3-third">
        <h5 class="w3-bottombar w3-border-orange">Target</h5>
        <p>Users</p>
        <p>Active</p>
        <p>Geo</p>
        <p>Interests</p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

function showBlock(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "MyPhpRequest.php?type=user&id=" + str, true);
        xmlhttp.send();
    }
}

</script>

</body>
</html>