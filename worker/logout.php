<?php

ob_start();
session_start();
include '../config.php';

if (!isset($_SESSION['sessionnameworker']) && !isset($_SESSION['sessionpassworker'])) {
    echo"<meta http-equiv='Refresh' content='1;url=../home/index.php?page=login_worker'/>";
    exit;
} else {
    session_destroy();
    echo"<meta http-equiv='Refresh' content='1;url=../home/index.php?page=login_worker'/>";
    exit;
}
session_unset();
ob_end_flush();
?>
