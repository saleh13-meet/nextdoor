<?php

include 'functions.php';

check_logged_in_and_active()

connect("u839756306_saleh");

$id = $_POST['id'];

$sql = "DELETE * FROM users WHERE id = '$id' LIMIT 1";
$sql2 = "DELETE * FROM info WHERE id = '$id' LIMIT 1";
$sql3 = "DELETE * FROM friends WHERE user1 = '$id' OR user2 = '$id'";
$result = mysql_query($sql);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);

header("location:logout.php");

?>