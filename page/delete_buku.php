<?php
require_once("koneksidb.php");
  $No_Buku = $_GET['id'];
  
  $sql = "delete from buku where No_Buku = '$No_Buku'";
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil){
	echo "Gagal Hapus Data Buku dengan id: $No_Buku<br/>";
  }else {
	header("location:tampil_databuku.php");
  }
?>