$(document).ready(function(){

    $("#productImg"+"id").hover(function(){
        $("#productName"+"id").stop().animate({"opacity": "1"}, "slow");
        }, function(){
        $("#productName"+"id").stop().animate({"opacity": "0"}, "slow");
    });
});


