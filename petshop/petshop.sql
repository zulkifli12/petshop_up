-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 07:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `datecreated` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `id_user`, `nama_kategori`, `datecreated`, `status`) VALUES
(2, 2, 'Jasa Kucing Rumah', 1666520465, 1),
(3, 2, 'Makanan', 1666523443, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_produk` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `stok_produk` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_produk`, `id_user`, `nama_produk`, `image`, `harga`, `deskripsi`, `stok_produk`, `id_kategori`, `date_created`, `status`) VALUES
(1, 2, 'Makanan Kucing 12', 'WhatsApp_Image_2022-10-21_at_14_57_551.jpeg', '5000', 'Makanan Kucing bla bla Diedit!', '1000', 3, 1666518418, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_slider`
--

CREATE TABLE `data_slider` (
  `id_slider` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_slider` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_slider`
--

INSERT INTO `data_slider` (`id_slider`, `id_user`, `nama_slider`, `gambar`, `date_created`, `status`) VALUES
(2, 2, 'Makanan Kucing Rumah', 'banner_1.jpg', 1666522198, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_toko`
--

CREATE TABLE `data_toko` (
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_toko` varchar(128) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `datecreated` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_toko`
--

INSERT INTO `data_toko` (`id_toko`, `id_user`, `nama_toko`, `alamat`, `no_telp`, `datecreated`, `status`) VALUES
(1, 2, 'Toko Kucing', 'Bangkinang', '082388702178', 1666409285, 1),
(2, 13, 'Rumah Kucing Adlii', 'Kuok', '08237587557', 1666516219, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `inisial` varchar(128) NOT NULL,
  `ket_pass` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `inisial`, `ket_pass`, `is_active`, `date_created`) VALUES
(1, 'Administrator', 'admin@petshop.com', 'default.jpg', '$2y$10$gRkk2o7V7RoMOW/TrSU4Oe7GPbGADk9JYGmN.btwR/gCUTUVCGZ06', 1, 'Admin', '', 1, 1664942433),
(2, 'Rumah Kucing', 'kucing@petshop.com', 'WhatsApp_Image_2022-10-21_at_14_57_55.jpeg', '$2y$10$6UpaYd9wx2uQgUrb3HKh9u5F1OO3I5yIBTS.kP9aXTM/Bu.pHlAxa', 2, 'RKC', 'kucingrumah', 1, 1664942497),
(5, 'RUmah Kucing2', 'kusing@petshop.com', 'default.jpg', '$2y$10$5U5nxq5CfJ39K7RtqK6Bf.OEc8LptAmwB65trzrXH7fH12CwgoAqu', 2, '', '', 1, 1666245425),
(12, 'kucing23', 'kucing23@gmail.com', 'default.jpg', '$2y$10$Rd.E6Tghp2JkozCMAwVamOc.6nnnlMBgROSYmZnZpqzc49WB3isZq', 2, '', '', 1, 1666415296),
(13, 'adli', 'adli@petshop.com', 'default.jpg', '$2y$10$4nbBe1IL3IZh9s0rMGDmcesDWR9HJVvGcBd17W6Ued9iu5gTZHjhq', 2, '', '', 0, 1666516045);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`, `status`) VALUES
(1, 'Super Admin', 1),
(2, 'Toko', 1),
(3, 'Customer', 1),
(4, 'Operator Kucing', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id` int(11)
,`nama` varchar(128)
,`email` varchar(128)
,`image` varchar(128)
,`password` varchar(128)
,`role_id` int(11)
,`inisial` varchar(128)
,`ket_pass` varchar(128)
,`is_active` int(1)
,`date_created` int(11)
,`id_toko` int(11)
,`id_user` int(11)
,`nama_toko` varchar(128)
,`alamat` varchar(200)
,`no_telp` varchar(20)
,`datecreated` int(11)
,`status` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS SELECT `a`.`id` AS `id`, `a`.`nama` AS `nama`, `a`.`email` AS `email`, `a`.`image` AS `image`, `a`.`password` AS `password`, `a`.`role_id` AS `role_id`, `a`.`inisial` AS `inisial`, `a`.`ket_pass` AS `ket_pass`, `a`.`is_active` AS `is_active`, `a`.`date_created` AS `date_created`, `b`.`id_toko` AS `id_toko`, `b`.`id_user` AS `id_user`, `b`.`nama_toko` AS `nama_toko`, `b`.`alamat` AS `alamat`, `b`.`no_telp` AS `no_telp`, `b`.`datecreated` AS `datecreated`, `b`.`status` AS `status` FROM (`user` `a` join `data_toko` `b` on(`a`.`id` = `b`.`id_user`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `data_slider`
--
ALTER TABLE `data_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `data_toko`
--
ALTER TABLE `data_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kategori`
--
ALTER TABLE `data_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_slider`
--
ALTER TABLE `data_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_toko`
--
ALTER TABLE `data_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
