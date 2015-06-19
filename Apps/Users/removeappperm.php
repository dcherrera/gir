<?include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<?
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.sec.inc.php';
  $sql = $sec_conn->prepare("DELETE FROM `app_perm` WHERE `app_appid` = :appid AND `members_id` = :member");
  $sql->bindParam(':appid', $_GET[appid]);  
  $sql->bindParam(':member', $_GET[member]);
  $sql->execute();
  $sec_conn = null;        // Disconnect
}
catch(PDOException $e) {
  echo $e->getMessage();
}
echo 'Removed '. $_GET[appid] .' Permisions from user '. $_GET[member];
?>
<script type='text/javascript'>
 setTimeout('self.close()',5000);
</script>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>
