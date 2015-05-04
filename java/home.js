$(document).ready(function(){
	function handler1() {
	    $(this).animate({
			margin : "0"
		}, 2000);
		$("h1").animate({
			paddingTop : "70px"
		}, 1000)
		.animate({
			width : "100%"
		}, 1000);
		$(this).css({
			"cursor" : "default"
		});
	    $(this).one("click", handler2);
	}

	function handler2() {
	    $(this).animate({
	        marginLeft : "-220px"
	    }, 2000);
	    $("h1").animate({
			width : "80px"
		}, 1000)
		.animate({
			paddingTop : "250px"
		}, 1000);
		$(this).css({
			"cursor" : "pointer"
		});
	    $(this).one("click", handler1);
	}
	$("#category").one("click", handler1);
});