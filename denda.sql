-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2017 at 02:15 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `denda`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `No_buku` char(9) NOT NULL,
  `Judul` varchar(50) DEFAULT NULL,
  `Penerbit` varchar(50) DEFAULT NULL,
  `Pengarang` varchar(50) DEFAULT NULL,
  `Stok` int(11) NOT NULL,
  PRIMARY KEY (`No_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`No_buku`, `Judul`, `Penerbit`, `Pengarang`, `Stok`) VALUES
('A001', 'Algoritma Pemrograman', 'LN. Ninggrum', 'LN.Ninggrum', 2),
('B001', 'Pemrograman Web', 'Salemba', 'Andi Suwino', 2),
('B003', 'Akuntansi Pengantar', 'Salemba', 'Al.Haryono Yusup', 3),
('B004', 'Pemrograman Web', 'Abdul', 'Abdul Kadir', 2),
('B005', 'Basis data', 'Endang', 'Endang Wahyuningsih', 3),
('B006', 'Akuntansi Perbankan', 'Salemba', 'Al.Haryono Yusup', 4),
('B007', 'Bahasa Indonesia', 'Salemba', 'Samsul Windari', 2),
('B008', 'Matematika', 'Salemba', 'Wiwiek', 6);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE IF NOT EXISTS `denda` (
  `No_Denda` int(11) NOT NULL AUTO_INCREMENT,
  `Jml_denda` decimal(10,0) DEFAULT NULL,
  `Biaya` decimal(10,0) DEFAULT NULL,
  `No_Transaksi` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`No_Denda`,`No_Transaksi`),
  KEY `No_Transaksi` (`No_Transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`No_Denda`, `Jml_denda`, `Biaya`, `No_Transaksi`) VALUES
(1, '0', '500', 8),
(2, '0', '500', 8),
(3, '1000', '500', 2),
(4, '0', '500', 192),
(5, '2000', '500', 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` varchar(30) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` char(9) NOT NULL,
  `Nama` varchar(35) DEFAULT NULL,
  `Prodi` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Prodi`) VALUES
('133210012', 'Jhonatan Howay', 'KA'),
('133210016', 'Alif Yuda Pratama', 'KA'),
('133210017', 'Siti Nurbaya', 'SI'),
('133210019', 'Brian Laurens', 'SI'),
('142310015', 'Selvitha Tigori', 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `NPP` char(15) NOT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NPP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`NPP`, `Username`, `Password`) VALUES
('09836', 'Fiktor', '56'),
('123456787', 'Dison Librado', '123'),
('123456789', 'Susi Purwani', '786');

-- --------------------------------------------------------

--
-- Table structure for table `transaksidetail`
--

CREATE TABLE IF NOT EXISTS `transaksidetail` (
  `No_Transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `tglKembali` date DEFAULT NULL,
  `No_Pinjam` char(8) NOT NULL DEFAULT '',
  `Status` char(30) DEFAULT NULL,
  `No_buku` char(9) NOT NULL DEFAULT '',
  PRIMARY KEY (`No_Transaksi`,`No_Pinjam`,`No_buku`),
  KEY `No_Pinjam` (`No_Pinjam`),
  KEY `No_buku` (`No_buku`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `transaksidetail`
--

INSERT INTO `transaksidetail` (`No_Transaksi`, `tglKembali`, `No_Pinjam`, `Status`, `No_buku`) VALUES
(2, '2017-07-16', '002', 'Sudah Kembali', ''),
(2, '2017-07-20', '103', 'Sudah Kembali', 'B004'),
(3, '2017-07-24', '1', 'Sudah Kembali', ''),
(8, '2017-07-20', '1004', 'Sudah Kembali', 'B005'),
(8, '2017-07-20', '178', 'Sudah Kembali', 'B001'),
(9, '2017-07-20', '987', 'Sudah Kembali', 'B002'),
(11, NULL, '191', 'Belum Kembali', 'B001'),
(192, '2017-07-22', '191', 'Sudah Kembali', ''),
(193, NULL, '1', 'Belum Kembali', 'B001');

-- --------------------------------------------------------

--
-- Table structure for table `transaksipinjam`
--

CREATE TABLE IF NOT EXISTS `transaksipinjam` (
  `No_Pinjam` char(8) NOT NULL,
  `tglPinjam` date DEFAULT NULL,
  `tglJatuhtempo` date DEFAULT NULL,
  `NIM` char(9) NOT NULL DEFAULT '',
  `NPP` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`No_Pinjam`,`NIM`,`NPP`),
  KEY `NIM` (`NIM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksipinjam`
--

INSERT INTO `transaksipinjam` (`No_Pinjam`, `tglPinjam`, `tglJatuhtempo`, `NIM`, `NPP`) VALUES
('002', '0000-00-00', '2017-07-13', '133210012', '123456787'),
('1', '2017-07-22', '2017-07-24', '133210012', '123456787'),
('1', '2017-07-22', '2017-07-24', '133210012', '123456789'),
('1004', '2017-07-05', '2017-07-10', '133210017', '123456789'),
('101', '2017-07-13', '2017-07-26', '133210015', '123456789'),
('103', '2017-07-14', '2017-07-20', '133210015', '123456789'),
('121', '2017-07-16', '2017-07-23', '133210015', '123456789'),
('123', '2017-07-10', '2017-07-20', '133210016', '123456789'),
('145', '2017-07-23', '2017-07-28', '133210016', '123456789'),
('178', '2017-07-13', '2017-07-18', '133210016', '123456789'),
('191', '2017-07-25', '2017-07-30', '133210016', '123456789'),
('191', '0000-00-00', '2017-07-19', '142310015', '09836'),
('2', '2017-07-12', '2017-07-27', '133210012', '123456789'),
('3', '2017-07-06', '2017-07-13', '133210012', '123456789'),
('987', '2017-07-07', '2017-07-14', '142310015', '123456789'),
('N01', '2017-07-06', '2017-07-16', '142310015', '123456789'),
('Pinjam01', '2017-07-11', '2017-07-18', '144310015', '123456789'),
('Pinjam02', '2017-07-12', '2017-07-19', '144310015', '123456789'),
('Pinjam03', '2017-07-13', '2017-07-20', '144310015', '123456789'),
('Pinjam04', '2017-07-12', '2017-07-19', '144310015', '123456789'),
('Pinjam05', '2017-07-13', '2017-07-20', '133210017', '123456789'),
('PJ01', '2017-08-12', '2017-08-23', '133210012', '123456789'),
('T', '2017-07-31', '2017-08-15', '133210016', '123456789'),
('U', '2017-07-12', '2017-07-29', '133210012', '123456789');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
