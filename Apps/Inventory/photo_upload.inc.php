<?php
include($_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php');
sec_session_start();
$db = "$_SESSION[db]";
$basedir = $_SERVER[DOCUMENT_ROOT];
$dir = "/upload/$db/$_POST[itemid]/";
if (!file_exists($dir) and !is_dir($dir)) {
    $upload_dir = mkdir("$basedir/$dir", 0777, true);
    echo "direcory made<br>" ;
}
foreach ($_FILES["file"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
	$filename = $_FILES["file"]["name"][$key];
	$filetemp = $_FILES["file"]["tmp_name"][$key];
	$filetype = $_FILES["file"]["type"][$key];
	$filesize = $_FILES["file"]["size"][$key];
   if (file_exists($basedir . $dir . $filename))
      {
      echo $filename . " already exists. <br><br>";
      }
    else
      {
      echo "Upload: " . $filename . "<br>";
      echo "Type: " . $filetype . "<br>";
      echo "Size: " . ($filesize / 1024) . " kB<br>";
      echo "Temporarily Stored in: " . $filetemp . "<br>";
      move_uploaded_file($filetemp,"$basedir/$dir/$filename");
      echo "uploaded the file \"" . $filename. "\" to the \"$dir<br>" ;
	$dir2 = $dir.$filename;

	 include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
	 $sql = "INSERT INTO `ListPics` (`1`, `Item_ItemID`) VALUES (:dir, :itemid)";
	 $item = $db_conn->prepare($sql);
	 $item->bindParam(':dir', $dir2);
	 $item->bindParam(':itemid', $_POST['itemid'], PDO::PARAM_INT);
	 $item->execute();

       }	
    }
}
echo ($filename. " added to Database<br><br>");
?>
<script type='text/javascript'>setTimeout('self.close()',5000);</script>
