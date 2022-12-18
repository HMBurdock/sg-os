<?php
session_start();

require_once __DIR__."/../classes/config_class.php";

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) && isset($_POST['login'])) {

        //Get database info
        $configPath = __DIR__.'/../config/config.ini';
        $config = new configClass($configPath);
        $ip = $config->getParameter("SQL","sqlIp");
        $user = $config->getParameter("SQL","sqlUser");	
        $pw = $config->getParameter("SQL","sqlUserPW");	
        $db = $config->getParameter("SQL","sqlDB");	
        unset($config);
      
        /*
        echo $ip;
        echo $user;
        echo $pw;
        echo $db;
        */
        // Getting submitted user data from database
        $conn = new mysqli($ip, $user, $pw, $db);//, "AirPort");//, $db);
        if ($conn->connect_error && $debug) {
            //die('{"Error":1,"Info":"SQL Error - ' . $conn->connect_error . '"}');
            header("Location: ./index.php?no_access=2");
        }elseif ($conn->connect_error && !$debug){
            //$returnMessage = "No DB Access";
            header("Location: ./index.php?no_access=1");
        }

        $query = "SELECT * FROM `user` WHERE `username` = '{$_POST['username']}'";
        $result = $conn->query($query);
        $user = array();
        while ($row = mysqli_fetch_assoc($result)){ 
            $user["id"] = $row["user_id"];
            $user["username"] = $row["username"];
            $user["password"] = $row["password"];
            $user["rights"] = $row["rights"];
        }


        
        $loginFail = 0;
        if(isset($user["id"])){
            // Verify user password and set $_SESSION
            echo "{$_POST['password']}<br><br>";
            echo "{$user['password']}<br>";
            if(password_verify($_POST['password'], $user["password"])) {
                $_SESSION['user_id'] = $user["id"];
                $_SESSION['rights'] = $user["rights"];
                //$_SESSION["db_page"] = 1;
                $returnMessage = "<p class='typewriter text-to-center'>L▜gin succes░</p>";
                header("Location: ./sgos.php");
            }else{
                $loginFail = 1;
            }    
        }else{
            $loginFail = 1;
        }
        
        if($loginFail){
            $returnMessage = "<p class='typewriter text-to-center'>Access de▜░█d!</p>";
        }
    }
}
?>
