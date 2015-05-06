<?php

include 'functions.php';

session_start();

check_logged_in_and_active();

connect("u839756306_saleh");


check_logged_in_and_active();

$id = $_SESSION['id'];



header2("index.css", True, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/home.js'></script>
		<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>");
echo "<br><Br><br><br>";

my_friends($id);


?>