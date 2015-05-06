<?php

include 'functions.php';

check_logged_in_and_active();

connect("u839756306_saleh");

session_start();

$id = $_SESSION['id'];

if (isset($_POST['nickname'])) {
	$nickname = $_POST['nickname'];
	$sql = "UPDATE info SET nickname = '$nickname' WHERE id = '$id' LIMIT 1";
	$result = mysql_query($sql);
}

if (isset($_POST['city'])) {
	$city = $_POST['city'];
	$sql = "UPDATE info SET city = '$city' WHERE id = '$id' LIMIT 1";
	$result = mysql_query($sql);
}

if (isset($_POST['details'])) {
	$details = $_POST['details'];
	$sql = "UPDATE info SET details = '$details' WHERE id = '$id' LIMIT 1";
	$result = mysql_query($sql);
}

?>