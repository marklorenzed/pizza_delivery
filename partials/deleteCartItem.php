<?php 
	
	session_start();
	include "connect.php";

	$id = $_POST['id'];

	$totalquantity = $_SESSION['totalCartItem'];

	$_SESSION['totalCartItem'] = $totalquantity - $_SESSION['cart'][$id]['qty'];

	unset($_SESSION['cart'][$id]);

 ?>