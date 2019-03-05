<?php
session_start();
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);



if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;
header("location:userqz.php");
}
if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="quiz.css" rel="stylesheet" type="text/css">
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
</head>
<body>



	<div class="container-fluid">
	

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      
      <li><a href="">BANK</a></li>
      <li><a href="#">SSC</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="" method="post">
      
    </form>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>

  </div>
</nav> 

<div class="row">
<div class="col-sm-2">
	<a href="user.php" ><button type="button"   class="btn btn-primary">HOME</button></a>
</div>
	<div class="col-sm-8">
<?php





if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysql_query("delete from useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo "<h1   align=center><font color=green size=5> <b>Result </b></h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><td><font color=brown size=4> Total Question<td> $_SESSION[qn]";
				echo "<tr ><td><font color=brown size=4>True Answer<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr ><td> <font color=brown size=4>Wrong Answer<td> ". $w;
				echo "</table>";
				mysql_query("insert into result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysql_error());
				
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysql_query("select * from question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=home.php> Start Again</a>";

exit;
}
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
echo "<form name=myfm method=post action=userqz.php>";
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;
echo "<tr ><td > <font color=brown size=5 ><span >Que ".  $n .": $row[2]</style>";
echo "<tr><td ><font color=blue  size=5 ><input type=radio name=ans value=1>$row[3]";
echo "<tr><td ><font color=blue  size=5 > <input type=radio name=ans value=2>$row[4]";
echo "<tr><td> <font color=blue  size=5 > <input type=radio name=ans value=3>$row[5]";
echo "<tr><td> <font color=blue  size=5  ><input type=radio name=ans value=4>$row[6]";

if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<tr><td> <font color=green size=5 ><input type=submit name=submit value='Next Question'></form>";
else
echo "<tr><td><font color=green size=5 ><input type=submit name=submit value='Get Result'></form>";
echo "</table></table>";
?>
</div>
<div class="col-sm-4"></div>
</div>
</body>
</html>