<?php
include"koneksidb.php";

$No_Buku	=$_POST['No_Buku'];
$Judul		=$_POST['Judul'];
$Penerbit	=$_POST['Penerbit'];
$Pengarang	=$_POST['Pengarang'];
$Stok		=$_POST['Stok'];

  $dataValid="YA";
  if (strlen(trim($No_Buku))==0) { //validasi isian nama-harus terisi
     echo "Nomor Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Judul))==0) { //validasi isian harga-harus terisi
     echo "Judul bahariharus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Penerbit))==0) { //validasi isian harga-harus terisi
     echo "Penerbit harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Pengarang))==0){
  	echo "Pengarang harus diisi terlebih dahulu! <br /> ";
  }
  if(strlen(trim($Stok))==0){
  	echo "Stok harus diisi terlebih dahulu! <br/>";
  }
  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

 $sql = "update buku set
 				Judul='$Judul',
				 Penerbit ='$Penerbit',
				  Pengarang ='$Pengarang',
				   Stok ='$Stok'
			        where No_Buku = '$No_Buku' ";

$hasil=mysqli_query($koneksi, $sql);
if(!$hasil){
die("Gagal simpan data buku....Karena :".mysql_error());
}
else {
	echo "<h2> Berhasil Edit Data Buku</h2>";
	header("location:tampil_databuku.php");
  }

?>
