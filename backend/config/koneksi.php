<?php
date_default_timezone_set('Asia/Singapore');

$server = "localhost";
$username = "root";
$password = "";
$database = "a_mading";

mysql_connect($server,$username,$password) or die ("Gagal");
mysql_select_db($database) or die ("Database tidak ditemukan");
?>
