<?php
include"koneksidb.php";

$NPP		=$_POST['NPP'];
$Username	=$_POST['Username'];
$Password	=$_POST['Password'];

  
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

 $sql = "update petugas set
 				Username='$Username',
				 Password='$Password'
			        where NPP = '$NPP' ";

$hasil=mysqli_query($koneksi, $sql);
if(!$hasil){
die("Gagal simpan data petugas....Karena :".mysql_error());
}
else {
	echo "<h2> Berhasil Edit Data PETUGAS</h2>";
	header("location:tampil_daftarpetugas.php");
  }

?>
