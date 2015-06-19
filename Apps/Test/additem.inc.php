<?php
include($_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php');
sec_session_start();
try{
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
$sql="INSERT INTO `Item` (`Category`, `Condition`, `PurchaseLot_PurchaseLotID`, `Location`, `Shelf`, `Step`, `Weight`) VALUES (:Category, :Condition, :PurchaseLot, :Location, :Shelf, :Step, :Weight)";
  $item = $db_conn->prepare($sql);
  $item->bindParam(':Category', $_POST['Category'], PDO::PARAM_STR);
  $item->bindParam(':Condition', $_POST['Condition'], PDO::PARAM_STR);
  $item->bindParam(':PurchaseLot', $_POST['PurchaseLot'], PDO::PARAM_INT);
  $item->bindParam(':Location', $_POST['Location'], PDO::PARAM_STR);
  $item->bindParam(':Shelf', $_POST['Shelf'], PDO::PARAM_STR);
  $item->bindParam(':Step', $_POST['Step'], PDO::PARAM_STR);
  $item->bindParam(':Weight', $_POST['Weight'], PDO::PARAM_STR);
  $item->execute();  
echo '1 item added';
}catch(PDOException $e){
 echo $e->getMessage();
 }
?>
<script type='text/javascript'>
setTimeout('self.close()',5000);
</script>
