<?php 
	
	session_start();
	include "connect.php";

	$id = $_POST['id'];

	$sql = "DELETE FROM products WHERE id = $id";
	$result = mysqli_query($conn, $sql);
 ?>