<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/perpus.jpg">
<title>edit data mahasiswa</title>
<link rel="stylesheet" href="../css/style.css"/>
<div id="wrap">
	<div id="header">
		<div id="title">
			<img src="gambar/aka.png"/><br/>Sistem Pengelolaan Denda di Perpusakaan STMIK AKAKOM Yogyakarta</div>
		<div id="gambar">
			<img src="gambar/library.png"/>
			<img src="gambar/library.png"/>
			<img src="gambar/library.png"/>
		</div>
	</div>
	<div id="kiri">
		<div id="menu">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Mahasiswa</a>
					<ul>
						<li><a href="data_mhs.php">Insert Mahasiswa</a></li>
						<li><a href="tampil_datamhs.php">Data Mahasiswa</a></li>
					</ul>
				</li>
				<li><a href="#">Buku</a>
					<ul>
						<li><a href="data_buku.php">Insert Buku</a></li>
						<li><a href="tampil_databuku.php">Data Buku</a></li>
					</ul>
				</li>
				<li><a href="#">Petugas</a>
					<ul>
						<li><a href="petugas.php">Insert Petugas</a></li>
						<li><a href="tampil_daftarpetugas.php">Daftar Petugas</a></li>
					</ul>
				</li>
				
				<li><a href="#">Transaksi</a>
					<ul>
						<li><a href="transaksi_pinjam.php">Peminjaman Buku</a></li>
						<li><a href="transaksi_kembali.php">Pengembalian Buku</a></li>
					</ul>
				</li>
				<li><a href="#">Laporan</a>
					<ul>
						<li><a href="tampil_pinjam.php">Laporan Peminjaman Per Periode</a></li>
						<li><a href="tampil_kembali.php">Laporan Pengembalian Per Periode</a></li>
						<li><a href="tampil_laporandenda.php">Laporan Denda Per Periode</a></li>
						<li><a href="tampil_laporansemua.php">Laporan Semua</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div id="banner">
			<img src="gambar/library.png"/>
		</div>
	</div>
<div id="form">
<?php
include_once "koneksidb.php"; 
	if (isset($_GET['NIM']) and !empty($_GET['NIM'])) { $id = $_GET['NIM']; } else {$id=0;};
	$sql = "select * from mahasiswa where NIM=$id";
	$hasil = mysqli_query($koneksi, $sql);
	if (!$hasil) die("Gagal Query Mahasiswa");
	$row = mysqli_fetch_assoc($hasil);
	
	$Nama 	=$row['Nama'];
	$Prodi	=$row['Prodi'];	
?>

<title>Edit Data Mahasiswa</title>
<link rel="stylesheet" href="../css/style_mhs.css"/>
<body bgcolor="#df9233">
<h2>.:: UPDATE DATA MAHASISWA::.</h2>
<h2>SILAKAN UPDATE FORM DIBAWAH INI</h2>
<form action='simpanedit_datamhs.php' method='post' enctype='multipart/form-data'>
<table id='tbl' border='0' align='center'>
<?php
$StrSQL="select * from mahasiswa where NIM='".$id."'";
$result=mysqli_query($koneksi, $StrSQL);
$data=mysqli_fetch_array($result);
?>
	<tr>
    	<td>NIM</td>
    	<td><input type='text' name='NIM' maxlength='9' size='15' placeholder="NIM" /></td>
    </tr>
    <tr>
     	<td>Nama Lengkap</td>
     	<td><input type='text' name='Nama' maxlength='50' size='50' placeholder="Nama Mahasiswa" /></td>
    </tr>
	<tr>
     	<td>Prodi</td>
     	<td><input type='text' name='Prodi' maxlength='50' size='7' placeholder="Prodi" /></td>
    </tr>
	<tr>
    	<td colspan='2' align='center'>
      		<input type='reset' name='reset' value='Reset' class='button'/>
			<input type='submit' name='submit' value='Update' class='button'/>
     	</td>
    </tr>

</table>
</form>
</body>
	</div>
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012</div>
	</div>
</body>
</html>