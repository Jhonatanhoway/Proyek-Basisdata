<?php

  $No_Transaksi	= $_POST['No_Transaksi'];
  $Tgl_Kembali	= $_POST['tglKembali'];
  $No_Pinjam	= $_POST['No_Pinjam'];
  $tglPinjam	= $_POST['tglPinjam'];
  
  $proses		= $_POST['proses'];
  
  $Kembali		= "Sudah Kembali";


  
  $dataValid="YA";
  if (strlen(trim($No_Transaksi))==0) {
     echo "Nomor Transaksi harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Tgl_Kembali))==0) { 
     echo "Tanggal Kembali harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  } 
  if (strlen(trim($tglPinjam))==0) { 
     echo "Tanggal Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  } 
  if (strlen(trim($No_Pinjam))==0) { 
     echo "Nomor Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  } 
  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

  include "koneksidb.php";

  if ($proses == "Simpan") {
 
	
  	$sql = "insert into transaksidetail
            (No_Transaksi, tglKembali, No_Pinjam, Status) 
            values
            ('$No_Transaksi','$Tgl_Kembali','$No_Pinjam','$Kembali')  ";
  } 
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } else {
	header("location:hitung_denda.php");
  }    
    
?>