<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../object/on_duty.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$on_duty = new on_duty($db);
 
// set ID property of product to be edited
$on_duty->desNo = isset($_GET['desNo']) ? $_GET['desNo'] : die();
//$on_duty->robNo = isset($_GET['robNo']) ? $_GET['robNo'] : die();
 
// read the details of product to be edited
$on_duty->readDesState();
 
// create array
$on_duty_arr = array(
        "desNo" => $on_duty -> desNo,
        "stoNo" => $on_duty -> stoNo,
        "desState" => $on_duty -> desState,
        "finishTime" => $on_duty -> finishTime
); 

// make it json formatqc  
print_r(json_encode($on_duty_arr));
?>