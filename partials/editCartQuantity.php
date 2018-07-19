<?php 
	session_start();



	$id = $_GET['id'];
	$val = $_SESSION['cart'][$id]['qty'];
	$value = "<input id='newValue".$id."' type='number' min='1' value = $val class='cartQuantityInput'>
			  <button class='editButton success-color' onclick='saveQuantity(".$id.")'>Update</button>

		";

	// $currentQuantity = $_SESSION['cart'][$id]['qty'];
	echo $value;

 ?>