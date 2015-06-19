<?//additem.php
$dir=dirname($_SERVER['PHP_SELF']);
include$_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include$_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
sec_session_start();if(login_check($mysqli)==true){?>
<form id="additem" action="<?php echo $dir;?>/additem.inc.php" method="post">
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
  <option value="Referbished">Referbished</option>
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
  <option value="WaitingOnParts">Waiting On Parts</option>
</select> <br/>

<label for="Weight">Weight:</label>
<input type="text" name="Weight"><br/>

<input type="submit">
</form>
<script type="text/javascript">
$('#additem').submit(function() { // catch the form's submit event
    $.ajax({ // create an AJAX call...
        data: $(this).serialize(), // get the form data
        type: $(this).attr('method'), // GET or POST
        url: $(this).attr('action'), // the file to call
        success: function(response) { // on success..
            $('#content').html(response); // update the DIV
        }
    });
    return false; // cancel original event to prevent form submitting
});
</script>
<?}else{echo ("You are not authorized to access this page, please <a href=\"http://107.170.6.151/AUTH/login.html\">login</a>. <br/>");}?>
