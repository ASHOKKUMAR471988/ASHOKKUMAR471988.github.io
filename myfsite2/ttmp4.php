<?php
include ("Database.php");
$sql="select * from reg where id=46";
$sth=mysql_query($sql);
$result=mysql_fetch_array($sth);
echo '<img  width="100" height="100"src="data:image/jpeg;base64,' .base64_encode($result['img']).'"/>';
?>