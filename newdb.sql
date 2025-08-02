-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 04:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL DEFAULT 16,
  `jumlah_hadir` int(11) NOT NULL,
  `mulai` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `data_karyawan_id`, `nama`, `divisi_id`, `jumlah_hadir`, `mulai`, `berakhir`, `created_at`, `updated_at`) VALUES
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
(75, 14, 'Erawasi', 2, 4, NULL, NULL, '2024-09-10 00:10:06', '2024-09-10 00:10:06'),
(127, 2, ' Abd Rahman ', 4, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(128, 3, ' Adam Achmad Labisa ', 4, 20, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(129, 4, ' Akmal ', 1, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(130, 5, ' Ali Akbar ', 8, 22, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(131, 6, ' Apriliani Kartika Sari Ali ', 2, 22, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(132, 7, ' Asriana Fitria Auliana Syam ', 2, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(133, 8, ' Bambang Wiranata ', 4, 16, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(134, 9, ' Evo Kurniawan ', 8, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(135, 10, ' Feri Ian Wijaya ', 2, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(136, 11, ' Ilyan Ashari ', 2, 3, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(138, 13, ' Kirani Takhfa Rusyda ', 2, 25, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(139, 14, ' M Fajar Bahari ', 4, 26, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(140, 44, ' Muh Fitra Ramadhan ', 1, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(141, 45, ' Muh. Ilham ', 9, 21, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(142, 46, ' Muh. Ilyas B ', 9, 12, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(143, 47, ' Muhammad Ihsan ', 4, 0, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(144, 48, ' Muhammad Junaedi ', 5, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(145, 49, ' Nur Aulia Tussaleha ', 6, 20, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(146, 50, ' Ratna Sari ', 6, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(147, 51, ' Riki Apriyanto ', 1, 20, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(148, 52, ' Risnawati ', 6, 22, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(149, 53, ' Sandi ', 8, 19, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(150, 54, ' Sitti Zulhaika ', 2, 27, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(152, 56, ' Widyaningsih ', 2, 8, NULL, NULL, '2025-07-07 00:16:22', '2025-07-07 00:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `outlet_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `jabatan_id`, `divisi_id`, `created_at`, `updated_at`, `outlet_id`) VALUES
(2, ' Abd Rahman ', 10, 4, NULL, '2025-07-07 00:16:22', 1),
(3, ' Adam Achmad Labisa ', 10, 4, NULL, '2025-07-07 00:16:22', 1),
(4, ' Akmal ', 10, 1, NULL, '2025-07-07 00:16:22', 1),
(5, ' Ali Akbar ', 10, 8, NULL, '2025-07-07 00:16:22', 1),
(6, ' Apriliani Kartika Sari Ali ', 10, 2, NULL, '2025-07-07 00:16:22', 1),
(7, ' Asriana Fitria Auliana Syam ', 10, 2, NULL, '2025-07-07 00:16:22', 1),
(8, ' Bambang Wiranata ', 10, 4, NULL, '2025-07-07 00:16:22', 1),
(9, ' Evo Kurniawan ', 10, 8, NULL, '2025-07-07 00:16:22', 1),
(10, ' Feri Ian Wijaya ', 10, 2, NULL, '2025-07-07 00:16:22', 1),
(11, ' Ilyan Ashari ', 10, 2, NULL, '2025-07-07 00:16:22', 1),
(12, ' Ishaq ', 10, 25, NULL, '2025-07-07 00:16:22', 1),
(13, ' Kirani Takhfa Rusyda ', 10, 2, NULL, '2025-07-07 00:16:22', 1),
(14, ' M Fajar Bahari ', 10, 4, NULL, '2025-07-07 00:16:22', 1),
(30, 'Maharani Afifa', 4, 12, NULL, NULL, 3),
(31, 'Mecarania Hidayat', 5, 2, NULL, NULL, 2),
(32, 'Megawati', 6, 2, NULL, NULL, 3),
(33, 'Moh. Rifaah Mahfudz', 1, 6, NULL, NULL, 2),
(34, 'Muh Ali Akbar', 2, 3, NULL, NULL, 3),
(35, 'Muh Farhan', 3, 2, NULL, NULL, 3),
(36, 'Muh Fitra Ramadhan', 4, 1, NULL, NULL, 3),
(37, 'Muh. Ilham', 5, 5, NULL, NULL, 3),
(38, 'Muh Rafly Ahmad', 6, 5, NULL, NULL, 3),
(39, 'Muh Reza', 1, 2, NULL, NULL, 4),
(40, 'Muh Rusdi', 2, 4, NULL, NULL, 3),
(41, 'Muh. Ilyas B', 3, 5, NULL, NULL, 4),
(42, 'Muhammad Ali Al Khumais', 4, 2, NULL, NULL, 2),
(43, 'Muhammad Danial Ibrahim', 5, 2, NULL, NULL, 5),
(44, ' Muh Fitra Ramadhan ', 10, 1, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(45, ' Muh. Ilham ', 10, 9, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(46, ' Muh. Ilyas B ', 10, 9, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(47, ' Muhammad Ihsan ', 10, 4, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(48, ' Muhammad Junaedi ', 10, 5, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(49, ' Nur Aulia Tussaleha ', 10, 6, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(50, ' Ratna Sari ', 10, 6, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(51, ' Riki Apriyanto ', 10, 1, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(52, ' Risnawati ', 10, 6, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(53, ' Sandi ', 10, 8, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(54, ' Sitti Zulhaika ', 10, 2, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1),
(56, ' Widyaningsih ', 10, 2, '2025-07-07 00:16:22', '2025-07-07 00:16:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pembakaran', NULL, NULL),
(2, 'Hall', NULL, NULL),
(3, 'Kitchen', NULL, NULL),
(4, 'Bar', NULL, NULL),
(9, 'Umum', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `departemen_id`, `created_at`, `updated_at`) VALUES
(1, 'Pembakaran', 1, NULL, NULL),
(2, 'Hall Waiters', 2, NULL, NULL),
(3, 'Hall Cleaning Service', 2, NULL, NULL),
(4, 'Kitchen Cook', 3, NULL, NULL),
(5, 'Kitchen Helper', 3, NULL, NULL),
(6, 'PJ Dapur', 3, NULL, NULL),
(7, 'Admin Gudang', 9, NULL, NULL),
(8, 'Bar', 4, NULL, NULL),
(9, 'Kitchen Frying', 3, NULL, NULL),
(12, 'Hall Cashier', 2, NULL, NULL),
(16, 'Umum', 9, NULL, NULL),
(25, 'Pengawas Lapangan', 9, '2025-07-07 00:16:22', '2025-07-07 00:16:22'),
(29, 'Hall Assistant Kapten', 2, NULL, NULL),
(30, 'Kitchen Pantry', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
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
(6, 'Bartender', NULL, NULL),
(10, 'Umum', '2025-07-07 00:16:22', '2025-07-07 00:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `kpi`
--

CREATE TABLE `kpi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `simbol` varchar(255) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kpi`
--

INSERT INTO `kpi` (`id`, `simbol`, `kriteria`, `bobot`, `departemen_id`, `divisi_id`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Kehadiran full', 30, 1, 1, '2025-07-02 06:51:57', '2025-07-27 06:46:58'),
(11, 'C1', 'Kehadiran full', 20, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(12, 'C2', 'Izin', 5, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(13, 'C3', 'Alfa', 5, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(14, 'C4', 'Melaksanakan perintah atasan', 13, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(15, 'C5', 'Membantah perintah atasan', 12, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(16, 'C6', 'Menyetor kas kasir', 10, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(17, 'C7', 'Melayani proses transaksi customer', 10, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(18, 'C8', 'Laporan harian MOKA', 10, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(19, 'C9', 'Konfirmasi ulang tambahan orderan customer', 5, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(20, 'C10', 'Komentar Negatif', 10, 2, 12, '2025-07-02 06:51:57', '2025-07-02 06:51:57'),
(21, 'C1', 'Kehadiran full', 30, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:34:35'),
(24, 'C2', 'Melaksanakan perintah atasan', 13, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:34:41'),
(25, 'C3', 'Membantah perintah atasan', 12, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:34:45'),
(26, 'C4', 'Menjaga kebersihan area bar', 10, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:34:50'),
(27, 'C5', 'Menyiapkan bahan baku', 10, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:34:55'),
(28, 'C6', 'Cek stok bahan baku', 5, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:35:01'),
(29, 'C7', 'Kecepatan dan ketepatan memproses pesanan', 10, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:35:07'),
(30, 'C8', 'Komentar negatif', 10, 4, 8, '2025-07-02 06:51:57', '2025-07-27 10:35:12'),
(31, 'C1', 'Kehadiran full', 30, 2, 2, '2025-07-27 06:47:48', '2025-07-27 06:47:48'),
(32, 'C2', 'Melaksanakan Perintah Atasan', 13, 2, 2, '2025-07-27 06:48:04', '2025-07-27 06:48:04'),
(33, 'C3', 'Membantah Perintah Atasan', 12, 2, 2, '2025-07-27 06:48:18', '2025-07-27 06:48:18'),
(34, 'C4', 'Up Sell', 10, 2, 2, '2025-07-27 06:48:41', '2025-07-27 06:48:41'),
(35, 'C5', 'Kerapihan/Grooming', 10, 2, 2, '2025-07-27 06:49:00', '2025-07-27 06:49:00'),
(36, 'C6', 'Kecakapan Take order', 10, 2, 2, '2025-07-27 06:49:12', '2025-07-27 06:49:12'),
(37, 'C7', 'Greeting', 5, 2, 2, '2025-07-27 06:49:26', '2025-07-27 06:49:26'),
(38, 'C8', 'Komentar Negatif', 10, 2, 2, '2025-07-27 06:49:42', '2025-07-27 06:49:42'),
(39, 'C1', 'Kehadiran full', 30, 2, 3, '2025-07-27 06:50:02', '2025-07-27 06:50:02'),
(40, 'C2', 'Melaksanakan Perintah Atasan', 13, 2, 3, '2025-07-27 08:21:29', '2025-07-27 08:21:29'),
(41, 'C3', 'Membantah Perintah Atasan', 12, 2, 3, '2025-07-27 08:21:46', '2025-07-27 08:21:46'),
(42, 'C4', 'Membersihkan Area Resto', 15, 2, 3, '2025-07-27 08:22:02', '2025-07-27 08:22:02'),
(43, 'C5', 'Mengangkat Seluruh Sampah', 5, 2, 3, '2025-07-27 08:22:16', '2025-07-27 08:22:16'),
(44, 'C6', 'Mencuci Piring', 10, 2, 3, '2025-07-27 08:22:31', '2025-07-27 08:22:31'),
(45, 'C7', 'Membersihkan Gazebo', 5, 2, 3, '2025-07-27 08:22:47', '2025-07-27 08:22:47'),
(46, 'C8', 'Komentar Negatif', 10, 2, 3, '2025-07-27 08:23:00', '2025-07-27 08:23:00'),
(47, 'C1', 'Kehadiran full', 30, 2, 29, '2025-07-27 10:13:12', '2025-07-27 10:13:12'),
(48, 'C2', 'Melaksanakan Perintah Atasan', 13, 2, 29, '2025-07-27 10:13:25', '2025-07-27 10:13:25'),
(49, 'C3', 'Membantah Perintah Atasan', 12, 2, 29, '2025-07-27 10:13:36', '2025-07-27 10:13:36'),
(50, 'C4', 'Mengkordinator Anggota Hall Agar sesuai SOP', 10, 2, 29, '2025-07-27 10:13:58', '2025-07-27 10:13:58'),
(51, 'C5', 'Membuat dan Menginput Schedule di Gsheet', 10, 2, 29, '2025-07-27 10:14:13', '2025-07-27 10:14:13'),
(52, 'C6', 'Menerima Reservasi', 5, 2, 29, '2025-07-27 10:14:28', '2025-07-27 10:14:28'),
(53, 'C7', 'Menginput dan Mengirim Sales Projection', 10, 2, 29, '2025-07-27 10:14:39', '2025-07-27 10:14:39'),
(54, 'C8', 'Komentar Negatif', 10, 2, 29, '2025-07-27 10:14:52', '2025-07-27 10:14:52'),
(55, 'C1', 'Kehadiran full', 30, 3, 6, '2025-07-27 10:36:31', '2025-07-27 10:36:31'),
(56, 'C2', 'Melaksanakan Perintah Atasan', 13, 3, 6, '2025-07-27 10:36:50', '2025-07-27 10:36:50'),
(57, 'C3', 'Membantah Perintah Atasan', 12, 3, 6, '2025-07-27 10:36:57', '2025-07-27 10:36:57'),
(58, 'C4', 'Mengkordinir Anggota Dapur memastikan Berjalan Lancar', 10, 3, 6, '2025-07-27 10:37:10', '2025-07-27 10:37:10'),
(59, 'C5', 'Membuat dan Menginput Schedule', 5, 3, 6, '2025-07-27 10:37:23', '2025-07-27 10:37:23'),
(60, 'C6', 'Melaporkan Ketersediaan Bahan Baku', 10, 3, 6, '2025-07-27 10:37:41', '2025-07-27 10:37:41'),
(61, 'C7', 'Menjaga Kebersihan Area Dapur', 10, 3, 6, '2025-07-27 10:37:51', '2025-07-27 10:37:51'),
(62, 'C8', 'Komentar Negatif', 10, 3, 6, '2025-07-27 10:38:02', '2025-07-27 10:38:02'),
(63, 'C1', 'Kehadiran full', 30, 3, 30, '2025-07-27 10:38:22', '2025-07-27 10:38:22'),
(64, 'C2', 'Melaksanakan Perintah Atasan', 13, 3, 30, '2025-07-27 10:38:29', '2025-07-27 10:38:29'),
(65, 'C3', 'Membantah Perintah Atasan', 12, 3, 30, '2025-07-27 10:38:36', '2025-07-27 10:38:36'),
(66, 'C4', 'Mempersiapkan seluruh jenis sambel, garnish, dan kondimen', 10, 3, 30, '2025-07-27 10:38:51', '2025-07-27 10:38:51'),
(67, 'C5', 'Mengatur CO agar keluar sesuai urutan', 5, 3, 30, '2025-07-27 10:39:02', '2025-07-27 10:39:02'),
(68, 'C6', 'Memperhatikan Tampilan makanan,porsi sebelum makanan keluar', 10, 3, 30, '2025-07-27 10:39:16', '2025-07-27 10:39:16'),
(69, 'C7', 'Menjaga Kebersihan Area Dapur', 10, 3, 30, '2025-07-27 10:39:31', '2025-07-27 10:39:31'),
(70, 'C8', 'Komentar Negatif', 10, 3, 30, '2025-07-27 10:39:37', '2025-07-27 10:39:37'),
(71, 'C1', 'Kehadiran full', 30, 3, 4, '2025-07-27 10:40:13', '2025-07-27 10:40:13'),
(72, 'C2', 'Melaksanakan Perintah Atasan', 13, 3, 4, '2025-07-27 10:40:24', '2025-07-27 10:40:24'),
(73, 'C3', 'Membantah Perintah Atasan', 12, 3, 4, '2025-07-27 10:40:31', '2025-07-27 10:40:31'),
(74, 'C4', 'Pembuatan makanan tepat waktu', 10, 3, 4, '2025-07-27 10:40:42', '2025-07-27 10:40:42'),
(75, 'C5', 'Memasak bahan makanan sesuai SOP', 10, 3, 4, '2025-07-27 10:40:54', '2025-07-27 10:40:54'),
(76, 'C6', 'Memperhatikan tampilan makanan', 5, 3, 4, '2025-07-27 10:41:06', '2025-07-27 10:41:06'),
(77, 'C7', 'Mampu mengolah rasa agar tetap sama', 10, 3, 4, '2025-07-27 10:41:38', '2025-07-27 10:41:38'),
(78, 'C8', 'Komentar Negatif', 10, 3, 4, '2025-07-27 10:41:47', '2025-07-27 10:41:47'),
(79, 'C1', 'Kehadiran full', 30, 3, 5, '2025-07-27 10:42:05', '2025-07-27 10:42:05'),
(80, 'C2', 'Melaksanakan Perintah Atasan', 13, 3, 5, '2025-07-27 10:42:12', '2025-07-27 10:42:12'),
(81, 'C3', 'Membantah Perintah Atasan', 12, 3, 5, '2025-07-27 10:42:19', '2025-07-27 10:42:19'),
(82, 'C4', 'Prepare bahan baku (mengupas,memotong, dll)', 10, 3, 5, '2025-07-27 10:42:40', '2025-07-27 10:42:40'),
(83, 'C5', 'Stock Opname Bahan Baku', 5, 3, 5, '2025-07-27 10:42:50', '2025-07-27 10:42:50'),
(84, 'C6', 'Menyiapkan Kondimen Sesuai SOP Resep', 10, 3, 5, '2025-07-27 10:43:01', '2025-07-27 10:43:01'),
(85, 'C7', 'Menjaga Kebersihan Area Dapur', 10, 3, 5, '2025-07-27 10:43:15', '2025-07-27 10:43:15'),
(86, 'C8', 'Komentar Negatif', 10, 3, 5, '2025-07-27 10:43:22', '2025-07-27 10:43:22'),
(87, 'C1', 'Kehadiran full', 30, 3, 9, '2025-07-27 10:43:44', '2025-07-27 10:43:44'),
(88, 'C2', 'Melaksanakan Perintah Atasan', 13, 3, 9, '2025-07-27 10:43:52', '2025-07-27 10:43:52'),
(89, 'C3', 'Membantah Perintah Atasan', 12, 3, 9, '2025-07-27 10:44:01', '2025-07-27 10:44:01'),
(90, 'C4', 'Menggoreng Sesuai SOP', 10, 3, 9, '2025-07-27 10:44:13', '2025-07-27 10:44:13'),
(91, 'C5', 'Memastikan Tampilan Gorengan Menarik', 10, 3, 9, '2025-07-27 10:44:24', '2025-07-27 10:44:24'),
(92, 'C6', 'Membantu Divisi Dapur yang Lain jika Free', 5, 3, 9, '2025-07-27 10:44:38', '2025-07-27 10:44:38'),
(93, 'C7', 'Menjaga Kebersihan Area Dapur', 10, 3, 9, '2025-07-27 10:44:48', '2025-07-27 10:44:48'),
(94, 'C8', 'Komentar Negatif', 10, 3, 9, '2025-07-27 10:44:55', '2025-07-27 10:44:55'),
(96, 'C2', 'Melaksanakan Perintah Atasan', 13, 1, 1, '2025-07-27 10:53:29', '2025-07-27 10:53:29'),
(97, 'C3', 'Menunjukkan Inisiatif dalam Mengerjakan Tugas', 12, 1, 1, '2025-07-27 10:53:41', '2025-07-30 18:52:44'),
(98, 'C4', 'Teknik Memotong/Fillet Ikan', 10, 1, 1, '2025-07-27 10:53:53', '2025-07-27 10:53:53'),
(99, 'C5', 'Mengetahui Kualitas/Kondisi Ikan yang Layak diolah', 10, 1, 1, '2025-07-27 10:54:03', '2025-07-30 18:53:17'),
(100, 'C6', 'Menguasai Teknik Membakar', 10, 1, 1, '2025-07-27 10:54:21', '2025-07-27 10:54:21'),
(101, 'C7', 'Menguasai Saus (Rica/Parape)', 5, 1, 1, '2025-07-27 10:54:31', '2025-07-30 18:53:23'),
(102, 'C8', 'Komentar Positif', 10, 1, 1, '2025-07-27 10:54:38', '2025-07-30 18:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
(12, '2024_12_05_143531_create_penilaian_karyawan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_karyawan`
--

CREATE TABLE `penilaian_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `c1` int(11) NOT NULL DEFAULT 0,
  `c2` int(11) NOT NULL DEFAULT 0,
  `c3` int(11) NOT NULL DEFAULT 0,
  `c4` int(11) NOT NULL DEFAULT 0,
  `c5` int(11) NOT NULL DEFAULT 0,
  `c6` int(11) NOT NULL DEFAULT 0,
  `c7` int(11) NOT NULL DEFAULT 0,
  `c8` int(11) NOT NULL DEFAULT 0,
  `c9` int(11) NOT NULL DEFAULT 0,
  `c10` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaian_karyawan`
--

INSERT INTO `penilaian_karyawan` (`id`, `karyawan_id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `created_at`, `updated_at`) VALUES
(2, 6, 30, 13, 12, 10, 10, 10, 5, 10, 0, 0, '2025-07-27 10:51:30', '2025-07-27 10:51:30'),
(3, 4, 30, 13, 12, 10, 5, 10, 10, 10, 0, 0, '2025-07-27 10:56:36', '2025-07-27 10:56:36'),
(4, 44, 30, 13, 8, 5, 5, 10, 8, 8, 0, 0, '2025-07-27 21:09:42', '2025-07-27 21:09:42'),
(5, 51, 22, 12, 11, 10, 3, 8, 10, 9, 0, 0, '2025-07-27 21:13:14', '2025-07-27 21:13:14'),
(6, 7, 30, 13, 12, 6, 10, 10, 5, 10, 0, 0, '2025-07-27 21:13:46', '2025-07-27 21:13:46'),
(7, 10, 30, 11, 10, 10, 10, 8, 4, 10, 0, 0, '2025-07-27 21:14:49', '2025-07-27 21:14:49'),
(8, 11, 3, 13, 12, 10, 10, 6, 5, 10, 0, 0, '2025-07-27 21:15:46', '2025-07-27 21:15:46'),
(9, 13, 28, 13, 12, 5, 10, 5, 3, 10, 0, 0, '2025-07-27 21:17:39', '2025-07-27 21:17:39'),
(10, 54, 30, 13, 12, 8, 10, 10, 5, 10, 0, 0, '2025-07-27 21:18:16', '2025-07-27 21:18:16'),
(11, 56, 9, 10, 9, 10, 10, 10, 5, 8, 0, 0, '2025-07-27 21:18:56', '2025-07-27 21:18:56'),
(12, 2, 30, 13, 12, 10, 10, 3, 7, 10, 0, 0, '2025-07-27 21:19:33', '2025-07-27 21:19:33'),
(13, 3, 22, 9, 8, 8, 10, 5, 10, 8, 0, 0, '2025-07-27 21:20:16', '2025-07-27 21:20:16'),
(14, 8, 18, 10, 9, 8, 10, 5, 10, 9, 0, 0, '2025-07-27 21:20:54', '2025-07-27 21:20:54'),
(15, 14, 20, 8, 7, 6, 10, 3, 7, 8, 0, 0, '2025-07-27 21:22:30', '2025-07-28 19:19:57'),
(16, 47, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2025-07-28 19:09:10', '2025-07-28 19:09:10'),
(17, 48, 30, 13, 12, 5, 5, 5, 10, 10, 0, 0, '2025-07-28 19:09:49', '2025-07-28 19:09:49'),
(18, 49, 22, 13, 12, 10, 3, 6, 10, 9, 0, 0, '2025-07-28 19:10:44', '2025-07-28 19:10:44'),
(19, 50, 30, 12, 11, 8, 5, 5, 10, 9, 0, 0, '2025-07-28 19:14:15', '2025-07-28 19:14:15'),
(20, 52, 24, 13, 12, 9, 4, 8, 8, 9, 0, 0, '2025-07-28 19:14:49', '2025-07-28 19:14:49'),
(21, 5, 24, 11, 10, 8, 8, 4, 9, 9, 0, 0, '2025-07-28 19:16:18', '2025-07-28 19:16:18'),
(22, 9, 30, 12, 11, 10, 9, 4, 9, 10, 0, 0, '2025-07-28 19:16:36', '2025-07-28 19:16:36'),
(23, 45, 23, 10, 9, 10, 9, 4, 10, 10, 0, 0, '2025-07-28 19:17:24', '2025-07-28 19:17:24'),
(24, 53, 21, 6, 5, 5, 4, 3, 5, 6, 0, 0, '2025-07-28 19:18:01', '2025-07-28 19:21:35'),
(25, 46, 13, 6, 5, 10, 7, 3, 6, 7, 0, 0, '2025-07-28 19:18:39', '2025-07-28 19:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$Bk9biaNta6w8bLOiT4MmNebBU9tF6e5HJPM3gnGFLXNeCCJSZiBOy', 'admin', NULL, '2025-07-02 06:51:58', '2025-07-02 06:51:58'),
(2, 'Admin Nurul', 'adminnurul@gmail.com', NULL, '$2y$12$/Pt/oLGMyW/8mzDlkFz6CuYY50p6xg9JOeZ2Dp7EXzGWVY9CQYsC.', 'admin', NULL, '2025-07-02 06:59:13', '2025-07-02 07:01:31'),
(3, 'Indah Puspyta', 'indahpus@gmail.com', NULL, '$2y$12$c01HKZUGuaqKVd4jbwcRnu.UICNdRtQBNZuRKsUHzM9pqykYnyYc2', 'supervisor', NULL, '2025-07-02 07:00:15', '2025-07-02 07:01:39'),
(4, 'Lisa', 'lisa@gmail.com', NULL, '$2y$12$y3WMpWud7SOETgi4SDix0ux9byQAQCbHTE3nRiK.gu3BtQeV0kbXO', 'admin_accounting', NULL, '2025-07-02 07:00:53', '2025-07-02 07:01:43'),
(5, 'Fauziyah Anisah', 'fani@gmail.com', NULL, '$2y$12$UIJIiDEY3R.Bxwx8Zr3Nb.P7sEUVomMGNpEc9.Rs3G3VyEUQKIHVW', 'kp_divisi', NULL, '2025-07-02 07:01:20', '2025-07-02 07:01:47');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
