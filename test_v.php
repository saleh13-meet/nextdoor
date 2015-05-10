<?php

mysql_connect("localhost", "root", "");
mysql_select_db("nextdoor");

$id = $_GET['id'];

$sql = "SELECT id,firstname, lastname FROM users WHERE id = '$id'";

$result = mysql_query($sql);

while ($data = mysql_fetch_assoc($result)) {
	echo $data['firstname']. " " .$data['lastname']. "<br>";
}

?>