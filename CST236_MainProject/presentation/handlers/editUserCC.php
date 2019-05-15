<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../header.php';
require_once '../../Autoloader.php';
require_once 'handlersSecurePage.php';

$userService = new UserBusinessService();

$user = $userService->findCCbyID($_SESSION['ID']);
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

<!--  Font Awesome CSS -->
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
	crossorigin="anonymous">

<title>Edit credit card</title>

<style>
hr {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0),
		rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}

.input-group-text {
	width: 160px;
}
</style>


</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
		<!-- Image taken from  https://upload.wikimedia.org/wikipedia/en/9/92/UKTV_channel_W_logo.png -->
		<a class="navbar-brand" href="#"><img src="../images/wLogo.png"
			class="img-fluid img-thumbnail" alt="" width="40" height="40"
			class="d-inline-block align-top" style="margin-right: 5px"></a>
		<h3 class="text-white mt-1">
			Edit your credit card.	
		</h3>

		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<ul class="nav navbar-nav ml-auto">
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
				href="../../presentation/views/login/login.php?logout='1'" role="button" data-toggle="tooltip"
				title="Logout"> <i class="fas fa-sign-out-alt"></i></a></li>
		</ul>
	</nav>

	<div class="container text-center">
		<div class="row mb-4 justify-content-center">
			<div class="col-sm-12">
				<div class="card bg-info border border-warning mb-3">
					<div class="card-header bg-dark text-light border-warning">
						<h1>Edit Credit Card</h1>
					</div>
					<form method="post" action="../../presentation/handlers/addCCHandler.php">
						<div class="card-body text-left bg-info">
							<div class="input-group my-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="ccType">Credit Card Type</label>
								</div>
								<select class="custom-select" name="ccType"
									id="ccType">								
									<option value="<?php echo $user[0]['ccType'] ?>"><?php echo $user[0]['ccType'] ?></option>
									<option value="Visa">Visa</option>
									<option value="Mastercard">Mastercard</option>
									<option value="American Express">American Express</option>
									<option value="Bankcard">Bankcard</option>
								</select>
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="ccNumber-addon">Credit Card Number</span>
								</div>
								<input type="text" pattern=".{15,16}" class="form-control" name="ccNumber"
									value="<?php echo $user[0]['ccNumber'] ?>"
									aria-label="ccNumber" aria-describedby="ccNumber-addon" required>
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="expMonthSelect-addon">Expiration Month</span>
								</div>
								<select class="custom-select" name="expMonthSelect"
									id="expMonthSelect">
									<option value="<?php echo $user[0]['ccMonth'] ?>"><?php echo $user[0]['ccMonth'] ?></option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="expYearSelect-addon">Expiration Year</span>
								</div>
								<select class="custom-select" name="expYearSelect"
									id="expYearSelect">
									<option value="<?php echo $user[0]['ccYear'] ?>"><?php echo $user[0]['ccYear'] ?></option>
									<option value="01">2019</option>
									<option value="02">2020</option>
									<option value="03">2021</option>
									<option value="04">2022</option>
									<option value="05">2023</option>
									<option value="06">2024</option>
									<option value="07">2025</option>
									<option value="08">2026</option>
									<option value="09">2027</option>
									<option value="10">2028</option>
									<option value="11">2029</option>
									<option value="12">2030</option>
								</select>
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="ccCCV-addon">Credit Card CCV</span>
								</div>
								<input type="text" pattern=".{3,4}" class="form-control" name="ccCCV"
									value="<?php echo $user[0]['ccCCV'] ?>"
									aria-label="ccCCV" aria-describedby="ccCCV-addon" required>
							</div>
						</div>
						<div class="card-footer bg-dark text-light border-warning">
								<div class="d-flex justify-content-center">
									<button class="btn btn-secondary border border-warning" data-toggle="confirmation"
										name="ccEditSave" type="submit">Submit</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


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

	<!--  confirmation javascript -->
	<script
		src="//cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>

	<!--  tool tip script -->
	<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

	<!-- Confirmation script -->
	<script>
$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
});
</script>

</body>
</html>

