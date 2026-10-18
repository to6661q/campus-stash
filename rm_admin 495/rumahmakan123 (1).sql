-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 12:07 AM
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
-- Database: `rumahmakan123`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `transaksi` (IN `id_trans` INT(10), IN `id_cust` CHAR(10), IN `id_prod` CHAR(10), IN `jum` INT(10))  BEGIN
	DECLARE `hrg` INT(10);
	SET `hrg` = 0;
	SELECT harga_produk INTO `hrg` FROM produk WHERE id_produk = `id_prod`;
	INSERT INTO transaksi (`date`, id_transaksi, id_customer, id_produk, jumlah, total)
	VALUES (now(),`id_trans`,`id_cust`, `id_prod`, `jum`, `jum`*`hrg`);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aset`
--

CREATE TABLE `aset` (
  `id_aset` int(11) NOT NULL,
  `nama_aset` varchar(20) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aset`
--

INSERT INTO `aset` (`id_aset`, `nama_aset`, `tipe`) VALUES
(1, 'Gedung', 'tetap');

-- --------------------------------------------------------

--
-- Table structure for table `barang_suplier`
--

CREATE TABLE `barang_suplier` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_suplier`
--

INSERT INTO `barang_suplier` (`id_barang`, `nama_barang`, `jumlah`, `keterangan`) VALUES
(1, 'ayam', 100, 'kg'),
(2, 'ikan', 75, 'kg'),
(3, 'air mineral', 30, 'pack'),
(4, 'kopi', 30, 'kg'),
(5, 'teh', 25, 'kg'),
(6, 'jeruk', 50, 'kg'),
(7, 'minyak goreng', 75, 'liter'),
(8, 'bumbu dapur', 50, 'kg'),
(9, 'terigu', 150, 'kg'),
(10, 'beras', 200, 'kg'),
(11, 'daun singkong', 20, 'kg'),
(12, 'singkong', 70, 'kg'),
(13, 'tahu', 40, 'kg'),
(14, 'tempe', 40, 'kg'),
(15, 'sayuran', 5, 'karung');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `date` datetime NOT NULL,
  `id_keuangan` int(20) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `untuk` varchar(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`date`, `id_keuangan`, `tipe`, `dari`, `untuk`, `jumlah`, `keterangan`) VALUES
('2019-07-04 00:13:00', 1, 'Masukan', 'Customer', 'rumahmakan', 1230000, 'penjualan makanan ke kustomer');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `telepon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `password`, `alamat`, `jabatan`, `telepon`) VALUES
(1, '', '', '', '', ''),
(123, 'Ririn', '1234', 'Ciputat', 'Kasir', '085890871245'),
(124, 'Karina', '1235', 'Tangerang', 'Koki', '089765456342'),
(125, 'Ayunda', '1236', 'Pagaruyung', 'Koki', '096712554320'),
(126, 'Nurul', '1237', 'BBS', 'Driver', '082144336757'),
(127, 'Sayang', '1238', 'Pesanggrahan', 'OB', '089877795512'),
(128, 'Masukan Nama', 'Masukan Password', 'Masukan Judul Alamat', '456565', ''),
(129, 'Masukan Nama', 'Masukan Password', 'Masukan Judul Alamat', '123123', ''),
(130, 'ridho', '123', 'Masukan Judul Alamatasdasdsa', '21312414', ''),
(131, 'jaja', 'hiasa', 'Masukan Judul Alamatsdadsad', '123123', ''),
(132, 'jaja', 'aaaa', 'Masukan Judul Alamat', '123123', ''),
(133, 'asd', 'asd', 'Masukan Judul Alamatghjhgjh', '8888', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `nama_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`nama_pelanggan`, `alamat_pelanggan`, `telepon`, `password`) VALUES
('aa', 'Masukan Judul Alamat', '', 'aa'),
('aaa', 'Masukan Judul Alamat', '', 'aaa'),
('aaasss', 'Masukan Judul Alamat', '', '123'),
('aas', 'Masukan Judul Alamat', '', '123'),
('erfi', 'Masukan Judul Alamatafasd', '', '123'),
('hasni', 'perumahan rumah', '081923245', '123'),
('Masukan Nama', 'Masukan Judul Alamat', '', 'Masukan Password');

-- --------------------------------------------------------

--
-- Table structure for table `pesanancustomer`
--

CREATE TABLE `pesanancustomer` (
  `id_pesanan` int(11) NOT NULL,
  `nama_pelanggan` char(20) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `totalbiaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanancustomer`
--

INSERT INTO `pesanancustomer` (`id_pesanan`, `nama_pelanggan`, `id_produk`, `jumlah`, `totalbiaya`) VALUES
(1, '2', '1', 4, 5),
(2, '3', 'aas', 9, 6000),
(3, '3', 'aas', 3, 30000),
(4, '2', '15', 2, 10000),
(5, '2', 'aas', 2, 10000),
(6, 'aas', '8', 5, 25000),
(7, 'aas', '9', 6, 12000),
(8, 'aa', '12', 5, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok`) VALUES
(1, 'air mineral', 3000, 16),
(2, 'ikan goreng', 10000, 56),
(3, 'ayam goreng', 10000, 77),
(4, 'teh hangat', 5000, 88),
(5, 'kopi', 5000, 99),
(6, 'keripik udang', 2000, 10),
(7, 'keripik singkong', 2000, 89),
(8, 'nasi', 3000, 80),
(9, 'gorengan', 2000, 80),
(10, 'otak otak', 5000, 80),
(11, 'tempe tahu', 2000, 80),
(12, 'es teh', 5000, 67),
(13, 'es jeruk', 5000, 25),
(14, 'sayur singkong', 5000, 25),
(15, 'sayur asem', 5000, 25);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(20) DEFAULT NULL,
  `alamat_supplier` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon`) VALUES
(555, 'Setianto', 'Jawa Barat', '0'),
(556, 'Munandar', 'Jakarta', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_produk` char(10) NOT NULL,
  `date` datetime NOT NULL,
  `total` int(20) NOT NULL,
  `id_customer` char(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_produk`, `date`, `total`, `id_customer`, `jumlah`) VALUES
(123, 'a-777', '0000-00-00 00:00:00', 24000, 'a-678', 8),
(133, 'a-777', '2019-07-14 14:01:16', 24000, 'a-678', 8),
(190, 'a-777', '2019-07-14 14:04:28', 24000, 'a-678', 8);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `after_transaksi` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	update produk set stok = @stok -new.jumlah
	WHERE id_produk = new.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_transaksi` BEFORE INSERT ON `transaksi` FOR EACH ROW begin
	set @stok = 0;
	select stok into @stok from produk where id_produk = new.id_produk;
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indexes for table `barang_suplier`
--
ALTER TABLE `barang_suplier`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`nama_pelanggan`);

--
-- Indexes for table `pesanancustomer`
--
ALTER TABLE `pesanancustomer`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset`
--
ALTER TABLE `aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_suplier`
--
ALTER TABLE `barang_suplier`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `pesanancustomer`
--
ALTER TABLE `pesanancustomer`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
