<?php
include $_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start(); // Our custom secure way of starting a php session. 
 
if(isset($_POST['email'], $_POST['p'])) { 
   $email = $_POST['email'];
   $password = $_POST['p']; // The hashed password.
   if(login($email, $password, $mysqli) == true) {
      // Login success
	header("Refresh: 0; URL=http://$_SERVER[HTTP_HOST]");
		echo 'Success: You have been logged in! </br>';	
		echo '<a href="/index.php">Start using the Inventory Program!</a> ';

   } else {
      // Login failed
		echo 'Failed to login! Try Agian';
		echo ' <a href="../index.php">Login</a> ';
   }
} else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}
?>
