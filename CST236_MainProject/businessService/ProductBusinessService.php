<?php

//use database\ProductDataService;

require_once '../../Autoloader.php';

class ProductBusinessService
{

    public function __construct()
    {}
    
    public function findByMakeOrModel($pattern){
        $dbservice = new ProductDataService();
        
        return $dbservice->findByMakeOrModel($pattern);
    }
    
    public function findByVin($vin){
        $dbservice = new ProductDataService();
        
        return $dbservice->findByVin($vin);
    }
    
    public function createNewRecord($carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice){
        $dbservice = new ProductDataService();
        
        $dbservice->createNewRecord($carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice);
    }
    
    public function updateProduct($id, $carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice){  
        $dbservice = new ProductDataService();
        
        return $dbservice->updateProduct($id, $carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice);
    }
    
    public function findByID($id){
        $dbservice = new ProductDataService();
        
        return $dbservice->findByID($id);   
    }
    
    public function deleteProductByID($id){
        $dbservice = new ProductDataService();
        
        return $dbservice->deleteProductByID($id);   
    }
}

