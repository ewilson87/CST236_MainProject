<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Autoloader.php';

$searchPattern = $_GET['pattern'];

$dbservice = new ProductBusinessService();

$products = $dbservice->findByMakeOrModel($searchPattern);
?>

<style>
#products {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#products td, #products th {
  border: 1px solid #ddd;
  padding: 8px;
}

#products tr:nth-child(even){background-color: #f2f2f2;}

#products tr:hover {background-color: #ddd;}

#products th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: dodgerblue;
  color: white;
}
</style>

<h2>Search Results</h2>
<p>Here is what we found</p>

<?php 
if ($products){
   //$display = new _displayAllUsers($users); 
   
    include('_displayProductsResults.php');
}
else {
    echo "No vehicles found with that make or model";
}


/* echo $display->print($users); */

?>