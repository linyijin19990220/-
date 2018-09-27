<?php
class Store{
 
    // database connection and table name
    private $conn;
    private $table_name = "store";
 
    // object properties
    public $stoNo;
    public $stoCity;
    public $stoAddress;
    public $stoName;
    public $robNo;
    
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        //$query = "SELECT * FROM store ";
        $query = "SELECT m.robNo, s.stoNo, s.stoCity, s.stoAddress, s.stoName FROM `match_rob` AS m, `store` AS s, `robot` AS r WHERE m.stoNo = s.stoNo ";
        

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}