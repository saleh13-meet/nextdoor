<?php

	// include 'functions.php';
	// connect("NextDoor");

	// if (isset($_POST['submit'])) {
	// 	$firstname = $_POST['firstname'];
	// 	$lastname = $_POST['lastname'];
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// 	$conpassword = $_POST['conpassword'];
	// 	$email = $_POST['email'];
	// 	$school = $_POST['school'];

	// 	if($password == $conpassword){
	// 		$sql = "SELECT * FROM users WHERE username = '$username'";
	// 		$result = mysql_query($sql)or die(mysql_error());
	// 		$count = mysql_num_rows($result);

	// 		if($count == 1){
	// 			echo "<script>alert('Username already exist!'); window.location.href='register.php';</script>";
	// 		}

	// 		$query = "SELECT * FROM users WHERE email = '$email'";
	// 		$res = mysql_query($query)or die(mysql_error());
	// 		$counts = mysql_num_rows($res);

	// 		if($counts == 1){
	// 			echo "secound if ";
	// 			echo "<script>alert('Email already exist!'); window.location.href='register.php';</script>";
	// 		}

	// 		$sql = "INSERT INTO users(`id`, `firstname`, `lastname`, `username`, `password`, `email`, `school_id`, `active`, `img`) 
	// 			VALUES('', '$firstname', '$lastname', '$username', '$password', '$email', '$school', '1', 'default.jpeg')";
	// 		mysql_query($sql);
	// 		echo "<script>alert('Thanks!'); window.location.href='index.php';</script>";
	// 	}
	// 	else{
	// 		echo "<script>alert('Password doesn\'t match!'); </script>";
	// 	}
	// }

?>

<html>
	<head>
		<title>NextDoor</title>
		<!-- <link href='http://fonts.googleapis.com/css?family=Alex+Brush&subset=latin,latin-ext' rel='stylesheet' type='text/css'> -->
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/jquery-ui.js'></script>
		<script type='text/javascript' src='java/register.js'></script>
	</head>
	<body>
		<header>
			<div id="header">
				<a href="index.php"><img src='images/Logo_2.jpg' width='293' height='63'></a>
			</div>
		</header>
		<div id="register-wrapper">
	        <form method="post" id="register">

	        	<div class="alert-box error numbers"><span>error: </span>Your name must contain letters!</div>
				<div class="alert-box error wrong"><span>error: </span>Please fill in all the fields!</div>
				<div class="alert-box error password"><span>error: </span>Password doesnt match!</div>
				<div class="alert-box error username"><span>error: </span>Username already exist!</div>
				<div class="alert-box error email"><span>error: </span>Email already exist!</div>
				<div class="alert-box success thanks"><span>success: </span>Thanks for registering! Please Login...</div>

				<ul>
					<li>
						<label for="firstname">firstname : </label>
						<input class="in" type="text" id="firstname" maxlength="64" required="" autofocus="" name="firstname">
					</li>

					<li>
						<label for="lastname">lastname : </label>
						<input class="in" type="text" id="lastname" maxlength="64" required="" autofocus="" name="lastname">
					</li>

					<li>
						<label for="username">Username : </label>
						<input class="in" type="text" id="username" maxlength="64" required="" autofocus="" name="username">
					</li>
					
					<li>
						<label for="password">Password : </label>
						<input class="in" type="password" id="password" maxlength="128" required="" name="password">
					</li>
						
					<li>
						<label for="conpassword">Confirm Password : </label>
						<input class="in" type="password" id="conpassword" maxlength="128" required="" name="conpassword">
					</li>

					<li>
						<label for="email">E-mail : </label><br>
						<input class="in" type="email" id="email" maxlength="128" required="" autofocus="" name="email">
					</li>

					<li>
						<label for="school">School : </label><br>
						<input class="in" type="text" id="school" maxlength="3" required="" autofocus="" name="school">
					</li>

					<li class="buttonss">
						<input id="submit" type="button" value="Register">
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>