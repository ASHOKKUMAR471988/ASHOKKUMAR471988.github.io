
<?php


session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$userid = ($_POST["username"]);
$password = ($_POST["password"]);
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die ("not connected" .mysql_error());
}
mysql_select_db("first_db", $con);

$sql = "select * from reg where id='$userid' and pswd='$password'";
$result = mysql_query($sql,$con) or die (mysql_error($con));
$count =  mysql_num_rows($result);
$nf=mysql_fetch_array($result);
$uname=$nf['uname'];
$uimg=$nf['img'];



if($count == 1)
{
$_SESSION["user"]=$userid;
$_SESSION["uname"]=$uname;
$_SESSION["uig"]=$uimg;

header("location:qz.php");
  
    }



else
{
	
	print '<script> alert("incorrect password")</script>';
	print '<script> window.location.assign("login.php")</script>';
}
	
}

?>

</body>
</html>

