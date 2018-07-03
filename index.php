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

		<div class="row pt-3"  id= 'product_loading'>
			<div class="col-md-4 col-4 p-0 animated fadeIn">
				<img onclick =checkCategory(1) class="landingImg" src="assets/img/shoes_model.jpg">
				<h2 class="shopCategory">Dress Shoes</h2>
			</div>
			<div class="col-md-4 col-4 p-0 animated fadeIn">
				<img onclick =checkCategory(3) class="landingImg" src="assets/img/bag_model.jpg">
				<h2 class="shopCategory">Leather Bags</h2>
			</div>
			<div class="col-md-4 col-4 p-0 animated fadeIn">
				<img onclick =checkCategory(2) class="landingImg" src="assets/img/casual_model.jpg">
				<h2 class="shopCategory">Casual Shoes</h2>
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