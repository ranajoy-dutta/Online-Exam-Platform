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
    <link rel="stylesheet" type="text/css" media="screen" href="style1.css" />
    <link rel="stylesheet" type="text/css" href="style2.css" />
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
        <div class="box">
    <h3 id="head">Test</h3>
    <?php
        // extracting list of Subjects
        $sqlquery = "select * from subjects";
        $result = $conn->query($sqlquery);
        $sno = 1;
        // Displaying the extracted List
        while($row = $result->fetch_assoc()) {
            echo "<a href='testlist.php?sub=".$row['sub_id']."'class='button'><span class='away'>";
            echo $row["sub_name"]."</span><span class='over'>Start</span></a><br>";
            $sno ++;
        }   
    ?>
    </div>
    </div>

    <!-- Footer -->
    <footer class="navbar fixed-bottom bg-faded" style="color:white;">
    <?php
    echo 'User : '.$_SESSION['username'];
    ?>
  </footer>
</body>
</html>