<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

// locks page to admin only
if ($_SESSION['accessLevel'] != 9) {
    session_destroy();
    header("Location: ../views/login/login.php");
}

$start = $_GET['startDate'];
$end = $_GET['endDate'];

$dbservice = new UserBusinessService();

$salesReport = $dbservice->getSalesReport($start, $end);
?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">

<!--  Datatables CSS -->
<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<!--  Font Awesome CSS -->
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
	crossorigin="anonymous">

<style>
hr {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0),
		rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>

<title>Sales Report</title>
</head>

<body class="">

	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
		<!-- Image taken from  https://upload.wikimedia.org/wikipedia/en/9/92/UKTV_channel_W_logo.png -->
		<a class="navbar-brand" href="#"><img src="../views/images/wLogo.png"
			class="img-fluid img-thumbnail mr-2" alt="" width="40" height="40"
			class="d-inline-block align-top" style="margin-right: 5px"></a>
		<h3 class="text-white mt-1">Sales Report</h3>

		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<ul class="nav navbar-nav ml-auto">
		
		<?php if ($_SESSION['accessLevel'] == 9): ?>
		<li class="ml-2 mt-2"><a
				class="btn-lg btn-secondary border border-warning"
				href="reportHandler.php" role="button" data-toggle="tooltip"
				title="Reports"><i class="fas fa-tasks"></i></a></li>
		<?php endif; ?>
		
			<li class="ml-2 mt-2"><a
				class="btn-lg btn-secondary border border-warning"
				href="reportHandler.php" role="button" data-toggle="tooltip"
				title="Back"> <i class="fas fa-arrow-circle-left"></i></a></li>

			<li class="nav-item dropdown ml-2"><a
				class="btn btn-secondary border border-warning nav-link dropdown-toggle"
				style="height: 45px" href="#" id="navbarDropdown" role="button"
				data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i
					class="far fa-user-circle"></i>
			</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item"
						href="userSelectHandler.php?ID=<?php echo $_SESSION['ID']; ?>">Account</a>
					<hr>
					<a class="dropdown-item" href="displayOrders.php">Orders</a>
				</div></li>

			<li class="ml-2 mt-2"><a
				class="btn-lg btn-secondary border border-warning"
				href="../../presentation/handlers/cartHandler.php?viewCart=true&ID=<?php echo $_SESSION['ID']; ?>"
				role="button" data-toggle="tooltip" title="Cart"> <i
					class="fas fa-shopping-cart"></i></a></li>

			<li class="ml-2 mt-2"><a
				class="btn-lg btn-secondary border border-warning"
				href="../views/login/login.php?logout='1'" role="button"
				data-toggle="tooltip" title="Logout"> <i class="fas fa-sign-out-alt"></i></a>
			</li>
		</ul>
	</nav>

	<div class="container mb-4">
		<table id="mydatatable"
			class="table table-striped table-bordered table-hover table-responsive border border-warning">
			<col width="12%">
			<col width="28%">
			<col width="12%">
			<col width="12%">
			<col width="15%">
			<col width="12%">
			<col width="18%">
			<thead class="thead-dark">
				<tr class="text-center">
					<th class="th-sm">Order ID</th>
					<th class="th-sm">Date/Time</th>
					<th class="th-sm">User ID</th>
					<th class="th-sm">Address ID</th>
					<th class="th-sm">Total Products</th>
					<th class="th-sm">Total Price</th>
					<th class="th-sm">Discount %</th>
				</tr>
			</thead>
			<tbody>

<?php

// Have to cast $products as an array to run the count function
$total = 0;
$totalProducts = 0;
for ($x = 0; $x < count((array) $salesReport); $x ++) {
    $total = $total + $salesReport[$x]['totalPrice'];
    $totalProducts = $totalProducts + $salesReport[$x]['totalProducts'];
    ?>
<tr>
					<td class="text-center">
		<?php echo $salesReport[$x]['ordersID']; ?>
	</td>
					<td>
		<?php echo $salesReport[$x]['timestamp']; ?>
	</td>
					<td class="text-center">
		<?php echo $salesReport[$x]['userID']; ?>
	</td>
          
<?php
    echo "<td class='text-center'>" . $salesReport[$x]['AddressID'] . "</td><td class='text-center'>" . 
            $salesReport[$x]['totalProducts'] . "</td><td>$" . $salesReport[$x]['totalPrice'] . "</td>";
    echo "<td class='text-center'>" . $salesReport[$x]['discountUsed'] . "</td>";
    echo "</tr>";
}
?>
			
			
			
			
			
			
			
			</tbody>
			<tfoot class="thead-dark">
				<tr>
					<th class="th-sm"></th>
					<th class="th-sm"></th>
					<th class="th-sm"></th>
					<th class="th-sm"></th>
					<th class="th-sm text-center"><?php echo $totalProducts; ?></th>
					<th class="th-sm">$<?php echo $total; ?></th>
					<th class="th-sm"></th>

				</tr>
			</tfoot>
		</table>
	</div>




	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous" type="text/javascript"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous" type="text/javascript"></script>
	<script
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous" type="text/javascript"></script>

	<!--  Datatables JavaScript -->
	<script type="text/javascript" charset="utf8"
		src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<!--  confirmation javascript -->
	<script
		src="//cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>


	<!-- Datatables script -->
	<script>
$(document).ready( function () {
    var table = $('#mydatatable').DataTable();

    table
    .column( '4:visible' )
    .order( 'desc' )
    .draw();
} );
</script>

	<!-- Confirmation script -->
	<script>
$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
});
</script>

	<!--  tool tip script script -->
	<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>