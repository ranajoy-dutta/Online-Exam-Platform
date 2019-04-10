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
    <link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
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
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
                <div class="navbar-brand"><span>Result</span></div>
                
				<div class="nav navbar-top-links navbar-right">
                <a href="student_corner.php" class='navbar-brand'>Home</a>  		
                </div>
			</div>
		</div>
    </nav>
<!--Header -->

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="nav menu">
        <h3 class="active text-center">Questions</h3>
        <hr>
        <div class="divider"></div>        
        <div class="pad-left">Time Left: <em class="fa fa-bar-chart" id='time'> </em></div>
        <div class="pad-left" id="timesec" hidden></div>        
        <div class="pad-left">
            Total Questions:
            <?php
                // extracting total number of questions
                $query = "select count(*) as count from questions where test_id = '$id'";
                $result = $conn->query($query);
                while($row = $result->fetch_assoc()) {
                    $total = $row['count'];
                    echo $total;
                }
            ?>
        </div>    
        <hr>      

        <div class="pad-left"><!-- question list -->
            <?php
            foreach($_SESSION['attempts'] as $x=>$x_value){
                $ques = $x+1;
               if ($x==(int)$q){       //if ques is current ques
                    echo "<p class='font-weight-bold text-center' style='color: #30a5ff'> $ques </p>";
                    continue;
                }
                if ($x_value[0]==="f0"){       //if ques is unattempted
                    echo " <a href=test.php?id=$id&q=$x>
                    <p class='font-weight-bold text-center' style='color:black'> $ques </p></a>";}
                else{       //if ques is attempted
                    echo "<a href=test.php?id=$id&q=$x>
                    <p class='text-success font-weight-bold text-center'> $ques </p></a>";}
                
            }?>     
        </div>
    </div>
</div>
    <div>
        <p id="correct"></p>
        <p id="wrong"></p>
        <p id="unattempt"></p>
    </div>
    
    <div class="modal-body row">
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
            echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'><div class='row'><div class='col-lg-12'><h1 class='page-header'></h1></div></div>";
            if($result -> num_rows > 0){
                $sno = 1;
            while($roww = $result->fetch_assoc()) {
                extract($roww); 
                echo "<div class='panel panel-container'>";
                echo "<p class='font-weight-bold'>$sno. $que_desc</p></li><ul>";
                if (isset($result_store[$sno-1][0]))
                {if ($result_store[$sno-1][0]!=$correct_answer)
                {
                    ++$total_wrng;
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
                    ++$total_crct; 
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
                    ++$total_unat;
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
            echo "</div></div></div>";
            echo "<div id='sidebar-collapse' class='col-sm-3 col-lg-2 sidebar'><div class='nav menu'><h3 class='active text-center'>Overview</h3><hr><div class='pad-left'>";
            echo "<p class='text-success'><b>Correct Answers : </b>".$total_crct."</p>";
            echo "<p class='text-danger'><b>Wrong Answers : </b>".$total_wrng."</p>";
            echo "<p class='text-black'><b>Unattempted : </b>".($sno-$total_crct-$total_wrng-1)."</p>";
            //echo "<p>Unattempted Answers : ".$total_unat."</p>";
            echo "</div></div>";
        $sid = $_SESSION['userid'];
        $username = $_SESSION['username'];
        $q=mysqli_query($conn,"select * from test_records where session_id='$sessionid'");
        $num=mysqli_num_rows($q);
        if($num==0){
            $sql="INSERT INTO test_records (sid,sname,session_id,mks_obtained,incorrect) VALUES ('$sid','$username','$sessionid','$total_crct','$total_wrng')";
            if($conn->query($sql)===true){
                echo '<script language="javascript">';
                echo 'console.log("Result stored")';
                echo '</script>';
            }
            else{
                echo "Error occured : ".$conn->error;
            }
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Result Already Stored!")';
            echo '</script>';
        }
    





        ?>
    </div>
</body>
</html>