-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 12:40 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(10) NOT NULL,
  `namadep` varchar(255) NOT NULL,
  `namabel` varchar(255) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `semester` char(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `namadep`, `namabel`, `mk`, `semester`, `username`, `password`, `level`) VALUES
(1, 'Young', 'Lex', '-', '3', 'admin', 'admin', 'admin'),
(6, 'Augie', 'Afriansyah', 'Dasar Dasar Pemrograman', '1', 'dosen1', 'dosen1', 'dosen'),
(7, 'Toriq', 'As Syarif', 'Web', '3', 'toriq', '123', 'mahasiswa'),
(8, 'akud', 'juyf', 'B indo', '1', 'jhv', 'jmnm', 'dosen'),
(9, 'tere', 'et', 'str', '3', 'dy', 'yftu', 'mahasiswa'),
(11, 'Sugiono', 'Top', 'Sastra Jepang', '1', 'jav', 'hd', 'dosen'),
(12, 'Sarwendah', 'Aku', 'IPA', '2', '123', '456', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `bank_jawaban`
--

CREATE TABLE `bank_jawaban` (
  `id_dosen` int(11) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_jawaban`
--

INSERT INTO `bank_jawaban` (`id_dosen`, `mk`, `semester`, `id_soal`, `id_mhs`, `nilai`) VALUES
(2, 'Struktur', '', 1, 1, 5),
(2, 'Struktur', '', 2, 1, 5),
(2, 'Struktur', '', 3, 1, 5),
(2, 'Struktur', '', 4, 1, 4),
(2, 'Struktur', '', 5, 1, 4),
(2, 'Struktur', '', 6, 1, 4),
(3, '<br', '', 1, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id_soal` int(10) NOT NULL,
  `jenis_soal` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id_soal`, `jenis_soal`, `pertanyaan`) VALUES
(1, '', 'Apakah cara mengajar dosen disukai oleh mahasiswa ?oyhoih'),
(2, '', 'Apakah mahasiswa dapat memahami apa yang disampaikan oleh dosen ?'),
(3, '', 'Apakah dosen bisa memberi motivasi kepada mahasiswanya ?'),
(4, '', 'Apakah dosen menguasai materi yang disampaikan ?'),
(5, '', 'Apakah dosen bisa menjadi contoh untuk mahasiswanya ?'),
(6, '', 'Apakah dosen menggunakan kata-kata yang baik ketika mengajarkan mahasiswanya ?'),
(7, '', 'Apakah admin GANTENG?');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `id_dosen`) VALUES
(6, 3),
(11, 5),
(12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `jurusanti`
--

CREATE TABLE `jurusanti` (
  `NIM` char(14) NOT NULL,
  `Nama` char(25) DEFAULT NULL,
  `IPK` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `id_mhs`) VALUES
(7, 3),
(8, 4),
(9, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_dosen` (`namadep`),
  ADD KEY `mata_kuliah` (`mk`);

--
-- Indexes for table `bank_jawaban`
--
ALTER TABLE `bank_jawaban`
  ADD PRIMARY KEY (`id_dosen`,`mk`,`id_soal`,`id_mhs`);

--
-- Indexes for table `bank_soal`
--
ALTER TABLE `bank_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `dosen` (`id`) USING BTREE;

--
-- Indexes for table `jurusanti`
--
ALTER TABLE `jurusanti`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `mhs_ibfk1` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_soal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk1` FOREIGN KEY (`id`) REFERENCES `akun` (`id`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mhs_ibfk1` FOREIGN KEY (`id`) REFERENCES `akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
