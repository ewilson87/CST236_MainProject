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
					<h1>Edit Account</h1>
				</div>
				<form method="post" action="userAdminHandler.php">
					<div class="card-body text-left bg-info">
						<input type="hidden" id="ID" name="ID" value="<?php echo $user[0]['ID'] ?>">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text text-center" style="width: 120px" id="id-addon">ID</span>
							</div>
							<input type="text" class="form-control" value="<?php echo $user[0]['ID'] ?>" aria-label="id" aria-describedby="id-addon" disabled>
							<div class="input-group-append">
								<span class="input-group-text">Note: Cannot alter ID</span>
							</div>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text text-center" style="width: 120px" id="username-addon">Username</span>
							</div>
							<input type="hidden" id="username" name="username" value="<?php echo $user[0]['username'] ?>">
							<input type="text" class="form-control" name="username" value="<?php echo $user[0]['username'] ?>" aria-label="username" 
							aria-describedby="username-addon" disabled>
							<div class="input-group-append">
								<span class="input-group-text">Note: Cannot alter Username</span>
							</div>
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="email-addon">E-mail</span>
							</div>
							<input type="text" class="form-control" name="email" value="<?php echo $user[0]['email'] ?>" 
							     aria-label="email" aria-describedby="email-addon">
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="fname-addon">First Name</span>
							</div>
							<input type="text" class="form-control" name="fname" value="<?php echo $user[0]['fname'] ?>" aria-label="fname"
								aria-describedby="fname-addon">
						</div>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="lname-addon">Last Name</span>
							</div>
							<input type="text" class="form-control" name="lname" value="<?php echo $user[0]['lname'] ?>" aria-label="lname"
								aria-describedby="lname-addon">
						</div>
						
						<?php if ($_SESSION['accessLevel'] == 9): //only displays to admin?>
						<hr>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width: 120px" id="accessLevel-addon">Access Level</span>
							</div>
							<input type="text" class="form-control" name="accessLevel" value="<?php echo $user[0]['accessLevel'] ?>" aria-label="accessLevel"
								aria-describedby="accessLevel-addon">
							<div class="input-group-append">
								<span class="input-group-text">Note: 0 = User, 9 = Full Admin</span>
							</div>
						</div>
						<hr>
						<?php else: ?>
						<input type="hidden" id="accessLevel" name="accessLevel" value="<?php echo $user[0]['accessLevel'] ?>">
						<?php endif; ?>
						
					</div>
					<div class="card-footer bg-dark text-light border-warning">
						<button class="btn btn-secondary" data-toggle="confirmation" name="userEditSave" type="submit">Submit</button>
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