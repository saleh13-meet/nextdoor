<?php

	include 'functions.php';

	connect("u839756306_saleh");

	session_start();

	$id1 = $_SESSION['id'];
	$id2 = $_POST['user2'];
	$time = date('jS \of F Y h:i:s A');
	// echo $id1;
	// echo $id2;
	// echo $time;

	$sql = "INSERT INTO `friends`(`id`, `user1`, `user2`, `date`, `accepted`) VALUES ('', '$id1', '$id2', '$time', '0')";
	$result = mysql_query($sql);
	header('location:profile.php?id='.$id2);

?>