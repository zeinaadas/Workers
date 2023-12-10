<?php

ob_start();
session_start();
include '../config.php';

if (!isset($_SESSION['sessionname']) && !isset($_SESSION['sessionpass'])) {
    echo"<meta http-equiv='Refresh' content='1;url=../home/index.php?page=login_admin'/>";
    exit;
} else {
    session_destroy();
    echo"<meta http-equiv='Refresh' content='1;url=../home/index.php?page=login_admin'/>";
    exit;
}
session_unset();
ob_end_flush();
?>
