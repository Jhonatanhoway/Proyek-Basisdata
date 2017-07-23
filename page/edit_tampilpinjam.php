<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>edit data peminjaman buku</title>
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
	if (isset($_GET['No_Pinjam']) and !empty($_GET['No_Pinjam'])) { $id = $_GET['No_Pinjam']; } else {$id=0;};
	$sql = "select * from transaksipinjam where No_Pinjam='$id'";
	$hasil = mysqli_query($koneksi, $sql);
	if (!$hasil) die("Gagal Query Peminjaman Buku");
	$row = mysqli_fetch_assoc($hasil);
	
	$tglPinjam 		=$row['tglPinjam'];
	$tglJatuhtempo 	=$row['tglJatuhtempo'];
	$jumlahPinjam 	=$row['jumlahPinjam'];
	$No_Buku 		=$row['No_Buku'];
	$NIM 			=$row['NIM'];
	$NPP 			=$row['NPP'];
?>


<link rel="stylesheet" href="../css/style_mhs.css"/>
<body bgcolor="#df9233">
<h2>.:: UPDATE DATA PEMINJAMAN BUKU::.</h2>
<h2>SILAKAN UPDATE FORM DIBAWAH INI</h2>
<form action='simpanedit_pinjam.php' method='post' enctype='multipart/form-data'>
		<table  id='tbl' border='0' align='center'>
		<caption>SILAKAN ISI FORM DIBAWAH INI</caption>
		
		<tr>
	    	<td>Nomor Peminjaman</td>
	    	<td><input type='text' name='No_Pinjam' maxlength='8' size='25' placeholder="Nomor Peminjaman" /></td>
	    </tr>
		<tr>
	     	<td>Tanggal Peminjaman</td>
	     	<td><input type="date" name='tglPinjam'/></td>
	    </tr>
		<tr>
	     	<td>Tanggal Jatuh Tempo</td>
	     	<td><input type="date" name='tglJatuhtempo'/></td>
	    </tr>
		<tr>
	     	<td>Jumlah Peminjaman</td>
	     	<td><input type="text" name='jumlahPinjam' maxlength='11' size='12' placeholder="Jumlah Pinjam"/></td>
	    </tr>
	<?php
	$StrSQL="select * from buku";
	$result3=mysqli_query($koneksi, $StrSQL);
	?>
		<tr>
	     	<td>Judul Buku</td>
			<td>
				<select name="No_Buku">
				<?php
				while($row=mysqli_fetch_row($result3))
				{
					echo "<option value='" . $row[0] ."'>"	. $row[1];
				}
				?>
				</select>
			</td>
		</tr>
		
	<?php
	$StrSQL="select * from mahasiswa";
	$result3=mysqli_query($koneksi, $StrSQL);
	?>
		<tr>
	     	<td>Nama Mahasiswa</td>
			<td>
				<select name="NIM">
				<?php
				while($row=mysqli_fetch_row($result3))
				{
					echo "<option value='" . $row[0] ."'>"	. $row[1];
				}
				?>
				</select>
			</td>
		</tr>
		
	<?php
	$StrSQL="select * from petugas";
	$result1=mysqli_query($koneksi, $StrSQL);
	?>
		<tr>
	     	<td>Nama Petugas</td>
			<td>
			<?php
			echo "<select name='NPP'>";	
			$StrSQL="select * from petugas";
			$result1=mysqli_query($koneksi, $StrSQL);
				while($dtnpp=mysqli_fetch_assoc($result1))
				{
					echo "<option value='{$dtnpp['NPP']}'>{$dtnpp['Username']}</option>";
				}
				echo "</select>";
				?>
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
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012 </div>
	</div>
</body>
</html>