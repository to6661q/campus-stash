-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 07:28 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` tinyint(1) NOT NULL COMMENT '0 (user), 1 (admin)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `username`, `password`, `akses`) VALUES
('A 9021 A', 'user', 'user', 0),
('A 9028 A', 'A 9028 A', 'A 9028 A', 0),
('ADM005', 'lubisss', 'lubis', 1),
('ADM006', 'admin', 'admin', 1),
('ADM007', 'barus', 'barus', 1),
('B 1223 K', 'B 1223 Kk', 'B 1223 K', 0),
('B 13 K', 'B 13 K', 'B 13 K', 0),
('B 2010 K', 'B 2010 K', 'B 2010 K', 0),
('B 2181 VK', 'dzil', 'dzil', 0),
('B 7777 O', 'B 7777 O', 'B 7777 O', 0),
('B 8888 W', 'B 8888 W', 'B 8888 W', 0),
('B1223K', 'B1223K', 'B1223K', 0),
('B8888W', 'B8888W', 'B8888W', 0),
('F 0909 Z', 'F 0909 Z', 'F 0909 Z', 0),
('F 7080 A', 'F 7080 A', 'F 7080 A', 0),
('F 7081 A', 'F 7081 A', 'F 7081 A', 0),
('F 9830 V', 'F 9830 V', 'F 9830 V', 0),
('F 9999 Z', 'F 9999 Z', 'F 9999 Z', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_admin`
--

