<?php
// Include the file or class where your $call object is defined
// require_once 'your_file_or_class.php';
include 'user.php';
$call = new User();

// Assuming your $call object has a method called fetchPrivellegeOption()
// You need to replace this with the actual method and data retrieval logic
$privilegeOptions = $call->fetchPrivellegeOption();

// Convert the data to JSON format
$jsonData = json_encode($privilegeOptions);

// Set the appropriate HTTP headers to indicate JSON content
header('Content-Type: application/json');

// Output the JSON data
echo $jsonData;
?> 
