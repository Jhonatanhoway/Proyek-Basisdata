<?php
require_once("koneksidb.php");
  $No_Transaksi= $_GET['id'];
  
  $sql = "delete from transaksidetail where No_Transaksi = '$No_Transaksi'";
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil){
	echo "Gagal Hapus Data Pengembalian Buku dengan id: $No_Transaksi<br/>";
  }else {
	header("location:tampil_kembali.php");
  }
?>