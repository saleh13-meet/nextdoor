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
                    <li class="active"><a href="#">&nbsp;<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> <span class="hidden-sm">About Help Me Out</span><span class="sr-only">(current)</span></a></li>
                    <li><a href="contact.php"><span class="
glyphicon glyphicon-envelope"></span> <span class="hidden-md hidden-sm">Contact Help Me Out</span></a></li>
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
                    <button id="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in" style="font-size:20px; padding-right:4px;"></span></button>
                </form>
            </div>
        </div>
    </div>
    <div id="row" class="row" style="margin-top: 88px; margin-bottom: 88px;">
        <div class="container">
            <blockquote>
                <p>Your choice of major can set you on the path your career will take or at least send a signal to future employers about what skills and interest you possess.</p>
                <footer>by <cite>Scott Rosen</cite></footer>
            </blockquote>
            <div class="page-header">
                <h3> <span class="glyphicon glyphicon-minus-sign" aria-hidden="true" style="top: 3px;"></span> The problem / need:</h3>
            </div>
            <h4>
                One of the biggest difficulties we face is making a decision regarding 
                Our professional future and we believe it all starts with choosing a major.
            </h4>
            <div class="page-header">
                <h3><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="top: 3px;"></span> Our Solution:</h3>
            </div>
            <h4 style="line-height: 1.7;">
                we created a social platform that gives you the right guiding combined with relevant different points of view for helping you decide what will be the best major for you.   
                <br>For the students who finished junior high – we will connect them with students who graduated successfully in their majors and for the pre university students, retires that will share their life experience in their expert field and people who have extensive experience in the field.
            </h4>
            <div class="page-header">
                <h3><span class="glyphicon glyphicon-globe" aria-hidden="true" style="top: 3px;"></span> The Target Market: <small>-customer segment and user-</small></h3>
            </div>
            <h4 style="line-height: 1.7;">    
                Our users are students who graduated 9th grade who treat the major they are choosing seriously and pre university students.
                <br>Our customer segments are principles who are motivated in helping their students and believe that by choosing the most suitable major they will increase the school's average.
            </h4>
            <div class="page-header">
                <h3><span class="glyphicon glyphicon-fire" aria-hidden="true" style="top: 3px;"></span> Competition:</h3>
            </div>
            <h4 style="line-height: 1.7;">    
                “Helpmydecision.com” and “something pop” are websites who are our indirect competitors. 
                <br>They have built a formula that calculates mathematically what is the best decision for you according to the parameters that you set and marks by your priorities.   
            </h4>
            <div class="page-header">
                <h3><span class="glyphicon glyphicon-sunglasses" aria-hidden="true" style="top: 3px;"></span> Team:</h3>
            </div>
            <h4 style="line-height: 1.7;">    
                <em>why us?</em>
                <br><br>We are a team of 16 – 17 year's old teenagers who have been learning in <kbd>meet</kbd> program together. Connected to the students who graduated successfully in their majors and we have the right combination of programing knowledge, understanding the market from our experience in high school and experience on working together efficiently. 
                <br><br><em>Why now?</em>
                <br><br>In this times more than ever sharing via web had become popular and people, mostly teenagers finding it really hard to make decisions.
            </h4>
        </div>
    </div>
    <img src="images/meet2.png" width="100%">
    
<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
<script type="text/javascript">
    $("#submit").click(function() {
        document.cookie = "page=about.php; 10;";
    });
</script>
</body>
</html>