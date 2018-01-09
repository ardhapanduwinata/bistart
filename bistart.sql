-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2018 at 01:11 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bistart`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_detail_produk` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_produk` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_perusahaan`
--

CREATE TABLE `informasi_perusahaan` (
  `nama_perusahaan` varchar(45) NOT NULL,
  `no_telp_perusahaan` varchar(45) DEFAULT NULL,
  `email_perusahaan` varchar(45) DEFAULT NULL,
  `sosialmedia_id_sosialmedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategoriProduk` int(11) NOT NULL,
  `nama_kategori` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_kategoriProduk` int(11) NOT NULL,
  `nama_produk` varchar(45) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review_produk`
--

CREATE TABLE `review_produk` (
  `id_reviewProduk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `review` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sosialmedia`
--

CREATE TABLE `sosialmedia` (
  `id_sosialmedia` int(11) NOT NULL,
  `nama_sosialmedia` varchar(45) DEFAULT NULL,
  `link_sosialmedia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(45) DEFAULT NULL,
  `no_telp_supplier` varchar(45) DEFAULT NULL,
  `alamat_supplier` varchar(45) DEFAULT NULL,
  `fax_supplier` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp_supplier`, `alamat_supplier`, `fax_supplier`) VALUES
(11111, 'adiddas', '1234567890', 'malang', '1234567890'),
(11112, 'leggo', '2345678901', 'surabaya', '2345678901'),
(11113, 'nike', '345678912', 'jakarta', '3456789012'),
(11114, 'bata', '4567890123', 'bandung', '4567890123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_data`
--

CREATE TABLE `users_data` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nama_user` varchar(45) DEFAULT NULL,
  `no_telp_user` varchar(45) DEFAULT NULL,
  `email_user` varchar(45) DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `tanggal_lahir_user` date DEFAULT NULL,
  `gender_user` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_data`
--

INSERT INTO `users_data` (`id_user`, `username`, `password`, `nama_user`, `no_telp_user`, `email_user`, `role`, `tanggal_lahir_user`, `gender_user`) VALUES
(2, 'user', 'user', 'panduwinata', '805755177805', 'ardhawinawinata@gmail.com', 1, '1999-01-31', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail_produk`,`id_produk`),
  ADD KEY `fk_produk_has_produk_produk1_idx` (`id_produk`),
  ADD KEY `fk_produk_has_produk_produk_idx` (`id_detail_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_produk`,`id_transaksi`),
  ADD KEY `fk_produk_has_transaksi_transaksi1_idx` (`id_transaksi`),
  ADD KEY `fk_produk_has_transaksi_produk1_idx` (`id_produk`);

--
-- Indexes for table `informasi_perusahaan`
--
ALTER TABLE `informasi_perusahaan`
  ADD PRIMARY KEY (`sosialmedia_id_sosialmedia`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategoriProduk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`,`id_supplier`,`id_kategoriProduk`),
  ADD KEY `fk_produk_supplier_produk1_idx` (`id_supplier`),
  ADD KEY `fk_produk_kategoriProduk1_idx` (`id_kategoriProduk`);

--
-- Indexes for table `review_produk`
--
ALTER TABLE `review_produk`
  ADD PRIMARY KEY (`id_reviewProduk`,`id_user`,`id_produk`),
  ADD KEY `fk_reviewProduk_user1_idx` (`id_user`),
  ADD KEY `fk_reviewProduk_produk1_idx` (`id_produk`);

--
-- Indexes for table `sosialmedia`
--
ALTER TABLE `sosialmedia`
  ADD PRIMARY KEY (`id_sosialmedia`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_user`),
  ADD KEY `fk_transaksi_user1_idx` (`id_user`);

--
-- Indexes for table `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD CONSTRAINT `fk_produk_has_produk_produk` FOREIGN KEY (`id_detail_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_produk_produk1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_produk_has_transaksi_produk1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_transaksi_transaksi1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `informasi_perusahaan`
--
ALTER TABLE `informasi_perusahaan`
  ADD CONSTRAINT `fk_informasiPerusahaan_sosialmedia1` FOREIGN KEY (`sosialmedia_id_sosialmedia`) REFERENCES `sosialmedia` (`id_sosialmedia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategoriProduk1` FOREIGN KEY (`id_kategoriProduk`) REFERENCES `kategori_produk` (`id_kategoriProduk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_supplier_produk1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review_produk`
--
ALTER TABLE `review_produk`
  ADD CONSTRAINT `fk_reviewProduk_produk1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reviewProduk_user1` FOREIGN KEY (`id_user`) REFERENCES `users_data` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_user1` FOREIGN KEY (`id_user`) REFERENCES `users_data` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
