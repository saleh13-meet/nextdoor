<?php

	session_start();
	include 'functions.php';
	check_logged_in_and_active();
	$username = $_SESSION['username'];
	$id = $_SESSION['id'];

	if($_SESSION['user'] == true){
		echo "<script>alert('sorry this user doesn\'t exist');</script>";
		$_SESSION['user'] = false;
	}

	header2("index.css", True, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/home.js'></script>
		<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>");

?>
		<div id="category">
			<h1>Events</h1>
			<br><br>
			<br><br>
			<br><br>
			<br><br>
			<br><br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			No events yet :(
		</div>
	</body>
</html>