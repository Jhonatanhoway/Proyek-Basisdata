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
$hasil=mysqli_query($koneksi, $sql);
if(!$hasil)
die("Gagal query..".mysql_error());
?>


<head>
<link rel="stylesheet" href="../css/style_mhs.css"/>
</head>
<body bgcolor="#df9233">
 <h3><b>LAPORAN TRANSAKSI</b></h3>
<form action="tampil_laporansemua.php" method="post">     
	<select name="status">
		<option value="">---Pilih Status---</option>    
		<option value="Semua">Semua Transaksi</option>    
		<option value="Belum">Belum Kembali</option>    
		<option value="Denda">Sudah Kembali ---Terlambat</option>    
		<option value="Tidak">Sudah Kembali ---Tidak Terlambat</option>    
	</select>     
	<input type="submit" name="tampilkan" value="Tampilkan" class="button">     
</form>
<?php     
if(isset($_POST["tampilkan"])){
$x=$_POST['status'];
if ($x=='Semua'){
?>

<table border='1' align='center' cellpadding='0' cellspacing='0'>
<tr bgcolor='#d5781c' align='center'>
<th>No Transaksi</th>
<th>Tanggal Kembali</th>
<th>Nomor Peminjaman</th>
<th>Status</th>
<th>Nomor Buku</th>
</tr>
<?php
/*$sql ="select m.NIM, m.Nama, m.Prodi,
b.Judul,
tp.tglPinjam,
td.tglKembali, td.Status,
d.Jml_denda
from transaksidetail td
inner join transaksipinjam tp ON td.No_Pinjam = tp.No_Pinjam
inner join mahasiswa m ON tp.NIM = m.NIM
inner join buku b ON td.No_Buku = b.No_Buku
inner join denda d ON td.No_Transaksi = d.No_Transaksi";*/
$sql = "select td.No_Transaksi, td.tglKembali, td.No_Pinjam, td.Status, td.No_Buku
from transaksidetail td";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
/*echo "<td> ".$row['NIM']."</td>";
echo "<td> ".$row['Nama']."</td>";
echo "<td> ".$row['Prodi']."</td>";
echo "<td> ".$row['Judul']."</td>";
echo "<td> ".$row['tglPinjam']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['Jml_denda']."</td>";*/

echo "<td> ".$row['No_Transaksi']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['No_Buku']."</td>";
//echo "<td> ".$row['No_Pinjam']."</td>";
//echo "<td> ".$row['Status']."</td>";
//echo "<td> ".$row['Jml_denda']."</td>";
echo "</tr>";
}

}
else if($x=='Belum'){
?>
<table border='1' align='center' cellpadding='0' cellspacing='0'>
<tr bgcolor='#d5781c' align='center'>
<th>Nomor Transaksi</th>
<th>Tanggal Kembali</th>
<th>Nomor Peminjaman</th>
<th>Status</th>
<th>Nomor Buku</th>
</tr>
<?php
/*$sql ="select m.NIM, m.Nama, m.Prodi,
b.Judul,
tp.tglPinjam,tp.No_Pinjam,
td.tglKembali, td.Status,
d.Jml_denda
from transaksidetail td
inner join transaksipinjam tp ON td.No_Pinjam = tp.No_Pinjam
inner join buku b ON td.No_Buku= b.No_Buku
inner join mahasiswa m ON m.NIM = tp.NIM
inner join denda d ON td.No_Transaksi = d.No_Transaksi;";*/
$sql="select td.No_Transaksi, td.tglKembali, tp.No_Pinjam, td.Status, td.No_Buku
from transaksidetail td
inner join transaksipinjam tp ON td.No_Pinjam=tp.No_Pinjam
where td.Status='Belum Kembali'";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['No_Transaksi']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['No_Buku']."</td>";
/*echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['Jml_denda']."</td>";*/
echo "</tr>";
}
	
}
else if($x=='Denda'){
?>
<table border='1' align='center' cellpadding='0' cellspacing='0'>
<tr bgcolor='#d5781c' align='center'>
<th>Nomor Transaksi</th>
<th>Tanggal Kembali</th>
<th>Nomor Peminjaman</th>
<th>Status</th>
<th>Nama Peminjam</th>
<th>Jumlah Denda</th>
</tr>
<?php
$sql="select td.No_Transaksi, td.tglKembali, tp.No_Pinjam, td.Status,
m.Nama,
d.Jml_denda
from transaksidetail td
inner join transaksipinjam tp ON td.No_Pinjam=tp.No_Pinjam
inner join mahasiswa m ON tp.NIM = m.NIM
inner join denda d ON d.No_Transaksi=td.No_Transaksi
where td.Status='Sudah Kembali' and d.Jml_denda > 0";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['No_Transaksi']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['Nama']."</td>";
echo "<td> ".$row['Jml_denda']."</td>";
/*echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['Jml_denda']."</td>";*/
echo "</tr>";
}
	
}
else if($x=='Tidak'){
?>
<table border='1' align='center' cellpadding='0' cellspacing='0'>
<tr bgcolor='#d5781c' align='center'>
<th>Nomor Transaksi</th>
<th>Tanggal Kembali</th>
<th>Nomor Peminjaman</th>
<th>Status</th>
<th>Nama Peminjam</th>
<th>Jumlah Denda</th>
</tr>
<?php
$sql="select td.No_Transaksi, td.tglKembali, tp.No_Pinjam, td.Status,
m.Nama,
d.Jml_denda
from transaksidetail td
inner join transaksipinjam tp ON td.No_Pinjam=tp.No_Pinjam
inner join mahasiswa m ON tp.NIM = m.NIM
inner join denda d ON d.No_Transaksi=td.No_Transaksi
where td.Status='Sudah Kembali' and d.Jml_denda = 0";
$hasil=mysqli_query($koneksi, $sql);
?>
<?php
while ($row=mysqli_fetch_assoc($hasil)){
echo "<tr>";
echo "<td> ".$row['No_Transaksi']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['Nama']."</td>";
echo "<td> ".$row['Jml_denda']."</td>";
/*echo "<td> ".$row['No_Pinjam']."</td>";
echo "<td> ".$row['tglKembali']."</td>";
echo "<td> ".$row['Status']."</td>";
echo "<td> ".$row['Jml_denda']."</td>";*/
echo "</tr>";
}
}
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