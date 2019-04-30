<div class="container mb-4">
	<table id="mydatatable" class="table table-striped table-bordered table-hover table-responsive border border-warning">
	<col width="7%">
    <col width="40%">
    <col width="40%">
    <col width="7%">
    <col width="16%">
    <thead class="thead-dark">
    	<tr class="text-center">
            <th class="th-sm">ID</th>
            <th class="th-sm">Vehicle Make</th>
            <th class="th-sm">Vehicle Model</th>
            <th class="th-sm">Year</th>
            <th class="th-sm">Price</th>
        </tr>
    </thead>
<tbody>

<?php

//Have to cast $products as an array to run the count function
for ($x = 0; $x < count((array)$products); $x++){

    ?>
<tr>
	<td class="text-center">
		<form action="productSelectHandler.php? method="get">
        	<input type="hidden" id="vin" name="vin" value="<?php echo $products[$x]['carVin'] ?>">
        	<button type="submit" class="btn-sm btn-secondary border border-warning" role="button"><?php echo $products[$x]['ID']; ?></button>
        </form>
	</td>
          
<?php    
    echo 
        "<td>" . $products[$x]['carMake'] . "</td>" .
        "<td>" . $products[$x]['carModel'] . "</td>" .
        "<td class='text-center'>" . $products[$x]['carYear'] . "</td>" .
        "<td class='text-center'>$" . number_format(($products[$x]['carPrice']), 2, '.', ',') . "</td>";
    echo "</tr>";
    
}


?>
</tbody>
<tfoot class="thead-dark">
<tr class="text-center">
            <th class="th-sm">ID</th>
            <th class="th-sm">Vehicle Make</th>
            <th class="th-sm">Vehicle Model</th>
            <th class="th-sm">Year</th>
            <th class="th-sm">Price</th>
        </tr>
</tfoot>
</table>
</div>





