<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

if ($_SESSION['accessLevel'] == 9){
    $userSearch = $_GET['username'];
$_SESSION['userSearch'] = $userSearch;

$dbservice = new UserBusinessService();

$users = $dbservice->SearchByUsername($userSearch);
}
else {
    session_destroy();
    header("Location: ../views/login/login.php");
}

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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

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

<title>User Search Results</title>
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
		<!-- Image taken from  https://upload.wikimedia.org/wikipedia/en/9/92/UKTV_channel_W_logo.png -->
		<a class="navbar-brand" href="#"><img
			src="../views/images/wLogo.png" class="img-fluid img-thumbnail mr-2" alt=""
			width="40" height="40" class="d-inline-block align-top"
			style="margin-right: 5px"></a>
			<h3 class="text-white mt-1">User Search <?php echo $userSearch ?></h3>

		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<ul class="nav navbar-nav ml-auto">
		<?php if ($_SESSION['accessLevel'] == 9): ?>
		<li class="ml-2 mt-2"><a
				class="btn-lg btn-secondary border border-warning"
				href="reportHandler.php"
				role="button" data-toggle="tooltip" title="Reports"><i class="fas fa-tasks"></i></a></li>
		<?php endif; ?>
			<li class="ml-2 mt-2"><a class="btn-lg btn-secondary border border-warning"
				href="../views/login/loginSuccess.php"
				role="button" data-toggle="tooltip" title="Back"> <i class="fas fa-arrow-circle-left"></i></a>
			</li>
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
			<li class="ml-2 mt-2"><a class="btn-lg btn-secondary border border-warning"
				href="../../presentation/handlers/cartHandler.php?viewCart=true&ID=<?php echo $_SESSION['ID']; ?>"
				role="button" data-toggle="tooltip" title="Cart"> <i
					class="fas fa-shopping-cart"></i></a></li>
			<li class="ml-2 mt-2"><a class="btn-lg btn-secondary border border-warning"
				href="../views/login/login.php?logout='1'" role="button"  data-toggle="tooltip" title="Logout"> <i
					class="fas fa-sign-out-alt"></i></a>
			</li>
		</ul>
	</nav>

<?php 

if (isset($_SESSION['deleteUserSuccess'])){
    unset($_SESSION['deleteUserSuccess']);
    include('_deleteSuccess.php');
}

if ($users){
   
    include('_displayAllUsers.php');
}
else {
    echo "No users found with that username";
}

?>


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
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<!--  Datatables script -->	
<script>
$(document).ready( function () {
    $('#mydatatable').DataTable();
} );
</script>

<!--  tool tip script script -->
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
	
	
</body>
</html>
