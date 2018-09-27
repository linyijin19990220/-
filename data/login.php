<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../object/designer.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$designer = new Designer($db);
 
// set ID property of product to be edited
$designer->desID = isset($_GET['desID']) ? $_GET['desID'] : die();
 
// read the details of product to be edited
$designer->readOne();
 
// create array
$designer_arr = array(
    "desNo" =>  $designer->desNo,
    "desName" => $designer->desName,
    "desID" => $designer->desID,
    "birthday" => $designer->birthday,
    "desAddress" => $designer->desAddress
); 

// make it json format
print_r(json_encode($designer_arr));
?>