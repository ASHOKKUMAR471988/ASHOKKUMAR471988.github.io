

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
.footer {
   position: sticky;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #4285F4;
   color: white;
   text-align: center;
}
</style>

  <script>
    
    

  </script>
<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  </head>
<body style="background-color: white">
<div class="container-fluid" style="background-color:white">
	<img class="img-responsive" src="p1.jpg" alt="Chania" width="100%" height="345"> 
</div>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
     
    </ul>
    <form class="navbar-form navbar-right" action="" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> 


<?php
session_start();
if (isset($_SESSION['user']))
{
header("location: register.php");

}

else {

include("Database.php");
if( isset($_POST[chkb]))
{

$imagename=$_FILES["imge"]["name"];  
$imagetmp=addslashes (file_get_contents($_FILES['imge']['tmp_name']));








 $ur=$_POST[fname];
 $p1=$_POST[pwd];
 $p2=$_POST[cpwd];
 if($p1==$p2){
 	$_SESSION['user']=$ur;
$dql=mysql_query("insert into reg (gender,uname,email,img,mon,pswd) values ('$_POST[optradio]','$_POST[fname]','$_POST[email]','$imagetmp','$_POST[mnbr]','$_POST[pwd]')");
if ($dql==true){
	$sql=mysql_query("select id from reg where pswd='$_POST[pwd]'");
	while($row = mysql_fetch_row($sql)) {
  $uid = $row[0];}

echo '<div class="col-sm-4"></div><div class="col-sm-4"><table class="table" align =center> <tr class="danger"><td align="center"><h3>You are successfully Registerd !</td><td></td></tr>
<tr class="info"><td><h4>Userid</td><td><h4>'.$uid.'</td></tr><tr class="info"><td><h4>Password</td><td><h4>'.$p1.'</td></tr><tr class="danger"><td><a href="register.php"><input type="button" class="btn btn-primary" value="Back"></a></td><td><a href="login.php"><input type="button" class="btn btn-primary" value="Login"></a></td></tr></table></div>
<div class="col-sm-4"></div>';



}

	

else{
echo "error";	}

}
else{
print "<script> alert('password mismatch')</script>";	
}


}

else
	echo "error";
}

?>
</body>
</html>

