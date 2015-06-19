<?php	
	// Authenticated user interface CSS File exchange.
	if(login_check($mysqli) == true) {
	include 'nav2Automation.php';
	} else {
   include 'nav2_anon.html';
	}
?>
