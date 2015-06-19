$('.login').click(function() {  
  var href = $(this).attr('href');
  switch (href){
    case "AUTH/login.html":
   $('#content').hide().load(href).fadeIn('normal');
  break;
  default:
  }
  return false;
});