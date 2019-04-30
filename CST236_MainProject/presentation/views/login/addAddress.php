<?php
/**
 * CST-236 Main Project
 * loginSuccess.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * The page the user gets directed to after initial successful login.
 */
require_once '../../../header.php';
require_once '../../../Autoloader.php';
require_once 'securePage.php';

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

<title>Set Address</title>

<style>
hr {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0),
		rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}

.input-group-text {
	width: 130px;
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
			Registration Succeeded. Welcome <em><?php echo $_SESSION['fname'] . "</em>! Please enter your address."?>	
		
		
		
		
		
		
		</h3>

		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<ul class="nav navbar-nav ml-auto">
			<li class="ml-2 mt-1"><a
				class="btn-lg btn-secondary border border-warning"
				href="../../handlers/userSelectHandler.php?ID=<?php echo $_SESSION['ID']; ?>"
				role="button" data-toggle="tooltip" title="Account"> <i
					class="far fa-user-circle"></i></a></li>
			<li class="ml-2 mt-1"><a class="btn-lg btn-secondary border border-warning"
				href="login.php?logout='1'" role="button" data-toggle="tooltip"
				title="Logout"> <i class="fas fa-sign-out-alt"></i></a></li>
		</ul>
	</nav>

	<div class="container text-center">
		<div class="row mb-4 justify-content-center">
			<div class="col-sm-12">
				<div class="card bg-info border border-warning mb-3">
					<div class="card-header bg-dark text-light border-warning">
						<h1>Set Address</h1>
					</div>
					<form method="post" action="../../handlers/addAddressHandler.php">
						<div class="card-body text-left bg-info">
							<div class="input-group my-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="addressType">Address Type</label>
								</div>
								<select class="custom-select" name="addressType"
									id="addressType">
									<option value="1">Home</option>
									<option value="2">Business</option>
								</select>
							</div>
							<hr>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="street1-addon">Address
										Line 1</span>
								</div>
								<input type="text" class="form-control" name="street1"
									aria-label="street1" aria-describedby="street1-addon" required>
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="street2-addon">Address
										Line 2</span>
								</div>
								<input type="text" class="form-control" placeholder="OPTIONAL"
									name="street2" aria-label="street2"
									aria-describedby="street-addon">
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="city-addon">City</span>
								</div>
								<input type="text" class="form-control" name="city"
									aria-label="city" aria-describedby="city-addon" required>
							</div>
							<hr>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center" id="state-addon">State</span>
								</div>
								<select class="custom-select" name="stateSelect"
									id="stateSelect">
									<option value="AK">Alaska</option>
									<option value="AL">Alabama</option>
									<option value="AR">Arkansas</option>
									<option value="AZ">Arizona</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DC">District of Columbia</option>
									<option value="DE">Delaware</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="IA">Iowa</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="MA">Massachusetts</option>
									<option value="MD">Maryland</option>
									<option value="ME">Maine</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MO">Missouri</option>
									<option value="MS">Mississippi</option>
									<option value="MT">Montana</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="NE">Nebraska</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NV">Nevada</option>
									<option value="NY">New York</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="PR">Puerto Rico</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VA">Virginia</option>
									<option value="VT">Vermont</option>
									<option value="WA">Washington</option>
									<option value="WI">Wisconsin</option>
									<option value="WV">West Virginia</option>
									<option value="WY">Wyoming</option>
								</select>
							</div>
							<hr>

							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text text-center"
										id="postalCode-addon">Postal Code</span>
								</div>
								<input type="text" class="form-control" name="postalCode"
									aria-label="postalCode" aria-describedby="postalCode-addon" required>
							</div>
							<hr>


							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<input type="checkbox" name="isDefaultCheck"
											aria-label="Default Check Box" checked>
									</div>
								</div>
								<input type="text" name="isDefault" class="form-control"
									value="SELECT TO MAKE ADDRESS DEFAULT"
									aria-label="Default Check Box" DISABLED>
							</div>

						</div>
						<div class="card-footer bg-dark text-light border-warning">
								<div class="d-flex justify-content-center">
									<button class="btn btn-secondary border border-warning" data-toggle="confirmation"
										name="userEditSave" type="submit">Submit</button>
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
