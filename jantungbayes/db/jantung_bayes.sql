-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 08:23 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jantung_bayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_probabilitas_p`
--

CREATE TABLE `nilai_probabilitas_p` (
  `kd_penyakit` varchar(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_probabilitas_p`
--

INSERT INTO `nilai_probabilitas_p` (`kd_penyakit`, `nilai`) VALUES
('P001', 0.12),
('P002', 0.11),
('P003', 0.22),
('P004', 0.3),
('P005', 0.6),
('P006', 0.3),
('P007', 0.13);

-- --------------------------------------------------------

--
-- Table structure for table `tbgejala`
--

CREATE TABLE `tbgejala` (
  `kd_gejala` char(4) NOT NULL,
  `gejala` varchar(100) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgejala`
--

INSERT INTO `tbgejala` (`kd_gejala`, `gejala`, `kd_penyakit`) VALUES
('G001', 'Dada terasa penuh', ''),
('G002', 'Detak jantung cepat (tachycardia)', ''),
('G003', 'Detak jantung lambat (bradycardia)', ''),
('G004', 'Nyeri pada dada', ''),
('G005', 'Panas', ''),
('G006', 'Sesak napas', ''),
('G008', 'katup jantung tidak bekerja dengan baik', ''),
('G009', 'bunyi jantung abnormal', ''),
('G010', 'kebocoran, penyempitan', ''),
('G011', 'Badan lesu atau lemah', ''),
('G013', 'Pusing', ''),
('G014', 'Pingsan (syncope)', ''),
('G015', 'katup jantung tanpa lubang', ''),
('G017', 'Sulit tidur karena gangguan rasa sakit pada daerah perut sebelah atas (ulu hati) ', ''),
('G018', 'denyut nadi yang lemah dan cepat', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbhasil`
--

CREATE TABLE `tbhasil` (
  `idhasil` int(4) NOT NULL,
  `idpasien` int(4) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `bobotpenyakit` double NOT NULL,
  `tanggal_diagnosa` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbhasil`
--

INSERT INTO `tbhasil` (`idhasil`, `idpasien`, `kd_penyakit`, `bobotpenyakit`, `tanggal_diagnosa`) VALUES
(1, 23, 'P003', 1.478, '2017-11-11 15:58:03'),
(2, 23, 'P002', 1, '2017-11-11 15:58:03'),
(3, 23, 'P005', 0.434, '2017-11-11 15:58:03'),
(4, 23, 'P001', 0.086, '2017-11-11 15:58:03'),
(5, 24, 'P004', 2.454, '2017-11-11 16:32:03'),
(6, 24, 'P001', 0.545, '2017-11-11 16:32:03'),
(7, 25, 'P003', 2, '2017-11-11 16:32:56'),
(8, 25, 'P001', 1, '2017-11-11 16:32:56'),
(9, 25, 'P002', 1, '2017-11-11 16:32:56'),
(10, 26, 'P005', 1.434, '2017-11-11 16:33:33'),
(11, 26, 'P004', 1, '2017-11-11 16:33:33'),
(12, 26, 'P002', 1, '2017-11-11 16:33:33'),
(13, 26, 'P003', 0.478, '2017-11-11 16:33:33'),
(14, 26, 'P001', 0.086, '2017-11-11 16:33:33'),
(15, 27, 'P004', 1, '2018-09-03 09:39:52'),
(16, 28, 'P004', 2, '2018-09-04 10:58:53'),
(17, 28, 'P002', 1, '2018-09-04 10:58:53'),
(18, 28, 'P003', 1, '2018-09-04 10:58:53'),
(19, 29, 'P004', 2, '2018-09-04 12:48:00'),
(20, 29, 'P003', 1, '2018-09-04 12:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbpasien`
--

CREATE TABLE `tbpasien` (
  `idpasien` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpasien`
--

INSERT INTO `tbpasien` (`idpasien`, `nama`, `kelamin`, `umur`, `alamat`, `tanggal`, `email`) VALUES
(29, 'Test lagi', 'Laki-laki', '25', 'Jabar', '2018-09-04', 'test@gmail.com'),
(28, 'Testing', 'Laki-laki', '25', 'Jabar', '2018-09-04', 'test@yahoo.co');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyakit`
--

CREATE TABLE `tbpenyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `nama_penyakit` varchar(30) DEFAULT NULL,
  `definisi` text,
  `solusi` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenyakit`
--

INSERT INTO `tbpenyakit` (`kd_penyakit`, `nama_penyakit`, `definisi`, `solusi`) VALUES
('P001', 'Gagal Jantung', 'Gagal jantung atau Heart Failure adalah keadaan dimana jantung tidak bisa memasok aliran darah untuk memenuhi kebutuhan tubuh dan berpotensi mematikan.', 'Penyakit jantung jenis ini memiliki gejala antara lain pembengkakan pada kaki dan tangan, penambahan atau pengurangan berat badan sebelum terjadinya pembengkakan.'),
('P002', 'Heart Valve Disease', 'Heart Valve Disease atau masalah pada katup jantung adalah kedaan dimana salah satu atau lebih katub jantung tidak bekerja dengan baik. Dalam beberapa kasus, orang-orang terlahir dengan masalah pada katub jantung sedangkan beberapa orang mendapatkan  kelainan pada katub dimasa hidupnya.\r\nAda tiga jenis penyakit katup jantung yaitu kebocoran, penyempitan, dan katup tanpa lubang. Tidak ada obat untuk kelainan pada katub jantung kecuali operasi. Tetapi bagi anda yang tidak memiliki penyakit ini dari lahir,  menjaga pola makan dan pola hidup adalah kunci untuk terbebas dari penyakit ini.', '1.Tidur dengan mulut terbuka menyebabkan mulut kering di pagi hari. Sebisa mungkin bernapaslah dengan hidung ketika tidur.\r\n\r\n2. Menggunakan produk pencegah mulut kering. Untuk lebih aman, konsultasikan dengan dokter mengenai produk yang paling tepat.\r\n\r\n3. Menjaga kebersihan mulut. Sikat gigi dan berkumur secara teratur. Gunakan pula benang gigi (dental floss).\r\n\r\n4. Minum air sedikitnya 8 gelas per hari.\r\n\r\n5. Hindari konsumsi kafein dan alkohol'),
('P003', 'Aritmia', 'Jenis penyakit jantung ini adalah menggangu yakni gangguan irama atau detak jantung. Detak jantung bisa lebih cepat, lebih lambat, atau tidak teratur. Faktor utama penyakit aritmia adalah kurangnya kalsium dalam tubuh dan terjadinya penyumbatan pembuluh darah jantung.\r\nPenyumbatan pembuluh darah jantung yang juga berefek pada detak jantung yang tidak normal akan berakibat pada serangan jantung. Selain dua hal tersebut penyebab aritmia lainnya adalah diabetes, tekanan darah tinggi, merokok, kafein, stress, kematian otot jantung, penyalahgunaan obat, dan terlalu aktifnya kelenjar thyroid.\r\n', 'Makan secara teratur sangat dianjurkan untuk mengurangi resiko  timbulnya tukak lambung.'),
('P004', 'Perikarditis', 'Jenis penyakit jantung ini adalah peradangan pada kantung jantung atau pericardium sehingga menimbulkan penimbunan cairan dan penebalan. Perdangan ini disebabkan oleh beberapa hal, penyebab yang umum adalah infeksi virus dan terapi penyinaran untuk kanker payudara.', 'segera lakukan pembedahan untuk mencegah terjadinya ruptur (peca)dan Pembedahan yang segera dilakukan bisa mengurangi angka kematian pada apendisitis.'),
('P005', 'Penyakit Jantung Koroner', 'Penyakit jantung coroner disebabkan oleh lapisan lemak atau kolesterol di dinding nadi yang menyumbat pembuluh darah. Akibatnya dari penyumbatan oleh lapisan lemak dan kolesterol ini adalah terganggunya proses suplai darah dari dan ke  jantung. Ketika darah tersumbat akibat lapisan lemak maka inilah yang disebut serangan jantung. Lapisan lemak dan kolesterol di dinding nadi diakibatkan oleh kecanduan rokok, hipertensi, dan kolesterol tinggi.', '1. Menerapkan perilaku hidup sehat dengan mencuci tangan memakai sabun terutama setelah kontak dengan benda-benda kotor. \r\n2. Meningkatkan kebersihan lingkungan dan pemberian gizi yang seimbang. \r\n3. Menjaga kebersihan dari makanan atau minuman yang Anda makan.\r\n4. untuk pengobatannya pun anda dapat menkonsumsi obat-obat tradisional seperti jus kulit mangis, dan daun sirsak. Atau anda langsung berobat ke dokter.'),
('P006', 'Konstipasi', 'Konstipasi atau sembelit terjadi akibat penyerapan air yang berlebihan pada sisa makanan di dalam usus besar. Akibatnya feses menjadi sangat padat dan mengeras sehingga sulit dikeluarkan.', 'Untuk  mencegah sembelit dianjurkan untuk perbanyak mengkonsumsi makanan yang berserat, kurangi makan daging, buang air besar secara teratur setiap hari dan perbanyak makan sayur dan buah-buahan serta minum air putih.');

-- --------------------------------------------------------

--
-- Table structure for table `tbrule`
--

CREATE TABLE `tbrule` (
  `id_rule` int(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbrule`
--

INSERT INTO `tbrule` (`id_rule`, `kd_gejala`, `kd_penyakit`, `bobot`) VALUES
(1, 'G008', 'P002', 0.5),
(2, 'G018', 'P001', 0.5),
(3, 'G013', 'P001', 0.1),
(4, 'G009', 'P001', 0.3),
(5, 'G010', 'P002', 0.3),
(6, 'G015', 'P002', 0.5),
(8, 'G001', 'P003', 0.1),
(9, 'G002', 'P003', 0.1),
(10, 'G003', 'P003', 0.5),
(11, 'G004', 'P003', 0.5),
(13, 'G013', 'P003', 0.3),
(14, 'G014', 'P003', 0.5),
(18, 'G005', 'P004', 0.1),
(19, 'G006', 'P004', 0.5),
(20, 'G009', 'P004', 0.1),
(21, 'G007', 'P005', 0.5),
(22, 'G020', 'P005', 0.5),
(23, 'G011', 'P005', 0.1),
(24, 'G012', 'P005', 0.1),
(25, 'G013', 'P005', 0.1),
(26, 'G021', 'P006', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `kd_proses` varchar(10) NOT NULL,
  `kd_penyakit` varchar(4) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL,
  `nilaiPH` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_analisa`
--

INSERT INTO `tmp_analisa` (`kd_proses`, `kd_penyakit`, `kd_gejala`, `nilaiPH`) VALUES
('Proses3', 'P001', 'G006', 0),
('Proses3', 'P002', 'G006', 0),
('Proses3', 'P003', 'G006', 0),
('Proses3', 'P004', 'G006', 0.15),
('Proses3', 'P005', 'G006', 0),
('Proses3', 'P006', 'G006', 0),
('Proses3', 'P007', 'G006', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `noip` int(3) NOT NULL,
  `kd_gejala` char(4) NOT NULL,
  `bobot` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`noip`, `kd_gejala`, `bobot`) VALUES
(130932, 'G004', 0),
(130933, 'G005', 0),
(130934, 'G006', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `kd_penyakit` varchar(4) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`kd_penyakit`, `kd_gejala`, `nilai`) VALUES
('P001', 'G004', 0.11),
('P001', 'G005', 0.03),
('P001', 'G006', 0.15),
('P002', 'G004', 0.11),
('P002', 'G005', 0.03),
('P002', 'G006', 0.15),
('P003', 'G004', 0.11),
('P003', 'G005', 0.03),
('P003', 'G006', 0.15),
('P004', 'G004', 0.11),
('P004', 'G005', 0.03),
('P004', 'G006', 0.15),
('P005', 'G004', 0.11),
('P005', 'G005', 0.03),
('P005', 'G006', 0.15),
('P006', 'G004', 0.11),
('P006', 'G005', 0.03),
('P006', 'G006', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_totalbayes`
--

CREATE TABLE `tmp_totalbayes` (
  `kd_penyakit` varchar(4) NOT NULL,
  `kd_gejala` varchar(4) NOT NULL,
  `totalbayes` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_totalbayes`
--

INSERT INTO `tmp_totalbayes` (`kd_penyakit`, `kd_gejala`, `totalbayes`) VALUES
('P001', 'G004', 0),
('P001', 'G005', 0),
('P001', 'G006', 0),
('P002', 'G004', 0),
('P002', 'G005', 0),
('P002', 'G006', 0),
('P003', 'G004', 1),
('P003', 'G005', 0),
('P003', 'G006', 0),
('P004', 'G004', 0),
('P004', 'G005', 1),
('P004', 'G006', 1),
('P005', 'G004', 0),
('P005', 'G005', 0),
('P005', 'G006', 0),
('P006', 'G004', 0),
('P006', 'G005', 0),
('P006', 'G006', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbgejala`
--
ALTER TABLE `tbgejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `tbhasil`
--
ALTER TABLE `tbhasil`
  ADD PRIMARY KEY (`idhasil`);

--
-- Indexes for table `tbpasien`
--
ALTER TABLE `tbpasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `tbpenyakit`
--
ALTER TABLE `tbpenyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `tbrule`
--
ALTER TABLE `tbrule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`noip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbhasil`
--
ALTER TABLE `tbhasil`
  MODIFY `idhasil` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbpasien`
--
ALTER TABLE `tbpasien`
  MODIFY `idpasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbrule`
--
ALTER TABLE `tbrule`
  MODIFY `id_rule` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `noip` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130935;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
