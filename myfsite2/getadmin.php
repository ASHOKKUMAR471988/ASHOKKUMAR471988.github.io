<?php

include("database.php");
echo " <h2 align=center><font color=brown> <B>WELCOME!</B> <h2>" ;



$rs=mysql_query("select count(sub_name) from subject");



while($row=mysql_fetch_row($rs))
{
	echo "<h3  align=center> <font color =green><b> There are Total <font color=brown>$row[0] </font>subject in your course</b></font></h3>";
  
}
$rs=mysql_query("select * from subject");

echo "<table  align=center>";
while($row=mysql_fetch_row($rs))
{
  echo "<tr><td align=center ><a <font size=4>$row[1]</font></a>";
}
echo "</table>";





?>