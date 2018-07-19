<?php 
	session_start();



	$id = $_GET['id'];

	$val = $_GET['status'];

	// $value = "<button class= 'shipItem' onclick='saveOrderStatus(".$id.")'>Ship Item</button>";
	
	$value = "<select name='orderUpdate' id='orderUpdate".$id."'>
				<option value='Processing'>Processing</option>
				<option value='Shipped'>Shipped</option>
			</select>
			<button class='editButton success-color' onclick='saveOrderStatus(".$id.")'>save</button>"
			;
	// $currentQuantity = $_SESSION['cart'][$id]['qty'];
	echo $value;
 ?>