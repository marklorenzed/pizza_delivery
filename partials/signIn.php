<?php 
	$showSignIn = "<div class='mb-5'>
                    <i class='fa fa-user-o prefix grey-text'></i>
                    <input type='text' id='username' name='username' class='form-control validate'>
                    <label data-error='wrong' data-success='right' for='username'>Username</label>
                  </div>

                <div class='mb-4'>
                    <i class='fa fa-lock prefix grey-text'></i>
                    <input type='password' id='password' name='password' class='form-control validate'>
                    <label data-error='wrong' data-success='right' for='password'>Your password</label>
                </div>";

    echo $showSignIn;
	
 ?>