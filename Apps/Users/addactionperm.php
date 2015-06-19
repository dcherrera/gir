<?include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<?
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.sec.inc.php';
  $sql = $sec_conn->prepare("INSERT INTO `action_perm` (action_actionid, members_id) VALUES (:actionid, :member)");
  $sql->bindParam(':actionid', $_GET[actionid]);  
  $sql->bindParam(':member', $_GET[member]);
  $sql->execute();
  $conn = null;        // Disconnect
}
catch(PDOException $e) {
  echo $e->getMessage();
}
echo 'Gave '. $_GET[actionid] .' Permisions to user '. $_GET[member];
?>
<script type='text/javascript'>
 setTimeout('self.close()',5000);
</script>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>

