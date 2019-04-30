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

<title>Login Success</title>
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
		<!-- Image taken from  https://upload.wikimedia.org/wikipedia/en/9/92/UKTV_channel_W_logo.png -->
		<a class="navbar-brand" href="#"><img src="../images/wLogo.png"
			class="img-fluid img-thumbnail" alt="" width="40" height="40"
			class="d-inline-block align-top" style="margin-right: 5px"></a>
		<h3 class="text-white mt-1">
			Login Succeeded. Welcome <em><?php echo $_SESSION['fname'] . "</em>!"?>
		
		
		
		
		
		</h3>

		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<ul class="nav navbar-nav ml-auto">
			<li class="ml-2 mt-1"><a
				class="btn-lg btn-secondary border border-warning"
				href="../../handlers/cartHandler.php?viewCart=true&ID=<?php echo $_SESSION['ID']; ?>"
				role="button" data-toggle="tooltip" title="Cart"> <i
					class="fas fa-shopping-cart"></i></a></li>
			<li class="ml-2 mt-1"><a
				class="btn-lg btn-secondary border border-warning"
				href="../../handlers/userSelectHandler.php?ID=<?php echo $_SESSION['ID']; ?>"
				role="button" data-toggle="tooltip" title="Account"> <i
					class="far fa-user-circle"></i></a></li>
			<li class="ml-2 mt-1"><a
				class="btn-lg btn-secondary border border-warning"
				href="login.php?logout='1'" role="button" data-toggle="tooltip"
				title="Logout"> <i class="fas fa-sign-out-alt"></i></a></li>
		</ul>
	</nav>

	<div class="container">

		<div class="row mb-4">
			<!--  Only user with access level equal to 9 (admin) can view this -->
	<?php if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel']  == 9): ?>

	
			<div class="col-sm-12 col-md-6">
				<div class="card mb-4 bg-info border border-warning">
					<div class="card-body text-left">
						<h3 class="card-title text-center">User Administration Controls</h3>
						<form
							action="../../../presentation/handlers/userSearchHandler.php">
							<div class="form-group">
								<label for="username">Search for a user </label> <input
									type="text" class="form-control border border-warning" name="username" id="username"
									aria-describedby="searchHelp" placeholder="Enter email"> <small
									id="searchHelp" class="form-text mb-2">Leave blank for all
									users.</small>
								<div class="d-flex justify-content-center">
									<button type="submit"
										class="btn btn-dark border border-warning">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-6">
	<?php

else :
    echo '<div class="col-sm-12 col-md-12">';
endif;
?>
	    
				<div class="card mb-4 bg-info border border-warning">
					<div class="card-body text-left">
						<h3 class="card-title text-center">Vehicle Search</h3>
						<form
							action="../../../presentation/handlers/ProductSearchHandler.php">
							<div class="form-group">
								<label for="pattern">Search by make or model </label> <input
									type="text" class="form-control border border-warning" name="pattern"
									aria-describedby="patternHelp"
									placeholder="Enter make or model"> <small id="patternHelp"
									class="form-text mb-2">Leave blank for all vehicles.</small>
								<div class="d-flex justify-content-center">
									<button type="submit"
										class="btn btn-dark border border-warning">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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

	<!--  tool tip script -->
	<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>
