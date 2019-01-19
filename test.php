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
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">End Test</button></a> 
        </div>
    </div>
    <hr class="cloud">

    <!-- body -->
    <div class='container'>
        <h2><u>Questions</u></h2>
        <div class='row'>
        <div class='col-3 text-left'>time : </div>
        <div class='col-5 text-center'>Test : <?php echo $id; ?></div>
        <div class='col-4 text-right'>Total Questions : 
        <?php
            $query = "select count(*) as count from questions where test_id = '$id'";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                $total = $row['count'];
                echo $total;
            }
        ?></div>
        </div><hr>

        <?php
            //$q = (int)$q;
            if ($q>0){
                $next = 1;
            }
            else{
                $next = $q+1;
            }
            $query = "select * from questions where test_id = '$id' limit $q,$next";
            $result = $conn->query($query);
            $que_num=$q+1;
            $prev = $q-1;
            if($result -> num_rows > 0){
            while($row = $result->fetch_assoc()) {
                echo "<div style='display:block ' id=".$que_num.">";
                echo "<b>".$que_num.". ";
                extract($row);
                echo $que_desc."</b><br>";
                echo "<input type='radio' name=$que_num value=1>".$choice1."<br>";
                echo "<input type='radio' name=$que_num value=2>".$choice2."<br>";
                echo "<input type='radio' name=$que_num value=3>".$choice3."<br>";
                echo "<input type='radio' name=$que_num value=4>".$choice4."<br><br>";
                if ($que_num<$total){
                    echo "<div class='row'>";
                    if ($que_num==1){
                    echo "<div class='col-6 text-left'>
                    <button class='btn btn-primary' disabled>Previous</button>
                    </div>";}
                    else{
                        echo "<div class='col-6 text-left'>
                        <a href=test.php?id=$id&q=$prev><button class='btn btn-primary'>Previous</button></a>
                        </div>";}
                        
                    echo "<div class='col-6 text-right'>
                    <a href=test.php?id=$id&q=$que_num><button class='btn btn-primary'>Next</button></a>
                    </div>";
                    echo "</div>";
                }
                else{
                    echo "<div class='row'>";
                    echo "<div class='col-6 text-left'>
                    <a href=test.php?id=$id&q=$prev><button class='btn btn-primary'>Previous</button></a>
                    </div>";
                    echo "<div class='col-6 text-right'>
                    <a href=#Result.php><button class='btn btn-danger'>Submit</button></a>
                    </div>";
                    echo "</div>";
                }
                echo "</div>";
            }}
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