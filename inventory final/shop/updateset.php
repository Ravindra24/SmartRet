<!--PAGE TO UPDATE PASSWORD OR ADDRESS FIELDS OF A PARTICULAR SHOP-->
<?php               
  session_start();
  $email=$_SESSION['email'];
  $s_name=$_SESSION['shopname'];
  $s_id=$_SESSION['shopid'];

  $pwd=$_POST['pass'];
  $adr=$_POST['address'];

  $connect=mysql_connect("localhost","root","mysql");   //Connect mysql
  
  if(!$connect)
  {
    die('Could not connect'.mysql_error());       //If can't connect then die
  }
  mysql_select_db("inventory",$connect);

  if(isset($pwd)&&!empty($pwd))
  {
    $p=$_POST['password'];
    mysql_query("UPDATE shop_login SET  password='$p' WHERE shopid='$s_id'") or die('Could not execute'.mysql_error());
    $_SESSION['pwdupdate']=true;
    header('Location: ../shop/index.php');
  
  }
  if(isset($adr)&&!empty($adr))
  {
    $a=$_POST['addr'];
    $s=$_POST['street'];
    $c=$_POST['city'];
    mysql_query("UPDATE shop_login SET  address='$a',street='$s',city='$c' WHERE shopid='$s_id'") or die('Could not execute'.mysql_error());
    $_SESSION['addrupdate']=true;
    header('Location: ../shop/index.php');
  }
?>