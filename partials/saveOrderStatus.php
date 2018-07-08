<?php 
	session_start();
	include "connect.php";

	$id= $_GET['id'];
	$newStatus = $_GET['newStatus'];

	$sql = "UPDATE orders SET status = '$newStatus' WHERE id = $id";
	$result = mysqli_query($conn,$sql);

 ?>