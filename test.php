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
        <h1 class="col-11">Test Page</h1>
        <div class="col-1">
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">Back</button></a> 
        </div>
    </div>
    <hr class="cloud">

    <!-- body -->
    <div class='container'>
        <h2><u>Questions</u></h2>
        
        <?php
        
            $query = "select * from questions where test_id = '$id'";
            
            $result = $conn->query($query);
            if($result -> num_rows > 0){
            $sno = 1;
            while($row = $result->fetch_assoc()) {
                echo "<b>".$sno.". ";
                extract($row);
                echo $que_desc."</b><br>";
                echo "<input type='radio' name=$sno value=1>".$choice1."<br>";
                echo "<input type='radio' name=$sno value=2>".$choice2."<br>";
                echo "<input type='radio' name=$sno value=3>".$choice3."<br>";
                echo "<input type='radio' name=$sno value=4>".$choice4."<br><br>";
                $sno ++;
            }
        }
        ?>
    <div>
</body>
</html>