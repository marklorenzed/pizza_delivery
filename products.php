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
			
		</div>
			
		<div id= 'product_loading' class = 'row'>
		</div>
		
		<div id='cart'></div>

</div>
	



	


<?php 
	include "partials/footer.php";
 ?>

</body>
</html>