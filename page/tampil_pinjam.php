<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>tampil peminjaman buku</title>
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
<div id="form1">
<?php
include_once 'koneksidb.php';
if (isset($_GET['No_Pinjam']) and !empty($_GET['No_Pinjam'])) { $id = $_GET['No_Pinjam']; } else {$id=0;};
$sql ="select * from transaksipinjam where No_Pinjam= $id";
$sql2 ="select No_Pinjam, Status, No_Buku from transaksidetail where No_Pinjam= $id";
$hasil=mysqli_query($koneksi, $sql);
$hasil2=mysqli_query($koneksi, $sql2);
if(!$hasil)
die("Gagal query..".mysql_error());
?>

<head>
<link rel="stylesheet" href="../css/style_mhs.css"/>
</head>
<body bgcolor="#df9233">
<table border='1' align='center' cellpadding="0" cellspacing="0">
<caption><b>LAPORAN PEMINJAMAN BUKU </br> PER PERIODE</b></caption>
<tr bgcolor='#d5781c' align='center'>
<th>Nomor Peminjaman</th>
<th>Tanggal Peminjaman</th>
<th>Tanggal Jatuh Tempo</th>
<th>Nomor Buku</th>
<th>NIM</th>
<th>NPP</th>
<th>Status</th>
<th colspan="6">Proses</th>
<th></th>
</tr>
<?php
$sql ="select tp.No_Pinjam,tp.tglPinjam, tp.tglJatuhtempo, 
td.No_Buku, tp.NIM, tp.NPP, td.Status
from transaksipinjam tp
inner join transaksidetail td ON tp.No_Pinjam=td.No_Pinjam";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['tglPinjam']."</td>";
echo "<td> ".$row['tglJatuhtempo']."</td>";
echo "<td> ".$row['No_Buku']."</td>";
echo "<td> ".$row['NIM']."</td>";
echo "<td> ".$row['NPP']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td><i><a href='delete_tampilpinjam.php?id=".$row['No_Pinjam']."'>delete</a> </i></td>";
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