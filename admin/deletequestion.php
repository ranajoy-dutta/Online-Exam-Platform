
<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");

include("header.php");
?>
<body>
<img src="um.jpg">
</body>