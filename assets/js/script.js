
$('.backtotop').click(function(e){

	var linkHref = $(this).attr('href');

	$('html, body').animate({
		scrollTop: $(linkHref).offset().top
	},800);

	e.preventDefault();
})






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
