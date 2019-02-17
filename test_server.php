<?php
	include('connection.php');
	session_start();
	
	function redirect($url) {
	    ob_start();
	    header('Location: '.$url);
	    ob_end_flush();
	    die();
    }

	if(isset($_GET["endtest"])){
		unset($_SESSION['test_in_progress']);
		unset($_SESSION['time']);
		unset($_SESSION['attempts']);
		redirect("student_corner.php");
	}


	if(isset($_GET["newtest"])){
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

		session_regenerate_id();
	    $attempts = array();
	    for ($y = 0; $y<$tq; $y++){
	        $attempts[$y]=array('f0', 0);
	    }

	    $_SESSION['attempts'] = $attempts;
		$_SESSION['time']=$duration;
		$_SESSION['test_in_progress']=$id;
		redirect("test.php?id=$id&q=0");
	}

	if(isset($_POST['quesnum'])){
		extract($_POST);
		$ans = (int)$ans;
		$quesnum = (int)$quesnum-1;
		$ans = (int)$ans;

		//echo $quesnum." ".$attempt." ".$ans." ".$id." ".session_id();
		if ($attempt==='f1'){
			$sqlquery = "SELECT sno FROM submissions WHERE session_id='". session_id() ."' AND 
			test_id='$id' AND quesnum=$quesnum";
			$result = $conn->query($sqlquery);
			$row = $result->fetch_assoc();
			$sno = $row['sno'];
			
			$sql = "UPDATE submissions SET sub_ans=$ans WHERE sno=$sno";
			//echo $sno." ".gettype($sno)." ".$ans." ".gettype($ans);
			if ($conn->query($sql) === TRUE) {
				//echo "success";
				$_SESSION['attempts'][$quesnum][1]=$ans;
				http_response_code(200);
				exit;
			} 
			else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
				http_response_code(500);
				exit;
			}
		}
		else{
			$sql = "INSERT INTO submissions (session_id, test_id, quesnum, sub_ans, correct_ans)
			VALUES ('".session_id()."','$id',$quesnum,$ans,3)";

			if ($conn->query($sql) === TRUE) {
				//echo "success";
				$_SESSION['attempts'][$quesnum][0]='f1';
				$_SESSION['attempts'][$quesnum][1]=$ans;
				http_response_code(200);
				exit;
			} 
			else {
				//echo "Error: " . $sql . "<br>" . $conn->error;
				http_response_code(500);
				exit;	
			}
		}
	}
	

	
?>