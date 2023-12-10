<?php
error_reporting(0);

ob_start();
session_start();
include '../config.php';
//include '../../config.php';
include '../../../config.php';//use it when call session from /search-select-list/controller/functions.php

if(!isset($_SESSION['sessionname']) && !isset($_SESSION['sessionpass'])){
	echo"<meta http-equiv='Refresh' content='0;url=../home/index.php?page=login_admin'/>";
	exit;
	}
ob_end_flush();
?>
