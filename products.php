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

	<a href="#top" class="backtotop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

		<div class="row pt-3 mb-5">
			<div class="col-md-4 col-4 p-0 animated fadeIn categories" id="1">
				<!-- <img  class="landingImg" src="assets/img/shoes_model.jpg"> -->
				<h2 onclick =checkCategory(1)>DRESS SHOES</h2>
			</div>
			<div class="col-md-4 col-4 p-0 animated fadeIn categories" id="3">
				<!-- <img  class="landingImg" src="assets/img/bag_model.jpg"> -->
				<h2 onclick =checkCategory(3)>LEATHER BAGS</h2>
			</div>
			<div class="col-md-4 col-4 p-0 animated fadeIn categories" id="2">
				<!-- <img  class="landingImg" src="assets/img/casual_model.jpg"> -->
				<h2 onclick =checkCategory(2)>CASUAL SHOES</h2>
			</div>
			<div class="col-4 offset-4 p-0 animated fadeIn categories mt-3" id="0">
				<!-- <img  class="landingImg" src="assets/img/casual_model.jpg"> -->
				<h2 onclick =checkCategory(0)>SHOP ALL</h2>
			</div>
			
		</div>
			

		<!-- this is where products are loaded -->
		<div id= 'product_loading' class = 'row'>

			<?php 
				  $sql = "SELECT * FROM products";  
				  $result = mysqli_query($conn, $sql); 
				  while($row = mysqli_fetch_assoc($result))  
				  {  

				    echo "<div class='col-6 col-md-4 col-lg-3 mb-2 pr-2 pb-2 pt-0 pl-0 productWrapper'>".
				                        "<div data-toggle='modal'  data-target='#productModal".$row['id']."' id = 'product".$row['id']."' class='product animated fadeIn  p-0'>". 
				                          "<img class='productImg  m-0' id='productImg".$row['id']."' onmouseover = 'showName(".$row['id'].")' onmouseout= 'hideName(".$row['id'].")' src='".$row['img_path']. "'>".
				                          "<p class='productName2 m-0'>".$row['productName']."</p>".
				                          "<p class='productPrice'> ₱".$row['price'].".00</p>".
				                          "<p onmouseover = 'showName(".$row['id'].")' onmouseout= 'hideName(".$row['id'].")' id='productName".$row['id']."' class='productName'>".$row['productName']."</p>".
				                       "</div>".
				                     "</div>".

				                     /* ===================================================================================
				                      MODAL CONTENT
				                     ====================================================================================*/
				                            
				                     "<div class='modal fade' id='productModal".$row['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>".
				                                  "<div class='modal-dialog modal-lg' role='document'>".
				                                      "<div class='modal-content'>".
				                                          "<div class='modal-header text-center'>".
				                                              "<h4 class='modal-title w-100 font-weight-bold'>".$row['productName']."</h4>".
				                                              "<button type='button' class='close' data-dismiss='modal'".
				                                                  "<span aria-hidden='true'>&times;</span>".
				                                              "</button>".
				                                          "</div>".
				                                          "<div class='modal-body'>".
				                                          "<div class='row'>".
				                                            "<div class ='col-7' >".
				                                              "<div class='row p-3'>".

				                                                "<div class='col-12 p-0'>".
				                                                  "<img class = 'prodModalImg' src = '".$row['img_path']."'>".
				                                                 "</div>".

				                                                 // "<div class='col-3 p-1'>".
				                                                 //  "<img onclick='changeImg(0)' class = 'prodModalImg' src = '".$row['img_path']."'>".
				                                                 // "</div>".

				                                                 // "<div class='col-3 p-1'>".
				                                                 //  "<img onclick='changeImg(1)' class = 'prodModalImg' src = '".$row['sub_img_path1']."'>".
				                                                 // "</div>".

				                                                 // "<div class='col-3 p-1'>".
				                                                 //  "<img onclick='changeImg(2)' class = 'prodModalImg' src = '".$row['sub_img_path2']."'>".
				                                                 // "</div>".

				                                                 // "<div class='col-3 p-1'>".
				                                                 //  "<img onclick='changeImg(3)' class = 'prodModalImg' src = '".$row['sub_img_path3']."'>".
				                                                 // "</div>".

				                                              "</div>".   
				                                            "</div>".
				                                            "<div class = 'col-5'>".
				                                              "<p id= 'productName".$row['id']."'>".$row['productName']."</p>".
				                                              "<p>".$row['price']."</p>".
				                                              "<p>".$row['description']."</p>".


				                                              "<input class='form-control' type = 'number' name = 'quantity' id = 'quantity".$row['id'] . "'>".
				                                              "<button data-dismiss='modal' onclick='addToCart(".$row['id'].")' type = 'submit' class = 'btn btn1'>".
				                                                "Add to Cart".
				                                              "</button>".
				                                            "</div>".
				                                          "</div>". 
				                                          "</div>
				                                      </div>
				                                  </div>
				                              </div>" ; 

				          }
			 ?>

		</div> <!-- end of product loading div -->
		
		

</div>
	



	


<?php 
	include "partials/footer.php";
 ?>

</body>
</html>