<?php
class On_duty{
 
    // database connection and table name
    private $conn;
    private $table_name = "on_duty_designer";
 
    // object properties
    public $desNo;
    public $stoNo;
    public $desState;
    public $finishTime;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readDesState(){
            // query to read single record

            //$query = "SELECT * FROM on_duty_designer WHERE desNo = ? AND stoNo= ?";
            $query = "SELECT * FROM on_duty_designer WHERE desNo = ?";
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
        
            // bind id of product to be updated
            $stmt->bindParam(1, $this->desNo);
            //$stmt->bindParam(2, $this->stoNo);

            // execute query
            $stmt->execute();
        
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // set values to object properties
            $this->desNo = $row['desNo'];
            $this->stoNo = $row['stoNo'];
            $this->desState = $row['desState'];
            $this->finishTime = $row['finishTime'];

    }
    
}
