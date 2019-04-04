<?php
    session_start();
	require("connection.php");
	extract($_SESSION);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Subject</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
	<?php 
    //check for valid sign in
    if(!isset($_SESSION['AdminId'])){
        echo "<div class='text-center'><p class='display-3'>Please Login!</p><br>";
        echo "<u><a href='index.php'>Go Home</a></u>";
        exit;
    }
    ?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="dashboard.php"><span>Placement Preparation Portal</span> | Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-cogs"></em>
					</a>
                        <ul class="dropdown-menu dropdown-alerts">                        
							<li><a href="profile.php">
								<div><em class="fa fa-user"></em> Profile</div></a></li>
							<li class="divider"></li>
							<li><a href="logout.php">
								<div><em class="fa fa-power-off"></em> Logout </div></a></li>
						</ul>
				</ul>
			</div>
		</div>
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<?php echo $AdminId;?>
				</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="dashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li  class="parent active"><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Subjects <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
				<?php
					// extracting list of Subjects
					$sqlquery = "select * from subjects";
					$result = $conn->query($sqlquery);
					while($row = $result->fetch_assoc()) {
						echo "<li><a href='subjects.php?sub=".$row['sub_id']."'>";
						echo "<span class='fa fa-arrow-right'>&nbsp;</span>".$row["sub_name"]."</a></li>";	
					} 
				?>
				<li><a href='subjects.php?add_sub=true'><span class='fa fa-plus'>&nbsp;</span> Add New Subject</a></li>
				<li><a href='subjects.php?del_sub=true'><span class='fa fa-plus'>&nbsp;</span> Delete Subject</a></li>
				</ul>
			</li> 
			<li><a href="results.php"><em class="fa fa-bar-chart">&nbsp;</em> Results</a></li>
			
			<li><a href="#panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li>
			<li><a href="superuser.php"><em class="fa fa-toggle-off">&nbsp;</em> Super User</a></li>
			
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="dashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="subjects.php">Subjects</a></li>
				<?php
					if(isset($_GET['sub'])){
					extract($_GET);
					// extracting list of Subjects
					$sqlquery = "select sub_name from subjects where sub_id=$sub";
					$result = $conn->query($sqlquery) or die($conn->error);
					$selected='';
					while($row = $result->fetch_assoc()) {
						$selected=$row['sub_name'];
						echo "<li class='active'>$selected</li>";	
					}
					if(isset($_GET['test'])){
					extract($_GET);
					// extracting list of Tests
					$sqlquery = "select test_name from tests where test_id='$test'";
					$result = $conn->query($sqlquery) or die($conn->error);
					$selected='';
					while($row = $result->fetch_assoc()) {
						$selected=$row['test_name'];
						echo "<li class='active'>$selected</li>";	
					} 
					} }
					else if(isset($_GET['add_sub'])){
							echo "<li class='active'>Add Subject</li>";	
					}
					else if(isset($_GET['del_sub'])){
							echo "<li class='active'>Delete Subject</li>";	
					}
				?>
			</ol>
		</div><!--/.row-->
		
		<?php if(isset($selected))echo '<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Subject :  '.$selected.'
				</h1>
			</div>
		</div>';
		else if(isset($_GET['add_sub']))echo '<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add New Subject
				</h1>
			</div>
		</div>';
		else if(isset($_GET['del_sub']))echo '<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Delete Subject
				</h1>
			</div>
		</div>';
		 ?><!--/.row-->
		
		
        <?php if(isset($message)){
		
		echo "<div class='alert bg-danger' role='alert'>
                <em class='fa fa-lg fa-warning'>&nbsp;</em> 
                 $message
                <a href='#' class='pull-right'><em class='fa fa-lg fa-close'></em></a>
			</div>";
			$_SESSION['message']=null;
		}
        ?>

		<div class=" panel panel-container">
			<div class="panel panel-info">
			<?php if(isset($selected))echo "<div class='panel-heading'> List of Tests</div>";
				else if(isset($_GET['test']))echo "<div class='panel-heading'>List of Questions</div>";
				else if(!isset($_GET['add_sub']))echo "<div class='panel-heading'>List of Subjects</div>";?>
					<div class="panel-body">
					<?php
						if(isset($_GET['sub'])){
						// extracting list of Test papers related to the subject
						$query = "select * from tests where sub_id = $sub";
						$result = $conn->query($query);
							if($result -> num_rows > 0){
							$sno = 1;
								while($row = $result->fetch_assoc()) {
									extract($row);

//	echo "$sno. <a href=subjects.php?sub=".$sub_id."&test=".$test_id."&newtest=true class='button'><span class='away'>";

									echo "$sno. <a href=subjects.php?test=".$test_id."&newtest=true class='button'><span class='away'>";
									echo $test_name."</span></a><br>";
									$sno ++;
								}
							}
							else{
								echo "<h3 class='text-center'>No Test Found</h3>";
							}

			/*ADD Test*/
							echo "<br><br>

			<div class=' panel panel-container'>
			<div class='panel panel-info'>				
				<div class='panel-heading'> Add New Test <span data-toggle='collapse' href='#new-test' class='icon pull-right'><em class='fa fa-plus'></em></span>
				</div>
				<div class='panel-body'>
				<form action='admin_server.php' method='POST' id='new-test' class='children collapse'>
					<div class='form-group'>
						<input hidden value=".$sub." name='subname' type='text' id='subname'>
						<label>Enter Test Name:</label><input class='form-control' name='testname' placeholder='Test Name' required type='text' id='testname'><br>
		              	<label>Enter Number Of Questions:</label><input class='form-control' name='testques' placeholder='No. Of Ques.' required type='number' id='testques'><br>
		              	<label>Enter Test Duration:</label><input class='form-control' name='testdur' placeholder='Test Duration' required type='number' id='testdur'>
						<br><br>
						<button type='submit' id='Submit' class='btn btn-md btn-primary'> ADD TEST </button>
					</div>
				</form>
				</div>
			</div>
		</div>";
						}
						else if(isset($_GET['test'])){
						// extracting list of questions related to the test
						extract($_GET);
						$query = "select * from questions where test_id ='$test'";
						$result = $conn->query($query) or die($conn->error);
							if($result -> num_rows > 0){
							$sno = 1;
								while($row = $result->fetch_assoc()) {
									extract($row);
									echo "$sno. <a href=test_server.php?ques=".$que_id."&newtest=true class='button'><span class='away'>";
									echo $que_desc."</span></a><br>";
									$sno ++;
								}
							}
							else{
								echo "<h3 class='text-center'>No Questions Found</h3>";
							}
							
					/*ADD Question*/
							echo "<br><br>
							<div class=' panel panel-container'>
								<div class='panel panel-info'>				
									<div class='panel-heading'> Add New Questions <span data-toggle='collapse' href='#new-ques' class='icon pull-right'><em class='fa fa-plus'></em></span>
									</div>
									<div class='panel-body'>
									<form action='admin_server.php' method='POST' id='new-ques' class='children collapse'>
										<div class='form-group'>
											<input hidden value=".$test." name='testname' type='text' id='testname'>
							                <label>Enter Question Description:</label><textarea class='form-control' name='quedesc' placeholder='Question Description' required id='quedesc'></textarea><br>
							              	<label>Enter First Choice:</label><input class='form-control' name='choice1' placeholder='First Choice' required type='text' id='choice1'><br>
							              	<label>Enter Second Choice:</label><input class='form-control' name='choice2' placeholder='Second Choice' required type='text' id='choice2'><br>
							              	<label>Enter Third Choice:</label><input class='form-control' name='choice3' placeholder='Third Choice' required type='text' id='choice3'><br>
							              	<label>Enter Fourth Choice:</label><input class='form-control' name='choice4' placeholder='Fourth Choice' required type='text' id='choice4'><br>
							              	<label>Enter Correct Choice:</label><input class='form-control' name='correct_answer' placeholder='Correct Choice' required type='number_format(number)' id='correct_answer'>
											<br><br>
											<button type='submit' id='Submit' class='btn btn-md btn-primary'> ADD QUESTION </button>
										</div>
									</form>
									</div>
								</div>
							</div>";
						}
						else if(isset($_GET['add_sub'])) {
							echo '
								<form action="admin_server.php" method="POST">
								<div class="form-group">
								<label>Subject Name</label>
								<input class="form-control" name="sub_name" placeholder="Enter Subject Name" required></div>
								<button type="submit" class="btn btn-md btn-primary">Add</button></form>';
						}
						else if(isset($_GET['del_sub'])) {
							echo '
								<form action="admin_server.php" method="POST">
								<div class="form-group">
								<label>Subject Name</label>
								<select name="del_subid" id="del_subid" class="form-control">';
				                  
				                  // extracting list of subjects.
				                      $query = "select * from subjects order by sub_id";
				                      $rs = $conn->query($query) or die($conn->error);
				                      if($rs -> num_rows > 0){
				                      while($row = $rs->fetch_assoc()) {
				                          extract($row);
				                          echo "<option value='$sub_id'>$sub_name</option>";
				                      }
				                  }     
				                echo '
				                </select>
								</div>
								<button type="submit" class="btn btn-md btn-primary">Delete</button></form>';
						}
						else{
							$sqlquery = "select * from subjects";
							$result = $conn->query($sqlquery);
							while($row = $result->fetch_assoc()) {
								echo "<li><a href='subjects.php?sub=".$row['sub_id']."'>";
								echo $row["sub_name"]."</a></li>";	
							}
						}?>
					</div>
				</div>		
		</div>

		
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</body>
</html>