<?php 
	session_start();
	include "partials/header.php";
	include "partials/connect.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

<div class="container">


	
		<div class="row">
			<div class="col-md-6 col-6 p-0">
				<img class="landingImg" src="assets/img/bag_model.jpg">
			</div>
			<div class="col-md-6 col-6 p-0">
				<img class="landingImg" src="assets/img/shoes_model.jpg">
			</div>
		</div>
	


	
		

	<?php 
		$sql = "SELECT*FROM products";
		$result = mysqli_query($conn,$sql);
		echo "<div class = 'row'>";
		while($row = mysqli_fetch_assoc($result)) {
				
				echo "<div data-toggle='modal'  data-target='#productModal".$row['id']."' id = 'product".$row['id']."' class='product col-6 col-md-3 p-0'>".
							"<img class='productImg  m-0' id='productImg".$row['id']."' onmouseover = 'showName(".$row['id'].")' onmouseout= 'hideName(".$row['id'].")' src='".$row['img_path']. "'>".
							"<p class='productPrice'> ₱".$row['price'].".00</p>".
							"<p onmouseover = 'showName(".$row['id'].")' onmouseout= 'hideName(".$row['id'].")' id='productName".$row['id']."' class='productName'>".$row['productName']."</p>".
					"</div>";
					

				echo "<div class='modal fade' id='productModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>".
					    "<div class='modal-dialog modal-lg' role='document'>".
					        "<div class='modal-content'>".
					            "<div class='modal-header text-center'>".
					                "<h4 class='modal-title w-100 font-weight-bold'>".$row['productName']."</h4>".
					                "<button type='button' class='close' data-dismiss='modal'".
					                    "<span aria-hidden='true'>&times;</span>".
					                "</button>".
					            "</div>".
					            "<div class='modal-body '>".
					           	"<div class='row'>".
					            	"<div class ='col-6' >".
					            		"<img class = 'prodModalImg' src = '".$row['img_path']."'>".
					            	"</div>".
					            	"<div class = 'col-6'>".
					            		"<p>".$row['productName']."</p>".
					            		"<p>".$row['price']."</p>".
					            		"<p>".$row['description']."</p>".


					            		"<input class='form-control' type = 'number' name = 'quantity' id = 'quantity".$row['id'] . "'>".
					            		"<button onclick='addToCart(".$row['id'].")' type = 'submit' class = 'btn btn1'>".
					            			"Add to Cart".
					            		"</button>".
					            	"</div>".
					            "</div>".	
					            "</div>
					        </div>
					    </div>
					</div>";
		}	
		echo "</div>";

	 ?>




</div>
	



	


<?php 
	include "partials/footer.php";
 ?>

</body>
</html>