<?php

error_reporting(E_ALL);

define('FACEBOOK_SDK_V4_SRC_DIR', '/Facebook/');
require __DIR__ . '/Facebook/autoload.php';

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
    $redirect_url = 'http://nd-nextdoor2.rhcloud.com/nextdoor/test_facebook.php';

    FacebookSession::setDefaultApplication($app_id, $app_secret);
    $helper = new FacebookRedirectLoginHelper($redirect_url);
    $sess = $helper->getSessionFromRedirect();

    if (isset($sess)) {
      echo "set<br>";
      // store token in php session
      $AccessToken = $sess->getAccessToken();
      $_SESSION['FB_TOKEN'] = $AccessToken->extend();

      echo "token: ".$_SESSION['FB_TOKEN']. "<br>";

      // create request object, capture response
      $request = new FacebookRequest($sess, 'GET', '/me');

      echo "request <br>";

      // get graph object from response
      $response = $request->execute();
      $graph = $response->getGraphObject(GraphUser::classname());

      echo "graph<br>";

      //get details from graph object
      // $name = $graph->$getName();               //Full Name
      $id = $graph->getId();                    //Facebook ID
      $email = $graph->getEmail();
      $name = $graph->getname();
      $fname = $graph->getfirst_name();
      $lname = $graph->getlast_name();

      echo "details<br>";

      // getting user image
      // $image = 'http://graph.facebook.com/'.$id.'/picture';


      // Display Details.
      echo "stuff<br>";
      echo "Hello $name <br>";
      echo "Email: $email <br>";
      echo "Your Facebook ID: $id <br>";
      echo "firstname: $fname <br>";
      echo "lastname: $lname <br>";
    }else{
      // to get the login access
      echo "<a href='" . $helper->getLoginUrl(array('email')) . "'>Login With FaceBook</a>";
    }
  }
  catch(FacebookRequestException $e){
    echo "ERROR OCCURED, CODE: " . $e->getCode();
  }
  
?>