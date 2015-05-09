<?php

include 'functions.php';

session_start();

connect("u839756306_saleh");

check_logged_in_and_active();

$id = $_SESSION['id'];



header2("index.css", True, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/friends.js'></script>
		<script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>", "");
echo "<br><Br><br><br>";


?>
<center>
<input autocomplete='off' placeholder='Search Friends' type='text' name='friends' id='friends' onkeyup='findFriend()'>
<br>
<ul id='friends_list'></ul>
</center>


<?php

if (isset($_POST['friends'])) {
	$friends = $_POST['friends'];
	my_friends_search($friends);
}else{
	my_friends($id);
}

?>