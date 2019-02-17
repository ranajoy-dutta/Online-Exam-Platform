<?php 
  require('connection.php');

  // function to redirect to another page
  function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
  }

  //extracting password from database
  if (isset($_POST["loginid"]) && isset($_POST["password"])) {
  $sqlquery = "select username, password from student_login where SID = '".$_POST["loginid"]."'";
  $result = $conn->query($sqlquery);

  //verifying password
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row["password"] === $_POST["password"]){
      session_start();
      session_regenerate_id();
      $_SESSION['username'] = $row["username"];
      echo 'Please wait! You are being redirecting!';
      //redirecting to student dashboard
      redirect('student_corner.php');
    }
    else {
      //invalid password
      echo '<script language="javascript">';
      echo 'alert("Invalid Credentials!")';
      echo '</script>';
      redirect('index.php');
  }
  } else {
    //invalid login id
    echo '<script language="javascript">';
    echo 'alert("Invalid Login ID!")';
    echo '</script>';
    redirect('index.php');
  }
  }
    echo "</p>";
  ?>  
