<?
//file include for database connection
//pdo.db.inc.php
//database connection
sec_session_start();
$host = "localhost";
$user = "$_SESSION[dbuser]";
$pass = "$_SESSION[dbpass]";
$db = "$_SESSION[db]";
$db_conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
