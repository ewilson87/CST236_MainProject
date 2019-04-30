<?php
?>

<style>
hr {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0),
		rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>


<div class="container text-center">
	<div class="row mb-4 justify-content-center">
		<div class="col-sm-12">
			<div class="card border-warning mb-3">
				<div class="card-header bg-dark text-light border-warning">
					<h1>Account Information</h1>
				</div>
				<form method="post" action="userAdminHandler.php">
					<div class="card-body text-left bg-info">
						<input type="hidden" id="ID" name="ID"
							value="<?php echo $user[0]['ID'] ?>">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text text-center" style="width: 120px"
									id="id-addon">ID</span>
							</div>
							<input type="text" class="form-control"
								value="<?php echo $user[0]['ID'] ?>" aria-label="id"
								aria-describedby="id-addon" disabled>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text text-center" style="width: 120px"
									id="username-addon">Username</span>
							</div>
							<input type="text" class="form-control" name="username"
								value="<?php echo $user[0]['username'] ?>" aria-label="username"
								aria-describedby="username-addon" disabled>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="email-addon">E-mail</span>
							</div>
							<input type="text" class="form-control" name="email"
								value="<?php echo $user[0]['email'] ?>" aria-label="email"
								aria-describedby="email-addon" disabled>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="fname-addon">First Name</span>
							</div>
							<input type="text" class="form-control" name="fname"
								value="<?php echo $user[0]['fname'] ?>" aria-label="fname"
								aria-describedby="fname-addon" disabled>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="lname-addon">Last Name</span>
							</div>
							<input type="text" class="form-control" name="lname"
								value="<?php echo $user[0]['lname'] ?>" aria-label="lname"
								aria-describedby="lname-addon" disabled>
						</div>
						<hr>
						<?php if ($_SESSION['accessLevel'] == 9): //only displays to admin?>
						<div class="input-group mb-1">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="accessLevel-addon">Access Level</span>
							</div>
							<input type="text" class="form-control" name="accessLevel"
								value="<?php echo $user[0]['accessLevel'] ?>"
								aria-label="accessLevel" aria-describedby="accessLevel-addon"
								disabled>
							<div class="input-group-append">
								<span class="input-group-text">Note: 0 = User, 9 = Full Admin</span>
							</div>
						</div>
						<hr>
						<?php else: ?>
						<input type="hidden" id="accessLevel" name="accessLevel"
							value="<?php echo $user[0]['accessLevel'] ?>" disabled>
						<?php endif; ?>
						
						<h3 class="text-center">Address</h3>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="addressType-addon">Address Type</span>
							</div>
							<input type="text" class="form-control" name="addressType"
								value="<?php if ($user[0]['addressType'] == 1){ echo "HOME"; } else echo "BUSINESS";  ?>"
								aria-label="addressType" aria-describedby="addressType-addon"
								disabled>
						</div>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="isDefault-addon">Is Default</span>
							</div>
							<input type="text" class="form-control" name="isDefault"
								value="<?php if ($user[0]['isDefault'] == 1){ echo "YES"; } else echo "NO";  ?>"
								aria-label="isDefault" aria-describedby="isDefault-addon"
								disabled>
						</div>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="street1-addon">Address Line 1</span>
							</div>
							<input type="text" class="form-control" name="street1"
								value="<?php echo $user[0]['street1'] ?>" aria-label="street1"
								aria-describedby="street1-addon" disabled>
						</div>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="street2-addon">Address Line 2</span>
							</div>
							<input type="text" class="form-control" name="street2"
								value="<?php echo $user[0]['street2'] ?>" aria-label="street2"
								aria-describedby="street2-addon" disabled>
						</div>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="city-addon">City</span>
							</div>
							<input type="text" class="form-control" name="city"
								value="<?php echo $user[0]['city'] ?>" aria-label="city"
								aria-describedby="city-addon" disabled>
						</div>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="state-addon">State</span>
							</div>
							<input type="text" class="form-control" name="state"
								value="<?php echo $user[0]['state'] ?>" aria-label="state"
								aria-describedby="state-addon" disabled>
						</div>
						<hr>

						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px"
									id="postalCode-addon">Postal Code</span>
							</div>
							<input type="text" class="form-control" name="postalCode"
								value="<?php echo $user[0]['postalCode'] ?>"
								aria-label="postalCode" aria-describedby="postalCode-addon"
								disabled>
						</div>

					</div>
					<div class="card-footer bg-dark text-light border-warning">
						<br>
						<br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container text-center">
	<div class="row mb-4 justify-content-center">
		<div class="col-sm-12 col-md-6">
			<div class="card mb-4 border border-warning">
				<div class="card-body text-left bg-info">
					<h5 class="card-title">Account Edit Controls</h5>
					<form action="userAdminHandler.php" method="post">
						<div class="input-group">
							<input type="hidden" id="ID" name="ID"
								value="<?php echo $user[0]['ID'] ?>"> <select
								class="custom-select" id="userEditGroupSelect"
								name="userEditGroupSelect">
								<option value="1">Edit Account</option>
								<option value="3">Edit Address</option>
								<option class="bg-danger" value="2">Delete Account(WARNING -
									CAN'T BE UNDONE!)</option>
							</select>
							<div class="input-group-append">
								<button class="btn btn-dark border border-warning" data-toggle="confirmation"
									type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
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