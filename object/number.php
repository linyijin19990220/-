<?php
class Number{
 
    // database connection and table name
    private $conn;
    private $table_name = "CQ2_number";
 
    // object properties
    public $numID;
    public $numplate;
    public $numTime;
    public $robNo;
    public $callState;
    public $handleState;
    public $endTime;
    public $desNo;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function readNum(){
        $query="SELECT * FROM `CQ2_number` WHERE robNo= ? AND handleState='0' AND desNo is NOT NULL　ORDER BY numTime DESC LIMIT 0,1 ";

        $stmt = $this->conn->prepare( $query );
    
        $stmt->bindParam(1, $this->robNo);
    
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $this->numID = $row['numID'];
        $this->numplate = $row['numplate'];
        $this->numTime = $row['numTime'];
        $this->robNo = $row['robNo'];
        $this->callState = $row['callState'];
        $this->handleState = $row['handleState'];
        $this->endTime = $row['endTime'];
        $this->desNo = $row['desNo'];
    }

    function readCuttingNum(){
        // query to read single record
        $query="SELECT * FROM `CQ2_number` WHERE robNo= ? AND handleState='0' AND desNo IS NOT NULL ORDER BY numTime DESC LIMIT 0,1";
        
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
        $this->numplate = $row['numplate'];
        $this->numTime = $row['numTime'];
        $this->robNo = $row['robNo'];
        $this->callState = $row['callState'];
        $this->handleState = $row['handleState'];
        $this->endTime = $row['endTime'];
        $this->desNo = $row['desNo'];
    }

    function readLastNum(){
        // query to read single record
        $query="SELECT * FROM `CQ2_number` WHERE robNo= ?  ORDER BY numTime DESC LIMIT 0,1";
        
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
        $this->numplate = $row['numplate'];
        $this->numTime = $row['numTime'];
        $this->robNo = $row['robNo'];
        $this->callState = $row['callState'];
        $this->handleState = $row['handleState'];
        $this->endTime = $row['endTime'];
        $this->desNo = $row['desNo'];
    }

    /*function readOverNum(){    
        // query to read single record
        $query="SELECT * FROM `overNum` WHERE robNo= ?";
        $query = "SELECT o. m.robNo, s.stoNo, s.stoCity, s.stoAddress, s.stoName FROM `match_robot` AS m, `store` AS s WHERE m.match_stoNo = s.stoNo ";

        
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
        $this->numplate = $row['numplate'];
        $this->numTime = $row['numTime'];
        $this->robNo = $row['robNo'];
        $this->callState = $row['callState'];
        $this->handleState = $row['handleState'];
        $this->endTime = $row['endTime'];
        $this->desNo = $row['desNo'];
    }*/

}
?>