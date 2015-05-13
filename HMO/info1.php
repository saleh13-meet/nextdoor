<?php

include 'functions.php';
connect();

$id = $_POST['id'];
$ed_level = $_POST['ed_level'];
$bio = $_POST['bio'];

$sql = "INSERT INTO info(`id`, `ed_level`, `bio`) VALUES('$id', '$ed_level', '$bio')";
$result = mysql_query($sql)or die(mysql_error());

$sql2 = "UPDATE users SET info = 1 WHERE id = '$id' LIMIT 1";
$result2 = mysql_query($sql2);

if ($result && $result2) {
	echo 'ok';
}

?>