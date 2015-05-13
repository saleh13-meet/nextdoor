<?php

include 'functions.php';
connect();

$firstname = $_POST['firstname'];
$firstname = ucfirst(strtolower($firstname));
$lastname = $_POST['lastname'];
$lastname = ucfirst(strtolower($lastname));
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$age = $_POST['age'];

$sql = "INSERT INTO users(`FirstName`, `LastName`, `Username`, `Password`, `Email`, `Age`) VALUES('$firstname', '$lastname', '$username', '$password', '$email', '$age')";
$result = mysql_query($sql);

if ($result) {
	header('location:index.php?user='.$username);
}else{
	echo "no";
}

?>