<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../Autoloader.php';

$searchPattern = $_GET['username'];

$dbservice = new UserBusinessService();

$users = $dbservice->SearchByUsername($searchPattern);
?>
<style>
#users {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#users td, #users th {
  border: 1px solid #ddd;
  padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
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
if ($users){
   //$display = new _displayAllUsers($users); 
   
    include('_displayAllUsers.php');
}
else {
    echo "No users found with that username";
}


/* echo $display->print($users); */

?>






