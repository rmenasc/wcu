<?php
    //start session
    session_start();
    require "../../mySql.php";
    include "user/UserStore.php";
    
    $id = $_POST['user'];
    echo $id;
    $db = new Database($conn);
    $uStore = new UserStore($db);
    $user = $uStore->getUser($id);
    $test = $user->getId();
    echo $test;
    if ($test != null) {
      $_SESSION['user'] = $user->getId();
       header("Location: http://10.0.0.111/wcuPhp/index.php");
    }
    $conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>WCU</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles/singleBlock.css">
</head>
<body style="font-family:Verdana;color:#aaaaaa;" onload="wrong()">

<div style="background-color:#e5e5e5;padding:15px;text-align:center;">
  <h1></h1>
</div>
<div style="overflow:auto;">
  <div class="main">

  </div>

</div>
<div style="background-color:#e5e5e5;text-align:center;padding:10px;margin-top:7px;">World Community University footer</div>

</body>
<script>
function wrong() {
    alert("Incorrect login, try again");
    //window.location.assign("login.html");
}
</script>
</html>

