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
}else{
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
            	<a class="navbar-brand" href="#">
            		<img alt="Brand" src="images/logo.png" height="20px">
            	</a>
                <p class="navbar-text">Welcome <?php echo $arr['firstname']; ?></p>
            </div>
            <div class="collapse navbar-collapse">
            	<ul class="nav navbar-nav">
                	<li><a href="#">&nbsp;<span class="glyphicon glyphicon-home" aria-hidden="true"></span> <span class="hidden-sm">Home</span></a></li>
                    <li><a href="#">&nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="hidden-sm">Profile</span> </a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> <span class="hidden-md hidden-sm">What's your delima</span></a></li>
                </ul>
            	<form class="navbar-form navbar-right" role="logout" action="logout.php" method="POST">
        			<div class="form-group">
        				<button class="btn btn-default"><span class="glyphicon glyphicon-log-out" style="font-size:20px; color:#d9534f;"></span></button>
        			</div>
        		</form>
        	</div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top: 70px;">
    	<form class="form-horizontal">
			<fieldset>
				<legend>Tell us about yourself</legend>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textinput">Education level</label>  
				  <div class="col-md-4">
				  <input id="textinput" name="ed_level" type="text" onkeyup="hides()" placeholder="class, grades etc..." class="form-control input-md">
				  </div><span style="margin-left:4px;display:none;"class="glyphicon glyphicon-remove-sign btn btn-warning" id="nohover"> Must fill this field!</span>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="textarea">Short bio</label>
				  <div class="col-md-4">                     
				   <textarea maxlength="500" class="form-control" id="textarea" onkeyup="hides2()" name="bio" placeholder="I like to make a lot of money, but i dont like to work alot."></textarea>
				  </div><span style="margin-left:4px;display:none;"class="glyphicon glyphicon-remove-sign btn btn-warning" id="nohover2"> Must fill this field!</span>
				</div>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="filebutton">Profile Picture</label>
				  <div class="col-md-4">
				    <input id="filebutton" name="file" class="input-file" type="file">
				  </div><span style="margin-left:4px;display:none;"class="glyphicon glyphicon-remove-sign btn btn-warning" id="nohover3"> Must fill this field!</span>
				</div>
				<div class="form-group">
				  <div class="col-md-8 col-md-offset-4">
				    <button id="submit" name="button1id" class="btn btn-success">Submit</button>
				    <button id="reset" name="button2id" class="btn btn-danger">Reset</button>
				  </div>
				</div>
			</fieldset>
		</form>
	</div>



<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
<?php
echo '
$(document).ready(function() {
	$("#reset").bind("click", function() {
		$("#textarea").val("");
		$("#textinput").val("");
		var control = $("#filebutton");
		control.replaceWith( control = control.clone( true ) );
		return false;
	});
	$("#submit").bind("click", function() {
		var area = $("#textarea").val();
		var txt = $("#textinput").val();
		var file = $("#filebutton").val();
		var id = '.json_encode($j_id).'
		if (!txt.trim()) {
			$("#nohover").show();
			return false;
	    }else{
	    	if (!area.trim()) {
	    		$("#nohover2").show();
	    	}else{
	    		jQuery.ajax({
	    			type: "POST",
	    			url: "info1.php",
	    			data: "id="+id+"&ed_level="+txt+"&bio="+area,
	    			success: function(data){
	    				if (data == "ok") {
	    					window.location.href = "home.php";
	    				};
	    			}
	    		});
	    	}
	    }
		return false;
	});
});

function hides(){
	$("#nohover").hide();
}
function hides2(){
	$("#nohover2").hide();
}
';
?>
</script>

<?php
}

?>