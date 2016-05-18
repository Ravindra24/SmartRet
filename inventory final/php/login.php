<?php 

//Starting session to make emailid global for extend its scope to all pages
session_start();											
//Storing all the post variables into temporary variables obtained from login page
$_SESSION['email']=$em=$_POST['email'];	
$pwd=$_POST['password'];							
	
	$connect=mysql_connect("localhost","root","mysql");		//Connect mysql
	
	if(!$connect)
	{
		die('Could not connect'.mysql_error());				//If can't connect then die
	}
	mysql_select_db("inventory",$connect);					//selecting database

	//verifying whether password and emailid match or not
	$res=mysql_query("SELECT * from shop_login WHERE email ='$em' AND password ='$pwd' ");
	if(mysql_num_rows($res)==1)				 
	{	
		$row=mysql_fetch_array($res);
		$_SESSION['shopname']=$row['name'];
		$_SESSION['shopid']=$row['shopid'];
		//login success
		//redirecting to page displaying shop detils																										
		header('Location: ../shop/index.php');									
	}
	else
	{
		$_SESSION['login_er']='true';
		header('Location: ../login.php');
	?>
	<!--popup messages password and emailid didn't match-->
	<?}
	mysql_close($connect);												//Close mysql database

?>