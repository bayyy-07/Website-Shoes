-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Converse'),
(4, 'Compass'),
(5, 'Aerostreet'),
(6, 'Larocking');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `no_bayar` varchar(12) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_pesan` varchar(12) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_user` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_detail`
--

CREATE TABLE `keranjang_detail` (
  `id` int(11) NOT NULL,
  `id_pesan` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_bayar` varchar(12) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_pesan` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('Berhasil','gagal') NOT NULL DEFAULT 'Berhasil'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `stok` int(6) NOT NULL,
  `size` enum('30','31','32','33','34','35') NOT NULL,
  `harga` int(11) NOT NULL,
  `color` varchar(12) NOT NULL,
  `image` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_brand`, `id_warna`, `nama_produk`, `stok`, `size`, `harga`, `color`, `image`, `keterangan`) VALUES
(1, 4, 1, 'COMPASS 25TH LOGO PATTERN SLIP ON TYPE 1', 100, '30', 882250, 'White', 'com1.jpg', 'COMPASS 25TH LOGO PATTERN SLIP ON TYPE 1'),
(2, 4, 2, 'COMPASS RETROGRADE HI DECON BABY BLUE CYAN', 100, '30', 960424, 'Cyan', 'com2.jpg', 'COMPASS RETROGRADE HI DECON BABY BLUE CYAN'),
(3, 4, 3, 'COMPASS VINTAGE 25TH LOW MUSTARD SILVER', 100, '30', 781741, 'Silver', 'com3.jpg', 'COMPASS VINTAGE 25TH LOW MUSTARD SILVER'),
(4, 4, 4, 'COMPASS VELOCITY BLUE/YELLOW', 100, '30', 871082, 'Blue', 'com4.jpg', 'COMPASS VELOCITY BLUE/YELLOW'),
(5, 4, 5, 'COMMPAS VELOCITY MINT', 100, '30', 993927, 'Mint', 'com5.jpg', 'COMMPAS VELOCITY MINT Warna Mint,Size 30-35'),
(6, 4, 6, 'COMPASS PROTO 2 GR / HI', 100, '30', 882250, 'Black', 'com6.jpg', 'COMPASS PROTO 2 GR / HI'),
(7, 4, 7, 'COMPASS RETROGRADE HI DECON CREAM', 100, '30', 859915, 'Cream', 'com7.jpg', 'COMPASS RETROGRADE HI DECON CREAM'),
(8, 4, 7, 'COMPASS RETROGRADE SLIP ON KAWUNG CREAM', 100, '30', 926921, 'Cream', 'com8.jpg', 'COMPASS RETROGRADE SLIP ON KAWUNG CREAM'),
(9, 5, 6, 'Aerostreet Massive Low Hitam Natural', 100, '30', 904586, 'Black', 'aer-1.jpg', 'Aerostreet Massive Low Hitam Natural'),
(10, 5, 6, 'Aerostreet Osaka All Black', 100, '30', 915753, 'Black', 'aer-2.jpg', 'Aerostreet Osaka All Black'),
(11, 5, 8, 'Aerostreet Brooklyn Putih Putih Abu Muda1', 100, '30', 871082, 'Grey', 'aer-3.jpg', 'Aerostreet Brooklyn Putih Putih Abu Muda1'),
(12, 5, 9, 'Aerostreet Orlando Krem Khaki Abu', 100, '30', 770573, 'Khaki', 'aer-4.jpg', 'Aerostreet Orlando Krem Khaki Abu'),
(13, 5, 10, 'Aerostreet Massive Basic Natural Kuning Natural', 100, '30', 971592, 'Yellow', 'aer-5.jpg', 'Aerostreet Massive Basic Natural Kuning Natural'),
(14, 5, 11, 'Aerostreet Active Low Hitam Coklat Oranye', 100, '30', 792908, 'Brown', 'aer-6.jpg', 'Aerostreet Active Low Hitam Coklat Oranye'),
(15, 5, 11, 'Aerostreet Active High Hitam Coklat Oranye', 100, '30', 770573, 'Brown', 'aer-7.jpg', 'Aerostreet Active High Hitam Coklat Oranye'),
(16, 5, 8, 'Aerostreet Massive Basic Natural Abu Muda Natural', 100, '30', 859915, 'Grey', 'aer-8.jpg', 'Aerostreet Massive Basic Natural Abu Muda Natural'),
(17, 6, 6, 'Larocking Argon Vol1', 100, '30', 893418, 'Black', 'lar1.jpg', 'Larocking Argon Vol1'),
(18, 6, 12, 'Larocking Vortex', 100, '30', 725902, 'Orange', 'lar2.jpg', 'Larocking Vortex'),
(19, 6, 8, 'Larocking Emperor', 100, '30', 781741, 'Grey', 'lar3.jpg', 'Larocking Emperor'),
(20, 6, 1, 'Larocking - Vega Putih Polos', 100, '30', 759405, 'White', 'lar4.jpg', 'Larocking - Vega Putih Polos'),
(21, 6, 1, 'Larocking - Orion Putih', 100, '30', 714734, 'White', 'lar5.jpg', 'Larocking - Orion Putih'),
(22, 6, 1, 'Larocking - Lyners Putih', 100, '30', 748237, 'White', 'lar6.jpg', 'Larocking - Lyners Putih'),
(23, 6, 6, 'Larocking - Jayden Hitam Polos', 100, '30', 792908, 'Black', 'lar7.jpg', 'Larocking - Jayden Hitam Polos'),
(24, 6, 6, 'Larocking - Raptor Hitam', 100, '30', 770573, 'Black', 'lar8.jpg', 'Larocking - Raptor Hitam'),
(25, 1, 11, 'Nike Court Legacy Lift Shoes', 100, '30', 1228450, 'Brown', 'nik1.jpg', 'Nike Court Legacy Lift Shoes'),
(26, 1, 1, 'Nike Air Force 1 \'07', 100, '30', 1239618, 'White', 'nik2.jpg', 'Nike Air Force 1 \'07'),
(27, 1, 4, 'Nike Downshifter 13 Shoes', 100, '30', 1340127, 'Blue', 'nik3.jpg', 'Nike Downshifter 13 Shoes'),
(28, 1, 6, 'Nike Revolution 7 Shoes', 100, '30', 1328959, 'Black', 'nik4.jpg', 'Nike Revolution 7 Shoes'),
(29, 1, 6, 'Nike Court Legacy Shoes', 100, '30', 1306624, 'Black', 'nik5.jpg', 'Nike Court Legacy Shoes'),
(30, 1, 1, 'Nike Dunk Low Retro Men\'s Shoe', 100, '30', 1261953, 'White', 'nik6.jpg', 'Nike Dunk Low Retro Men\'s Shoe'),
(31, 1, 1, 'Nike Blazer Low \'77 Vintage Basketball Shoes', 100, '30', 1161443, 'White', 'nik7.jpg', 'Nike Blazer Low \'77 Vintage Basketball Shoes'),
(32, 1, 1, 'Nike Court Borough Low Recraft Older Kids\' Shoes', 100, '30', 1194947, 'White', 'nik8.jpg', 'Nike Court Borough Low Recraft Older Kids\' Shoes'),
(33, 2, 1, 'Adidas superstar shoes', 100, '30', 1340127, 'White', 'adi1.jpg', 'Adidas superstar shoes'),
(34, 2, 4, 'Adidas Gazelle Indoor', 100, '30', 1418301, 'Blue', 'adi2.jpg', 'Adidas Gazelle Indoor'),
(35, 2, 11, 'Adidas tobacco gruen', 100, '30', 1362463, 'Brown', 'adi3.jpg', 'Adidas tobacco gruen'),
(36, 2, 9, 'Adidas Stan Smith b-sides', 100, '30', 971592, 'Khaki', 'adi4.jpg', 'Adidas Stan Smith b-sides Warna Khaki, Size 30-35'),
(37, 2, 6, 'Adidas city canvas', 100, '30', 1328959, 'Black', 'adi5.jpg', 'Adidas city canvas'),
(38, 2, 13, 'Adidas campus 2.0', 100, '30', 1295456, 'Red', 'adi6.jpg', 'Adidas campus 2.0'),
(39, 2, 9, 'Adidas rivalry low', 100, '30', 1429649, 'Khaki', 'adi7.jpg', 'Adidas rivalry low'),
(40, 2, 14, 'Adidas handball spezial', 100, '30', 1440637, 'Green', 'adi8.jpg', 'Adidas handball spezial'),
(41, 3, 1, 'Converse CHUCK 70 AT-CX', 100, '30', 1328959, 'White', 'con1.jpg', 'Converse CHUCK 70 AT-CX'),
(42, 3, 1, 'Converse CHUCK TAYLOR ALL STAR LIFT', 100, '30', 1429469, 'White', 'con2.jpg', 'Converse CHUCK TAYLOR ALL STAR LIFT'),
(43, 3, 11, 'Converse CHUCK 70 GEO FORMA LS', 100, '30', 1407133, 'Brown', 'con3.jpg', 'Converse CHUCK 70 GEO FORMA LS'),
(44, 3, 6, 'Converse CHUCK 70', 100, '30', 1418301, 'Black', 'con4.jpg', 'Converse CHUCK 70'),
(45, 3, 1, 'Converse CHUCK 70', 100, '30', 1362463, 'White', 'con5.jpg', 'Converse CHUCK 70'),
(46, 3, 4, 'CONVERSE X FRGMT WEAPON', 100, '30', 1373630, 'Blue', 'con6.jpg', 'CONVERSE X FRGMT WEAPON'),
(47, 3, 6, 'Converse CHUCK 70 EVERYDAY ESSENTIALS', 100, '30', 1395966, 'Black', 'con7.jpg', 'Converse CHUCK 70 EVERYDAY ESSENTIALS'),
(48, 3, 1, 'CONVERSE X OLD MONEY WEAPON', 100, '30', 1362463, 'White', 'con8.jpg', 'CONVERSE X OLD MONEY WEAPON');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'member'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `id_user` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_user` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_produk` varchar(35) NOT NULL,
  `image` varchar(35) NOT NULL,
  `harga` int(12) NOT NULL,
  `size` enum('30','31','32','33','34','35') NOT NULL,
  `warna` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `tgl_pesan`, `id_user`, `email_user`, `id_produk`, `nama_produk`, `image`, `harga`, `size`, `warna`, `keterangan`) VALUES
