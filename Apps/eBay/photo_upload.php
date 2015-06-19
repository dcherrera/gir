<?php
//photo_upload.php
include $_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();
if(login_check($mysqli)==true){
?>
<table>
  <tr>
    <td align="center">View all Photos for Item # <?php echo $_GET['id'];?></td>
  </tr>
  <tr>
    <td>
      <table border="1">
        <tr><td>PictureID</td>
        <td>Image</td></tr>
<?php
try{
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
      $sql = "SELECT * FROM `ListPics` WHERE `Item_ItemID`= :itemid";
      $item = $db_conn->prepare($sql);
      $item->bindParam(':itemid', $_GET['id'], PDO::PARAM_INT);
      $item->execute();
      while ($row = $item->fetch(PDO::FETCH_ASSOC)){
        echo '<tr><td>'.$row['ListPicsID'].'</td>' ;
        echo '<td><img src="'.$row[1].'" width="150" height="100"></td></tr>' ;
        }
}catch(PDOException $e){
 echo $e->getMessage();
 }
?>
      </table>
    </td>
   </tr>
</table>
<br>
<br>
<form action="photo_upload.inc.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file[]" id="file" multiple><br>
<input type="hidden" name="itemid" value="<?php echo $_GET[id];?>">
<input type="submit" name="submit" value="Submit">
</form>
<?php
} else {
  echo ('You are not authorized to access this page, please <a href="http://107.170.6.151/AUTH/login.html">login</a><br/>');
}
?>
