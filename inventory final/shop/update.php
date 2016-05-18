<!--UPDATE PRICE OR DELETE ITEM FROM PARTICULAR SHOP COLUMN-->
<?php               
  session_start(); //starting session
  $sid=$_SESSION['shopid'];

  //storing post variables in temp variables
  $s= $_POST['s'];
  $id= $_POST['item_id'];
  $pr=$_POST['price'];

  $connect=mysql_connect("localhost","root","mysql");   //Connect mysql
  if(!$connect)
  {
    die('Could not connect'.mysql_error());       //If can't connect then die
  }
  mysql_select_db("inventory",$connect);    

  if($s=="Update")//Checking if item price needs to be updated
  {  
      $re=mysql_query("UPDATE items_details set $sid='$pr' where item_id='$id'");
      if(isset($re)&&$re!="")
      {
        $_SESSION['updatepri']=true;
        header('Location: ../shop/index.php');
      }
      else
      {
        $_SESSION['updatepri_er']=true;
        header('Location: ../shop/index.php');
      }

  }
  else//Checking if item price needs to be deleted
  {
      $re=mysql_query("UPDATE items_details set $sid=NULL where item_id='$id'");
      if(isset($re)&&$re!="")
      {
        $_SESSION['deleteitem']=true;
        header('Location: ../shop/index.php');
      }
      else
      {
        //Deletion error
        header('Location: ../shop/index.php');
      }

  }
  mysql_close($connect);
?>