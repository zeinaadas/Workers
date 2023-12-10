<?php

ob_start();
session_start();
include '../config.php';

if (!isset($_SESSION['sessionnameclients']) && !isset($_SESSION['sessionpassclients'])) {
    echo"<meta http-equiv='Refresh' content='1;url=login.php'/>";
    exit;
} else {
    session_destroy();
    echo"<meta http-equiv='Refresh' content='1;url=../home/index.php?page=login_client'/>";
    exit;
}
session_unset();
ob_end_flush();
?>
