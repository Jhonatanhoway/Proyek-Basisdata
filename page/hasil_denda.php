<?php
  include "koneksidb.php";
?>
<!DOCTYPE html>
<html>
<body background="gambar/mantap.jpg">
<title>denda</title>
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

<?php
if (isset($_POST['No_Transaksi'])) { 
$id = $_POST['No_Transaksi']; 
} else {$id=0;};
 
if (isset($_POST["proses"])) {

$tgl1 =$_POST["tglPinjam"]; //"20-12-2009";  // 1 Oktober 2009
$tgl2 =$_POST["tglKembali"]; //"29-12-2009";  // 10 Oktober 2009

// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal pertama

$pecah1 = explode("-", $tgl1);
$year1 = $pecah1[0];
$month1 = $pecah1[1];
$date1 = $pecah1[2];

// memecah tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
// dari tanggal kedua

$pecah2 = explode("-", $tgl2);
$year2 = $pecah2[0];
$month2 = $pecah2[1];
$date2 =  $pecah2[2];

// menghitung JDN dari masing-masing tanggal

$jd1 = GregorianToJD($month1, $date1, $year1);
$jd2 = GregorianToJD($month2, $date2, $year2);

// hitung selisih hari kedua tanggal

$selisih = $jd2 - $jd1;

echo "  Lama Peminjaman Maximal adalah <b> 7 hari </b><br>
        Anda Meminjam Selama : ".$selisih." hari<br>";
$Biaya = 500;
if (($selisih-7)<=0){
        echo "<b> Anda mengembalikan Tepat waktu !</b>"; 
		$ahe=0;
        }else {
        $ahe=($selisih-7)*$Biaya;
        echo "Pengembalian Anda Telat <b>".($selisih-7)." ! </b>Denda = $ahe";
        }
    }

$sql="insert into denda(Jml_denda,Biaya,No_Transaksi) values ('$ahe','$Biaya','$id') ";
$hasil=mysqli_query($koneksi, $sql);
?>
</div>
	<div>
	<div id="footer">Copyright &copy; Jhonatan Howay/133210012</div>
	</div>
</body>
</html>

