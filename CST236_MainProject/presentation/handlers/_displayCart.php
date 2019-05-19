<?php
?>

<div class="container mb-4">
	<table id="mydatatable"
		class="table table-striped table-bordered table-hover table-responsive border border-warning">
		<col width="7%">
		<col width="6%">
		<col width="37%">
		<col width="37%">
		<col width="7%">
		<col width="16%">
		<thead class="thead-dark">
			<tr class="text-center">
        	<?php if (!isset($_SESSION['checkoutCart'])): ?>
        		<th class="th-sm">Remove</th>
    		<?php endif; ?>
            <th class="th-sm">ID</th>
				<th class="th-sm">Vehicle Make</th>
				<th class="th-sm">Vehicle Model</th>
				<th class="th-sm">Year</th>
				<th class="th-sm">Price</th>
			</tr>
		</thead>
		<tbody>

<?php

// Have to cast $products as an array to run the count function
$total = 0;
$count = 0;
for ($x = 0; $x < count((array) $cart); $x ++) {
    $total = $total + $cart[$x]['carPrice'];
    $count ++;
    ?>
<tr>
<?php if (!isset($_SESSION['checkoutCart'])): ?>
	<td class="text-center">
					<form action="cartHandler.php? method="get">
						<input type="hidden" id="userID" name="userID"
							value="<?php echo $cart[$x]['userID'] ?>"> <input type="hidden"
							id="productID" name="productID"
							value="<?php echo $cart[$x]['productID'] ?>"> <input
							type="hidden" id="add" name="add" value="false">
						<button type="submit"
							class="btn-sm btn-secondary border border-warning" role="button">Remove</button>
					</form>
				</td>
	<?php endif; ?>
	<td class="text-center">
		<?php echo $cart[$x]['ID']; ?>
	</td>
          
<?php
    echo "<td>" . $cart[$x]['carMake'] . "</td>" . "<td>" . $cart[$x]['carModel'] . "</td>" . "<td class='text-center'>" . $cart[$x]['carYear'] . "</td>" . "<td class='text-center'>$" . $cart[$x]['carPrice'] . "</td>";
    echo "</tr>";
}

?>

		
		
		
		</tbody>
		<tfoot class="thead-dark">
			<tr class="text-center">
			<?php if (!isset($_SESSION['checkoutCart'])): ?>
				<th class="th-sm"></th>
				<?php endif; ?>
				<th class="th-sm"></th>
				<th class="th-sm"></th>
				<th class="th-sm"></th>
				<th class="th-sm">Total:</th>
				<?php
                    if (! isset($_SESSION['discountUsed'])) {
                        $_SESSION['total'] = $total;
                    }
                    else {
                        unset($_SESSION['discountUsed']);
                    }
                    $_SESSION['totalCount'] = $count;
                ?>
				<th class="th-sm">$<?php echo $_SESSION['total'];  ?></th>
			</tr>
		</tfoot>
	</table>
</div>





