<?php

include 'functions.php';

session_start();

connect("u839756306_saleh");

$id = $_SESSION['id'];

$id2 = $_GET['user1'];

$sql = "DELETE FROM friends WHERE user1 = '$id2' AND user2 = '$id' LIMIT 1";

$result = mysql_query($sql);

if ($result) {
	header("location:notif.php");
}

?>