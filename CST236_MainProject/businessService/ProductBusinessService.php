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
}

