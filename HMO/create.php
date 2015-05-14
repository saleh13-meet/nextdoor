<?php

session_start();

include 'functions.php';

connect();

if (!logged_in()) {
    header("location:logout.php");
}else{
    $id = $_SESSION['id'];
    $arr = all_info($id);
    header1("create");
}

?>