<?php
require_once("koneksidb.php");
  $No_Denda= $_GET['id'];
  
  $sql = "delete from denda where No_Denda = '$No_Denda'";
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil){
	echo "Gagal Hapus Data Denda Buku dengan id: $No_Denda<br/>";
  }else {
	header("location:tampil_laporandenda.php");
  }
?>