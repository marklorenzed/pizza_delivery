



// Hover functions for products
function showName(id){
    	// $("#productName" + id).stop().animate({"opacity": "1"}, "slow");
    	$("#productName"+id).css("visibility", "visible");
    	$("#product"+id).css("background-color","black");
    	$("#productImg"+id).css("opacity","0.3");
    	$("#product"+id).css("transition","0.3s");

    }
function hideName(id){
    	// $("#productName" + id).stop().animate({"opacity": "0"}, "slow");
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
			alert(data)
			
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