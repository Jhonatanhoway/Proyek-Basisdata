<?php
include"koneksidb.php";

	$No_Denda		=$_GET['No_Denda'];
	$Jml_denda		=$_POST['Jml_denda'];
	$Biaya			=$_POST['Biaya'];
	$No_Transaksi 	=$_POST['No_Transaksi'];

  
  $dataValid="YA";

  if (strlen(trim($No_Denda))==0) { 
     echo "Nomor Denda harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Jml_denda))==0) { 
     echo "Jumlah denda harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  } 
  if (strlen(trim($Biaya))==0) {
     echo "Biaya Denda harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($No_Transaksi))==0) {
     echo "Nomor Pegembalian Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

 $sql = "update denda set
 				Jml_denda='$Jml_denda',
				Biaya='$Biaya',
				No_Transaksi='$No_Transaksi'
			        where No_Denda = '$No_Denda' ";

$hasil=mysql_query($sql);
if(!$hasil){
die("Gagal simpan data denda....Karena :".mysql_error());
}
else {
	echo "<h2> Berhasil Edit Data PENGEMBALIAN BUKU</h2>";
	header("location:tampil_laporandenda.php");
  }

?>
