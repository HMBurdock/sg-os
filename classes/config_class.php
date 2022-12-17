<?php
//echo "config_class loaded!<br/>";
class configClass{
    /*
    ErrorCodes
    0: Fine
    100: Wrong datatype -> must be string
    101: Value is nothing -> must be at least 0 but not ""
    */
        
    //Protected
    protected $datapath;
    protected $config;

    function __construct($datapath){
        //echo "config_class constructor started<br/>";
        $this->datapath = $datapath;
        $this->config = parse_ini_file($datapath, true) or die('{"Error":2,"Info":"File not found!"}');
    } 
    function __destruct(){
        //echo "config_class unset<br/>";
    }
    
    //public functions
    public function getParameter($group, $parameter){
        if (!is_string($group) || !is_string($parameter)){
            return 100;
        }
        return $this->config[$group][$parameter];
    }

    public function getCategory($group){
       if (!is_string($group)){
            return 100;
        }
        return $this->config[$group];
    }

    public function getAllData(){
        return $this->config;
    }   
}   