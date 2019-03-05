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



if(isset($subid) && isset($testid))
{
$_SESSION[sid]=$subid;
$_SESSION[tid]=$testid;

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

<script>
  function setColor(btn){
    var count=1;
    var property = document.getElementById(btn);
    if (count == 0){
        property.style.backgroundColor = "blue"
        count=1;        
    }
    else{
        property.style.backgroundColor = "red"
        count=0;
    }

}


</script>









</head>
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


<div class="row">
  
<div class="col-sm-2">
<?php
include("database.php");

$rs=mysql_query("select * from subject");
while($row=mysql_fetch_row($rs)){
  echo '<a href=qz.php?subid='.$row[0].'><input type="button" onclick="setColor("button")" class="btn btn-primary  btn-block" value='.$row[1] .'><br></a>';  
}
echo '<a href="myresult.php"><BUTTON type="button"   class="btn btn-success  btn-block" >RESULT</BUTTON></a>';?></div>
<div class="col-sm-8">
<div class="row"> <div class="well" style="background-color: #448aff "><?php

extract($_GET);
if(isset($subid)){
$rs=mysql_query("select * from test where sub_id=$subid");
if(mysql_num_rows($rs)<1)
{
  echo "<br><br><h2 align=center><font size=6 color=orange> <b> Sorry ? <br> No Quiz for this Subject</b></font> </h2>";
  exit;
}
while($row=mysql_fetch_row($rs))
{
  echo '<a href=qz.php?testid='.$row[0]. '&subid='.$subid.'><input type="button" class="btn btn-success " value='.$row[2] .'></a>';  
  //echo "<a href=qz.php?testid=$row[0]&subid=$subid><font size=5>$row[2]</font></a>";
}

}

?>
</div>
<div class="row">
  
<?php

if(isset($_SESSION[sid]) && isset($_SESSION[tid]))
{
if(!isset($_SESSION[qn]))
{
  $_SESSION[qn]=0;
  mysql_query("delete from useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
  $_SESSION[trueans]=0;
  
}
else
{ 
    if($submit=='Next Question' && isset($ans))
    {
                $rs=mysql_query("select * from question where test_id=$tid",$cn) or die(mysql_error());
        mysql_data_seek($rs,$_SESSION[qn]);
        $row= mysql_fetch_row($rs); 
        mysql_query("insert into useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
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
        echo "<Table align=center><tr class='table table-striped'><td><font color=brown size=4> Total Question<td> $_SESSION[qn]";
        echo "<tr ><td><font color=brown size=4>True Answer<td>".$_SESSION[trueans];
        $w=$_SESSION[qn]-$_SESSION[trueans];
        echo "<tr ><td> <font color=brown size=4>Wrong Answer<td> ". $w;
        echo "</table>";
        mysql_query("insert into result(login,test_id,test_date,score) values('$login',$tid,'".date("d/m/Y")."',$_SESSION[trueans])") or die(mysql_error());
        
        unset($_SESSION[qn]);
        unset($_SESSION[sid]);
        unset($_SESSION[tid]);
        unset($_SESSION[trueans]);
        exit;
    }
}
$rs=mysql_query("select * from question where test_id=$tid",$cn) or die(mysql_error());
//
if (mysql_num_rows($rs)==0)
echo "<br><br><h2 align=center><font size=6 color=orange> <b> Sorry ? <br> No Quiz for this Test</b></font> </h2>";

  

if($_SESSION[qn]>mysql_num_rows($rs)-1)
{
unset($_SESSION[qn]);

//echo "<h1 class=head1>Some Error  Occured</h1>";
//session_destroy();
//echo "Please <a href=home.php> Start Again</a>";

exit;
}
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
echo "<form name=myfm method=post action=qz.php?subid=$subid >";
echo "<table width=100% class='table table-striped'> <tr> <td width=30>&nbsp;<td> <table border=0 >";
$n=$_SESSION[qn]+1;
echo "<tr ><td > <font color=black size=4 ><span >Que ".  $n .": $row[2]</style><br><br><br>";
echo "<tr><td ><font   size=3 ><input type=radio name=ans value=1>$row[3]<br><br><br>";
echo "<tr><td ><font   size=3 > <input type=radio name=ans value=2>$row[4]<br><br><br>";
echo "<tr><td> <font   size=3 > <input type=radio name=ans value=3>$row[5]<br><br><br>";
echo "<tr><td> <font   size=3  ><input type=radio name=ans value=4>$row[6]<br><br><br><br><br>";
echo "</table></table>";

echo '<div class="well" style="background-color: #448aff " >';
if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<tr><td> <input type=submit name=submit class='btn btn-danger ' value='Back'><td align=right> <input type=submit name=submit class='btn  btn-success' value='Next Question'></form>";
else
echo "<tr><td> <input type=submit name=submit class='btn btn-danger ' value='Back'><td><input type=submit name=submit class='btn  btn-success' value='Get Result'></form>";
echo "</table>";
echo '</div>';  
}
?>
</div>
















</div>  
</div>
<div class="col-sm-2">

<?php
echo " <h4 style align=right>Date " . date("d-m-y") . "</h4><br><br>"; 
echo " <b><h3 style align=right> " . $_SESSION['uname'] . "</h3>"; 
echo '<img  width="140" height="160" align=right src="data:image/jpeg;base64,' .base64_encode($_SESSION['uig']).'"/>';



?></div></div>



</div>

</body>
</html>