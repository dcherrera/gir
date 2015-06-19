<?include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<body>
<table>
  <tr>
    <td align="center">View all logins for <?echo($_GET['id'])?></td>
  </tr>
  <tr>
    <td>
      <table border="1">
        <tr>
	<th>Time</th>
	</tr>
<?
$dir=dirname($_SERVER['PHP_SELF']);//get current directory
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.sec.inc.php';
  $sql = $sec_conn->prepare("SELECT time, ip FROM `logged_in` WHERE `user_id` = :user ORDER BY `time` DESC");
  $sql->bindParam(':user', $_GET['id']);
  $sql->execute();
  $sql->setFetchMode(PDO::FETCH_ASSOC); 
  while($row = $sql->fetch()){
        echo ("<tr>");
        echo ("<td>". date("F j, Y, g:i a", $row['time']) ."</td>");
	echo ("<td>". $row['ip'] ."</td>");
        echo ("</tr>");
}  
}catch(PDOException $e){echo $e->getMessage();}
          ?>
      </table>
    </td>
   </tr>
</table>
</body>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://$_SERVER[HTTP_HOST]/AUTH/login.html\">login</a>. <br/>");}?>
