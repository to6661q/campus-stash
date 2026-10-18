-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 04:16 PM
-- Server version: 10.1.39-MariaDB
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
-- Database: `db_academic`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(10) NOT NULL,
  `namadep` varchar(255) NOT NULL,
  `namabel` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `namadep`, `namabel`, `username`, `password`, `level`) VALUES
(1, 'Alan', 'Suryajana', 'admin', 'admin', 'admin'),
(3, 'Kahfi', 'Del Vieri', 'dosen', 'dosen', 'dosen'),
(4, 'Fazza', 'Mufti Taufiqi', 'mhs', 'mhs', 'mahasiswa'),
(5, 'Fuad', 'Aminj', 'mhs1', 'mhs1', 'mahasiswa'),
(6, 'Andi', 'Setiawan', 'mhs3', 'mhs3', 'mahasiswa'),
(7, 'Imam', 'Lutfi', 'dosen1', 'dosen1', 'dosen'),
(8, 'Rafkah', 'Rizqia', 'dosen2', 'dosen2', 'dosen'),
(9, 'Muhammad', 'Alfani', 'dosen3', 'dosen3', 'dosen'),
(10, 'Laely', 'Multaqiyah', 'mhs4', 'mhs4', 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `bank_jawaban`
--

CREATE TABLE `bank_jawaban` (
  `id_dosen` int(11) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_jawaban`
--

INSERT INTO `bank_jawaban` (`id_dosen`, `mk`, `id_soal`, `id_mhs`, `nilai`) VALUES
(6, 'Rekayasa', 1, 3, 5),
(6, 'Rekayasa', 1, 4, 3),
(6, 'Rekayasa', 2, 3, 5),
(6, 'Rekayasa', 2, 4, 3),
(6, 'Rekayasa', 3, 3, 5),
(6, 'Rekayasa', 3, 4, 3),
(6, 'Rekayasa', 4, 3, 5),
(6, 'Rekayasa', 4, 4, 3),
(6, 'Rekayasa', 5, 3, 5),
(6, 'Rekayasa', 5, 4, 3),
(6, 'Rekayasa', 6, 3, 5),
(6, 'Rekayasa', 6, 4, 3),
(6, 'Rekayasa', 7, 3, 5),
(6, 'Rekayasa', 7, 4, 3),
(6, 'Rekayasa', 8, 3, 5),
(6, 'Rekayasa', 8, 4, 3),
(6, 'Rekayasa', 9, 3, 5),
(6, 'Rekayasa', 9, 4, 3),
(6, 'Rekayasa', 10, 3, 5),
(6, 'Rekayasa', 10, 4, 3),
(7, 'Matematika', 1, 3, 1),
(7, 'Matematika', 2, 3, 2),
(7, 'Matematika', 3, 3, 3),
(7, 'Matematika', 4, 3, 4),
(7, 'Matematika', 5, 3, 5),
(7, 'Matematika', 6, 3, 4),
(7, 'Matematika', 7, 3, 3),
(7, 'Matematika', 8, 3, 2),
(7, 'Matematika', 9, 3, 1),
(7, 'Matematika', 10, 3, 2);

--
-- Triggers `bank_jawaban`
--
DELIMITER $$
CREATE TRIGGER `AFTER_INSERT_BANK_JAWABAN` AFTER INSERT ON `bank_jawaban` FOR EACH ROW BEGIN
	SET @sum = 0;
	SET @exists = 0;
	SET @avg = 0;
	SELECT EXISTS(SELECT id_dosen FROM hasil WHERE id_dosen= new.id_dosen AND id_soal=new.id_soal) INTO @exists;
	IF(@exists = 0)THEN
	INSERT INTO hasil(id_dosen, id_soal, nilai)
	VALUES (new.id_dosen, new.id_soal, new.nilai);
	END IF;
	SELECT AVG(nilai) FROM bank_jawaban WHERE id_dosen = new.id_dosen AND id_soal = new.id_soal INTO @avg;
	SELECT SUM(nilai) FROM bank_jawaban WHERE id_dosen = new.id_dosen AND id_soal = new.id_soal INTO @sum;
	UPDATE hasil SET nilai = @sum, rata_rata = @avg WHERE id_dosen = new.id_dosen AND id_soal = new.id_soal;
	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AFTER_UPDATE_BANK_JAWABAN` AFTER UPDATE ON `bank_jawaban` FOR EACH ROW BEGIN
	SET @sum = 0;
	SET @avg = 0;
	SELECT AVG(nilai) FROM bank_jawaban WHERE id_dosen = new.id_dosen AND id_soal = new.id_soal INTO @avg;
	SELECT SUM(nilai) FROM iseng WHERE id_dosen = new.id_dosen AND id_soal = new.id_soal INTO @sum;
	UPDATE hasil SET nilai = @sum, rata_rata = @avg WHERE id_dosen = new.id_dosen AND id_soal = new.id_soal;
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_soal`
--

CREATE TABLE `bank_soal` (
  `id_soal` int(10) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_soal`
--

INSERT INTO `bank_soal` (`id_soal`, `pertanyaan`) VALUES
(1, 'Menyampaikan kontrak belajar di awal perkuliahan dengan jelas'),
(2, 'Menyampaikan substansi materi dengan menarik'),
(3, 'Melakukan proses perkuliahan dengan partisipasi aktif dari mahasiswa'),
(4, 'Kejelasan dalam penyampaian substansi materi'),
(5, 'Memanfaatkan teknologi informasi dan komunikasi dalam pembelajaran'),
(6, 'Kejelasan dalam penyampaian substansi materi'),
(7, 'Memanfaatkan teknologi informasi dan komunikasi dalam pembelajaran'),
(8, 'Mampu tepat waktu dalam menjalankan aktivitas pembelajaran'),
(9, 'Memiliki Kepercayaan diri dalam melaksanakan proses pembelajaran'),
(10, 'Mampu menerima kritik dari mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `id_dosen`, `id_mk`) VALUES
(3, 5, 8),
(7, 6, 1),
(8, 7, 3),
(9, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_dosen` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `rata_rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_dosen`, `id_soal`, `nilai`, `rata_rata`) VALUES
(6, 1, 8, 4),
(6, 2, 8, 4),
(6, 3, 8, 4),
(6, 4, 8, 4),
(6, 5, 8, 4),
(6, 6, 8, 4),
(6, 7, 8, 4),
(6, 8, 8, 4),
(6, 9, 8, 4),
(6, 10, 8, 4),
(7, 1, 1, 1),
(7, 2, 2, 2),
(7, 3, 3, 3),
(7, 4, 4, 4),
(7, 5, 5, 5),
(7, 6, 4, 4),
(7, 7, 3, 3),
(7, 8, 2, 2),
(7, 9, 1, 1),
(7, 10, 2, 2);

--
-- Triggers `hasil`
--
DELIMITER $$
CREATE TRIGGER `AFTER_INSERT_HASIL` AFTER INSERT ON `hasil` FOR EACH ROW BEGIN
	SET @sum = 0;
	SET @exists = 0;
	SET @avg = 0;
	SELECT EXISTS(SELECT id_dosen FROM rekap WHERE id_dosen= new.id_dosen) INTO @exists;
	IF(@exists = 0)THEN
	INSERT INTO rekap(id_dosen, rekap_nilai, rata_rata)
	VALUES (new.id_dosen, new.nilai, new.nilai);
	END IF;
	SELECT AVG(rata_rata) FROM hasil WHERE id_dosen = new.id_dosen INTO @avg;
	SELECT SUM(nilai) FROM hasil WHERE id_dosen = new.id_dosen INTO @sum;
	UPDATE rekap SET rekap_nilai = @sum, rata_rata = @avg WHERE id_dosen = new.id_dosen;
	
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `AFTER_UPDATE_HASIL` AFTER UPDATE ON `hasil` FOR EACH ROW BEGIN
	SET @sum = 0;
	SET @avg = 0;
	SELECT AVG(rata_rata) FROM hasil WHERE id_dosen = new.id_dosen INTO @avg;
	SELECT SUM(nilai) FROM hasil WHERE id_dosen = new.id_dosen INTO @sum;
	UPDATE rekap SET rekap_nilai = @sum, rata_rata = @avg WHERE id_dosen = new.id_dosen;
	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `id_mhs`, `semester`) VALUES
(4, 3, 3),
(5, 4, 3),
(6, 5, 3),
(10, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_mk` int(11) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_mk`, `mk`, `semester`) VALUES
(1, 'Rekayasa Perangkat Lunak', 3),
(2, 'Pengantar Organisasi Komputer', 3),
(3, 'Matematika Dasar 2', 3),
(4, 'Metode Numerik', 3),
(5, 'Perancangan dan Pemrograman Web', 3),
(6, 'Analisis dan Desain Sistem', 3),
(7, 'Komunikasi Data', 3),
(8, 'Interaksi Manusia dan Komputer', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rekap`
--

CREATE TABLE `rekap` (
  `id_dosen` int(11) NOT NULL,
  `rekap_nilai` int(11) NOT NULL,
  `rata_rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekap`
--

INSERT INTO `rekap` (`id_dosen`, `rekap_nilai`, `rata_rata`) VALUES
(6, 80, 4),
(7, 27, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_dosen` (`namadep`);

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
  ADD KEY `dosen_ibfk2` (`id_mk`),
  ADD KEY `dosen_ibfk1` (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `mhs_ibfk1` (`id`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_mk`),
  ADD KEY `semester` (`semester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bank_soal`
--
ALTER TABLE `bank_soal`
  MODIFY `id_soal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk1` FOREIGN KEY (`id`) REFERENCES `akun` (`id`),
  ADD CONSTRAINT `dosen_ibfk2` FOREIGN KEY (`id_mk`) REFERENCES `matkul` (`id_mk`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mhs_ibfk1` FOREIGN KEY (`id`) REFERENCES `akun` (`id`),
  ADD CONSTRAINT `mhs_ibfk2` FOREIGN KEY (`semester`) REFERENCES `matkul` (`semester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
