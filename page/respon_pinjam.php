<?php
  $No_Pinjam	= $_POST['No_Pinjam'];
  $Tgl_Pinjam	= $_POST['tglPinjam'];
  $Jatuhtempo	= $_POST['tglJatuhtempo'];
  //$No_Buku		= $_POST['No_Buku'];
  $NIM			= $_POST['NIM'];
  $NPP			= $_POST['NPP'];
  
  $proses		= $_POST['proses'];
  
  //$Belum		= "Belum Kembali";
  
  $dataValid="YA";
  if (strlen(trim($No_Pinjam))==0) { 
     echo "Nomor Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }
  if (strlen(trim($Tgl_Pinjam))==0) {
     echo "Tanggal Peminjaman harus diisi terlebih dahulu! <br />";
     $dataValid = "TIDAK";
  }  
  if (strlen(trim($Jatuhtempo))==0) { 
     echo "Tanggal Jatuh Tempo harus diisi terlebih dahulu! <br />";
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

  include "koneksidb.php";

  if ($proses == "Simpan") {
  	$sql = "insert into transaksipinjam
            (No_Pinjam, tglPinjam, tglJatuhtempo, NIM, NPP) 
            values
            ('$No_Pinjam','$Tgl_Pinjam','$Jatuhtempo','$NIM','$NPP')  "; 
	/*$sql2 = "insert into transaksidetail
				('No_Transaksi','tglKembali','No_Pinjam','Status','No_Buku')
				   values
				   ('','','$No_Pinjam','$Belum','$No_Buku')";
	$sql3 = "insert into transaksidetail
				('No_Transaksi','tglKembali','No_Pinjam','Status','No_Buku')
				   values
				   ('','','$No_Pinjam','$Belum','$No_Buku')";
	$sql4 = "insert into transaksidetail
				('No_Transaksi','tglKembali','No_Pinjam','Status','No_Buku')
				   values
				   ('','','$No_Pinjam','$Belum','$No_Buku')";
	$sql5 = "insert into transaksidetail
				('No_Transaksi','tglKembali','No_Pinjam','Status','No_Buku')
				   values
				   ('','','$No_Pinjam','$Belum','$No_Buku')";*/
  } 
  $hasil = mysqli_query($koneksi, $sql);
  /*$hasil2 = mysqli_query($koneksi, $sql2);
  $hasil3 = mysqli_query($koneksi, $sql3);
  $hasil4 = mysqli_query($koneksi, $sql4);
  $hasil5 = mysqli_query($koneksi, $sql5);*/
  if (!$hasil) {
    echo "Gagal Simpan, silakan diulangi! <br /> ".mysql_error();
    echo "<input type='button' value='Kembali'
     onClick='self.history.back()'>";
    exit;
  } else {
	header("location:transaksi_pinjambuku.php");
  }    
    
?>
