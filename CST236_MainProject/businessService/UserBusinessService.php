<?php


require_once '../../Autoloader.php';

class UserBusinessService
{

    public function __construct()
    {}
    
    public function SearchByUsername($pattern){
        
        $users = Array();
        
        $dbService = new UserDataService();
        $users = $dbService->findByUsername($pattern);
        
        return $users;
        
    }
    
    public function findByFirstName($pattern){
        
        $dbservice = new UserDataService();
        
        return $dbservice->findByFirstName($pattern);
        
    }
    
    public function findByLastName($pattern){
     
        $dbservice = new UserDataService();
        
        return $dbservice->findByLastName($pattern);
    }
    
    
    
    public function findByID($id){
        
        $dbservice = new UserDataService();
        
        return $dbservice->findByID($id);
        
    }
    
    public function updateUser($id, $username, $password, $fname, $lname, $email, $accessLevel){
        
        $dbservice = new UserDataService();
        
        return $dbservice->updateUser($id, $username, $password, $fname, $lname, $email, $accessLevel);
        
    }
    
    public function deleteUserByID($id){
        
        $dbservice = new UserDataService();
        
        return $dbservice->deleteUserByID($id);
        
    }
    
}

