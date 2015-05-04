<?php

	session_start();
	include 'functions.php';
	connect("u839756306_saleh");

	$username = $_POST['username1'];
	$password = $_POST['password1'];

	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND active = 1 LIMIT 1";
	$result = mysql_query($sql)or die(mysql_error());

	if(mysql_num_rows($result) == 1){
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			echo "authorized";
	}else{
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND active = 0 LIMIT 1";
		$result = mysql_query($sql);

		if (mysql_num_rows($result) == 1) {
			$data = mysql_fetch_array($result);
			echo $data['email'];
		}else{
			echo "uorp";
		}
	}

?>