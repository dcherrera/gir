<?//item_info.inc.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<? try{
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
  $sql= "INSERT INTO `Info` (`Manufacturer`, `Model`, `ModelNumber`, `SerialNumber`, `ServiceNumber`, `Item_ItemID`)VALUES(:Manufacturer, :Model, :ModelNumber, :SerialNumber, :ServiceNumber, :ItemID)
ON DUPLICATE KEY UPDATE
          `Manufacturer` = :Manufacturer2,
          `Model` = :Model2,
          `ModelNumber` = :ModelNumber2,
          `SerialNumber` = :SerialNumber2,
          `ServiceNumber` = :ServiceNumber2";
  $item = $db_conn->prepare($sql);
  $id = (int) $_POST['ItemID'];
  $item->bindParam(':Manufacturer', $_POST['Manufacturer'], PDO::PARAM_INT);
  $item->bindParam(':Manufacturer2', $_POST['Manufacturer'], PDO::PARAM_INT);
  $item->bindParam(':Model', $_POST['Model'], PDO::PARAM_INT);
  $item->bindParam(':Model2', $_POST['Model'], PDO::PARAM_INT);
  $item->bindParam(':ModelNumber', $_POST['ModelNumber'], PDO::PARAM_INT);
  $item->bindParam(':ModelNumber2', $_POST['ModelNumber'], PDO::PARAM_INT);
  $item->bindParam(':SerialNumber', $_POST['SerialNumber'], PDO::PARAM_INT);
  $item->bindParam(':SerialNumber2', $_POST['SerialNumber'], PDO::PARAM_INT);
  $item->bindParam(':ServiceNumber', $_POST['ServiceNumber'], PDO::PARAM_INT);
  $item->bindParam(':ServiceNumber2', $_POST['ServiceNumber'], PDO::PARAM_INT);
  $item->bindParam(':ItemID', $id, PDO::PARAM_INT);
  $item->execute(); 
echo"Manufaturer Information added for item #".$_POST['ItemID'];
}catch(PDOException $e){echo $e->getMessage();}?>
<script type='text/javascript'>setTimeout('self.close()',5000);</script>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
