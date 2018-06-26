<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- contains
	Name
	Username
	email
	password
	confirm password
 -->

</head>
<body>
<?php 
	include_once "partials/header.php";
?>
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-md-6 offset-md-3 col-12">
				<form action="partials/registerUser.php" method="POST">
					<div class="form-group">
						<h1>Register</h1>
						<label for="firstName">First Name: </label>
						<input type="text" name="firstName" class="form-control">
						<label for="lastName">Last Name: </label>
						<input type="text" name="lastName" class="form-control">
						
					</div>
					<div class="form-group">
						<label for="username">Username: </label>
						<input type="username" name="username" class="form-control">
					</div>
					<div class="form-group">
						
						<label for="email">Email: </label>
						<input type="email" name="email" class="form-control">
					</div>

					<div class="form-group">
						
						<label for="address">Full Address: </label>
						<input type="text" name="address" class="form-control">

					</div>

					<div class="form-group">
						<label for="password">Password: </label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label for="confirmPassword">Confirm Password: </label>
						<input type="password" name="confirmPassword" class="form-control">
					</div>
					<button type="submit" class="btn btn-danger btn-block">Register</button>
				</form>
			</div>
		</div>
	</div>
<?php 
	require "partials/footer.php";
 ?>

</body>
</html>