<?php
session_start();
$shopid=$_SESSION['s_id'];
$name=$_POST['user'];
$cmt=$_POST['comment'];
$st=$_POST['star'];


$con=mysql_connect("localhost","root","mysql");
$db=mysql_select_db("inventory",$con);
$query=mysql_query("insert into reviews values('$shopid','$name','$cmt','$st')") or die('Query Error'.mysql_error());
$_SESSION['shopreview']=true;
header('Location: mapshop.php');
?>

    