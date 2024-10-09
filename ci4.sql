-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 06:03 PM
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
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pelanggan` int(7) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `kode_pos` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telp`, `email`, `tanggal_lahir`, `jenis_kelamin`, `kota`, `provinsi`, `negara`, `kode_pos`, `password`, `komentar`, `created_at`, `updated_at`) VALUES
(2, 'soleh', 'Jl. Jend Jun b-1, ', 8151981056, 'soleh.pargoy@xxx.com', '2021-12-27', 'Laki-laki', '', '', '', '', '', '', '2024-09-17 11:14:43', '2024-09-17 11:14:43'),
(3, 'Pupu Ramadhan Nur', 'Mega Kebon Jeruk b-1, Rt 001/09, Kec. Kembangan', 8151981213, 'pupu.ramadhan@gmail.com', '2020-02-07', 'Laki-laki', '', '', '', '', '', '', '2024-09-17 11:18:13', '2024-09-17 11:18:13'),
(4, 'kjsnad', 'knasdlkn./ásdsa', 8151984324, 'jamal@bonsain.com', '1988-08-27', 'Perempuan', '', '', '', '', '$2y$10$uztF/sjlcbLo88yjTVft2e5LaglpA.YxZ5N4H5g6wNFoTPxbp6x9i', '', '2024-09-23 05:27:43', '2024-09-23 05:27:43'),
(5, 'faisyal wibu', 'depok jonggol', 82392138129, 'faisyal.wibu@test.com', '2009-03-02', 'Laki-laki', '', '', '', '', '$2y$10$S8D4aM2/uQ9XlrV286oGX.gM5Z.SEMaecV/RSbQrz792GfHDg2M7e', '', '2024-09-23 06:27:39', '2024-09-23 06:27:39'),
(6, 'Alfatih', 'Jakarta Barat', 8151984324, 'alfatih@test.com', '2000-11-01', 'Laki-laki', '', '', '', '', '$2y$10$0DGWDhNy/85xUkBroOH7VOZx1mH5yMX2YgDVk61n5So2L/bAp38h2', '', '2024-09-23 07:19:46', '2024-09-23 07:19:46'),
(7, 'samsul', 'Jl. Gatot Subroto, No. 39', 8123321311, 'samsul@test.com', '2008-06-06', 'Laki-laki', '', '', '', '', '$2y$10$yKCyb1Z.ZyxL5yuoLOmzX.5DJvjYvZPUakPButKQZ8dWmcCTi476i', '', '2024-09-23 07:46:06', '2024-09-23 07:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tinggi_badan` varchar(3) NOT NULL,
  `berat_badan` varchar(3) NOT NULL,
  `nama_hubungan` varchar(30) NOT NULL,
  `jenis_dokumen` varchar(30) NOT NULL,
  `nomor_dokumen` varchar(30) NOT NULL,
  `alamat` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`id_pendaftaran`, `nama`, `agama`, `tempat_lahir`, `tinggi_badan`, `berat_badan`, `nama_hubungan`, `jenis_dokumen`, `nomor_dokumen`, `alamat`) VALUES
(1, 'Pupu Ramadhan Nur', 'Islam', 'Jakarta', '168', '80', 'Mahasiswa', 'KTP', '091203131', 'Jakarta barat'),
(2, 'Ali Oncom', 'Islam', 'Konoha', '178', '80', 'Mahasiswa', 'Paspor', '12332131', 'Bojong Gede');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pelanggan` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pendaftaran`
--
ALTER TABLE `tbl_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
