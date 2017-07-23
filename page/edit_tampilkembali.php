<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>edit data pengembalian buku</title>
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
					</ul>
				</li>
			</ul>
		</div>
		<div id="banner">
			<img src="gambar/library.png"/>
		</div>
	</div>
<div id="form4">
<?php
include_once "koneksidb.php"; 
	if (isset($_GET['No_Transaksi']) and !empty($_GET['No_Transaksi'])) { $id = $_GET['No_Transaksi']; } else {$id=0;};
	$sql = "select * from transaksidetail where No_Transaksi='$id'";
	$hasil = mysqli_query($koneksi, $sql);
	if (!$hasil) die("Gagal Query Pengembalian Buku");
	$row = mysqli_fetch_assoc($hasil);
	
	$tglKembali = $row['tglKembali'];
	$No_Pinjam 	= $row['No_Pinjam'];
	$No_Buku	= $row['No_Buku'];
?>


<link rel="stylesheet" href="../css/style_mhs.css"/>
<body bgcolor="#df9233">
<h2>.:: UPDATE DATA PENGEMBALIAN BUKU::.</h2>
<h2>SILAKAN UPDATE FORM DIBAWAH INI</h2>
<form action='simpanedit_kembali.php' method='post' enctype='multipart/form-data'>
	<table  id='tbl' border='0' align='center'>
	<caption>SILAKAN ISI FORM DIBAWAH INI</caption>
	<tr>
     	<td>Nomor Transaksi</td>
		<td><input type='text' name='No_Transaksi' maxlength='8' size='15' placeholder="Nomor Transaksi" /></td>
    </tr>
	<tr>
     	<td>Tanggal Pengembalian</td>
     	<td><input type="date" name='tglKembali'/></td>
    </tr>
<?php
$StrSQL="select * from transaksipinjam";
$result2=mysqli_query($koneksi, $StrSQL);
?>
    <tr>
     	<td>Nomor Peminjaman</td>
		<td>
			<select name="No_Pinjam">
			<?php
			while($row=mysqli_fetch_row($result2))
			{
				echo "<option value='" . $row[0] ."'>"	. $row[0];
			}
			?>
			</select>
		</td>	
    </tr>

<?php
$StrSQL="select * from buku";
$result2=mysqli_query($koneksi, $StrSQL);
?>
    <tr>
     	<td>Judul Buku</td>
		<td>
			<select name="No_Buku">
			<?php
			while($row=mysqli_fetch_row($result2))
			{
				echo "<option value='" . $row[0] ."'>"	. $row[1];
			}
			?>
			</select>
		</td>	
    </tr>
	<tr>
     	<td colspan='2' align='center'>
      	<input type='submit' value='Simpan' name='proses' class='button'/>
      	<input type='reset' value='Reset' name='reset' class='button'/>
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