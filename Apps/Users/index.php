<?include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<body>
<?
$dir=dirname($_SERVER['PHP_SELF']);//get current directory
echo "<a href='$dir/adduser.php' target='blank_'>Add User</a>";
?>
<table>
  <tr>
    <td align="center">View all Users</td>
  </tr>
  <tr>
    <td>
      <table border="1">
        <tr>
	<th>UserID</th>
        <th>UserName</th>
        <th>First</th>
        <th>Last</th>
        <th>eMail</th>
        <th></th>
        <th></th>
	</tr>
      <?
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.sec.inc.php';
  $sql = $sec_conn->query("SELECT * FROM `members`");
  $sql->setFetchMode(PDO::FETCH_ASSOC); 
  while($row = $sql->fetch()){
        echo ("<tr>");
        echo ("<td>$row[id]</td>");
        echo ("<td>$row[username]</td>");
        echo ("<td>$row[first]</td>");
        echo ("<td>$row[last]</td>");
        echo ("<td>$row[email]</td>");
        echo ("<td><a href=\"$dir/apppermissions.php?id=$row[id]\" target=\"_blank\">App Permissions</a></td>");
        echo ("<td><a href=\"$dir/actionpermissions.php?id=$row[id]\" target=\"_blank\">Action Permissions</a></td>");
        echo ("<td><a href=\"$dir/log.php?id=$row[id]\" target=\"_blank\">Log</a></td>");
        echo ("</tr>");
}  
}catch(PDOException $e){echo $e->getMessage();}
          ?>
      </table>
    </td>
   </tr>
</table>
</body>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>
