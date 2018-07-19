
$('.backtotop').click(function (e){

	var linkHref = $(this).attr('href');

	$('html, body').animate({
		scrollTop: $(linkHref).offset().top
	},800);

	e.preventDefault();
});


var cartCounter = $(".counter").text();

if(cartCounter == 0){
	$(".counterWrapper").css("visibility", "hidden");
}



	// Hover functions for products

function showName(id){
    	
    	$("#productName"+id).css("visibility", "visible");
    	$("#product"+id).css("background-color","black");
    	$("#productImg"+id).css("opacity","0.3");
    	$("#product"+id).css("border-radius","20px");
    	$("#product"+id).css("transition","0.3s ease all");

    }
function hideName(id){

    	$("#productName"+id).css("visibility", "hidden");
    	$("#product"+id).css("background-color","#eee");
    	$("#product"+id).css("border-radius","20px");
    	$("#productImg"+id).css("opacity","1");  


    }




function register(){

	var usernameReg = $("#usernameReg").val();
	var firstNameReg = $("#firstNameReg").val();
	var lastNameReg = $("#lastNameReg").val();
	var lastNameReg = $("#lastNameReg").val();
	var emailReg = $("#emailReg").val();
	var addressReg = $("#addressReg").val();
	var passReg = $("#passReg").val();
	var cpassReg = $("#cpassReg").val();



	$.ajax({
		"url":"partials/registerUser.php",
		"data": {"usernameReg":usernameReg,
				 "firstNameReg":firstNameReg,
				 "lastNameReg":lastNameReg,
				 "emailReg":emailReg,
				 "addressReg":addressReg,
				 "passReg":passReg,
				 "cpassReg":cpassReg,
				},
		"type": "POST",
		"success": function(data){

			var str = data;
			var spaceChar = str.indexOf(" ");

			var reqstr = str.substring(0,spaceChar);
		
			if(reqstr != "<div"){
				$("#errorReg").html(data);
			}
			else
			{	
				$("#registerWrapper").html(data);
				
			}

		}
	});
}




function addToCart(id){
	
	var quantity = $("#quantity"+id).val();
	var size = $("#size"+id+" option:selected").text();
	var crust = $("#crust"+id+" option:selected").text();
    if (quantity > 0){
         $.ajax({
		"url":"partials/addToCart.php",
		"data": {"quantity":quantity, 
				"id":id,
				"size": size,
				"crust":crust
				},
		//throws to addToCart.php the ID of item selected as well as the quantity
		"type": "POST",
		"success": function(data){
			// location.reload();
		
			var obj = JSON.parse(data);

			$("#body"+id).html(obj.message);

			$(".counter").html(obj.totalQty);
			
		  }
	   });
      	  
    }
    else
    {
       $(".quantityError").html("*Please input quantity");
    }
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

			$("#showRefno").html(data);
			// alert(data);

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

function orderStatusUpdate(id){
	var status = $("#status"+id).text();
	$.ajax({
		"url":"partials/editOrderStatusColumn.php",
		"method": "GET",
		"data":{"status": status,
				"id":id},
		"success":function(data){
			$("#status"+id).html(data);
		}
	});
}
function saveOrderStatus(id){
	var newStatus = $("#orderUpdate"+id+" option:selected").text();
	// alert(newStatus);
	$.ajax({
		"url":"partials/saveOrderStatus.php",
		"method": "GET",
		"data":{"newStatus":newStatus ,"id":id},
		"success":function(data){
			location.reload();
			// alert(data);
		}
	})
}

function deleteOrder(id){
	$.ajax({
		"url":"partials/deleteOrder.php",
		"method": "GET",
		"data":{"id":id},
		"success":function(data){
			location.reload();
			// alert(data);
		}
	})

}

function emptyCart(){
	$.ajax({
		"url":"partials/emptyCart.php",
		"success":function(data){
			location.reload();
		}
	});
}

$(document).ready( function() {

	$(window).scroll(function(){
		if($(window).scrollTop() >= 100){

			$('.head').addClass('scrolled');
			$('.backtotop').addClass('scrolled');
			$(".categoriesWrapper").css("margin-top", "50px");
		}
		else
		{
			$('.head').removeClass('scrolled');
			$('.backtotop').removeClass('scrolled');
			$(".categoriesWrapper").css("margin-top", "100px");
		}

	});



});

function redirect(category){
	var category = category;

	location.replace("index.php");
	
}