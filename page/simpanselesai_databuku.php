<?php
$No_Pinjam	= $_POST['No_Pinjam'];
$Belum		= "Belum Kembali";
$No_Buku	= $_POST['No_Buku'];

$submit		= $_POST['submit'];  

$dataValid="YA";
  if (strlen(trim($No_Pinjam))==0) { 
     echo "Nomor Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
if (strlen(trim($No_Buku))==0) { 
     echo "Nomor Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

include "koneksidb.php";

  if ($submit == "Selesai") {
  	$sql = "insert into transaksidetail
            (No_Pinjam,Status,No_Buku) 
            values
            ('$No_Pinjam','$Belum','$No_Buku')  ";   
	/*$sql2 = "insert into transaksidetail
            (No_Transaksi,tgl_Kembali,No_Pinjam,Status,No_Buku) 
            values
            ('','','$No_Pinjam','$Belum','$No_Buku')  "; 
	$sql3 = "insert into transaksidetail
            (No_Transaksi,tgl_Kembali,No_Pinjam,Status,No_Buku) 
            values
            ('','','$No_Pinjam','$Belum','$No_Buku')  "; 
	$sql4 = "insert into transaksidetail
            (No_Transaksi,tgl_Kembali,No_Pinjam,Status,No_Buku) 
            values
            ('','','$No_Pinjam','$Belum','$No_Buku')  "; */
  } 
  $hasil  = mysqli_query($koneksi, $sql);
  //$hasil2 = mysqli_query($koneksi, $sql2);
  //$hasil3 = mysqli_query($koneksi, $sql3);
  //$hasil4 = mysqli_query($koneksi, $sql4);
  if (!$hasil) {
    echo "Gagal Simpan data buku yang dipinjam, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } else {
	header("location:index.php");
  }    
?>