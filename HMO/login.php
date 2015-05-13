<?php

include 'functions.php';

session_start();

connect();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

if ($count == 1) {
	$_SESSION['id'] = find_id($username);
	$_SESSION['username'] = $username;
	header("location:home.php");
}else{
	$page = $_COOKIE['page'];
	header("location:".$page."?username=".$username);
}

?>