<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';

// fixes autoloader issue when accessing Database from here instead of from ServerService. Do not yet know what's causing this issue.
$_SESSION['uds'] = true;

require_once '../../Autoloader.php';

class UserDataService
{

    public function __construct()
    {}
    
    public function findByFirstName($pattern){
        
        $db = new Database();
        
        $mysqli = $db->getConnection();

        $query = "SELECT * FROM users WHERE fname LIKE '%$pattern%'";

        if ($result = $mysqli->query($query)){

            $index = 0;
            $users_array = array();
                
            while ($row = $result->fetch_assoc()){
                $users_array[$index] = array($row["ID"], $row["username"], ($row["fname"] . " " . $row['lname']));
                $index++;
            }
            
            //frees result set and closes connection
            $result->free();
            $mysqli->close();

            if (count($users_array) > 0)
                return $users_array;
            return NULL;
        }
    }
    
    public function findByUsername($pattern){
        
        $db = new Database();
        
        $mysqli = $db->getConnection();
        
        $query = "SELECT * FROM users WHERE username LIKE '%$pattern%'";
        
        if ($result = $mysqli->query($query)){
            
            $index = 0;
            $users_array = array();
            
            while ($row = $result->fetch_assoc()){
                $users_array[$index] = array($row["ID"], $row["username"], ($row["fname"] . " " . $row['lname']));
                $index++;
            }
            
            //frees result set and closes connection
            $result->free();
            $mysqli->close();
            
            if (count($users_array) > 0)
                return $users_array;
                return NULL;
        }
    }
}

