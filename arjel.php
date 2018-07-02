<?php  
	session_start();
	$quantity = htmlspecialchars($_GET['quantity']);
	$product_id = htmlspecialchars($_GET['product_id']);
	if(isset($_SESSION['cart']) && array_key_exists($product_id,$_SESSION['cart']))
	{
		$currentQuantity = $_SESSION['cart'][$product_id]['qty'];
		$_SESSION['cart'][$product_id]['qty'] = $currentQuantity + $quantity;
	}
	else
	{
		$product = getProduct($product_id);
		$_SESSION['cart'][$product_id]['qty'] = $quantity;
		$_SESSION['cart'][$product_id]['id'] = $product['id'];
		$_SESSION['cart'][$product_id]['name'] = $product['name'];
		$_SESSION['cart'][$product_id]['description'] = $product['description'];
		$_SESSION['cart'][$product_id]['price'] = $product['price'];
		$_SESSION['cart'][$product_id]['product_image'] = $product['product_image'];
	}

	$subTotal = $quantity * $_SESSION['cart'][$product_id]['price'];
	if (isset($_SESSION['subTotal'])) 
	{
		$currentSubTotal = $_SESSION['subTotal'];
		$_SESSION['subTotal'] = $currentSubTotal + $subTotal;
	}
	else
	{
		$_SESSION['subTotal'] = $subTotal;
	}

	if (isset($_SESSION['totalCartItem'])) 
	{
		$currentTotalQty = $_SESSION['totalCartItem'];
		$_SESSION['totalCartItem'] = $currentTotalQty + $quantity;
	}
	else
	{
		$_SESSION['totalCartItem'] = $quantity;
	}

	echo $_SESSION['totalCartItem'];

	function getProduct($id)
	{
		$product = "";
		include "db-connect.php";
		$sql = "SELECT * FROM products WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		if (!$result) 
		{
		    die('DB Error: '.mysql_error());
		    echo "DB Error: ".mysql_error();
		}
		$row_count = mysqli_num_rows($result);
		if($row_count>0)
		{
			$product = mysqli_fetch_assoc($result);
		}
		mysqli_close($conn);
		return $product;
	}
?>