<?php
     
        $con = mysqli_connect("localhost","root","");

        /*if ($con){
           echo "result:1"; 
        }*/
        if (!$con){
            die('Could not connect: ' . mysql_error());
            return json_encode(array('rusult' => '1', 'data' => '伺服器連接失敗'));
        }

        $selected = mysqli_select_db($con, "project") ;
        //mysql_select_db("project", $con);

        $sql="SELECT * FROM `on_duty_designer` WHERE stoNo='$_POST[stoNo]' AND desState='$_POST[desState]'ORDER BY finishTime ASC LIMIT 0,1";

        mysqli_query($con,$sql);

        //----------------------------
        //使用mysql_query($sql)去撈取資料
        $result = mysqli_query($con,$sql) or die('MySQL query error');

        while ($row = mysqli_fetch_array($result)){
        //將陣列內容轉存在PHP的array
        $data_array[] = array ( 	
                        "desNo" => $row['姓名'],
                        "stoNo" => $row['email'],
                        "desState" => $row['留言'],
                        "finishTime" => $row['日期']
        );}
        
        //將儲存好資料的array轉成JSON以傳送給網頁進行顯示
        echo json_encode($data_array);
        //----------------------------

        /*if (!mysqli_query($con,$sql))
        {
        //die 'Error: ' . mysqli_error($con);
        echo json_encode(array('rusult' => '1', 'data' => '修改失敗'));
        echo ('Error: ' . mysqli_error($con));
        }else{
        echo json_encode(array('rusult' => '0', 'data' => '修改成功'));
        }*/
        mysqli_close($con)
?>
