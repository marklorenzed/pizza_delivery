<?php 
	session_start();
	include_once "partials/header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- bootstrap -->
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->



</head>
<body>
<div class="container">




	<table class='table'>
					<tr>
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Subtotal</th>
						<th></th>
					</tr>
	<?php 
	$total = 0;
	if(isset($_SESSION['cart']))
	{
		
		foreach ($_SESSION['cart'] as $productId => $result2) 
		{
			$subtotal = ($result2['qty']*$result2['price']);
			echo "	<tr>
						<td>".$result2['productName']."</td>
						<td>".$result2['qty']."</td>
						<td>".$result2['price']."</td>
						<td>".$subtotal."</td>	
						<td class='cartItemDelete'><button class= 'removeItem' id='remove_".$result2['id']."'>x</button></td>	
					</tr>";
			$total += $subtotal;
					
		}	
	}
		
	else 
	{	
		echo "<h4 class='text-danger'>No Item on the cart</h4>";
	}

	 ?>

	 <tr>
			<td></td>	
			<td></td>	
			<td>Grand Total: </td>	
			<td><?php echo $total; ?></td>	
		</tr>
	</table>
		

</div>
	


<?php 
	require "partials/footer.php";
 ?>

</body>
</html>