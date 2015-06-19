<?php
error_reporting(E_ALL);  // Turn on all errors, warnings, and notices for easier debugging

// API request variables
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$man = $_GET['man'];
$model = $_GET['modelNum'];
if($man && $model){
$concat = $man .' '. $model;
}
if(!$man && $model){
$concat = $model;
}
if($man && !$model){
$concat = $man;
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
$x = 0; //Initialize item count
$total = (float) 0; //Initialize $total as float
  foreach($resp->searchResult->item as $item) {
$x++; //add 1 foreach $item
	if($item->sellingStatus->sellingState = EndedWithSales){
    $pic          = $item->galleryURL;
    $link         = $item->viewItemURL;
    $title        = $item->title;
    $catName      = $item->primaryCategory->categoryName;
    $catID        = $item->primaryCategory->categoryId;
    $sold         = $item->sellingStatus->sellingState;
    $itemid       = $item->itemId;
    $shippingCost = (float)$item->shippingInfo->shippingServiceCost;
    $shippingType = $item->shippingInfo->shippingType;
    $soldFor      = (float)$item->sellingStatus->currentPrice;
    $saleTotal    = $soldFor+$shippingCost;
    $total = $total + $saleTotal ;
//var_dump($item);
    $results .= "<tr><td>$x</td><td><img src=\"$pic\"></td><td><a href=\"$link\">$title</a></td></tr>";
    $results .= "<tr><td>$itemid</td><td>$sold</td></tr>";
    $results .= "<tr><td>Catagory ID:</td><td>$catID</td></tr>";
    $results .= "<tr><td>Catagory Name:</td><td>$catName</td></tr>";
    $results .= "<tr><td>Sold For:</td><td>$soldFor</td></tr>";
    $results .= "<tr><td>Shipping Type:</td><td>$shippingType</td></tr>";
    $results .= "<tr><td>Shipping Cost:</td><td>$shippingCost</td></tr>";
    $results .= "<tr><td>Sale Total:</td><td>$saleTotal</td></tr>";
    $results .= "<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>";
} 
//var_dump($total);

  }
$average = round($total/$x ,2);
//$average = $total/$x;
echo 'Average Sale Price: $' . $average .'<br>';
$under_10 = $average * 0.1;
$under_15 = $average * 0.15;
$final_10 = $average - $under_10;
$final_15 = $average - $under_15;
echo 'Undercut 10%: $'. $final_10 .'<br>';
echo 'Undercut 15%: $'. $final_15 .'<br>';
}
else {  // If the response does not indicate 'Success,' print an error
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}
?>

<!-- Build the HTML page with values from the call response -->
<html>
<head>
<title>eBay Search Results for <?php echo $query; ?></title>
<style type="text/css">body {font-family: arial, sans-serif;} </style>
</head>
<body>

<h1>eBay Search Results for <?php echo $query; ?></h1>

<table>
<tr>
  <td>
    <?php echo $results;?>
  </td>
</tr>
</table>

</body>
</html>
<?php
function constructPostCallAndGetResponse($endpoint, $query) {
  global $xmlrequest;

  // Create the XML request to be POSTed
  $xmlrequest  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
  $xmlrequest .= "<findCompletedItemsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">\n";
  $xmlrequest .= "<keywords>";
  $xmlrequest .= $query;
  $xmlrequest .= "</keywords>\n";
//  $xmlrequest .= "<itemFilter>";
//  $xmlrequest .= "<name>SoldItemsOnly</name>";
//  $xmlrequest .= "<value>true</value>";
//  $xmlrequest .= "</itemFilter>\n";
  $xmlrequest .= "<paginationInput>\n <entriesPerPage>50</entriesPerPage>\n</paginationInput>\n";
  $xmlrequest .= "</findCompletedItemsRequest>";

  // Set up the HTTP headers
  $headers = array(
    'X-EBAY-SOA-OPERATION-NAME: findCompletedItems',
    'X-EBAY-SOA-SERVICE-VERSION: 1.7.0',
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
