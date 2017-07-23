<?php
session_start();
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>tampil denda</title>
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
				<li><a href="cetak.php">Laporan</a>
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
$id = $_GET['No_Transaksi'];
$sql = "select d.No_Denda, td.No_Transaksi,  sum((td.tglKembali - tp.tglJatuhtempo)* 500) as jumlah_denda 
 		from transaksidetail td 
		left join denda d on td.No_Transaksi = d.No_Transaksi
		left join transaksipinjam tp on td.No_Pinjam = tp.No_Pinjam";
$hasil=mysql_query($sql);
if(!hasil)
die("Gagal query..".mysql_error());
?>

<body bgcolor="#df9233">
<table border='1' align='center' cellpadding="0" cellspacing="0">
<caption><b>DENDA PERPUSTAKAAN STMIK AKAKOM YOGYAKARTA</b></caption>
<tr bgcolor='#d5781c' align='center'>
<th>No Denda</th>
<th>No Transaksi</th>
<th>Jumlah Denda</th>
<th>Biaya</th>
</tr>
<?php
$sql2 ="select * from denda";
$hasil2=mysql_query($sql2);
?>
<?php
while ($row=mysql_fetch_assoc($hasil2)){
echo "<tr>";
echo "<td> ".$row['No_Denda']."</td>";
echo "<td> ".$row['No_Transaksi']."</td>";
echo "<td> ".$row['Jml_Denda']."</td>";
echo "<td> ".$row['Biaya']."</td>";

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