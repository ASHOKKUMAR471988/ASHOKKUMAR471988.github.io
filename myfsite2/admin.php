<?php
session_start();
if($_SESSION["admn"])
{
  
}
else
{

header("location:home.php");

}



?>


<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>
 <script src="js/bootstrap.min.js"  type="text/javascript"></script>

  
  
	<title></title>



</style>

	
	  
</head>
<body style="background:#eee;">

	
	<div class="container-fluid">
		<img src="p1.jpg" alt="Chania" width="100%" height="30%"> 
		
	 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php">Admin Dashboard</a></li>
     
    </ul>
    <form class="navbar-form navbar-right" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
    <ul class="nav navbar-nav navbar-right">
      
      <li class="pull-right"> <a href="logout.php"><span class="glyphicon glyphicon-log-out" ></span>&nbsp;Signout</a></li>
    </ul>
  </div>
</nav> 
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="admin.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="admin.php?q=1">User</a></li>
        <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="admin.php?q=3">Edit Exam</a></li>
        <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="admin.php?q=4">Edit Test</a></li>
        <li <?php if(@$_GET['q']==5) echo'class="active"'; ?>><a href="admin.php?q=5">Edit question</a></li>
    
   </ul>
  </ul>
  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</form><br>
</div>
</body>
</html>

<div class="container">
<?php
include("Database.php");
 if(@$_GET['q']==3) {
$result = mysql_query("SELECT * FROM subject") or die('Errror');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subjects id </b></td><td><b>Subjects</b></td><td><b>Delete Exam</b></td></tr>';
$c=1;
while($row = mysql_fetch_row($result)) {
  $id = $row[0];
  $name=$row[1];
  echo '<tr><td>'.$c++.'</td><td>'.$id.'</td><td>'.$name.'</td><td><a href=updat.php?eid='.$id.'><input type="button" value="Delete" class="btn btn-danger"></a></td></tr>';
}
$c=0;
echo '</table></div></div>';
echo '<tr> <td><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal"> Add Exam</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Exam</h4>
      </div>
      <div class="modal-body">
      <form action="updat.php" method="POST">

        
        <input type="text" class="form-control" required="required"placeholder="Enter Exam Name" name="adexm"><br>
        <input type="submit" class="btn btn-primary" value="Add ">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>



</div></td><td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal3">Update Exam</button>

<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Exam</h4>
      </div>
      <div class="modal-body">
        <form action="updat.php" method="POST">

        
        <input type="text" class="form-control" required="required" placeholder="Enter Exam id" name="updt"><br>
        <input type="text" class="form-control" required="required" placeholder="Enter Exam Name" name="updts"><br>
        <input type="submit" class="btn btn-primary" value=" Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td></tr>';
}

?>
</div>

<div class="container">
<?php

include("Database.php");
 if(@$_GET['q']==4) {
  

$result = mysql_query("select * from test") or die('Errror');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Test_Id</b></td><td><b>Exam_Id</b></td><td><b>Test Name</b></td><td><b>Total_Quetion</b></td></tr>';
$c=1;
while($row = mysql_fetch_row($result)) {
  $td = $row[0];
 $sd=$row[1];
 $tn=$row[2];
 $tq=$row[3];

  echo '<tr><td>'.$c++.'</td><td>'.$td.'</td><td> '.$sd.' </td><td>'.$tn.'</td><td>'.$tq.'</td><td><a href=updat.php?tid='.$td.'><input type="button" value="Delete" class="btn btn-danger"></a></td></tr>';
}
$c=0;
echo '</table></div></div>';
echo '<tr> <td ><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal4"> Add Test</button>

<!-- Modal -->
<div id="myModal4" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Test</h4>
      </div>
      <div class="modal-body">
      <form action="updat.php" method="POST">

        
        <input type="text" class="form-control" required="required" placeholder="Enter Exam Id" name="exid"><br>
        <input type="text" class="form-control" required="required" placeholder="Enter Test Name " name="tname"><br>
        <input type="text" class="form-control"  required="required"placeholder="Enter Total No. of Question" name="tq"><br>
        <input type="submit" class="btn btn-primary" value="Add ">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>

</div></td><td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal6">Update Exam</button>

<!-- Modal -->
<div id="myModal6" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Test</h4>
      </div>
      <div class="modal-body">
        <form action="updat.php" method="POST">

        
        <input type="text" class="form-control" required="required" placeholder="Enter Testid" name="testid"><br>
        <input type="text" class="form-control" required="required" placeholder="Enter New Exam id" name="exidd"><br>
        <input type="text" class="form-control" required="required" placeholder="Enter New Test Name" name="tnam"><br>
        <input type="text" class="form-control" required="required" placeholder="Enter New total no. of question" name="tn"><br>
        <input type="submit" class="btn btn-primary" value=" Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td></tr>';
}



?>
</div>
<div class="container">
<?php

