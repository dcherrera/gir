<?php
sec_session_start();
if(login_check($mysqli) == true) {
include('user_greating.html');
} else {
include('content.html');
}
?>
