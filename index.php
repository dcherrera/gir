<?php 
include $_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();
?>
<html>
<head>
	<link href="css/index.css" rel="stylesheet" type="text/css">
	<meta name="MSSmartTagsPreventParsing" content="true" />
	<meta name="author" content="Corey David Herrera" />
	<title>GIZ</title>
</head>
<body>
<div id="page-container">
	<div id="main-nav"><?php// include("nav/nav1/nav1.html");?></div>
	<div id="nav3"><?php include('nav/nav3/nav3.php');?></div>
	<?php include('nav/nav2/nav2_switcher.php');?>
	<div class="padding"><?php include("nav/nav2/nav2.php");?></div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/nav2links.js"></script>
<div id="content"><?php include('content_switcher.php');?></div>
<div id="footer">
	<div id="altnav"><?php include("nav/footer/footer.php");?></div>
	Copyright &copy; Global Technology Restoration Services Corp
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/footerlinks.js"></script>
</div>
</body>
</html>
