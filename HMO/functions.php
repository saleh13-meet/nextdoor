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

function header1($current){
	$id = $_SESSION['id'];
	$all = all_info($id);
	$firstname = $all['firstname'];
	echo '
	<html>
	<head>
		<title>Help Me Out</title>
	    <link rel="stylesheet" href="CSS/bootstrap.min.css">
	    <link rel="stylesheet" href="CSS/style.css">
	    <link rel="icon" href="images/logo.png" sizes="32x32">
	</head>
	<body>
	<div class="navbar navbar-default navbar-fixed-top">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<a class="navbar-brand" href="home.php">
            		<img alt="Brand" src="images/logo.png" height="20px">
            	</a>
                <p class="navbar-text">Welcome '.$firstname.'</p>
            </div>
            <div class="collapse navbar-collapse">
            	<ul class="nav navbar-nav">';
            		 if ($current == 'home') {
                		echo '<li class="active"><a href="home.php">&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm">Home</span><span class="sr-only">(current)</span></a></li>';
                	}else{
                		echo '<li><a href="home.php">&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm">Home</span></a></li>';
                	}
                	if ($current == 'profile') {
                		echo '<li class="active"><a href="profile.php">&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="hidden-sm">Profile</span><span class="sr-only">(current)</span> </a></li>';
                	}else{
                		echo '<li><a href="profile.php">&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="hidden-sm">Profile</span> </a></li>';
                	}
                	if ($current == 'create') {
                		echo '<li class="active"><a href="create.php"><span class="glyphicon glyphicon-pencil"></span> <span class="hidden-md hidden-sm">What\'s your delima</span><span class="sr-only">(current)</span></a></li>';
                	}else{
                		echo '<li><a href="create.php"><span class="glyphicon glyphicon-pencil"></span> <span class="hidden-md hidden-sm">What\'s your delima</span></a></li>';
                	}

                    
                echo '   
                </ul>
                <form class="navbar-form navbar-right" role="logout" action="logout.php" method="POST">
        			<div class="form-group">
        				<button class="btn btn-default"><span class="glyphicon glyphicon-log-out" style="font-size:20px; color:#d9534f;"></span></button>
        			</div>
        		</form>
                <form class="navbar-form navbar-right" role="search">
                	<div class="col-lg-12">
					    <div class="input-group">
					      <input type="text" name="query" autocomplete="off" class="form-control" placeholder="Search for..." onkeyup="autocomplet()" id="users_id">					      <span class="input-group-btn">
					        <button class="btn btn-info" type="button">Go!</button>
					      </span>
					    </div>
					    <ul id="users_list_id" style="position: absolute;"></ul>
				  	</div>
                </form>
        	</div>
        </div>
    </div>
    <script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
function autocomplet() {
	var min_length = 1; // min caracters to display the autocomplete
	var keyword = $("#users_id").val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: "ajax_refresh.php",
			type: "POST",
			data: {keyword:keyword},
			success:function(data){
				$("#users_list_id").show();
				$("#users_list_id").html(data);
				if (data == "") {$("#users_list_id").html("<center>no results</center>")};
				$("#users_id").focus(function() {
					if (keyword.length >= min_length) {
						$("#users_list_id").show();
					}
				});
			}
		});
	} else {
		$("#users_list_id").hide();
	}
}
 
// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$("#users_id").val(item);
	// hide proposition list
	$("#users_list_id").hide();
}

$(document).mouseup(function (e)
{
    var container = $("#users_id");
    var container2 = $("#users_list_id");

    if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container.has(e.target).length === 0){container2.hide();}
});
</script>';
}

?>