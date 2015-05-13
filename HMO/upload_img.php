<?php

include 'master.php';

header1(true);

session_start();

$id = $_SESSION['id'];

?>

<div id="up_img">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="hidden" name="name" value="<?php echo $id; ?>">
	    <input type="submit" value="Upload Image" name="submit">
	</form>
</div>