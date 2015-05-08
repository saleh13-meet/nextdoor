<?php

	function connect() {
	    return new PDO('mysql:host=127.9.71.2;dbname=u839756306_saleh', 'adminzvReRTi', 'UMlNFhIQkrJF', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	$pdo = connect();
	$keyword = $_POST['keyword'].'%';
	$sql = "SELECT * FROM users WHERE firstname LIKE '$keyword%' ORDER BY firstname LIMIT 0,4";

	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();

	foreach ($list as $rs) {
		$id = $rs['id'];
		$img = $rs['img'];
		if ($img == 'default.jpeg') {
			$country_name = str_replace($_POST['keyword'], $_POST['keyword'], "<img width='45px' src='images/profile/default.jpeg'>" . $rs['firstname']. " " . $rs['lastname']);
		}else{
			$country_name = str_replace($_POST['keyword'], $_POST['keyword'], "<img width='45px' src='images/profile/".$id."/".$img."'>" . $rs['firstname']. " " . $rs['lastname']);
		}
		// add new option
		$query = $rs['firstname'] . " " . $rs['lastname'];
	    echo '<a href="profile.php?id='.$id.'"><li onclick="set_item(\''.str_replace("'", "\'", $query).'\')">'.$country_name.'</li></a>';
	}

	$sql = "SELECT * FROM users WHERE lastname LIKE '$keyword%' AND firstname NOT LIKE '$keyword%' ORDER BY lastname LIMIT 0,3";

	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();

	foreach ($list as $rs) {
		$id = $rs['id'];
		$img = $rs['img'];
		if ($img == 'default.jpeg') {
			$country_name = str_replace($_POST['keyword'], $_POST['keyword'], "<img width='45px' src='images/profile/default.jpeg'>" . $rs['firstname']. " " . $rs['lastname']);
		}else{
			$country_name = str_replace($_POST['keyword'], $_POST['keyword'], "<img width='45px' src='images/profile/".$id."/".$img."'>" . $rs['firstname']. " " . $rs['lastname']);
		}
		// add new option
		$query = $rs['firstname'] . " " . $rs['lastname'];
	    echo '<a href="profile.php?id='.$id.'"><li onclick="set_item(\''.str_replace("'", "\'", $query).'\')">'.$country_name.'</li></a>';
	}

?>