<?php
session_start();
if($_SESSION["user"])
{}
else
{ 
  header("location: home.php"); 
}
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

unset($_SESSION[ceid]);

if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;

}


if($submit=='Close Test')
{
  
unset($_SESSION[tid]);
unset($_SESSION[trueans]);
unset($_SESSION[qn]);
$_SESSION[ceid]=1;

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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
  <nav class="navbar navbar-inverse">
 <ul class="nav navbar-nav">
  <li><a href="#">
        <?php
        echo "Login Id" ," ".$_SESSION["user"];
        ?>
</a></li>

    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>

  </div>
</nav> 
</div>
<div class="container-fluid">
 <div class="row" style="background-color: " >
 <div class="col-sm-10"><?php echo ' <b> <h3 align=left  > Candidate Name: '  . $_SESSION['uname'] . '</h3></b><br>'; echo '<h3>Date :' .Date("d/m/y"); ?> </div>
 <div class="col-sm-2"><?php echo '<img  width="110" height="130" align=right src="data:image/jpeg;base64,' .base64_encode($_SESSION['uig']).'"/>';
?></div></div> 

 <div class="row">
  
 <div class="col-sm-2">

  <?php
 include("database.php");
$rs=mysql_query("select * from subject");
 while($row=mysql_fetch_row($rs)){
  if($subid==$row[0])
  echo '<a href=qz.php?subid='.$row[0].'><input type="button" class="btn btn-warning btn-block" value='.$row[1] .'><br></a>'; 
  if(($subid>0)&&($subid!=$row[0]))
  echo '<a href=qz.php?subid='.$row[0].'><input type="button" disabled="disabled"class="btn btn-primary btn-block" value='.$row[1] .'><br></a>'; 
if($subid==0)
  echo '<a href=qz.php?subid='.$row[0].'><input type="button" class="btn btn-primary btn-block" value='.$row[1] .'><br></a>'; 
  
  
}
//echo '<a href="myresult.php"><BUTTON type="button"   class="btn btn-primary btn-block"  >RESULT</BUTTON></a>';?></div>
 <div class="col-sm-8">
 <div class="row"><div class="well" style="background-color: white " ><?php
 if(!isset($subid))
 echo '<h2  color=green align=center>Please Select Your Exam Type</h2>';
 extract($_GET);
 if(isset($subid)){
 $rs=mysql_query("select * from test where sub_id=$subid");
 if(mysql_num_rows($rs)<1)
{
  echo " <a href=qz.php align='center'><input type=submit name=submit class='btn btn-danger'  value='Close Exam'></a>";
  echo "<br><br><h2 align=center><font size=6 color=orange> <b> Sorry ? <br> There is no any Quiz for this Exam</b></font> </h2>";

  exit;
}
while($row=mysql_fetch_row($rs))
{
  if($_SESSION[tid]==$row[0])
 echo '<a href=qz.php?testid='.$row[0]. '&subid='.$subid.'><input type="button" class="btn btn-warning"  value='.$row[2] .'></a>';  
if(($_SESSION[tid]>0)&&($_SESSION[tid]!=$row[0]))
echo '<a href=qz.php?testid='.$row[0]. '&subid='.$subid.'><input type="button" class="btn btn-primary" disabled="disabled"value='.$row[2] .'></a>';  
if($_SESSION[tid]==0)
echo '<a href=qz.php?testid='.$row[0]. '&subid='.$subid.'><input type="button" class="btn btn-primary"  value='.$row[2] .'></a>';  
  
}
echo '<spam></spam>';
if(isset($subid)&&(!isset($_SESSION[tid])))
echo " <a href=qz.php?><input type=submit name=submit class='btn btn-danger'  value='Close Exam'></a>";
elseif(isset($subid)&&isset($_SESSION[tid]))
  echo " <a href=qz.php?><input type=submit name=submit class='btn btn-danger' disabled='disabled' value='Close Exam'></a>";
elseif($_SESSION[ceid]==1)
  echo " <a href=qz.php?><input type=submit name=submit class='btn btn-danger' value='Close Exam'></a>";


}
?>

 <div class="row">
  
<?php

if(isset($_SESSION[sid]) && isset($_SESSION[tid]))
{
if(!isset($_SESSION[qn]))
{
  $_SESSION[qnn]=0;
  $_SESSION[qn]=0;
  //mysql_query("delete from useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
  mysql_query("truncate useranswer ") or die(mysql_error());
  $_SESSION[trueans]=0;
  
}
else
{ 
    if($submit=='Save & Next ' && isset($ans))
    {
      
       $rs=mysql_query("select * from question where test_id = '$tid' ",$cn) or die(mysql_error());
        mysql_data_seek($rs,$_SESSION[qn]);
        $row= mysql_fetch_row($rs); 
        mysql_query("insert into useranswer(qno,sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('$_SESSION[qnn]','".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
        if($ans==$row[7])
        {
              $_SESSION[trueans]=$_SESSION[trueans]+1;
        }
        $_SESSION[qn]=$_SESSION[qn]+1;
    }
    else if($submit=='Get Result' && isset($ans))
    {
       $rs=mysql_query("select * from question where test_id=$tid",$cn) or die(mysql_error());
        mysql_data_seek($rs,$_SESSION[qn]);
        $row= mysql_fetch_row($rs); 
        mysql_query("insert into useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
        if($ans==$row[7])
        {
              $_SESSION[trueans]=$_SESSION[trueans]+1;
        }
        echo "<h1   align=center><font color=green size=5> <b>Result </b></h1>";
        $_SESSION[qn]=$_SESSION[qn]+1;
        echo "<Table align=center><tr class=tot><td><font color=brown size=4> Total Question<td> $_SESSION[qn]";
        echo "<tr ><td><font color=brown size=4>True Answer<td>".$_SESSION[trueans];
        $w=$_SESSION[qn]-$_SESSION[trueans];
        echo "<tr ><td> <font color=brown size=4>Wrong Answer<td> ". $w;
        echo "</table>";
        
        mysql_query("insert into result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysql_error());
        
        unset($_SESSION[qn]);
        unset($_SESSION[sid]);
        unset($_SESSION[tid]);
        unset($_SESSION[trueans]);
        echo " <a href=qz.php?subid=$subid><input type=submit name=submit class='btn btn-danger' value='Close Test'></a>";
        exit;


    }
    else if($submit=='Update & Next' && isset($ans))
    {

    $rs=mysql_query("update useranswer set your_ans='$ans' where qno=".$_SESSION[qnn]." ",$cn) or die(mysql_error());
    $_SESSION[qn]=$_SESSION[qn]+1;
    }
    else if($submit=='Update & Next' && !isset($ans))
    {

    //$rs=mysql_query("update useranswer set your_ans='$ans' where qno=".$_SESSION[qnn]." ",$cn) or die(mysql_error());
    $_SESSION[qn]=$_SESSION[qn]+1;
    }

    
    
}
$rs=mysql_query("select * from question where test_id=".$_SESSION[tid]." ",$cn) or die(mysql_error());
if($_SESSION[qn]>0)
{
$_SESSION[qn]=$_SESSION[qn]+1;
$q=mysql_query("select your_ans from useranswer where qno=".$_SESSION[qn] . " ");
$r=mysql_num_rows($q);
$rd=mysql_fetch_row($q);
if($r>0){
  $_SESSION[qn]=$_SESSION[qn]-1;
  $p=1;}
else{
  $_SESSION[qn]=$_SESSION[qn]-1;
  $p=0;}



}
if(isset($que_id))
{
$q=mysql_query("select your_ans from useranswer where qno='$que_id' and test_id='$_SESSION[tid]'");
$r=mysql_num_rows($q);
$rd=mysql_fetch_row($q);
if($r>0){
  $_SESSION[qn]=$que_id-1;
  $p=1;
}
else{
  $p=0;
$_SESSION[qn]=$que_id-1;}

}

mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
if(isset($_SESSION[qn])){
echo "<form name=myfm method=post action=qz.php?subid=$subid>";
echo '<table width=100% class="table table-striped"> <tr> <td width=30>&nbsp;<td> <table border=0 >';
if(isset($que_id))
  $_SESSION[qnn]=$que_id;

else
  $_SESSION[qnn]=$_SESSION[qn]+1;
echo "<tr ><td > <font color=black size=4 ><span >Que ".  $_SESSION[qnn] .": $row[2]</style><br><br><br>";
if($rd[0]==1)
echo "<tr><td><font   size=3 ><input type=radio name=ans value=1 checked>$row[3]<br><br><br>";
else
  echo "<tr><td><font   size=3 ><input type=radio name=ans value=1 >$row[3]<br><br><br>";
if($rd[0]==2)
echo "<tr><td><font   size=3 ><input type=radio name=ans value=2 checked>$row[4]<br><br><br>";
else
echo "<tr><td><font   size=3 ><input type=radio name=ans value=2 >$row[4]<br><br><br>";

if($rd[0]==3)
echo "<tr><td ><font   size=3 > <input type=radio name=ans value=3 checked>$row[5]<br><br><br>";
else
  echo "<tr><td ><font   size=3 > <input type=radio name=ans value=3 >$row[5]<br><br><br>";
if($rd[0]==4)
echo "<tr><td> <font   size=3 > <input type=radio name=ans value=4 checked>$row[6]<br><br><br>";
else
echo "<tr><td> <font   size=3  ><input type=radio name=ans value=4>$row[6]<br><br><br><br><br>";


echo "</table></table>";
echo '<div class="well" style="background-color: white " >';
if(($p==1)&&($_SESSION[qn]<mysql_num_rows($rs)-1)){
echo "<tr><td> <input type=submit name=submit class='btn btn-warning' value='Update & Next'><td> <input type=submit name=submit class='btn btn-danger' value='Close Test'></form>";
}
if(($_SESSION[qn]<mysql_num_rows($rs)-1)&&($p==0))
echo "<tr><td> <input type=submit name=submit class='btn btn-success' value='Save & Next '><td> <input type=submit name=submit class='btn btn-danger' value='Close Test'></form>";
if(($_SESSION[qn]==mysql_num_rows($rs)-1)&&($p==0)){
echo "<tr><td><input type=submit name=submit class='btn btn-success' value='Get Result'><td> <input type=submit name=submit class='btn btn-danger' value='Close Test'></form>";}
echo "</table>";  
echo '</div>';



}
}


?>
 </div></div>
 </div>  
 </div>
 <div class="col-sm-2">
  <div class="row">





    <?php

    if(isset($_SESSION[tid]))
    {

    echo'<div class="panel panel-primary">';
      echo'<div class="panel-heading"><h4 align="center">Question Reveiw</h4></div>';
      echo'<div class="panel-body" >';
  
  if(isset($_SESSION[tid])){
  
$rs=mysql_query("select * from question where test_id=".$_SESSION[tid]." ",$cn) or die(mysql_error());
$tn=mysql_num_rows($rs);
$row=mysql_fetch_row($rs);
for($n=1; $n<=$tn;$n++)
{

  echo '<a href=qz.php?subid='.$subid.'&que_id='.$n.'><input type="button" class="btn btn-warning"value='.$n.'></a><spam>  </spam>';
}}}

 echo '</div></div>';
  ?></div>
   
 </div>
 </div>
</body>
</html>