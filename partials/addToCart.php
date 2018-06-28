<?php 
	session_start();
	$quantity = $_POST['quantity'];
	$id = $_POST['id'];
	$_SESSION['cart'][$id] = $quantity;
	//creates a session variable with name of cart and key of quantity.

	$total_quantity += array_sum($_SESSION['cart']);

	echo $total_quantity;

 ?>