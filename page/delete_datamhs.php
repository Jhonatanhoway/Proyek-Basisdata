<?php
require_once("koneksidb.php");
  $NIM = $_GET['id'];
  
  $sql = "delete from mahasiswa where NIM = '$NIM'";
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil){
	echo "Gagal Hapus Data Mahasiswa dengan id: $NIM<br/>";
  }else {
	header("location:tampil_datamhs.php");
  }
?>