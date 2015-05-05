<?php



include 'functions.php';

connect("u839756306_saleh");



$activation = $_GET['key'];



$sql = "UPDATE users SET active = 1 WHERE activation = '$activation' LIMIT 1";

$result = mysql_query($sql);



if ($result) {

	echo "<script>alert('email address confirmed please login!'); window.location.href='index.php'</script>";

}else{

	echo "<script>alert('something went wrong please try again... or contact me'); window.location.href='index.php'</script>";

}



?>