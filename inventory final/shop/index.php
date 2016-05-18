<!--SHOP PAGE-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Logo icon-->
    <link rel="icon" href="../images/logo.gif">

      <?php               
      session_start();                                      //Starting session
      $email=$_SESSION['email'];
      $s_name=$_SESSION['shopname'];
      $s_id=$_SESSION['shopid'];
      $connect=mysql_connect("localhost","root","mysql");   //Connect mysql
      if(!$connect)
      {
        die('Could not connect'.mysql_error());       //If can't connect then die
      }
      mysql_select_db("inventory",$connect);
      $res=mysql_query("SELECT * FROM shop_login where shopid='$s_id'");  //Query retrieving all the details of shop using shop id
      $row=mysql_fetch_array($res);
      ?>

    <title><?php echo $s_name; ?></title><!--Displaying Shop Name-->

    <!-- Bootstrap core CSS -->
    <link href="../lib/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap-theme.min.css">

    <!--JQUERY Library-->
    <script src="../lib/jquery.js"></script>

    <script src="../lib/bootstrap/js/bootstrap.min.js"></script>

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
    <link rel="stylesheet" href="../lib/font-awesome/cookie.css">
    
    <!--Navbar color and shadow CSS-->
    <link rel="stylesheet" type="text/css" href="../css/navbarcolor.css">
    
    <!--Includes for table expansion--> 
    <link rel="stylesheet" href="../css/bootstrap-table-expandable.css">
    <script src="../js/bootstrap-table-expandable.js"></script>

    <!--CSS for shopnavbar toggle-->
    <link rel="stylesheet" type="text/css" href="../css/shopnavbar.css">

    <!--Includes for Customized popup message-->
    <link href='../popup/font.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../popup/buttons.css"/>
    <script src="../popup/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../popup/jquery.noty.packaged.js"></script>

    <style>
    .imgpos
    {
      margin-left: 0%;
      margin-top: -2%;
    }
    </style>

</head>
<body style="background-color:#eee5de;">
  <div id="wrapper">

    <!-- Modified navbar: Animating from right to left (off canvas) -->
    <nav id="navbar2" style="margin-top:-5.5%;"class="navbar navbar-default" role="navigation" >
      <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"><img src="../images/logo.gif " class="navbar-brand" style="height:50px; padding:0%;">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>&nbsp;&nbsp;
          <h3 style=" font: bold 16px sans-serif; display: inline-block; color:  #ffffff; font: normal 36px 'Cookie', cursive; margin: 0;">
            Smart<span style="  color:  #5383d3;">Ret</span>
          </h3>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="black">Change Password</font><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
               <li>  
                 <form class="navbar-form navbar-left" action="updateset.php" method="post">
                
                  <div class="form-group">
                    <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>" width="10px">
                  </div>

                  <input type="hidden" name="address" value=""><!--hidden address value to set address initially to null-->
                  <input type="submit" class="btn btn-default" name="pass" value="Update">
                 </form>
               </li>
              </ul>
           </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><font color="black">Change Address</font><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                
                <form class="navbar-form navbar-left" action="updateset.php" method="post">

                <div class="form-group">
                   <font size="3.5em">Address</font><input type="text" class="form-control" name="addr" style="margin-left:10px;" value="<?php echo $row['address'];?>" width="10px">
                </div>
                
                <div class="form-group">
                    <font size="3.5em">Street</font><input type="text" class="form-control" name="street" style="margin-left:25px;"  value="<?php echo $row['street'];?>" width="10px">
                </div>
                
                <div class="form-group">
                    <font size="3.5em">City</font><input type="text" class="form-control" name="city" style="margin-left:40px;" value="<?php echo $row['city'];?>" width="10px">
                </div>
                
                <br>
                   <input type="hidden" name="password" value=""><!--hidden password value to set address initially to null-->
                   <input type="submit" class="btn btn-default" name="address" value="Update">
              </form>
            
              </ul>

            </li>

            <li> <a href="logout.php"><button type="button" class="btn btn-default btn-sm">
                  <span class="glyphicon glyphicon-log-out"></span> Log out</button>
                 </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav><!--End navbar-->

    <!--Displaying Shop image positon-->
    <div class="imgpos">
    <?  
      echo '<img height="250" width="350" src="data:image;base64,'.$row['image'].' ">';      
    ?>
    </div>
    <? 
    $re=mysql_query("SELECT * from items_details");  //Query retrieving all the details of items
    $count=0; //Initially setting count variable to 0 & it is used to show "no items" if no items were added by shop
    ?>

    <div class="container">
      <h1 style="margin-left:40%; margin-top:-13%;"><b><?php echo $s_name; ?></b></h1>
      <table style="margin-top:10%;"class="table table-hover table-expandable table-striped">
       <thead>
        <tr><!--Displaying Table headings-->
           <th>Image</th>
           <th>Item</th>
           <th>Price</th>
        </tr>
       </thead>
      <tbody>
      <?
      while($row=mysql_fetch_array($re))  //Retrieving row-wise details of items
      {
        if($row["$s_id"]!=NULL)     //Displaying items if price field is not null
        {
          $count++;                 //Incrementing count variable which indicates item count
        ?> 
        <form action="update.php" method="POST">  <!--Form for updating or deleting the item-->     
          <tr><? $img=$s_id."img"; ?>
            <td><? echo '<img height="75" width="75" src="data:image;base64,'.$row["$img"].' ">';?> </td><!--Displaying Item image-->
            <td><? echo $row['items'];?></td><!--Displaying Item name-->
            <td><? echo $row["$s_id"];?></td><!--Displaying Item Price-->
          </tr> 
          <tr>
            <td colspan="3"><h4>Update Price</h4><!--Toggle on click -->
            <ul>
              <input type="text" name="price" value="<? echo $row["$s_id"];?>"><!--Initially show item price-->
              <input type="hidden" value="<? echo $row['item_id']; ?>" name="item_id"><!--hidden item_id for use in another page-->
              <input type="submit" class="btn btn-default" value="Update" name="s"><!--Update Button-->
              <input type="submit" class="btn btn-default" value="Delete Item" name="s"><!--Delete Button-->
            </ul>
            </td>
          </tr>
        </form>
    <?  } 
    }
    if($count==0)
    {?>
    <tr><td><p>No items</p></td></tr>
  <?}
    mysql_close($connect);                        //Close mysql database
