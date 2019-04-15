<?php

require_once '../../Autoloader.php';

/* class _displayAllUsers
{

    public function __construct($users){
        if (count((array)$users) > 0){ */
            echo '<link rel="stylesheet" type="text/css" href="style.css">';
            echo "<table id='users'>";
            echo "<tr>
                    <tH>ID</tH>
                    <tH>Username</tH>
                    <tH>Full Name</tH>
                </tr>";
            for ($x = 0; $x < count((array)$users); $x++){
                echo "<tr>";
                echo    "<td>" . $users[$x][0] . "</td>" . 
                        "<td>" . $users[$x][1] . "</td>" . 
                        "<td>" . $users[$x][2] . "</td>";
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

