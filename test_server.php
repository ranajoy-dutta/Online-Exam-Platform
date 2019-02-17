<?php
	include('connection.php');
	session_start();
	if(isset($_GET["id"])){
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
	        $attempts[$y]='f0';
	    }

	    $_SESSION['attempts'] = $attempts;
		$_SESSION['time']=$duration;
		redirect("test.php?id=$id&q=0");
	}

	if(isset($_POST)){
		extract($_POST);
		/*
		$sqlquery = "INSERT INTO submissions ";
		  $result = $conn->query($sqlquery);

		  //verifying password
		  if ($result->num_rows == 1) {
		    $row = $result->fetch_assoc();
		    if ($row["password"] === $_POST["password"]){
		      session_start();
		      $_SESSION['username'] = $row["username"];
		      echo 'Please wait! You are being redirecting!';
		      //redirecting to student dashboard
		      redirect('student_corner.php');
		    }
	*/
		http_response_code(200);
		exit;	
		
	
	header("Status: 500");
}


	function redirect($url) {
	    ob_start();
	    header('Location: '.$url);
	    ob_end_flush();
	    die();
    }
?>