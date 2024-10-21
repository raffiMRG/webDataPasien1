-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2024 at 06:56 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE `aktifitas` (
  `norm` int NOT NULL,
  `id_user` int NOT NULL,
  `jenis_aktifitas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktifitas`
--

INSERT INTO `aktifitas` (`norm`, `id_user`, `jenis_aktifitas`, `tanggal_mulai`, `tanggal_selesai`, `waktu`) VALUES
(1, 1, 'Jalan Pagi', '2024-09-04', '2024-09-04', '07.00-8.00 Pagi'),
(2, 0, 'Jalan', '2024-09-01', '2024-09-01', '07.00-08.00 Pagi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `datapasien`
--

CREATE TABLE `datapasien` (
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `jeniskelamin` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `norm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datapasien`
--

INSERT INTO `datapasien` (`nama`, `nik`, `id_user`, `jeniskelamin`, `tanggallahir`, `alamat`, `email`, `norm`) VALUES
('otong', '123123123123', 14, 'P', '2024-10-03', 'jalajjalan', 'asdasd@asdasd.com', 123),
('ucup', '123123123125', 15, 'P', '2024-10-09', 'jalajjalan', 'asdasd@asda.com', 1234),
('dasd', '123123123156', 16, 'L', '2021-12-27', 'jalajjalan', 'asdasda@asdasd.com', 123145),
('teto', '12312314444', 17, 'L', '2024-10-01', 'jalajjalan', 'asd@asd.com', 1231234),
('mrg', '1234561234560001', 30, 'L', '2003-12-27', 'JL durian no 5', 'mutekinoraffi@gmail.com', 128080);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int NOT NULL,
  `id_user` int NOT NULL,
  `norm` int NOT NULL,
  `nama_obat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dosis` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `frekuensi` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `ketersediaan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_user`, `norm`, `nama_obat`, `dosis`, `frekuensi`, `tanggal_mulai`, `tanggal_selesai`, `ketersediaan`, `waktu`) VALUES
(1, 1, 1, 'Paracetamol', '1', '3 kali sehari', '2024-09-01', '2024-09-10', '500', 'setelah makan, pagi, siang, dan malam\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan`
--

CREATE TABLE `pemeriksaan` (
  `tekanan_darah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `suhu_tubuh` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nadi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `respiratory` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `berat_badan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `id_user` int NOT NULL,
  `norm` int NOT NULL,
  `nama` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu` time DEFAULT NULL,
  `tanggallahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemeriksaan`
--

INSERT INTO `pemeriksaan` (`tekanan_darah`, `suhu_tubuh`, `nadi`, `respiratory`, `berat_badan`, `tanggal_pemeriksaan`, `id_user`, `norm`, `nama`, `waktu`, `tanggallahir`) VALUES
('150', '37', '200', '75', '100', '2024-10-01', 15, 123, 'otong', NULL, '2024-10-03'),
('150', '100', '200', '75', '50', '2024-10-08', 16, 123, 'otong', NULL, '2024-10-03'),
('12', '21', '12', '21', '12', '2024-10-02', 17, 123, 'otong', NULL, '2024-10-03'),
('32', '123', '32', '12', '100', '2024-10-20', 18, 123, 'otong', NULL, '2024-10-03'),
('100', '27', '70', '80', '40', '2024-10-22', 19, 1234, 'ucup', NULL, '2024-10-09'),
('150', '100', '12', '75', '100', '2024-10-21', 20, 1234, 'ucup', NULL, '2024-10-09'),
('12', '43', '212', '32', '100', '2024-10-23', 21, 1231234, 'teto', NULL, '2024-10-01'),
('120', '30', '70', '80', '100', '2024-10-22', 22, 128080, 'mrg', NULL, '2003-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `email`, `password`, `role`, `level`) VALUES
(1, 'caesar', 'caesar', 'pasien', 'user'),
(2, 'perawat', 'perawat', 'perawat', 'user'),
(3, 'eka@gmail.com', 'ekapembalap', 'pasien', 'user'),
(5, 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`norm`);

--
-- Indexes for table `datapasien`
--
ALTER TABLE `datapasien`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `norm` (`norm`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `norm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datapasien`
--
ALTER TABLE `datapasien`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemeriksaan`
--
ALTER TABLE `pemeriksaan`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
