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

        $query = $mysqli->prepare("SELECT * FROM users WHERE fname LIKE ?");
        
        //bind parameters for markers
        $like_pattern = "%" . $pattern . "%";
        
        $query->bind_param('s', $like_pattern);
        
        //execute query
        $query->execute();
        
        //get results
        $result = $query->get_result();

        if (!$result){
            echo "Error in the SQL statement";
            return NULL;
            exit;
        }
        
        if ($result->num_rows == 0){
            return NULL;
        }
        else {
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
        
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("SELECT ID, username, fname, lname, email, accessLevel FROM users WHERE username LIKE ?");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        
        //bind params
        $like_pattern = "%" . $pattern . "%";
        $stmt->bind_param('s', $like_pattern);
        
        //execute query
        $stmt->execute();
        
        
        //get results
        $result = $stmt->get_result();
        
        if (!$result){
            echo "Error in the SQL statement";
            return NULL;
            exit;
        }
        
        if ($result->num_rows == 0){
            return NULL;
        }
        else {
            $users_array = array();
            
            while ($user = $result->fetch_assoc()){
                array_push($users_array, $user);
            }
            return $users_array;
        }
            
    }
    
    public function findByID($id){
        
        $db = new Database();
        
        $conn = $db->getConnection();
        
        $stmt = $conn->prepare("SELECT ID, username, fname, lname, email, accessLevel FROM users WHERE ID = ?");
        
        //bind params
        $stmt->bind_param('i', $id);
        
        //execute query
        $stmt->execute();
        
        
        //get results
        $result = $stmt->get_result();
        
        if (!$result){
            echo "Error in the SQL statement";
            return NULL;
            exit;
        }
        
        if ($result->num_rows == 0){
            return NULL;
        }
        else {
            $users_array = array();
            
            while ($user = $result->fetch_assoc()){
                array_push($users_array, $user);
            }
            return $users_array;
        }
        
    }
    
    public function updateUser($id, $username, $password, $fname, $lname, $email, $accessLevel){
        
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE users SET
                                        password = ?,
                                        fname = ?,
                                        lname = ?,
                                        email = ?,
                                        accessLevel = ?
                                    WHERE ID = ?
                                    AND username = ?"); //Helps prevent unauthorized changes by injecting just known username or ID, by making changes have to match both
                                                        //i.e. users only know their username, not corresponding ID, and can't update random ID without knowing the username
                                                        //it belongs to
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        
        //bind params
        $stmt->bind_param('ssssiis', $password, $fname, $lname, $email, $accessLevel, $id, $username);
        
        //execute query        
        if ($stmt->execute()){
            return true;
        }
        else {
            return false;
            //TODO
        }
        
    }
    
    public function deleteUserByID($id){
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM users WHERE ID = ?");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        
        //bind params
        $stmt->bind_param('i', $id);
        
        if ($stmt->execute()){
            return true;
        }
        else {
            echo "Error deleting User from database";
            return false;
            //TODO
        }
        
    }
}

