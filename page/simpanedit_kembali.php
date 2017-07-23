<?php
include"koneksidb.php";

	$No_Transaksi	=$_GET['No_Transaksi'];
	$tglKembali	 	=$_POST['tglKembali'];
	$No_Pinjam		=$_POST['No_Pinjam'];
	$No_Buku 		=$_POST['No_Buku'];

  
  $dataValid="YA";

  if (strlen(trim($No_Transaksi))==0) { 
     echo "Nomor Pengembalian harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($tglKembali))==0) { 
     echo "Tanggal Pengembalian harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  } 
  if (strlen(trim($No_Pinjam))==0) {
     echo "Nomor Peminjaman Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($No_Buku))==0) {
     echo "Nomor Buku harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if ($dataValid == "TIDAK") {
     echo "Masih Ada Kesalahan, silakan perbaiki! </br>";
     echo "<input type='button' value='Kembali'
      onClick='self.history.back()'>";
     exit;
  }

 $sql = "update transaksidetail set
 				tglKembali='$tglKembali',
				No_Pinjam='$No_Pinjam',
				No_Buku='$No_Buku'
			        where No_Transaksi= '$No_Transaksi' ";

$hasil=mysql_query($sql);
if(!$hasil){
die("Gagal simpan data kembali buku....Karena :".mysql_error());
}
else {
	echo "<h2> Berhasil Edit Data PENGEMBALIAN BUKU</h2>";
	header("location:tampil_kembali.php");
  }

?>
