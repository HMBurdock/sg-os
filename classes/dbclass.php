<?php

require_once __DIR__.'/config_class.php';

class dbclass{
    public $conn;
    public function __construct(){
        //read config
        $configPath = __DIR__.'/../config/config.ini';
        $config = new configClass($configPath) or die('{"Error":2,"Info":"No config file"}');
        $ip = $config->getParameter("SQL","sqlIp");
        $user = $config->getParameter("SQL","sqlUser");	
        $pw = $config->getParameter("SQL","sqlUserPW");	
        $db = $config->getParameter("SQL","sqlDB");	
        unset($config);

        $this->conn = new mysqli($ip, $user, $pw, $db);
        if ($this->conn->connect_error) {
            die('{"Error":1,"Info":"SQL Error - ' . $this->conn->connect_error . '"}');
        }
    }

    public function __destruct(){
        $this->conn->close();
    }    
}