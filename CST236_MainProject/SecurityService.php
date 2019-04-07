<?php

class SecurityService {
    
    private $username = "";
    private $password = "";
    
    function __construct($username, $password){ 
        $this->username = $username;
        $this->password = $password;
    }
    
    function validateLogin(){
        if ($this->password == "" || $this->username == ""){
            return false;
        }
        //write bd code here!!
        else if ($this->password != "" && $this->username != ""){
            
            return true; //returns true if login matches DB
        }
        else {
            return false;
        }
        
    }
    
}