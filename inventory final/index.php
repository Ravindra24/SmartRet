<!--HOME PAGE-->
<?php session_start();
//Declaring Session variables for popup messages for login page
 $_SESSION['login_er']=false;
 $_SESSION['reg_er']=false;
 $_SESSION['exist_acc']=false;
 $_SESSION['acc_success']=false;

//Declaring Session variables for popup messages in shop page
$_SESSION['updatepri']=false;
$_SESSION['deleteitem']=false;
$_SESSION['pwdupdate']=false;
$_SESSION['addrupdate']=false;
$_SESSION['additem']=false;
$_SESSION['forgot']=false;
$_SESSION['forgot_er']=false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--Logo icon-->
    <link rel="icon" href="images/logo.gif">

    <title>SmartRet</title>

    <!-- Bootstrap core CSS -->
    <link href="lib/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">

    <!--JQUERY Library-->
    <script src="lib/jquery.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="lib/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for navbar -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="lib/assets/js/ie-emulation-modes-warning.js"></script>

    <!--Includes for Thumbnail Slider-->
    <link href="css/thumbnail-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/thumbnail-slider.js" type="text/javascript"></script>

    <!--Includes for Search-->
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/typeahead.min.js"></script>
    <link rel="stylesheet" href="css/search.css">

    <!--Includes for footer-->
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/font-awesome/cookie.css">
    
    <!--Navbar color and shadow CSS-->
    <link rel="stylesheet" type="text/css" href="css/navbarcolor.css">

    <!--Style for image-->
    <style>
    .respo{
    width: 100%;
    background-size: 100% 100%;
    }
    </style>

</head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--The Scrollspy plugin is used to automatically update links in a navigation list based on scroll position-->

<div style="background-image:url('images/ind.jpg'); margin-top:-20px;" class="respo">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" id="header">
        <div class="container">
            <div class="navbar-header" >
                <img src="images/logo.gif " class="navbar-brand" style="height:50px; padding:0%;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>&nbsp;&nbsp;
                <h3 style=" font: bold 16px sans-serif; display: inline-block; color:  #ffffff; font: normal 36px 'Cookie', cursive; margin: 0;">
                Smart<span style="color: #5383d3;">Ret</span><!--Span for blue color of Ret-->
                </h3>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                     <form action="php/search2.php" method="post" name="search" onsubmit="return validateForm()">
                        <input type="text" name="typeahead" class="typeahead tt-query"   autocomplete="off" spellcheck="false" placeholder="Search Items">
                        <input type="submit" style="height: 0px; width: 0px; border: none; padding: 0px;" hidefocus="true" />
                     </form>
                    </li>
                    <li class="active"><a href="#home">Home</a></li>
                    <li class="about"><a href="#about">About</a></li>
                    <li class="contact"><a href="#contact">Contact</a></li>
                    <li><a href="login.php">Seller Login</a>
                    <li><a href="help.html">Help</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-->
    </nav><!--End navbar-->

    <!--Thumbnail Slider-->
    
    <div style="padding:120px; " id="home" style="">
        <div id="thumbnail-slider">
            <div class="inner">
                <ul>
                    <li>
                        <a class="thumb" href="images/11.jpg"></a>
                    </li>
                    <li>
                        <a class="thumb" href="images/13.jpg"></a>
                    </li>
                    <li>
                        <a class="thumb" href="images/14.jpg"></a>
                    </li>
                    <li>
                        <a class="thumb" href="images/16.jpg"></a>
                    </li>
                    <li>
                        <a class="thumb" href="images/17.jpg"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--./Thumbnail slider-->
    <br><br><br><br><br><br>
   </div>

    <div id="about" style="background-color:#1abc9c; height:90%;"> 
        <div class="container-fluid bg-1 text-center">
            <br>
            <h3 style=" font: bold 16px sans-serif; display: inline-block; color:  #ffffff; font: normal 36px 'Cookie', cursive; margin: 0;">
            Smart<span style="color: #5383d3;">Ret</span><!--Span for blue color of Ret-->
            </h3><h3 style="display:inline; font-family:Roboto"><i>
             is an effective website which would cater to the needs of the people of the society.</p>
            <p>This website focuses mainly on comparing the prices of appliances in various shops across a city,</p>
            <p>which would ease the work of the user and fulfils his/her needs at his place. </i></h3>
        </div>
      <br><br>

      <hr>

      <div class="container-fluid text-center">
          <font family="Roboto"; color="white"; size="6em"><i>Meet The Team</i></font>
      </div>
    
      <div class="row">
          <div class="col-lg-3"></div>
          
          <div class="col-lg-4">
            <img src="images/chirag.jpg" class="img-thumbnail"width="200" height="200">
            <font family="Roboto"; color="white"; size="5.5px"; ><i><p>&nbsp;&nbsp;Chirag Patel A R</p></i></font>
          </div>
          
          <div class="col-lg-2"></div>
          
          <div class="col-lg-4">
            <img src="images/chiranth.jpg" class="img-thumbnail"width="200" height="200">
            <font family="Roboto"; color="white"; size="5.5px";><i><p>&nbsp;&nbsp;Chiranth H N</p></i></font>
         </div>

      </div>

      <div class="row"></div>

      <div class="row">
          <div class="col-lg-3"></div>
          
          <div class="col-lg-4">
            <img src="images/ravindra.jpg" class="img-thumbnail" width="200" height="200">
            <font family="Roboto"; color="white"; size="5.5px"; ><i><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D Ravindra</p></i></font>
          </div>
          
          <div class="col-lg-2"></div>
          
          <div class="col-lg-4">
            <img src="images/karthik.jpg" class="img-thumbnail" width="200" height="200">
            <font family="Roboto"; color="white"; size="5.5px";><i><p>&nbsp;&nbsp;&nbsp;Karthik Prasad</p></i></font>
          </div>

      </div>

    </div>


    <footer class="footer-distributed" id="contact">

        <div class="footer-left">
                <img src="images/logo.gif" width="50px;" height="auto";>
                <h3 style="display:inline;">Smart<span>Ret</span></h3>
                <p class="footer-company-name" style="margin-left:60px;">SmartRet &copy; 2016</p>
        </div>

        <div class="footer-center">

                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>The National Institute Of Engineering</span> Mysuru-570008</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>+91 8277777199</p>
                </div>
			
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">support@smartret.com</a></p>
                </div>

        </div>

        <div class="footer-right">

                <div class="footer-icons">

                    <a href="http://www.fb.com/smartret"><i class="fa fa-facebook"></i></a>
                    <a href="http://www.twitter.com/smartret"><i class="fa fa-twitter"></i></a>
                    <a href="http://www.linkedin.com/smartret"><i class="fa fa-linkedin"></i></a>
                    <a href="http://www.github.com/smartret"><i class="fa fa-github"></i></a>

                </div>

        </div>

    </footer>
     
    <script src="lib/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/search.js"></script>

  </body>

</html>
