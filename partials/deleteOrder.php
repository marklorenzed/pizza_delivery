<?php 
	
	session_start();
	include "connect.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM orders WHERE id = $id";

	$result = mysqli_query($conn, $sql);

 ?>