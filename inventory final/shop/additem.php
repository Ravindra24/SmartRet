<!--PAGE TO ADD ITEM BY SELECTING ITEM FROM DB OR ADD A NEW ITEM-->
<?php
  session_start();        //Starting session and storing session variables in temp variables
  $email=$_SESSION['email'];
  $s_name=$_SESSION['shopname'];
  $s_id=$_SESSION['shopid'];
?>

<html>
<head>

    <title><?php echo $s_name; ?></title>

    <!--Logo icon-->
    <link rel="icon" href="../images/logo.gif">

    <?php               
      $connect=mysql_connect("localhost","root","mysql");   //Connect mysql
      if(!$connect)
      {
        die('Could not connect'.mysql_error());       //If can't connect then die
      }
      mysql_select_db("inventory",$connect);
      $res=mysql_query("SELECT * FROM shop_login where shopid='$s_id'");  //Query retrieving all the details of shop using shop id
      $row=mysql_fetch_array($res);
    ?>

    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../lib/ font-awesome/css/font-awesome.min.css" />
    <script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../lib/jquery.js" type="text/javascript"></script>

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

    <!--CSS for shopnavbar toggle-->
    <link rel="stylesheet" type="text/css" href="../css/shopnavbar.css">
    

<style>
  .panel-heading span {
    margin-top: -20px;
    font-size: 15px;
  }

  .row {
    margin-top: 40px;
    padding: 0 10px;
  }
  .clickable {
    cursor: pointer;
 }    
</style>
</head>
<body style="background-image:url('../images/Background3.jpg');">

  <!-- Modified navbar: Animating from right to left (off canvas) -->
    <nav id="navbar2" style="margin-top:-5.5%;"class="navbar navbar-default" role="navigation" >
      <div class="container-fluid">
        
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"><img src="../images/logo.gif " class="navbar-brand" style="height:50px; padding:0%;">
          <a class="navbar-brand" href="#"></a>&nbsp;&nbsp;
          <h3 style=" font: bold 16px sans-serif; display: inline-block; color:  #ffffff; font: normal 36px 'Cookie', cursive; margin: 0;">
            Smart<span style="  color:  #5383d3;">Ret</span>
          </h3>
        </div>

       </div><!-- /.container-fluid -->
    </nav><!--End navbar-->


    <div class="container">
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
              <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title" title="Click on arrow to expand">Choose Item From Database</h3>
                <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>

                <div class="panel-body">
                <form action="add.php" method="post" enctype="multipart/form-data">
                 <br><font face="roboto" size="4em">Item Name</font>
                  <select name="select_name" required>
                      <option value=""></option>
                     <?
                        $connect=mysql_connect("localhost","root","mysql");   //Connect mysql
                        if(!$connect)
                        {
                         die('Could not connect'.mysql_error());       //If can't connect then die
                        }
                       mysql_select_db("inventory",$connect);
                       $res=mysql_query("SELECT $s_id,items FROM items_details WHERE $s_id IS NULL");
                      
                      while ($row=mysql_fetch_array($res))
                      { ?>
                      
                          <option value="<?php echo $row['items'];?>"><?php echo $row['items'];?></option><? 
                      }
                      mysql_close($connect); ?>   
                  </select><br><br>  
                  <font face="roboto" size="4em">Item Image</font><input type="file" accept="image/*" name="image" required/><br><br>
                  <font face="roboto" size="4em">Item Price&nbsp;&nbsp;&nbsp;</font><input type="number" step="0.01" name ="price" min="0" style="width:90px;" required><br>
                  <input type="submit" value="Add" class="btn btn-default">
                </form>
              </div>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2"><div class="panel-heading">
          <div class="panel panel-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR</div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Add New Item</h3>
          <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
        </div>
        
        <div class="panel-body">
          <form action="add.php" method="post" enctype="multipart/form-data">
           <font face="roboto" size="4em">New Item Name</font>&nbsp;&nbsp;&nbsp;<input type="text" name="text_name" style="width:90px;" required/><br><br>
           <font face="roboto" size="4em">Item Image</font><input type="file" accept="image/*" name="image" required/><br><br>
           <font face="roboto" size="4em">Item Price</font><input type="number" step="0.01" name ="price" min="0" style="width:90px;" required/><br>
          <input type="submit" value="Add" class="btn btn-default">
          </form>
        </div>

        </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">
  
    jQuery(function ($) {
        $('.panel-heading span.clickable').on("click", function (e) {
            if ($(this).hasClass('panel-collapsed')) {
                // expand the panel
                $(this).parents('.panel').find('.panel-body').slideDown();
                $(this).removeClass('panel-collapsed');
                $(this).find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
            else {
                // collapse the panel
                $(this).parents('.panel').find('.panel-body').slideUp();
                $(this).addClass('panel-collapsed');
                $(this).find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            }
        });
    });

    $(document).ready(function(){
      $(".panel-body").hide();
    });
</script>
</body>
</html>
    
