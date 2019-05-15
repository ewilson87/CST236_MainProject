<?php
/**
 * CST-236 Main Project
 * login.php version 1.0
 * Program Author: Evan Wilson
 * Date: 07 April 2019
 * Starting page of application. Here the user can login, or select register new account.
 */
require_once '../../../header.php';
require_once '../../../Autoloader.php';

require_once '../../../businessService/ServerService.php';

// used for logging out to end session
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['principle']);
    header("location: login.php");
}
else if (isset($_SESSION['setAddress'])){
    //redirect to set address
    header("location: addAddress.php");
}
else if (isset($_SESSION['principle']) && $_SESSION['principle'] == true){
    //redirect to login success
    header("location: loginSuccess.php");
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

<style>
hr {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>

<title>CST236 Main Project login page</title>
</head>

<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
					<!-- Image taken from  https://upload.wikimedia.org/wikipedia/en/9/92/UKTV_channel_W_logo.png -->
			<a class="navbar-brand" href="#" ><img src="../images/wLogo.png" class="img-fluid img-thumbnail" alt="" width="40"
			 height="40" class="d-inline-block align-top" style="margin-right: 5px"></a>
			<h3 class="text-white">Wilson's Auto</h3>

			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarSupportedContent">
				<span class="navbar-toggler-icon"></span>
			</button>
		</nav>
		
<div class="container">
		<div class="jumbotron border border-warning">
			<h1 class="display-3">Welcome to Wilson's (fake) Autos!</h1>
			<hr>
			<h1 class="display-4 text-center">The only place you can buy outrageous priced vehicles online!</h1>
			<hr>
			<p class="lead text-center">
				Developed for Grand Canyon University <br>CST236 - Database
				Application Programming II <br>Developed by: Evan Wilson
			</p>
			<p class="text-center">
				<a class="btn btn-dark btn-lg border border-warning" target="_blank"
					rel="noopener noreferrer"
					href="https://www.gcu.edu/degree-programs/bachelor-science-computer-programming"
					role="button">Learn more at GCU</a>
			</p>
		</div>
</div>

<?php include('errors.php'); ?>

<div class="container">
		<div class="row mb-4">
			<div class="col-sm-12 col-md-6">
				<div class="card bg-info border border-warning">
					<div class="card-body text-left">
						<h5 class="card-title">Login</h5>
						<form method="post" action="login.php">
							<div class="form-group">
								<label for="LoginUser">Username or Email</label> <input
									type="text" class="form-control border border-warning" name="LoginUser" id="LoginUser"
									aria-describedby="emailHelp" placeholder="Enter email" required> <small
									id="emailHelp" class="form-text">We'll never share
									your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="LoginPassword">Password</label> <input
									type="password" class="form-control border border-warning" name="LoginPassword" id="LoginPassword"
									placeholder="Password" required>
							</div>
							<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-dark border border-warning" name="login_user">Login</button>
							</div>
						</form>

					</div>
				</div>
			</div>

			<div class="col-sm-12 col-md-6">
				<div class="card bg-info border border-warning">
					<div class="card-body text-left">
						<h5 class="card-title">Register New User</h5>

						<form method="post" action="login.php">
							<div class="form-group">
								<label for="RegisterEmail">Email address</label> <input
									type="email" class="form-control border border-warning" name="email" id="RegisterEmail"
									aria-describedby="emailHelp" placeholder="Enter email" required> <small
									id="emailHelp" class="form-text">We'll never share
									your email with anyone else.</small>
							</div>
							<div class="form-group">
								<label for="RegisterUsername">Username</label> <input
									type="text" class="form-control border border-warning" name="username" id="RegisterUsername"
									aria-describedby="emailHelp" placeholder="Enter username" required>
							</div>
							<div class="form-group">
								<label for="RegisterFname">First Name</label> <input type="text"
									class="form-control border border-warning" name="fname" id="RegisterFname"
									aria-describedby="emailHelp" placeholder="Enter First Name" required>
							</div>
							<div class="form-group">
								<label for="RegisterLname">Last Name</label> <input type="text"
									class="form-control border border-warning" name="lname" id="RegisterLname"
									aria-describedby="emailHelp" placeholder="Enter Last Name" required>
							</div>
							<div class="form-group">
								<label for="RegisterPassword1">Password</label> <input
									type="password" class="form-control border border-warning" name="password_1" id="RegisterPassword1"
									placeholder="Password" required>
							</div>
							<div class="form-group">
								<label for="RegisterPassword2">Confirm Password</label> <input
									type="password" class="form-control border border-warning" name="password_2" id="RegisterPassword2"
									placeholder="Confirm Password" required>
							</div>
							<div class="d-flex justify-content-center">
							<button type="submit" class="btn btn-dark border border-warning" name="reg_user">Register</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		
		</div>
</div>

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
</body>
</html>
