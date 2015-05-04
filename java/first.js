$(document).ready(function() {
	x = 1;
	$( "#right" ).click(function(){
		if (x < 5) {
		 	$("#container_first").animate({
				marginLeft : "-=68.8%"
			}, 700);
		};
		x += 1;
	});

	// $( "#left" ).click(function() {
    // 	$("#container_first").animate({
	// 	marginLeft : "+=68.5%"
	// }, 2000);
	// });

	alert("Please fill in this basic information about yourself...");
	$("#formID").keyup(function(event){
		if(event.keyCode == 13){
			if(x < 4){
				$("#right").click();
			}
		}
	});

	$("#sub10").click(function(){
		var mobile = $("#mobile").val();
		var nickname = $("#nickname").val();
		var city = $("#city").val();
		var details = $("#details").val();
		$.post("first1.php", {
			mobile : mobile,
			nickname : nickname,
			city : city,
			details : details
		}, function(data){
			if(data == "ok"){
				alert("thanks");
				window.location='home.php';
			}else{
				alert("something went wrong!");
				window.location='first.php';
			}
		});
	});

});