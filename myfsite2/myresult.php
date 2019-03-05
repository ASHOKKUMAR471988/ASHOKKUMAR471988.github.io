<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
	<title></title>
</head>
<body>
<a href="qz.php"><button type="button"  class="btn btn-primary">HOME</button></a>

</body>
</html>

<?php

include("database.php");
extract($_SESSION);
$rs=mysql_query("select t.test_name,t.total_que,r.test_date,r.score from test t, result r where
t.test_id=r.test_id and r.login='$login'",$cn) or die(mysql_error());

echo "<h1 align=center ><font color=green> Result</font></h1><br><br>";
if(mysql_num_rows($rs)<1)
{
	echo "<br><br><h1  align=center><font color=orange> You have not given any quiz</h1>";
	exit;
}
echo "<table  align=center> <tr  color=green ><td width=300><font size=5 color= green>Test Name <td width=200> <font size=5 color= green>Total Question <td width=100> <font size=5 color= green>Score";
while($row=mysql_fetch_row($rs))
{
echo "<tr class=style8><td ><font size=4>$row[0] <td > $row[1]  <td> $row[3] <td> $row[4]     ";
}
echo "</table>";
?>