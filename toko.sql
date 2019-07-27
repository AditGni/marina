-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 03:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE IF NOT EXISTS `tbadmin` (
  `id` int(5) NOT NULL,
  `admin` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `idp` char(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id`, `admin`, `pass`, `ket`, `idp`) VALUES
(29, 'admin', 'admin', 'admin', ''),
(33, 'oli', 'oli', 'pelanggan', '8');

-- --------------------------------------------------------

--
-- Table structure for table `tbangsuran`
--

CREATE TABLE IF NOT EXISTS `tbangsuran` (
  `id` int(10) NOT NULL,
  `idk` varchar(10) NOT NULL,
  `angsur_ke` varchar(2) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `tgl` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbangsuran`
--

INSERT INTO `tbangsuran` (`id`, `idk`, `angsur_ke`, `jumlah`, `tgl`) VALUES
(1, '5', '1', '354583.333', ''),
(2, '5', '2', '354583.333', ''),
(3, '5', '3', '354583.333', ''),
(4, '5', '4', '354583.333', ''),
(5, '5', '5', '354583.333', '12/09/2018'),
(6, '6', '1', '245000', '12/09/2018'),
(7, '6', '2', '245000', '12/09/2018'),
(8, '7', '1', '530000', '12/09/2018'),
(9, '7', '2', '530000', '12/09/2018'),
(10, '8', '1', '1169166.66', '23/09/2018'),
(11, '10', '1', '440833.333', '18/10/2018'),
(12, '11', '1', '450000', '28/10/2018'),
(13, '12', '1', '958333.333', '05/11/2018'),
(14, '11', '2', '450000', '06/11/2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetailpenjualan`
--

CREATE TABLE IF NOT EXISTS `tbdetailpenjualan` (
  `id` int(10) NOT NULL,
  `id_penjualan` varchar(10) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `banyak` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE IF NOT EXISTS `tbkategori` (
  `id` int(10) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`id`, `kategori`) VALUES
(23, 'meja belajar'),
(24, 'Meja'),
(25, 'Kursi Sofa');

-- --------------------------------------------------------

--
-- Table structure for table `tbkeranjang`
--

CREATE TABLE IF NOT EXISTS `tbkeranjang` (
  `id` int(5) NOT NULL,
  `kode_pro` char(10) NOT NULL,
  `kode_pel` char(10) NOT NULL,
  `jumlah` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkeranjang`
--

INSERT INTO `tbkeranjang` (`id`, `kode_pro`, `kode_pel`, `jumlah`) VALUES
(1, '5', '8', '7'),
(2, '6', '8', '4'),
(3, '7', '8', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbkredit`
--

CREATE TABLE IF NOT EXISTS `tbkredit` (
  `id` int(10) NOT NULL,
  `idt` varchar(10) NOT NULL,
  `idp` varchar(10) NOT NULL,
  `lama` varchar(2) NOT NULL,
  `modal` varchar(10) NOT NULL,
  `bunga` varchar(10) NOT NULL,
  `perbulan` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbkredit`
--

INSERT INTO `tbkredit` (`id`, `idt`, `idp`, `lama`, `modal`, `bunga`, `perbulan`, `total`) VALUES
(9, '39', '4', '6', '0', '0', '0', '0'),
(8, '38', '2', '6', '6100000', '915000', '1169166.66', '7015000'),
(7, '37', '2', '12', '5300000', '1060000', '530000', '6360000'),
(10, '40', '4', '6', '2300000', '345000', '440833.333', '2645000'),
(11, '42', '5', '12', '4500000', '900000', '450000', '5400000'),
(12, '43', '6', '6', '5000000', '750000', '958333.333', '5750000');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE IF NOT EXISTS `tbpelanggan` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id`, `nama`, `kelamin`, `alamat`, `phone`, `status`) VALUES
(3, 'Sutisna Mokoagow', 'Pria', 'Jl. rambutan Kota Gorontalo', '082348423', 'member'),
(2, 'Novi Adams', 'Wanita', 'Jl. Delima No.100 Kec. Kota Selatan Kota Gorontalo', '0834676732', ''),
(4, 'FITRI', 'Wanita', 'JL KALIMANTAN', '08997227277333', 'member'),
(5, 'sinta', 'Wanita', 'awara', '085343255252', 'reguler'),
(6, 'ANDI', 'Pria', 'JL BALI', '098484892', 'reguler'),
(8, 'ido', 'wanita', 'agus', '08882221134', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenjualan`
--

CREATE TABLE IF NOT EXISTS `tbpenjualan` (
  `id` int(10) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `lama` varchar(2) NOT NULL,
  `idp` varchar(10) NOT NULL,
  `uang_muka` char(15) NOT NULL,
  `bunga` char(15) NOT NULL,
  `tot_kotor` char(15) NOT NULL,
  `angsuran` char(15) NOT NULL,
  `tot_bersih` char(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE IF NOT EXISTS `tbproduk` (
  `id` int(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`id`, `id_kategori`, `nama_barang`, `harga`, `deskripsi`, `tanggal`, `img`) VALUES
(5, '24', 'Meja makan Kaca', '1500000', '-', '12/09/2018', ''),
(6, '25', 'Kursi sofa autrali', '2300000', '-', '12/09/2018', ''),
(7, '23', 'meja belajar olimpic', '1250000', '-', '28/10/2018', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbstok`
--

CREATE TABLE IF NOT EXISTS `tbstok` (
  `id` int(10) NOT NULL,
  `id_poroduk` varchar(10) NOT NULL,
  `stok` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbstok`
--

INSERT INTO `tbstok` (`id`, `id_poroduk`, `stok`) VALUES
(5, '6', '20'),
(4, '5', '10'),
(6, '7', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbangsuran`
--
ALTER TABLE `tbangsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdetailpenjualan`
--
ALTER TABLE `tbdetailpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkeranjang`
--
ALTER TABLE `tbkeranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkredit`
--
ALTER TABLE `tbkredit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbstok`
--
ALTER TABLE `tbstok`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tbangsuran`
--
ALTER TABLE `tbangsuran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbdetailpenjualan`
--
ALTER TABLE `tbdetailpenjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbkeranjang`
--
ALTER TABLE `tbkeranjang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbkredit`
--
ALTER TABLE `tbkredit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbproduk`
--
ALTER TABLE `tbproduk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbstok`
--
ALTER TABLE `tbstok`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
