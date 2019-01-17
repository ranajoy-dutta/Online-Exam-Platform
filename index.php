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
  <link href="bootstrap.min.css" rel="stylesheet" Type="text/css">
  <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class='text-center m-2 pr-5 pl-5'>
    <h1 >Placement Preparation Portal</h1>
    <hr class='cloud'>
  <div class='row mt-5 pr-3'>
    <div class='col-8'>
      <h3 class='text-center'><u>Welcome</u></h3>
    </div>
    
    <div class='col-4 div-right'><br>
      <h3 class='text-center'><u>Student Login</u></h3>
      
      <?php
        if (include('connection.php')){
      ?>    
       
      <form class="form-horizontal mt-3" action='s_login_server.php' method='POST'>
        <div class="form-group row">
          <label for="login_id" class="col-4">Login ID :</label>
          <div class="col-7">
            <input type="text" name='loginid' class="form-control form-control-sm" id="login_id" placeholder="Enter Login ID" />
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-4">Password : </label>
          <div class="col-7">
            <input type="password" name='password' class="form-control form-control-sm" id="password" placeholder="********" />
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-md">Submit</button>         
      </form>

      <?php
        };
      ?>
    </div>
  </div>
  </div>

  <footer class="ml-2 navbar fixed-bottom navbar-light bg-faded text-right ">
  
</body>
</html>
