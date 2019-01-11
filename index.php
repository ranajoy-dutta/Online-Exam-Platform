<?php
  session_start();
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
      
      <form class="form-horizontal mt-3" action='' method='POST'>
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

<?php 
  if (isset($_POST["loginid"]) && isset($_POST["password"])) {
  echo '<p class="footer">User : '.$_POST["loginid"].'</p>';
  }
?>

</body>
</html>
