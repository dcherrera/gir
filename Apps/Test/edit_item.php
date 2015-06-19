<?//Inventory Edit Item PHP
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<html>
<head><title>Form Edit Data</title></head>
<table border="1">
<tr><td align="center">Edit Item # <?echo$_GET['id'];?> Data</td></tr>
<tr><td><table>
<form method="post" action="edit_item.inc.php">
<?
$itemid = (int)$_GET['id'];
$itemid = $itemid;
try{
include($_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php');
  $sql = "SELECT * FROM `Item` WHERE `ItemID` = :item LIMIT 1";
  $item = $db_conn->prepare($sql);
  $item->bindParam(':item', $itemid, PDO::PARAM_INT);
  $item->execute();
  while($row = $item->fetch(PDO::FETCH_ASSOC)){
$id = $row['ItemID'];
$category = $row['Category'];
$cost = $row['Cost'];
$condition = $row['Condition'];
$pl = $row['PurchaseLot_PurchaseLotID'];
$location = $row['Location'];
$shelf = $row['Shelf'];
$date = $row['Date'];
$desc = $row['Desc'];
$notes = $row['Notes'];
$weight = $row['Weight'];
$step = $row['Step'];
}
}catch(PDOException $e){echo $e->getMessage();}?>
<input type="hidden" name="id" value="<?echo$id;?>">
<tr><td>Category</td><td><input type="text" name="Category" size="20" value="<?echo$category;?>"></td></tr>
<tr><td>Cost</td><td><input type="text" name="Cost" size="40" value="<?echo$cost;?>"></td></tr>
<tr><td>Condition</td><td><input type="text" name="Condition" size="20" value="<?echo$condition;?>"></td></tr>
<tr><td>Purchase Lot</td><td><input type="text" name="PurchaseLot" size="20" value="<?echo$pl;?>"></td></tr>
<tr><td>Location</td><td><input type="text" name="Location" size="20" value="<?echo$location;?>"></td></tr>
<tr><td>Shelf</td><td><input type="text" name="Shelf" size="20" value="<?echo$shelf;?>"></td></tr>
<tr><td>Date</td><td><input type="text" name="Dates" size="20" value="<?echo$date;?>"></td></tr>
<tr><td>Description</td><td><input type="text" name="Desc" size="20" value="<?echo$desc;?>"></td></tr>
<tr><td>Notes</td><td><input type="text" name="Notes" size="20" value="<?echo$notes;?>"></td></tr>
<tr><td>Weight</td><td><input type="text" name="Weight" size="20" value="<?echo$weight;?>"></td></tr>
<tr><td>Step</td><td><input type="text" name="Step" size="20" value="<?echo$step;?>"></td></tr>

<tr><td align="right"><input type="submit"></td></tr>
</form>
</table></td></tr>
</table>
</html>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
