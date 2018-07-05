<?php 
	session_start();
	include "connect.php";


	$editFirstName = $_GET['profileFirstName'];
	$editlastName = $_GET['profilelastName'];
	$editEmail = $_GET['profileEmail'];
	$editAddress = $_GET['profileAddress'];

	$sql = "UPDATE customers SET firstName = '$editFirstName' WHERE id = ".$_SESSION['user_id']."";
	$sql1 = "UPDATE customers SET lastName = '$editlastName' WHERE id = ".$_SESSION['user_id']."";
	$sql2 = "UPDATE customers SET email = '$editEmail' WHERE id = ".$_SESSION['user_id']."";
	$sql3 = "UPDATE customers SET address = '$editAddress' WHERE id = ".$_SESSION['user_id']."";

	

	$result = mysqli_query($conn,$sql);
	
	$result1 = mysqli_query($conn,$sql1);
	
	$result2 = mysqli_query($conn,$sql2);
	
	$result3 = mysqli_query($conn,$sql3);
	

	// updates the session['user']'s details
	$_SESSION['firstName'] = $editFirstName; 
	$_SESSION['lastName'] = $editlastName;
	$_SESSION['email'] = $editEmail;
	$_SESSION['address'] = $editAddress;



	
	mysqli_close($conn);

 ?>