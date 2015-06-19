<?
sec_session_start();
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.sec.inc.php';
$apps = $sec_conn->prepare("SELECT `app_appid` FROM `app_perm` WHERE `members_id`=:member");
$apps->bindParam(':member', $_SESSION['user_id']);
$apps->execute();
$apparr = array();
$files = array();
while($app = $apps->fetch(PDO::FETCH_ASSOC)) 
{$apparr = $app['app_appid'];
$files = glob("Apps/*.php");
foreach($files as $file) 
	{$basefile = basename($file, ".php");
	 if ($apparr == $basefile) {echo "<a class='nav2' href='Apps/$basefile/index.php'>$basefile</a></br>";}
	}
}}catch(PDOException $e){echo $e->getMessage();}
?>
