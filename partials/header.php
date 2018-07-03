<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
	<!-- mdboostrap -->

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
	
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Galada" rel="stylesheet">

</head>
<body>

</body>
</html>


<?php 
	include "partials/connect.php";
 ?>





<nav class="navbar navbar-expand-lg navbar-light white" id="top">
	
	<a href="index.php" class="navbar-brand">Duma's</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
		<span class="navbar-toggle-icon"><i class="fa fa-navicon" aria-hidden="true"></i></span>
	</button>
<?php  if(!isset($_SESSION['user'])){ ?>
	<div class='collapse navbar-collapse' id='navbarContent'>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">

				<div class="cartBtn">
					
					<a class="nav-link  cartBtnLogo" href="cart.php"><i class="fa fa-shopping-cart"></i></a>
				</div>
				<!-- <button id='btn1' type="button" class="btn btn-danger cartBtn" data-toggle="modal" data-target="#cartModal">
					
				</button>  -->
			</li>


			<li class="nav-item">
				<a href="" class="nav-link" data-toggle="modal" data-target="#loginModal">Sign-In</a>
			</li>

			<li class="nav-item">
				  	<a href="register.php" class="nav-link">Sign-Up</a>
			</li>
		</ul>
	</div>
<?php  } else { ?>
	<div class='collapse navbar-collapse' id='navbarContent'>
		<ul class="navbar-nav ml-auto">

			<li class="nav-item dropdown">
				<a id="navbarDropdownMenuLink" data-toggle="dropdown" class="nav-link dropdown-toggle"><?php echo $_SESSION['user'] ?></a>
				<div class="dropdown-menu dropdown-primary">
				    <a class="dropdown-item" href="profile.php">Acount</a>
				    <a class="dropdown-item" href="logout.php">Logout</a>
				                    
				</div>
			</li>
			
			<li class="nav-item">
				<div class="cartBtn">
					<a href="cart.php" class="nav-link cartBtnLogo"><i class="fa fa-shopping-cart "></i></a>
				</div>
			</li>
		</ul>
	</div>


<?php  } ?>

</nav>


<!-- login Modal -->
<form action="partials/authenticate.php" method="POST" class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-user-o prefix grey-text"></i>
                    <input type="text" id="username" name="username" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="username">Username</label>
                </div>

                <div class="md-form mb-4">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="password" name="password" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="password">Your password</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit "class="btn btn1 ">Login</button>
            </div>
        </div>
    </div>
</form>
<!-- login Modal end -->

