<?php

define('FACEBOOK_SDK_V4_SRC_DIR', '/Facebook/');
require __DIR__ . '/Facebook/autoload.php';

include 'functions.php';

header2("register.css", True, False, "");

/* INCLUSION OF LIBRARY FILES */
  require_once('Facebook/FacebookSession.php');
  require_once('Facebook/FacebookRequest.php');
  require_once('Facebook/FacebookResponse.php');
  require_once('Facebook/FacebookSDKException.php');
  require_once('Facebook/FacebookRequestException.php');
  require_once('Facebook/FacebookRedirectLoginHelper.php');
  require_once('Facebook/FacebookAuthorizationException.php');
  require_once('Facebook/GraphObject.php');
  require_once('Facebook/GraphUser.php');
  require_once('Facebook/GraphSessionInfo.php');
  require_once('Facebook/Entities/AccessToken.php');
  require_once('Facebook/HttpClients/FacebookCurl.php');
  require_once('Facebook/HttpClients/FacebookHttpable.php');
  require_once('Facebook/HttpClients/FacebookCurlHttpClient.php');

/* USE NAMESPACES */
  
  use Facebook\FacebookSession;
  use Facebook\FacebookRedirectLoginHelper;
  use Facebook\FacebookRequest;
  use Facebook\FacebookResponse;
  use Facebook\FacebookSDKException;
  use Facebook\FacebookRequestException;
  use Facebook\FacebookAuthorizationException;
  use Facebook\GraphObject;
  use Facebook\GraphUser;
  use Facebook\GraphSessionInfo;
  use Facebook\AccessToken;
  use Facebook\FacebookHttpable;
  use Facebook\FacebookCurlHttpClient;
  use Facebook\FacebookCurl;

  /*PROCESS*/

  try{
    session_start();
    $app_id = '1467879120170390';
    $app_secret = '8c60b7151c708c98fe47bdf10ef1b4b6';
    $redirect_url = 'http://nd-nextdoor2.rhcloud.com/nextdoor/register.php';

    FacebookSession::setDefaultApplication($app_id, $app_secret);
    $helper = new FacebookRedirectLoginHelper($redirect_url);
    $sess = $helper->getSessionFromRedirect();

    if (isset($sess)) {
      // store token in php session
      $AccessToken = $sess->getAccessToken();
      $_SESSION['FB_TOKEN'] = $AccessToken->extend();

      // create request object, capture response
      $request = new FacebookRequest($sess, 'GET', '/me');

      // get graph object from response
      $response = $request->execute();
      $graph = $response->getGraphObject(GraphUser::classname());
      $graph2 = $response->getGraphObject();

      //get details from graph object
      // $name = $graph->$getName();               //Full Name
      $id = $graph->getId();                    //Facebook ID
      $email = $graph->getEmail();
      $name = $graph->getname();
// 
      $names = explode(" ", $name);

      // getting user image
      // $image = 'http://graph.facebook.com/'.$id.'/picture';


      // Display Details.
      // echo "stuff<br>";
      // echo "Hello $name <br>";
      // echo "firstname: ". $names[0]. "<br>";
      // echo "lastname: ". $names[1]. "<br>";
      // echo "Email: $email <br>";
      // echo "Your Facebook ID: $id <br>";

      echo '<html>
	<head>
		<title>NextDoor</title>
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<script type="text/javascript" src="java/jquery-1.11.2.js"></script>
		<script type="text/javascript" src="java/jquery-ui.js"></script>
		<script type="text/javascript" src="java/register.js"></script>
	</head>
	<body>
		<header>
			<div id="header">
				<a href="index.php"><img src="images/Logo_2.jpg" width="293" height="63"></a>
			</div>
		</header>
		<div id="register-wrapper">
	        <form method="post" id="register">

	        	<div class="alert-box error numbers"><span>error: </span>Your name must contain letters!</div>
				<div class="alert-box error wrong"><span>error: </span>Please fill in all the fields!</div>
				<div class="alert-box error password"><span>error: </span>Password doesnt match!</div>
				<div class="alert-box error username"><span>error: </span>Username already exist!</div>
				<div class="alert-box error email"><span>error: </span>Email already exist!</div>
				<div class="alert-box success thanks"><span>success: </span>Thanks for registering! Please Login...</div>

				<ul>
					<li>
						<label for="firstname">firstname : </label><br>'.$names[0].'
						<input value="'.$names[0].'" type="text" id="firstname" name="firstname">
					</li>

					<li>
						<label for="lastname">lastname : </label><br>'.$names[1].'
						<input value="'.$names[1].'" type="text" id="lastname" name="lastname">
					</li>

					<li>
						<label for="username">Username : </label>
						<input class="in" type="text" id="username" maxlength="64" required="" autofocus="" name="username">
					</li>
					
					<li>
						<label for="password">Password : </label>
						<input class="in" type="password" id="password" maxlength="128" required="" name="password">
					</li>
						
					<li>
						<label for="conpassword">Confirm Password : </label>
						<input class="in" type="password" id="conpassword" maxlength="128" required="" name="conpassword">
					</li>

					<li>
						<label for="email">E-mail : </label><br>
						<input class="in" value="'.$email.'" type="email" id="email" maxlength="128" required="" autofocus="" name="email">
					</li>

					<li>
						<label for="school">School : </label><br>
						<input class="in" type="text" id="school" maxlength="3" required="" autofocus="" name="school">
					</li>

					<li class="buttonss">
						<input id="submit" type="button" value="Register">
					</li>
				</ul>
			</form>
		</div>
	</body>
</html>';

    }else{
      // to get the login access
      echo "<a href='" . $helper->getLoginUrl(array('email', 'user_about_me')) . "'>Login With FaceBook</a><br>";
      // $string = "saleh mansour";
      // $string2 = explode(" ", $string);
      // echo "firstname: " . $string2[0] . " lastname: " . $string2[1];
    }
  }
  catch(FacebookRequestException $e){
    echo "ERROR OCCURED, CODE: " . $e->getCode();
  }

