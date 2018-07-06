<?php 
	session_start();
	include "connect.php";

	$username = $_POST['usernameReg'];
	$firstName = $_POST['firstNameReg'];
	$lastName = $_POST['lastNameReg'];
	$email = $_POST['emailReg'];
	$address = $_POST['addressReg'];
	$password = $_POST['passReg'];
	$confirmpw = $_POST['cpassReg'];
	$hashpw = sha1($password);

	
	$sql1 = "SELECT username FROM customers WHERE username = '$username'";
	$result1 = mysqli_query($conn,$sql1);

	$sql2 = "SELECT email FROM customers WHERE email = '$email'";
	$result2 = mysqli_query($conn,$sql2);

	$row_count1 = mysqli_num_rows($result1);
	$row_count2 = mysqli_num_rows($result2);

	if($row_count1 == 0 &&$row_count2 ==0 && ($password == $confirmpw)){

		$sql3 = "INSERT INTO customers(firstName,lastName,username,email,address,password,role) VALUES('$firstName','$lastName','$username','$email','$address','$hashpw','user')";
		$result3 = mysqli_query($conn, $sql3);
		
		$message = "<div class='col-12 text-center'>
						<h2>Registration Successful!</h2>

						<p>Click here to Sign in</p>
						<button class='btn btn2' data-toggle='modal' data-target='#loginModal2'> Sign In</button>

					</div>

					<form action='partials/authenticate.php' method='POST' class='modal fade' id='loginModal2' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					    <div class='modal-dialog' role='document'>
					        <div class='modal-content'>
					            <div class='modal-header text-center'>
					          
					                <h4 class='modal-title w-100 font-weight-bold'>Sign in</h4>
					                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
					                    <span aria-hidden='true'>&times;</span>
					                </button>
					            </div>
					            <div class='modal-body mx-3'>
					                <div class='md-form mb-5'>
					                    <i class='fa fa-user-o prefix grey-text'></i>
					                    <input type='text' id='username' name='username' class='form-control validate'>
					                    <label data-error='wrong' data-success='right' for='username'>Username</label>
					                </div>

					                <div class='md-form mb-4'>
					                    <i class='fa fa-lock prefix grey-text'></i>
					                    <input type='password' id='password' name='password' class='form-control validate'>
					                    <label data-error='wrong' data-success='right' for='password'>Your password</label>
					                </div>

					            </div>
					            <div class='modal-footer d-flex justify-content-center'>
					                <button data-dismiss='modal' onclick='authenticate()' class='btn btn1 '>Login</button>
					                
					            </div>
					            <p class='text-center'>Not yet registered? <a id='signUplink' href='register.php'>Sign-Up</a>! Now</p>
					        </div>
					    </div>
					</form>";

					
		echo $message;

	}
	
	elseif($email == null){
		$error = "Please Fill All Required Field.";
		echo $error;
	}
	else if($password != $confirmpw){
		$error = "Passwords did not match!";
		echo $error;
	}
	else
	{
		$error = '*Username/email is already used';
		echo $error;
	}
	
	
 ?>