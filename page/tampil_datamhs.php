<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>tampil data mahasiswa</title>
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
						<li><a href="tampil_databuku.php">Tampil Data Buku</a></li>
					</ul>
				</li>
				<li><a href="#">Petugas</a>
					<ul>
						<li><a href="petugas.php">Input Data Petugas</a></li>
						<li><a href="tampil_daftarpetugas.php">Tampil Daftar Petugas</a></li>
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
if (isset($_GET['NIM']) and !empty($_GET['NIM'])) { $id = $_GET['NIM']; } else {$id=0;};
$sql ="select * from mahasiswa where NIM= $id";
$hasil=mysqli_query($koneksi,$sql);
if(!$hasil)
die("Gagal query..".mysql_error());
?>
<head>
<link rel="stylesheet" href="../css/style_mhs.css"/>
</head>
<body bgcolor="#df9233">
<table border='1' align='center' cellpadding="0" cellspacing="0">
<caption><b>DAFTAR MAHASISWA</b></caption>
<tr bgcolor='#d5781c' align='center'>
<th>NIM</th>
<th>Nama Mahasiswa</th>
<th>Program Studi</th>
<th colspan="6">Proses</th>
<th></th>
</tr>
<?php
$sql ="select NIM, Nama, Prodi from mahasiswa";
$hasil=mysqli_query($koneksi,$sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['NIM']."</td>";
echo "<td> ".$row['Nama']."</td>";
echo "<td> ".$row['Prodi']."</td>";
echo "<td colspan='5'> <i><a href='edit_datamhs.php?id=".$row['NIM']."'>update</a> </i></td>";
echo "<td><i><a href='delete_datamhs.php?id=".$row['NIM']."'>delete</a> </i></td>";
echo "</tr>";
}
?>
</table>


<center><input type='button' value='CETAK' class='button' onclick='javascript:print();'></center>


</body>
	</div>
	<div id="footer">Copyright &copy; Jhontan Howay/133210012</div>
	</div>
</body>
</html>