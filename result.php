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
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style1.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="style2.css" />    
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
        <h1 class="col-11">Result</h1>
        <div class="col-1">
            <a href="student_corner.php"><button class="btn btn-secondary mt-2">Home</button></a> 
        </div>
    </div>
    <hr class="cloud">
    <div>
        <p id="correct"></p>
        <p id="wrong"></p>
        <p id="unattempt"></p>
    </div>

    <!-- body -->
    <?php

        $sessionid = session_id();
        $query = "select count(*) as count from questions where test_id = '$id'";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $total = $row['count'];
        }
        $query = "SELECT COUNT(DISTINCT(quesnum)) as COUNT FROM `submissions` as s1 INNER JOIN questions as q1 WHERE s1.sub_ans = q1.correct_answer and s1.session_id='$sessionid'";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            $total_crct = $row['COUNT'];
        }
        
        $total_wrng = $total-$total_crct;

        echo "<br><p>Correct Answers : ".$total_crct."</p>";
        echo "<p>Wrong Answers : ".$total_wrng."</p>";
        //echo "<p>Unattempted Answers : ".$total_unat."</p>";
        
        $result_store = array();
        for ($y = 0; $y<$total; $y++){
            $result_store[$y]=array(null);
        }
        $sqlquery = "SELECT * FROM submissions WHERE session_id = '$sessionid' order by quesnum";
        $result = $conn->query($sqlquery);
        if ($result->num_rows >= 1) {
            while($row = $result->fetch_assoc()){
                $i = (int)$row['quesnum'];
                $result_store[$i]=$row['sub_ans'];
                //$result_store[$i][1]=$row['correct_ans'];
        }}   
        $query = "select * from questions where test_id = '$id'";
        $result = $conn->query($query);
        $total_crct = 0;
        $total_wrng = 0;
        $total_unat = 0;
        if($result -> num_rows > 0){
            $sno = 1;
        while($roww = $result->fetch_assoc()) {
            extract($roww); 
            echo "<div class='container'>";
            echo "<p class='font-weight-bold'>$sno. $que_desc</p></li><ul>";
            if (isset($result_store[$sno-1][0]))
            {if ($result_store[$sno-1][0]!=$correct_answer)
            {
                //++$total_wrng;
                if($result_store[$sno-1][0]==1)
                    echo " <li><p class='text-danger font-weight-bold'>$choice1</p></li>";
                else if($correct_answer==1)
                    echo "<li><p class='text-success font-weight-bold'>$choice1</p></li>";
                else
                    echo "<li><p>$choice1</p></li>";
                if($result_store[$sno-1][0]==2)
                    echo "<li><p class='text-danger font-weight-bold'>$choice2</p></li>";
                else if($correct_answer==2)
                    echo "<li><p class='text-success font-weight-bold'>$choice2</p></li>";
                else
                    echo "<li><p>$choice2</p></li>";
                if($result_store[$sno-1][0]==3)
                    echo "<li><p class='text-danger font-weight-bold'>$choice3</p></li>";
                else if($correct_answer==3)
                    echo "<li><p class='text-success font-weight-bold'>$choice3</p></li>";
                else
                    echo "<li><p>$choice3</p></li>";
                if($result_store[$sno-1][0]==4)
                    echo "<li><p class='text-danger font-weight-bold'>$choice4</p></li>";
                else if($correct_answer==4)
                    echo "<li><p class='text-success font-weight-bold'>$choice4</p></li>";
                else
                    echo "<li><p>$choice4</p></li>";
                echo "</div>";
            }else{
                //++$total_crct; 
                if($correct_answer==1)
                    echo "<li><p class='text-success font-weight-bold'>$choice1</p></li>";
                else
                    echo "<li><p>$choice1</p></li>";
                if($correct_answer==2)
                    echo "<li><p class='text-success font-weight-bold'>$choice2</p></li>";
                else
                    echo "<li><p>$choice2</p></li>";
                if($correct_answer==3)
                    echo "<li><p class='text-success font-weight-bold'>$choice3</p></li>";
                else
                    echo "<li><p>$choice3</p></li>";
                if($correct_answer==4)
                    echo "<li><p class='text-success font-weight-bold'>$choice4</p></li>";
                else
                    echo "<li><p>$choice4</p></li>";
                echo "<ul></div>";
            }}
            else{
                //++$total_unat;
                if($correct_answer==1)
                    echo "<li><p class='text-success font-weight-bold'>$choice1</p></li>";
                else
                    echo "<li><p>$choice1</p></li>";
                if($correct_answer==2)
                    echo "<li><p class='text-success font-weight-bold'>$choice2</p></li>";
                else
                    echo "<li><p>$choice2</p></li>";
                if($correct_answer==3)
                    echo "<li><p class='text-success font-weight-bold'>$choice3</p></li>";
                else
                    echo "<li><p>$choice3</p></li>";
                if($correct_answer==4)
                    echo "<li><p class='text-success font-weight-bold'>$choice4</p></li>";
                else
                    echo "<li><p>$choice4</p></li>";
                echo "<ul></div>";
            }
            $sno++;
        }}
    ?>
</body>
</html>