<?php

require('classes\Database.class.php');

class User{
    
   private $password;
   public $username;
   public $id;
   public $active;
   private $db;
   
   function __construct($username = false, $password = false) {
         if($this->checkInput($username,$password)){
            
         }
         $this->db = new Database();
   }
   
   public function __debugInfo(){
        return json_decode(json_encode($this), true);
   }
   
   public function createHash($pass){
      return hash('sha256',$pass);
   }
   public function showAll(){
      return $this->id;
   }
   public function createUser($user, $pass){
      $data = array(
            'username' => $user,
            'password' => $this->createHash($pass),
            'active' => 1
         );
      return $this->db->insert('user', $data);
   }
   private function checkInput($user,$pass){
      $response = new stdClass();
      $response->status = true;
      if(isset($user) && $user != ''){
         $this->username = $user;
      }else{
         $response->username = null;
         $response->status = false;
      }
      if(isset($pass) && $pass != ''){
         $this->password = createHash($pass);
      }else{
         $response->status = false;
         $response->password = null;
      }
   }
   public function login($user,$pass){
      $results = $this->db->run_query("SELECT * FROM user WHERE username = '{$user}' AND password = '{$this->createHash($pass)}'");
      if(isset($results['id'])){
         $this->id = $results['id'];
         $this->username = $results['username'];
         $this->active = $results['active'];
         return $this;
      }else{
         return false;
      }
   }
   

}

?>