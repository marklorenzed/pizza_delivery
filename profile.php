<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<!-- external stylesheet -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
<?php 
	include_once "partials/header.php";
	include "partials/connect.php";





?>


	<div class="container">
		
		<h1>Welcome, <?php echo $_SESSION['user'] ?></h1>
		

	</div>


<?php 
	require "partials/footer.php";
 ?>

</body>
</html>