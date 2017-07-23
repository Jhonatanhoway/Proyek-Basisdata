<?php
session_start();
?>
<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "denda";

	$koneksi=mysqli_connect($host,$user,$pass,$dbname);
	if (!$koneksi)
	die ("Gagal Koneksi karena ".mysql_error());
	
?>