<html>
<head>
	<title>Help Me Out</title>
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<a class="navbar-brand" href="Index.php">
            		<img alt="Brand" src="images/logo.png" height="20px">
            	</a>
                <p class="navbar-text">Welcome</p>
            </div>
            <div class="collapse navbar-collapse">
            	<ul class="nav navbar-nav">
                	<li class="active"><a href="#">&nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span class="hidden-sm">Register</span><span class="sr-only">(current)</span></a></li>
                    <li><a href="about.php">&nbsp;<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <span class="hidden-sm">About Help Me Out</span> </a></li>
                    <li><a href="contact.php"><span class="
glyphicon glyphicon-envelope"></span> <span class="hidden-md hidden-sm">Contact Help Me Out</span></a></li>
                </ul>
            	<form class="navbar-form navbar-right" role="login" action="login.php" method="POST">
        			<div class="form-group">
        				<?php
        				if (isset($_GET['username'])) {
        					$username = $_GET['username'];
        					echo '<input id="user" type="text" class="form-control" value="'.$username.'" name="username" pattern=".{6,}" required=""   required title="6 characters minimum" style="margin-right: 4px;">';
        					echo '<input id="pass" type="password" class="form-control" autofocus placeholder="Password" name="password" pattern=".{6,}" required=""   required title="6 characters minimum"><span style="margin-left:4px;"class="glyphicon glyphicon-remove-sign btn btn-danger" id="nohover"></span>';
        				}else{
        					if (isset($_GET['user'])) {
        						$username = $_GET['user'];
        						echo '<input id="user" type="text" class="form-control" value="'.$username.'" name="username" pattern=".{6,}" required=""   required title="6 characters minimum" style="margin-right: 4px;">';
        						echo '<input id="pass" type="password" class="form-control" autofocus placeholder="Password" name="password" pattern=".{6,}" required=""   required title="6 characters minimum">';
        					}else{
        						echo '<input id="user" type="text" class="form-control" placeholder="Username" name="username" pattern=".{6,}" required=""   required title="6 characters minimum" style="margin-right: 4px;">';
        						echo '<input id="pass" type="password" class="form-control" placeholder="Password" name="password" pattern=".{6,}" required=""   required title="6 characters minimum">';	
        					}
        				}
        				?>
        			</div>
        			<button id="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in" style="font-size:20px; padding-right:4px;"></span></button>
      			</form>
            </div>
        </div>
	</div>
    <div class="container" style="margin-top:110px;">
    	<div class="jumbotron">
  			<h2>Please fill in all the fields to register  <span class="glyphicon glyphicon-check" style="top:4px;"></span>  !</h2>
  			<form id="form" method="POST" action="register.php">
	  			<input type="text" autocomplete="off" class="form-control" required="" id="first" placeholder="Firstname" name="firstname" onkeyup="firstnameCheck()" style="width:40%;margin-bottom: 15px;display:inline-block;margin-right:14px;"><div id="status6" style="display:inline-block"></div>
	            <div class='sep2' style="display:block; width:5px;"></div>
	            <input type="text" autocomplete="off" class="form-control" required="" id="last" placeholder="Lastname" name="lastname" onkeyup="lastnameCheck()" style="width:40%;margin-bottom: 15px;display:inline-block;margin-right:14px;"><div id="status0" style="display:inline-block"></div>
	            <div class='sep2' autocomplete="off" style="display:block; width:5px;"></div>
	            <input type="text" autocomplete="off" class="form-control" required="" id="username" placeholder="Username" name="username" onkeyup="checkUsername()" style="display:inline-block;width:40%;margin-bottom: 15px;margin-right:14px;"><div id="status1" style="display:inline-block"></div>
	            <div class='sep2' style="display:block; width:5px;"></div>
	            <input type="password" class="form-control" required="" id="password" placeholder="Password" name="password" onkeyup="passw()" style="width:40%;margin-bottom: 15px;display:inline-block;margin-right:14px;"><div id="status2" style="display:inline-block"></div>
	            <div class='sep2' style="display:block; width:5px;"></div>
	            <input type="password" class="form-control" required="" id="repass" placeholder="Repeat password" name="rpassword" onkeyup="match()" style="display:inline-block;width:40%;margin-bottom: 15px;margin-right:14px;"><div id="status3" style="display:inline-block"></div>
	            <div class='sep2' style="display:block; width:5px;"></div>
	            <input type="text" autocomplete="off" class="form-control" required="" id="email" placeholder="E-mail" name="email" onkeyup="emailvalid()" style="display:inline-block;width:40%;margin-bottom: 15px;margin-right:14px;"><div id="status4" style="display:inline-block; margin-right: 15px;"></div><div id="status5" style="display:inline-block"></div>
	  			<select class="form-control" style="width:40%;margin-bottom: 15px;display:block;margin-right:14px;" name="age">
	  				<option value="" disabled>Age</option>
				    <?php
				    $x = 12;
				    while ($x <= 90) {
				    	if ($x != 17) {
				    		echo "<option value='".$x."'>".$x."</option>";
				    	}else{
				    		echo "<option value='".$x."' selected>".$x."</option>";
				    	}
				  	$x ++;
				    }
				    ?>
				</select>
	  			<p><input type="submit" value="Register" class="btn btn-primary btn-lg" role="submit"></p>
	  		</form>
		</div>
	</div>
