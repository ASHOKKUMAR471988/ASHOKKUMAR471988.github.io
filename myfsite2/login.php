<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project Worlds || TEST YOUR SKILL </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  
<title>Online Exam Portal</title>
 </head>
<body style="background-color: white">

<div class="container-flued">
<img src="cl.png" width="100%" >


  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li ><a href="home.php"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
        </ul>
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
    </ul>
  </div>
</nav> 

</div>


<div class="col-sm-3">
  <img class="img-responsive" src="lo.jpg" alt="Chania" width="50%" height="345"> 
</div>
<div class="col-sm-6">
<form name="appointment"action="clogin.php" method="POST">
  <div class="form-group">
    <label for="Id">User Id:</label>
    <input type="text" class="form-control" name ="username" required="required">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" required="required" >
  </div>
  
  <input type ="submit" name="Submit" class="btn btn-primary btn-block" >
</form> </div>
<div class="col-sm-3">
  
  <img class="img-responsive" src="lo.jpg" alt="Chania" width="50%" align="right" height="345">
</div>

</div>








</body>
</html>