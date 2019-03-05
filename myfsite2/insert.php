<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
session_start();
if(isset($_SESSION['counter']))
{

$_SESSION['counter']+=1;

} else
{

$_SESSION['counter']=1;

}


$msg="u have visited this page".$_SESSION['counter'];
$msg.="in this session .";
?>

</head>
<body>
	<?php
	echo ($msg);
	?>

	<input type="submit" name="">

</body>
</html>