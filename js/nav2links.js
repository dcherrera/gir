$('.nav2').click(function() {  
  var href = $(this).attr('href');
  switch (href){
  case "Apps/Home/index.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../Apps/Home/home_nav3.php');
  break;
  case "Apps/Inventory/index.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../Apps/Inventory/inventory_nav3.php');
  break;
  case "Apps/eBay/index.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../Apps/eBay/ebay_nav3.php');
  break;
  case "Apps/Users/index.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../Apps/Users/users_nav3.php');
  break;
  case "Apps/Test/index.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../Apps/Test/test_nav3.php');
  break;
  default:
  }
  return false;
});
