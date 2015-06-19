<?php
// The hashed password from the form
$password = $_POST['p']; 
// Create a random salt
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Create salted password (Careful not to over season)
$password = hash('sha512', $password.$random_salt);
$username = $_POST['username'];
$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$business = $_POST['business'];
include $_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, first, last, email, password, salt, business_businessid) VALUES (?, ?, ?, ?, ?, ?,?)")){    
   $insert_stmt->bind_param('sssssss', $username, $first, $last, $email, $password, $random_salt, $business);
   $insert_stmt->execute();
   $insert_stmt->close();
   }
echo "1 New user added!";
?>
<script type='text/javascript'>
 setTimeout('self.close()',5000);
</script>
