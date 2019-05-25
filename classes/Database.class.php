<?php

class Database{
    private $servername = 'localhost';
    private $username = 'root';
    private $password  = '';
    private $dbname = 'messenger';
    private $con;
    
    function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if($this->conn->connect_error){
            print_r($conn);
            die("Connection failed: " . $conn->connect_error);
        }
    }
    
    public function insert($table, $array){
        $query = 'INSERT INTO '.$table.' (';
        $keys = '';
        $values = '';
        foreach($array as $key=>$value){
            if($value != end($array)){
                $keys .= $key.', ';
                $values .= '"'.$value.'", ';
            }else{              
                $values .= '"'.$value.'" ';  
                $keys .= $key;
            }
        }
        $query .= $keys.') VALUES ('.$values.')';
        return $this->conn->query($query);
        
    }
    
    public function run_query($query){
        $res = $this->conn->query($query);
        return $res->fetch_array(MYSQLI_ASSOC);
    }
    

}

?>