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
        $stmt = $connection->prepare("select ID, carMake, carModel, carYear, carDescription, carPrice FROM products WHERE carMake LIKE '%$name%' OR carModel LIKE '%$name%'");
        
        if (!$stmt){
            echo "Something is wrong in the binding process. SQL Error?";
            exit;
        }
        //Fix later
        //bind parameters for markers
        /* $like_make = "%" . $name . "%";
        $like_model = "%" . $name . "%"; */

       /*  $stmt->bind_param('is', $like_make, $like_model); */
        
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
}

