<?php
	
	function connect($db)
	{
		$host = "127.9.71.2";
		$user = "adminzvReRTi";
		$pass = "UMlNFhIQkrJF";

		mysql_connect($host, $user, $pass)or die(mysql_error());
		mysql_select_db($db)or die(mysql_error());
	}

	function check_logged_in_and_active()
	{
		connect("u839756306_saleh");
		if (isset($_SESSION['username']) AND isset($_SESSION['password'])) {
			$username = $_SESSION['username'];
			$password = $_SESSION['password'];
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) == 0) {
				echo "<script>alert('Something went wrong, please log in again!'); window.location.href='logout.php';</script>";
			}else{
				$sql2 = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND details = '0' LIMIT 1";
				$result2 = mysql_query($sql2);
				if (mysql_num_rows($result2) == 1) {
					$_SESSION['details'] = True;
					echo "<script>window.location.href='first.php';</script>";
				}
				while ($data = mysql_fetch_array($result)) {
					$_SESSION['id'] = $data['id'];
				}
				return True;
			}
		}else{
			echo "<script>window.location.href='logout.php';</script>";
		}
	}

	function info_img($id)
	{
		connect("u839756306_saleh");
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = mysql_query($sql);
		while ($data = mysql_fetch_array($result)) {
			return $data['img'];
		}
	}

	function info_prof($id)
	{
		connect("u839756306_saleh");
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = mysql_query($sql);
		while ($data = mysql_fetch_array($result)) {
			echo "<a href='myProfile.php?id=".$id."'>".$data['firstname']. "<br>". $data['lastname']. "</a><br><br>";
		}
		$sql = "SELECT * FROM info WHERE id = '$id'";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);
		while ($data = mysql_fetch_array($result)) {
			echo "Nickname: <label class='inf' id='nickname'>".$data['nickname']."</label><ed1> edit</ed1><input type='text' class='nickname'><done1>done</done1><br><br>
				  City: <label class='inf' id='city'>".$data['city']."</label><ed2> edit</ed2><input type='text' class='city'><done2>done</done2><br><br>
				  details: <br><label class='inf' id='details'>".$data['details']."</label><ed3> edit</ed3><textarea rows='6' class='details'></textarea><done3>done</done3>";
		}
	}

	function info_prof2($id)
	{
		connect("u839756306_saleh");
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = mysql_query($sql);
		while ($data = mysql_fetch_array($result)) {
			echo "<a href='profile.php?id=".$id."'>".$data['firstname']. "<br>". $data['lastname']. "</a><br><br>";
		}
		$sql = "SELECT * FROM info WHERE id = '$id'";
		$result = mysql_query($sql);
		while ($data = mysql_fetch_array($result)) {
			echo "Nickname: ".$data['nickname']."<br><br>
				  City: ".$data['city']."<br><br>
				  details: ".$data['details'];
		}
	}

	function header1($css, $logout, $href, $extra_link)
	{
		echo '<html>
		<head>
			<title>NextDoor</title>
			<!-- <link href="http://fonts.googleapis.com/css?family=Alex+Brush&subset=latin,latin-ext" rel="stylesheet" type="text/css"> -->
			<link rel="stylesheet" type="text/css" href="css/'. $css .'">
			'. $extra_link .'
		</head>
		<body>
			<header>
				<div id="header">';
				if ($href) {
					echo $href;
				}
				else{
						echo	'<img src="images/Logo_2.jpg" width="293" height="63">
						</div>';
					}

		if ($logout) {
			echo "<a href='logout.php'><img id='left' src='images/logout.png' height='25' width='23'></a>";
		}

		echo'</header>';
	}

	function header2($css, $logout, $href, $extra_link, $search)
	{
		$id = $_SESSION['id'];
		echo '<html>
		<head>
			<title>NextDoor</title>
			<!-- <link href="http://fonts.googleapis.com/css?family=Alex+Brush&subset=latin,latin-ext" rel="stylesheet" type="text/css"> -->
			<link rel="stylesheet" type="text/css" href="css/'. $css .'">
			'. $extra_link .'
		</head>
		<body>
			<header>
				<div id="header">';
				if ($href) {
					echo $href;
				}
				else{
						echo	'<img src="images/Logo_2.jpg" width="293" height="63">
						</div>';
					}

					echo "
					<div id='search'>
						<form method='POST' id='search_bar' action='search.php'>
							<input type='text' placeholder='search' value='".$search."' name='query'>
						</form>
					</div>
					";

		if ($logout) {
			echo "<a href='logout.php'><img id='left' src='images/logout.png' height='25' width='23'></a>";
		}

		echo'</header>';
		$not = notif();
		echo '<div id="men"></div><div id="menu"><pad id="more"><a href="myProfile.php?id='.$id.'">Profile</a></pad> <pad><a href="home.php">HomePage</a></pad> <pad><a href="friends.php">Friends ('.num_friends($id).')</a></pad> <pad><a href="notif.php">Notifications ( '.notif().' new / '.notif3().' )</a></pad></div>';
	}

	function notif(){
		if (isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
			$x = 0;
			$sql2 = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0 AND seen = 0  OR user1 = '$id' AND accepted = 1 AND seen2 = 0";
			$result2 = mysql_query($sql2);
			$x = mysql_num_rows($result2);
			return $x;
		}
		
	}

	function notif2(){
		if (isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
			$x = 0;
			$sql2 = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0 AND seen = 0";
			$result2 = mysql_query($sql2);
			$x = mysql_num_rows($result2);
			return $x;
		}
		
	}

	function notif3(){
		if (isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
			$x = 0;
			$sql2 = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0 OR user1 = '$id' AND seen2 = 0 AND accepted = 1";
			$result2 = mysql_query($sql2);
			$x = mysql_num_rows($result2);
			return $x;
		}
		
	}

	function my_friends($id){
		$sql = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 1 OR user1 = '$id' AND accepted = 1";
		$result = mysql_query($sql);

		for($i = 0; $array[$i] = mysql_fetch_assoc($result); $i++) ;
		array_pop($array);
		$sql = "SELECT * from users WHERE id = '$friend' ORDER BY firstname ASC";
		for ($i=0; $i < count($array); $i++) {
			// echo "user1<br>";
			$friend = $array[$i]['user1'];
			if ($friend == $id) {
				$friend = $array[$i]['user2'];
			}

			

			$result = mysql_query($sql)or die(mysql_error());
			$data = mysql_fetch_array($result);
			$friend = $data['firstname'] . " " . $data['lastname'] . " " . $data['id'] . " " . $data['img'];

			// echo $friend;
			// echo "<br>";
			$friend = explode(" ", $friend);
			$baes[$i] = $friend;
		}

		for ($i=0; $i < count($baes); $i++) {
			if ($baes[$i][3] == 'default.jpeg') {
				echo "<br><center><res><a href='profile.php?id=" . $baes[$i][2] . "'><img width='100px' id='res' src='images/profile/" . $baes[$i][3] . "'><br>" . $baes[$i][0] . " " . $baes[$i][1] . "</a></res></center>";
			}else{
				echo "<br><center><res><a href='profile.php?id=" . $baes[$i][2] . "'><img width='100px' id='res' src='images/profile/" . $baes[$i][2] . "/" . $baes[$i][3] . "'><br>" . $baes[$i][0] . " " . $baes[$i][1] . "</a></res></center>";
			}
		}
	}

	function num_friends($id) {
		$sql = "SELECT * FROM friends WHERE user1 = '$id' AND accepted = 1 OR user2 = '$id' AND accepted = 1";
		$result = mysql_query($sql);
		$count = mysql_num_rows($result);
		return $count;
	}

?>