(116, '2024-06-17', '7', 'bayu7812@gmail.com', 4, 'COMPASS VELOCITY BLUE/YELLOW', 'com4.jpg', 871082, '30', '', 'COMPASS VELOCITY BLUE/YELLOW'),
(118, '2024-06-18', '7', 'bayu7812@gmail.com', 3, 'COMPASS VINTAGE 25TH LOW MUSTARD SI', 'com3.jpg', 781741, '30', '', 'COMPASS VINTAGE 25TH LOW MUSTARD SILVER'),
(119, '2024-06-18', '3', 'muhammadbayu7812@gmail.com', 5, 'COMMPAS VELOCITY MINT', 'com5.jpg', 993927, '30', '', 'COMMPAS VELOCITY MINT Warna Mint,Size 30-35'),
(121, '2024-06-20', '8', 'hilal.anam123@gmail.com', 2, 'COMPASS RETROGRADE HI DECON BABY BL', 'com2.jpg', 960424, '30', '', 'COMPASS RETROGRADE HI DECON BABY BLUE CYAN'),
(122, '2024-06-21', '8', 'hilal.anam123@gmail.com', 10, 'Aerostreet Osaka All Black', 'aer-2.jpg', 915753, '30', '', 'Aerostreet Osaka All Black'),
(126, '2024-06-21', '7', 'bayu7812@gmail.com', 1, 'COMPASS 25TH LOGO PATTERN SLIP ON T', 'com1.jpg', 882250, '30', '', 'COMPASS 25TH LOGO PATTERN SLIP ON TYPE 1'),
(127, '2025-05-09', '10', 'bayu78122@gmail.com', 7, 'COMPASS RETROGRADE HI DECON CREAM', 'com7.jpg', 859915, '30', '', 'COMPASS RETROGRADE HI DECON CREAM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(3, 'Muhammad Bayu', 'Jl.Mars Raya No7,Kec. Ciputat, South Tangerine City, 14326', 'muhammadbayu7812@gmail.com', 'default.jpg', '$2y$10$4zgSBATmAgtD7Z53SRHkHOyfSNGdACXwjW09/oUPudykz5v4jOfDC', 1, 1, 1715653497),
(7, 'Bayu', 'Depok', 'bayu7812@gmail.com', 'default.jpg', '$2y$10$dYD3.IboWCvpFRafS3/Pcer/fyV9OY5b89p4JCPNBAE6LAMsCQ3pe', 1, 1, 1718616812),
(8, 'Hilal Anam', 'Bogor', 'hilal.anam123@gmail.com', 'default.jpg', '$2y$10$QpHjqKJo/ioW5TgHCxT.KeVVb6aQrGtZ91.l046dGWRZ5.LiR2AwO', 1, 1, 1718889229),
(9, 'hilal anam', 'Jl Raya Tapos GG H.Babun RT 003/06 Provinsi Jawa Barat Kota Depok Kec Tapos Kel Cimpaeun', 'hilal.anama@gmail.com', 'default.jpg', '$2y$10$fCghpMPFDFHfnIbT5Ffsg./lHVBgIVbPwuj3wvEID7fzLFlGHoCLa', 1, 1, 1718936957),
(10, 'bbb', 'asdadad', 'bayu78122@gmail.com', 'default.jpg', '$2y$10$iYg3SnpjyMim8LFZeEqZMuqEb/U1I3kvcHFopoC73KtpcCTZolnSe', 1, 1, 1746789614);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`) VALUES
(1, 'White'),
(2, 'Cyan'),
(3, 'Silver'),
(4, 'Blue'),
(5, 'Mint'),
(6, 'Black'),
(7, 'Cream'),
(8, 'Grey'),
(9, 'Khaki'),
(10, 'Yellow'),
(11, 'Brown'),
(12, 'Orange'),
(13, 'Red'),
(14, 'Green');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_bayar`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
