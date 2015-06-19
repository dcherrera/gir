<?//Inventory index.php
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<form action="additem.inc.php" method="post">
<label for="Category">Category:</label>
<select name="Category">
  <option value="NA">NA</option>
  <option value="Laptop">Laptop</option>
  <option value="Phone">Phone</option>
  <option value="Projector">Projector</option>
  <option value="Remote">Remote</option>
  <option value="Part">Part</option>
  <option value="Radio">Radio</option>
  <option value="Printer">Printer</option>
  <option value="PowerSupply">Power Supply</option>
  <option value="Audio">Audio</option>
  <option value="Tubes">Tubes</option>
  <option value="Server">Server</option>
  <option value="Remote">Remote</option>
  <option value="Music">Music</option>
  <option value="Software">Software</option>
</select> <br/>

<label for="Condition">Condition:</label> 
<select name="Condition">
  <option value="NA">NA</option>
  <option value="New">New</option>
  <option value="LikeNew">Like New</option>
  <option value="Used">Used</option>
  <option value="Parts">Parts</option>
</select> <br/>

<label for="PurchaseLot">PurchaseLot:</label> 
<input type="text" name="PurchaseLot"><br/>

<label for="Location">Location:</label> 
<input type="text" name="Location"><br/>

<label for="Shelf">Shelf:</label> 
<input type="text" name="Shelf"><br/>

<label for="Step">Step:</label>
<select name="Step">
  <option value="Test">Test</option>
  <option value="List">List</option>
  <option value="TearDown">TearDown</option>
  <option value="ReList">ReList</option>
  <option value="NeedsParts">Needs Parts</option>
  <option value="Install">Install</option>
</select> <br/>

<label for="Weight">Weight:</label>
<input type="text" name="Weight"><br/>

<input type="submit">
</form>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>
