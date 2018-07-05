
$('.backtotop').click(function(e){

	var linkHref = $(this).attr('href');

	$('html, body').animate({
		scrollTop: $(linkHref).offset().top
	},800);

	e.preventDefault();
})

var cartCounter = $(".counter").text();

if(cartCounter == 0){
	$(".counterWrapper").css("visibility", "hidden");
}



	// Hover functions for products

function showName(id){
    	
    	$("#productName"+id).css("visibility", "visible");
    	$("#product"+id).css("background-color","black");
    	$("#productImg"+id).css("opacity","0.3");
    	$("#product"+id).css("transition","0.3s");

    }
function hideName(id){

    	$("#productName"+id).css("visibility", "hidden");
    	$("#product"+id).css("background-color","#eee");
    	$("#productImg"+id).css("opacity","1");   	
    }






function addToCart(id){
	
	var quantity = $("#quantity"+id).val();

	$.ajax({
		"url":"partials/addToCart.php",
		"data": {"quantity":quantity, "id":id},
		//throws to addToCart.php the ID of item selected as well as the quantity
		"type": "POST",
		"success": function(data){
			location.reload();
			
		}
	});

}

function deleteItem(id){
	$.ajax({
		"url":"partials/deleteItem.php",
		"data": {"id":id},
		"type": "POST",
		"success": function(data){
			alert("Item is successfuly deleted");
			location.reload();
			
		}
	});
}

function deleteFromCart(id){
	$.ajax({
		"url":"partials/deleteCartItem.php",
		"data": {"id":id},
		"type": "POST",
		"success": function(data){

			location.reload();
		}
	});
}




function checkCategory(i){
	$.ajax({
		"url":"partials/load_product.php",  
		"method":"POST",  
		"data":{"category":i},  
		"success":function(data){  
		     $("#product_loading").html(data);
		     $("#"+i).addClass('underline');
		     $("#"+i).siblings().removeClass('underline'); 
			}  
	});


}

function checkOut(){
	var address = $('#address').val();

	$.ajax({
		"url":"partials/checkOut.php",
		"method": "POST",
		"data":{"address": address},
		"success":function(data){
			$("#proceed").remove("hide"); 
			$("#cart").html(data);
			
		}
	});
}


function authenticate(){
	var username = $("#username").val();
	var password = $("#password").val();
	$.ajax({
		"url":"partials/authenticate.php",
		"method": "POST",
		"data":{"username": username, "password": password},
		"success":function(data){

			if(data == "Login Error!"){

				$("#loginError").html(data);
			}
			else{
				window.location.replace(data);
				
			}

			
		}

	});
}

function loginFromCart(){
	var username = $("#username1").val();
	var password = $("#password1").val();
	$.ajax({
		"url":"partials/authenticate.php",
		"method": "POST",
		"data":{"username": username, "password": password},
		"success":function(data){

			if(data == "Login Error!"){

				$("#loginError").html(data);
			}
			else{
				location.reload();
				
			}

			
		}

	});
}



function editProfile(){
	$.ajax({
		"url":"partials/editProfile.php",
		"success":function(data){
			$(".profileContent").html(data);
			$("#editProfileButton").css('visibility', 'visible');
		}
	});

}

function saveProfile(){
	var profileFirstName = $("#profileFirstName").val();
	var profilelastName = $("#profilelastName").val();
	var profileEmail = $("#profileEmail").val();
	var profileAddress = $("#profileAddress").val();

	$.ajax({
		"url":"partials/saveEditProfile.php",
		"method": "GET",
		"data":{"profileFirstName": profileFirstName, 
				"profilelastName": profilelastName, 
				"profileEmail": profileEmail,
				"profileAddress": profileAddress},
		"success":function(data){
			location.reload();
			// alert(data);

			

		}
	});
}



function editCartQuantity(id){

	$.ajax({
		"url":"partials/editCartQuantity.php",
		"method": "GET",
		"data":{"id":id},
		"success":function(data){
			$("#cartQuantity"+id).html(data);
		}
	});
}

function saveQuantity(id){
	var newValue = $("#newValue"+id).val();

	$.ajax({
		"url":"partials/saveQuantity.php",
		"method": "GET",
		"data":{"newValue":newValue ,"id":id},
		"success":function(data){
			location.reload();
		}
	})
}