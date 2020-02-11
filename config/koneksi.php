<?php
// koneksi server
$server ="localhost";
$user ="root";
$password="";
$koneksi=mysql_connect($server,$user,$password);
//koneksi ke database
$dbName="a_mading";
mysql_select_db($dbName,$koneksi);
?>
