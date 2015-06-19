<?php
//home_nav3.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
echo 'This is the Home Navigation PHP file';
sec_session_start();
echo '<h1><a href="AUTH/logout.php">Logout '.$_SESSION['first'].' '.$_SESSION['last'].'</a></h1>';
?>
