<?
session_start();

	$connect=mysql_connect("localhost","root","mysql");		//Connect mysql
	
	if(!$connect)
	{
		die('Could not connect'.mysql_error());				//If can't connect then die
	}
	mysql_select_db("inventory",$connect);					//selecting database
	$eml=$_POST['email'];

    require_once('class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "devravindra.34@gmail.com";  // GMAIL username
	$mail->Password   = "  ";            // GMAIL password
	$mail->SetFrom('devravindra.34@gmail.com', 'Ravindra D');
	$mail->Subject    = "Your Password is";

	$mail->IsMail();		/*It is very important to add this line in here or else it'll give you error for manually setting $mail->Body , if that
							is removed and $mail->AltBody is set, then it'll show the error as the "Message body empty", so this is line that 
							need to be added to manually assign the body value of the mail . It also used to tell PHPMailer to use the
							mail() function of the php .*/
	$r=mysql_query("SELECT password from shop_login WHERE email  ='$eml' ");
	$row=mysql_fetch_array($r);
	$p_res2=$row['password'];
	$mail->Body=$p_res2;
	$address = $eml; 
	$mail->AddAddress($address);
	if(!$mail->Send()) 
	{
  	$_SESSION['forgot']=true;																				
	header('Location: ../login.php');																		
	}
	else
	{
	$_SESSION['forgot_er']=true;																				
	header('Location: ../login.php');																		
	}
?>