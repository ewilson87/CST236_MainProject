<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';

// fixes autoloader issue when accessing Database from here instead of from ServerService. Do not yet know what's causing this issue.
$_SESSION['uds'] = true;

require_once '../../Autoloader.php';

class ProductDataService
{

    public function __construct()
    {}

    public function findByMakeOrModel($name)
    {
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("select ID, carMake, carModel, carYear, carVin, carDescription, 
            carPrice FROM products WHERE (sold = 0) AND (carMake LIKE ? OR carModel LIKE ?)");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }

        //bind parameters for markers
        $like_make = "%" . $name . "%";
        $like_model = "%" . $name . "%";

        $stmt->bind_param('ss', $like_make, $like_model);
        
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc()){
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }
    
    public function findByVin($vin){
        
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("select * FROM products WHERE carVin = ?");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }

        //bind params
        $stmt->bind_param('s', $vin);
        
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc()){
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }
    
    public function createNewRecord($carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice) {
        
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO products(carMake, carModel, carYear, carVin, carDescription, carPrice) VALUES (?,?,?,?,?,?)");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        
        //bind params
        $stmt->bind_param('sssssf', $carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice);
        
        //execute query
        $stmt->execute();
        
        //get results
        $result = $stmt->get_result();
        
        if (!$result){
            echo "Error in the SQL statement";
            exit;
        }
        
        if ($result->num_rows == 1){
            echo "Record entered successfully";
        }
        else {
            echo "Error adding entry to database";
            //TODO
        }
        
    }
    
    public function updateProduct($id, $carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice){
        
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE products SET 
                                        carMake = ?,
                                        carModel = ?,
                                        carYear = ?,
                                        carVin = ?,
                                        carDescription = ?,
                                        carPrice = ?
                                    WHERE ID = ?");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        
        //bind params
        $stmt->bind_param('sssssdi', $carMake, $carModel, $carYear, $carVin, $carDescription, $carPrice, $id);
        
        //execute query        
        if ($stmt->execute()){
            return true;
        }
        else {
            echo "Error deleting User from database";
            return false;
            //TODO
        }
        
    }
    
    public function findByID($id){
        
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("select * FROM products WHERE ID = ?");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        
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
            $product_array = array();
            
            while ($product = $result->fetch_assoc()){
                array_push($product_array, $product);
            }
            return $product_array;
        }
    }
    
    public function deleteProductByID($id){
        $db = new \Database();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM products WHERE ID = ?");
        
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
            echo "Error deleting entry from database";
            return false;
            //TODO
        }
        
    }
}

