<?php

include 'functions.php';

check_logged_in_and_active();

connect("u839756306_saleh");

$id = $_SESSION['id'];

$sql = "DELETE FROM users WHERE id = '$id' LIMIT 1";
$sql2 = "DELETE FROM `info` WHERE id = '$id' LIMIT 1";
$sql3 = "DELETE FROM friends WHERE user1 = '$id' OR user2 = '$id'";

$result = mysql_query($sql)or die(mysql_error());
$result2 = mysql_query($sql2)or die(mysql_error());
$result3 = mysql_query($sql3)or die(mysql_error());

echo $id;


?>