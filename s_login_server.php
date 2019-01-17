<?php 
  require('connection.php');
  echo "<p class ='footer'>";
  if (isset($_POST["loginid"]) && isset($_POST["password"])) {
  $sqlquery = "select username, password from student_login where SID = '".$_POST["loginid"]."'";
  $result = $conn->query($sqlquery);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row["password"] === $_POST["password"]){
      $_SESSION['username'] = $row["username"];
      echo "<b>username:</b> " . $_SESSION['username']. " <b>|| password:</b> " . $row["password"];
      function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
      }
      redirect('student_corner.php');
    }
    else {
      echo '<script language="javascript">';
      echo 'alert("Invalid Credentials!")';
      echo '</script>';
      echo "<script> location.href='index.php'; </script>";
      exit;
  }
  } else {
    echo '<script language="javascript">';
    echo 'alert("Invalid Login ID!")';
    echo '</script>';
    echo "<script> location.href='index.php'; </script>";
      exit;
  }
  }
    echo "</p>";
  ?>
  </footer> 
