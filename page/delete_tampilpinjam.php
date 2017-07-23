<?php
require_once("koneksidb.php");
  $No_Pinjam= $_GET['id'];
  
  $sql = "delete from transaksipinjam where No_Pinjam = '$No_Pinjam'";
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil){
	echo "Gagal Hapus Data Peminjaman Buku dengan id: $No_Pinjam<br/>";
  }else {
	header("location:tampil_pinjam.php");
  }
?>