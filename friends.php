<?php

include 'functions.php';

session_start();


check_logged_in_and_active();

$id = $_SESSION['id'];

$friends_arr = my_friends($id);

connect("u839756306_saleh");

header2("index.css", True, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/home.js'></script>
		<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>");
echo "<br><Br><br><br>";


for ($i=0; $i < count($friends_arr); $i++) {
	echo "user1<br>";
	$friend = $friends_arr[$i]['user1'];
	if ($friend == $id) {
		$friend = $friends_arr[$i]['user2'];
	}

	$sql = "SELECT * from users WHERE id = '$friend'";
	$result = mysql_query($sql)or die(mysql_error());
	$data = mysql_fetch_array($result);
	$friend = $data['firstname'] . " " . $data['lastname'];

	echo $friend;
	echo "<br>";
}

?>