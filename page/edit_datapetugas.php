<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>edit data petugas</title>
<link rel="stylesheet" href="../css/style.css"/>
<div id="wrap">
	<div id="header">
		<div id="title">
			<img src="gambar/1.png"/><br/></div>
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
<div id="form3">
<?php
include_once "koneksidb.php"; 
	if (isset($_GET['NPP']) and !empty($_GET['NPP'])) { $id = $_GET['NPP']; } else {$id=0;};
	$sql = "select * from petugas where NPP='$id'";
	$hasil = mysqli_query($koneksi, $sql);
	if (!$hasil) die("Gagal Query Petugas");
	$row = mysqli_fetch_assoc($hasil);
	
	$Username =$row['Username'];
	$Password =$row['Password'];	
?>

<title>Edit Data Petugas</title>
<link rel="stylesheet" href="../css/style_mhs.css"/>
<body bgcolor="#df9233">
<div id="cari">
<h3>.:: UPDATE DATA PETUGAS::.</h3>

<h3>SILAKAN UPDATE FORM DIBAWAH INI</h3>
<form action='simpanedit_datapetugas.php' method='post' enctype='multipart/form-data'>
<table id='tbl' border='0' align='center'>
<?php
$StrSQL="select * from petugas where NPP='".$id."'";
$result=mysqli_query($koneksi, $StrSQL);
$data=mysqli_fetch_array($result);
?>
	<tr>
    	<td>NPP</td>
    	<td><input type='text' name='NPP' maxlength='15' size='20' placeholder="NPP" /></td>
    </tr>
    <tr>
     	<td>Username</td>
     	<td><input type='text' name='Username' maxlength='50' size='15' placeholder="Username" /></td>
    </tr>
	<tr>
     	<td>Password</td>
     	<td><input type='text' name='Password' maxlength='50' size='15' placeholder="Password" /></td>
    </tr>
	<tr>
    	<td colspan='2' align='center'>
      		<input type='reset' name='reset' value='Reset' class='button'/>
			<input type='submit' name='submit' value='Update' class='button'/>
     	</td>
    </tr>

</table>
</form>
</div>
</body>
	</div>
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012</div>
	</div>
</body>
</html>