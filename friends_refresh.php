<?php

	include 'functions.php';

	connect("u839756306_saleh");

	$keyword = $_POST['friend'];
	// $sql = "SELECT * FROM users WHERE firstname LIKE '$keyword' OR lastname LIKE '$keyword' LIMIT";
	// $result = mysql_query($sql)or die(mysql_error());
	// for($i = 0; $array2[$i] = mysql_fetch_assoc($result); $i++);
	// array_pop($array2);

	session_start();

	$id = $_SESSION['id'];

	my_friends_search($keyword, $id);

?>