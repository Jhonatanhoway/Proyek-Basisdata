<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mnatap.jpg">
<title>edit data buku</title>
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
						<li><a href="data_mhs.php">Input Data Mahasiswa</a></li>
						<li><a href="tampil_datamhs.php">Tampil Data Mahasiswa</a></li>
					</ul>
				</li>
				<li><a href="#">Buku</a>
					<ul>
						<li><a href="data_buku.php">Input  Buku</a></li>
						<li><a href="tampil_databuku.php">Tampil Data Buku</a></li>
					</ul>
				</li>
				<li><a href="#">Petugas</a>
					<ul>
						<li><a href="petugas.php">Input Data  Petugas</a></li>
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
if (isset($_GET['No_Buku']) and !empty($_GET['No_Buku'])) { $id = $_GET['No_Buku']; } else {$id=0;};
	$sql = "select * from buku where No_Buku='$id'";
	$hasil = mysqli_query($koneksi, $sql);
	if (!$hasil) die("Gagal Query Buku");
	$row = mysqli_fetch_assoc($hasil);
	
	$Judul		=$row['Judul'];
	$Penerbit	=$row['Penerbit'];
	$Pengarang	=$row['Pengarang'];
	$Stok	    =$row['Stok'];
	
?>

<title>Edit Data Buku</title>
<link rel="stylesheet" href="../css/style_mhs.css"/>
<body bgcolor="#df9233">

<div id="cari">
<h2>.:: UPDATE DATA BUKU::.</h2>

<h2>SILAKAN UPDATE FORM DIBAWAH INI</h2>
<form action='simpanedit_databuku.php' method='post' enctype='multipart/form-data'>
<table id='tbl' border='0' align='center'>
<?php
$StrSQL="select * from buku where No_Buku='".$id."'";
$result=mysqli_query($koneksi, $StrSQL);
$data=mysqli_fetch_array($result);
?>
	<tr>
     	<td>Nomor Buku</td>
     	<td><input type='text' name='No_Buku' maxlength='8' size='10' value='<?php echo $data['No_Buku'];?>' /></td>
    </tr>
    <tr>
    	<td>Judul Buku</td>
     	<td><input type='text' name='Judul' maxlength='50' size='50' value='<?php echo $data['Judul'];?>'/></td>
    </tr>
	<tr>
     	<td>Penerbit</td>
     	<td><input type='text' name='Penerbit' maxlength='50' size='50' value='<?php echo $data['Penerbit'];?>'/></td>
    </tr>
	<tr>
     	<td>Pengarang</td>
     	<td><input type='text' name='Pengarang' maxlength='50' size='50' value='<?php echo $data['Pengarang'];?>'/></td>
    </tr>
	<tr>
		<td>Stok</td>
		<td><input type='text' name='Stok' maxlength='15' size='8' value='<?php echo $data['Stok'];?>'/></td>
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