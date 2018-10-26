<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../object/waitingNum.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$waitingNum = new WaitingNum($db);
 
// set ID property of product to be edited
$waitingNum->robNo = isset($_GET['robNo']) ? $_GET['robNo'] : die();
 
// read the details of product to be edited
$waitingNum->readNumber();
 
// create array
$waitingNum_arr = array(

        "numID" => $waitingNum -> numID,
        "desConfirm" => $waitingNum -> desConfirm,
        "cusArrived" => $waitingNum -> cusArrived,
        "robNo" => $waitingNum -> robNo,
        "match_desNo" => $waitingNum -> match_desNo
); 

// make it json formatqc  
print_r(json_encode($waitingNum_arr));
?>