<?php

session_start();

include 'functions.php';

connect();

if (!logged_in()) {
    header("location:logout.php");
}else{
    $id = $_SESSION['id'];
    $arr = all_info($id);

?>

<html>
<head>
	<title>Help Me Out</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<a class="navbar-brand" href="home.php">
            		<img alt="Brand" src="images/logo.png" height="20px">
            	</a>
                <p class="navbar-text">Welcome <?php echo $arr['firstname']; ?></p>
            </div>
            <div class="collapse navbar-collapse">
            	<ul class="nav navbar-nav">
                	<li><a href="home.php">&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm">Home</span></a></li>
                    <li><a href="profile.php">&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="hidden-sm">Profile</span></a></li>
                    <li class="active"><a href="create.php"><span class="
glyphicon glyphicon-pencil"></span>&nbsp;<span class="hidden-md hidden-sm">What's your delima</span><span class="sr-only">(current)</span></a></li>
                </ul>
            	<form class="navbar-form navbar-right" role="logout" action="logout.php" method="POST">
        			<div class="form-group">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-log-out" style="font-size:20px; color:#d9534f;"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php

}

?>