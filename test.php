<?php

	session_start();
	include 'functions.php';
	connect("u839756306_saleh");
	check_logged_in_and_active();
	$id = $_SESSION['id'];
	header1("index.css", True, "<a href='profile.php?id=".$id."'><img src='images/Logo_2.jpg' width='293' height='63'></a></div>", "");

	// $mystring = 'saleh<';
	// $findme = "[^'£$%^&*()}{@:'#~><>,;@|\-=-_+-¬`]1234567890";
	// $pos = strpos($mystring, $findme);

	// Note our use of ===.  Simply == would not work as expected
	// because the position of 'a' was the 0th (first) character.
	// if ($pos === false) {
	//     echo "The string '$findme' was not found in the string '$mystring'";
	// } else {
	//     echo "The string '$findme' was found in the string '$mystring'";
	//     echo " and exists at position $pos";
	// }

?>

<html>
<body>
	<div id="container">
		<form  id="login" action="uploadFile.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <br>
	    <input type="hidden" name="name" value="<?php echo $id ?>">
	    <input type="submit" value="Upload Image" name="submit" id="mtop">
		</form>
	</div>

</body>
</html>