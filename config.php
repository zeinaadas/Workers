<?php
error_reporting(0);


date_default_timezone_set('Asia/Jerusalem');
$host = "localhost";
$user = "root";

$dbname = "workers_website";

$password="";

$connect = new mysqli($host, $user, $password, $dbname);
$connect->set_charset('utf8');
$connect->query("SET collation_connection = utf8_general_ci");
if ($connect->connect_error) {
    die("Connect Error" . $connect->connect_error);
}


	
?>
