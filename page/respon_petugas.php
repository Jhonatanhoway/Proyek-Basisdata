<?php

  $NPP	  	= $_POST['NPP'];
  $Username	= $_POST['Username'];
  $Password	= $_POST['Password'];
  $proses	= $_POST['proses'];
  
  $dataValid="YA";
  if (strlen(trim($NPP))==0) { 
     echo "NPP harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Username))==0) {
     echo "Username harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Password))==0) { 
     echo "Password harus diisi terlebih dahulu! <br />";
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
  	$sql = "insert into petugas
            (NPP,Username,Password) 
            values
            ('$NPP','$Username','$Password')  ";   
  } 
  $hasil = mysqli_query($koneksi, $sql);
  if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } else {
	header("location:index.php");
  }    
    
?>