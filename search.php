<?php



	session_start();

	include 'functions.php';

	check_logged_in_and_active();

	$username = $_SESSION['username'];

	$id = $_SESSION['id'];

	$query = $_POST['query'];



	header2("index.css", True, "<a href='home.php'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "
		<link rel='stylesheet' media='screen and (max-width: 600px)' href='css/index-600.css' />
		<link rel='stylesheet' media='screen and (max-width: 1024px)' href='css/index-1024.css' />", $query);



	$sql = "SELECT * FROM users WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%' ORDER BY firstname ASC";

	$result = mysql_query($sql);



?>

		<div id="results">

			<?php



				$x = 0;



				while ($s = mysql_fetch_array($result)) {

					echo "<p id='user'><a href='profile.php?id=".$s['id']."'>";

					if ($s['img'] == "default.jpeg") {

						echo "<img id='dim' src=images/profile/".$s['img']."><br>".$s['firstname']." ".$s['lastname']."<br>";

					}

					else {echo "<img id='dim' src=images/profile/".$s['id']."/".$s['img']."><br>".$s['firstname']." ".$s['lastname'];}

					echo "</p></a>";

					$x++;

				}

				echo "<br><br>search result ".$x;



			?>

		</div>

	</body>

</html>