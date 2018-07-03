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

	<div class="container_admin">
		<button data-toggle='modal' data-target='#additem' class='editBtn'>
			<i class='fa fa-plus'></i>
		</button>



		<?php 

		if($_SESSION['role']== "admin"){
			$sql = "SELECT*FROM products";
			$result = mysqli_query($conn,$sql);

			echo "<div class='container p-4'>";
			echo "<div class = 'row'>";
			echo "<button data-toggle='modal' data-target='#additem' class='editBtn'>
				<i class='fa fa-plus'></i>
			</button>";

				while($row = mysqli_fetch_assoc($result)) {
					echo "<div  id = 'admin".$row['id']."' class='product_admin col-12 col-md-6 p-2'>".
							"<div class = 'row'>".
								"<div class='col-7'>".
									"<img class='product_admin_image  m-0' id='product_admin".$row['id']."' src='".$row['img_path']. "'>".
								"</div>".
								"<div class='col-5'>".
									"<p id='productName".$row['id']."' class='productName_admin'>".$row['productName']."</p>".
									"<p class='productPrice_admin'>".$row['price']."</p>".
									"<p class='productDesc_admin'>".$row['description']."</p>".

									"<button class='btn btn1' data-toggle='modal'  data-target='#productEdit".$row['id']."'> <i class='fa fa-edit'></i> </button>".

									"<button class='btn btn2' data-toggle='modal'  data-target='#productDelete".$row['id']."' ><i class='fa fa-trash-o'></i></button>".
								"</div>".
							"</div>".
						  "</div>";

					echo "<form action='partials/editItem.php' method='POST' class='modal fade' id='productEdit".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>".
						    "<div class='modal-dialog' role='document'>".
						        "<div class='modal-content'>".
						            "<div class='modal-header text-center'>".
						                "<h4 class='modal-title w-100 font-weight-bold'>".$row['productName']."</h4>".
						                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
						                    "<span aria-hidden='true'>&times;</span>".
						                "</button>".
						            "</div>".
						            "<div class='modal-body '>".
						                "<form enctype='multipart/form-data'>".
						                	"<input type='number' name='id' class='form-control hiddenId' value =".$row['id'].">".
							            	"Item Name: <input type='text' name='itemName' class='form-control' value =".$row['productName']."><br>
							            	Category: <input type='number' name='category' class='form-control'><br>
							            	Price: <input type='number' name='price' class='form-control' value =".$row['price']."><br>
							            	<br>
							            	Description: <input type='text' name='description' class='form-control' value =".$row['description']."><br>
							            	Image: <input type='file' name='new_itemImg' class='form-control'><br>"
							            	.
							            	 "<button type = 'submit' class = 'btn btn1'>".
						                		"Save changes".
						                	 "</button>".
						            	"</form>".

						            "</div>
						        </div>
						    </div>
						</form>";
					echo "<form action='partials/editItem.php' method='POST' class='modal fade' id='productDelete".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>".
						    "<div class='modal-dialog' role='document'>".
						        "<div class='modal-content'>".
						            "<div class='modal-header text-center'>".
						                "<h4 class='modal-title w-100 font-weight-bold'>".$row['productName']."</h4>".
						                "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>".
						                    "<span aria-hidden='true'>&times;</span>".
						                "</button>".
						            "</div>".
						            "<div class='modal-body '>".
						                "<form enctype='multipart/form-data' class=' m-auto'>".
						                	"Are you sure you want to delete this item?<br>" .
							            	 "<button type = 'submit' class = 'btn btn1' onclick = 'deleteItem(".$row['id'].")'>".
						                		"Yes".
						                	 "</button>".
						            	"</form>".

						            "</div>
						        </div>
						    </div>
						</form>";	
				};				
			echo "</div>";
			echo "</div>";

		}else {
			echo "<div>You are not authorized</div>";
		}


		

		?>



	</div>



	<!-- Add Item Modal -->

	<!-- Modal -->
	<div class="modal right fade" id="additem" tabindex="-1">
	    <div class="modal-dialog modal-full-height modal-right" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title" id="exampleModalLabel">Add an Item</h5>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body">
	                <form action="partials/addNewItem.php" method="POST" enctype="multipart/form-data">
	                	Item Name: <input type="text" name="itemName" class="form-control"><br>
	                	Category: <input type="number" name="category" class="form-control"><br>
	                	Price: <input type="number" name="price" class="form-control"><br>
	                	<br>
	                	Description: <input type="text" name="description" class="form-control"><br>
	                	Image: <input type="file" name="itemImg" class="form-control"><br>
	                	<button type="submit">Save new item </button>
	                	
	                </form>	
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                <button type="submit" class="btn btn-primary">Save changes</button>
	            </div>
	        </div>
	    </div>
	</div>



<?php 
	include "partials/footer.php";
 ?>
</body>
</html>