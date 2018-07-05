<?php 
	session_start();
	include "connect.php";


	$userid = $_SESSION['user_id'];

	//generate random reference no.
	$refno = strtoupper(uniqid());

	//check if reference no already exist in the database

	$sql4 = "SELECT*FROM orders WHERE referenceNo = 'refno'";
	$result4 = mysqli_query($conn,$sql4);
	$row_count = mysqli_num_rows($result4);

	if($row_count > 0){
		$refno = strtoupper(uniqid());
	}




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

	$showRefNo = "<div class='row'>
					<div class='col-12 text-center'>
						<h3>Thank you! Your order has been successfully completed!</h3>
						<h4>Your order reference Number is: <h4>
						<h2> ".$refno."</h2> 
					</div>
				  </div>	

				";

	echo $showRefNo;

	

	unset($_SESSION['cart']);
	unset($_SESSION['totalCartItem']);
	unset($_SESSION['grandTotal']);

	mysqli_close($conn);

 ?>