-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 05:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinjam_ruang`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dinas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`id`, `nama_dinas`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Komunikasi dan Informatika', 'Jl. Sukowati No.51, Kalicacing,  Kec. Sidomukti, Kota Salatiga, Jawa Tengah 50724', NULL, '2022-03-22 04:03:36'),
(2, 'Dinas Kesehatan', 'Jl. Hasanudin No.110 A, Mangunsari, Kec. Sidomukti, Kota Salatiga, Jawa Tengah 50721', NULL, '2022-03-31 07:43:02'),
(3, 'Dinas Sosial', 'Jl. Merak No.3, Mangunsari, Kec. Sidomukti, Kota Salatiga, Jawa Tengah 50721', NULL, '2022-03-22 04:04:58'),
(102, 'Dinas Kepemudaan dan Olahraga', 'Jl. LMU Adi Sucipto No. 2 (Gor Pelajar Hati Beriman) Salatiga, Jawa Tengah 50711', NULL, '2022-03-22 04:06:16'),
(103, 'Dinas Pendidikan', 'JL. LMU Jl. Adi Sucipto No.2, Kalicacing, Sidomukti, Kota Salatiga, Jawa Tengah 50711', NULL, '2022-03-22 04:08:25'),
(104, 'Dinas Pekerjaan Umum dan Penataan Ruang', 'Jl. Ahmad Yani No.14, Kalicacing, Kec. Sidomukti, Kota Salatiga, Jawa Tengah 50724', NULL, '2022-03-22 04:09:00'),
(105, 'Dinas Perdagangan', 'Jl. Pemotongan No.73, Kalicacing, Kec. Sidomukti, Kota Salatiga, Jawa Tengah 50724', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2022_01_27_122033_create_dinas_table', 1),
(19, '2022_01_27_122119_create_ruangan_table', 1),
(20, '2022_01_27_122138_create_peminjaman_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_peminjam` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keperluan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `status` enum('pending','terima','tolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `dinas_dipinjam_id` bigint(20) UNSIGNED NOT NULL,
  `dinas_peminjam_id` bigint(20) UNSIGNED NOT NULL,
  `ruangan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama_peminjam`, `keperluan`, `no_hp`, `waktu_awal`, `waktu_akhir`, `status`, `dinas_dipinjam_id`, `dinas_peminjam_id`, `ruangan_id`, `created_at`, `updated_at`) VALUES
