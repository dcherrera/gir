<?
//file include for database connection
//db.inc.php
//database connection
sec_session_start();
$user = "$_SESSION[dbuser]";
$pass = "$_SESSION[dbpass]";
$db = "$_SESSION[db]";
mysql_connect("localhost", $user, $pass);
// database selection
mysql_select_db($db);
?>
