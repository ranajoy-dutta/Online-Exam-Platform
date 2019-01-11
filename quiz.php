		
<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:quiz.php");
}
$counter=0;
	
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
} 

/*include("header.php");
if($_SESSION[qn]<3)
{
include("d1.php");
}
if($_SESSION[qn]>2 and $_SESSION[qn]<7) 
{
include("d2.php");
}
if($_SESSION[qn]>6 and $_SESSION[qn]<11) 
{
include("d3.php");
}
if($_SESSION[qn]>10 and $_SESSION[qn]<15) 
{
include("d4.php");
}
if($_SESSION[qn]>14 and $_SESSION[qn]<19) 
{
include("d5.php");
}*/
$query="select * from mst_question";

$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question')
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
							$counter=1;
						
		
				}
				else {$counter=0;}
								$_SESSION[qn]=$_SESSION[qn]+1;
								
				mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/y")."',$counter)") or die(mysql_error());
		
		}
		else if($submit=='Get Result')
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				
				echo "<h1 class=head1> Result</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td>Total Question<td> $_SESSION[qn]";
				echo "<tr class=tans><td>True Answer<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><td>Wrong Answer<td> ". $w;
				echo "</table>";
				mysql_query("insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/y")."',$_SESSION[trueans])") or die(mysql_error());
				echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
/*$count=mysql_query("select * from mst_question");
$c=mysql_num_rows($count);
$rand=rand(1,$c);
$rs=mysql_query(select * from mst_question where test_id>'$rand' LIMIT 3);*/
$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}

mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);

    echo "<form id=myfm method=post action=quiz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tR><td><span class=style2>Que ".  $n ." "."$row[2]</style>";
echo "<tr><td class=style8><input type=radio name=ans value=1>$row[3]";
echo "<tr><td class=style8> <input type=radio name=ans value=2>$row[4]";
echo "<tr><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result'></form>";
echo "</table></table>";

?>
<!DOCTYPE html>
<html>
	<head>
		<title>IINTM QUIZ</title>
		
		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');

		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
		     last = parseInt(element.substr(element.length - 1));
		     nex=last+1;
		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
		 });

		 $(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });

		</script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->
		<style>
			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
		</style>
	</head>
	
	    <header>
            <p class="text-center">
               <center><h2> <font color="red">Welcome : </font><strong><font color="green"><?php if(!empty($_SESSION['login'])){echo $_SESSION['login'];}?></font></strong></h2></center>
            </p>
        </header>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>

		</script>
		<html>
<body bgcolor="#A3E4D7">
<center><b>Time Remaining:</b></center>
<h1><p id="demo" align="center"></p></h1>


<script>

// Set the date we're counting down to
var countDownDate = new Date("jan 12, 2019 13:40:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
	 
    
    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    minutes=checkTime(minutes);  
    seconds=checkTime(seconds); 
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = minutes + ": " + seconds + " ";
    function checkTime(i){  
if (i<10){  
  i="0" + i;  
 }  
return i;  
}  
    // If the count down is over, write some text 
    if (distance <= 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Time up";
		window.location='result.php';
    }
}, 1000);

</script>

</body>
</html>

