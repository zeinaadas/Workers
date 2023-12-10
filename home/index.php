<?php
ob_start();
//session_start();
include 'sessions.php';
date_default_timezone_set('Asia/Jerusalem');
//error_reporting(0);
$pages_dir = 'pages';

?>


<!DOCTYPE html>

<html lang="en" dir="rtl" class=" flexbox flexwrap">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
<meta property="og:site_name" content="">
<title><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_head_title';"))['value']; ?></title>


<link rel="stylesheet" type="text/css" href="./resources/css/sys.css"/>
<link rel="stylesheet" type="text/css" href="./resources/css/google_icons.css"/>
<link rel="stylesheet" type="text/css" href="./resources/css/style_custom.css"/>

<link rel="stylesheet" type="text/css" href="./resources/css/w3-showslide.css"/>

 
<script src="./resources/js/jquery-3.3.1.min.js"></script>
 



</head>



<body class="logged-out  home--page ds-loader  linux pace-done">




<?php


include './template/header/index.php';
include './template/content_pages/index.php';
include './template/footer/index.php';

?>




</body></html>
