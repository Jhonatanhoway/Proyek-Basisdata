<?php
include"koneksidb.php";

$NIM	=$_POST['NIM'];
$Nama	=$_POST['Nama'];
$Prodi	=$_POST['Prodi'];

  
  $dataValid="YA";

  if (strlen(trim($NIM))==0) { 
     echo "NIM harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Nama))==0) { 
     echo "Nama Lengkap harus diisi terlebih dahulu! <br />";
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

$sql = "update mahasiswa set
 				Nama='$Nama',
				 Prodi ='$Prodi'
			        where NIM = '$NIM' ";

$hasil=mysqli_query($koneksi, $sql);
if(!$hasil){
die("Gagal simpan data mahasiswa....Karena :".mysql_error());
}
else {
	echo "<h2> Berhasil Edit Data Mahasiswa</h2>";
	header("location:tampil_datamhs.php");
  }

?>