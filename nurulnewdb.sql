-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230513.2d5cb03077
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 10:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nurulnewdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `data_karyawan_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi_id` bigint UNSIGNED NOT NULL,
  `jumlah_hadir` int NOT NULL,
  `mulai` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `data_karyawan_id`, `nama`, `divisi_id`, `jumlah_hadir`, `mulai`, `berakhir`, `created_at`, `updated_at`) VALUES
(62, 1, 'A. Yusril Mahendra', 1, 27, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(63, 2, 'Abd Rahman', 4, 28, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(64, 3, 'Adam Achmad Labisa', 4, 5, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(65, 4, 'Ade Ratih', 12, 24, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(66, 5, 'Ahmad Dani', 2, 13, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(67, 6, 'Ahmad Sodiqin', 3, 9, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(68, 7, 'Akmal', 1, 28, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(69, 8, 'Ali Akbar', 8, 27, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(70, 9, 'Andi Rivaldi', 3, 12, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(71, 10, 'Apriliani Kartika Sari Ali', 2, 28, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(72, 11, 'Asriana Fitria Auliana Syam', 2, 28, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(73, 12, 'Ayu Meylani', 2, 4, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(74, 13, 'Bambang Wiranata', 4, 29, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(75, 14, 'Erawasi', 2, 4, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `divisi_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `jabatan_id`, `divisi_id`, `created_at`, `updated_at`, `outlet_id`) VALUES
(1, 'A. Yusril Mahendra', 1, 1, NULL, NULL, 1),
(2, 'Abd Rahman', 2, 4, NULL, NULL, 4),
(3, 'Adam Achmad Labisa', 3, 4, NULL, NULL, 5),
(4, 'Ade Ratih', 4, 12, NULL, NULL, 4),
(5, 'Ahmad Dani', 5, 2, NULL, NULL, 4),
(6, 'Ahmad Sodiqin', 6, 3, NULL, NULL, 3),
(7, 'Akmal', 1, 1, NULL, NULL, 3),
(8, 'Ali Akbar', 2, 8, NULL, NULL, 1),
(9, 'Andi Rivaldi', 3, 3, NULL, NULL, 5),
(10, 'Apriliani Kartika Sari Ali', 4, 2, NULL, NULL, 1),
(11, 'Asriana Fitria Auliana Syam', 5, 2, NULL, NULL, 5),
(12, 'Ayu Meylani', 6, 2, NULL, NULL, 5),
(13, 'Bambang Wiranata', 1, 4, NULL, NULL, 2),
(14, 'Erawasi', 2, 2, NULL, NULL, 5),
(30, 'Maharani Afifa', 4, 12, NULL, NULL, 4),
(31, 'Mecarania Hidayat', 5, 2, NULL, NULL, 3),
(32, 'Megawati', 6, 11, NULL, NULL, 3),
(33, 'Moh. Rifaah Mahfudz', 1, 6, NULL, NULL, 5),
(34, 'Muh Ali Akbar', 2, 3, NULL, NULL, 4),
(35, 'Muh Farhan', 3, 2, NULL, NULL, 3),
(36, 'Muh Fitra Ramadhan', 4, 1, NULL, NULL, 1),
(37, 'Muh. Ilham', 5, 5, NULL, NULL, 1),
(38, 'Muh Rafly Ahmad', 6, 5, NULL, NULL, 2),
(39, 'Muh Reza', 1, 11, NULL, NULL, 4),
(40, 'Muh Rusdi', 2, 14, NULL, NULL, 4),
(41, 'Muh. Ilyas B', 3, 5, NULL, NULL, 3),
(42, 'Muhammad Ali Al Khumais', 4, 2, NULL, NULL, 2),
(43, 'Muhammad Danial Ibrahim', 5, 2, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pembakaran', '2024-12-05 12:19:25', '2024-12-06 12:19:29'),
(2, 'Hall', NULL, NULL),
(3, 'Kitchen', NULL, NULL),
(4, 'Pantry', NULL, NULL),
(5, 'Admin', NULL, NULL),
(6, 'Bar', NULL, NULL),
(7, 'Frying', NULL, NULL),
(8, 'Accounting', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departemen_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `departemen_id`, `created_at`, `updated_at`) VALUES
(1, 'Pembakaran', 1, '2024-12-05 12:19:02', '2024-12-06 12:19:09'),
(2, 'Hall Waiters', 2, NULL, NULL),
(3, 'Hall Cleaning Service', 2, NULL, NULL),
(4, 'Cook', 3, NULL, NULL),
(5, 'Kitchen Helper', 3, NULL, NULL),
(6, 'Pantry', 4, NULL, NULL),
(7, 'Admin Gudang', 5, NULL, NULL),
(8, 'Bar', 6, NULL, NULL),
(9, 'Frying', 7, NULL, NULL),
(10, 'Accounting', 8, NULL, NULL),
(11, 'Runner', 2, NULL, NULL),
(12, 'Hall Cashier', 2, NULL, NULL),
(13, 'Bartender', 6, NULL, NULL),
(14, 'Kitchen Cook', 3, NULL, NULL),
(15, 'Helper', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pengawas Lapangan', NULL, NULL),
(2, 'Cook', NULL, NULL),
(3, 'Hall Cashier', NULL, NULL),
(4, 'Runner', NULL, NULL),
(5, 'Helper', NULL, NULL),
(6, 'Bartender', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `id` bigint UNSIGNED NOT NULL,
  `simbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int NOT NULL,
  `departemen_id` bigint UNSIGNED NOT NULL,
  `divisi_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `simbol`, `kriteria`, `bobot`, `departemen_id`, `divisi_id`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Kehadiran full', 20, 1, 1, '2024-12-01 10:43:34', '2024-12-05 10:03:46'),
(2, 'C2', 'Izin', 5, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(3, 'C3', 'Alfa', 5, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(4, 'C4', 'Melaksanakan Perintah Atasan', 13, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(5, 'C5', 'Membantah Perintah Atasan', 12, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(6, 'C6', 'Teknik memotong/fillet ikan', 10, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(7, 'C7', 'Mengetahui kualitas/kondisi ikan yang layak diolah', 5, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(8, 'C8', 'Menguasai teknik membakar', 10, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(9, 'C9', 'Menguasai saus (rica/parape)', 10, 1, 1, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(11, 'C1', 'Kehadiran full', 20, 2, 12, '2024-12-01 10:43:34', '2024-12-05 10:18:07'),
(12, 'C2', 'Izin', 5, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(13, 'C3', 'Alfa', 5, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(14, 'C4', 'Melaksanakan perintah atasan', 13, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(15, 'C5', 'Membantah perintah atasan', 12, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(16, 'C6', 'Menyetor kas kasir', 10, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(17, 'C7', 'Melayani proses transaksi customer', 10, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(18, 'C8', 'Laporan harian MOKA', 10, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(19, 'C9', 'Konfirmasi ulang tambahan orderan customer', 5, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(20, 'C10', 'Komentar Negatif', 10, 2, 12, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(21, 'C1', 'Kehadiran full', 20, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(22, 'C2', 'Izin', 5, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(23, 'C3', 'Alfa', 5, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(24, 'C4', 'Melaksanakan perintah atasan', 13, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(25, 'C5', 'Membantah perintah atasan', 12, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(26, 'C6', 'Menjaga kebersihan area bar', 10, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(27, 'C7', 'Menyiapkan bahan baku', 10, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(28, 'C8', 'Cek stok bahan baku', 5, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(29, 'C9', 'Kecepatan dan ketepatan memproses pesanan', 10, 6, 8, '2024-12-01 10:43:34', '2024-12-01 10:43:34'),
(39, 'C10', 'Komentar Negatif', 10, 1, 1, '2024-12-05 10:43:26', '2024-12-05 10:43:26'),
(41, 'C10', 'Komentar Negatif', 10, 6, 8, '2024-12-05 10:54:00', '2024-12-05 10:54:50'),
(42, 'C1', 'Kehadiran Full', 20, 4, 6, NULL, NULL),
(43, 'C1', 'Kehadiran full', 20, 5, 7, '2024-12-05 11:12:25', '2024-12-05 11:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_01_162312_create_jabatan_table', 1),
(6, '2024_12_01_162313_create_departemen_table', 1),
(7, '2024_12_01_162314_create_divisi_table', 1),
(8, '2024_12_01_162322_create_kpi_table', 1),
(9, '2024_12_01_162323_create_data_karyawan_table', 1),
(10, '2024_12_01_162324_create_absensi_table', 1),
(11, '2024_12_01_182221_create_outlet_table', 1),
(12, '2024_12_05_143531_create_penilaian_karyawan_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Saoenk Cobek Makassar - Cabang 1', NULL, NULL),
(2, 'Saoenk Cobek Makassar - Cabang 2', NULL, NULL),
(3, 'Saoenk Cobek Makassar - Cabang 3', NULL, NULL),
(4, 'Saoenk Cobek Makassar - Cabang 4', NULL, NULL),
(5, 'Saoenk Cobek Makassar - Cabang 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_karyawan`
--

CREATE TABLE `penilaian_karyawan` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `c1` int NOT NULL DEFAULT '0',
  `c2` int NOT NULL DEFAULT '0',
  `c3` int NOT NULL DEFAULT '0',
  `c4` int NOT NULL DEFAULT '0',
  `c5` int NOT NULL DEFAULT '0',
  `c6` int NOT NULL DEFAULT '0',
  `c7` int NOT NULL DEFAULT '0',
  `c8` int NOT NULL DEFAULT '0',
  `c9` int NOT NULL DEFAULT '0',
  `c10` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian_karyawan`
--

INSERT INTO `penilaian_karyawan` (`id`, `karyawan_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `created_at`, `updated_at`) VALUES
(2, 1, 20, 5, 5, 13, 12, 10, 5, 10, 10, 10, '2024-12-13 01:20:53', '2024-12-13 02:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_data_karyawan_id_foreign` (`data_karyawan_id`),
  ADD KEY `absensi_divisi_id_foreign` (`divisi_id`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_karyawan_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `data_karyawan_divisi_id_foreign` (`divisi_id`),
  ADD KEY `data_karyawan_outlet_id_foreign` (`outlet_id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisi_departemen_id_foreign` (`departemen_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kpi_departemen_id_foreign` (`departemen_id`),
  ADD KEY `kpi_divisi_id_foreign` (`divisi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_karyawan_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_data_karyawan_id_foreign` FOREIGN KEY (`data_karyawan_id`) REFERENCES `data_karyawan` (`id`),
  ADD CONSTRAINT `absensi_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`);

--
-- Constraints for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD CONSTRAINT `data_karyawan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`),
  ADD CONSTRAINT `data_karyawan_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `data_karyawan_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id`);

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`);

--
-- Constraints for table `kpi`
--
ALTER TABLE `kpi`
  ADD CONSTRAINT `kpi_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`),
  ADD CONSTRAINT `kpi_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`);

--
-- Constraints for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD CONSTRAINT `penilaian_karyawan_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `data_karyawan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
