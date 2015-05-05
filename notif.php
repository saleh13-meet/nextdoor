<?php

	include 'functions.php';

	session_start();

	connect("u839756306_saleh");

	$id = $_SESSION['id'];

	header2("index.css", True, "<a href='home.php'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "
		<link rel='stylesheet' media='screen and (max-width: 600px)' href='css/index-600.css' />");

	$sql = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0";
	$sql2 = "SELECT * FROM friends WHERE  user1 = '$id' AND accepted = 1 AND seen2 = 0";
	$result = mysql_query($sql);
	$result2 = mysql_query($sql2);

	$x = notif();

?>

<div id="container1">
	<?php

		while ($data2 = mysql_fetch_array($result2)) {
			$id2 = $data2['user2'];
			$sqlz = "SELECT * FROM users WHERE id = '$id2'";
			$resultz = mysql_query($sqlz);
			while ($data3 = mysql_fetch_array($resultz)) {
				if ($data3['img'] == "default.jpeg") {
						echo "<img id='dim' src=images/profile/".$data3['img']."><br>";
				}else {echo "<img id='dim' src=images/profile/".$data3['id']."/".$data3['img']."><br>";}
				echo "<p><a href='profile.php?id=".$data3['id']."'>".$data3['firstname']." ".$data3['lastname']."</a></p>accepted your friend request... <a href='ok.php?id=".$data3['id']."'>OK!</a><br><br>";
			}
		}
		while ($data = mysql_fetch_array($result)) {
			$id = $data['user1'];
			$sql2 = "SELECT * FROM users WHERE id = '$id'";
			$result2 = mysql_query($sql2);
			while ($data2 = mysql_fetch_array($result2)) {
				if ($data2['img'] == "default.jpeg") {
						echo "<img id='dim' src=images/profile/".$data2['img']."><br>";
				}else {echo "<img id='dim' src=images/profile/".$data2['id']."/".$data2['img']."><br>";}
				echo "<p><a href='profile.php?id=".$data2['id']."'>".$data2['firstname']." ".$data2['lastname']."</a></p>

				<a href='acc.php?user1=".$data2['id']."'>Accept</a> / <a href='dec.php?user1=".$data2['id']."'>Decline</a><br><br>

				";
				$ids = $_SESSION['id'];
				$query = "UPDATE friends SET seen = 1 WHERE user2 = '$ids'";
				mysql_query($query);
			}
		}
		if ($x == 0) {
			echo "No New Notifications<br>";
		}
	?>
</div>

</body>
</html>