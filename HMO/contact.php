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
                <p class="navbar-text" style="position:fixed; left:50px;">Welcome</p>
            </div>
            <div class="collapse navbar-collapse" style="margin-left: 128px;">
            	<ul class="nav navbar-nav">
                	<li><a href="index.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <span class="hidden-sm">Register</span></a></li>
                    <li><a href="about.php">&nbsp;<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <span class="hidden-md hidden-sm">About Help Me Out</span></a></li>
                    <li class="active"><a href="#"><span class="
glyphicon glyphicon-envelope"></span>&nbsp;<span class="hidden-sm">Contact Help Me Out</span><span class="sr-only">(current)</span></a></li>
                </ul>
            <form class="navbar-form navbar-right" role="login" action="login.php" method="POST">
        		<div class="form-group">
          			<?php
                        if (isset($_GET['username'])) {
                            $username = $_GET['username'];
                            echo '<input id="user" type="text" class="form-control" value="'.$username.'" name="username" pattern=".{6,}" required=""   required title="6 characters minimum" style="margin-right: 4px;">';
                            echo '<input id="pass" type="password" class="form-control" autofocus placeholder="Password" name="password" pattern=".{6,}" required=""   required title="6 characters minimum"><span style="margin-left:4px;"class="glyphicon glyphicon-remove-sign btn btn-danger" id="nohover"></span>';
                        }else{
                            if (isset($_GET['user'])) {
                                $username = $_GET['user'];
                                echo '<input id="user" type="text" class="form-control" value="'.$username.'" name="username" pattern=".{6,}" required=""   required title="6 characters minimum" style="margin-right: 4px;">';
                                echo '<input id="pass" type="password" class="form-control" autofocus placeholder="Password" name="password" pattern=".{6,}" required=""   required title="6 characters minimum">';
                            }else{
                                echo '<input id="user" type="text" class="form-control" placeholder="Username" name="username" pattern=".{6,}" required=""   required title="6 characters minimum" style="margin-right: 4px;">';
                                echo '<input id="pass" type="password" class="form-control" placeholder="Password" name="password" pattern=".{6,}" required=""   required title="6 characters minimum">';   
                            }
                        }
                    ?>
        		</div>
        		<button id="submit" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in" style="font-size:20px; padding-right:4px;"></span></button>
      		</form>
        </div>
	</div>
<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
    $("#submit").click(function() {
        document.cookie = "page=contact.php; 10;";
    });
</script>    
</body>
</html>