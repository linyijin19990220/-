<?php
class Overnum{
 
    // database connection and table name
    private $conn;
    private $table_name = "Overnum";
 
    // object properties
    public $numID;
    public $robNo;
    public $desNo;

    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function readOverNum(){
    
        // select all query
        $query = "SELECT * FROM overnum WHERE desNo IS NULL";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

        return $stmt;
    }

    /*function readOverNum(){
    
        // select all query
        $query = "SELECT * FROM overnum WHERE robNo = ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->robNo);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->numID = $row['numID'];
        $this->robNo = $row['robNo'];
        $this->desNo = $row['desNo'];

        return $stmt;
    }*/
}


