-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 12:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_012_defa_p2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masyarakat`
--

CREATE TABLE `tbl_masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_masyarakat`
--

INSERT INTO `tbl_masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `level`) VALUES
('0123413', 'defa', 'dfa', '111069c2080b8a415281487285763123', '3413284123', 'masyarakat'),
('111222333', 'Andi ahmat', 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', '234567890', 'masyarakat'),
('123', 'sapi', 'sapi', 'f87f8f834b237ad853fb44cccaa18952', '121287312', 'masyarakat'),
('123345324', 'Bagus ', 'Bagus ', '0d2efa7019d0307bb719eaccaf632e7b', '23435423412', 'masyarakat'),
('123456543', 'naka', 'naka', 'eaa46f8ce06a37d2d6953b021049d7f0', '087823341312', 'masyarakat'),
('12345678', 'Defa Danuarta', 'dfa', '1b014086a5cf92eb3238d0d45c8c61a4', '1234567890', 'masyarakat'),
('1312123424', 'Andi', 'admin', 'e807f1fcf82d132f9bb018ca6738a19f', '0', 'masyarakat'),
('6267', 'Naka Manjah', 'naka', 'eaa46f8ce06a37d2d6953b021049d7f0', '036156789', 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `judul_laporan` varchar(200) NOT NULL,
  `alamat_laporan` varchar(200) NOT NULL,
  `isi_laporan` longtext NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','selesai','proses') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaduan`
--

INSERT INTO `tbl_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_laporan`, `alamat_laporan`, `isi_laporan`, `foto`, `status`) VALUES
(119, '2023-10-03', '111222333', 'ini tes laporan yagesya', 'ini tes laporan yagesya', 'ini tes laporan yagesya', '630-Gerbang Logika.png', 'selesai'),
(120, '2023-10-03', '111222333', 'Jalan Berlubang', 'Jalan Berlubang', 'Jalan Berlubang', '73-Jawban nomor 4.jpg', 'proses'),
(121, '2023-10-09', '1312123424', 'sakit perut', 'rumah', 'sakit prut', '686-2702331990-Defa-Danuarta-Infografik-Diksi.jpg', 'selesai'),
(122, '2023-10-09', '1312123424', 'sadfasdf', 'surga', 'meninggal', '971-2702331990-Defa-Danuarta-Infografik-Diksi.jpg', '0'),
(123, '2023-10-09', '1312123424', 'ini tes laporan yagesya', 'ini tes laporan yagesya', 'ini tes laporan yagesya', '956-kadarius-seegars-GDSNp1RJyLE-unsplash.jpg', '0'),
(124, '2023-12-20', '123', 'ini tes laporan yagesya', 'ini tes laporan yagesya', 'ini tes laporan yagesya', '92-Flowchart.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telpon`, `level`) VALUES
(16, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', '121321', 'petugas'),
(18, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '12234231', 'admin'),
(19, 'bram', 'beram', 'b4f2baf3a93f9e9d8657605826586df8', '12343231423', 'petugas'),
(25, 'Bagus', 'Bagus', '5462929db201a15aaf6d2d3400b66773', '1980990381', 'admin'),
(29, 'Defa Danuarta', 'defa', 'a7b200082567e07e8411900f95ad6686', '87862275753', 'admin'),
(31, 'owen', 'aku', 'a5630953c5b390de391a362ed6853b77', '09876543', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanggapan`
--

CREATE TABLE `tbl_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `judul_laporan` varchar(200) NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tanggapan`
--

INSERT INTO `tbl_tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `judul_laporan`, `tanggapan`, `id_petugas`) VALUES
(36, 117, '2023-04-17', 'Perbukitan', 'Baik akan kami tangani secepat mungkin', 18),
(39, 118, '2023-10-09', 'banjar', 'kasian', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_masyarakat`
--
ALTER TABLE `tbl_masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`),
  ADD KEY `judul_laporan` (`judul_laporan`),
  ADD KEY `alamat_laporan` (`alamat_laporan`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `nama_petugas` (`nama_petugas`);

--
-- Indexes for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `judul_laporan` (`judul_laporan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_tanggapan`
--
ALTER TABLE `tbl_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
