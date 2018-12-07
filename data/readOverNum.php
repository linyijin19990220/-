<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../object/OverNum.php';
    
    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
    
    // initialize object
    $OverNum = new OverNum($db);
    
    // query products
    $stmt = $OverNum->readOverNum();
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num>0){
    
        // products array
        $stores_arr=array();
        $stores_arr["records"]=array();
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
    
            $store_item=array(
                "numID" => $numID,
                "robNo" => $robNo,
                "desNo" => $desNo
            );

            array_push($stores_arr["records"], $store_item);
        }

        //不要顯使重複的值
        $stores_arr=array_unique($stores_arr);
        
        echo json_encode($stores_arr);
    }
    
    else{
        echo json_encode(
            array("message" => "No products found.")
    );
    mysql_close($OverNum);
}
?>