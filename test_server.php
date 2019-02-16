<?php
	include('connection.php');
	session_start();
	extract($_GET);
	echo 'Test Server | User in session : '.$_SESSION['username']." | Test ID : $id";
	
	$sql = "SELECT * FROM tests where test_id='$id'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $duration = $row["duration"];
	        $tq = $row["total_ques"];
	    }
	}
	echo " | Duration : ".$duration; 


    $attempts = array();
    for ($y = 0; $y<$tq; $y++){
        $attempts[$y]=0;
    }

    $_SESSION['attempts'] = $attempts;
	$_SESSION['time']=$duration;
	redirect("test.php?id=$id&q=0");

	function redirect($url) {
	    ob_start();
	    header('Location: '.$url);
	    ob_end_flush();
	    die();
    }
?>