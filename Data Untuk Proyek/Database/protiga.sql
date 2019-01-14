-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 14 Jan 2019 pada 17.20
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

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
-- Struktur dari tabel `data_kk`
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
-- Struktur dari tabel `data_tanggung`
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
-- Struktur dari tabel `homepage`
--

CREATE TABLE `homepage` (
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `homepage`
--

INSERT INTO `homepage` (`title`, `text`) VALUES
('\r\nDepartment of Manpower and Transmigration of Indramayu Regency', 'Hello World! Anda Pesan Apa?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home_img`
--

CREATE TABLE `home_img` (
  `id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `home_img`
--

INSERT INTO `home_img` (`id`, `name`) VALUES
(1, '1.png'),
(2, '2.png'),
(3, '3.png'),
(4, '4.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabar`
--

CREATE TABLE `kabar` (
  `id` int(12) NOT NULL,
  `judul` varchar(64) COLLATE utf8_bin NOT NULL,
  `timedate` datetime NOT NULL,
  `pengguna` varchar(128) COLLATE utf8_bin NOT NULL,
  `konten` text COLLATE utf8_bin NOT NULL,
  `sampul` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `kabar`
--

INSERT INTO `kabar` (`id`, `judul`, `timedate`, `pengguna`, `konten`, `sampul`) VALUES
(1, 'Teroret', '2019-01-02 04:33:28', 'root@root.com', 'Blablablabla', 'default.png'),
(2, 'msmsms', '2019-01-01 00:00:00', 'root@root.com', 'kskhakofhkjdhfkjsdhkhsdk', 'default.png'),
(3, 'agagaga', '2019-01-02 00:00:00', 'root@root.com', 'kdsjkdsksd', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_data`
--

CREATE TABLE `log_data` (
  `id` int(12) NOT NULL,
  `tgl` date NOT NULL,
  `id_kk` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `surel` varchar(128) COLLATE utf8_bin NOT NULL,
  `namadepan` varchar(32) COLLATE utf8_bin NOT NULL,
  `namabelakang` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `sandi` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`surel`, `namadepan`, `namabelakang`, `sandi`) VALUES
('root@root.com', 'Root', 'Toor', 'ZWduYA==');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_session`
--

CREATE TABLE `tbl_session` (
  `id` varchar(128) COLLATE utf8_bin NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_bin NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data untuk tabel `tbl_session`
--

INSERT INTO `tbl_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('abrq8sl86nqhhpuinrknisvn8209df0k', '::1', 1547147852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373134373834343b),
('18nakal3miko2ch1vr1m15k9ajuqb7dr', '::1', 1547191315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373139313134353b),
('brse62ffpt189tjcg2eucs5kfo7oukoc', '::1', 1547462641, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373436323634313b),
('ei10il1jngadrh9uspjmn791s34ham7p', '127.0.0.1', 1547465012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373436343733353b);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kk`
--
ALTER TABLE `data_kk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_tanggung`
--
ALTER TABLE `data_tanggung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indeks untuk tabel `home_img`
--
ALTER TABLE `home_img`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kabar`
--
ALTER TABLE `kabar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengguna` (`pengguna`);

--
-- Indeks untuk tabel `log_data`
--
ALTER TABLE `log_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`surel`);

--
-- Indeks untuk tabel `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD KEY `timestamp` (`timestamp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_kk`
--
ALTER TABLE `data_kk`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_tanggung`
--
ALTER TABLE `data_tanggung`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `home_img`
--
ALTER TABLE `home_img`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kabar`
--
ALTER TABLE `kabar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `log_data`
--
ALTER TABLE `log_data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
