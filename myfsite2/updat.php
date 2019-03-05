
<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
$adminn = ($_POST["usr"]);
$paswd = ($_POST["pwd"]);
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die ("not connected" .mysql_error());
}
mysql_select_db("first_db", $con);

$sql = "select * from admin where loginid='$adminn' and pass='$paswd'";
$result = mysql_query($sql,$con) or die (mysql_error($con));
$count =  mysql_num_rows($result);



if($count == 1)
{
$_SESSION["admn"]=$adminn;
header("location:admin.php");
  
    }



else
{
	
	print '<script> alert("incorrect password")</script>';
	print '<script> window.location.assign("home.php")</script>';
}
	
}

?>

<?php
include("Database.php");
if($_POST[adexm])
{
$q=mysql_query("insert into subject (sub_name) values ('$_POST[adexm]')");
if($q==true)
{
	print'<script> alert("data saved")</script>';
 header("location:admin.php?q=3");
 
}
else
{
echo "error";
}}
?>


<?php
include("Database.php");
if($_POST[dell] )
{

$q=mysql_query(" delete  from subject where sub_name='$_POST[dell]'");

if($q==true){
	echo '<script> alert(" data delete")</script>';
header("location:admin.php?q=3");
}



else
echo "error";
}

?>
<?php
include("Database.php");
if($_POST[updt] )
{
header("location:admin.php?q=3");
$q=mysql_query(" update subject set sub_name='$_POST[updts]' where sub_id='$_POST[updt]'");
if($q==true)

echo '<script> alert(" data delete")</script>';

else
echo "error";
}

?>

<?php
include("Database.php");
if($_POST[exid] )
{
header("location:admin.php?q=4");
$q=mysql_query(" insert into test ( sub_id, test_name, total_que) values ('$_POST[exid]','$_POST[tname]','$_POST[tq]')");
if($q==true)

echo '<script> alert(" data inserted")</script>';

else
echo "error";
}

?>
<?php
include("Database.php");
if($_POST[tid] )
{
header("location:admin.php?q=4");
$q=mysql_query("  delete from test where test_id='$_POST[tid]'");
if($q==true)

echo '<script> alert(" data deleted")</script>';

else
echo "error";
}

?>

<?php
include("Database.php");
if($_POST[testid] )
{
header("location:admin.php?q=4");
$q=mysql_query(" update test set sub_id='$_POST[exidd]',test_name='$_POST[tnam]', total_que='$_POST[tn]' where test_id='$_POST[testid]'");
if($q==true)

echo '<script> alert(" data delete")</script>';

else
echo "error";
}

?>

<?php
include("Database.php");
if($_POST[qqid] )
{
header("location:admin.php?q=5");
$q=mysql_query(" insert into question ( test_id, que_desc, ans1, ans2, ans3,ans4, true_ans ) values ('$_POST[qqid]','$_POST[qus]','$_POST[o1]','$_POST[o2]','$_POST[o3]','$_POST[o4]','$_POST[ro]')");
if($q==true)

echo '<script> alert(" data inserted")</script>';

else
echo "error";
}

?>
<?php
include("Database.php");
if($_POST[dellq] )
{
header("location:admin.php?q=5");
$q=mysql_query(" delete from question where que_id='$_POST[dellq]'");
if($q==true)

echo '<script> alert(" data deleted")</script>';

else
echo "error";
}

?>


<?php
include("Database.php");
if($_POST[qqqid] )
{
header("location:admin.php?q=5");
$q=mysql_query(" update question set test_id='$_POST[testid]',que_desc='$_POST[qus]', ans1='$_POST[o1]', ans2='$_POST[o2]',ans3='$_POST[o3]', ans4='$_POST[o4]',true_ans='$_POST[ro]' where que_id='$_POST[qqqid]'");
if($q==true)

echo '<script> alert(" data updated")</script>';

else
echo "error";
}

?>
<?php


include("Database.php");
if(@$_GET['did'] )
 {
$did=@$_GET['did'];
$r1 = mysql_query("delete from reg where id='$did' ") or die('Error');
if($r1>0)

header("location:admin.php?q=1");
}


?>
<?php


include("Database.php");
if(@$_GET['eid'] )
 {
$eid=@$_GET['eid'];
$r1 = mysql_query("delete from subject where sub_id='$eid' ") or die('Error');
if($r1>0)

header("location:admin.php?q=3");
}


?>

<?php


include("Database.php");
if(@$_GET['tid'] )
 {
$tid=@$_GET['tid'];
$r1 = mysql_query("delete from test where test_id='$tid' ") or die('Error');
if($r1>0)

header("location:admin.php?q=4");
}


?>

<?php


include("Database.php");
if(@$_GET['qid'] )
 {
$qid=@$_GET['qid'];
$r1 = mysql_query("delete from question where que_id='$qid' ") or die('Error');
if($r1>0)

header("location:admin.php?q=5");
}


?>








