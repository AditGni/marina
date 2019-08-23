-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 05:48 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id`, `admin`, `pass`, `ket`, `idp`) VALUES
(29, 'admin', 'admin', 'admin', ''),
(33, 'oli', 'oli', 'pelanggan', '8'),
(34, 'adit', 'admin', 'pelanggan', '9');

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
  `harga_jual` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbdetailpenjualan`
--

INSERT INTO `tbdetailpenjualan` (`id`, `id_penjualan`, `id_produk`, `banyak`, `harga_jual`, `total`) VALUES
(1, '1', '21', '1', '299000', '299000'),
(2, '1', '14', '1', '300000', '300000'),
(3, '2', '5', '3', '950000', '2850000'),
(4, '2', '21', '1', '299000', '299000'),
(5, '3', '6', '2', '500000', '1000000'),
(6, '4', '6', '2', '500000', '1000000'),
(7, '5', '17', '2', '1600000', '3200000'),
(8, '6', '18', '3', '1750000', '5250000');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE IF NOT EXISTS `tbkategori` (
  `id` int(10) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`id`, `kategori`) VALUES
(23, 'Rumah Tangga'),
(24, 'Furnitur'),
(25, 'Elektronik & Gadget'),
(28, 'Beth & Bath');

-- --------------------------------------------------------

--
-- Table structure for table `tbkeranjang`
--

CREATE TABLE IF NOT EXISTS `tbkeranjang` (
  `id` int(5) NOT NULL,
  `kode_pro` char(10) NOT NULL,
  `kode_pel` char(10) NOT NULL,
  `jumlah` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `phone` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`id`, `nama`, `kelamin`, `alamat`, `phone`) VALUES
(8, 'ido', 'p', 'agus', '08882221134'),
(9, 'adit', 'p', 'Jl. Rusak\r\n', '082271384731');

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
  `besar_bunga` char(20) NOT NULL,
  `tot_kotor` char(15) NOT NULL,
  `angsuran` char(15) NOT NULL,
  `tot_bersih` char(15) NOT NULL,
  `jenis_pembayaran` char(1) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbpenjualan`
--

INSERT INTO `tbpenjualan` (`id`, `tanggal`, `lama`, `idp`, `uang_muka`, `bunga`, `besar_bunga`, `tot_kotor`, `angsuran`, `tot_bersih`, `jenis_pembayaran`, `bukti_pembayaran`, `status`) VALUES
(1, '2019-08-08', '3', '8', '179700', '2.5', '31448', '419300', '150249', '450748', 'k', 'angga(3x4).jpg', 'y'),
(2, '2019-08-21', '-', '8', '-', '-', '-', '-', '-', '3149000', 't', '-', 'y'),
(3, '2019-08-21', '12', '9', '250000', '8', '2160000', '2250000', '367500', '4410000', 'k', 'DSC04345 (2).JPG', 'y'),
(4, '2019-08-21', '12', '8', '50000', '8', '432000', '450000', '73500', '882000', 'k', 'DSC04345 (2).JPG', 'y'),
(5, '2019-08-21', '6', '8', '160000', '5', '432000', '1440000', '312000', '1872000', 'k', 'DSC04345 (2).JPG', 'y'),
(6, '2019-08-22', '-', '8', '-', '-', '-', '-', '-', '1750000', 't', '-', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE IF NOT EXISTS `tbproduk` (
  `id` int(10) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` varchar(10) NOT NULL,
  `stok` char(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`id`, `id_kategori`, `nama_barang`, `harga`, `stok`, `deskripsi`, `tanggal`, `img`) VALUES
(5, '23', 'cermin dinding dengan rak', '950000', '13', '-', '2019-08-08', 'Cermin Dinding Bundar dengan rak.jpg'),
(6, '23', 'tempat sampah', '500000', '9', '-', '2019-08-08', '10228750_4.jpg'),
(7, '23', 'Proclean Alat Pel Spary 2 In 1 - Hijau', '249000', '4', '-', '2019-08-08', '10207485_1.jpg'),
(14, '23', 'Kotak Penyimpanan Lipat Otto Velvet - Pink', '300000', '18', '-', '2019-08-08', '10209388_1.jpg'),
(15, '24', 'Ashley Tartonelle Sofa 1 Dudukan', '5500000', '9', '-', '2019-08-08', '10227280_1.jpg'),
(16, '24', 'Council 2 Kursi Kantor Sandaran Rendah', '1760200', '45', '-', '2019-08-08', '10200964_1.jpg'),
(17, '24', 'Haris Meja Kantor', '1600000', '55', '-', '2019-08-08', '10217162_1.jpg'),
(18, '28', 'Nakas Aleta - Abu-Abu', '1750000', '67', '-', '2019-08-08', '10211235_1.jpg'),
(19, '28', 'Krishome Rak Kamar Mandi 3 Tingkat', '454300', '23', '-', '2019-08-08', '10180716_1.jpg'),
(20, '28', 'Passacor Laci Pakaian Chest 5 Tingkat - Putih', '3000000', '44', 'untuk baju dan celana', '2019-08-12', '10209359_1.jpg'),
(21, '25', 'Kris Hair Dryer 1600w Ph6856', '299000', '6', '-', '2019-08-08', '10143685_1.jpg'),
(22, '25', 'Kris Alat Cukur Mini Rotary Pq3800s', '170000', '', '-', '2019-08-07', '10143688_1.jpg'),
(23, '25', 'Nilfisk Power P Animal Alat Penghisap Debu Kering', '6095000', '5', '-', '2019-08-08', '10039389_1.jpg'),
(24, '25', 'Krisbow S433 Mesin Penghancur Kertas - Hitam', '4237000', '', '-', '2019-08-07', '266758_1.jpg');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbangsuran`
--
ALTER TABLE `tbangsuran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbdetailpenjualan`
--
ALTER TABLE `tbdetailpenjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbkeranjang`
--
ALTER TABLE `tbkeranjang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbkredit`
--
ALTER TABLE `tbkredit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbpenjualan`
--
ALTER TABLE `tbpenjualan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbproduk`
--
ALTER TABLE `tbproduk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbstok`
--
ALTER TABLE `tbstok`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
