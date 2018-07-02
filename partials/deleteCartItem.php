<?php 
	
	session_start();
	include "connect.php";

	$id = $_POST['id'];

	unset($_SESSION['cart'][$id]);
 ?>