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
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Bree+Serif|Hind+Siliguri:700" rel="stylesheet">

</head>
<body>

</body>
</html>


<?php 
	include "partials/connect.php";
 ?>


<header class="container-fluid" id="top">
	<div class="row head">
		<div class="col-12">
			

		</div>
		<div class="brandLogo">
			<a href="index.php"><p class="brandName">Duma's</p></a>
		</div>
		<a href="products.php">Shop</a>
		<div class="cartBtnLogo"><i class="fa fa-shopping-cart"></i></div>

		<?php  if(!isset($_SESSION['user'])){ ?>

		<a href="" class="" data-toggle="modal" data-target="#loginModal">Sign-In</a>
		<a href="register.php" class="">Sign-Up</a>
		<?php  } else { ?>
		<a id="navbarDropdownMenuLink" data-toggle="dropdown" class="nav-link dropdown-toggle"><?php echo $_SESSION['user'] ?></a>
		<div class="dropdown-menu dropdown-primary">
			<a class="dropdown-item" href="profile.php">Acount</a>
			<a class="dropdown-item" href="logout.php">Logout</a>
				                    
		</div>
		<?php  } ?>
	</div>
</header>










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

