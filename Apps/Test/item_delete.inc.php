<?//item_delete.inc.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<?
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
  $sql= "DELETE FROM `Info` WHERE `Item_ItemID` = :item;
  		 DELETE FROM `ListPics` WHERE `Item_ItemID` = :item;
  		 DELETE FROM `Item` WHERE `ItemID` = :item;";
  $item = $db_conn->prepare($sql);
  $item->bindParam(':item', $_POST['id'], PDO::PARAM_INT);
  $item->execute(); 
echo "1 Record Deleted From 3 Tables!";
?>
<script type='text/javascript'>setTimeout('self.close()',5000);</script>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
