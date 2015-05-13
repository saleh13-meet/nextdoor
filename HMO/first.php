<?php

session_start();

include 'functions.php';

connect();

$id = $_SESSION['id'];
$username = $_SESSION['username'];

$id = $_GET['id'];
$arr = all_info($id);
$j_id = $arr['id'];
if (empty($arr['id'])) {
    header('location:logout.php');
}

echo "<label style='position: fixed; opacity: 0;'>";
print_r($arr);
echo "</label>";

?>

<html>
<head>
	<title>Help Me Out</title>
	<link rel="stylesheet" href="CSS/style.css">
	<link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top">
    	<div class="container-fluid">
        	<div class="navbar-header">
            	<a class="navbar-brand" href="Index.php">
            		<img alt="Brand" src="images/logo.png" height="20px">
            	</a>
                <p class="navbar-text">Welcome <?php echo $arr['firstname']; ?></p>
            </div>
            <div class="collapse navbar-collapse">
            	<ul class="nav navbar-nav">
                	<li><a href="#">&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm">Home</span></a></li>
                    <li><a href="#">&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="hidden-sm">Profile</span> </a></li>
                    <li><a href="#"><span class="
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

    <div class="container" style="margin-top: 59px; height:calc(100% - 51px);">
        <div class="row">
        	<div id="1" class="col-md-5 jumbotron btn-warning">
        		<h1>Professional</h1>
        		<label>A professional is someone that helps other. (someone else's bitch)</label>
        	</div>
        	<div id="2" class="col-md-5 col-md-offset-2 jumbotron btn-warning">
        		<h1>University</h1>
        		<label>A university student is someone that helps only school students and gets help from professionals. (second class bitch)</label>
        	</div>
        	<div id="3" class="col-md-6 col-md-offset-3 jumbotron btn-warning">
        		<h1>School</h1>
        		<label>A school student (the pimps) Are the bosses everyone wants a piece of them.</label>
        	</div>
        </div>
    </div>

<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
<?php echo '
$(document).ready(function() {
    $(".row").children().click(function() {
        var id = $(this).attr("id");
        var arr = '.json_encode($j_id).'
        jQuery.ajax({
            url: "first1.php",
            type: "POST",
            data: "id="+arr+"&kind="+id,
            success: function(data) {
                window.location.href="home.php";
            }
        });
    });
});
'; ?>
</script>

</body>
</html>