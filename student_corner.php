<?php
    session_start();
    require("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
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
    <div class="row m-2 text-center ">
        <h1 class="col-11">Student Dashboard</h1>
        <div class="col-1">
            <a href="logout.php"><button class="btn btn-secondary mt-2">Logout</button></a> 
        </div>
    </div>
    <hr class="cloud">

    <!-- Body -->
    <div class="container">
    <h3>Questions</h3>
    <?php
    $sqlquery = "select sub_name from subjects";
    $result = $conn->query($sqlquery);
    $sno = 1;
    while($row = $result->fetch_assoc()) {
        echo $sno.". ";
        echo "<a href='test.php?subject=".$row['sub_name']."/'>";
        echo $row["sub_name"]."</a><br>";
        $sno ++;
    }
    ?>
    </div>


    <!-- Footer -->
    <footer class="navbar fixed-bottom bg-faded ">
    <?php
    echo 'User : '.$_SESSION['username'];
    ?>
  </footer>
</body>
</html>