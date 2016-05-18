<!--Login || Register Page-->
<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" href="images/logo.gif">
	
	<!--Logo icon-->
	<title>Seller Login | SmartRet </title>
    
	<!--Stylesheet for Login page-->
    <link rel="stylesheet" type="text/css" href="css/index.css">
    

	<!--Scripts-->
    <script src="lib/jquery.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script src="lib/angular.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="lib/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="lib/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for navbar -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="lib/assets/js/ie-emulation-modes-warning.js"></script>

    <!--Includes for Search-->
    <script src="js/typeahead.min.js"></script>
    <link rel="stylesheet" href="css/search.css">

    <!--Includes for footer-->
    <link rel="stylesheet" href="css/demo.css">
    <link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="lib/font-awesome/cookie.css">
    
    <!--Navbar color and shadow CSS-->
    <link rel="stylesheet" type="text/css" href="css/navbarcolor.css">

    <!--Includes for Customized popup message-->
    <link href='popup/font.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="popup/buttons.css"/>
    <script src="popup/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="popup/jquery.noty.packaged.js"></script>
    

  </head>

  <body style="background-image:url('images/Background1.jpg'); background-repeat:no-repeat;">

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
                    <li><a href="index.php">Home</a></li>
                    <li class="about"><a href="index.php#about">About</a></li>
                    <li class="contact"><a href="index.php#contact">Contact</a></li>
                    <li  class="active"><a href="login.php">Seller Login</a>
                    <li><a href="help.html">Help</a></li>
                </ul>
            </div><!--/.nav-collapse -->
       </div><!--/.container-->
   </nav><!--End navbar-->


<!--Login and Registeration forms-->
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>

							<div class="col-xs-6">
								<a href="#"  id="register-form-link">Register</a>
							</div>

						</div>

						<hr>

					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="php/login.php" method="post" role="form" style="display: block;">
									
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email" ng-model="email" required>
									</div>
									
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password" ng-model="password" required>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="forgot.html" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								
								</form>
								
								<form id="register-form" action="php/reg.php" method="post" role="form" style="display: none;" ng-app="myApp"  ng-controller="validateCtrl" name="myForm" enctype="multipart/form-data">

									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email" ng-model="email" required>
										 <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
 										 
 										 <span ng-show="myForm.email.$error.required">
 										 	<font size="2.5em" face="verdana" ><b><i>Email is required</i></b></font>
 										 </span>
 										 <span ng-show="myForm.email.$error.email">
 										 	<font size="2.5em" face="verdana"><b><i>Invalid email address</i></b></font>
 										 </span>

 										 </span>
									</div>
								
									<div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Shop Name" required>

									</div>
								
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password" ng-minlength="6" ng-maxlength="20" ng-model="password" required>
										<span style="color:red" ng-show="myForm.password.$dirty && myForm.password.$invalid">
										
										<span ng-show="myForm.password.$error.required" >
											<font size="2.5em" face="verdana"><b><i>Password is required</i></b></font>
										</span>
										<span ng-show="myForm.password.$error.minlength||myForm.password.$error.maxlength" >
											<font size="2.5em" face="verdana"><b><i>Password should contain 6-20 characters</i></b></font>
										</span>
 									    
 									    </span>
									</div>


									<div class="form-group">
										<input type="text" name="contact" class="form-control" placeholder="Contact No." ng-maxlength="10" ng-minlength="10" ng-model="text" maxlength="10"   
										required>
										
									</div>

									<div class="form-group">
										<font size="3.5em">Upload Shop Image</font><input type="file" accept="image/*" name="image" class="form-control" required/>
									</div>
								
									<div class="form-group">
										<input type="text" name="address" class="form-control" placeholder="Address" required>
									</div>
								
									<div class="form-group">
										<input type="text" name="street" class="form-control" placeholder="Street"  required>
									</div>
								
									<div class="form-group">
										<input type="text" name="city" class="form-control" placeholder="City"  required>
									</div>
															
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
//Condition checks for message poup
if($_SESSION['login_er'])
{ 
		$_SESSION['login_er']=false;
		?>
  		<script>
  		$(function(){	poplogierr();  });
  		</script>
		<? 
}

else if ($_SESSION['reg_er']) 
{ 
		$_SESSION['reg_er']=false;
		?>
  		<script>
  		$(function(){	popregierr();  });
  		</script>
		<? 
}

else if ($_SESSION['exist_acc']) 
{ 
		$_SESSION['exist_acc']=false;
		?>
 		<script>
  		$(function(){	popexiacc();  });
  		</script>
  		<? 
}

else if ($_SESSION['acc_success']) 
{ 
	$_SESSION['acc_success']=false;
	?>
  	<script>
  	$(function(){	popsuccess();  });
  	</script>
  	<? 
}
else if($_SESSION['forgot'])
{
	$_SESSION['forgot']=false;
	?>
  	<script>
  	$(function(){	popforgot();  });
  	</script>
  	<? 
}
else if($_SESSION['forgot_er'])
{
	$_SESSION['forgot_er']=false;
	?>
  	<script>
  	$(function(){	popforgoterr();  });
  	</script>
  	<? 
}
?>

<!--Script for dynamic validation of emailid and password characters-->
<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
});
</script>
<!--Scripts For different popup message-->
<script>
	
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

    function popsuccess()
    {
        var alert = generate('Account Created Successfully');
    }
    function popregierr()
    {
        var alert = generate('Registration Failed,Try again later');
    }
    function popexiacc()
    {
        var alert = generate('Emailid already Exists');
    }
    function poplogierr()
    {
        var alert = generate('Emailid and Password Mismatched');
    }
    function popforgot()
    {
    	var alert = generate('Password has been mailed to your Emailid');
    }
    function popforgoterr()
    {
    	var alert = generate('Password Sending Failed Please Check your Emailid');
    }
</script>
</body>
</html>
