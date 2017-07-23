<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/perpus.jpg">
<title>transaksi peminjaman buku</title>
<link rel="stylesheet" href="../css/style.css"/>
<link rel="stylesheet" href="../css/style_mhs.css"/>
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
<div id="form4">
	<h1>FORM TRANSAKSI PEMINJAMAN BUKU</h1>
	<form action='simpanselesai_databuku.php' method='post' enctype='multipart/form-data'>
		<table  id='tbl' border='0' align='center'>
		<caption>SILAKAN ISI FORM DIBAWAH INI</caption>
<?php
$StrSQL="select * from transaksipinjam";
$result1=mysqli_query($koneksi, $StrSQL);
?>
		<tr>
	    	<td>Nomor Peminjaman</td>
	    	<td>
				<select name="No_Pinjam">
				<?php
				while($row=mysqli_fetch_row($result1))
				{
					echo "<option value='". $row[0] ."'>"	. $row[0];
				}
				?>
				</select>
			</td>
	    </tr>
<?php
$StrSQL="select * from buku";
$result4=mysqli_query($koneksi, $StrSQL);
?>
		<tr>
	     	<td>Judul Buku 1</td>
			<td>
				<select name="No_Buku">
				<option value=''>---Pilih Buku---</option>
				<?php
				while($row=mysqli_fetch_row($result4))
				{
					echo "<option value='". $row[0] ."'>"	. $row[1];
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
	     	<td colspan='2' align='center'>
	      	<input type='reset' value='Reset' name='reset' class='button'/>
			<input type='submit' value='Selesai' name='submit' class='button'/>
	     	</td>
	    </tr>
	</table>
	</form>
</div>
	<div id="footer">Copyright &copy; 2015</div>
	</div>
</body>
</html>