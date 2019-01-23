-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 23, 2019 at 07:11 AM
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
  `id` int(1) NOT NULL DEFAULT '0',
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `title`, `text`) VALUES
(0, 'The Quick Brown Fox Jumps Over the Lazy Dog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque eu tincidunt tortor aliquam. Nunc sed blandit libero volutpat sed. Nibh venenatis cras sed felis eget velit. Bibendum ut tristique et egestas quis ipsum suspendisse. Pellentesque massa placerat duis ultricies. Fusce ut placerat orci nulla pellentesque dignissim enim sit amet. Cras tincidunt lobortis feugiat vivamus at augue. Quis imperdiet massa tincidunt nunc pulvinar sapien. Porttitor leo a diam sollicitudin tempor id eu nisl. Mus mauris vitae ultricies leo integer malesuada nunc vel risus.\r\n\r\nScelerisque felis imperdiet proin fermentum. Et malesuada fames ac turpis egestas. Odio pellentesque diam volutpat commodo sed egestas egestas fringilla. Blandit cursus risus at ultrices. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices. Eget nulla facilisi etiam dignissim diam. Diam sit amet nisl suscipit adipiscing. Odio euismod lacinia at quis risus sed vulputate odio ut. Mollis aliquam ut porttitor leo a diam sollicitudin. Auctor eu augue ut lectus arcu bibendum at. Ullamcorper sit amet risus nullam eget felis eget. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Hac habitasse platea dictumst vestibulum rhoncus. Porttitor lacus luctus accumsan tortor posuere ac ut consequat semper. Tellus integer feugiat scelerisque varius morbi enim nunc faucibus. Ullamcorper eget nulla facilisi etiam dignissim.\r\n\r\nJusto laoreet sit amet cursus sit amet dictum sit amet. In ante metus dictum at. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Odio pellentesque diam volutpat commodo sed egestas egestas. Eu ultrices vitae auctor eu augue ut. Convallis convallis tellus id interdum. In ante metus dictum at. Nunc sed id semper risus in hendrerit gravida rutrum quisque. Morbi leo urna molestie at elementum. Fringilla ut morbi tincidunt augue interdum velit euismod in. Turpis egestas maecenas pharetra convallis posuere morbi leo urna. Nisl nisi scelerisque eu ultrices vitae. Ullamcorper eget nulla facilisi etiam. Pretium quam vulputate dignissim suspendisse in est. Aliquam purus sit amet luctus venenatis. Quisque id diam vel quam elementum pulvinar etiam non quam.\r\n\r\nNunc eget lorem dolor sed viverra ipsum nunc aliquet bibendum. Bibendum est ultricies integer quis auctor elit sed vulputate mi. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Commodo viverra maecenas accumsan lacus. Integer eget aliquet nibh praesent tristique magna sit. Sit amet tellus cras adipiscing enim eu turpis egestas pretium. Consectetur a erat nam at lectus urna duis convallis. Tellus molestie nunc non blandit massa enim. Netus et malesuada fames ac turpis egestas. Aliquam sem fringilla ut morbi tincidunt. Dui ut ornare lectus sit amet est placerat in egestas. Nisl vel pretium lectus quam id leo. Id consectetur purus ut faucibus pulvinar elementum integer enim neque. Euismod nisi porta lorem mollis aliquam ut. Sapien eget mi proin sed libero enim. Nunc id cursus metus aliquam eleifend mi. Nulla aliquet porttitor lacus luctus accumsan tortor. Facilisi etiam dignissim diam quis enim lobortis. Pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus.');

-- --------------------------------------------------------

--
-- Table structure for table `home_img`
--

