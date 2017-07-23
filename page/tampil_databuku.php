<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>tampil data buku</title>
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
						<li><a href="data_buku.php">Input Data Buku</a></li>
						<li><a href="tampil_databuku.php">Data Buku</a></li>
					</ul>
				</li>
				<li><a href="#">Petugas</a>
					<ul>
						<li><a href="petugas.php">Input Data Petugas</a></li>
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
<div id="form1">
<?php
include_once 'koneksidb.php';
if (isset($_GET['No_Buku']) and !empty($_GET['No_Buku'])) { $id = $_GET['No_Buku']; } else {$id=0;};
$sql ="select * from buku where No_Buku= $id";
$hasil=mysqli_query($koneksi, $sql);
if(!$hasil)
die("Gagal query..".mysql_error());
?>
<head>
<link rel="stylesheet" href="../css/style_mhs.css"/>
</head>
<body bgcolor="#df9233">
<table border='1' align='center' cellpadding="0" cellspacing="0">
<caption><b>DAFTAR BUKU PERPUSTAKAAN STMIK AKAKOM YOGYAKARTA</b></caption>
<tr bgcolor='#d5781c' align='center'>
<th>No Buku</th>
<th>Judul</th>
<th>Penerbit</th>
<th>Pengarang</th>
<th>Stok</th>
<th colspan="6">Proses</th>
<th></th>
</tr>
<?php
$sql ="select No_Buku, Judul, Penerbit, Pengarang, Stok from buku";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row = mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['No_Buku']."</td>";
echo "<td> ".$row['Judul']."</td>";
echo "<td> ".$row['Penerbit']."</td>";
echo "<td> ".$row['Pengarang']."</td>";
echo "<td> ".$row['Stok']."</td>";
echo "<td colspan='5'> <i><a href='edit_databuku.php?id=".$row['No_Buku']."'>update</a> </i></td>";
echo "<td><i><a href='delete_buku.php?id=".$row['No_Buku']."'>delete</a> </i></td>";
echo "</tr>";
}
?>
</table>


<center><input type='button' value='CETAK' class='button' onclick='javascript:print();'></center>


</body>
	</div>
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012</div>
	</div>
</body>
</html>