<?php

function connect(){
	mysql_connect("127.9.71.2", "adminzvReRTi", "UMlNFhIQkrJF")or die(mysql_error());	
	mysql_select_db("HMO");
}

function find_id($username){
	$sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);

	return $data['id'];
}

function logged_in(){
	if (isset($_SESSION['id']) && isset($_SESSION['username']) && !empty($_SESSION['id']) && !empty($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$id = find_id($username);
		if ($_SESSION['id'] == $id) {
			$all = all_info($id);
			if ($all['kind'] == "0") {
				header("location:first.php?id=".$id);
				exit();
			}else{
				if ($all['info'] == "0") {
					header("location:info.php?id=".$id);
					exit();
				}else{
					return true;
				}
			}
		}else{
			return false;
		}
	}
}

function all_info($id){
	$sql = "SELECT * FROM users WHERE id ='$id' LIMIT 1";
	$result = mysql_query($sql);
	$data = mysql_fetch_array($result);
	$arr = [];
	$arr['id'] = $data['id'];
	$arr['firstname'] = $data['FirstName'];
	$arr['lastname'] = $data['LastName'];
	$arr['email'] = $data['Email'];
	$arr['username'] = $data['Username'];
	$arr['img'] = $data['img'];
	$arr['password'] = $data['Password'];
	if ($data['kind'] == 3) {
		$kind = 'School';
	}else{
		if ($data['kind'] == 2) {
			$kind = 'University';
		}else{
			if ($data['kind'] == 1) {
				$kind = 'Professional';
			}else{
				$kind = 0;
			}
		}
	}
	$arr['kind'] = $kind;
	$arr['info'] = $data['info'];
	$sql2 = "SELECT * FROM info WHERE id = '$id' LIMIT 1";
	$result2 = mysql_query($sql2);
	$count = mysql_num_rows($result2);
	if ($count > 0) {
		$data2 = mysql_fetch_array($result2);
		$arr['ed_level'] = $data2['ed_level'];
		$arr['bio'] = $data2['bio'];
	}
	return $arr;
}

?>