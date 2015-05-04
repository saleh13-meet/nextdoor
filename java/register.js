// $(document).ready(function() {
// 	$("#submit").click(function(){
// 		var firstname1 = $("#firstname").val();
// 		var lastname1 = $("#lastname").val();
// 		var username1 = $("#username").val();
// 		var password1 = $("#password").val();
// 		var conpassword1 = $("#conpassword").val();
// 		var email1 = $("#email").val();
// 		var school1 = $("#school").val();
// 		if (firstname1 == "" || lastname1 == "" || username1 == "" || password1 == "" || conpassword1 == "" || email1 == "" || school1 == "") {
// 			alert("Please fill in all the fields!");
// 		}else{
// 			$.post("register1.php", {
// 				firstname: firstname1,
// 				lastname: lastname1,
// 				username: username1,
// 				password: password1,
// 				conpassword: conpassword1,
// 				email: email1,
// 				school: school1
// 			}, function(data){
// 				if (data == "uexist") {
// 					alert("Username already exist!");
// 					$("#username").val("");
// 				};
// 				if (data == "pnomatch") {
// 					alert("Password doesnt match!");
// 					$("#password").val("");
// 					$("#conpassword").val("");
// 				};
// 				if (data == "eexist") {
// 					alert("E-mail already exist!");
// 					$("#email").val("");
// 				};
// 				if (data == "thanks") {
// 					alert("Thanks for registering! Please Login...");
// 					window.location = 'index.php';
// 				};
// 			});
// 		};
// 	});
// });
$(document).ready(function() {
	$("#submit").click(function(){
		var firstname1 = $("#firstname").val();
		var lastname1 = $("#lastname").val();
		var username1 = $("#username").val();
		var password1 = $("#password").val();
		var conpassword1 = $("#conpassword").val();
		var email1 = $("#email").val();
		var school1 = $("#school").val();
		if (firstname1 == "" || lastname1 == "" || username1 == "" || password1 == "" || conpassword1 == "" || email1 == "" || school1 == "") {
			$(".username").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0"
			});
			$(".email").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0"
			});
			$(".password").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0"
			});
			$(".numbers").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0"
			});
			$(".wrong").css({
				"visibility" : "visible",
				"height" : "auto",
				"padding" : "10px 10px 10px 36px"
			});
			$(".wrong").effect("shake");
		}else{
			$.post("register1.php", {
				firstname: firstname1,
				lastname: lastname1,
				username: username1,
				password: password1,
				conpassword: conpassword1,
				email: email1,
				school: school1
			}, function(data){
				if (data == "numbers") {
					$(".wrong").css({
					"visibility" : "hidden",
					"height" : "0",
					"padding" : "0"
					});
					$(".username").css({
					"visibility" : "hidden",
					"height" : "0",
					"padding" : "0"
					});
					$(".email").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".password").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".numbers").css({
						"visibility" : "visible",
						"height" : "auto",
						"padding" : "10px 10px 10px 36px"
					});
					$(".numbers").effect("shake");
					$("#firstname").val("");
					$("#lastname").val("");
				};
				if (data == "uexist") {
					$(".wrong").css({
					"visibility" : "hidden",
					"height" : "0",
					"padding" : "0"
					});
					$(".email").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".password").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".numbers").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".username").css({
						"visibility" : "visible",
						"height" : "auto",
						"padding" : "10px 10px 10px 36px"
					});
					$(".username").effect("shake");
					$("#username").val("");
				};
				if (data == "pnomatch") {
					$(".wrong").css({
					"visibility" : "hidden",
					"height" : "0",
					"padding" : "0"
					});
					$(".numbers").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".email").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".username").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".password").css({
						"visibility" : "visible",
						"height" : "auto",
						"padding" : "10px 10px 10px 36px"
					});
					$(".password").effect("shake");
					$("#password").val("");
					$("#conpassword").val("");
				};
				if (data == "eexist") {
					$(".wrong").css({
					"visibility" : "hidden",
					"height" : "0",
					"padding" : "0"
					});
					$(".numbers").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".username").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".password").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".email").css({
						"visibility" : "visible",
						"height" : "auto",
						"padding" : "10px 10px 10px 36px"
					});
					$(".email").effect("shake");
					$("#email").val("");
				};
				if (data == "thanks") {
					$(".wrong").css({
					"visibility" : "hidden",
					"height" : "0",
					"padding" : "0"
					});
					$(".username").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".numbers").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".password").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".email").css({
						"visibility" : "hidden",
						"height" : "0",
						"padding" : "0"
					});
					$(".thanks").css({
						"visibility" : "visible",
						"height" : "auto",
						"padding" : "10px 10px 10px 36px"
					});
					$(".thanks").effect("shake");
					$(function(){
					   function redirect(){
					      window.location='index.php';
					   };
					   window.setTimeout( redirect, 2000 );
					});
				};
			});
		};
	});

	$("#register").keyup(function(event){
	    if(event.keyCode == 13){
	        $("#submit").click();
	    }
	});

});