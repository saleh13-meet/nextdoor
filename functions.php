<?php
	
	function connect($db)
	{
		$host = "mysql.serversfree.com";
		$user = "u839756306_saleh";
		$pass = "nazareth69";

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
		if(!$result){return NULL;};
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
			echo $data['firstname']. "<br>". $data['lastname']. "<br><br>";
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
			<script>
			  // window.fbAsyncInit = function() {
			  //   FB.init({
			  //     appId      : "1467879883503647",
			  //     xfbml      : true,
			  //     version    : "v2.3"
			  //   });
			  // };

			  // (function(d, s, id){
			  //    var js, fjs = d.getElementsByTagName(s)[0];
			  //    if (d.getElementById(id)) {return;}
			  //    js = d.createElement(s); js.id = id;
			  //    js.src = "//connect.facebook.net/en_US/sdk.js";
			  //    fjs.parentNode.insertBefore(js, fjs);
			  //  }(document, "script", "facebook-jssdk"));
			</script>
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

	function header2($css, $logout, $href, $extra_link)
	{
		echo '<html>
		<head>
			<title>NextDoor</title>
			<!-- <link href="http://fonts.googleapis.com/css?family=Alex+Brush&subset=latin,latin-ext" rel="stylesheet" type="text/css"> -->
			<link rel="stylesheet" type="text/css" href="css/'. $css .'">
			'. $extra_link .'
		</head>
		<body>
		<script>
			  // window.fbAsyncInit = function() {
			  //   FB.init({
			  //     appId      : "1467879883503647",
			  //     xfbml      : true,
			  //     version    : "v2.3"
			  //   });
			  // };

			  // (function(d, s, id){
			  //    var js, fjs = d.getElementsByTagName(s)[0];
			  //    if (d.getElementById(id)) {return;}
			  //    js = d.createElement(s); js.id = id;
			  //    js.src = "//connect.facebook.net/en_US/sdk.js";
			  //    fjs.parentNode.insertBefore(js, fjs);
			  //  }(document, "script", "facebook-jssdk"));
		</script>
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
							<input type='text' placeholder='search' name='query'>
						</form>
					</div>
					";

		if ($logout) {
			echo "<a href='logout.php'><img id='left' src='images/logout.png' height='25' width='23'></a>";
		}

		echo'</header>';
	}

	function header3($css, $logout, $href, $extra_link)
	{
		echo '<html>
		<head>
			<title>NextDoor</title>
			<!-- <link href="http://fonts.googleapis.com/css?family=Alex+Brush&subset=latin,latin-ext" rel="stylesheet" type="text/css"> -->
			<link rel="stylesheet" type="text/css" href="css/'. $css .'">
			'. $extra_link .'
		</head>
		<body id="over">
		<script>
			  // window.fbAsyncInit = function() {
			  //   FB.init({
			  //     appId      : "1467879883503647",
			  //     xfbml      : true,
			  //     version    : "v2.3"
			  //   });
			  // };

			  // (function(d, s, id){
			  //    var js, fjs = d.getElementsByTagName(s)[0];
			  //    if (d.getElementById(id)) {return;}
			  //    js = d.createElement(s); js.id = id;
			  //    js.src = "//connect.facebook.net/en_US/sdk.js";
			  //    fjs.parentNode.insertBefore(js, fjs);
			  //  }(document, "script", "facebook-jssdk"));
		</script>
			<header class="fix1">
				<div id="header" class="fix1">';
				if ($href) {
					echo $href;
				}
				else{
						echo	'<img src="images/Logo_2.jpg" width="293" height="63" class="fix2">
						</div>';
					}

		if ($logout) {
			echo "<a href='logout.php'><img id='left' src='images/logout.png' height='25' width='23' class='fix3'></a>";
		}

		echo'</header>';
	}

	function notif(){
		$id = $_SESSION['id'];
		$x = 0;
		$sql2 = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0 AND seen = 0  OR user1 = '$id' AND accepted = 1 AND seen2 = 0";
		$result2 = mysql_query($sql2);
		$x = mysql_num_rows($result2);
		return $x;
	}

	function notif2(){
		$id = $_SESSION['id'];
		$x = 0;
		$sql2 = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0 AND seen = 0";
		$result2 = mysql_query($sql2);
		$x = mysql_num_rows($result2);
		// $sqlz = "SELECT * FROM friends WHERE user1 = '$id' AND seen2 = 0";
		// $resultz = mysql_query($sqlz);
		// $x += mysql_num_rows($resltz);
		return $x;
	}

	function notif3(){
		$id = $_SESSION['id'];
		$x = 0;
		$sql2 = "SELECT * FROM friends WHERE user2 = '$id' AND accepted = 0 OR user1 = '$id' AND seen2 = 0 AND accepted = 1";
		$result2 = mysql_query($sql2);
		$x = mysql_num_rows($result2);
		echo $x;
	}

	function my_friends($me){
		$sql = mysql_query("SELECT * FROM friends WHERE user1 = '$me' AND accepted = 1 OR user2 = '$me' AND accepted =1 ORDER BY firstname ASC");
		for($i = 0; $array[$i] = mysql_fetch_assoc($sql); $i++) ;
			array_pop($array);
		return $array;
	}
	//#5890ff

?>