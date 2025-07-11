-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2025 pada 16.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsinurul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_hadir` int(11) NOT NULL,
  `mulai` date DEFAULT NULL,
  `berakhir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi`
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
-- Struktur dari tabel `data_karyawan`
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
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `jabatan_id`, `divisi_id`, `created_at`, `updated_at`, `outlet_id`) VALUES
(1, 'A. Yusril Mahendra', 1, 1, NULL, NULL, 2),
(2, 'Abd Rahman', 2, 4, NULL, NULL, 5),
(3, 'Adam Achmad Labisa', 3, 4, NULL, NULL, 4),
(4, 'Ade Ratih', 4, 12, NULL, NULL, 4),
(5, 'Ahmad Dani', 5, 2, NULL, NULL, 4),
(6, 'Ahmad Sodiqin', 6, 3, NULL, NULL, 1),
(7, 'Akmal', 1, 1, NULL, NULL, 3),
(8, 'Ali Akbar', 2, 8, NULL, NULL, 2),
(9, 'Andi Rivaldi', 3, 3, NULL, NULL, 4),
(10, 'Apriliani Kartika Sari Ali', 4, 2, NULL, NULL, 2),
(11, 'Asriana Fitria Auliana Syam', 5, 2, NULL, NULL, 1),
(12, 'Ayu Meylani', 6, 2, NULL, NULL, 5),
(13, 'Bambang Wiranata', 1, 4, NULL, NULL, 5),
(14, 'Erawasi', 2, 2, NULL, NULL, 3),
(30, 'Maharani Afifa', 4, 12, NULL, NULL, 3),
(31, 'Mecarania Hidayat', 5, 2, NULL, NULL, 4),
(32, 'Megawati', 6, 11, NULL, NULL, 5),
(33, 'Moh. Rifaah Mahfudz', 1, 6, NULL, NULL, 4),
(34, 'Muh Ali Akbar', 2, 3, NULL, NULL, 4),
(35, 'Muh Farhan', 3, 2, NULL, NULL, 4),
(36, 'Muh Fitra Ramadhan', 4, 1, NULL, NULL, 5),
(37, 'Muh. Ilham', 5, 5, NULL, NULL, 3),
(38, 'Muh Rafly Ahmad', 6, 5, NULL, NULL, 2),
(39, 'Muh Reza', 1, 11, NULL, NULL, 1),
(40, 'Muh Rusdi', 2, 14, NULL, NULL, 4),
(41, 'Muh. Ilyas B', 3, 5, NULL, NULL, 4),
(42, 'Muhammad Ali Al Khumais', 4, 2, NULL, NULL, 1),
(43, 'Muhammad Danial Ibrahim', 5, 2, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pembakaran', NULL, NULL),
(2, 'Hall', NULL, NULL),
(3, 'Kitchen', NULL, NULL),
(4, 'Pantry', NULL, NULL),
(5, 'Admin', NULL, NULL),
(6, 'Bar', NULL, NULL),
(7, 'Frying', NULL, NULL),
(8, 'Accounting', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `departemen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `departemen_id`, `created_at`, `updated_at`) VALUES
(1, 'Pembakaran', 1, NULL, NULL),
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
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
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
-- Struktur dari tabel `kpi`
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
-- Dumping data untuk tabel `kpi`
--

