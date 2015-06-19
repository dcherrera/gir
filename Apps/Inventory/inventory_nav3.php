<?php
//inventory_nav3.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
$dir = dirname($_SERVER['PHP_SELF']);
$dir = substr($dir, 1);
$dir2 = $_SERVER['DOCUMENT_ROOT'];
echo '<a class="nav3" href="'.$dir.'/additem.php" taget="_blank">Add Item</a>';
sec_session_start();
echo '<h1><a href="AUTH/logout.php">Logout '.$_SESSION['first'].' '.$_SESSION['last'].'</a></h1>';
?>
<script type="text/javascript">
$('.nav3').click(function() {  
  var href = $(this).attr('href');
  switch (href){	  
    case "Apps/Inventory/additem.php":
   $('#content').hide().load(href).fadeIn('normal');
  break;
  default:
  }
  return false;
});
</script>
