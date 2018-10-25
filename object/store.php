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
    function readrob(){
    
        // select all query
        //$query = "SELECT * FROM store ";
        //$query = "SELECT DISTINCT m.robNo, s.stoNo, s.stoCity, s.stoAddress, s.stoName FROM `match_rob` AS m, `store` AS s WHERE m.stoNo = s.stoNo ";
        $query = "SELECT DISTINCT m.robNo, s.stoNo, s.stoCity, s.stoAddress, s.stoName FROM `match_robot` AS m, `store` AS s WHERE m.match_stoNo = s.stoNo ";


        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
    function read(){
    
        // select all query
        $query = "SELECT * FROM store ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();

    
        return $stmt;
    }
}