CREATE TABLE `tb_detail_admin` (
  `id_akun` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_admin`
--

INSERT INTO `tb_detail_admin` (`id_akun`, `nama`, `tgl_lahir`, `foto`) VALUES
('ADM005', 'lubisss', '2012-10-27', ''),
('ADM006', 'admin', '2018-12-19', ''),
('ADM007', 'Barus', '2004-10-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `id_gedung` int(5) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `kuota` int(5) NOT NULL,
  `terisi` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `nama_gedung`, `kuota`, `terisi`) VALUES
(1, 'Lantai 1', 10, 2),
(2, 'Lantai 2', 10, 1),
(4, 'Lantai 3', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_history_parkir`
--

CREATE TABLE `tb_history_parkir` (
  `id_history` int(11) NOT NULL,
  `plat_nomor` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waktu_keluar` datetime DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_history_parkir`
--

INSERT INTO `tb_history_parkir` (`id_history`, `plat_nomor`, `keterangan`, `waktu_masuk`, `waktu_keluar`, `biaya`) VALUES
(51, 'B1223K', 'Di Lantai 2 Nomor 3', '2018-12-17 15:17:46', '2018-12-17 15:23:08', NULL),
(52, 'F 7081 A', 'Di Lantai 2 Nomor 1', '2018-12-17 15:20:17', '2018-12-17 15:22:38', NULL),
(53, 'B1223K', 'Di Lantai 1 Nomor 1', '2018-12-17 15:23:28', '2018-12-17 15:33:17', NULL),
(54, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-18 13:40:58', '2018-12-18 13:41:38', NULL),
(55, 'F 7080 A', 'Di Lantai 1 Nomor 2', '2018-12-18 13:41:04', '2018-12-20 03:08:57', 0),
(56, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-19 14:51:15', '2018-12-19 14:52:52', NULL),
(57, 'B 1223 K', 'Di Lantai 3 Nomor 1', '2018-12-19 14:52:32', '2018-12-19 15:13:26', NULL),
(58, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-19 17:13:44', '2018-12-19 17:14:16', NULL),
(59, 'B1223K', 'Di Lantai 2 Nomor 1', '2018-12-19 17:14:10', '2018-12-20 03:10:29', 11000),
(60, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-20 03:12:08', '2018-12-20 22:25:31', 8000),
(61, 'F 7081 A', 'Di Lantai 1 Nomor 2', '2018-12-20 03:12:15', '2018-12-20 06:26:36', 5000),
(62, 'B 2010 K', 'Di Lantai 2 Nomor 3', '2018-12-20 03:12:21', '2018-12-20 04:29:36', 3000),
(63, 'B 8888 W', 'Di Lantai 1 Nomor 1', '2018-12-20 03:31:36', '2018-12-20 03:32:11', 2000),
(64, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-20 04:01:08', '2018-12-20 04:01:34', 2000),
(65, 'F 7080 A', 'Di Lantai 1 Nomor 1', '2018-12-20 04:02:52', '2018-12-20 17:01:16', 8000),
(66, 'B 7777 O', 'Di Lantai 1 Nomor 2', '2018-12-20 04:02:56', '2018-12-20 04:03:06', 2000),
(67, 'F 7081 A', 'Di Lantai 2 Nomor 1', '2018-12-20 04:03:01', '2018-12-20 17:04:51', 8000),
(68, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-21 09:06:34', '2018-12-21 09:07:13', 2000),
(69, 'B 7777 O', 'Di Lantai 1 Nomor 1', '2018-12-21 10:03:37', '2018-12-21 10:03:43', 2000),
(70, 'F 7081 A', 'Di Lantai 1 Nomor 1', '2018-12-21 11:22:21', NULL, NULL),
(71, 'B1223K', 'Di Lantai 1 Nomor 2', '2018-12-21 11:22:26', NULL, NULL),
(72, 'F 7080 A', 'Di Lantai 2 Nomor 1', '2018-12-21 11:22:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ketentuan`
--

CREATE TABLE `tb_ketentuan` (
  `ketentuan` varchar(50) NOT NULL,
  `isi` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ketentuan`
--

INSERT INTO `tb_ketentuan` (`ketentuan`, `isi`) VALUES
('tarif_awal', 2000),
('tarif_perjam', 1000),
('tarif_maks', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_parkir`
--

CREATE TABLE `tb_parkir` (
  `plat_nomor` varchar(20) NOT NULL,
  `id_gedung` int(5) NOT NULL,
  `nomor_tempat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_parkir`
--

INSERT INTO `tb_parkir` (`plat_nomor`, `id_gedung`, `nomor_tempat`) VALUES
('B1223K', 1, 2),
('F 7080 A', 2, 1),
('F 7081 A', 1, 1);

--
-- Triggers `tb_parkir`
--
DELIMITER $$
CREATE TRIGGER `trg_parkir_keluar` AFTER DELETE ON `tb_parkir` FOR EACH ROW BEGIN
	DECLARE waktu timestamp;
	DECLARE awal, perjam, maks, selisih, total_biaya int;
	SET waktu = (SELECT waktu_masuk FROM tb_history_parkir WHERE plat_nomor=OLD.plat_nomor AND waktu_keluar IS NULL);
	SET awal = (SELECT isi FROM tb_ketentuan WHERE ketentuan='tarif_awal');
	SET perjam = (SELECT isi FROM tb_ketentuan WHERE ketentuan='tarif_perjam');
	SET maks = (SELECT isi FROM tb_ketentuan WHERE ketentuan='tarif_maks');
	SET selisih = TIMESTAMPDIFF(HOUR, waktu, CURRENT_TIMESTAMP());
	
	IF selisih=0 THEN
		UPDATE tb_history_parkir SET biaya=awal WHERE plat_nomor=OLD.plat_nomor AND waktu_keluar IS NULL;
	ELSEIF (awal+(selisih*perjam))>maks THEN
		UPDATE tb_history_parkir SET biaya=maks WHERE plat_nomor=OLD.plat_nomor AND waktu_keluar IS NULL;
	ELSE 
		SET total_biaya = awal+(selisih*perjam);
		UPDATE tb_history_parkir SET biaya=total_biaya WHERE plat_nomor=OLD.plat_nomor AND waktu_keluar IS NULL;
	END IF;	
	
	UPDATE tb_gedung SET terisi=terisi-1 WHERE id_gedung=OLD.id_gedung;
	UPDATE tb_history_parkir SET waktu_keluar=CURRENT_TIMESTAMP() WHERE plat_nomor=OLD.plat_nomor AND waktu_keluar IS NULL;
	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_parkir_masuk` AFTER INSERT ON `tb_parkir` FOR EACH ROW BEGIN
	UPDATE tb_gedung SET terisi=terisi+1 WHERE id_gedung=NEW.id_gedung;
	INSERT tb_history_parkir(plat_nomor, keterangan) VALUES (NEW.plat_nomor, CONCAT('Di ', (SELECT nama_gedung FROM tb_gedung WHERE id_gedung=NEW.id_gedung), ' Nomor ', NEW.nomor_tempat));
	IF (SELECT COUNT(id_akun) FROM tb_akun WHERE id_akun=NEW.plat_nomor)=0 THEN
		INSERT tb_akun(id_akun, username, password, akses) VALUES (NEW.plat_nomor, NEW.plat_nomor, NEW.plat_nomor, 0);
	END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_detail_admin`
--
ALTER TABLE `tb_detail_admin`
  ADD KEY `FK_id_akun` (`id_akun`);

--
-- Indexes for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `tb_history_parkir`
--
ALTER TABLE `tb_history_parkir`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD UNIQUE KEY `plat_nomor` (`plat_nomor`),
  ADD KEY `FK_id_gedung` (`id_gedung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_history_parkir`
--
ALTER TABLE `tb_history_parkir`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_admin`
--
ALTER TABLE `tb_detail_admin`
  ADD CONSTRAINT `FK_id_akun` FOREIGN KEY (`id_akun`) REFERENCES `tb_akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_parkir`
--
ALTER TABLE `tb_parkir`
  ADD CONSTRAINT `FK_id_gedung` FOREIGN KEY (`id_gedung`) REFERENCES `tb_gedung` (`id_gedung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
