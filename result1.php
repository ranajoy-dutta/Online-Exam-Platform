<?php
    session_start();
    require("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Result | <?php extract($_GET); echo $id;?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
</head>
<body>
	<?php 
    //check for valid sign in
    if(!isset($_SESSION['username'])){
        echo "<div class='text-center'><p class='display-3'>Please Login!</p></li><br>";
        echo "<u><a href='index.php'>Go Home</a></u>";
        exit;
    }
    ?>
    <!-- Header -->
    <div class="row m-2 text-center">
        <h1 class="col-11"><b>Result</b></h1>
        <div class="col-1">
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">Home</button></a> 
        </div>
    </div>
    <hr class="cloud">
    <div class="row">
    	
    </div>