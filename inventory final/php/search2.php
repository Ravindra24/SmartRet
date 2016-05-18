<?php
session_start();
$_SESSION['shopreview']=false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
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

    <!--Navbar color and shadow CSS-->
    <link rel="stylesheet" type="text/css" href="../css/navbarcolor.css">

   
    <?php
    $search=$_POST['typeahead'];
    $con=mysql_connect("localhost","root","mysql");
    $db=mysql_select_db("inventory",$con);
    $query=mysql_query("select * from items_details where items LIKE '%$search%'");
    $c=0; //Initially setting c to 0
    $row=mysql_fetch_assoc($query);
    if($row) 
    {
    $q=mysql_query("select * from shop_login");
      while ($col=mysql_fetch_array($q)) 
      {
       $v=$col['shopid']; 
      if(!empty($row["$v"]))
      {
      $c=$c+1;
      }
      }
    }
    if($c==0)
    {
      header('Location: ../pagenotfound.html');
    }
    ?>

    <title><?echo $search;?> | SmartRet</title>

    </head>
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

    <!-- Page Content -->
    <div class="container">
          <div class="row">

            <div class="col-md-9">
          		<h3 style=" font: bold 16px sans-serif; display: inline-block; color:  #ffffff; font: normal 36px 'Cookie', cursive; margin-left: 56%; ">
              <span style="color:  #5383d3;"><?php echo $search; ?></span>
              </h3>
                
                <div class="row">
                <? if($row) 
                    {
                      $q=mysql_query("select * from shop_login");
                      while ($col=mysql_fetch_array($q)) 
                      {
                        $v=$col['shopid']; 
                        if(!empty($row["$v"]))
                        { $item_img=$col['shopid']."img";
                          ?>
                          <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                              <? echo '<img height="50" src="data:image;base64,'.$row["$item_img"].' ";>'?>
                           
                            <div class="caption">
                              <h4 class="pull-right"><i class="fa fa-inr"></i><? echo $row["$v"]?></h4>
                              <h4><a href="mapshop.php?id=<?php echo $col['shopid'];?>"><? echo $col['name']; ?></a></h4>
                              <? $sid=$col['shopid'];
                              $q2=mysql_query("select count(*) from reviews where shopid='$sid'");
                              $r=mysql_fetch_row($q2);

                              ?>

                              <p class="pull-right"><? echo $r[0]." reviews"; ?></p>
                              <p>Ratings <?php
                              $q3=mysql_query("select avg(stars) from reviews where shopid='$sid'") or die('Query Error'.mysql_error());
                              $r2=mysql_fetch_row($q3);
                              $star=$r2[0];
                              while($star>=1)
                              {
                                 $star=$star-1;
                              ?>
                                 <span class="fa fa-star"></span>
                           <? }
                  
                            if($star==0.5)
                            {?>
                             <span class="fa fa-star-half-empty"></span>
                          <?}
                           ?>
                         </p>
                            </div>

                            </div>
                          </div>
                   <?php }}}?>
                </div>
            </div>
        </div>
    </div><!-- /.container -->


<script>
    /* scripts for search*/  
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'../php/search.php?key=%QUERY',
        limit : 10
      });
    });
   
   function validateForm() {
    var x = document.forms["search"]["typeahead"].value;
    if (x == null || x == "") {
        alert("Error");
        return false;
    }
  }
</script>

    </body>

</html>
