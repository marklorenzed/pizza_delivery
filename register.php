<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

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
	include "partials/header.php";
?>
	<div class="container pt-5 pb-5">
		<div class="row" id="registerWrapper">

			<div class="col-md-6 offset-md-3 col-12">

				<h2>Account Registration</h2>
				<div id="errorReg"></div>
				<form>
					
					
					<div class="md-form mb-4">
						<i class="fa fa-user-o prefix grey-text"></i>
                    	<input type="text" id="usernameReg" name="username" class="form-control validate">
                    	</span><label data-error="wrong" for="usernameReg">Username</label>
                	</div>
					<div class="md-form mb-4">
						<i class="fa fa-sort-spoon prefix" aria-hidden="true"></i>
                    	<input type="text" id="firstNameReg" name="firstName" class="form-control validate">
                    	<label for="firstNameReg">First name</label>
                	</div>
                	<div class="md-form mb-4">
                		<i class="fa fa-sort-spoon prefix" aria-hidden="true"></i>
                    	<input type="text" id="lastNameReg" name="lastName" class="form-control validate">
                    	<label for="lastNameReg">Last name</label>
                	</div>
                	
	                <div class="md-form mb-5">
	                    <i class="fa fa-envelope prefix grey-text"></i>
	                    <input type="email" id="emailReg" name="email" class="form-control validate">
	                    <label data-error="wrong" data-success="right" for="emailReg">Your email</label>
                	</div>
                	<div class="md-form mb-4">
                		<i class="fa fa-address-card prefix grey-text"></i>
                    	<input type="text" id="addressReg" name="address" class="form-control validate">
                    	<label data-error="wrong" data-success="right" for="addressReg">Address</label>
                	</div>

	                <div class="md-form mb-5">
	                    <i class="fa fa-lock prefix grey-text"></i>
	                    <input type="password" id="passReg" name="password" class="form-control validate">
	                    <label for="passReg">Your password</label>
	                </div>

	                <div class="md-form mb-5">
	                    <i class="fa fa-lock prefix grey-text"></i>
	                    <input type="password" id="cpassReg" name="confirmPassword" class="form-control validate">
	                    <label for="cpassReg">Confirm password</label>
	                </div>	
	               
	                <div class="modal-footer d-flex justify-content-center">
                		<button type="button" onclick='register()'class="btn btn-deep-orange">Sign up</button>
           			</div>

					
			</div>
		</div>
	</div>
<?php 
	require "partials/footer.php";
 ?>

</body>
</html>