<?php

// Get parameters from URL
$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];
$radius = $_GET["radius"];

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("Physicians");
$parnode = $dom->appendChild($node);

header("Content-type: text/xml");

require_once "database_connection.php";

//echo "Latitude " . $latitude . " Longitude " . $longitude . " radius " . $radius;

$result = mysqli_query($con, "CALL GetPhysicians('$latitude','$longitude','$radius')");

if (!$result) {
  die("Invalid query: " . mysql_error());
}

// Iterate through the rows, adding XML nodes for each
while ($row = mysqli_fetch_array($result)){
  $node = $dom->createElement("physician");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("company", $row['Company']);
  $newnode->setAttribute("firstname", $row['FirstName']);
  $newnode->setAttribute("lastname", $row['LastName']);
  $newnode->setAttribute("address", $row['Address']);
  $newnode->setAttribute("suite", $row['Suite']);
  $newnode->setAttribute("city", $row['City']);
  $newnode->setAttribute("phone", $row['Phone']);
  $newnode->setAttribute("lat", $row['Lat']);
  $newnode->setAttribute("lng", $row['Lng']);
  $newnode->setAttribute("distance", $row['Distance']);
  
}

echo $dom->saveXML($dom->documentElement);
?>

