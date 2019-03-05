<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
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


<?php

include("database.php");
extract($_GET);

$rs=mysql_query("select * from test where sub_id=$subid");
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h2 align=center><font size=6 color=orange> <b> Sorry ? <br> No Quiz for this Subject</b></font> </h2>";
	exit;
}

echo "<h2 class=head1 align=center><font color=green> Select Quiz Name to Give Quiz </h2>";
echo "<table align=center>";

while($row=mysql_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=userqz.php?testid=$row[0]&subid=$subid><font size=5>$row[2]</font></a>";
}
echo "</table>";
?>





</body>
</html>