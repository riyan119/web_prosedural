-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2016 at 04:48 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pembelianmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE IF NOT EXISTS `mhs` (
  `nim` char(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nilai` char(1) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `nilai`) VALUES
('riyan', 'tampan', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar_cicilan`
--

CREATE TABLE IF NOT EXISTS `tb_bayar_cicilan` (
  `kode_cicilan` int(11) NOT NULL,
  `kode_kredit` varchar(20) NOT NULL,
  `tgl_cicilan` date NOT NULL,
  `jumlah_cicilan` int(5) NOT NULL,
  `cicilan_ke` int(5) NOT NULL,
  `cicilan_sisa` int(5) NOT NULL,
  `cicilan_sisa_harga` double NOT NULL,
  KEY `kode_kredit` (`kode_kredit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli_cash`
--

CREATE TABLE IF NOT EXISTS `tb_beli_cash` (
  `kode_cash` char(7) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `kode_mobil` char(5) NOT NULL,
  `tgl_cash` date NOT NULL,
  `cash_bayar` double NOT NULL,
  PRIMARY KEY (`kode_cash`),
  KEY `no_ktp` (`no_ktp`),
  KEY `kode_mobil` (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beli_cash`
--

INSERT INTO `tb_beli_cash` (`kode_cash`, `no_ktp`, `kode_mobil`, `tgl_cash`, `cash_bayar`) VALUES
('C0002', '1112', 'M0001', '2016-05-24', 200000),
('C0003', '128371936182781', 'M0004', '2016-05-24', 500000000),
('C0004', '1772727272', 'M0002', '2016-08-29', 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli_kredit`
--

CREATE TABLE IF NOT EXISTS `tb_beli_kredit` (
  `kode_kredit` char(7) NOT NULL,
  `no_ktp` char(16) NOT NULL,
  `kode_mobil` char(5) NOT NULL,
  `kode_paket` char(7) NOT NULL,
  `biaya_tambahan` double NOT NULL,
  `tgl_kredit` date NOT NULL,
  `fotokopi_ktp` enum('ada','tidak') NOT NULL,
  `fotokopi_kk` enum('ada','tidak') NOT NULL,
  `fotokopi_slip_gaji` enum('ada','tidak') NOT NULL,
  PRIMARY KEY (`kode_kredit`),
  KEY `no_ktp` (`no_ktp`),
  KEY `kode_mobil` (`kode_mobil`),
  KEY `kode_paket` (`kode_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `kd_login` char(5) NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `username` char(10) NOT NULL,
  `password` char(10) NOT NULL,
  `level` enum('admin','operator') NOT NULL,
  PRIMARY KEY (`kd_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`kd_login`, `nama_lengkap`, `username`, `password`, `level`) VALUES
('A0003', 'Mochammad Reno Adhityatam', 'mocha', '12345', 'admin'),
('A0004', 'rahmat', 'rahmat', '123456', 'operator'),
('A0005', 'Muhammad Riyan Setiawan', 'riyan', '12345', 'admin'),
('A0006', 'riyan paling ganteng', 'tokici', '12345', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE IF NOT EXISTS `tb_mobil` (
  `kode_mobil` char(5) NOT NULL,
  `merk` varchar(12) NOT NULL,
  `type` varchar(10) NOT NULL,
  `warna` varchar(12) NOT NULL,
  `stok` int(2) NOT NULL,
  `harga_mobil` double NOT NULL,
  `gambar` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`kode_mobil`, `merk`, `type`, `warna`, `stok`, `harga_mobil`, `gambar`) VALUES
('M0001', 'Nikishino', 'Maki', 'Putih', 1, 1200000000, 'images.jpg'),
('M0002', 'gift', 'gift', 'putih', 12, 8000000, '401208.gif'),
('M0003', 'nanasaki', 'ai cwan', 'puthi', 1, 9999999999, 'Amagami_SS+_Special_03_Ai_Nanasaki.jpg'),
('M0004', 'muhammad', 'riyan', 'setiawan', 12, 9000000, 'tumblr_lh338kyA0i1qanb6ao1_500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket_kredit`
--

CREATE TABLE IF NOT EXISTS `tb_paket_kredit` (
  `kode_paket` char(7) NOT NULL,
  `kode_mobil` char(5) NOT NULL,
  `jumlah_cicilan` int(2) NOT NULL,
  `bunga` double NOT NULL,
  `uang_muka` double NOT NULL,
  `harga_paket` double NOT NULL,
  `nilai_cicilan` double NOT NULL,
  PRIMARY KEY (`kode_paket`),
  KEY `kode_mobil` (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE IF NOT EXISTS `tb_pembeli` (
  `no_ktp` char(16) NOT NULL,
  `nama_pembeli` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(12) NOT NULL,
  PRIMARY KEY (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`no_ktp`, `nama_pembeli`, `alamat`, `telepon`) VALUES
('1112', 'Muhammad Riyan Setaiwann', 'Pondok Rajeg', '08389282'),
('128371936182781', 'riyan', 'pondok labu', '89725172'),
('1772727272', 'reza', 'jalan mangga', '021862618');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
