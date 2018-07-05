<?php 
	session_start(); //be able to use $_SESSION
	//no session_start(), no $_SESSION

	include "connect.php";


	//gets the user input from form and cleans it up.
	$uname = htmlspecialchars($_POST['username']);
	$pw = htmlspecialchars($_POST['password']);
	$hashpw = sha1($pw);
	
	
	$sql = "SELECT * FROM customers WHERE username = '$uname' AND password= '$hashpw'";
	$result = mysqli_query($conn,$sql);
	$row_count = mysqli_num_rows($result);
	$result2 = mysqli_fetch_assoc($result);

	
	// function authenticate($row_count){
	// 	if($row_count > 0){

	// 		return true;
			
	// 	}else {
			
	// 		return false;
	// 	}
	// }


	
	//if user credentials are correct, assign username to session variable. 
	if ($row_count == 1) {
		// echo "user is valid"; 
		$_SESSION["user"] = $uname;
		$_SESSION['firstName'] = $result2['firstName'];
		$_SESSION['lastName'] = $result2['lastName'];
		$_SESSION['address'] = $result2['address'];
		$_SESSION['email'] = $result2['email'];
		$_SESSION['user_id']= $result2['id'];
		$_SESSION['role'] = $result2['role'];

		if($_SESSION['role'] == "admin"){
			// header("location: ../adminPage.php");
			$location = "adminPage.php";
			
		}else{
			$location = "index.php";
			
		}
		echo $location;

	} else {
		$error = "Login Error!";	
		echo $error;
	}


	
 ?>