?> 
    </tbody>
    </table>
    </div><!--./container div-->
    
    <a href="additem.php"><button class="btn btn-default" style="margin-left:70%;">Add Item</button></a><!--Add item Button-->
  </div><!--./wrapper div-->
<?php
if($_SESSION['updatepri'])
{ 
    $_SESSION['updatepri']=false;
    ?>
      <script>
      $(function(){ popuppri();  });
      </script>
    <? 
}

else if ($_SESSION['deleteitem']) 
{ 
    $_SESSION['deleteitem']=false;
    ?>
      <script>
      $(function(){ popdelete();  });
      </script>
    <? 
}

else if ($_SESSION['pwdupdate']) 
{ 
    $_SESSION['pwdupdate']=false;
    ?>
    <script>
      $(function(){ poppwdup();  });
      </script>
      <? 
}

else if ($_SESSION['addrupdate']) 
{ 
  $_SESSION['addrupdate']=false;
  ?>
    <script>
    $(function(){ popaddrup();  });
    </script>
    <? 
}

else if ($_SESSION['additem']) 
{ 
  $_SESSION['additem']=false;
  ?>
    <script>
    $(function(){ popadditem();  });
    </script>
    <? 
}?>

<script type="text/javascript">

(function ($) {

    'use strict';

    // Toggle classes in body for syncing sliding animation with other elements
    $('#bs-example-navbar-collapse-2')
        .on('show.bs.collapse', function (e) {
            $('body').addClass('menu-slider');
        })
        .on('shown.bs.collapse', function (e) {
            $('body').addClass('in');
        })
        .on('hide.bs.collapse', function (e) {
            $('body').removeClass('menu-slider');
        })
        .on('hidden.bs.collapse', function (e) {
            $('body').removeClass('in');
        });

})(jQuery);

  
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

    function popuppri()
    {
        var alert = generate('Price Updated Successfully');
    }
    function popdelete()
    {
        var alert = generate('Item deleted Successfully');
    }
    function poppwdup()
    {
        var alert = generate('Password Changed Successfully');
    }
    function popaddrup()
    {
        var alert = generate('Address Changed Successfully');
    }
    function popadditem()
    {
        var alert = generate('Item Added Successfully');
    }
</script>

</body>
</html>