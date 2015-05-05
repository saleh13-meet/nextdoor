<?php

	include 'functions.php';
	connect("u839756306_saleh");

	session_start();

	$firstname = $_SESSION['fname'];
	$lastname = $_SESSION['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$conpassword = $_POST['conpassword'];
	$email = $_POST['email'];
	$school = $_POST['school'];

	if(is_numeric($firstname) || is_numeric($lastname)){
		echo "numbers";
		exit();
	}

	if($password == $conpassword){
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = mysql_query($sql)or die(mysql_error());
		$count = mysql_num_rows($result);

		if($count == 1){
			echo "uexist";
			exit();
		}

		$query = "SELECT * FROM users WHERE email = '$email'";
		$res = mysql_query($query)or die(mysql_error());
		$counts = mysql_num_rows($res);

		if($counts == 1){
			echo "eexist";
			exit();
		}

		$sql = "SELECT * FROM users WHERE 1 = 1";
		$result = mysql_query($sql)or die(mysql_error());

		while ($data = mysql_fetch_array($result)) {
			$id = $data['id'];
		}

		$id ++;

		mkdir("images/profile/".$id);

		$activation = md5(uniqid(rand(), true));

		$id = $_SESSION['id'];

		$sql = "INSERT INTO users(`id`, `firstname`, `lastname`, `username`, `password`, `email`, `school_id`, `activation`, `active`, `img`, `details`) 
			VALUES('$id', '$firstname', '$lastname', '$username', '$password', '$email', '$school', '$activation', '0', 'default.jpeg', '0')";
		$result = mysql_query($sql);
		if ($result) echo "thanks";
		// $message = " Thanks fo registering, To activate your account, please click on this link:\n\n";
		// $message .= "nextdoor.gq/activate.php?key=$activation";
		// $param = mail($email, 'Registration Confirmation - NextDoor', $message, 'From: confirm@nextdoor.gq');
		$to  = $email;

		// subject
		$subject = 'Email Confirmation - NextDoor';

		// message
		$message = '
		<html>
		<head>
		  <title>NextDoor - Confirm Email</title>
		</head>
		<body>
		  <h2>Thank you for registering at NextDoor!</h2>
		  <p>To confirm your e-mail address please go to the link below:</p>
		  <p>nextdoor.gq/activate.php?key='.$activation.'  <br><br>~NextDoor - Confirm e-mail address</p>
		</body>
		</html>
		';

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Additional headers
		$headers .= 'To: '.$firstname.' <'.$email.'>' . "\r\n";
		$headers .= 'From: NextDoor <Confirm.NextDoor@yahoo.com>' . "\r\n";

		// Mail it
		$help = mail($to, $subject, $message, $headers);

		$time = date('jS \of F Y h:i:s A');

		$sql = "INSERT INTO `friends`(`id`, `user1`, `user2`, `date`, `accepted`, `seen`, `seen2`) VALUES ('', '$id', '1', '$time', '1', '1', '0')";
		mysql_query($sql);

		session_destroy();

		exit();
	}
	else{
		echo "pnomatch";
		exit();
	}

?>