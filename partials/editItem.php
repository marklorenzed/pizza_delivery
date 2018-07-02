<?php 
	include "connect.php";

	$newItemName = $_POST['itemName'];
	$newCategory = $_POST['category'];
	$newPrice = $_POST['price'];
	$newDesc = $_POST['description'];
	$id = $_POST['id'];

	$filename = $_FILES['new_itemImg']['name'];
	$filesize = $_FILES['new_itemImg']['size'];
	$file_tmpname = $_FILES['new_itemImg']['tmp_name'];
	$file_type = $_FILES['new_itemImg']['type'];

	$final_filepath = "assets/img/". $filename;
	move_uploaded_file($file_tmpname, "../". $final_filepath);

	$sql = "UPDATE products SET price = $newPrice WHERE id = $id";
	$sql1 = "UPDATE products SET productName = '$newItemName' WHERE id =$id";
	$sql2 = "UPDATE products SET description = '$newDesc' WHERE id = $id";
	$sql3 = "UPDATE products SET category = '$newCategory' WHERE id = $id";
	$sql4 = "UPDATE products SET img_path = $final_filepath WHERE id = $id";
	$result = mysqli_query($conn,$sql);
	$result1 = mysqli_query($conn,$sql1);
	$result2 = mysqli_query($conn,$sql2);
	$result3 = mysqli_query($conn,$sql3);
	$result4 = mysqli_query($conn,$sql4);
	

	header("Location: ../adminPage.php");
	mysqli_close($conn);
 ?>