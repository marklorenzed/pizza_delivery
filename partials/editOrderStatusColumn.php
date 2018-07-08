<?php 
	session_start();



	$id = $_GET['id'];

	$val = $_GET['status'];

	$value = "<button class= 'shipItem' onclick='saveOrderStatus(".$id.")'>Ship Item</button>";

	// $currentQuantity = $_SESSION['cart'][$id]['qty'];
	echo $value;
 ?>