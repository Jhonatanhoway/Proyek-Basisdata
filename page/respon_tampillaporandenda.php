<?php
session_start();

  $No_Denda		= $_POST['No_Denda'];
  $No_Transaksi	= $_POST['No_Transaksi'];
  $Jml_denda	= $_POST['Jml_denda'];
  $Biaya		= $_POST['Biaya'];
  
  $proses	= $_POST['proses'];
  
  $dataValid="YA";
  if (strlen(trim($No_Denda))==0) { 
     echo "Nomor Denda harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($No_Transaksi))==0) {
     echo "Nomor Transaksi harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Jml_denda))==0) { 
     echo "Jumlah Denda harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
 }
  if (strlen(trim($Biaya))==0) {
     echo "Biaya Denda harus diisi terlebih dahulu! <br />";
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
  	$sql = "insert into denda 
            (No_Denda, Jml_denda, Biaya, No_Transaksi) 
            values
            ('$No_Denda','$Jml_denda','$Biaya','$No_Transaksi')  ";   
  } 
  $hasil = mysql_query($sql);
  if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } else {
	header("location:index.php");
  }    
    
?>