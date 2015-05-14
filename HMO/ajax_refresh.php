<?php

	function connect() {
	    return new PDO('mysql:host=127.9.71.2;dbname=HMO', 'adminzvReRTi', 'UMlNFhIQkrJF', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}

	$pdo = connect();
	$keyword = $_POST['keyword'].'%';
	$sql = "SELECT * FROM users WHERE FirstName LIKE '$keyword%' ORDER BY FirstName LIMIT 0,4";

	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();

	foreach ($list as $rs) {
		$id = $rs['id'];
		$img = $rs['img'];
		$country_name = str_replace($_POST['keyword'], $_POST['keyword'], "<img width='55px' src='images/profile/".$rs['img']."'>" . $rs['FirstName']. " " . $rs['LastName']);
		
		// add new option
		$query = $rs['FirstName'] . " " . $rs['LastName'];
	    echo '<a href="uprofile.php?id='.$id.'"><li onclick="set_item(\''.str_replace("'", "\'", $query).'\')">'.$country_name.'</li></a>';
	}

	$sql = "SELECT * FROM users WHERE LastName LIKE '$keyword%' AND FirstName NOT LIKE '$keyword%' ORDER BY LastName LIMIT 0,3";

	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();

	foreach ($list as $rs) {
		$id = $rs['id'];
		$img = $rs['img'];
		$country_name = str_replace($_POST['keyword'], $_POST['keyword'], "<img width='55px' src='images/profile/".$img."'>" . $rs['FirstName']. " " . $rs['LastName']);
		// add new option
		$query = $rs['FirstName'] . " " . $rs['LastName'];
	    echo '<a href="uprofile.php?id='.$id.'"><li onclick="set_item(\''.str_replace("'", "\'", $query).'\')">'.$country_name.'</li></a>';
	}

?>