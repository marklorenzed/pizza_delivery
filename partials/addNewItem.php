<?php 
	include "connect.php";

	$itemName = $_POST['itemName'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$desc = $_POST['description'];
	

	$filename = $_FILES['itemImg']['name'];
	$filesize = $_FILES['itemImg']['size'];
	$file_tmpname = $_FILES['itemImg']['tmp_name'];
	$file_type = $_FILES['itemImg']['type'];
	//$_FILES['name in the form']['property']
	//list of properties commonly used:
	//name,size, tmp_name, type

	
	$final_filepath = "assets/img/". $filename;
	$sql = "INSERT INTO products(productName,price,img_path,description,category_id)
			VALUES('$itemName',$price, '$final_filepath', '$desc',$category)";
	$result = mysqli_query($conn,$sql);
	move_uploaded_file($file_tmpname, "../".$final_filepath);

	
	header("Location: ../adminPage.php");
	mysqli_close($conn);
?>