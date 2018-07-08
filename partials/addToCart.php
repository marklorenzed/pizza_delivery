<?php 
	session_start();
	include "connect.php";


	$quantity = htmlspecialchars($_POST['quantity']);
	$id = $_POST['id'];
	$size = $_POST['size'];



	if($_POST['size'] == "none"){
		$size = " ";
	}
	else{
		$size = "size " .$_POST['size'];
	}
	
	


	$sql = "SELECT * FROM products WHERE id = $id";
	
	$result = mysqli_query($conn, $sql);
	$result2 = mysqli_fetch_assoc($result);


	if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart'])){
		$currentQuantity = $_SESSION['cart'][$id]['qty'];
		$_SESSION['cart'][$id]['qty'] = $currentQuantity + $quantity;
	}
	else
	{
		$_SESSION['cart'][$id]['qty'] = $quantity;
		$_SESSION['cart'][$id]['img_path'] = $result2['img_path'];
		$_SESSION['cart'][$id]['id'] = $result2['id'];
		$_SESSION['cart'][$id]['productName'] = $result2['productName']." ".$size;
		$_SESSION['cart'][$id]['price'] = $result2['price'];
		$_SESSION['cart'][$id]['subtotal'] = ($quantity * $result2['price']);
		$_SESSION['cart'][$id]['size'] = $size;
		
	}



	$_SESSION['grandTotal'] = array_sum(array_column($_SESSION['cart'],'subtotal'));
	$_SESSION['totalCartItem'] = array_sum(array_column($_SESSION['cart'],'qty'));
	// if(isset($_SESSION['grandTotal']))
	// {
	// 	$grandTotal = $_SESSION['grandTotal'];
	// 	$_SESSION['grandTotal'] = $grandTotal + $_SESSION['cart'][$id]['subtotal'];
	// }
	// else
	// {
	// 	$_SESSION['grandTotal'] = $_SESSION['cart'][$id]['subtotal'];
	// }




	// if (isset($_SESSION['totalCartItem'])) 
	// {
	// 	$currentTotalQty = $_SESSION['totalCartItem'];
	// 	$_SESSION['totalCartItem'] = $currentTotalQty + $quantity;
	// }
	// else
	// {
	// 	$_SESSION['totalCartItem'] = $quantity;
	// }


	echo $_SESSION['totalCartItem'];
	
 ?>