<?php
class WaitingNum{
 
    // database connection and table name
    private $conn;
    private $table_name = "waitingNum";
 
    // object properties
    public $numID;
    public $desConfirm;
    public $cusArrived;
    public $robNo;
    public $match_des;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readCallingNum(){
        // query to read single record
        $query="SELECT * FROM `waitingNum` WHERE robNo= ? AND desConfirm='0' ";
        
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->robNo);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->numID = $row['numID'];
        $this->desConfirm = $row['desConfirm'];
        $this->cusArrived = $row['cusArrived'];
        $this->robNo = $row['robNo'];
        $this->match_desNo = $row['match_desNo'];
    }

    function readNumber(){
        // query to read single record
        $query="SELECT * FROM `waitingNum` WHERE robNo= ? AND desConfirm='1' ";
        
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->robNo);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->numID = $row['numID'];
        $this->desConfirm = $row['desConfirm'];
        $this->cusArrived = $row['cusArrived'];
        $this->robNo = $row['robNo'];
        $this->match_desNo = $row['match_desNo'];
    }

}
?>