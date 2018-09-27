<?php

    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Credentials: true");
    
        $host = "localhost";
        $db_name = "project";
        $username = "root";
        $password = "";
        $conn;
        $table_name = "cq2_number";

    // instantiate database and product object
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    // used when filling up the update product form
   
    $query = "INSERT INTO cq2_number (numplate, numTime, robNo, callState, handleState)
                VALUES 
            ('$_POST[numplate]',NOW(),'$_POST[robNo]','$_POST[callState]','$_POST[handleState]')";

    // prepare query statement
    $stmt = $conn->prepare( $query );
    // execute query
    $stmt->execute();

     echo "0";

?>
