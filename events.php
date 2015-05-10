<?php

session_start();
include 'functions.php';
check_logged_in_and_active();
$username = $_SESSION['username'];
$id = $_SESSION['id'];

header2("index.css", True, False, "<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script src='java/events.js'></script>
		<link rel='stylesheet' href='css/jquery-dropdown.css'>
		<script type='text/javascript' src='java/jquery-dropdown.js'></script>", "");

?>

<div id="create">
	<p class="start">Get Started NOW</p>
	<div class="buttons2">
		<button class="event-button" id="sports">
			Sports
		</button>
		<div class="spa"></div>
		<button class="event-button" id="cooking">
			Cooking
		</button>
		<div class="spa"></div>
		<button class="event-button" id="computers">
			Computers
		</button>
	</div>
</div>

<div id="events-container">

<?php

if (isset($_POST['cooking']) AND $_POST['cooking'] == "1") {
	$x = 1;

	while ($x < 4) {
		echo '
				<div id="event">
					<label class="event-name">cooking</label>
				</div>
			';
		$x ++;
	}
}else{
	$x = 1;

	while ($x < 6) {
		echo '
				<div id="event">
					<label class="event-name">sports</label>
					<label class="drop" data-jq-dropdown="#jq-dropdown-1"> options </label>
				</div>
			';
		$x ++;
	}
}

?>

</div>

<div id="jq-dropdown-1" class="jq-dropdown jq-dropdown-tip jq-dropdown-anchor-right" style="display: block; left: 645.5px; top: 1321.265625px;">
    <ul class="jq-dropdown-menu">
        <li><a href="#1">Edit</a></li>
        <li><a href="#2">Delete</a></li>
        <li class="jq-dropdown-divider"></li>
        <li><a href="#3">Tell A Friend</a></li>
</div>

</body>
</html>