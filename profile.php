
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- external stylesheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
<?php 
	session_start();
	include "partials/header.php";
	include "partials/connect.php";





?>


	<div class="container">
		
		
		<h1 class="mb-3 text-center">Welcome, <?php echo $_SESSION['firstName'] ?></h1>
	
		<div class="row p-2 m-auto">
			<div class="col-12">	
				<h3 class="mb-3">Acount Details:</h3>
			</div>
			<div class="col-12">
				<div class="row profileContent">
					<?php 
					
					echo "<div class='col-2'>
							First Name: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['firstName'].
						  "</div>";
					echo "<div class='col-2'>
							Last Name: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['lastName'].
						  "</div>";
					echo "<div class='col-2'>
							Email: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['email'].
						  "</div>";	 	  
					echo "<div class='col-2'>
							Address: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['address'].
						  "</div>";	  
				 	?>
				</div>
			</div>
			<div class="col-12" id="editProfileUpdate">
				
			</div>
			<div class="col-12">
				<button class="btn btn1" onclick="editProfile()">Edit Profile</button>
				<button class="btn btn3" id="editProfileButton" onclick='saveProfile()'>Save</button>
			</div>
			
		</div>
		<div class="row p-2 m-auto">
			<div class="col-12">
				<h3 class="mb-3">Orders Summary:</h3>
				<table class='table'>
								<tr>
									<th>No.</th>
									<th>Reference Number</th>
									<th>Details</th>
									<th>Price</th>
									
								</tr>
				<?php 
					//selects all orders from the user logged in
					$sql = "SELECT * FROM orders WHERE customer_id = ".$_SESSION['user_id']."";
					$result = mysqli_query($conn, $sql);
					$i = 1;

					// loop to show all selected orders from  the user logged in
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['id'];

						//select all rows from orderdetails-orders-products with same order id
						$sql2 = "SELECT * FROM orderdetails JOIN orders JOIN products ON(orderdetails.order_id = orders.id AND orderdetails.product_id = products.id) WHERE order_id = '$id'";
						$result2 = mysqli_query($conn, $sql2);
						

						echo "	<tr>
									<td>".$i."</td>
									<td>".$row['referenceNo']."</td>
									<td>";

									//this is where all products are displayed with the same order number

									while($row2 = mysqli_fetch_assoc($result2)){
										echo $row2['productName']." x ".$row2['quantityOrdered']."<br>";
									}



						echo		"</td>
									<td>".$row['grandTotal']."</td>
								</tr>";
						$i++;
					}

				 ?>

				</table> 

			</div>
		</div>
		
	</div>


<?php 
	require "partials/footer.php";
 ?>

</body>
</html>