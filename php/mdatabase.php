<?php
    $query = "SELECT * FROM `members`";
    $members = array();
    $result = $sql->conn->query($query);
    while ($row = mysqli_fetch_assoc($result)){ 
        $members[$row['member_id']]["pos"] = $row['position'];
        $members[$row['member_id']]["name"] = $row['name'];
        $members[$row['member_id']]["age"] = $row['age'];
        $members[$row['member_id']]["desc"] = $row['description'];
    }

    $output = "";
    $anitoggle = 1;
    foreach ($members as $key => $value) {   
        if($anitoggle == 1){
            $output .= "<div class='blinkup-class content border'>DB:ID>{$key} - {$value['name']}</br>";
            $anitoggle = 0;
        }else{
            $output .= "<div class='blinkup-secondary-class content border'>DB:ID>{$key} - {$value['name']}</br>";
            $anitoggle = 1;
        }
        
        $output .= "{$value['pos']}</br>";
        $output .= "Age: {$value['age']}</br>";
        $output .= "Profile: {$value['desc']}</br></div>";
    }

    echo $output;
?>
