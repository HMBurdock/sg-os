<?php

    $query = "SELECT * FROM `device`";
    $devices = array();
    $result = $sql->conn->query($query);
    while ($row = mysqli_fetch_assoc($result)){ 
        $devices[$row['device_id']]["type"] = $row['type'];
        $devices[$row['device_id']]["desc"] = $row['description'];
        $devices[$row['device_id']]["api"] = $row['api'];
    }

    foreach ($devices as $key => $value) {   
        $query = "SELECT * FROM `history`
        LEFT JOIN `device` ON `history`.`device` = `device`.`device_id`
        WHERE `device`.`device_id` = {$key}
        LIMIT 1";
        $result = $sql->conn->query($query);
        while ($row = mysqli_fetch_assoc($result)){ 
            $devices[$row['device_id']]["curData"] = $row['payload'];
            $devices[$row['device_id']]["timestamp"] = $row['timestamp'];
        }
    } 
    
    //var_dump($devices);
    foreach ($devices as $key => $value) {  
        $shortDesc = substr($value['desc'], 0, 10);
        echo "<p class='typewriter'>{$key}::{$value['type']}->{$shortDesc}:>{$value['curData']}</p>";
    }
    



?>


