<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
</head>
<body>

</body>
</html>


<?php 
	include "partials/connect.php";
 ?>


<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
	<a href="catalog.php" class="navbar-brand">My Shop</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
		<span class="navbar-toggle-icon"></span>
	</button>
<?php  if(!isset($_SESSION['user'])){ ?>
	<div class='collapse navbar-collapse' id='navbarContent'>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a href="cart.php" class="nav-link">My Cart</a>
			</li>
			<li class="nav-item">
				<a href="login.php" class="nav-link">Login</a>
			</li>
			<li class="nav-itemLog">
				<a href="register.php" class="nav-link">Register</a>
			</li>
		</ul>
	</div>
<?php  } else { ?>
	<div class='collapse navbar-collapse' id='navbarContent'>
		<ul class="navbar-nav ml-auto">

			<li class="nav-item">
				<a href="profile.php" class="nav-link">Welcome, <?php echo $_SESSION['user'] ?></a>
			</li>
			<li class="nav-item">
				<a href="logout.php" class="nav-link">Logout</a>
			</li>
			<li class="nav-item">
				<a href="cart.php" class="nav-link">My Cart</a>
			</li>
		</ul>
	</div>
<?php  } ?>

</nav>