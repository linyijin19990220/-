<?php
class Designer{
 
    // database connection and table name
    private $conn;
    private $table_name = "designer";
 
    // object properties
    public $desNo;
    public $desName;
    public $desID;
    public $birthday;
    public $desAddress;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    // used when filling up the update product form
    function readOne(){
        // query to read single record
        //$query = "SELECT * FROM " . $this->table_name . " d WHERE  d.desID = ? ";
        $query = "SELECT * FROM designer WHERE desID = ? ";
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind id of product to be updated
        $stmt->bindParam(1, $this->desID);
    
        // execute query
        $stmt->execute();
    
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // set values to object properties
        $this->desNo = $row['desNo'];
        $this->desName = $row['desName'];
        $this->desID = $row['desID'];
        $this->birthday = $row['birthday'];
        $this->desAddress = $row['desAddress'];
    }
}
