<?php
error_reporting(E_ALL);  // Turn on all errors, warnings, and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$man = $GET["man"];
$model = $_GET['modelNum'];
if(isset($man) && isset($model)){
echo 'man and model';
$concat = $man .' '. $model;
	}elseif(isset($man) && !isset($model)){
echo'man';
		$concat = $man;
	}elseif(!isset($man) && isset($model)){
echo'model';
		$concat = $model;
	}


$query = $concat;  // Supply your own query keywords as needed


// Construct the findItemsByKeywords POST call
// Load the call and capture the response returned by the eBay API
// the constructCallAndGetResponse function is defined below
$resp = simplexml_load_string(constructPostCallAndGetResponse($endpoint, $query));

// Check to see if the call was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';  // Initialize the $results variable

// Parse the desired information from the response
$x = 0;
$total = (float) 0;
  foreach($resp->searchResult->item as $item) {
$x++;
	if($item->sellingStatus->sellingState = EndedWithSales){
    $shippingCost = (float)$item->shippingInfo->shippingServiceCost;
    $soldFor      = (float)$item->sellingStatus->currentPrice;
    $saleTotal    = $soldFor+$shippingCost;
    $total = $total + $saleTotal ;
} 
//var_dump($total);

  }
$average = round($total/$x ,2);
//$average = $total/$x;
echo 'Average Sale Price: $' . $average .'<br>';
}
else {  // If the response does not indicate 'Success,' print an error
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}

?>
<?php
//Add average sale price to database
try {
include $_SERVER['DOCUMENT_ROOT'].'/Globals/db_connect.php';
include $_SERVER['DOCUMENT_ROOT'].'/Globals/functions.php';
include $_SERVER['DOCUMENT_ROOT'].'/Globals/pdo.db.inc.php';
$sql="UPDATE `Item` 
	 SET `EstimatedValue` = :value 
       WHERE `ItemID` = :id";
  $value = $db_conn->prepare($sql);
  $value->bindParam(':value', $average, PDO::PARAM_STR);
  $value->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $value->execute();

}catch(PDOException $e){echo $e->getMessage();}
echo 'Estimated Value added to Database';

?>
<?php
function constructPostCallAndGetResponse($endpoint, $query) {
  global $xmlrequest;

  // Create the XML request to be POSTed
  $xmlrequest  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
  $xmlrequest .= "<findCompletedItemsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">\n";
  $xmlrequest .= "<keywords>";
  $xmlrequest .= $query;
  $xmlrequest .= "</keywords>\n";
  $xmlrequest .= "<paginationInput>\n <entriesPerPage>50</entriesPerPage>\n</paginationInput>\n";
  $xmlrequest .= "</findCompletedItemsRequest>";

  // Set up the HTTP headers
  $headers = array(
    'X-EBAY-SOA-OPERATION-NAME: findCompletedItems',
    'X-EBAY-SOA-SERVICE-VERSION: 1.3.0',
    'X-EBAY-SOA-REQUEST-DATA-FORMAT: XML',
    'X-EBAY-SOA-GLOBAL-ID: EBAY-US',
    'X-EBAY-SOA-SECURITY-APPNAME: CoreyHer-d279-4762-928c-790d35f0b8a3',
    'Content-Type: text/xml;charset=utf-8',
  );

  $session  = curl_init($endpoint);                       // create a curl session
  curl_setopt($session, CURLOPT_POST, true);              // POST request type
  curl_setopt($session, CURLOPT_HTTPHEADER, $headers);    // set headers using $headers array
  curl_setopt($session, CURLOPT_POSTFIELDS, $xmlrequest); // set the body of the POST
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);    // return values as a string, not to std out

  $responsexml = curl_exec($session);                     // send the request
  curl_close($session);                                   // close the session
  return $responsexml;                                    // returns a string

}  // End of constructPostCallAndGetResponse function
?>
<script type='text/javascript'>setTimeout('self.close()',5000);</script>
