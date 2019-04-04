<?php 
  require('connection.php');

  // function to redirect to another page
  function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
  }
  
if (isset($_POST["loginid"]) && isset($_POST["password"])) {
  $sqlquery = "select username, password from student_login where SID = '".$_POST["loginid"]."'";
  $result = $conn->query($sqlquery);
  
  //verifying password
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row["password"] === $_POST["password"]){
    session_start();
    session_regenerate_id();
    $_SESSION['userid'] = $_POST["loginid"];
    $_SESSION['username'] = $row["username"];
    //redirecting to admin dashboard
    redirect('student_corner.php');
    }
    else {
    //invalid password
    redirect('index.php?p=1');
  }
  } else {
    //invalid login id
    redirect('index.php?l=2');
  }
}

  ?>  