?>
<!-- 
<html>
	<head>
		<title>NextDoor</title>
		
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<script type='text/javascript' src='java/jquery-1.11.2.js'></script>
		<script type='text/javascript' src='java/jquery-ui.js'></script>
		<script type='text/javascript' src='java/register.js'></script>
	</head>
	<body>
		<header>
			<div id="header">
				<a href="index.php"><img src='images/Logo_2.jpg' width='293' height='63'></a>
			</div>
		</header>
		<div id="register-wrapper">
	        <form method="post" id="register">

	        	<div class="alert-box error numbers"><span>error: </span>Your name must contain letters!</div>
				<div class="alert-box error wrong"><span>error: </span>Please fill in all the fields!</div>
				<div class="alert-box error password"><span>error: </span>Password doesnt match!</div>
				<div class="alert-box error username"><span>error: </span>Username already exist!</div>
				<div class="alert-box error email"><span>error: </span>Email already exist!</div>
				<div class="alert-box success thanks"><span>success: </span>Thanks for registering! Please Login...</div>

				<ul>
					<li>
						<label for="firstname">firstname : </label>
						<input class="in" value="saleh" type="text" id="firstname" maxlength="64" required="" autofocus="" name="firstname">
					</li>

					<li>
						<label for="lastname">lastname : </label>
						<input class="in" type="text" id="lastname" maxlength="64" required="" autofocus="" name="lastname">
					</li>

					<li>
						<label for="username">Username : </label>
						<input class="in" type="text" id="username" maxlength="64" required="" autofocus="" name="username">
					</li>
					
					<li>
						<label for="password">Password : </label>
						<input class="in" type="password" id="password" maxlength="128" required="" name="password">
					</li>
						
					<li>
						<label for="conpassword">Confirm Password : </label>
						<input class="in" type="password" id="conpassword" maxlength="128" required="" name="conpassword">
					</li>

					<li>
						<label for="email">E-mail : </label><br>
						<input class="in" type="email" id="email" maxlength="128" required="" autofocus="" name="email">
					</li>

					<li>
						<label for="school">School : </label><br>
						<input class="in" type="text" id="school" maxlength="3" required="" autofocus="" name="school">
					</li>

					<li class="buttonss">
						<input id="submit" type="button" value="Register">
					</li>
				</ul>
			</form>
		</div>
	</body>
</html> -->