include("Database.php");
 if(@$_GET['q']==5) {
  

$result = mysql_query("SELECT * FROM question") or die('Errror');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Question_Id</b></td><td><b>Test_Id</b></td><td><b>question</b></td><td><b>Option 1</b></td><td><b>Option 2</b></td><td><b>Option 3</b></td><td><b>Option 4</b></td><td><b>Righ Option</b></td><td><b>Delete Questions</b></td></tr>';
$c=1;
while($row = mysql_fetch_row($result)) {
  $qid = $row[0];
  $tid = $row[1];
  $q= $row[2];
  $o1 = $row[3];
  $o2 = $row[4];
  $o3 = $row[5];
  $o4 = $row[6];
  $ra=$row[7];
  
 

  echo '<tr><td>'.$c++.'</td><td>'.$qid.'</td><td>'.$tid.'</td><td>'.$q.'</td><td>'.$o1.'</td><td>'.$o2.'</td><td>'.$o3.'</td><td>'.$o4.'<td>'.$ra.'</td></td><td><a href=updat.php?qid='.$qid.'><input type="button" value="Delete" class="btn btn-danger"></a></td></tr>';
}
$c=0;
echo '</table></div></div>';



echo '<tr> <td><button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal7"> Add Question</button>

<!-- Modal -->
<div id="myModal7" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Question</h4>
      </div>
       <div class="modal-body">
      <form action="updat.php" method="POST">';
echo "<select name='qqid'>";
$reslt = mysql_query("SELECT test_id FROM test") or die('Errror');
while($rno=mysql_fetch_row($reslt))
{
  $ro=$rno[0];

unset($tidd);
echo '<option > '.$ro.'   </option>';

}
echo '</select>';
        
       echo '<input type="text" class="form-control"  required="required" placeholder="Enter Question" name="qus"><br>
       <input type="text" class="form-control" required="required" placeholder="Enter First Option" name="o1"><br>
       <input type="text" class="form-control" required="required" placeholder="Enter second Option" name="o2"><br>
       <input type="text" class="form-control"required="required" placeholder="Enter Third Option" name="o3"><br>
       <input type="text" class="form-control"required="required" placeholder="Enter Fourth Option" name="o4"><br>
       <input type="text" class="form-control"required="required" placeholder="Enter Right Option" name="ro"><br>
       
        <input type="submit" class="btn btn-primary" value="Add ">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>

</div></td><td><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal9">Update Question</button>

<!-- Modal -->
<div id="myModal9" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Question</h4>
      </div>
      <div class="modal-body">
        <form action="updat.php" method="POST">
        Select Test Id ';
        

        echo "<select name='testid' >" ;
$reslt = mysql_query("SELECT test_id FROM test") or die('Errror');
while($rno=mysql_fetch_row($reslt))
{
  $ro=$rno[0];

unset($tidd);
echo '<option > '.$ro.'   </option>';

}
echo '</select> ';

echo ' <input type="text" class="form-control"  placeholder="Enter Question Id" name="qqqid"><br>
       <input type="text" class="form-control"  placeholder="Enter Question" name="qus"><br>
       <input type="text" class="form-control" placeholder="Enter First Option" name="o1"><br>
       <input type="text" class="form-control"  placeholder="Enter second Option" name="o2"><br>
       <input type="text" class="form-control"  placeholder="Enter Third Option" name="o3"><br>
       <input type="text" class="form-control"  placeholder="Enter Fourth Option" name="o4"><br>
       <input type="text" class="form-control" v placeholder="Enter Right Option" name="ro"><br>


        
      
        
        <input type="submit" class="btn btn-primary" value=" Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td></tr>';


}?>
</div>

<?php

?>

<div class="container">
<?php
include("Database.php");
 if(@$_GET['q']==1) {
$result = mysql_query("SELECT * FROM reg") or die('Errror');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Userid</b></td><td><b>Name</b></td><td><b>Email</b></td><td><b>Mobile No.</b></td><td><b>Image</b></td><td><b>Password</b></td><td><b>Delete User</b></td></tr>';
$c=1;
while($row = mysql_fetch_row($result)) {
  $uid = $row[0];

  //$g=$row[1];
  $uname=$row[2];
  $email=$row[3];
  $img=$row[4];
  $mno=$row[5];
  $pwd=$row[6];
  echo '<tr><td>'.$c++.'</td><td>'.$uid.'</td><td>'.$uname.'</td><td>'.$email.'</td><td>'.$mno.'</td><td><img  width="100" height="120" align=centre src="data:image/jpeg;base64,' .base64_encode($img).'"/></td><td>'.$pwd.'</td><td><a href=updat.php?did='.$uid.'><input type=submit  class="btn btn-danger" value="Delete"></a></td></tr>';
}
$c=0;
echo '</table></div></div>';
}








?>
</div>


</div></div>
</body>
</html>