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
						<button class='btn btn2' data-toggle='modal' data-target='#loginModal'> Sign In</button>

					</div>";

					
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