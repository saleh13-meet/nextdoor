<?php

	include 'functions.php';

	connect("u839756306_saleh");

	$vowels = array("a", "e", "o", "u");
	$consonants = array("b", "c", "d", "v", "g", "t", "s", "m");

	function randVowel()
	{
	  global $vowels;
	  return $vowels[array_rand($vowels, 1)];
	}

	function randConsonant()
	{
	  global $consonants;
	  return $consonants[array_rand($consonants, 1)];
	}

	$x = 90;

	while ($x < 190) {
		$firstname = ucfirst("" . randConsonant() . "" . randVowel() . "" . "" . randConsonant() . "" . randVowel() . "" . randVowel() . "");
		$lastname = ucfirst("" . randConsonant() . "" . randVowel() . "" . "" . randConsonant() . "" . randVowel() . "" . randVowel() . "");;
		$username = $x;
		$password = $x;
		$conpassword = $x;
		$email = $x;
		$school = $x;
		$activation = $x;

		$sql = "INSERT INTO users(`id`, `firstname`, `lastname`, `username`, `password`, `email`, `school_id`, `activation`, `active`, `img`, `details`) 
			VALUES('', '$firstname', '$lastname', '$username', '$password', '$email', '$school', '$activation', '1', 'default.jpeg', '1')";
		mysql_query($sql)or die(mysql_error());
		$x++;
	}

?>