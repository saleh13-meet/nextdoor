<?php

include 'functions.php';

$id = $_POST['name'];

// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); 
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension
$fileName = $id . "." . $fileExt; //change file name

if (!$fileTmpLoc) { // if file not chosen
    echo "<br>ERROR: Please browse for a file before clicking the upload button.";
    exit();
}  else if($fileSize > 32000000) { // if file size is larger than 5 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
}  else if (!preg_match("/.(gif|jpg|png|bmp)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, .bmp or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
}  else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}

// while (file_exists("images/profile/".$id."/old")) {
// 	# code...
// }

// END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into my "images" folder now using the move_uploaded_file() function
if (file_exists("images/profile/".$id."/")) {
	// if (file_exists("images/profile/".$id."/".$fileName)) {
	// 	rename("images/profile/".$id."/".$fileName, "images/profile/".$id."/old".$x.".jpg");
	// }
	$moveResult = move_uploaded_file($fileTmpLoc, "images/profile/".$id."/$fileName");
} else{
	mkdir("images/profile/".$id);
	$moveResult = move_uploaded_file($fileTmpLoc, "images/profile/".$id."/$fileName");
}
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    exit();
}

// Display things to the page so you can see what is happening for testing purposes
// echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
// echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
// echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
// echo "The file extension is <strong>$fileExt</strong><br /><br />";
// echo "The Error Message output for this upload is: $fileErrorMsg";

connect("u354510632_saleh");

$sql = "UPDATE users SET img = '$fileName' WHERE id = '$id'";
$result = mysql_query($sql);

echo "<script>window.location.href='profile.php?id=$id'</script>";

?>