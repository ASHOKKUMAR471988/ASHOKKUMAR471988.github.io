<?php
session_start();
if($_SESSION["user"])
{ 



}
else
{
  
  header("location: home.php");
  
}


  ?>





<!DOCTYPE html>
<html lang="en">
<head>
 
<title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<body  >
<div class="container-fluid">
	

  <nav class="navbar navbar-inverse">
  
    <ul class="nav navbar-nav">
      
      
      <li><a href="#">
        <?php
        echo "Login Id" ," ".$_SESSION["user"];
        ?>

      </a></li>

    </ul>
    <form class="navbar-form navbar-right" action="" method="post">
      
    </form>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>

  </div>
</nav> 
<div class="container-fluid">

  <?php

echo'<h3 ><font color="brown">Wellcome '.$_SESSION['uname']; ?>
 
<div class="row">
<div class="col-sm-2"> <?php
include("database.php");
echo "<h3  align=left> <font color =green><b>Select Exam </b></font></h3>";
$rs=mysql_query("select * from subject");
while($row=mysql_fetch_row($rs)){
  echo '<a href=test.php?q=3&subid='.$row[0].'><input type="button" class="btn btn-primary btn-block" value='.$row[1] .'></a><br><br>';  
}
echo '<a href="myresult.php"><BUTTON type="button"   class="btn btn-success btn-block" >RESULT</BUTTON></a>';
?></div>
  <div class="col-sm-10">


<div class="row">
 
  ?>
</div>
 </div>
  
</div>
<div class="col-sm-2" >

</div>
</div>
</body>
</html>

