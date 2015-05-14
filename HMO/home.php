<?php

session_start();

include 'functions.php';

connect();

if (!logged_in()) {
    header("location:logout.php");
}else{
    $id = $_SESSION['id'];
    $arr = all_info($id);
    header1("home");
}

?>

<!-- 
#191919
#DFE2DB
#FFF056
#FFFFFF
#67645e
#293645 PURPLE
#c7a871 GOLD 
#F9F5EF PINKISH WHITE
#67645e p color with pinkish white

"Century Gothic",Arial,Helvetica,sans-serif-->