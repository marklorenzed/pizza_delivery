<?php 
	session_start();
	
	include "partials/connect.php"
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>

<?php 
	include "partials/header.php";
 ?>


 <div class="container-fluid">
 	<div class="row pt-3 mb-5 categoriesWrapper">
 		<div class="col-3 p-0 animated fadeIn categories" id="0">
 			<!-- <img  class="landingImg" src="assets/img/casual_model.jpg"> -->
 			<h2 onclick =checkCategory(0)>SHOP ALL</h2>
 		</div>
 		<div class="col-md-3 col-3 p-0 animated fadeIn categories" id="1">
 			<!-- <img  class="landingImg" src="assets/img/shoes_model.jpg"> -->
 			<h2 onclick =checkCategory(1)>DRESS SHOES</h2>
 		</div>
 		<div class="col-md-3 col-3 p-0 animated fadeIn categories" id="3">
 			<!-- <img  class="landingImg" src="assets/img/bag_model.jpg"> -->
 			<h2 onclick =checkCategory(3)>LEATHER BAGS</h2>
 		</div>
 		<div class="col-md-3 col-3 p-0 animated fadeIn categories" id="2">
 			<!-- <img  class="landingImg" src="assets/img/casual_model.jpg"> -->
 			<h2 onclick =checkCategory(2)>CASUAL SHOES</h2>
 		</div>
 	</div>
 </div>
<div class="container">

	<a href="#top" class="backtotop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

		
			

		<!-- this is where products are loaded -->
		<div id= 'product_loading' class = 'row'>

			

		</div> <!-- end of product loading div -->
		
		

</div>
	



	


<?php 
	include "partials/footer.php";
 ?>

</body>
</html>