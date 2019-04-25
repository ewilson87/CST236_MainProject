<?php

require_once '../../Autoloader.php';

?>

<div class="container mb-4">
	<table id="mydatatable" class="table table-striped table-bordered table-hover table-responsive">
	<col width="7%">
    <col width="22%">
    <col width="35%">
    <col width="18%">
    <col width="18%">
    <col width="7%">
    <thead class="thead-dark">
    	<tr class="text-center">
            <th class="th-sm">ID</th>
            <th class="th-sm">Username</th>
            <th class="th-sm">E-mail</th>
            <th class="th-sm">First Name</th>
            <th class="th-sm">Last Name</th>
            <th class="th-sm">Access Level</th>
        </tr>
    </thead>
<tbody>
   
<?php 
    for ($x = 0; $x < count((array)$users); $x++){
?>

<tr>
	<td class="text-center">
		<form action="userSelectHandler.php" method="post">
        	<input type="hidden" id="ID" name="ID" value="<?php echo $users[$x]['ID'] ?>">
        	<button type="submit" class="btn-sm btn-secondary" data-toggle="confirmation" role="button"><?php echo $users[$x]['ID']; ?></button>
        </form>
	</td>
          
<?php    
    echo 
        "<td>" . $users[$x]['username'] . "</td>" .
        "<td>" . $users[$x]['email'] . "</td>" .
        "<td>" . $users[$x]['fname'] . "</td>" .
        "<td>" . $users[$x]['lname'] . "</td>" .
        "<td>";
    if ($users[$x]['accessLevel'] == 9){
        echo "Admin";
    }
    else {
        echo "User";
    }
    echo "</td></tr>";  
} 

?>

</tbody>
<tfoot class="thead-dark">
<tr class="text-center">
            <th class="th-sm">ID</th>
            <th class="th-sm">Username</th>
            <th class="th-sm">E-mail</th>
            <th class="th-sm">First Name</th>
            <th class="th-sm">Last Name</th>
            <th class="th-sm">Access Level</th>
        </tr>
</tfoot>
</table>
</div>