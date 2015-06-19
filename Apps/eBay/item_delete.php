<?//item_delete.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<html>
<head>
<title>Form Delete Data</title>
</head>

<body>
<table border=1>
  <tr>
    <td align=center>Are you sure you want to delete Item # <?echo $_GET['id']?></td>
  </tr>
  <tr>
    <td align=center>This is an irreversible operation.</td>
  </tr>
  <tr>
    <td>
      <table>
      <form method="post" action="item_delete.inc.php">
      <input type="hidden" name="id" value="<?echo $_GET['id']?>">
		<tr><td align="right"><input type="submit"></td></tr>
      </form>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