(2, 'Dinas Sosial', 'rapat anggota', '087857483994', '2022-02-06 21:00:00', '2022-02-06 23:00:00', 'pending', 1, 3, 1, NULL, '2022-04-11 07:43:27'),
(3, 'Dinas Sosial', 'rapat bersama anggota dinas sosial', '082133311601', '2022-02-07 21:20:00', '2022-02-07 22:23:00', 'terima', 1, 3, 1, NULL, '2022-02-08 23:58:00'),
(4, 'Dinas Sosial', 'rapat anggota', '082133311601', '2022-02-06 21:00:00', '2022-02-06 23:00:00', 'terima', 1, 3, 1, NULL, '2022-03-26 06:38:48'),
(5, 'Dinas Sosial', 'rapat anggota', '082133311601', '2022-02-07 10:16:00', '2022-02-07 11:00:00', 'terima', 1, 3, 1, NULL, '2022-03-31 07:44:32'),
(6, 'Dinas Sosial', 'rapat bersama anggota dinas sosial', '082133311601', '2022-02-07 10:18:00', '2022-02-07 10:20:00', 'pending', 2, 3, 2, NULL, NULL),
(7, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 09:00:00', '2022-02-09 11:00:00', 'tolak', 1, 1, 7, NULL, '2022-02-09 01:22:35'),
(8, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-10 00:00:00', '2022-02-10 01:00:00', 'terima', 1, 1, 7, NULL, '2022-03-12 10:14:48'),
(9, 'Dinas Sosial', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 10:13:00', '2022-02-11 11:13:00', 'terima', 2, 1, 2, NULL, '2022-02-09 03:13:53'),
(10, 'Dinas Kesehatan', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 11:00:00', '2022-02-09 00:00:00', 'terima', 1, 2, 1, NULL, '2022-02-09 04:36:14'),
(11, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 05:00:00', '2022-02-09 06:00:00', 'pending', 2, 1, 2, NULL, NULL),
(14, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 11:41:00', '2022-02-09 14:41:00', 'pending', 2, 1, 2, NULL, NULL),
(15, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 11:41:00', '2022-02-09 13:41:00', 'pending', 2, 1, 3, NULL, NULL),
(16, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 11:42:00', '2022-02-09 12:42:00', 'pending', 2, 1, 3, NULL, NULL),
(17, 'Administrator SIM Ruang 2', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-09 11:42:00', '2022-02-09 12:42:00', 'pending', 2, 1, 3, NULL, NULL),
(18, 'Dinas Sosial', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-13 13:15:00', '2022-02-13 15:15:00', 'tolak', 1, 3, 1, NULL, '2022-03-12 08:34:20'),
(19, 'Dinas Sosial', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-13 16:17:00', '2022-02-13 17:17:00', 'pending', 1, 3, 1, NULL, NULL),
(20, 'Dinas Sosial', 'rapat bersama anggota dinas kesehatan', '082133311601', '2022-02-17 07:45:00', '2022-02-17 09:45:00', 'pending', 1, 3, 1, NULL, NULL),
(46, 'Timothy Wijaya', 'Rapat penanganan keidupan sosial', '12', '2022-03-23 12:40:00', '2022-03-23 12:40:00', 'pending', 2, 1, 2, NULL, NULL),
(47, 'Timothy Wijaya', 'Rapat eprsebaran Covid', '123456789', '2022-03-23 12:43:00', '2022-03-23 12:43:00', 'pending', 3, 1, 5, NULL, NULL),
(56, 'Administrator SIM Ruang 2', 'rapat anggota', '0876138127139', '2022-04-11 08:44:00', '2022-04-11 08:44:00', 'terima', 1, 1, 11, NULL, '2022-04-11 01:44:29'),
(57, 'Administrator SIM Ruang 2', 'rapat anggota', '087613812713', '2022-04-11 14:37:00', '2022-04-11 14:37:00', 'pending', 1, 1, 11, NULL, '2022-04-11 07:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `dinas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `nama_ruangan`, `fasilitas`, `kapasitas`, `dinas_id`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Rapat Dinas Kominfo', 'Meja 4, Kursi 14, Papan Tulis 1, Layar LCD, Spidol 4, Penghapus papan tulis 2', 18, 1, NULL, '2022-03-22 04:10:49'),
(2, 'Ruang Rapat DinKes', 'Meja 5, Kursi 10, Papan tulis 2, AC 1, Stopkontak 3', 13, 2, NULL, '2022-03-22 04:12:00'),
(3, 'Ruang Istirahat', 'Meja 8, Kursi 16, AC 2', 30, 2, NULL, '2022-03-22 04:13:53'),
(4, 'Ruang Tamu Kominfo', 'Meja 1, Sofa 4, Papan Pengumuman 2', 12, 1, NULL, '2022-03-22 04:14:47'),
(5, 'Ruang Rapat Dinas Sosial', 'Meja 4, Papan tulis 1, Spidol 4, Penghapus 2, Kursi 15', 30, 3, NULL, '2022-03-22 04:17:25'),
(6, 'Ruang Inventaris Dinas Sosial', 'AC 4, Meja 7, Kursi 28, Papan Tulis 2, Proyektor 3.', 56, 3, NULL, '2022-03-22 04:19:13'),
(7, 'Ruang Rapat Kalitaman', 'Meja 9, Kursi 20, Microphone 20, Layar LCD 1, Proyektor 2, HDMI 3, VGA 4', 58, 1, NULL, '2022-03-22 04:16:13'),
(8, 'Ruang Rapat Dispora', 'meja 20', 30, 102, NULL, NULL),
(9, 'Ruang Aula Dispora', 'meja 30', 30, 102, NULL, NULL),
(10, 'Ruang Inventaris', 'meja 20', 30, 102, NULL, NULL),
(11, 'Ruang Aula Kalitaman', '20 meja', 30, 1, NULL, NULL),
(12, 'Ruang Rapat Guru', 'meja 10, kursi 100', 200, 103, NULL, NULL),
(13, 'Ruangan Perpustakaan', 'Meja 4, Kursi 14, Papan Tulis 1, Layar LCD, Spidol 4, Penghapus papan tulis 2', 200, 103, NULL, NULL),
(14, 'Ruang Rapat Dinas Kominfo', 'Meja 4, Kursi 14, Papan Tulis 1, Layar LCD, Spidol 4, Penghapus papan tulis 2', 58, 104, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','operator') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'operator',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gmail` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dinas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gmail`, `dinas_id`) VALUES
(1, 'Administrator SIM Ruang 2', 'admin', 'wijayatimojaya@gmail.com', NULL, '$2y$10$LYJ4YuPe8eqkc7yT/kZy1uaj6OosS4suE91MFh.zVrrePyWIIKwoK', 'CvoL2Op8qrpbavP8Qh78oHvJdy1W3WgQlaX7GIY10PvrLcfPBX3WYl4jAFvQ', '2022-02-01 18:24:06', '2022-04-11 01:14:20', 'wijayatimojaya@gmail.com', 1),
(2, 'DinKes', 'operator', 'dinkes@salatiga.go.id', NULL, '$2y$10$ya5Q.83Pki3nm7Rm3LojEuhkK/RMF5H0vMTXuJ1vfuiu80Q0.1tHC', 'LI7ujYbxdB81CKwaqEkfMHhzIsUg6os8AkCMuEdkEzqRBCHqs5PnHnrcoCWv', '2022-02-01 17:28:32', '2022-04-22 04:32:10', 'tcaroline2128@gmail.com', 2),
(3, 'DinSos', 'operator', 'dinsos@salatiga.go.id', NULL, '$2y$10$xH66UESARZNqwjvmQkc37OMq6vlKVqyW/CF32AmlELaOuht7uaMOW', 'OILYpmTSPWn2KpA9pSyui6mJmYoZdPR9OrR8DNcDIheML1VEl5HhISC9x0nM', '2022-02-01 18:08:32', '2022-04-11 01:11:19', 'daafn.daafn@gmail.com', 3),
(102, 'DisPora', 'operator', 'dispora@salatiga.go.id', NULL, '$2y$10$9vu21Y5gp5IyXzMMz3OwKuc525lTFEtMMFTxP7yMxCXv02GQvTONi', NULL, '2022-02-15 06:09:47', '2022-04-11 01:12:34', '', 102),
(103, 'DisKomInfo', 'operator', 'diskominfo@salatiga.go.id', NULL, '$2y$10$Ex990RA5p4lFciRTtK5qAeNFkJEMN9Tki0nRPghRIWx7DUS3Ce7ym', NULL, NULL, '2022-04-11 01:13:22', 'leocandra1609@gmail.com', 1),
(104, 'Administrator SIM Ruang', 'admin', 'sim-ruang@adm.salatiga.go.id', NULL, '$2y$10$izVgRxOl4AKYwNPhdhnKZONRtqvWua4qzPTMV0ol7jjDLYJrta0pC', NULL, NULL, NULL, 'sim-ruang@adm.salatiga.go.id', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
