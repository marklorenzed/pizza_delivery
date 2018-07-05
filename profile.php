
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
	session_start();
	include "partials/header.php";
	include "partials/connect.php";





?>


	<div class="container">
		
		
		<h1 class="mb-3 text-center">Welcome, <?php echo $_SESSION['firstName'] ?></h1>
	
		<div class="row p-2 m-auto">
			<div class="col-12">	
				<h3 class="mb-3">Acount Details:</h3>
			</div>
			<div class="col-12">
				<div class="row profileContent">
					<?php 
					
					echo "<div class='col-2'>
							First Name: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['firstName'].
						  "</div>";
					echo "<div class='col-2'>
							Last Name: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['lastName'].
						  "</div>";
					echo "<div class='col-2'>
							Email: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['email'].
						  "</div>";	 	  
					echo "<div class='col-2'>
							Address: 
						  </div>".
						 "<div class='col-10'>".
							 $_SESSION['address'].
						  "</div>";	  
				 	?>
				</div>
			</div>
			<div class="col-12" id="editProfileUpdate">
				
			</div>
			<div class="col-12">
				<button class="btn btn1" onclick="editProfile()">Edit Profile</button>
				<button class="btn btn3" id="editProfileButton" onclick='saveProfile()'>Save</button>
			</div>
			
		</div>
		<div class="row p-2 m-auto">
			<div class="col-12">
				<h3 class="mb-3">Orders:</h3>
				<table class='table'>
								<tr>
									<th>No.</th>
									<th>Reference Number</th>
									<th>Details</th>
									
								</tr>
				<?php 

					$sql = "SELECT * FROM orders WHERE customer_id = ".$_SESSION['user_id']."";
					$result = mysqli_query($conn, $sql);
					$i = 1;
					while($row = mysqli_fetch_assoc($result)){
						echo "	<tr>
									<td>".$i."</td>
									<td>".$row['referenceNo']."</td>
									<td>".$row['grandTotal']."</td>
								</tr>";
						$i++;
					}

				 ?>

				</table> 

			</div>
		</div>
		
	</div>


<?php 
	require "partials/footer.php";
 ?>

</body>
</html>