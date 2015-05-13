<?php

include'master.php';

$id = $_POST['name'];

$fileName = $_FILES["fileToUpload"]["name"];
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"];
$fileType = $_FILES["fileToUpload"]["type"];
$fileSize = $_FILES["fileToUpload"]["size"];
$fileErrorMsg = $_FILES["fileToUpload"]["error"];
$fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); 
$kaboom = explode(".", $fileName); 
$fileExt = end($kaboom); 
$fileName = $id . "." . $fileExt; 
print_r($_FILES);

if (!$fileTmpLoc) {
    echo "<br>ERROR: Please browse for a file before clicking the upload button.";
    exit();
}  else if($fileSize > 32000000) { 
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); 
    exit();
}  else if (!preg_match("/.(gif|jpg|png|bmp)$/i", $fileName) ) {
     echo "ERROR: Your image was not .gif, .jpg, .bmp or .png.";
     unlink($fileTmpLoc); 
     exit();
}  else if ($fileErrorMsg == 1) { 
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
if (file_exists("images/profile/".$id."/")) {
	$moveResult = move_uploaded_file($fileTmpLoc, "images/profile/".$id."/$fileName");
} else{
	mkdir("images/profile/".$id);
	$moveResult = move_uploaded_file($fileTmpLoc, "images/profile/".$id."/$fileName");
}
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    exit();
}

// echo "The file named <strong>$fileName</strong> uploaded successfuly.<br /><br />";
// echo "It is <strong>$fileSize</strong> bytes in size.<br /><br />";
// echo "It is an <strong>$fileType</strong> type of file.<br /><br />";
// echo "The file extension is <strong>$fileExt</strong><br /><br />";
// echo "The Error Message output for this upload is: $fileErrorMsg";

connect('hmo');

$sql = "UPDATE users SET img = '$fileName' WHERE id = '$id'";
$result = mysql_query($sql);

if($result){
    echo "<script>alert('Image uploaded!'); window.location.href='upload_img.php'; </script>";
}

?>