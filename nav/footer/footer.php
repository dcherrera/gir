<?php
include '../AUTH/db_connect.php';
include '../AUTH/functions.php';
sec_session_start();
if(login_check($mysqli) == true) {
echo '<a href="blog.php">Blog</a> -';
echo '<a href="services.php">Services</a> -';
echo '<a href="app.php">App Review</a> -';	
echo '<a href="tutorials.php">Tutorials</a> -';
echo '<a href="store.html">Store</a> -';
echo '<a href="contact.php">Contact Us</a>';
} else {
echo '<a href="blog.php">Blog</a> -';
echo '<a href="services.php">Services</a> -';
echo '<a href="app.php">App Review</a> -';	
echo '<a href="tutorials.php">Tutorials</a> -';
echo '<a href="store.html">Store</a> -';
echo '<a href="contact.php">Contact Us</a> -';
echo '<a class="login" href="AUTH/login.html">Login</a>';
	}
?>	


