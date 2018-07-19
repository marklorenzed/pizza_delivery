<?php 
	session_start();
	include "connect.php";


	$quantity = htmlspecialchars($_POST['quantity']);
	$id = $_POST['id'];
	$size = htmlspecialchars($_POST['size']);
	$crust = $_POST['crust'];

	

	$sql = "SELECT * FROM pizza_types WHERE id = $id";
	
	$result = mysqli_query($conn, $sql);
	$result2 = mysqli_fetch_assoc($result);
	$price = $result2['price'];

	if($size == "10 inches"){
		$price = $price + 140;
	}
	else if ($size == "14 inches") {
		$price = $price + 370;
	}

	if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart'])){
		$currentQuantity = $_SESSION['cart'][$id]['qty'];
		$_SESSION['cart'][$id]['qty'] = $currentQuantity + $quantity;
	}
	else
	{
		$_SESSION['cart'][$id]['qty'] = $quantity;
		$_SESSION['cart'][$id]['img_path'] = $result2['img_path'];
		$_SESSION['cart'][$id]['id'] = $result2['id'];
		$_SESSION['cart'][$id]['name'] = $result2['name'];
		$_SESSION['cart'][$id]['price'] = $price;
		$_SESSION['cart'][$id]['subtotal'] = ($quantity * $price);
		$_SESSION['cart'][$id]['size'] = $size;
		$_SESSION['cart'][$id]['crust'] = $crust;

		
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


	// echo $_SESSION['totalCartItem'];

	$message = "<div class='row'>
					<div class='col-12 text-center'>
						<h3>Successfully added to cart!</h3>
						<a href='cart.php'>
							<button class='btn btn2'>View Cart</button>
						</a>
						<button class='btn btn1' data-dismiss='modal'> Shop more </button>
					</div>
				  </div>";


	$array = ["message" => $message, "totalQty" => $_SESSION['totalCartItem']];		  

	echo json_encode($array);

	
 ?>