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
		
		foreach ($_SESSION['cart'] as $id => $result2) 
		{
			$subtotal = ($result2['qty']*$result2['price']);
			echo "	<tr>
						<td>".$result2['productName']."</td>
						<td>".$result2['qty']."</td>
						<td>".$result2['price']."</td>
						<td>".$subtotal."</td>	
						<td class='cartItemDelete'><button class= 'removeItem' data-toggle='modal'  data-target='#deleteCartItem".$result2['id']."'>x</button></td>	
					</tr>";
			$total += $subtotal;

			echo "<div class='modal fade' id='deleteCartItem".$result2['id']."' tabindex='-1'>".
                                        "<div class='modal-dialog' role='document'>".
                                            "<div class='modal-content p-3'>".
                                                "<div class='modal-body'>".
                                                "<div class='row'>".
                                                	"<h4>Do you want to remove this item from the cart?</h4>".
                                                	"<br>".
                                                  	"<button class = 'm-auto btn btn2' onclick='deleteFromCart(".$result2['id'].")' id='remove_".$result2['id']."'>Yes</button>".
                                                "</div>
                                            </div>
                                        </div>
                                    </div>" ; 
					
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
			<td><?php 
				if(isset($_SESSION['cart'])){
					echo $_SESSION['grandTotal'];
				}
				else {
					echo 0;
				}
			?></td>	
		</tr>
	</table>

	<button data-toggle='modal'  data-target='#proceed' >Check Out</button>	

	<div class='modal fade' id='proceed' tabindex='-1'>
		<div class='modal-dialog' role = 'document'>
			<div class='modal-content'>
				<div class='modal-body'>
					<?php 
						echo "<p>".$_SESSION['firstName']." ".$_SESSION['lastName']."</p>";
						echo "<input id='address' name='address' type='text' value='".$_SESSION['address']."'>";
						if(isset($_SESSION['cart'])){
											echo "<div>₱".$_SESSION['grandTotal']."</div>";
										}
										else {
											echo "<div>₱0</div>";
										}


					 ?>



					<button class="m-auto btn btn2" onclick="checkOut()">Proceed</button>
				</div>
			</div>
		</div>
	</div>

</div>
	


<?php 
	require "partials/footer.php";
 ?>

</body>
</html>