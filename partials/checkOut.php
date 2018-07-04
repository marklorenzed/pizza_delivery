<?php 
	session_start();
	include "connect.php";


	$userid = $_SESSION['user_id'];
	$refno = rand(1000000,9999999);

	$deliveryAdd = $_POST['address'];

	$sql1 = "INSERT INTO orders(customer_id,grandTotal,referenceNo)VALUES('$userid',".$_SESSION['grandTotal'].",'$refno')";
	$result1 = mysqli_query($conn,$sql1);

	$sql2 = "SELECT * FROM orders WHERE referenceNo = '$refno' ";
	$result2 = mysqli_query($conn, $sql2);
	$row = mysqli_fetch_assoc($result2);

	$order_id = $row['id'];



	foreach ($_SESSION['cart'] as $id => $result2)
	{
		
		$sql = "INSERT INTO orderdetails(product_id,order_id,quantityOrdered,subTotal)VALUES(".$result2['id']." , '$order_id' , ".$result2['qty'].",".$_SESSION['cart'][$id]['subtotal'].")";
		$result = mysqli_query($conn, $sql);
		
	}
	
	$sql3 = "UPDATE orders SET deliveryAddress ='$deliveryAdd' WHERE id = '$order_id'";
	$result3 = mysqli_query($conn, $sql3);
	
	unset($_SESSION['cart']);
	unset($_SESSION['totalCartItem']);
	unset($_SESSION['grandTotal']);

	mysqli_close($conn);

 ?>