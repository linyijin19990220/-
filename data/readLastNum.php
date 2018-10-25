<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../object/number.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$number = new Number($db);
 
// set ID property of product to be edited
$number->robNo = isset($_GET['robNo']) ? $_GET['robNo'] : die();
 
// read the details of product to be edited
$number->readLastNum();
 
// create array
$number_arr = array(
        "numID" => $number -> numID,
        "numplate" => $number -> numplate,
        "numTime" => $number -> numTime,
        "robNo" => $number -> robNo,
        "callState" => $number -> callState,
        "handleState" => $number -> handleState,
        "numTime" => $number -> numTime,
        "endTime" => $number -> endTime,
        "desNo" => $number -> desNo
); 

// make it json formatqc  
print_r(json_encode($number_arr));
?>