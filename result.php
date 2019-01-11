<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz  - Result </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#A3E4D7">
<?php
include("header.php");
include("database.php");
extract($_SESSION);
$rs=mysql_query("select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
t.test_id=r.test_id and r.login='$login'",$cn) or die(mysql_error());

echo "<h1 class=head1> Result </h1>";
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
	exit;
}
echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
				echo "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><td>Wrong Answer<td> ". $w;
				echo "</table>";
				echo "<br><br><br>";
				echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
echo "<table border=1 align=center><tr class=style2><td width=300>Test Name <td> Total<br> Question <td> Exam Date <td> Marks";
while($row=mysql_fetch_row($rs))
{
echo "<tr class=style8><td>$row[0] <td align=center> $row[1] <td align=center> $row[2] <td align=center> $row[3]";
}
echo "</table>";

?>
</body>
</html>
