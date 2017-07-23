<?php

  $No_Buku	= $_POST['No_Buku'];
  $Judul	= $_POST['Judul'];
  $Penerbit	= $_POST['Penerbit'];
  $Pengarang= $_POST['Pengarang'];
  $Stok		= $_POST['Stok'];
  $proses	= $_POST['proses'];

  if (strlen(trim($No_Buku))==0) { //validasi isian nama-harus terisi
     echo "Nomor Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Judul))==0) { //validasi isian harga-harus terisi
     echo "Judul bahari harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Penerbit))==0) { //validasi isian harga-harus terisi
     echo "Penerbit harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Pengarang))==0) { //validasi isian harga-harus terisi
     echo "Pengarang harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Stok))==0) { //validasi isian harga-harus terisi
     echo "Stok harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

  include "koneksidb.php";
  //menambahkan isian foto
  if ($proses == "Simpan") {
  	$sql = "insert into buku
            (No_buku,Judul,Penerbit,Pengarang,Stok) 
            values
            ('$No_Buku','$Judul','$Penerbit','$Pengarang','$Stok')  ";   
  } 
  $hasil = mysqli_query($koneksi,$sql);
  if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } else {
	header("location:index.php");
  }  
?>