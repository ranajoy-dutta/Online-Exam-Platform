<?php
  session_start();

  if(isset($_SESSION['AdminId'])){
    echo '<h1 class="text-center mt-4">Welcome'.$_SESSION['AdminId'].'</h1><br>';
    echo '<h3 class="text-center"> Please Wait! You are being redirected to your dashoard</h3>';
    function redirect($url) {
      ob_start();
      header('Location: '.$url);
      ob_end_flush();
      die();
    }
    redirect('dashboard.php');
  
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome | Placement Preparation Platform</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/style1.css" rel="stylesheet" type="text/css">
  
  <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
</head>

<body>

  <h1 id="headername"> Placement Preparation Portal </h1>
  <?php
    if (include('connection.php')){
  ?>
  <form class="box" action="admin_server.php" method="POST">
    <h1>Admin Login</h1>
    <?php 
      if (isset($_GET['p'])){
      echo "<h4 class='text-danger'>Invalid Password</h4>";}
      else if(isset($_GET['l'])){
      echo "<h4 class='text-danger'>Invalid Login ID</h4>";}
    ?>
    <input type="text" name='loginid' id="AdminId" required placeholder="Enter Login ID">
    <input type="password" name='password' id="pass" required placeholder="Password">
    <input type="submit" id="submit" value="login">         
  </form>

  <?php
    };
  ?>
 
  </body>
</html>