CREATE TABLE `home_img` (
  `id` int(12) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `home_img`
--

INSERT INTO `home_img` (`id`, `name`) VALUES
(1, '1.jpg'),
(4, '4.jpg');

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
  `sampul` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kabar`
--

INSERT INTO `kabar` (`id`, `judul`, `timedate`, `pengguna`, `konten`, `sampul`) VALUES
(1, 'Teroret', '2019-01-02 04:33:28', 'root@root.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla at commodo nibh. Morbi volutpat urna vel tempor vestibulum. Etiam nec nisl elementum, fringilla neque ut, imperdiet libero. Curabitur id sem eu dolor suscipit tincidunt. Integer lacus felis, eleifend nec arcu ac, aliquet tincidunt massa. Vivamus sed odio blandit, porta massa sed, ornare purus. Ut non diam eros. Donec tortor purus, condimentum at purus venenatis, fringilla sodales odio. Suspendisse massa orci, pulvinar et leo id, vulputate molestie mi. Aliquam sit amet lectus eget nunc suscipit venenatis vitae porta lacus.', '1.png'),
(2, 'msmsms', '2019-01-01 00:00:00', 'root@root.com', 'Curabitur lobortis vehicula consectetur. Nunc et laoreet nunc. Fusce et eleifend tortor, id feugiat metus. Duis sollicitudin nunc purus, ut cursus augue luctus in. Vivamus vitae augue metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec faucibus nisl sit amet elementum placerat. Suspendisse in purus metus. Sed nec justo lobortis, porttitor neque in, mollis nibh. Nam ligula justo, maximus eget sagittis quis, posuere et nunc. Vestibulum ac consequat turpis. Vestibulum at elit ac ante pharetra rutrum gravida in urna. Donec facilisis eros nec bibendum dictum.', '2.jpg'),
(3, 'agagaga', '2019-01-02 00:00:00', 'root@root.com', 'Mauris scelerisque molestie magna. Vestibulum eget risus purus. Duis sollicitudin sem quis sem porta faucibus. Nunc et felis sem. In eget dictum massa. Aliquam ut erat cursus, viverra nibh vel, venenatis est. Vivamus porta ex posuere quam lobortis tempus. Cras congue elit arcu, et lacinia odio accumsan condimentum. Curabitur fermentum, arcu ac gravida consectetur, tellus orci efficitur orci, sed porta odio nisl lacinia elit. In justo nisi, viverra in condimentum sed, aliquam auctor nisi. Nunc risus ante, blandit non dapibus mollis, rhoncus eget tortor. Donec gravida diam in eros tristique, finibus iaculis turpis hendrerit. Morbi ac condimentum enim. Vivamus vulputate suscipit arcu sit amet rutrum.', '3.jpg');

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
('j2acf5qa136ad1rerohd46t0pujnsqe5', '::1', 1547640545, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373634303336323b696e666f7c613a313a7b693a303b613a343a7b733a333a2269636f223b733a32363a22676c79706869636f6e20676c79706869636f6e2d72656d6f7665223b733a333a22746974223b733a383a225761726e696e673a223b733a333a22747874223b733a33333a223c693e4d61696c206f722050617373776f72642069732057726f6e67213c2f693e223b733a333a22747970223b733a363a2264616e676572223b7d7d5f5f63695f766172737c613a313a7b733a343a22696e666f223b733a333a226e6577223b7d),
('00ne47k9q9idp4kmq3l18kd8tc2k060n', '::1', 1547653964, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373635333935313b),
('1uv1f0re0jeh3mbbao2u2hsu2um3kcrk', '::1', 1547654010, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373635333939313b),
('9a82btinuqgld7csu74llfvh10o6k3nl', '::1', 1547662997, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373636323936323b),
('ohp3j7s5k4ht6uvpbkt9sj7uqv60uqsf', '::1', 1547663133, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373636323937383b),
('5td76s176inqlc1rn0hi1vlr2kjl0a4a', '::1', 1547704199, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373730333939393b),
('ckrqh83asmvt4435ah7c7qj99248pa9v', '::1', 1547707421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373730373432303b),
('0frubq70fm9s3lsvh6bkjq550a3r0t0f', '::1', 1547717138, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373731373037343b),
('b89l3rbcpjsg7n31s8cejfsd2p9k6k0u', '::1', 1547987319, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534373938373236353b),
('pm5qe06jcc4m5m79v478fhfcph5hded3', '::1', 1548008844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383030383632383b),
('iboppfhoouf2os46a8f5e6dvt5v6nn67', '::1', 1548009272, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383030393035383b),
('ffccr2t0uehgtl35ord9icran58uod0p', '::1', 1548044657, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383034343634323b),
('e787t4aa5f90njshcalsrfacvj8r7vff', '::1', 1548050278, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383035303236333b),
('f0eubcbbqt7os8vvqn90n0n3mvp35avm', '::1', 1548137816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383133373831353b),
('rkru9ps9ef19iga7fr8oqrhos30insnf', '::1', 1548144222, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383134343232323b696e666f7c613a313a7b693a303b613a343a7b733a333a2269636f223b733a32363a22676c79706869636f6e20676c79706869636f6e2d72656d6f7665223b733a333a22746974223b733a383a225761726e696e673a223b733a333a22747874223b733a33333a223c693e4d61696c206f722050617373776f72642069732057726f6e67213c2f693e223b733a333a22747970223b733a363a2264616e676572223b7d7d5f5f63695f766172737c613a313a7b733a343a22696e666f223b733a333a226e6577223b7d),
('qkmivplep6ctlv914jn7ivkmbpqfj87c', '::1', 1548146931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383134363933313b696e666f7c613a313a7b693a303b613a343a7b733a333a2269636f223b733a32373a22676c79706869636f6e20676c79706869636f6e2d6c6f672d6f7574223b733a333a22746974223b733a31343a22476f6f642062796520526f6f7421223b733a333a22747874223b733a32353a223c693e20596f757265206e6f77206c6f676f75742e3c2f693e223b733a333a22747970223b733a373a227761726e696e67223b7d7d5f5f63695f766172737c613a313a7b733a343a22696e666f223b733a333a226f6c64223b7d),
('34pcvnu0umci2ct64fge3vrvaek39k5j', '::1', 1548162238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383136323139323b6c6f676765645f696e7c623a313b6d61696c7c733a31333a22726f6f7440726f6f742e636f6d223b666e616d7c733a343a22526f6f74223b6c6e616d7c733a343a22546f6f72223b),
('kql79vv2erutkoubndv2f5eqd5ti55ol', '::1', 1548169745, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383136393734353b696e666f7c613a313a7b693a303b613a343a7b733a333a2269636f223b733a32363a22676c79706869636f6e20676c79706869636f6e2d72656d6f7665223b733a333a22746974223b733a363a22536f72727921223b733a333a22747874223b733a32343a223c693e596f7520617265206e6f74206c6f67696e3c2f693e223b733a333a22747970223b733a363a2264616e676572223b7d7d5f5f63695f766172737c613a313a7b733a343a22696e666f223b733a333a226f6c64223b7d),
('tddv8f5hf2e6f072mncla4uc4kq40o6m', '::1', 1548225017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383232343933343b6c6f676765645f696e7c623a313b6d61696c7c733a31333a22726f6f7440726f6f742e636f6d223b666e616d7c733a343a22526f6f74223b6c6e616d7c733a343a22546f6f72223b);

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
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kabar`
--
ALTER TABLE `kabar`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_data`
--
ALTER TABLE `log_data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_tanggung`
--
ALTER TABLE `data_tanggung`
  ADD CONSTRAINT `data_tanggung_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `data_kk` (`id`);

--
-- Constraints for table `kabar`
--
ALTER TABLE `kabar`
  ADD CONSTRAINT `kabar_ibfk_1` FOREIGN KEY (`pengguna`) REFERENCES `pengguna` (`surel`);

--
-- Constraints for table `log_data`
--
ALTER TABLE `log_data`
  ADD CONSTRAINT `log_data_ibfk_1` FOREIGN KEY (`id_kk`) REFERENCES `data_kk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
