<?php
    session_start();
    require("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="jquery.min.js"></script>
    <script src="timer.js"></script>
    
</head>
<body>
<?php 
    //check for valid sign in
    if(!isset($_SESSION['username'])){
        echo "<div class='text-center'><p class='display-3'>Please Login!</p><br>";
        echo "<u><a href='index.php'>Go Home</a></u>";
        exit;
    }
    ?>
    
    <!-- Header -->
    <div class="row m-2 text-center">
        <h1 class="col-11">Result Page</h1>
        <div class="col-1">
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">Home</button></a> 
        </div>
    </div>
    <hr class="cloud">

    <!-- body -->
    
</body>
</html>