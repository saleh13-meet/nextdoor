<?php

include 'functions.php';

session_start();

header1("index.css", False, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
	<script type='text/javascript' src='java/login.js'></script>
	<script type='text/javascript' src='java/jquery-ui.js'></script>");

if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
	if(check_logged_in_and_active()){
		header("location:home.php");
	}
}

?>

		<div id="container">
			<form method="post" id="login" >
				<div class="alert-box error wrong"><span>error: </span>Wrong Username or Password</div>
				<div class="alert-box error username"><span>error: </span>Please fill in username</div>
				<div class="alert-box error password"><span>error: </span>Please fill in Password</div>
			 <ul>
				 <li>
					 <label for="username">Username : </label>
					 <input type="text" id="username" maxlength="64" required="" autofocus name="username">
				 </li>
				
				 <li>
					 <label for="password">Password : </label>
					 <input type="password" id="passwd" maxlength="64" required="" name="password">
					 <span id="result"></span>
				 </li>

				<li class="buttons">
					 <input id="submit" type="button" value="Login">
					 <!-- <input id="submit" type="submit" value="Login"> -->
					 <!-- <input type="button" value="Login" class="login"> -->
					 <a href="register.php"><input type="button" value="Register" class="register"></a>
				</li>
			</ul>
		</div>
		<div style="display: none;"><a href="HMO/index.php">HMO</a></div>
	</body>
</html>