<?php
session_start();

  $No_Pinjam  		= $_POST['No_Pinjam'];
  $tglPinjam		= $_POST['tglPinjam'];
  $tglJatuhtempo	= $_POST['tglJatuhtempo'];
  $jumlahPinjam		= $_POST['jumlahPinjam'];
  $No_Buku			= $_POST['No_Buku'];
  $NIM				= $_POST['NIM'];
  $NPP				= $_POST['NPP'];
  
  $proses	= $_POST['proses'];
  
  $dataValid="YA";
  if (strlen(trim($No_Pinjam))==0) { 
     echo "Nomor Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($tglPinjam))==0) {
     echo "Tanggal peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($tglJatuhtempo))==0) { 
     echo "Tanggal Jatuh Tempo harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
 }
  if (strlen(trim($jumlahPinjam))==0) {
     echo "Jumlah peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($No_Buku))==0) { 
     echo "Nomor Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  } 
   }
  if (strlen(trim($NIM))==0) {
     echo "NIM harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($NPP))==0) { 
     echo "NPP harus diisi terlebih dahulu! <br />";
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
  	$sql = "insert into transaksipinjam 
            (No_Pinjam, tglPinjam, tglJatuhtempo, jumlahPinjam, No_Buku, NIM, NPP) 
            values
            ('$No_Pinjam','$tglPinjam','$tglJatuhtempo','$jumlahPinjam','$No_Buku','$NIM','$NPP')  ";   
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