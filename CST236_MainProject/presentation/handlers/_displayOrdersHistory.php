<?php
?>
<div class="container mb-4">
	<table id="mydatatable"
		class="table table-striped table-bordered table-hover table-responsive border border-warning">
		<col width="6%">
		<col width="10%">
		<col width="6%">
		<col width="50%">
		<col width="12%">
		<col width="16%">
		<thead class="thead-dark">
			<tr class="text-center">
				<th class="th-sm">Order ID</th>
				<th class="th-sm">Date/Time</th>
				<th class="th-sm">Product ID</th>
				<th class="th-sm">Description</th>
				<th class="th-sm">VIN</th>
				<th class="th-sm">Price</th>
			</tr>
		</thead>
		<tbody>

<?php

// Have to cast $products as an array to run the count function
$total = 0;
for ($x = 0; $x < count((array) $orders); $x ++) {
    $total = $total + $orders[$x]['carPrice'];
    ?>
<tr>
				<td class="text-center">
		<?php echo $orders[$x]['ordersID']; ?>
	</td>
	<td class="text-center">
		<?php echo $orders[$x]['timestamp']; ?>
	</td>
	<td class="text-center">
		<?php echo $orders[$x]['productID']; ?>
	</td>
          
<?php
echo "<td>" . $orders[$x]['carYear'] . " " . $orders[$x]['carMake'] . " " . $orders[$x]['carModel'] . "</td>" . 
    "<td>" . $orders[$x]['carVin'] . "</td>" . 
    "<td class='text-center'>" . $orders[$x]['carPrice'] . "</td>";
    echo "</tr>";
}

?>

		</tbody>
		<tfoot class="thead-dark">
			<tr class="text-center">
				<th class="th-sm"></th>
				<th class="th-sm"></th>
				<th class="th-sm"></th>
				<th class="th-sm"></th>
				<th class="th-sm">Total:</th>
				<th class="th-sm">$<?php echo $total; $_SESSION['total'] = $total; ?></th>
			</tr>
		</tfoot>
	</table>
</div>
