<?php 
	session_start();

	$id= $_GET['id'];
	$newValue = $_GET['newValue'];

	$_SESSION['cart'][$id]['qty'] = $newValue;
	$_SESSION['cart'][$id]['subtotal'] = ($newValue* $_SESSION['cart'][$id]['price']);


	$_SESSION['grandTotal'] = array_sum(array_column($_SESSION['cart'],'subtotal'));


 ?>