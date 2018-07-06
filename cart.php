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
<div class="container" id="cart">




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
			
			echo "	<tr>
						<td>".$result2['productName']."</td>
						<td id='cartQuantity".$result2['id']."'>".$result2['qty']."<span id='saveQuantity".$result2['id']."'></span></td>
						<td>".$result2['price']."</td>
						<td>".$result2['subtotal']."</td>	
						<td class='text-center'>
							<button class= 'removeItem' data-toggle='modal'  data-target='#deleteCartItem".$result2['id']."'><i class='far fa-trash-alt'></i></button>

							<button class='editCartButton'onclick='editCartQuantity(".$result2['id'].")'>Edit</button></td>
					</tr>";
			

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
			<td></td>	
			
		</tr>
	</table>

	<button class="btn btn2" data-toggle='modal'  data-target='#proceed' >Check Out</button>	



	<!-- when check out is clicked -->

	<div class='modal fade' id='proceed' role='dialog' tabindex='-1'>
		<div class='modal-dialog' role = 'document'>
			<div class='modal-content'>
				<div class='modal-body' id="showRefno">
					<?php 

						// if user is logged in
						if(isset($_SESSION['user'])){

							if(isset($_SESSION['grandTotal']))
							{
								echo "<p>".$_SESSION['firstName']." ".$_SESSION['lastName']."</p>";
								echo "<input id='address' name='address' type='text' value='".$_SESSION['address']."'>";
								if(isset($_SESSION['cart'])){
													echo "<div>₱".$_SESSION['grandTotal']."</div>";
												}
												else {
													echo "<div>₱0</div>";
												}

								echo "<button class='m-auto btn btn2' id='proceedButton' type='button' onclick='checkOut()'>Proceed</button>";
							}
							else
							{
								echo "You have no orders yet.";
							}
							
						}
						else
						{ //if user is not logged in
							echo "You must be logged in to check out.";
							echo "<form action='partials/authenticate.php' method='POST'>
									  <div class='md-form mb-5'>
	                    				<i class='fa fa-user-o prefix grey-text'></i>
	                    				<input type='text' id='username1' name='username' class='form-control validate'>
	                    				<label data-error='wrong' data-success='right' for='username'>Username</label>
	                				  </div>
	                				  <div class='md-form mb-4'>
	                				    <i class='fa fa-lock prefix grey-text'></i>
	                				    <input type='password' id='password1' name='password' class='form-control validate'>
	                				    <label data-error='wrong' data-success='right' for='password'>Your password</label>
	                				  </div>

	                				  
	                				  <div class='modal-footer d-flex justify-content-center'>
	                				      <button class='btn btn1' onclick='loginFromCart()'>Login</button>
	                				  </div>

	                			  </form>";

						}
						


					 ?>

					
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