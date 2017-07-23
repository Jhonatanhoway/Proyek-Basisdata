<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>tampil pengembalian buku</title>
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
if (isset($_GET['No_Transaksi']) and !empty($_GET['No_Transaksi'])){
$id = $_GET['No_Transaksi']; 
} else {$id=0;};
$sql ="select * from transaksidetail where No_Transaksi= $id";
$hasil=mysqli_query($koneksi, $sql);
if(!$hasil)
die("Gagal query..".mysql_error());
?>

<head>
<link rel="stylesheet" href="../css/style_mhs.css"/>
</head>
<body bgcolor="#df9233">
<table border='1' align='center' cellpadding="0" cellspacing="0">
<caption><b>LAPORAN PENGEMBALIAN BUKU </br> PER PERIODE</b></caption>
<tr bgcolor='#d5781c' align='center'>
<th>NIM</th>
<th>Judul</th>
<th>Nomor Transaksi</th>
<th>Tanggal Kembali</th>
<th>Tanggal Jatuh Tempo</th>
<th>Tanggal Peminjaman</th>
<th>Status</th>
<th colspan="6">Proses</th>
<th></th>
</tr>
<?php
$sql ="select m.NIM, b.Judul,
td.No_Transaksi, td.tglKembali,
tp.tglJatuhtempo, tp.tglPinjam,
td.Status
from transaksidetail td
inner join transaksipinjam tp ON td.No_Pinjam = tp.No_Pinjam
inner join mahasiswa m ON tp.NIM = m.NIM
inner join buku b ON td.No_Buku= b.No_Buku";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['NIM']."</td>";
echo "<td> ".$row['Judul']."</td>";
echo "<td> ".$row['No_Transaksi']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['tglJatuhtempo']."</td>";
echo "<td> ".$row['tglPinjam']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td><i><a href='delete_tampilkembali.php?id=".$row['No_Transaksi']."'>delete</a> </i></td>";
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