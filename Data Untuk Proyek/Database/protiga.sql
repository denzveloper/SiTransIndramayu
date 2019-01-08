-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2019 at 08:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `protiga`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kk`
--

CREATE TABLE `data_kk` (
  `id` int(12) NOT NULL,
  `namakk` varchar(128) COLLATE utf8_bin NOT NULL,
  `alamat` text COLLATE utf8_bin NOT NULL,
  `desa` varchar(64) COLLATE utf8_bin NOT NULL,
  `kecamatan` varchar(64) COLLATE utf8_bin NOT NULL,
  `kabupaten` varchar(64) COLLATE utf8_bin NOT NULL,
  `provinsi` varchar(64) COLLATE utf8_bin NOT NULL,
  `ttl` date NOT NULL,
  `ttk` date NOT NULL,
  `pendidikan` varchar(64) COLLATE utf8_bin NOT NULL,
  `pekerjaan` varchar(64) COLLATE utf8_bin NOT NULL,
  `pendapatan` int(12) NOT NULL,
  `luastinggal` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `data_tanggung`
--

CREATE TABLE `data_tanggung` (
  `id` int(12) NOT NULL,
  `id_kk` int(12) NOT NULL,
  `nama` varchar(128) COLLATE utf8_bin NOT NULL,
  `umur` int(3) NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `hubungan` varchar(64) COLLATE utf8_bin NOT NULL,
  `agama` varchar(64) COLLATE utf8_bin NOT NULL,
  `pendidikan` varchar(64) COLLATE utf8_bin NOT NULL,
  `pekerjaan` varchar(64) COLLATE utf8_bin NOT NULL,
  `keterangan` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `home_img`
--

CREATE TABLE `home_img` (
  `id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `kabar`
--

CREATE TABLE `kabar` (
  `id` int(12) NOT NULL,
  `judul` varchar(64) COLLATE utf8_bin NOT NULL,
  `timedate` datetime NOT NULL,
  `pengguna` varchar(128) COLLATE utf8_bin NOT NULL,
  `konten` text COLLATE utf8_bin NOT NULL,
  `sampul` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `log_data`
--

CREATE TABLE `log_data` (
  `id` int(12) NOT NULL,
  `tgl` date NOT NULL,
  `id_kk` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `surel` varchar(128) COLLATE utf8_bin NOT NULL,
  `namadepan` varchar(32) COLLATE utf8_bin NOT NULL,
  `namabelakang` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `sandi` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`surel`, `namadepan`, `namabelakang`, `sandi`) VALUES
('root@root.com', 'Root', 'Toor', 'ZWduYA==');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `id` varchar(128) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('jtcju63rviri3m66f22iraio4aet6lsl', '::1', 1546934739, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534363933343639363b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kk`
--
ALTER TABLE `data_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tanggung`
--
ALTER TABLE `data_tanggung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `home_img`
--
ALTER TABLE `home_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabar`
--
ALTER TABLE `kabar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna` (`pengguna`);

--
-- Indexes for table `log_data`
--
ALTER TABLE `log_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`surel`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD KEY `timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kk`
--
ALTER TABLE `data_kk`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_tanggung`
--
ALTER TABLE `data_tanggung`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_img`
--
ALTER TABLE `home_img`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabar`
--
ALTER TABLE `kabar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_data`
--
ALTER TABLE `log_data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
