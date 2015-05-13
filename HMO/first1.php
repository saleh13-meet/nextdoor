<?php

include 'functions.php';
connect();

$id = $_POST['id'];
$kind = $_POST['kind'];

$sql = "UPDATE users SET kind = '$kind' WHERE id = '$id' LIMIT 1";
$result = mysql_query($sql)or die(mysql_error());

if ($result) {
	echo 'ok';
}

?>