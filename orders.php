<?php 
	session_start();
	include "partials/header.php"
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row p-2 m-auto">
			<div class="col-12">
				<h3 class="mb-3">Orders Summary:</h3>
				<table class='table'>
								<tr>
									<th>No.</th>
									<th>Reference Number</th>
									<th>Customer Name</th>
									<th>Details</th>
									<th>Price</th>
									
								</tr>
				<?php 
					//selects all orders from the user logged in
					$sql = "SELECT * FROM orders";
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
									<td>".$row['referenceNo']."</td>";
						echo        "<td>".$row['customer_id']."</td>";
									//this is where all products are displayed with the same order number 
						echo    "<td>";
									while($row2 = mysqli_fetch_assoc($result2))	{
											echo $row2['productName']." x ".$row2['quantityOrdered']."<br>";
									}	
						
						echo 	"</td>";			
						echo "		<td>".$row['grandTotal']."</td>
								</tr>";
						$i++;
					}

				 ?>

				</table> 

			</div>
		</div>		
		
	</div>






	<?php include "partials/footer.php" ?>
</body>
</html>