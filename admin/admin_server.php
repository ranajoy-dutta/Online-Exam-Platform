<?php
require("connection.php");
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

//extracting password from database
if (isset($_POST["loginid"]) && isset($_POST["password"])) {
	$sqlquery = "select AdminId, password from admin_login where AdminId = '".$_POST["loginid"]."'";
	$result = $conn->query($sqlquery);
  
	//verifying password
	if ($result->num_rows == 1) {
	  $row = $result->fetch_assoc();
	  if ($row["password"] === $_POST["password"]){
		session_start();
		$_SESSION['AdminId'] = $row["AdminId"];
		//redirecting to admin dashboard
		redirect('dashboard.php');
	  }
	  else {
		//invalid password
		redirect('index.php?p=1');
	}
	} else {
	  //invalid login id
	  redirect('index.php?l=2');
	}
}


if (isset($_POST['sub_name'])){ $subname = $_POST['sub_name'];

/*$q=mysqli_query($conn,"select * from subjects where sub_id='$subid'");
	$num=mysqli_num_rows($q);
	if($num==0){*/
		$sql="INSERT INTO subjects (sub_name) VALUES ('$subname')";
		if($conn->query($sql)===true){
			echo '<script language="javascript">';
	    	echo 'alert("Successfully Added!")';
	    	echo '</script>';
		    Redirect('subjects.php');
		}
		else{
		    echo "Error occured : ".$conn->error;
		}
}
	/*else{
		echo '<script language="javascript">';
    	echo 'alert("Subject Already Exists!")';
    	echo '</script>';
	    Redirect('admin_corner.php', false);
	}*/





if (isset($_POST['AdminId'])) {
	extract($_POST);
	$q=mysqli_query($conn,"select * from admin_login where AdminId='$AdminId'");
	$num=mysqli_num_rows($q);
	if($num==0){
		$sql="INSERT INTO admin_login (AdminId,Fname,Lname,Emailid,Password,Contact,Super) VALUES ('$AdminId','$Fname','$Lname','$Emailid','$Password','$Contact','$Super')";
		if($conn->query($sql)===true){
			echo '<script language="javascript">';
	    	echo 'alert("Successfully Registered!")';
	    	echo '</script>';
		    Redirect('superuser.php');
		}
		else{
		    echo "Error occured : ".$conn->error;
		}
	}
	else{
		echo '<script language="javascript">';
    	echo 'alert("AdminId Already Exists!")';
    	echo '</script>';
	    Redirect('superuser.php');
	}
}





/* How will there be a comparision of testid...we aren't passing any such value through form*/
//Add Test

if(isset($_POST['subname'])){
	extract($_POST);
	$subid=$subname;
	/*$q=mysqli_query($conn,"select * from tests where test_id='$testid'");
		$num=mysqli_num_rows($q);
		if($num==0){*/
			$sql="INSERT INTO tests (sub_id,test_name,total_ques,duration) VALUES ('$subid','$testname','$testques','$testdur')";
			if($conn->query($sql)===true){
				echo '<script language="javascript">';
		    	echo 'alert("Successfully Added!")';
		    	echo '</script>';
			    Redirect('subjects.php');
			}
			else{
			    echo "Error occured : ".$conn->error;
			}
		/*}
		else{
			echo '<script language="javascript">';
	    	echo 'alert("Test Already Exists!")';
	    	echo '</script>';
		    //Redirect('subjects.php');
		}*/
}





/*Same for queit*/
//Add Question

if(isset($_POST['correct_answer'])){
	extract($_POST);
	$testid=$testname;
	/*$q=mysqli_query($conn,"select * from questions where que_desc='$quedesc'");
		$num=mysqli_num_rows($q);
		if($num==0){*/
			$sql="INSERT INTO questions (test_id,que_desc,choice1,choice2,choice3,choice4,correct_answer) VALUES ('$testid','$quedesc','$choice1','$choice2','$choice3','$choice4','$correct_answer')";
			if($conn->query($sql)===true){
				echo '<script language="javascript">';
		    	echo 'alert("Successfully Added!")';
		    	echo '</script>';
			    Redirect('subjects.php');
			}
			else{
			    echo "Error occured : ".$conn->error;
			}
		/*}
		else{
			echo '<script language="javascript">';
	    	echo 'alert("Question Already Exists!")';
	    	echo '</script>';
		    Redirect('subjects.php');
		}*/
}






//Delete Subject
if(isset($_POST['del_subid'])){
extract($_POST);
$rs=$conn->query("select * from subjects where sub_id='$del_subid'");
if ($rs->num_rows<0)
{
  echo "<br><br><br><div class=head1>Subject Does Not Exists!</div>";
  exit;
}

$t=mysqli_query($conn,"select test_id from tests where sub_id='$del_subid'");
$res=mysqli_fetch_assoc($t);
$testid=$res['test_id'];

$conn->query("delete from subjects where sub_id='$del_subid'") or die(mysql_error());
$conn->query("delete from tests where sub_id='$del_subid'") or die(mysql_error());
$conn->query("delete from questions where test_id='$testid'") or die(mysql_error());
echo "<p align=center>Subject  <b> \"".$rs['sub_name'] ."\"</b> deleted Successfully.</p>";
//$submit="";
}






?>
