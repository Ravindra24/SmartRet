<?php
//Storing all the post variables into temporary variables obtained from register page
$email=$_POST['email'];
$name=$_POST['name'];
$pwd=$_POST['password'];
$addr=$_POST['address'];
$street=$_POST['street'];
$city=$_POST['city'];
$contact=$_POST['contact'];

//$img=$_POST['image'];	
$img=addslashes($_FILES['image']['tmp_name']);
$img=file_get_contents($img);
$img=base64_encode($img);



	$connect=mysql_connect("localhost","root","mysql");			//Connect mysql
	if(!$connect)
	{
		die('Could not connect'.mysql_error());				//If can't connect then die
	}
	mysql_select_db("inventory",$connect);					//Selecting inventory database

	session_start();
	//Code to check whether emailid already exists or not
	$q1=mysql_query("SELECT * FROM shop_login WHERE email='$email'");

	if(mysql_num_rows($q1)==1)									
	{
		$_SESSION['exist_acc']=true;
		header('Location: ../login.php');

    }
	else
	{
		$shopid=substr($name,0,3).rand(1,1000);
		$shopimage=$shopid."img";
		
		//Code to insert into shop_login table
		$q=mysql_query("INSERT INTO shop_login(email,shopid,password,name,address,street,city,contact,image) values('$email','$shopid','$pwd','$name','$addr','$street','$city','$contact','$img')");
		if(isset($q)&&$q!="")
		{
			$q1=mysql_query("ALTER TABLE items_details ADD $shopid float(8,2),ADD $shopimage longblob");
			if(isset($q1)&&$q1!="")
			{
			$_SESSION['acc_success']=true;	
			header('Location: ../login.php');					//Redirecting to a login page 
			}
			else
			{
			//Something error
			$_SESSION['reg_er']=true;
			header('Location: ../login.php');					//Redirecting to a login page 
			}
		}
	}
	mysql_close($connect);
?>