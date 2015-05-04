<?php



	session_start();

	include 'functions.php';

	check_logged_in_and_active();

	$username = $_SESSION['username'];

	$id = $_SESSION['id'];

	$query = $_POST['query'];



	header2("index.css", True, "<a href='home.php'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "
		<link rel='stylesheet' media='screen and (max-width: 600px)' href='css/index-600.css' />
		<link rel='stylesheet' media='screen and (max-width: 1024px)' href='css/index-1024.css' />");



	$sql = "SELECT * FROM users WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%' ORDER BY firstname ASC";

	$result = mysql_query($sql);



?>

		<div id="results">

			<?php



				$x = 0;



				while ($s = mysql_fetch_array($result)) {

					echo "<p id='user'>";

					if ($s['img'] == "default.jpeg") {

						echo "<img id='dim' src=images/profile/".$s['img']."><br><a href='profile.php?id=".$s['id']."'>".$s['firstname']." ".$s['lastname']."</a><br>";

					}

					else {echo "<img id='dim' src=images/profile/".$s['id']."/".$s['img']."><br><a href='profile.php?id=".$s['id']."'>".$s['firstname']." ".$s['lastname'];}

					echo "</p>";

					$x++;

				}

				echo "<br><br>search result ".$x;



			?>

		</div>

	</body>

</html>