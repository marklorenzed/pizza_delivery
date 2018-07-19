<?php 
	session_start();
	
	include "partials/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Duma's | Catalog</title>

</head>
<body>

<?php 
	include "partials/header.php";
 ?>




<div class="container">

	<!-- this is where products are loaded -->
	<div id= 'product_loading' class = 'row'>

		<?php 
			$sql = "SELECT * FROM pizza_types";  
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0)  
			{ 
				while($row = mysqli_fetch_assoc($result))  
				{	
					
					echo "<div class='col-6 col-lg-4 productWrapper'>
							<div data-toggle='modal'  data-target='#productModal".$row['id']."' id = 'product".$row['id']."' class='product animated fadeIn  p-0'>
									<img src=".$row['img_path'].">
									<h2>".$row['name']."</h2>
							</div>
						 </div>";


					echo "<div class='modal fade' id='productModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>".
                                            "<div class='modal-dialog modal-lg' role='document'>".
                                                "<div class='modal-content'>".
                                                  "<div class='modal-header text-center'>".
                                                      "<h4 class='modal-title w-100 font-weight-bold'>".$row['name']."</h4>".
                                                      "<button type='button' class='close' data-dismiss='modal'".
                                                          "<span aria-hidden='true'>&times;</span>".
                                                      "</button>".
                                                  "</div>".
                                                  "<div class='modal-body' id='body".$row['id']."'>".
                                                    "<div class='row'>".
                                                      "<div class ='col-7' >".
                                                        "<div class='row p-3'>".

                                                          "<div class='col-12 p-0'>".
                                                            "<img class = 'prodModalImg' src = '".$row['img_path']."'>".
                                                          "</div>".
                                                        "</div>".   
                                                      "</div>".
                                                      "<div class = 'col-5'>".
                                                       
                                                        "<table>
                                                           <tr>
                                                        	 <th>Solo</th>
                                                        	 <th>Regular</th>
                                                        	 <th>Family</th>
                                                           </tr>
                                                           <tr>
                                                           	  <td>".$row['price']."</td>
                                                           	  <td>".($row['price']+140) ."</td>
                                                           	  <td>".($row['price']+370) ."</td>
                                                           </tr>
                                                        </table>".

                                                       

                                                        "<p>".$row['description']."</p>".

                                                        "<div class='quantityError'></div>".
                                                       "<label>Choose Size: </label>".
                                                       "<select class='browser-default' name='size' id='size".$row['id']."'>
                                                             <option value='7 inches'>7 inches</option>
                                                             <option value='10 inches'>10 inches</option>
                                                             <option value='14 inches'>14 inches</option>
                                                         </select><br>".
                                                         "<label>Choose Crust: </label>".
                                                         "<select class='browser-default' name='crust' id='crust".$row['id']."'>
                                                               <option value='Thin Crust'>Thin Crust</option>
                                                               <option value='Classic Hand-Tossed'>Classic Hand Tossed</option>
                                                           </select><br>".
                                                        "<label>Quantity</label>".
                                                        "<input class='form-control quantityInput mb-3' type = 'number' min='1' name = 'quantity' id = 'quantity".$row['id'] . "'>".
                                                        "<button onclick='addToCart(".$row['id'].")' type = 'button' class = 'btn btn2'>".
                                                          "Add to Cart".
                                                        "</button>".
                                                        "<button data-dismiss='modal' type = 'button' class = 'btn btn1'>".
                                                          "Close".
                                                        "</button>".

                                                      "</div>".
                                                    "</div>". 
                                                  "</div>
                                                </div>
                                            </div>
                                        </div>" ; 

                               
				}
			}
		 ?>
	</div> <!-- end of product loading div -->

</div>
	

	


<?php 
	include "partials/footer.php";
 ?>

</body>
</html>