<?php
include"koneksidb.php";

	$No_Pinjam		=$_GET['No_Pinjam'];
	$tglPinjam 		=$_POST['tglPinjam'];
	$tglJatuhtempo 	=$_POST['tglJatuhtempo'];
	$jumlahPinjam 	=$_POST['jumlahPinjam'];
	$No_Buku 		=$_POST['No_Buku'];
	$NIM 			=$_POST['NIM'];
	$NPP 			=$_POST['NPP'];

  
  $dataValid="YA";

  if (strlen(trim($No_Pinjam))==0) { 
     echo "Nomor Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($tglPinjam))==0) { 
     echo "Tanggal Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($tglJatuhtempo))==0) {
     echo "Tanggal Jatuh Tempo harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
   if (strlen(trim($jumlahPinjam))==0) {
     echo "Jumlah Peminjaman Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
   if (strlen(trim($No_Buku))==0) {
     echo "Nomor Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
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

 $sql = "update transaksipinjam set
 				tglPinjam='$tglPinjam',
				tglJatuhtempo='$tglJatuhtempo',
				jumlahPinjam='$jumlahPinjam',
				No_Buku='$No_Buku',
				NIM='$NIM',
				NPP='NPP'
			        where No_Pinjam= '$No_Pinjam' ";

$hasil=mysql_query($sql);
if(!$hasil){
die("Gagal simpan data pinjaman buku....Karena :".mysql_error());
}
else {
	echo "<h2> Berhasil Edit Data PEMINJAMAN BUKU</h2>";
	header("location:tampil_pinjam.php");
  }

?>
