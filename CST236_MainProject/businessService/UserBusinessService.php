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
    
    public function addAddress($Address){
        
        $dbservice = new UserDataService();
        
        return $dbservice->addAddress($Address);
        
    }
    
    public function editAddress($Address){
        
        $dbservice = new UserDataService();
        
        return $dbservice->editAddress($Address);
        
    }
    
    public function addToCart($userID, $addressID, $productID){
        $dbservice = new UserDataService();
        
        return $dbservice->addToCart($userID, $addressID, $productID);
    }
    
    public function getCartByUserID($userID){
        $dbservice = new UserDataService();
        
        return $dbservice->getCartByUserID($userID);
    }
    
    public function removeFromCart($userID, $productID){
        $dbservice = new UserDataService();
        
        return $dbservice->removeFromCart($userID, $productID);
    }
}

