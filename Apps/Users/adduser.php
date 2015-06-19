<?include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<script type="text/javascript" src="sha512.js"></script>
<script type="text/javascript" src="forms.js"></script>
<form action="adduser.inc.php" method="post" name="login_form">
Business: <input type="text" name="business" /><br />
User Name: <input type="text" name="username" /><br />
First Name: <input type="text" name="first" /><br />
Last Name: <input type="text" name="last" /><br />
Email: <input type="text" name="email" /><br />
Password: <input type="password" name="password" id="password"/><br />
<br/><br/>
<input type="submit" value="Register" onclick="formhash(this.form, this.form.password);" />
</form>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>
