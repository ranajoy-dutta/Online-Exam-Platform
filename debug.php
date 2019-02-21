<!DOCTYPE html>
<html>
<head>
	<title>H|A|R Debug</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="container">
	<p class="display-4 text-center">Debug Center</p><hr><br>
	<h3 class="text-center"><u>Session Variables</u></h3>
	<div class="row">		
		<div class="col-2 font-weight-bold">Starting Session</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo session_start();?></div>
	</div>
	<div class="row">		
		<div class="col-2 font-weight-bold">session id</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo session_id() ?></div>
	</div>
	<div class="row">		
		<div class="col-2 font-weight-bold">username</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo $_SESSION['username'] ?></div>
	</div>
	<div class="row">		
		<div class="col-2 font-weight-bold">userid</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo $_SESSION['userid'] ?></div>
	</div>
	<div class="row">		
		<div class="col-2 font-weight-bold">time</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo $_SESSION['time'] ?></div>
	</div>
	<div class="row">		
		<div class="col-2 font-weight-bold">test_in_progress</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo $_SESSION['test_in_progress'] ?></div>
	</div>
	<div class="row">		
		<div class="col-2 font-weight-bold">attempts</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php if (isset($_SESSION['attempts'])) echo '1' ?></div>
	</div>


	<br>
	<!--Database Check -->
	<h3 class="text-center"><u>Database</u></h3>
	<div class="row">		
		<div class="col-2 font-weight-bold">Connection</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9"><?php echo (include('connection.php'));?></div>
	</div>

	<div class="row">		
		<div class="col-2 font-weight-bold">Query</div>
		<div class="col-1 font-weight-bold">----></div>
		<div class="col-9">
			<?php 
				$sql = "SELECT * FROM submissions";
				$result = $conn->query($sql);
				if ($result->num_rows >= 1) echo "1"; 
				else echo "Error : " . $sql . "<br>" . $conn->error; ?>
				</div>
	</div>
</body>
</html>

