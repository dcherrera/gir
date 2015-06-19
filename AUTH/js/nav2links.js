$('.nav2').click(function() {  
  var href = $(this).attr('href');
  switch (href){
  case "AUTH/home.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../nav/home/home_nav.php');
  break;
  case "AUTH/crm.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../nav/crm/crm_nav.php/');
  break;
  case "AUTH/inventory.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../nav/inventory/inventory_nav.php');
  break;
  case "AUTH/sales.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../nav/sales/sales_nav.php');
  break;
  case "AUTH/listings.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../nav/listings/listings_nav.php');
  break;
  case "AUTH/users.php":
   $('#content').hide().load(href).fadeIn('normal');
   $('#nav3').load('../nav/users/users_nav.php');
  break;
  default:
  }
  return false;
});