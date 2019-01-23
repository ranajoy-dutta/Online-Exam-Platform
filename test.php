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
    <script src="jquery.min.js"></script>
    <script src="timer.js"></script>
    
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
        <div class='col-6 row text-left'>
            <div class='col-2 pr-0' >Time Left:</div>
            <div class=' pl-0col-9 text-left' id='time'></div> 
            <div class=' pl-0col-9 text-left' id='timesec' hidden></div> 
        </div>
        <div class='col-2 text-center'>Test : <?php echo $id; ?></div>
        <div class='col-4 text-right'>Total Questions : 
        <?php
            // extracting total number of questions
            $query = "select count(*) as count from questions where test_id = '$id'";
            $result = $conn->query($query);
            while($row = $result->fetch_assoc()) {
                $total = $row['count'];
                echo $total;
            }
        ?></div>
        </div><hr>
        
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

                echo "<div style='display:block ' id=".$que_num.">";
                echo "<b>".$que_num.". ";
                echo $que_desc."</b><br>";
                echo "<input type='radio' name=$que_num value=1>".$choice1."<br>";
                echo "<input type='radio' name=$que_num value=2>".$choice2."<br>";
                echo "<input type='radio' name=$que_num value=3>".$choice3."<br>";
                echo "<input type='radio' name=$que_num value=4>".$choice4."<br><br>";

                // if its not the last question
                if ($que_num<$total){
                    echo "<div class='row'>";

                    // if its first question, Previous button disabled
                    if ($que_num==1){
                        echo "<div class='col-6 text-left'>
                        <button class='btn btn-primary' disabled>Previous</button>
                        </div>";
                    }
                    else{
                        echo "<div class='col-6 text-left'>
                        <a href=test.php?id=$id&q=$prev onclick=timechange()><button class='btn btn-primary'>Previous</button></a>
                        </div>";
                    }
                    
                    // Next button
                    echo "<div class='col-6 text-right'>
                    <a href=test.php?id=$id&q=$que_num><button class='btn btn-primary'>Next</button></a>
                    </div>";
                    echo "</div>";
                }

                // if its the last question, Submit button instead of Next
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
    echo 'User : '.$_SESSION['username'].$_SESSION['time'];
    ?>
  </footer>
  <script>


  window.onload = function () {
    //alert('timer started : '+"<?php echo $_SESSION['time'].'seconds';?>");
    var fiveMinutes = "<?php echo $_SESSION['time'];?>",
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    
    setInterval(function () {
        hours = parseInt(timer / 3600, 10)
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        $.post('', {time: timer});
        display.textContent = hours + ":" + minutes + ":" + seconds;
        if (timer-- <= 0) {
            alert('Time Over! Your answers have been submitted!')
            window.location ='result.php';
            
        }
    }, 1000);
    
}
</script>

</body>
</html>