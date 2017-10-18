-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2017 at 03:53 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) DEFAULT NULL,
  `ukuran_barang` varchar(255) DEFAULT NULL,
  `material_barang` varchar(255) DEFAULT NULL,
  `id_desain` int(11) DEFAULT NULL,
  `harga_jual_barang` int(45) DEFAULT NULL,
  `harga_beli_barang` int(11) DEFAULT NULL,
  `id_jenis_barang` int(11) DEFAULT NULL,
  `stok_barang` int(11) NOT NULL,
  `keterangan_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `ukuran_barang`, `material_barang`, `id_desain`, `harga_jual_barang`, `harga_beli_barang`, `id_jenis_barang`, `stok_barang`, `keterangan_barang`) VALUES
(1, 'Teratai 2T', '35 x 35 x 33 cm', 'Kayu Jati Super', NULL, 130000, 160000, 1, 23, '-'),
(2, 'Kotak Kunci', '23 x 30 x 8 cm', 'Kayu Jati', NULL, 160000, 180000, 1, 10, '-');

-- --------------------------------------------------------

--
-- Table structure for table `desain`
--

CREATE TABLE IF NOT EXISTS `desain` (
  `id_desain` int(11) NOT NULL,
  `nama_desain` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desain`
--

INSERT INTO `desain` (`id_desain`, `nama_desain`) VALUES
(1, 'Cat + Deco'),
(2, 'Cat Polos'),
(3, 'Natural + Deco');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  `jumlah_penjualan` varchar(10) DEFAULT NULL,
  `jadwal_pengiriman` datetime DEFAULT NULL,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `ongkos_kirim` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faktur_penjualan`
--

CREATE TABLE IF NOT EXISTS `faktur_penjualan` (
  `id_faktur` varchar(50) NOT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  `tanggal_penjualan` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_barang` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faktur_penjualan`
--

INSERT INTO `faktur_penjualan` (`id_faktur`, `no_faktur`, `tanggal_penjualan`, `id_barang`, `jumlah_barang`, `total_bayar`, `id_pelanggan`, `id_pegawai`, `status`) VALUES
('2017-10-17-1', '2017-10-17--1', '2017-10-17', 1, 50, NULL, 1, 0, 0),
('2017-10-17-2', '2017-10-17--1', '2017-10-17', 2, 50, NULL, 1, 0, 0),
('2017-10-17-3', '2017-10-17--1', '2017-10-17', 1, 100, NULL, 1, 0, 0),
('2017-10-17-4', '2017-10-17--1', '2017-10-17', 2, 300, NULL, 1, 0, 0),
('2017-10-18-1', '2017-10-18--3', '2017-10-18', 2, 2, NULL, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `nama_jenis_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
(1, 'Tempat Air Mineral'),
(2, 'Lemari Dinding'),
(3, 'Jam Dinding'),
(4, 'Pajangan'),
(5, 'Peralatan dapur'),
(6, 'Kotak tissue'),
(7, 'Rekal/Alas Baca'),
(8, 'Kaligrafi'),
(9, 'Tolak Balak'),
(10, 'Frame Kaca'),
(11, 'Nakas'),
(12, 'Meja & Kursi'),
(13, 'Tudung Saji'),
(14, 'Lampu'),
(15, 'Rak dinding');

-- --------------------------------------------------------

--
-- Table structure for table `log_stok`
--

CREATE TABLE IF NOT EXISTS `log_stok` (
  `id_stok_barang` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_stok`
--

INSERT INTO `log_stok` (`id_stok_barang`, `id_barang`, `id_pegawai`, `stok_barang`, `tanggal_update`) VALUES
(1, 1, 0, 10, '2017-10-12 05:26:25'),
(2, 1, 0, 20, '2017-10-11 18:47:59'),
(3, 1, NULL, 25, '2017-10-11 18:57:07'),
(4, 1, NULL, 23, '2017-10-11 18:59:59'),
(5, 2, NULL, 0, '2017-10-12 09:41:51'),
(6, 2, NULL, 0, '2017-10-12 09:42:01'),
(7, 2, NULL, 10, '2017-10-12 09:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `modal`
--

CREATE TABLE IF NOT EXISTS `modal` (
  `id_modal` int(11) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `jumlah_bahan` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `alamat_pegawai` varchar(255) DEFAULT NULL,
  `akses_pegawai` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `username`, `password`, `nama_pegawai`, `alamat_pegawai`, `akses_pegawai`, `status`) VALUES
(0, 'hjk', 'bb5e62bc40ce26e243bfcb6a25309f8f', 'jh', 'kjhkj', 'admin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT NULL,
  `cp_pelanggan` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `cp_pelanggan`) VALUES
(1, 'AGUS', 'BJN', '088216816855'),
(2, 'agus anu', 'bjn', '08888888888'),
(3, 'agus banu', 'BJN', '8980-8097-86'),
(4, 'GUS AGUS', 'MALANG', '0807-9786-76');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`), ADD KEY `id_jenis_barang_idx` (`id_jenis_barang`), ADD KEY `id_desain` (`id_desain`);

--
-- Indexes for table `desain`
--
ALTER TABLE `desain`
  ADD PRIMARY KEY (`id_desain`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`), ADD KEY `no_faktur_idx` (`no_faktur`);

--
-- Indexes for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD PRIMARY KEY (`id_faktur`), ADD KEY `id_barang_idx` (`id_barang`), ADD KEY `no_faktur` (`no_faktur`), ADD KEY `id_pelanggan_idx` (`id_pelanggan`), ADD KEY `id_pegawai_idx` (`id_pegawai`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `log_stok`
--
ALTER TABLE `log_stok`
  ADD PRIMARY KEY (`id_stok_barang`), ADD KEY `id_barang` (`id_barang`), ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id_modal`), ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `desain`
--
ALTER TABLE `desain`
  MODIFY `id_desain` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `log_stok`
--
ALTER TABLE `log_stok`
  MODIFY `id_stok_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `modal`
--
ALTER TABLE `modal`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `id_desain_ibfk_1` FOREIGN KEY (`id_desain`) REFERENCES `desain` (`id_desain`),
ADD CONSTRAINT `jenis_barang_rl` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`);

--
-- Constraints for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
ADD CONSTRAINT `id_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `id_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_stok`
--
ALTER TABLE `log_stok`
ADD CONSTRAINT `log_stok_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Constraints for table `modal`
--
ALTER TABLE `modal`
ADD CONSTRAINT `modal_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
