<?//item_info.inc.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<html>
<head>
<title>Form Edit Data</title>
</head>

<body>
<table border=1>
  <tr>
    <td align=center>Add Information for Item # <?echo$_GET['id'];?></td>
  </tr>
  <tr>
    <td>
      <table>
      <? try{
      include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
      $sql = "SELECT * FROM `Info` WHERE `Item_ItemID`=:ItemID";
      $item = $db_conn->prepare($sql);
      $item->bindParam(':ItemID', $_GET['id'], PDO::PARAM_INT);
      $item->execute(); 
      $count = $item->fetch(PDO::FETCH_ASSOC);
	if(!$count){
	$id = $_GET['id'];
echo("no");
   echo('<form method="post" action="item_info.inc.php">');
   echo('<input type="hidden" name="id" value="">');
   echo('<tr><td>Manufacturer</td><td><input type="text" name="Manufacturer" size="20" value=""></td></tr>');
   echo('<tr><td>Model</td><td><input type="text" name="Model" size="40" value=""></td></tr>');
   echo('<tr><td>Model Number</td><td><input type="text" name="ModelNumber" size="20" value=""></td></tr>');
   echo('<tr><td>Serial Number</td><td><input type="text" name="SerialNumber" size="20" value=""></td></tr>');
   echo('<tr><td>Service Number</td><td><input type="text" name="ServiceNumber" size="20" value=""></td></tr>');
   echo('<input type="hidden" name="ItemID" size="20" value="'.$id.'">');
   echo('<tr><td align="right"><input type="submit"></td></tr>');
   echo('</form>');
}
	else{while($row = $item->fetch(PDO::FETCH_ASSOC)){
	$InfoID = $row['InfoID'];
	$Manufacturer = $row['Manufacturer'];
	$Model = $row['Model'];
	$ModelNumber = $row['ModelNumber'];
	$SerialNumber = $row['SerialNumber'];
	$ServiceNumber = $row['ServiceNumber'];
	$id = $_GET['id'];
echo("yes");
      echo('<form method="post" action="item_info.inc.php">');
      echo('<input type="hidden" name="id" value="$InfoID">');
      echo('<tr><td>Manufacturer</td><td><input type="text" name="Manufacturer" size="20" value="'.$Manufacturer.'"></td></tr>');
      echo('<tr><td>Model</td><td><input type="text" name="Model" size="40" value="'.$Model.'"></td></tr>');
      echo('<tr><td>Model Number</td><td><input type="text" name="ModelNumber" size="20" value="'.$ModelNumber.'"></td></tr>');
      echo('<tr><td>Serial Number</td><td><input type="text" name="SerialNumber" size="20" value="'.$SerialNumber.'"></td></tr>');
      echo('<tr><td>Service Number</td><td><input type="text" name="ServiceNumber" size="20" value="'.$ServiceNumber.'"></td></tr>');
      echo('<input type="hidden" name="ItemID" size="20" value="'.$id.'">');
      echo('<tr><td align="right"><input type="submit"></td></tr>');
      echo('</form>');
	}}
}catch(PDOException $e){echo $e->getMessage();}?>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
