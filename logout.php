<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">



</head>
<body>
<?php 
	session_unset();
	session_destroy();
	include_once "partials/header.php";
?>
	<div class="container">
		<div class="jumbotron mt-5 text-center">
			<h2>You have logged out successfully</h2>
			<a href="index.php"><button class="btn btn2 mt-5">Home</button></a>
		</div>
	</div>

<?php 
	require "partials/footer.php";
 ?>

</body>
</html>