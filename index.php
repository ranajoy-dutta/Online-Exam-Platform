<?php
  session_start();
  if(isset($_SESSION['username'])){
    echo '<h1 class="text-center mt-4"> Welcome'.$_SESSION['username'].'</h1><br>';
    echo '<h3 class="text-center"> Please Wait! You are being redirected to your dashoard</h3>';
    function redirect($url) {
      ob_start();
      header('Location: '.$url);
      ob_end_flush();
      die();
    }
    redirect('student_corner.php');
  
  }
?>



<!DOCTYPE html>
<html>
<head>
  <title>Welcome | Placement Preparation Platform</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="style1.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
</head>

<body>
  <h1 id="headername"> Placement Preparation Portal </h1>
  <?php
    if (include('connection.php')){
  ?>    
  <form class="box" action="s_login_server.php" method="POST">
    <h1>login</h1>
      <input type="text" name='loginid' id="username" placeholder="Enter Login ID">
      <input type="password" name='password' id="pass" placeholder="Password">
      <input type="submit" id="submit" value="login">     
  </form>

  <?php
    };
  ?>
</body>
</html>
