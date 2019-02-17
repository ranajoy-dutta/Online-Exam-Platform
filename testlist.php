<?php
    session_start();
    require("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Test list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style1.css" />
    <link rel="stylesheet" type="text/css" href="style2.css" />
</head> 
<body>
<?php 
    if (isset($_SESSION['test_in_progress'])){
        echo "<script>alert('Test in Progress! Please Complete or cancel the test!')</script>";
        
        $id = $_SESSION['test_in_progress'];
        
        echo "<script>window.location.replace('test.php?id=$id&q=0')</script>";
        
    }
    extract($_GET);
    //check for valid sign in
    //testline
    if(!isset($_SESSION['username'])){
        echo "<div class='text-center'><p class='display-3'>Please Login!</p><br>";
        echo "<u><a href='index.php'>Go Home</a></u>";
        exit;
    }
    ?>
    
    <!-- Header -->
    <div class="row m-2 text-center">
        <h1 class="col-11" style="color:#2ecc71;">List of Tests</h1>
        <div class="col-1">
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">Back</button></a> 
        </div>
    </div>
    <hr class="cloud">

    <!-- body -->
    <div class='container'>
        <div class="box">
        <h2 style="color:white;">List of Tests</h2>
        
        <?php
        // extracting list of Test papers related to the subject
            $query = "select * from tests where sub_id = $sub";
            $result = $conn->query($query);
            if($result -> num_rows > 0){
            $sno = 1;
            while($row = $result->fetch_assoc()) {
                extract($row);
                echo "<a href=test_server.php?id=".$test_id."&newtest=true class='button'><span class='away'>";
                echo $test_name."</span><span class='over'>Start</span></a><br>";
                $sno ++;
            }
        }     ?>  
    </div>    
    <div>


    <!-- Footer -->
    <footer class="navbar fixed-bottom bg-faded " style="color:white">
    <?php
    echo 'User : '.$_SESSION['username'];
    ?>
  </footer>
</body>
</html>
