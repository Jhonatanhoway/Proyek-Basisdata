
<?php

  $NIM	  	= $_POST['NIM'];
  $Nama		= $_POST['Nama'];
  $Prodi	= $_POST['Prodi'];
  
  $proses	= $_POST['proses'];
  
  $dataValid="YA";
  if (strlen(trim($NIM))==0) { 
     echo "NIM harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Nama))==0) {
     echo "Nama Mahasiswa harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Prodi))==0) { 
     echo "Program Studi harus diisi terlebih dahulu! <br />";
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
  	$sql = "insert into mahasiswa 
            (NIM,Nama,Prodi) 
            values
            ('$NIM','$Nama','$Prodi')  ";   
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