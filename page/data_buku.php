<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>data buku</title>
<link rel="stylesheet" href="../css/style.css"/>
<link rel="stylesheet" href="../css/style_mhs.css"/>
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
						<li><a href="data_buku.php">Input Data  Buku</a></li>
						<li><a href="tampil_databuku.php">Tampil Data Buku</a></li>
					</ul>
				</li>
				<li><a href="#">Petugas</a>
					<ul>
						<li><a href="petugas.php">Inpu Data Petugas</a></li>
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
	<div id="form2">
		<h2>FORM INPUT DATA BUKU</h2>
		<form action='respon_databuku.php' method='post' enctype='multipart/form-data'>
			<table  id='tbl' border='0' align='center'>
			<caption>SILAKAN ISI FORM DIBAWAH INI</caption>
			<tr>
		    	<td>Nomor Buku</td>
		    	<td><input type='text' name='No_Buku' maxlength='9' size='15' placeholder="No_Buku" /></td>
		    </tr>
		    <tr>
		     	<td>Judul</td>
		     	<td><input type='text' name='Judul' maxlength='50' size='50' placeholder="Judul Buku" /></td>
		    </tr>
			<tr>
		     	<td>Penerbit</td>
		     	<td><input type='text' name='Penerbit' maxlength='50' size='20' placeholder="Nama Penerbit" /></td>
		    </tr>
			<tr>
		     	<td>Pengarang</td>
		     	<td><input type='text' name='Pengarang' maxlength='50' size='20' placeholder="Nama Pengarang" /></td>
		    </tr>
			<tr>
		     	<td>Stok</td>
		     	<td><input type='text' name='Stok' maxlength='15' size='8' placeholder="Stok Buku" /></td>
		    </tr>
			<tr>
		     	<td colspan='2' align='center'>
		      	<input type='submit' value='Simpan' name='proses' class='button' onClick="konfirmasi()"/>
		      	<input type='reset' value='Reset' name='reset' class='button'/>
		     	</td>
		    </tr>
		</table>
		</form>
	</div>
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012</div>
	</div>
</body>
</html>