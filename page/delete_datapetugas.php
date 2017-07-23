<?php
require_once("koneksidb.php");
  $NPP = $_GET['id'];
  
  $sql = "delete from petugas where NPP = '$NPP'";
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil){
	echo "Gagal Hapus Data Petugas dengan id: $NPP<br/>";
  }else {
	header("location:tampil_daftarpetugas.php");
  }
?>