<?php
//Tertiary Navigation
sec_session_start();
if(login_check($mysqli) == true) {
$usertype = $_SESSION["usertype"];
switch ($usertype)
{
case admin :
  include('nav/nav3/nav3_admin.html');
  break;
case owner :
  include('nav/nav3/nav3_owner.html');
  break;
case tester:
  include('nav/nav3/nav3_tester.html');
  break;
case lister:
  include('nav/nav3/nav3_lister.html');
  break;
case shipper:
  include('nav/nav3/nav3_shipper.html');
  break;
default:
  echo $usertype;
}
} else {
   echo '';
}
?>
