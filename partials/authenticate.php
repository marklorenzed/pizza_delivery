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

	
	function authenticate($row_count){
		if($row_count > 0){

			return true;
			
		}else {
			
			return false;
		}
	}



	//if user credentials are correct, assign username to session variable. 
	if (authenticate($row_count)) {
		// echo "user is valid"; 
		$_SESSION["user"] = $uname;
		$_SESSION['role'] = $result2['role'];
		if($_SESSION['role'] == "admin"){
			header("location: ../adminPage.php");
		}else{
			header("Location: ../index.php"); /* Redirect browser */

		}
		

	} else {

		$_SESSION['error'] = '*Invalid Username/Password';
		header("Location: ../login.php");
		// echo 'Incorrect login details.';
		// echo "<a href='../login.php'>Login again</a>";
	}




	
 ?>