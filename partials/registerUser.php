<?php 
	include "connect.php";

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = $_POST['password'];
	$confirmpw = $_POST['confirmPassword'];
	$hashpw = sha1($password);

	
	$sql1 = "SELECT username FROM customers WHERE username = '$username'";
	$result1 = mysqli_query($conn,$sql1);

	$sql2 = "SELECT email FROM customers WHERE email = '$email'";
	$result2 = mysqli_query($conn,$sql2);

	$row_count1 = mysqli_num_rows($result1);
	$row_count2 = mysqli_num_rows($result2);
	if($row_count1 == 0 &&$row_count2 ==0 && ($password == $confirmpw)){
		// echo "you can register";

		$sql3 = "INSERT INTO customers(firstName,lastName,username,email,address,password) VALUES('$firstName','$lastName','$username','$email','$address','$hashpw')";
		$result3 = mysqli_query($conn, $sql3);
		// header('Location: ../login.php');

		header("location", '../profile.php');

	}else{
		echo "Error in registration";
	}
	mysqli_close($conn);
 ?>