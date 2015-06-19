<?
//file include for database connection
//pdo.sec.inc.php
//database connection
$host = "localhost";
$user = "sec_user";
$pass = "eKcGZr59zAa2BEWU";
$db = "secure_login";
$sec_conn = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
$sec_conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
?>