INSERT INTO `kpi` (`id`, `simbol`, `kriteria`, `bobot`, `departemen_id`, `divisi_id`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'Kehadiran full', 20, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(2, 'C2', 'Izin', 5, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(3, 'C3', 'Alfa', 5, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(4, 'C4', 'Melaksanakan Perintah Atasan', 13, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(5, 'C5', 'Membantah Perintah Atasan', 12, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(6, 'C6', 'Teknik memotong/fillet ikan', 10, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(7, 'C7', 'Mengetahui kualitas/kondisi ikan yang layak diolah', 5, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(8, 'C8', 'Menguasai teknik membakar', 10, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(9, 'C9', 'Menguasai saus (rica/parape)', 10, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(10, 'C10', 'Komentar Negatif', 10, 1, 1, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(11, 'C1', 'Kehadiran full', 20, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(12, 'C2', 'Izin', 5, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(13, 'C3', 'Alfa', 5, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(14, 'C4', 'Melaksanakan perintah atasan', 13, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(15, 'C5', 'Membantah perintah atasan', 12, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(16, 'C6', 'Menyetor kas kasir', 10, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(17, 'C7', 'Melayani proses transaksi customer', 10, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(18, 'C8', 'Laporan harian MOKA', 10, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(19, 'C9', 'Konfirmasi ulang tambahan orderan customer', 5, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(20, 'C10', 'Komentar Negatif', 10, 2, 12, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(21, 'C1', 'Kehadiran full', 20, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(22, 'C2', 'Izin', 5, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(23, 'C3', 'Alfa', 5, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(24, 'C4', 'Melaksanakan perintah atasan', 13, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(25, 'C5', 'Membantah perintah atasan', 12, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(26, 'C6', 'Menjaga kebersihan area bar', 10, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(27, 'C7', 'Menyiapkan bahan baku', 10, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(28, 'C8', 'Cek stok bahan baku', 5, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(29, 'C9', 'Kecepatan dan ketepatan memproses pesanan', 10, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11'),
(30, 'C10', 'Komentar negatif', 10, 6, 8, '2025-07-02 02:36:11', '2025-07-02 02:36:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Saoenk Cobek Makassar - Cabang 1', NULL, NULL),
(2, 'Saoenk Cobek Makassar - Cabang 2', NULL, NULL),
(3, 'Saoenk Cobek Makassar - Cabang 3', NULL, NULL),
(4, 'Saoenk Cobek Makassar - Cabang 4', NULL, NULL),
(5, 'Saoenk Cobek Makassar - Cabang 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_karyawan`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$0.SwtN1kRsfUrsuYcBh5OeTbUq.D.z6Th.cHMWKFBmS4lVEL4HiL2', 'admin', NULL, '2025-07-02 02:36:11', '2025-07-02 03:41:50'),
(7, 'Surawal', 'surawalawal@gmail.com', NULL, '$2y$12$hqSZYhsi9wYv99Nb3lQcNOGrv7AzIdyC5ym72Rf5bU8ol7TKzzbte', 'kp_divisi', NULL, '2025-07-02 04:29:05', '2025-07-02 04:30:04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_data_karyawan_id_foreign` (`data_karyawan_id`),
  ADD KEY `absensi_divisi_id_foreign` (`divisi_id`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_karyawan_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `data_karyawan_divisi_id_foreign` (`divisi_id`),
  ADD KEY `data_karyawan_outlet_id_foreign` (`outlet_id`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisi_departemen_id_foreign` (`departemen_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kpi`
--
ALTER TABLE `kpi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kpi_departemen_id_foreign` (`departemen_id`),
  ADD KEY `kpi_divisi_id_foreign` (`divisi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_karyawan_karyawan_id_foreign` (`karyawan_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kpi`
--
ALTER TABLE `kpi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_data_karyawan_id_foreign` FOREIGN KEY (`data_karyawan_id`) REFERENCES `data_karyawan` (`id`),
  ADD CONSTRAINT `absensi_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`);

--
-- Ketidakleluasaan untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD CONSTRAINT `data_karyawan_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`),
  ADD CONSTRAINT `data_karyawan_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `data_karyawan_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id`);

--
-- Ketidakleluasaan untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`);

--
-- Ketidakleluasaan untuk tabel `kpi`
--
ALTER TABLE `kpi`
  ADD CONSTRAINT `kpi_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`),
  ADD CONSTRAINT `kpi_divisi_id_foreign` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`);

--
-- Ketidakleluasaan untuk tabel `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD CONSTRAINT `penilaian_karyawan_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `data_karyawan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
