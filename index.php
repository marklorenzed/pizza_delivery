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


	<div class="landingPage">
		<div class="row">
			<div class="col-md-6 col-12 p-0">
				<img class="landingImg" src="assets/img/bag_model.jpg">
			</div>
			<div class="col-md-6 col-12 p-0">
				<img class="landingImg" src="assets/img/shoes_model.jpg">
			</div>
		</div>
	</div>


	
		

	<?php 
		$sql = "SELECT*FROM products";
		$result = mysqli_query($conn,$sql);
		echo "<div class = 'row'>";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<div class='product col-md-3 p-0 m-0'>".
				"<img class='productImg p-1 m-0' src='".$row['img_path']. "'>".
				"<p class='productPrice'>".$row['price']."</p>".
				"</div>";
		}
		echo "</div>";
	 ?>

	

</div>
	



	


<?php 
	include "partials/footer.php";
 ?>

</body>
</html>