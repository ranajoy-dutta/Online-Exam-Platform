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
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" /> -->
    <link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script type="text/javascript" src="myscript.js"></script>
    <script>
        window.onload = function () {
            //alert('timer started : '+"<?php echo $_SESSION['time'].'seconds';?>");
            var fiveMinutes = "<?php echo $_SESSION['time'];?>",
            display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
</script>
</head>
<body>

<?php
if(isset($_POST['time'])){
    $_SESSION['time'] = intval($_POST['time']);
}
// extracting variables from GET
extract($_GET);
//check for valid sign in
if(!isset($_SESSION['username'])){
    echo "<div class='text-center'><p class='display-3'>Please Login!</p><br>";
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
				<div class="navbar-brand"><span>Test Name: <?php echo $id; ?></span></div>
				<div class="nav navbar-top-links navbar-right">
                    <?php
                        echo "<div onclick=endtest('$id') class='navbar-brand'>End Test</div>"
                    ?>		
                </div>
			</div>
		</div>
    </nav>
<!--Header -->
<!--SIdeBar-->
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
<!-- SideBar -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Questions</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
		<?php
            // $q is current question number
            // $next is a variable for LIMIT contraint for SQL query below
            if ($q>0){
                $next = 1;
            }
            else{
                $next = $q+1;
            }
            // extracting one question at a time
            $query = "select * from questions where test_id = '$id' limit $q,$next";
            $result = $conn->query($query);
            // initialising values for Next button and Previous Button
            $que_num=$q+1;
            $prev = $q-1;
            
            // displaying the extracted question
            if($result -> num_rows > 0){
            while($row = $result->fetch_assoc()) {
                extract($row);
                $attempt = $_SESSION['attempts'][(int)$q];
                
                echo "<div  id='choices' id=".$que_num.">";
                echo "<b><div>".$que_num.". ";
                echo $que_desc."</b></div><div>";
                if ($attempt[1]==1)
                    echo "<input type='radio' onclick=ansselect($que_num,1,'$attempt[0]','$id') name=$que_num value=1 checked> ".$choice1."<br>";
                else
                    echo "<input type='radio' onclick=ansselect($que_num,1,'$attempt[0]','$id') name=$que_num value=1 > ".$choice1."<br>";
                if ($attempt[1]==2)
                    echo "<input type='radio' onclick=ansselect($que_num,2,'$attempt[0]','$id') name=$que_num value=2 checked> ".$choice2."<br>";
                else
                    echo "<input type='radio' onclick=ansselect($que_num,2,'$attempt[0]','$id') name=$que_num value=2> ".$choice2."<br>";
                if ($attempt[1]==3)
                    echo "<input type='radio' onclick=ansselect($que_num,3,'$attempt[0]','$id') name=$que_num value=3 checked> ".$choice3."<br>";
                else
                    echo "<input type='radio' onclick=ansselect($que_num,3,'$attempt[0]','$id') name=$que_num value=3> ".$choice3."<br>";
                if ($attempt[1]==4)
                    echo "<input type='radio' onclick=ansselect($que_num,4,'$attempt[0]','$id') name=$que_num value=4 checked> ".$choice4."<br><br>";
                else
                    echo "<input type='radio' onclick=ansselect($que_num,4,'$attempt[0]','$id') name=$que_num value=4> ".$choice4."<br><br>";
                // if its not the last question
                if ($que_num<$total){
                    echo "<div class='row'>";
                    // if its first question, Previous button disabled
                    if ($que_num==1){
                        echo "<div class='col-md-6 text-left'>
                        <button class='btn btn-primary' style='background-color: #5a6268; border-color: #5a6268;' disabled>Previous</button>
                        </div>";
                    }
                    else{
                        echo "<div class='col-md-6 text-left'>
                        <a href=test.php?id=$id&q=$prev><button class='btn btn-primary' style='background-color: #5a6268; border-color: #5a6268;'>Previous</button></a>
                        </div>";
                    }
                    
                    // Next button
                    echo "<div class='col-md-6 text-right'> 
                    <a href=test.php?id=$id&q=$que_num><button class='btn btn-primary' style='background-color: #5a6268; border-color: #5a6268;'>Next</button></a>
                    </div>";
                    echo "</div>";
                }
                // if its the last question, Submit button instead of Next
                else{
                    echo "<div class='row'>";
                    echo "<div class='col-md-6 text-left'>
                    <a href=test.php?id=$id&q=$prev><button class='btn btn-primary' style='background-color: #5a6268; border-color: #5a6268;'>Previous</button></a>
                    </div>";
                    echo "<div class='col-md-6 text-right'>
                    <button class='btn btn-danger' onclick=endtest('$id') style='background-color: #5a6268; border-color: #5a6268;'>Submit</button>
                    </div>";
                    echo "</div>";
                }
                echo "</div>";
            }}
        ?>
		</div>
		
	</div>	<!--/.main-->

    <!-- Footer -->
    <footer class="navbar fixed-bottom bg-faded ">
    <?php
    echo 'User : '.$_SESSION['username'].$_SESSION['time'].session_id();
    ?>
  </footer>
</body>
</html>