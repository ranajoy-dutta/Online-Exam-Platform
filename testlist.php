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
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
<?php
    extract($_GET);
    //check for valid sign in
    if(!isset($_SESSION['username'])){
        echo "<div class='text-center'><p class='display-3'>Please Login!</p><br>";
        echo "<u><a href='index.php'>Go Home</a></u>";
        exit;
    }
    ?>
    
    <!-- Header -->
    <div class="row m-2 text-center">
        <h1 class="col-11">List of Tests</h1>
        <div class="col-1">
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">Back</button></a> 
        </div>
    </div>
    <hr class="cloud">

    <!-- body -->
    <div class='container'>
        <h2><u>List of Tests</u></h2>
        
        <?php
        // extracting list of Test papers related to the subject
            $query = "select * from tests where sub_id = $sub";
            $result = $conn->query($query);
            if($result -> num_rows > 0){
            $sno = 1;
            while($row = $result->fetch_assoc()) {
                extract($row);
                echo $sno.". ";
                // test time (countdown)
                $_SESSION['time']=3600;
                echo "<a href=test.php?id=".$test_id."&q=0>";
                echo $test_name."</a><br>";
                $sno ++;
            }
        }           
        ?>
    <div>


    <!-- Footer -->
    <footer class="navbar fixed-bottom bg-faded ">
    <?php
    echo 'User : '.$_SESSION['username'];
    ?>
  </footer>
</body>
</html>