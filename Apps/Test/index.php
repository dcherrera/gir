<?php
//Test index.php
include $_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();
if(login_check($mysqli)==true){
?>
<?php $dir=dirname($_SERVER['PHP_SELF']);?>
<table>
  <tr><td align="center">View all Items</td></tr>
  <tr>
    <td>
      <table border="1">
        <tr>
        <th></th>
        <th></th>
	<th>ItemID</th>
        <th>Category</th>
        <th>Cost</th>
        <th>Condition</th>
        <th>PurchaseLot</th>
        <th>Location</th>
        <th>Shelf</th>
        <th>Date</th>
        <th>Desc</th>
        <th>Notes</th>
        <th>Status</th>
        <th></th>
	<th></th>
	</tr>
<?php
try{
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
  $item = $db_conn->prepare("SELECT * FROM `Item` WHERE `Step`= :step ORDER BY date DESC");
  $item->bindParam(':step', $step, PDO::PARAM_STR);
  $step = "Test";
  $item->execute();
  while($row = $item->fetch(PDO::FETCH_ASSOC)){
	echo('<tr>');
	echo('<td><a href="'.$dir.'/code128/ex.php?id='.$row[ItemID].'" target="_blank">tag</a></td>');
        echo('<td><a href="'.$dir.'/edit_item.php?id='.$row[ItemID].'" target="_blank">Edit</a></td>');
        echo('<td>'.$row['ItemID'].'</td>');
        echo('<td>'.$row['Category'].'</td>');
        echo('<td>'.$row['Cost'].'</td>');
        echo('<td>'.$row['Condition'].'</td>');
        echo('<td>'.$row['PurchaseLot_PurchaseLotID'].'</td>');
        echo('<td>'.$row['Location'].'</td>');
        echo('<td>'.$row['Shelf'].'</td>');
        echo('<td>'.$row['Date'].'</td>');
	if(!$row['Desc']){
	  echo('<td><a href="'.$dir.'/add_desc.php?id='.$row['ItemID'].'" target="_blank">Add</a></td>');
	} else {
	  echo('<td>'.$row['Desc'].'</td>');
	}
	if(!$row[Notes]){
	  echo('<td><a href="'.$dir.'/add_notes.php?id='.$row['ItemID'].'" target="_blank">Add</a></td>');
	} else {
	  echo('<td>'.$row['Notes'].'</td>');
	}
        echo('<td>'.$row['Step'].'</td>');
        echo('<td><a href="'.$dir.'/photo_upload.php?id='.$row['ItemID'].'" target="_blank">Pics</a></td>');
        echo('<td><a href="'.$dir.'/item_delete.php?id='.$row['ItemID'].'" target="_blank">Delete</a></td>');
	echo('</tr>');
	$itemid = (string) $row['ItemID'];
	//$item->closeCursor();
	$mansql = "SELECT * FROM `Info` WHERE `Item_ItemID` = :item";
	$Manufac = $db_conn->prepare($mansql);
	$Manufac->bindParam(':item', $itemid, PDO::PARAM_INT);
	$Manufac->execute();  
	$mancount = $Manufac->fetch(PDO::FETCH_ASSOC);
	if(!$mancount){
	  echo('<tr><td bgcolor="#D0D0D0" colspan="5"><a href="'.$dir.'/item_info.php?id='.$row['ItemID'].'" target="_blank">Add Manufacturing Information</a></td></tr>');
	} else {
	  echo ('<tr><td bgcolor="#D0D0D0" colspan="5">');
	  echo ('<b>Manufacturer:</b>'.$mancount['Manufacturer'].'<br/>');
	  echo ('<b>Model:</b>'.$mancount['Model'].'<br/>');
	  echo ('<b>Model Number:</b>'.$mancount['ModelNumber'].'<br/>');
	  echo ('<b>Serial Number:</b>'.$mancount['SerialNumber'].'<br/>');
	  echo ('<b>Service Number:</b>'.$mancount['ServiceNumber']);
	  echo ('</td></tr>');
	}
	}
}catch(PDOException $e){
 echo $e->getMessage();
 }
?>
      </table>
    </td>
   </tr>
</table>
<?php
} else {
  echo ('You are not authorized to access this page, please <a href="http://107.170.6.151/AUTH/login.html">login</a><br/>');
}
?>
