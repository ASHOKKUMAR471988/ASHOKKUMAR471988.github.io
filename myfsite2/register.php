<?php

session_start();
session_destroy();


?>

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

  <script type="text/javascript">
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $('#test').attr('src', e.target.result);
       }
        reader.readAsDataURL(input.files[0]);
       }
    }
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
<body >
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
<div class="container" style="background-color: lightblue">
  <h1 align="center">Register</h1>
  <h3 align="center">Create your account. It's free and only takes a minute.</h3><br><br>
 <form action="ureg.php" method="POST" enctype="multipart/form-data" name="" >
  <div class="row">
  <div class="col-sm-2"></div>
<div class="col-sm-8"> Gender<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label></span><input type="radio" name="optradio" value="Male" ><B>Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><input type="radio" name="optradio" value="Female" >Female</label></div>
<div class="col-sm-2"></div>
 </div><br><br>

  <div class="row">
    <div class="col-sm-2"></div>
<div class="col-sm-8" align="center"><input type="text" class="form-control" pattern="(^[a-zA-Z\s]*$)" required="required" placeholder="Enter Full Name" name="fname"></div>

<div class="col-sm-2"></div>

  </div><br><br>
  <div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8"><input type="email"class="form-control" required="required" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" placeholder="Enter Email" name="email"></div>
<div class="col-sm-2"></div>
</div><br><br>  
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-4"> <input type="file"class="form-control" onchange="readURL(this);" placeholder="Upload Photo" name="imge"><br><br><input type="text"class="form-control" required="required" pattern="([0-9]{10})" placeholder="Enter Mobile Number" name="mnbr"><br><br></div>
<div class="col-sm-4">
<img alt="" id="test" class="img-responsive"  width="43%" align="right" src="#" /></div> 
<div class="col-sm-2"></div>  
</div><br>
 <div class="row">
<div class="col-sm-2"></div>

<div class="col-sm-8"><h4 style="color: red"> * Password must be 8 char long with min 1 letter min 1 symbol and  min 1 number <h4><input type="password"class="form-control" pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*#?&])[a-zA-Z\d@$!%*#?&]{8,}$" required="required" placeholder="Enter Password" name="pwd"></div>
<div class="col-sm-2"></div>
</div><br><br>
 <div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8"><input type="password"class="form-control" placeholder="Confirme Password" name="cpwd"></div>
<div class="col-sm-2"></div>
</div><br><br>

 <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
  <label class="checkbox-inline"><input type="checkbox" value="checked" name="chkb">I accept the terms of use and privacy policy.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </div>
  <div class="col-sm-2"></div>
</div><br><br>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8"><input type="Submit" name="regst"  value="Submit" class="btn btn-success btn-block"></div>
  <div class="col-sm-2"></div>
</div>
<br><br>

</form>
</div>
<br>
<div class="container-fluid">

 <div class="footer">
<div class="row" >
  <div class="col-sm-4"><h4 align="center" style="color: white">Contact Us By Digits<h4><h5 align="center" style="color: white"><span class="glyphicon glyphicon-earphone" >  9838473411</span></h5></div>
  <div class="col-sm-4"><h4 align="center" style="color: white">Contact Us By Media<h4><h5 align="center" style="color: white"><span class="glyphicon glyphicon-envelope" >  erashokkumarbbs11@mail.com</span></h5> </div>
  <div class="col-sm-4"><h4 align="center" style="color: white">Copyright<h4> <h5 align="center" style="color: white"><span class="glyphicon glyphicon-copyright-mark" > SPAAT SOLUTION.All copyright are reserved.<br> <BR>Designed By SPAAT SOLUTION</span></h5> </div>



</div>
</div>
</body>
</html>
