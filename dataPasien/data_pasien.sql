-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Des 2019 pada 10.47
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pasien`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bankdata`
--

CREATE TABLE `bankdata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bankdata`
--

INSERT INTO `bankdata` (`id`, `nama`, `keluhan`, `created_at`, `updated_at`) VALUES
(7, 'Adya Sari', 'Batuk', '2019-12-16 04:08:19', '2019-12-16 04:08:19'),
(8, 'Ahmad Muzakkir', 'Pilek', '2019-12-16 04:08:28', '2019-12-16 04:08:28'),
(9, 'Ahmad Rusydi Said Harahap', 'Batuk Pilek', '2019-12-16 04:08:43', '2019-12-16 04:08:43'),
(10, 'Andi Setiawan', 'Batuk', '2019-12-16 04:08:54', '2019-12-16 04:08:54'),
(11, 'Augie Afriyansyah', 'Pilek', '2019-12-16 04:09:07', '2019-12-16 04:09:07'),
(12, 'Dhifa Mutia Wulan Sari', 'Batuk', '2019-12-16 04:09:18', '2019-12-16 04:09:18'),
(13, 'Fahrunnisa', 'Pilek', '2019-12-16 04:09:27', '2019-12-16 04:09:27'),
(14, 'Farrah Anggia Putri', 'Demam', '2019-12-16 04:09:40', '2019-12-16 04:09:40'),
(15, 'Fathurrachman', 'Demam', '2019-12-16 04:09:50', '2019-12-16 04:09:50'),
(16, 'Fazza Mufti Taufiqi', 'Sehat', '2019-12-16 04:10:06', '2019-12-16 04:10:06'),
(17, 'Fuad Amin', 'Batuk Pilek', '2019-12-16 04:10:16', '2019-12-16 04:10:16'),
(18, 'Gilang Agusti Caesario', 'Demam', '2019-12-16 04:10:25', '2019-12-16 04:10:25'),
(19, 'Imam Lutfi Rahmatullah', 'Demam', '2019-12-16 04:10:40', '2019-12-16 04:10:40'),
(20, 'Inka Sulistiani', 'Batuk', '2019-12-16 04:10:50', '2019-12-16 04:10:50'),
(21, 'Kahfi Del Vieri', 'Tidak Diketahui', '2019-12-16 04:11:19', '2019-12-16 04:11:19'),
(22, 'Kamal Fadli', 'Wasir', '2019-12-16 04:11:31', '2019-12-16 04:11:31'),
(23, 'Maliki Karim', 'Mantap-Mantap', '2019-12-16 04:11:49', '2019-12-16 04:11:49'),
(24, 'Mitha Rachma Putri', 'Pilek', '2019-12-16 04:12:03', '2019-12-16 04:12:03'),
(25, 'Mohammed Fajarullah Furtami', 'Batuk Pilek', '2019-12-16 04:12:16', '2019-12-16 04:12:16'),
(26, 'Muhammad Ammaridho R.S', 'Demam', '2019-12-16 04:12:50', '2019-12-16 04:12:50'),
(27, 'Muhammad Aulia Alfani', 'Sehat', '2019-12-16 04:13:11', '2019-12-16 04:13:11'),
(28, 'Muhammad Dan Irfan', 'Sehat', '2019-12-16 04:13:20', '2019-12-16 04:13:20'),
(29, 'Muhammad Muza Alkindi', 'Demam', '2019-12-16 04:13:44', '2019-12-16 04:13:44'),
(30, 'Muhammad Nurfajri Rahman', 'Kecanduan Main Game', '2019-12-16 04:14:17', '2019-12-16 04:14:17'),
(31, 'Nurul Uswatun Hasanah', 'Terlalu Pintar', '2019-12-16 04:14:32', '2019-12-16 04:14:32'),
(32, 'Rafkah Rizqia', 'Terlalu Cerdas', '2019-12-16 04:14:41', '2019-12-16 04:14:41'),
(33, 'Risyadhana Syaifuddin', 'IYKWIM', '2019-12-16 04:14:55', '2019-12-16 04:14:55'),
(34, 'Toriq Assyarif', 'Dipanggil Pakde', '2019-12-16 04:15:25', '2019-12-16 04:15:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_15_154530_create_master_data_models_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bankdata`
--
ALTER TABLE `bankdata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bankdata`
--
ALTER TABLE `bankdata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
