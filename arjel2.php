<?php
	// session_start();
	if(isset($_SESSION['cart']))
	{
		foreach ($_SESSION['cart'] as $productId => $product) 
		{
			echo "<li class='row'>
					<div class='col-md-7'>
						<img src='".$product['product_image']."' class='w-75' />
					</div>
					<div class='col-md-4'>
						<h4 class='text-theme-pink text-theme-bold'>".$product['name']."</h4>
						<h5 class='text-theme-blue text-theme-bold'>&#x20b1;".($product['price'] * $product['qty'])."</h5>
						<small class='text-theme-pink'>Qty:  </small>
						<input id='qty_".$product['id']."' type='number' min='1' class='form-control' value='".$product['qty']."' />
						<button id='remove_".$product['id']."' class='btn btn-theme-blue'>Remove</button>
					</div>
				</li>";
		}	
	}
	else
	{
		echo "<h4 class='text-danger'>No Item on the cart</h4>";
	}
	

 ?>