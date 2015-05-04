$(document).ready(function(){
	$("#submit").click(function(){
		var username = $("#username").val();
		var password = $("#passwd").val();
		if (username == '') {
			$(".wrong").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0",
				"margin" : "0"
			});
			$(".password").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0",
				"margin" : "0"
			});
			$(".username").css({
				"visibility" : "visible",
				"height" : "auto",
				"padding" : "10px 10px 10px 36px",
				"margin" : "10px"
			});
			$(".username").effect("shake");
		}
		else{ if (password == '') {
			$(".wrong").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0",
				"margin" : "0"
			});
			$(".username").css({
				"visibility" : "hidden",
				"height" : "0",
				"padding" : "0",
				"margin" : "0"
			});
			$(".password").css({
				"visibility" : "visible",
				"height" : "auto",
				"padding" : "10px 10px 10px 36px",
				"margin" : "10px"
			});
			$(".password").effect("shake");
		}
		else{
			$.post("login.php", {
				username1: username,
				password1: password
			}, function(data){
				if (data == "authorized") {
					window.location = 'home.php';
				}
				else{
					if (data != "uorp") {
						alert("a confirmation code was sent to this email:\n"+data+"\nplease check your email");
					}else{
						$(".password").css({
							"visibility" : "hidden",
							"height" : "0",
							"padding" : "0",
							"margin" : "0"
						});
						$(".username").css({
							"visibility" : "hidden",
							"height" : "0",
							"padding" : "0",
							"margin" : "0"
						});
						$(".wrong").css({
							"visibility" : "visible",
							"height" : "auto",
							"padding" : "10px 10px 10px 36px",
							"margin" : "10px"
						});
						$("#passwd").val("");
						$(".wrong").effect("shake");
					};
				};
			});
		};};
	});

	$("#login").keyup(function(event){
	    if(event.keyCode == 13){
	        $("#submit").click();
	    }
	});

});