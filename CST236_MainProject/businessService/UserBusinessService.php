<?php


require_once '../../Autoloader.php';

class UserBusinessService
{

    public function __construct()
    {}
    
    public function SearchByUsername($pattern){
        
        /* $dbservice = new UserDataService();
        
        return $dbservice->findByUsername($pattern); */
        
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
    
    
    
    public function findByID($pattern){
        
        $dbservice = new UserDataService();
        
        return $dbservice->findByID($pattern);
        
    }
    
    public function deleteUserByID($id){
        
        $dbservice = new UserDataService();
        
        return $dbservice->deleteUserByID($id);
        
    }
    
    public function findByFirstNameWithAddress($pattern){
        
        $dbservice = new UserDataService();
        
        return $dbservice->findByFirstNameWithAddress($pattern);
        
        /* $persons = Array();
        
        $dbService = new UserDataService();
        $persons = $dbService->findByFirstNameWithAddress($pattern);
        
        return $persons; */
    }
}

