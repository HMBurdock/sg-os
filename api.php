<?php
    require_once __DIR__."/classes/dbclass.php";

    $sql = new dbclass();

    //get incoming data
    $content = file_get_contents("php://input");
    $data = json_decode($content, true);

    $ret = 0;

    //expected in json device_id, payload
    if(!isset($data['id'])){
        echo '{"sgos":"no id", "return":"600"}'; 
        exit;
    }

    if(!isset($data['payload'])){
        echo '{"sgos":"no payload", "return":"601"}'; 
        exit;
    }

    $query = "SELECT * FROM `device` WHERE `device`.`device_id` = {$data['id']}";
    $result = $sql->conn->query($query);
    $row_cnt = $result->num_rows;
    if($row_cnt == 0){
        echo '{"sgos":"no device with that id", "return":"701"}'; 
        exit;
    }
    

    echo '{"sgos":"api ok", "return":"0"}';
    
?>