<?php 
	session_start();
	include "connect.php";

	date_default_timezone_set("Asia/Manila");

	$date = date("Y/m/d");

	$userid = $_SESSION['user_id'];

	//generate random reference no.
	$refno = strtoupper(uniqid());

	//check if reference no already exist in the database

	$sql4 = "SELECT*FROM orders WHERE referenceNo = '$refno'";
	$result4 = mysqli_query($conn,$sql4);
	$row_count = mysqli_num_rows($result4);

	if($row_count > 0){
		$refno = strtoupper(uniqid());
	}

//this is where order is created
	$sql1 = "INSERT INTO orders(customer_id,grandTotal,referenceNo,orderDate,status)VALUES('$userid',".$_SESSION['grandTotal'].",'$refno','$date','Processing')";
	$result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));

//this is where rows with the order_id is selected
	$sql2 = "SELECT * FROM orders WHERE referenceNo = '$refno' ";
	$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result2);
	$order_id = $row['id'];


//this insert the products to the table order details with the unique order_id from above
	foreach ($_SESSION['cart'] as $id => $result2)
	{
		
		$sql = "INSERT INTO orderdetails(product_id,order_id,quantityOrdered,subTotal, size)VALUES(".$result2['id']." , '$order_id' , ".$result2['qty'].",".$_SESSION['cart'][$id]['subtotal'].",'".$_SESSION['cart'][$id]['size']."')";
		$result = mysqli_query($conn, $sql);
		
	}
	
//this changes the delivery address as per the user
	$deliveryAdd = $_POST['address'];
	$sql3 = "UPDATE orders SET deliveryAddress ='$deliveryAdd' WHERE id = '$order_id'";
	$result3 = mysqli_query($conn, $sql3);



	$showRefNo = "<div class='row'>
					<div class='col-12 text-center'>
						<h3>Thank you! Your order has been successfully completed!</h3>
						<h4>Your order reference Number is: <h4>
						<h2> ".$refno."</h2> 
						<a href='profile.php'>
							<button class='btn btn2'>Review your orders</button>
						</a>
					</div>
				  </div>	

				";

	echo $showRefNo;

	
//this will empty the cart after checkout
	unset($_SESSION['cart']);
	unset($_SESSION['totalCartItem']);
	unset($_SESSION['grandTotal']);

	mysqli_close($conn);

 ?>