<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">

function checkUsername() {
	var usr = $("#username").val();
	if (usr.length >= 6){
		if(/^[a-zA-Z0-9]*$/.test(usr) == false) {
    		$("#status1").html('<span class="btn btn-warning" id="nohover"><span class="glyphicon glyphicon-alert"></span> Username must contain only letters and numbers!</span>');
		}else{
			$(".sep").show();
    		$("#status1").html('<img src="images/loader.gif">');
			var datastr = "username="+usr;
			jQuery.ajax({
				url: "check.php",
				type: "POST",
				data: datastr,
				success: function(data){
					$(".sep").hide();
					if (data == 'no'){
						$("#status1").html('<span class="btn btn-danger" id="nohover"><span class="glyphicon glyphicon-remove"></span> Username not available!</span>');
					}else{
						$("#status1").html('<span class="btn btn-success" id="nohover2"><span class="glyphicon glyphicon-ok"></span> Username available!</span>');	
					}
				}	
			});
		}
	}else{
		$(".sep").hide();
		$("#status1").html('<span class="btn btn-info" id="nohover"><span class="glyphicon glyphicon-exclamation-sign"></span> Username must be atleast 6 characters long</span>');
	}
};

function passw() {
	var pass = $("#password").val();
	if (pass.length >= 6){
		$("#status2").html('<span class="btn btn-success" id="nohover2"><span class="glyphicon glyphicon-ok"></span> Password available!</span>');
		match();
	}else{
		$("#status2").html('<span class="btn btn-info" id="nohover"><span class="glyphicon glyphicon-exclamation-sign"></span> Password must be atleast 6 characters long</span>');
	}
};

function match() {
	var pass = $("#password").val();
	var repass = $("#repass").val();
	if (repass == pass) {
		$("#status3").show();
		$("#status3").html('<span class="btn btn-success" id="nohover2"><span class="glyphicon glyphicon-ok"></span> Password match!</span>');
	}else{
		$("#status3").show();
		$("#status3").html('<span class="btn btn-danger" id="nohover"><span class="glyphicon glyphicon-cancel"></span> Password doesn\'t match!</span>');
	}
}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}

function emailvalid(){
	var email = $("#email").val();
	if (isValidEmailAddress(email)) {
		var datastr = "email="+email;
		jQuery.ajax({
			url: "check.php",
			type: "POST",
			data: datastr,
			success: function(data){
				$(".sep").hide();
				if (data == 'no'){
					$("#status4").html('<span class="btn btn-danger" id="nohover"><span class="glyphicon glyphicon-remove"></span> Email is already in use!</span>');
				}else{
					$("#status4").html('<span class="btn btn-success" id="nohover2"><span class="glyphicon glyphicon-ok"></span> Good email!</span>');	
				}
			}	
		});
		if ($("#email").focusout()) {
			$("#status5").html('<span class="btn btn-warning" id="nohover"><span class="glyphicon glyphicon-inbox"></span> Verification Link will be sent to this email address!</span>');
		}
	}
	else{
		$("#status4").html('<span class="btn btn-danger" id="nohover"><span class="glyphicon glyphicon-cancel"></span> Email format not supported!</span>');
	}
}

function firstnameCheck(){
	var first = $("#first").val();
	if(first.length >= 3){
		if(/^[a-zA-Z]*$/.test(first) == false) {
			$("#status6").html('<span class="btn btn-warning" id="nohover"><span class="glyphicon glyphicon-exclamation-sign"></span> Your firstname must contain only letters!</span>');
		}else{
			$("#status6").html('<span class="btn btn-success" id="nohover2"><span class="glyphicon glyphicon-ok"></span>  Welcome '+first+'!</span>');
		}
	}else{
		$("#status6").html('<span class="btn btn-warning" id="nohover"><span class="glyphicon glyphicon-exclamation-sign"></span> Your name must be atleast 3 characters!</span>');
	}
}

function lastnameCheck(){
	var last = $("#last").val();
	if(last.length >= 3){
		if(/^[a-zA-Z]*$/.test(last) == false) {
			$("#status0").html('<span class="btn btn-warning" id="nohover"><span class="glyphicon glyphicon-exclamation-sign"></span> Your lastname must contain only letters!</span>');
		}else{
			$("#status0").html('<span class="btn btn-success" id="nohover2"><span class="glyphicon glyphicon-ok"></span>  Mr.'+last+'!</span>');
		}
	}else{
		$("#status0").html('<span class="btn btn-warning" id="nohover"><span class="glyphicon glyphicon-exclamation-sign"></span> Your name must be atleast 3 characters!</span>');
	}
}

$("#form").submit(function() {
	if ($("#status0").children().attr("id") == 'nohover2' && $("#status1").children().attr("id") == 'nohover2' && $("#status2").children().attr("id") == 'nohover2' && $("#status3").children().attr("id") == 'nohover2' && $("#status4").children().attr("id") == 'nohover2' && $("#status6").children().attr("id") == 'nohover2') {
		return true; 
	}else{
		alert('You must see six green boxes!');
		return false;
	}
});

$("#submit").click(function() {
    document.cookie = "page=Index.php; 10;";
});

</script>
</body>
</html>