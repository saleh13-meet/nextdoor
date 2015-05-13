<?php

include "functions.php";

connect();

if (isset($_POST['username'])) {
	$username = $_POST['username'];

	$sql = "SELECT * FROM `users` WHERE `username` = '$username'";
	$query = mysql_query($sql)or die(mysql_error());
	$count = mysql_fetch_row($query)or die(mysql_error());
	$user_count = $count[0];

	if ($user_count >= 1){
		echo "no";
	}else{
		exit();
	}
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];

	$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
	$query = mysql_query($sql)or die(mysql_error());
	$count = mysql_fetch_row($query)or die(mysql_error());
	$user_count = $count[0];

	if ($user_count >= 1){
		echo "no";
	}else{
		exit();
	}
}

?>