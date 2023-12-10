<?php

//ini_set('display_errors','Off');//hide all msg of error and warning

error_reporting(0);

ob_start();
session_start();

if (file_exists('../config.php')) {
	include '../config.php';// this is for index.php
}

if (file_exists('../../config.php')) {
	include '../../config.php';//this is for ajax in pages/sub_main.php 
}


$_SESSION['sessionnameshopper'] = "visitor";
$_SESSION['sessionpassshopper'] = "no-constraint";
$_SESSION['sessionidshopper'] = "-1";


ob_end_flush();
?>
