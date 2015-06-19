<?
//file include for database connection
//db.inc.php
//database connection
$user = "sec_user";
$pass = "eKcGZr59zAa2BEWU";
$db = "secure_login";
mysql_connect("localhost", $user, $pass);
// database selection
mysql_select_db($db);
?>
