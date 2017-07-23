<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>index</title>
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
						<li><a href="data_mhs.php">Input Data/Mahasiswa</a></li>
						<li><a href="tampil_datamhs.php">Tampil/Data Mahasiswa</a></li>
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
	<div id="content">SELAMAT DATANG DI PENGELOLAAN DENDA<br/>
		<img src="gambar/editdata.png"/>
	</div>
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012</div>
	</div>
</body>
</html>