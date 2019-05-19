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
    
    public function addCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV){
        $dbservice = new UserDataService();
        
        return $dbservice->addCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV);
    }
    
    public function editCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV){
        $dbservice = new UserDataService();
        
        return $dbservice->editCC($userID, $ccType, $ccNumber, $expMonth, $expYear, $ccCCV);
    }
    
    public function findCCByID($id){
        $dbservice = new UserDataService();
        
        return $dbservice->findCCByID($id);
    }
        
    public function completeSaleTransaction($userID, $addressID, $productIDs, $total, $count, $discount, $discountCode){
        $dbservice = new UserDataService();
        
        return $dbservice->completeSaleTransaction($userID, $addressID, $productIDs, $total, $count, $discount, $discountCode);
    }
    
    public function getOrdersHistory($userID){
        $dbservice = new UserDataService();
        
        return $dbservice->getOrdersHistory($userID);
    }
    
    public function getSalesReport($start, $end){
        $dbservice = new UserDataService();
        
        return $dbservice->getSalesReport($start, $end);
    }
    
    public function getDiscount($discountCode){
        $dbservice = new UserDataService();
        
        return $dbservice->getDiscount($discountCode);
    }
}

