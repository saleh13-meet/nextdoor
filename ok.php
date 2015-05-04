<?php

include 'functions.php';
connect("u839756306_saleh");

session_start();

$id = $_SESSION['id'];
$id2 = $_GET['id'];

$sql = "UPDATE friends SET seen2 = 1 WHERE user1 = '$id' AND user2 = '$id2'";
$result = mysql_query($sql);

if ($result) {
	echo "<script>window.location.href='notif.php';</script>";
}else {
	echo "didnt work, something went wrong";
	die();
}

?>