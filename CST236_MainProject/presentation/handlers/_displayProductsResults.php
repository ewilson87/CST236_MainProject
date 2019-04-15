<?php

require_once '../../Autoloader.php';

/* class _displayAllUsers
 {
 
 public function __construct($users){
 if (count((array)$users) > 0){ */
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo "<table id='products'>";
echo "<tr>
        <tH>ID</tH>
        <tH>Vehicle Make</tH>
        <tH>Vehicle Model</tH>
        <tH>Year</tH>
        <tH>Description</tH>
        <tH>Price</tH>
    </tr>";
for ($x = 0; $x < count((array)$products); $x++){
    echo "<tr>";
    echo    "<td>" . $products[$x]['ID'] . "</td>" .
        "<td>" . $products[$x]['carMake'] . "</td>" .
        "<td>" . $products[$x]['carModel'] . "</td>" .
        "<td>" . $products[$x]['carYear'] . "</td>" .
        "<td>" . $products[$x]['carDescription'] . "</td>" .
        "<td>" . $products[$x]['carPrice'] . "</td>";
    echo "</tr>";
}
echo "</table>";


//TODO Edit printing to include all columns data


//}
/*         else {
 echo "No results found";
 }
 } */
/* } */

