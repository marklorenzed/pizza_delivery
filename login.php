<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

</head>
<body>
<?php 
	include_once "partials/header.php";
?>
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col-md-6 offset-md-3 col-12">


				<form action="partials/authenticate.php" method="POST">
					<div class="form-group">
						<h1>Login</h1>

						<span id="loginErrorMessage"></span>
						<label for="username">Username: </label>
						<input type="username" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password: </label>
						<input type="password" name="password" class="form-control">
					</div>
					<button type="submit" class="btn btn-danger btn-block">Login</button>

					<?php 
						if(isset($_SESSION['error'])) { 
							echo '<div id="loginerror">'.$_SESSION['error'].'</div>';
							unset($_SESSION['error']);
						}
					 ?>
				</form>
			</div>
		</div>
	</div>
<?php
	require "partials/footer.php";
?>

</body>
</html>