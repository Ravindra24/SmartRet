<?php
session_start();
if(isset($_REQUEST['id']))
{
$sid=$_SESSION['s_id']=$_REQUEST['id'];
}
else
{
 $sid=$_SESSION['s_id'];
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SmartRet</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Logo icon-->
    <link rel="icon" href="../images/logo.gif">

    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" href="../lib/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link  rel="stylesheet" href="../css/shop-homepage.css">
    
    <!--Includes for Search-->
    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/typeahead.min.js"></script>
    <link href="../css/search.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../lib/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for navbar -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../lib/assets/js/ie-emulation-modes-warning.js"></script>


    <!--Includes for footer-->
    <link rel="stylesheet" href="../css/demo.css">
    <link rel="stylesheet" href="../css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.min.css">
    <link href="../lib/font-awesome/cookie.css" rel="stylesheet" type="text/css">

	<!--Includes for Star Ratings-->
    <link rel="stylesheet"  href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="../lib/jquery.js"></script>
    <script src="../js/star-rating.js" type="text/javascript"></script>
  
  <!--Includes for Customized popup message-->
    <link href='../popup/font.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../popup/buttons.css"/>
    <script src="../popup/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../popup/jquery.noty.packaged.js"></script>

    <!--Navbar color and shadow CSS-->
    <link rel="stylesheet" type="text/css" href="../css/navbarcolor.css">

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#33383b;" id="header" >
      <div class="container">
        <div class="navbar-header" ><img src="../images/logo.gif " class="navbar-brand" style="height:50px; padding:0%;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>&nbsp;&nbsp;
          <h3 style=" font: bold 16px sans-serif; display: inline-block; color:  #ffffff; font: normal 36px 'Cookie', cursive; margin: 0;">
          Smart<span style="  color:  #5383d3;">Ret</span></h3>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="home"><a href="../index.php#home">Home</a></li>
            <li class="about"><a href="../index.php#about">About</a></li>
            <li class="contact"><a href="../index.php#contact">Contact</a></li>
            <li><a href="../login.php">Seller Login</a>
            <li><a href="../help.html">Help</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-->
    </nav><!--/.nabar-->

<?php
	$con=mysql_connect("localhost","root","mysql");
    $db=mysql_select_db("inventory",$con);
    $query=mysql_query("select * from shop_login where shopid='$sid'") or die('Query Error'.mysql_error());
    $row=mysql_fetch_array($query);
    ?>
    
  <div class="row">
           <div class="col-md-4" style="margin-left:5%">  
	           <div class = "panel panel-default">
   				     <div class = "panel-heading"><b><center><? echo $row['name']; ?></center></b></div>
   				        <div class = "panel-body">
     		          <?	 echo '<img height="250px" width="400px" src="data:image;base64,'.$row['image'].' ";>'?><br><br>
     			        <? $addr=$row['address'];$str=$row['street'];$city=$row['city'];	?>
     			        <p>Ratings <?php
     			        $q2=mysql_query("select avg(stars) from reviews where shopid='$sid'") or die('Query Error'.mysql_error());
     			        $row=mysql_fetch_row($q2);
     			        $star=$row[0];
     			        while($star>=1)
     			        {
     				         $star=$star-1;
     			        ?>
					           <span class="fa fa-star"></span>
     		         <?	}
     			        
                  if($star==0.5)
     			        {?>
					           <span class="fa fa-star-half-empty"></span>
     			      <?}
     			      ?>
   				       </p>
				
                 <p><a href="#">Reviews</a></p>	
					       
                 <div class="reviews">
				
					       <? $q3=mysql_query("select * from reviews where shopid='$sid'") or die('Query Error'.mysql_error()); 
						
						      while ($row=mysql_fetch_array($q3))
						      {  ?>
							     <b>Reviewer </b><? echo $row['u_name'];?><br>
							     <b>Ratings </b><? echo $row['stars']."/5.0"; ?><br>
							     <b>Comments </b><? echo $row['comment'];?><br>
							     <br><br>
					    <?	}
					       ?>		
					      </div>
   				</div><!--.panel body-->
    </div><!--./panel default-->
	</div><!--./col-md-4-->


<div class="col-md-3">
  <div class = "panel panel-default">
          <div class = "panel-heading"><p><b><center>Address</center></b></p><p><center><? echo $addr.",<br> ".$str.",<br> ".$city; ?></center></p>
          </div>
  </div>
</div>

<div class="col-md-4" >
		<button class="form-control btn btn-login">Write a Review About Shop</button>
			<div class = "panel panel-default" id="rate" >
   				<div class = "panel-heading">Rate And Review Shop
   				</div>   
   			
   			<div class = "panel-body">
     			<form action="rating.php" method="POST">
				<input type="text" class="rating rating-loading" name="star" value="2" data-size="xs" step="1" required>
				Reviewer Name    <input type="text" name="user" required><br><br>
				Comments<br><textarea style="margin-left:25%;"name="comment" rows="5" cols="20" required></textarea><br>
				<input type="submit" value="Review" class="btn btn-default"> 
			    </form>
   			</div>
			
			</div>
</div>
</div>
<?php
if($_SESSION['shopreview'])
{
  $_SESSION['shopreview']=false;
  ?>
    <script>
    $(function(){ popreviewed();  });
    </script><? 
}?>
<script>
	$(document).ready(function(){

		$("#rate").hide();
		$(".reviews").hide();

		$("a").click(function(){
			$(".reviews").show();
		})

		$("button").click(function(){
			$("#rate").show();
			$("button").hide();
		})
	});
  
  function generate(type) 
    {
        var n = noty({
            text        : type,
            type        : type,
            dismissQueue: false,
            layout      : 'topCenter',
            theme       : 'defaultTheme'
        });
        console.log(type + ' - ' + n.options.id);
        return n;
    }

    function popreviewed()
    {
        var alert = generate('You have Successfully Reviewed');
    }
</script>
</body>
</html>