<!--PAGE TO DESTROY LOGGED IN SESSIONS(LOGOUT)-->

<?php
session_start();
$destroy=session_destroy();	 // Destroying All Sessions
if($destroy) 											   
{
header("Location: ../index.php"); // Redirecting To Home Page
}
?>