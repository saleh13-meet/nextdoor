<?php

	include 'functions.php';
	connect("u839756306_saleh");
	session_start();
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysql_query($sql);
	while ($data = mysql_fetch_array($result)) {
		$id = $data['id'];
	}
	$mobile = $_POST['mobile'];
	$nickname = $_POST['nickname'];
	$city = $_POST['city'];
	$details = str_replace("\n", "<br>", $_POST['details']);

	// $sql = "SELECT * FROM users WHERE id = '$id'";
	// $result = mysql_query($sql);
	// if ($result) {
		// $sql2 = "UPDATE `info` SET `mobile`=$mobile,`details`=$details,`nickname`=$nickname,`city`=$city WHERE id = '$id";
	// }else{
		$sql2 = "INSERT INTO `info`(`id`, `mobile`, `nickname`, `city`, `details`) VALUES('$id', '$mobile', '$nickname', '$city', '$details')";
	// }
	$result2 = mysql_query($sql2);
	if ($result2) {
		echo "ok";
		$sql3 = "UPDATE users SET `details` = 1 WHERE id = '$id' LIMIT 1";
		mysql_query($sql3);
	}else{echo "<br>not ok";}

?>