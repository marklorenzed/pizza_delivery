<?php 
	
	session_start();
	include "connect.php";

	$id = $_POST['id'];

	$totalquantity = $_SESSION['totalCartItem'];

	$grandtotal = $_SESSION['grandTotal'];

	$_SESSION['grandTotal'] = $grandtotal - $_SESSION['cart'][$id]['subtotal'];

	$_SESSION['totalCartItem'] = $totalquantity - $_SESSION['cart'][$id]['qty'];

	unset($_SESSION['cart'][$id]);

 ?>