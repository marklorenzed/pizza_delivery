<?php 
	session_start();



	$id = $_GET['id'];
	$val = $_SESSION['cart'][$id]['qty'];
	$value = "<input id='newValue".$id."' type='number' value = $val class='cartQuantityInput'>
			  <button onclick='saveQuantity(".$id.")'>Update</button>

		";

	// $currentQuantity = $_SESSION['cart'][$id]['qty'];
	echo $value;

 ?>