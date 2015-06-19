$('.nav3').click(function() {  
  var href = $(this).attr('href');
  switch (href){
    case "AUTH/DB/addsupplier.html":
   $('#content').hide().load(href).fadeIn('normal');
  break;
  case "AUTH/crm.php":
   $('#content').hide().load(href).fadeIn('normal');
  break;
  case "AUTH/inventory.php":
   $('#content').hide().load(href).fadeIn('normal');
  break;
  default:
  }
  return false;
});