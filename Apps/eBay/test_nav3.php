<?php
//test_nav3.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
$dir=dirname($_SERVER['PHP_SELF']);
$dir = substr($dir, 1);
//Nav 3 Links Go Here
echo '<a class="nav3" href="'.$dir.'/find.html">Find</a>';
//End Nav 3 Links
sec_session_start();
echo '<h1><a href="AUTH/logout.php">Logout '.$_SESSION['first'].' '.$_SESSION['last'].'</a></h1>';
//Be sure to update the javascript to load any new links.
?>
<script type="text/javascript">
$('.nav3').click(function() {  
  var href = $(this).attr('href');
  switch (href){
    case "Apps/Test/find.html":
   $('#content').hide().load(href).fadeIn('normal');
  break;
  default:
  }
  return false;
});
</script>
