<?php
error_reporting(0);
function sec_session_start() {
        $session_name = 'sec_session_id'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(); // regenerated the session, delete the old one.  
}
function login($email, $password, $mysqli) {
   // Using prepared Statements means that SQL injection is not possible. 
   if ($stmt = $mysqli->prepare("SELECT id, username, first, last, password, salt, business_businessid FROM members WHERE email = ? LIMIT 1")) { 
      $stmt->bind_param('s', $email); // Bind "$email" to parameter.
      $stmt->execute(); // Execute the prepared query.
      $stmt->store_result();
      $stmt->bind_result($user_id, $username, $first, $last, $db_password, $salt, $business); // get variables from result.
      $stmt->fetch();
      $password = hash('sha512', $password.$salt); // hash the password with the unique salt.
      if($stmt->num_rows == 1) { // If the user exists
         // We check if the account is locked from too many login attempts
         if(checkbrute($user_id, $mysqli) == true) { 
            // Account is locked
            // Send an email to user saying their account is locked
            return false;
         } else {
         if($db_password == $password) { // Check if the password in the database matches the password the user submitted. 
            // Password is correct!
try {
    $conn = new PDO('mysql:host=localhost;dbname=secure_login', sec_user, eKcGZr59zAa2BEWU);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $conn->query('SELECT db, dbuser, dbpass FROM business WHERE businessid = ' . $business);
     foreach($data as $row) {
        $_SESSION['db'] = $row['db'];
        $_SESSION['dbuser'] = $row['dbuser'];
        $_SESSION['dbpass'] = $row['dbpass'];
    }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
               $_SESSION['user_id'] = $user_id; 
               $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // XSS protection as we might print this value
               $_SESSION['username'] = $username;
               $first = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $first); // XSS protection as we might print this value
               $_SESSION['first'] = $first;
               $last = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $last); // XSS protection as we might print this value
               $_SESSION['last'] = $last;
               $_SESSION['business'] = $business;
               $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
               // Login successful.
            $now = time();
	    $ipaddress = $_SERVER['REMOTE_ADDR'];
            $mysqli->query("INSERT INTO logged_in (user_id, time, ip) VALUES ('$user_id', '$now', '$ipaddress')");
               return true;    
         } else {
            // Password is not correct
            // We record this attempt in the database
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            return false;
         }
      }
      } else {
         // No user exists. 
         return false;
      }
   }
}
function checkbrute($user_id, $mysqli) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (2 * 60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) { 
      $stmt->bind_param('i', $user_id); 
      // Execute the prepared query.
      $stmt->execute();
      $stmt->store_result();
      // If there has been more than 5 failed logins
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
}
function login_check($mysqli) {
   // Check if all session variables are set
	if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['first'], $_SESSION['last'], $_SESSION['login_string'], $_SESSION['db'], $_SESSION['dbuser'], $_SESSION['dbpass'])) {
     $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
     $username = $_SESSION['username'];
     $first = $_SESSION['first'];
     $last = $_SESSION['last'];
     $db = $_SESSION['db'];
     $dbuser = $_SESSION['dbuser'];
     $dbpass = $_SESSION['dbpass'];
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
		if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) { 
        $stmt->bind_param('i', $user_id); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
			if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
				if($login_check == $login_string) {return true;//Logged in!!
				}else{return false;}
			}else{return false;}
		}else{return false;}
	}else{return false;}
}
?>
