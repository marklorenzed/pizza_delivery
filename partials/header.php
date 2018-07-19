<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/animate.css">

	
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- Bootstrap core CSS -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
	
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif|Galada|Hind+Siliguri:700|Oswald|Open+Sans+Condensed:300|PT+Sans+Narrow|Cinzel" rel="stylesheet">

</head>
<body>

</body>
</html>


<?php 
	include "partials/connect.php";
 ?>



<header class="container-fluid p-0" id="topscroll">
	<div class="head">

	<a href="#topscroll" class="backtotop"><i class="fa fa-angle-up"></i></a>

			<a class="brandLogo" href="index.php">Pizza Delivery</a>

			
			<?php 
				
				if(isset($_SESSION['role'])){

					if($_SESSION['role'] == "admin"){
						echo "<a class ='adminIcon' href='adminPage.php'>ADMIN PAGE<a>";
					}

				}
				
			 ?>
			<a  class="cartBtnLogo" href="cart.php"><img class="cartIcon" src="assets/img/cart.svg"></a>
			<div class="counterWrapper"> 
				<div class="counter">
				<?php 
			
						if(isset($_SESSION['totalCartItem'])){
						echo $_SESSION['totalCartItem'];
					}
				?>
				</div>
			</div>

			<?php  if(!isset($_SESSION['user'])){ ?>

			<a href="" class="loginIcon" data-toggle="modal" data-target="#loginModal"><i class="far fa-user-circle fa-2x"></i></i> </a>
			<span id="loginError"></span>
			<!-- <a href="register.php" class="">Sign-Up</a> -->

			<?php  } else { ?>
			
			<a id="navbarDropdownMenuLink" data-toggle="dropdown" class=" loginIcon nav-link dropdown-toggle"><?php echo $_SESSION['user'] ?></a>
			
			<div class="dropdown-menu dropdown-primary">
				<a class="dropdown-item" href="profile.php">Account</a>
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
                <button data-dismiss="modal" onclick='authenticate()' class="btn btn1 ">Login</button>
                
            </div>
            <p class="text-center">Not yet registered? <a id="signUplink" href="register.php" class="">Sign-Up</a>! Now</p>
        </div>
    </div>
</form>
<!-- login Modal end -->

