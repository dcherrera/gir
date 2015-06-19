<?
include($_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php');
sec_session_start();
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
  $editsql= "UPDATE `Item`
		SET `Category` = :Category,
		    `Cost` = :Cost,
		    `Condition` = :Condition,
		    `PurchaseLot_PurchaseLotID` = :PurchaseLot,
		    `Location` = :Location,
		    `Shelf` = :Shelf,
		    `Desc` = :Desc,
		    `Step` = :Step,
		    `Weight` = :Weight,
		    `Notes` = :Notes
	      WHERE `ItemID` = :id";
  $sql = $db_conn->prepare($editsql);
  $sql->bindParam(':Category', $_POST['Category'], PDO::PARAM_STR);
  $sql->bindParam(':Cost', $_POST['Cost'], PDO::PARAM_STR);
  $sql->bindParam(':Condition', $_POST['Condition'], PDO::PARAM_STR);
  $sql->bindParam(':PurchaseLot', $_POST['PurchaseLot'], PDO::PARAM_STR);
  $sql->bindParam(':Location', $_POST['Location'], PDO::PARAM_STR);
  $sql->bindParam(':Shelf', $_POST['Shelf'], PDO::PARAM_STR);
  $sql->bindParam(':Desc', $_POST['Desc'], PDO::PARAM_STR);
  $sql->bindParam(':Step', $_POST['Step'], PDO::PARAM_STR);
  $sql->bindParam(':Weight', $_POST['Weight'], PDO::PARAM_STR);
  $sql->bindParam(':Notes', $_POST['Notes'], PDO::PARAM_STR);
  $sql->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
  $sql->execute();
 $db_conn = null;        // Disconnect
}
catch(PDOException $e){echo $e->getMessage();}
echo "1 Record Updated";
?>
<script type='text/javascript'>
function div()
{
$('#content').hide().load('Apps/Inventory/index.php').fadeIn('normal');
}
setTimeout('div()',2000);
</script>


