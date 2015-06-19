<?include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<html>
<body>
<table>
  <tr>
    <td align="center">View all <?echo $_GET['id'];?> Action Permisions</td>
  </tr>
  <tr>
    <td>
      <table border="1">
        <tr>
        <th>Action</th>
        <th>Description</th>
        <th></th>
	</tr>
<?
$dir=dirname($_SERVER['PHP_SELF']);//get current directory
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.sec.inc.php';
  $sql = $sec_conn->query("SELECT * FROM `action`");
  $sql->setFetchMode(PDO::FETCH_ASSOC); 
  while($row = $sql->fetch())
	{
        echo "<tr>";
        echo "<td>".$row['actionid']."</td>";
        echo "<td>".$row['desc']."</td>";
  $perm = $sec_conn->prepare("SELECT * FROM `action_perm` WHERE `action_actionid` = :actionid AND `members_id` = :member");
  $perm->bindParam(':actionid', $row['actionid']);
  $perm->bindParam(':member', $_GET['id']);
  $perm->execute();
  $count = $perm->fetch(PDO::FETCH_ASSOC);
  if(!$count){echo ("<td colspan=\"13\"><a href=\"$dir/addactionperm.php?actionid=$row[actionid]&member=$_GET[id]\" target=\"_blank\">Give Permission</a></td>");}else{echo ("<td colspan=\"13\"><a href=\"$dir/removeactionperm.php?actionid=$row[actionid]&member=$_GET[id]\" target=\"_blank\">Remove Permission</a></td>");}
}  
}catch(PDOException $e){echo $e->getMessage();}
       echo ("</tr>");
          ?>
      </table>
    </td>
   </tr>
</table>
</body>
</html>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>
