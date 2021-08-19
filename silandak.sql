-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 07:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silandak`
--

-- --------------------------------------------------------

--
-- Table structure for table `dok`
--

CREATE TABLE `dok` (
  `id_dok` int(12) NOT NULL,
  `file` varchar(150) NOT NULL,
  `id_user` int(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `progdi` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `tujuan` varchar(150) NOT NULL,
  `subjek` varchar(150) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `size` int(123) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nim` int(9) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `email_tujuan` varchar(150) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `balasan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rate` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `nim` int(9) NOT NULL,
  `tanggal` varchar(150) NOT NULL,
  `jam` varchar(150) NOT NULL,
  `tujuan` varchar(150) NOT NULL,
  `subjek` varchar(150) NOT NULL,
  `saran` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_role` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(125) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(123) NOT NULL,
  `fakultas` varchar(150) DEFAULT NULL,
  `progdi` varchar(150) DEFAULT NULL,
  `bagian` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `id_role`, `password`, `nama`, `image`, `nim`, `email`, `fakultas`, `progdi`, `bagian`) VALUES
(10, 'admin', 2, '21232f297a57a5a743894a0e4a801fc3', 'Seprima Rachardian', 'Capture2.PNG', '380000111', 'lpm@uksw.com', NULL, NULL, 'LPM'),
(31, 'baa', 3, '4b583376b2767b923c3e1da60d10de59', 'Richard Rush', 'default.png', '38000001', 'baa@uksw.edu', NULL, NULL, 'Biro Administrasi Akademik'),
(34, 'bak', 3, '4b583376b2767b923c3e1da60d10de59', 'Iqbal Bahtiar', 'default.png', '38000002', 'bak@uksw.edu', NULL, NULL, 'Biro Akuntansi dan Keuangan'),
(35, 'bikem', 3, '4b583376b2767b923c3e1da60d10de59', 'Manggala Saka', 'default.png', '38000003', 'bikem@uksw.edu', NULL, NULL, 'Biro Kemahasiswaan'),
(36, 'bmk', 3, '4b583376b2767b923c3e1da60d10de59', 'Toni Stark', 'default.png', '38000004', 'bmk@uksw.edu', NULL, NULL, 'Biro Manajemen Kampus'),
(37, 'bpsdm', 3, '4b583376b2767b923c3e1da60d10de59', 'Chris Evan', 'default.png', '38000005', 'bpsdm@uksw.edu', NULL, NULL, 'Biro Pengembangan Sumber Daya Manusia'),
(38, 'bpha', 3, '4b583376b2767b923c3e1da60d10de59', 'Chriss Hemsworth', 'default.png', '38000006', 'bpha@uksw.edu', NULL, NULL, 'Biro Promosi, Humas dan Alumni'),
(41, 'btsi', 3, '4b583376b2767b923c3e1da60d10de59', 'Peter Parker', 'default.png', '38000007', 'btsi@uksw.edu', NULL, NULL, 'Biro Teknologi dan Sistem Informasi'),
(42, 'fpb', 3, '4b583376b2767b923c3e1da60d10de59', 'Kristian', 'default.png', '38000008', 'fpb@uksw.edu', NULL, NULL, 'Fakultas Pertanian dan Bisnis'),
(43, 'feb', 3, '4b583376b2767b923c3e1da60d10de59', 'Anton', 'default.png', '38000009', 'feb@uksw.edu', NULL, NULL, 'Fakultas Ekonomika dan Bisnis'),
(44, 'fkip', 3, '4b583376b2767b923c3e1da60d10de59', 'Boas Solosa', 'default.png', '38000010', 'fkip@uksw.edu', NULL, NULL, 'Fakultas Keguruan dan Ilmu Pendidikan'),
(48, 'fbio', 3, '4b583376b2767b923c3e1da60d10de59', 'Sadio Mane', 'default.png', '38000011', 'fbio@uksw.edu', NULL, NULL, 'Fakultas Biologi'),
(49, 'fti', 3, '4b583376b2767b923c3e1da60d10de59', 'Frank Lampard', 'default.png', '38000012', 'fti@uksw.edu', NULL, NULL, 'Fakultas Teknologi Informasi'),
(50, 'fsm', 3, '4b583376b2767b923c3e1da60d10de59', 'Steven Gerrard', 'default.png', '38000013', 'fsm@uksw.edu', NULL, NULL, 'Fakultas Sains dan Matematika'),
(55, '662016204', 1, 'ee11cbb19052e40b07aac0ca060c23ee', 'Seprima R', 'IMG-20190525-WA0001~2.jpg', '662016204', 'rachardika.rusphika@gmail.com', 'Fakultas Teknologi Informasi', 'Teknik Informatika', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'User'),
(2, 'Admin'),
(3, 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dok`
--
ALTER TABLE `dok`
  ADD PRIMARY KEY (`id_dok`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rate`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dok`
--
ALTER TABLE `dok`
  MODIFY `id_dok` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_role` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
