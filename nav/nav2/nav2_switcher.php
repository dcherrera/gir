<?php	
	// Authenticated user interface CSS File exchange.
sec_session_start();
	if(login_check($mysqli) == true) {
	echo '<div id="sidebar-auth" class="nav2">';
	} else {
	echo '<div id="sidebar-anon">';
	}
?>
