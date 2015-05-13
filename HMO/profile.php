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
<body style="background-color: #F2ECE2;">
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
                    <li class="active"><a href="profile.php">&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="hidden-sm">Profile</span><span class="sr-only">(current)</span></a></li>
                    <li><a href="create.php"><span class="
glyphicon glyphicon-pencil"></span> <span class="hidden-md hidden-sm">What's your delima</span></a></li>
                </ul>
            	<form class="navbar-form navbar-right" role="logout" action="logout.php" method="POST">
        			<div class="form-group">
                        <button class="btn btn-default"><span class="glyphicon glyphicon-log-out" style="font-size:20px; color:#d9534f;"></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row center">
            <div class="col-sm-12">
                <div class="over"></div>
                    <img class="cover" src="images/profile/<?php echo $arr['img']; ?>">
            </div>
        </div>
    </div>
    <h2 class="prof">
        <span class="name"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $arr['firstname']." ".$arr['lastname']; ?></span>
    </h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-color: #F9F5EF; padding: 5%; margin-top: 20px;">
                Vestibulum id gravida nunc. Ut venenatis, sapien a maximus vestibulum, tortor justo ultricies ligula, id egestas ipsum metus a nunc. Suspendisse ultricies porttitor ex. Mauris sed ante viverra, feugiat massa non, hendrerit est. Phasellus at iaculis metus. Nunc posuere justo eget lorem mollis, non facilisis risus luctus. Proin dapibus ullamcorper suscipit. Vivamus vel vulputate sem, non accumsan sem. Fusce volutpat metus dignissim finibus pulvinar. Donec gravida maximus elit, id fermentum est varius ullamcorper. Vestibulum dolor libero, tristique vitae risus non, scelerisque sollicitudin nisl. Nulla egestas nibh et nunc euismod eleifend. Cras ex metus, luctus sed cursus at, commodo id elit. Nullam a nibh congue, dictum urna sit amet, tempus lacus. Duis volutpat orci vel euismod volutpat. Vestibulum ac mattis elit.
            </div>
        </div>
    </div>
    <h2 class="prof">
        <span class="name"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Education Level</span>
    </h2>
    <div class="container" style="background-color: #F9F5EF; padding: 5%; margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <?php echo $arr['ed_level']; ?>
            </div>
        </div>
    </div>
    <h2 class="prof">
        <span class="name"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Short bio</span>
    </h2>
    <div class="container" style="background-color: #F9F5EF; padding: 5%; margin-top: 20px; margin-bottom: 5%;">
        <div class="row">
            <div class="col-md-12">
                <?php echo $arr['bio']; ?>
            </div>
        </div>
    </div>


<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    
});
</script>
</body>
</html>

<?php

}

?>