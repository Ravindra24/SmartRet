<!--PAGE TO ADD ITEM TO A SHOP-->
<?php
  session_start();					//Starting session and storing session variables in temp variables
  $email=$_SESSION['email'];
  $s_name=$_SESSION['shopname'];
  $s_id=$_SESSION['shopid'];

  $pr=$_POST['price'];				//Post price variable

  $connect=mysql_connect("localhost","root","mysql");   //Connect mysql
  
  if(!$connect)
  {
    die('Could not connect'.mysql_error());       //If can't connect then die
  }
  

if(isset($pr)&&!empty($pr))	//Checking if price field is set 
{
	if(isset($_POST['select_name'])&&!empty($_POST['select_name']))//This select_name indicates item choosen from database
	{	
		$img=addslashes($_FILES['image']['tmp_name']);
		$img=file_get_contents($img);
		$img=base64_encode($img);
		$s_img=$s_id."img";
		$item_name=$_POST['select_name'];//Storing item_name
		mysql_select_db("inventory",$connect);//Selecing db
		$re=mysql_query("UPDATE items_details set $s_id='$pr',$s_img='$img' WHERE items='$item_name'");//Update price in items_details table 
		if(isset($re)&&($re!=""))//If update successfully redirecting to shop/index pade
		{
			$_SESSION['additem']=true;
			header('Location: ../shop/index.php');
		}
		else
		{
			echo "Update Error";		//Else error in updating
		}
	}
	else if(isset($_POST['text_name'])&&!empty($_POST['text_name']))//This text_name indicates user wants to add new item
	{
		$img=addslashes($_FILES['image']['tmp_name']);
		$img=file_get_contents($img);
		$img=base64_encode($img);
		$s_img=$s_id."img";
		$item_name=$_POST['text_name'];//Storing item_name
		mysql_select_db("inventory",$connect);//Selecing db
		$q=mysql_query("INSERT INTO items_details(items,$s_id,$s_img) values('$item_name',$pr,'$img')");//Inserting new item in items_details table
		if(isset($q)&&($q!=""))//If Insertion successfully redirecting to shop/index pade
		{
			$_SESSION['additem']=true;
			header('Location: ../shop/index.php');
		}
		else
		{
			echo "Insertion Error";
		}
	}
	else//Redirecting if item name not defined 
	{
		header('Location: additem.php');
	}
}	
else//Redirecting if price not defined
{
	header('Location: additem.php');
}
?>