<?php 
	session_start();

	$edit= "<div class='col-2'>
			First Name: 
		  </div>".
		 "<div class='col-10'>".
		 	"<input type='text' id='profileFirstName' name='profileFirstName' class='mb-2 form-control form-control-sm' value='".$_SESSION['firstName']."'>".
		  "</div>".
	 	 "<div class='col-2'>
			Last Name: 
		  </div>".
		 "<div class='col-10'>".
		 	"<input type='text' id='profilelastName' name='profilelastName' class='mb-2 form-control form-control-sm' value='".$_SESSION['lastName']."'>".
		  "</div>".
	      "<div class='col-2'>
			Email: 
		  </div>".
		 "<div class='col-10'>".
		 	"<input type='email' id='profileEmail' name='profileEmail' class='mb-2 form-control form-control-sm' value='".$_SESSION['email']."'>".
		  "</div>". 	  
	      "<div class='col-2'>
			Address: 
		  </div>".
		 "<div class='col-10'>".
		 	"<input type='text' id='profileAddress' name='profileAddress' class='mb-2 form-control form-control-sm' value='".$_SESSION['address']."'>".
		  "</div>";

	echo $edit;

 ?>

