-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2025 pada 07.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-spk-wp-jurusan-perguruan-tinggi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_mahasiswas`
--

CREATE TABLE `calon_mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminatan_id` int(10) UNSIGNED NOT NULL,
  `calon_nama` varchar(255) NOT NULL,
  `calon_asal_sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `calon_mahasiswas`
--

INSERT INTO `calon_mahasiswas` (`id`, `peminatan_id`, `calon_nama`, `calon_asal_sekolah`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ahmad', 'MAN 2', '2024-12-31 17:55:24', '2024-12-31 17:55:24'),
(3, 2, 'Albert', 'SMA 17', '2024-12-31 17:56:45', '2024-12-31 17:56:45'),
(4, 3, 'Robert', 'SMA 11', '2024-12-31 17:57:50', '2024-12-31 17:57:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_mahasiswa_jurusan`
--

CREATE TABLE `calon_mahasiswa_jurusan` (
  `calon_mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `hasil` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `calon_mahasiswa_jurusan`
--

INSERT INTO `calon_mahasiswa_jurusan` (`calon_mahasiswa_id`, `jurusan_id`, `hasil`) VALUES
(2, 1, 3.034),
(2, 2, 3.567),
(2, 3, 1.32),
(2, 4, 1.32),
(2, 5, 1.32),
(3, 6, 3.901),
(3, 7, 2.049),
(3, 8, 1.32),
(3, 9, 1.32),
(3, 10, 1.32),
(4, 11, 1.32),
(4, 12, 4.785),
(4, 13, 1.32),
(4, 14, 4.785),
(4, 15, 1.32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_mahasiswa_sub_kriteria`
--

CREATE TABLE `calon_mahasiswa_sub_kriteria` (
  `calon_mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `calon_mahasiswa_sub_kriteria`
--

INSERT INTO `calon_mahasiswa_sub_kriteria` (`calon_mahasiswa_id`, `sub_kriteria_id`) VALUES
(2, 4),
(2, 8),
(2, 10),
(2, 27),
(2, 15),
(2, 30),
(2, 32),
(3, 4),
(3, 83),
(3, 85),
(3, 104),
(3, 94),
(3, 98),
(3, 101),
(4, 4),
(4, 200),
(4, 231),
(4, 233),
(4, 212),
(4, 239),
(4, 241);

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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `peminatan_id` int(10) UNSIGNED NOT NULL,
  `jurusan_nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `peminatan_id`, `jurusan_nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Aqidah dan Filsafat Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(2, 1, 'Ekonomi Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(3, 1, 'Hukum Keluarga Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(4, 1, 'Ilmu Al-Qur\'an dan Tafsir', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(5, 1, 'Pendidikan Agama Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(6, 2, 'Farmasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(7, 2, 'Kedokteran', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(8, 2, 'Matematika', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(9, 2, 'Sistem Informasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(10, 2, 'Teknik Informatika', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(11, 3, 'Hubungan Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(12, 3, 'Ilmu Hukum', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(13, 3, 'Ilmu Komunikasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(14, 3, 'Manajemen', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(15, 3, 'Pendidikan Guru Sekolah Dasar', '2024-12-31 11:39:39', '2024-12-31 11:39:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan_sub_kriteria`
--

CREATE TABLE `jurusan_sub_kriteria` (
  `jurusan_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan_sub_kriteria`
--

INSERT INTO `jurusan_sub_kriteria` (`jurusan_id`, `sub_kriteria_id`, `bobot`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 1),
(1, 7, 2),
(1, 8, 3),
(1, 9, 3),
(1, 10, 4),
(1, 11, 4),
(1, 12, 5),
(1, 13, 5),
(1, 14, 1),
(1, 15, 2),
(1, 16, 3),
(1, 17, 3),
(1, 18, 4),
(1, 19, 4),
(1, 20, 5),
(1, 21, 5),
(2, 1, 1),
(2, 2, 2),
(2, 3, 3),
(2, 4, 4),
(2, 5, 5),
(2, 6, 1),
(2, 22, 2),
(2, 23, 2),
(2, 24, 3),
(2, 25, 3),
(2, 26, 4),
(2, 27, 4),
(2, 28, 5),
(2, 29, 5),
(2, 14, 1),
(2, 30, 2),
(2, 31, 2),
(2, 32, 3),
(2, 33, 3),
(2, 34, 4),
(2, 35, 4),
(2, 36, 5),
(2, 37, 5),
(3, 1, 1),
(3, 2, 2),
(3, 3, 3),
(3, 4, 4),
(3, 5, 5),
(3, 6, 1),
(3, 38, 2),
(3, 39, 3),
(3, 40, 3),
(3, 41, 4),
(3, 42, 4),
(3, 43, 5),
(3, 44, 5),
(3, 14, 1),
(3, 45, 2),
(3, 46, 3),
(3, 47, 3),
(3, 48, 4),
(3, 49, 4),
(3, 50, 5),
(3, 51, 5),
(4, 1, 1),
(4, 2, 2),
(4, 3, 3),
(4, 4, 4),
(4, 5, 5),
(4, 6, 1),
(4, 52, 2),
(4, 53, 3),
(4, 54, 3),
(4, 55, 4),
(4, 56, 4),
(4, 57, 5),
(4, 58, 5),
(4, 14, 1),
(4, 59, 2),
(4, 60, 2),
(4, 61, 3),
(4, 62, 3),
(4, 63, 4),
(4, 64, 4),
(4, 65, 5),
(4, 66, 5),
(5, 1, 1),
(5, 2, 2),
(5, 3, 3),
(5, 4, 4),
(5, 5, 5),
(5, 6, 1),
(5, 67, 2),
(5, 68, 3),
(5, 69, 3),
(5, 70, 4),
(5, 71, 4),
(5, 72, 5),
(5, 73, 5),
(5, 14, 1),
(5, 74, 2),
(5, 75, 2),
(5, 76, 3),
(5, 77, 3),
(5, 78, 4),
(5, 79, 4),
(5, 80, 5),
(5, 81, 5),
(6, 1, 1),
(6, 2, 2),
(6, 3, 3),
(6, 4, 4),
(6, 5, 5),
(6, 6, 1),
(6, 82, 2),
(6, 83, 3),
(6, 84, 3),
(6, 85, 3),
(6, 86, 4),
(6, 87, 4),
(6, 88, 5),
(6, 89, 5),
(6, 90, 5),
(6, 91, 5),
(6, 14, 1),
(6, 92, 2),
(6, 93, 2),
(6, 94, 3),
(6, 95, 3),
(6, 96, 4),
(6, 97, 4),
(6, 98, 4),
(6, 99, 5),
(6, 100, 5),
(6, 101, 5),
(7, 1, 1),
(7, 2, 2),
(7, 3, 3),
(7, 4, 4),
(7, 5, 5),
(7, 6, 1),
(7, 102, 2),
(7, 103, 3),
(7, 104, 3),
(7, 105, 3),
(7, 106, 4),
(7, 107, 4),
(7, 108, 5),
(7, 109, 5),
(7, 110, 5),
(7, 111, 5),
(7, 14, 1),
(7, 112, 2),
(7, 113, 2),
(7, 114, 3),
(7, 115, 3),
(7, 116, 4),
(7, 117, 4),
(7, 118, 4),
(7, 119, 5),
(7, 120, 5),
(7, 121, 5),
(8, 2, 2),
(8, 1, 1),
(8, 3, 3),
(8, 4, 4),
(8, 5, 5),
(8, 6, 1),
(8, 122, 2),
(8, 123, 2),
(8, 124, 3),
(8, 125, 3),
(8, 126, 3),
(8, 127, 4),
(8, 128, 4),
(8, 129, 5),
(8, 130, 5),
(8, 131, 5),
(8, 14, 1),
(8, 132, 2),
(8, 133, 3),
(8, 134, 3),
(8, 135, 4),
(8, 136, 4),
(8, 137, 4),
(8, 138, 5),
(8, 139, 5),
(8, 140, 5),
(8, 141, 5),
(9, 1, 1),
(9, 2, 2),
(9, 3, 3),
(9, 4, 4),
(9, 5, 5),
(9, 6, 1),
(9, 142, 2),
(9, 143, 3),
(9, 144, 3),
(9, 145, 3),
(9, 146, 3),
(9, 147, 4),
(9, 148, 4),
(9, 149, 4),
(9, 150, 4),
(9, 151, 5),
(9, 14, 1),
(9, 152, 2),
(9, 153, 3),
(9, 154, 3),
(9, 155, 3),
(9, 156, 3),
(9, 157, 4),
(9, 158, 4),
(9, 159, 4),
(9, 160, 4),
(9, 161, 5),
(10, 1, 1),
(10, 2, 2),
(10, 3, 3),
(10, 4, 4),
(10, 5, 5),
(10, 6, 1),
(10, 162, 2),
(10, 163, 3),
(10, 164, 3),
(10, 165, 3),
(10, 166, 3),
(10, 167, 4),
(10, 145, 4),
(10, 168, 4),
(10, 169, 5),
(10, 170, 5),
(10, 14, 1),
(10, 171, 2),
(10, 159, 3),
(10, 152, 3),
(10, 157, 3),
(10, 160, 4),
(10, 154, 4),
(10, 172, 4),
(10, 173, 5),
(10, 137, 5),
(10, 174, 5),
(11, 1, 1),
(11, 2, 2),
(11, 3, 3),
(11, 4, 4),
(11, 5, 5),
(11, 6, 1),
(11, 175, 2),
(11, 176, 3),
(11, 177, 3),
(11, 178, 4),
(11, 179, 4),
(11, 180, 4),
(11, 181, 5),
(11, 182, 5),
(11, 183, 5),
(11, 14, 1),
(11, 184, 2),
(11, 185, 3),
(11, 186, 4),
(11, 187, 4),
(11, 188, 4),
(11, 189, 5),
(11, 190, 5),
(11, 191, 5),
(11, 192, 5),
(12, 1, 1),
(12, 2, 2),
(12, 3, 3),
(12, 4, 4),
(12, 5, 5),
(12, 6, 1),
(12, 193, 2),
(12, 194, 2),
(12, 195, 3),
(12, 196, 3),
(12, 197, 3),
(12, 198, 4),
(12, 199, 4),
(12, 200, 5),
(12, 201, 5),
(12, 202, 5),
(12, 14, 1),
(12, 203, 2),
(12, 204, 3),
(12, 205, 3),
(12, 206, 4),
(12, 207, 4),
(12, 208, 4),
(12, 209, 5),
(12, 210, 5),
(12, 211, 5),
(12, 212, 5),
(13, 1, 1),
(13, 2, 2),
(13, 3, 3),
(13, 4, 4),
(13, 5, 5),
(13, 6, 1),
(13, 213, 2),
(13, 214, 2),
(13, 215, 3),
(13, 216, 3),
(13, 217, 4),
(13, 218, 4),
(13, 219, 5),
(13, 220, 5),
(13, 14, 1),
(13, 221, 2),
(13, 222, 2),
(13, 223, 3),
(13, 224, 3),
(13, 225, 4),
(13, 226, 5),
(13, 227, 5),
(14, 1, 1),
(14, 2, 2),
(14, 3, 3),
(14, 4, 4),
(14, 5, 5),
(14, 6, 1),
(14, 196, 2),
(14, 228, 3),
(14, 229, 3),
(14, 230, 4),
(14, 231, 4),
(14, 232, 4),
(14, 233, 5),
(14, 234, 5),
(14, 235, 5),
(14, 14, 1),
(14, 236, 2),
(14, 237, 3),
(14, 238, 4),
(14, 239, 4),
(14, 240, 5),
(14, 241, 5),
(14, 242, 5),
(15, 1, 1),
(15, 2, 2),
(15, 3, 3),
(15, 4, 4),
(15, 5, 5),
(15, 6, 1),
(15, 243, 2),
(15, 244, 2),
(15, 245, 3),
(15, 246, 3),
(15, 247, 3),
(15, 248, 4),
(15, 249, 4),
(15, 250, 5),
(15, 14, 1),
(15, 251, 2),
(15, 252, 2),
(15, 253, 3),
(15, 254, 4),
(15, 255, 4),
(15, 256, 4),
(15, 257, 5),
(15, 258, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_nama` varchar(255) NOT NULL,
  `kriteria_bobot` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriterias`
--

INSERT INTO `kriterias` (`id`, `kriteria_nama`, `kriteria_bobot`, `created_at`, `updated_at`) VALUES
(1, 'Nilai Rapor', 0.2, '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(2, 'Minat dan Bakat', 0.4, '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(3, 'Tujuan Karir', 0.4, '2024-12-31 11:39:39', '2024-12-31 11:39:39');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_21_095730_create_peminatans_table', 1),
(5, '2024_12_22_005153_create_jurusans_table', 1),
(6, '2024_12_22_005204_create_kriterias_table', 1),
(7, '2024_12_22_005215_create_sub_kriterias_table', 1),
(8, '2024_12_22_005232_create_calon_mahasiswas_table', 1),
(9, '2024_12_23_102155_create_jurusan_sub_kriteria_table', 1),
(10, '2024_12_24_104129_create_calon_mahasiswa_sub_kriteria_table', 1),
(11, '2024_12_31_183341_create_calon_mahasiswa_jurusan_table', 1);

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
-- Struktur dari tabel `peminatans`
--

CREATE TABLE `peminatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `peminatan_sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminatans`
--

INSERT INTO `peminatans` (`id`, `peminatan_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'Agama', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(2, 'IPA', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(3, 'IPS', '2024-12-31 11:39:39', '2024-12-31 11:39:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hRp8hAS2IpyvET8xg7mvNrVa9iNaw8SoPiycszo7', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWMwZ1l1aUQ5NmU4Y2lKY3J3Z2NEOWR0YmEzTWw0OVdpTVRSNDBGbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQvY2Fsb24tbWFoYXNpc3dhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1735698581);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriterias`
--

CREATE TABLE `sub_kriterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `sub_kriteria_nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kriterias`
--

INSERT INTO `sub_kriterias` (`id`, `kriteria_id`, `sub_kriteria_nama`, `created_at`, `updated_at`) VALUES
(1, 1, '0-59', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(2, 1, '60-69', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(3, 1, '70-79', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(4, 1, '80-89', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(5, 1, '90-100', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(6, 2, 'Lain-lain', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(7, 2, 'Studi Filsafat Klasik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(8, 2, 'Pemikiran Keagamaan Modern', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(9, 2, 'Kajian Aqidah dan Teologi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(10, 2, 'Kajian Filsafat Islam Kontemporer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(11, 2, 'Penelitian Isu Sosial-Religius', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(12, 2, 'Pemahaman Ajaran Tauhid', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(13, 2, 'Kajian Logika dan Etika Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(14, 3, 'Lain-lain', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(15, 3, 'Guru Pendidikan Agama Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(16, 3, 'Penulis atau Editor Buku Keislaman', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(17, 3, 'Akademisi dalam Bidang Aqidah dan Filsafat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(18, 3, 'Dai atau Penceramah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(19, 3, 'Peneliti di Lembaga Keagamaan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(20, 3, 'Konsultan Spiritual', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(21, 3, 'Pemimpin Organisasi Keagamaan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(22, 2, 'Kajian Hukum Ekonomi Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(23, 2, 'Akuntansi Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(24, 2, 'Kewirausahaan Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(25, 2, 'Perbankan Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(26, 2, 'Manajemen Zakat dan Wakaf', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(27, 2, 'Pengelolaan Keuangan Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(28, 2, 'Pemasaran Produk Halal', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(29, 2, 'Analisis Kebijakan Ekonomi Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(30, 3, 'Pegawai Bank Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(31, 3, 'Auditor Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(32, 3, 'Konsultan Ekonomi Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(33, 3, 'Entrepreneur Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(34, 3, 'Akademisi Ekonomi Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(35, 3, 'Pengelola Lembaga Keuangan Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(36, 3, 'Peneliti Ekonomi Syariah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(37, 3, 'Direktur Operasional Keuangan Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(38, 2, 'Kajian Fiqih Munakahat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(39, 2, 'Studi Peradilan Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(40, 2, 'Kajian tentang Ahwal al-Syakhsiyyah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(41, 2, 'Pengelolaan Konflik dalam Keluarga', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(42, 2, 'Studi Hukum Waris Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(43, 2, 'Pemahaman tentang Mediasi Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(44, 2, 'Kajian Fatwa dan Pengambilan Keputusan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(45, 3, 'Hakim Pengadilan Agama', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(46, 3, 'Konsultan Hukum Keluarga', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(47, 3, 'Mediator dalam Konflik Keluarga', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(48, 3, 'Penulis Buku Hukum Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(49, 3, 'Akademisi Bidang Hukum Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(50, 3, 'Peneliti di Bidang Hukum Keluarga', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(51, 3, 'Pengelola Lembaga Fatwa Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(52, 2, 'Studi Bahasa Arab', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(53, 2, 'Kajian Tafsir Klasik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(54, 2, 'Pemahaman Sejarah Turunnya Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(55, 2, 'Metodologi Tafsir Kontemporer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(56, 2, 'Tahfidzul Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(57, 2, 'Interpretasi Tema Sosial dalam Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(58, 2, 'Penelitian tentang Naskah Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(59, 3, 'Pengajar Tafsir Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(60, 3, 'Dai/Daiyah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(61, 3, 'Peneliti Tafsir Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(62, 3, 'Konsultasi Kajian Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(63, 3, 'Editor Naskah Al-Qur\'an dan Tafsir', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(64, 3, 'Akademisi Studi Al-Qur\'an', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(65, 3, 'Penulis Buku Tafsir', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(66, 3, 'Pemimpin Lembaga Studi Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(67, 2, 'Studi Keislaman', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(68, 2, 'Retorika dan dakwah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(69, 2, 'Literasi Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(70, 2, 'Kajian Tafsir', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(71, 2, 'Pendidikan Karakter', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(72, 2, 'Teknologi dalam Pendidikan Agama', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(73, 2, 'Ilmu Fiqh dan Hukum Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(74, 3, 'Guru Agama Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(75, 3, 'Pengajar Pesantren', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(76, 3, 'Penyuluh Agama Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(77, 3, 'Konselor Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(78, 3, 'Penulis Buku Islami', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(79, 3, 'Dosen Studi Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(80, 3, 'Peneliti Islam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(81, 3, 'Ulama atau Pemimpin Agama', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(82, 2, 'Kimia Organik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(83, 2, 'Biologi Molukuler', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(84, 2, 'Teknologi Nano di Farmasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(85, 2, 'Farmakokinetik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(86, 2, 'Formulasi dan Pencampuran Obat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(87, 2, 'Sistem Pengantaran Obat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(88, 2, 'Fitofarmaka dan Obat Herbal', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(89, 2, 'Farmasi Klinis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(90, 2, 'Farmasi Rumah Sakit', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(91, 2, 'Penelitian Pengembangan Obat Baru', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(92, 3, 'Apoteker Komunitas di Apotek', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(93, 3, 'Staf Produksi di Industri Farmasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(94, 3, 'Analisis Laboratorium Kesehatan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(95, 3, 'Regulatory Affairs di Industri Farmasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(96, 3, 'Quality Control dan Quality Assurance', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(97, 3, 'Peneliti Pengembangan Formulasi Obat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(98, 3, 'Farmasi Klinis di Rumah Sakit', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(99, 3, 'Spesialis Fitofarmaka dan Produk Herbal', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(100, 3, 'Dosen atau Akademisi Farmasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(101, 3, 'Konsultan Farmasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(102, 2, 'Biologi Sel dan Molukuler', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(103, 2, 'Anatomi Manusia', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(104, 2, 'Fisiologi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(105, 2, 'Patalogi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(106, 2, 'Farmakologi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(107, 2, 'Bedah Umum', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(108, 2, 'Penyakit Dalam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(109, 2, 'Pediatri', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(110, 2, 'Psikiatri', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(111, 2, 'Penelitian Klinis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(112, 3, 'Dokter Umum', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(113, 3, 'Dokter Keluarga', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(114, 3, 'Dokter Spesialis Penyakit Dalam', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(115, 3, 'Dokter Spesialis Bedah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(116, 3, 'Dokter Spesialis Anak', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(117, 3, 'Dokter Spesialis Kandungan (Obgyn)', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(118, 3, 'Peneliti atau Akademisi Medis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(119, 3, 'Dokter Spesialis Jantung', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(120, 3, 'Dokter Spesialis Onkologi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(121, 3, 'Ahli Bedah Saraf', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(122, 2, 'Statistika dan Probabilitas', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(123, 2, 'Matematika Diskrit', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(124, 2, 'Aljabar Linear', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(125, 2, 'Kalkulus', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(126, 2, 'Teori Bilangan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(127, 2, 'Analisis Real dan Kompleks', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(128, 2, 'Optimasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(129, 2, 'Pemodelan Matematika', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(130, 2, 'Ilmu Data dan Komputasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(131, 2, 'Matematika Terapan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(132, 3, 'Pengajar Matematika', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(133, 3, 'Aktuaris', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(134, 3, 'Peneliti Matematika', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(135, 3, 'Data Analyst', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(136, 3, 'Konsultan Statistika', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(137, 3, 'Data Scientist', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(138, 3, 'Software Engineer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(139, 3, 'Pengembang Algoritma', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(140, 3, 'Matematika Industri', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(141, 3, 'Peneliti Keuangan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(142, 2, 'User Experience (UX) Design', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(143, 2, 'Cloud Computing', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(144, 2, 'Enterprise Resource Planning (ERP)', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(145, 2, 'Software Development', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(146, 2, 'Information Security', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(147, 2, 'Data Analytics', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(148, 2, 'IT Project Management', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(149, 2, 'System Design', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(150, 2, 'Business Analysis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(151, 2, 'Database Management', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(152, 3, 'UX/UI Designer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(153, 3, 'ERP Consultant', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(154, 3, 'Cybersecurity Specialist', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(155, 3, 'Network Administrator', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(156, 3, 'Software Developer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(157, 3, 'IT Project Manager', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(158, 3, 'Business Intelligence Analyst', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(159, 3, 'Database Administrator', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(160, 3, 'IT Consultant', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(161, 3, 'Systems Analyst', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(162, 2, 'Hardware Development', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(163, 2, 'Web Development', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(164, 2, 'Big Data Analytics', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(165, 2, 'Mobile App Development', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(166, 2, 'Computer Networks', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(167, 2, 'Cyber Security', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(168, 2, 'Artificial Intelligence (AI) dan machine learning', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(169, 2, 'Algoritma dan struktur data', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(170, 2, 'Programming', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(171, 3, 'System Administrator', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(172, 3, 'Network Engineer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(173, 3, 'AI/ML Engineer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(174, 3, 'Software Developer/Engineer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(175, 2, 'Penguasaan Dasar Bahasa Asing', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(176, 2, 'Bahasa Asing (Seperti Inggris, Prancis, Arab)', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(177, 2, 'Diplomasi dan Negosiasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(178, 2, 'Analisis Geopolitik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(179, 2, 'Organisasi dan Manajemen Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(180, 2, 'Isu-isu Global (Seperti Perubahan iklim, HAM)', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(181, 2, 'Kebijakan Luar Negeri', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(182, 2, 'Ekonomi Politik Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(183, 2, 'Resolusi Konflik dan Perdamaian', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(184, 3, 'Translator atau Interpreter', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(185, 3, 'Diplomat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(186, 3, 'Staf Organisasi Internasional (PBB, ASEAN)', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(187, 3, 'Konsultan Hubungan Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(188, 3, 'Wartawan Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(189, 3, 'Akademisi/Dosen', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(190, 3, 'Spesialis Kebijakan Luar Negeri', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(191, 3, 'Aktivis Lembaga Non-Pemerintah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(192, 3, 'Pejabat Pemerintah di Bidang Hubungan Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(193, 2, 'Penguasaan Bahasa', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(194, 2, 'Logika dan Pemikiran Analitis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(195, 2, 'Argumentasi dan Debat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(196, 2, 'Kepemimpinan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(197, 2, 'Advokasi dan Resolusi Konflik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(198, 2, 'Hukum Perdata', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(199, 2, 'Hukum Pidana', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(200, 2, 'Hukum Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(201, 2, 'Hak Asasi Manusia', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(202, 2, 'Hukum Tata Negara', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(203, 3, 'Legal Officer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(204, 3, 'Konsultan Hukum', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(205, 3, 'Mediator', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(206, 3, 'Jaksa', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(207, 3, 'Hakim', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(208, 3, 'Advokat', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(209, 3, 'Notaris', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(210, 3, 'Pakar Hukum Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(211, 3, 'Akademisi atau Dosen Hukum', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(212, 3, 'Aktivis Hak Asasi Manusia', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(213, 2, 'Public Speaking', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(214, 2, 'Fotografi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(215, 2, 'Copywriting', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(216, 2, 'Produksi Media', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(217, 2, 'Jurnalistik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(218, 2, 'Media Sosial', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(219, 2, 'Manajemen Komunikasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(220, 2, 'Branding dan Pemasaran Digital', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(221, 3, 'Content Creator', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(222, 3, 'Fotografer Profesional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(223, 3, 'Reporter', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(224, 3, 'Social Media Specialist', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(225, 3, 'Digital Marketer', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(226, 3, 'TV/Radio Broadcaster', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(227, 3, 'Strategist Media Komunikasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(228, 2, 'Komunikasi Bisnis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(229, 2, 'Manajemen Proyek', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(230, 2, 'Pengelolaan SDM', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(231, 2, 'Pemasaran Digital', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(232, 2, 'Manajemen Risiko', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(233, 2, 'Pengelolaan Keuangan Internasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(234, 2, 'Strategi Bisnis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(235, 2, 'Analisis Data Bisnis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(236, 3, 'Staf Administrasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(237, 3, 'Manajer SDM', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(238, 3, 'Konsultan Bisnis', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(239, 3, 'Manajer Keuangan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(240, 3, 'Enterpreneur', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(241, 3, 'Business Analyst', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(242, 3, 'Direktur Operasional', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(243, 2, 'Psikologi Anak', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(244, 2, 'Keterampilan Komunikasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(245, 2, 'Pedagogik', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(246, 2, 'Seni dan Kreativitas', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(247, 2, 'Inovasi Pengajaran', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(248, 2, 'Literasi', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(249, 2, 'Kemampuan Menulis dan Membaca', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(250, 2, 'Teknologi dalam Pendidikan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(251, 3, 'Asisten Pengajar', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(252, 3, 'Pengajar Bimbel', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(253, 3, 'Guru SD', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(254, 3, 'Kepala Sekolah', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(255, 3, 'Dosen Pendidikan Guru', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(256, 3, 'Pengembangan Kurikulum', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(257, 3, 'Peneliti Pendidikan', '2024-12-31 11:39:39', '2024-12-31 11:39:39'),
(258, 3, 'Pakar Psikologi Anak', '2024-12-31 11:39:39', '2024-12-31 11:39:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$12$7NCNI75Vk9VBsccAbtmlw.jaXDeBPeAC5CkSyVG0pseihVqCUMcLe', NULL, '2024-12-31 11:39:39', '2024-12-31 11:39:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `calon_mahasiswas`
--
ALTER TABLE `calon_mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calon_mahasiswas_peminatan_id_foreign` (`peminatan_id`);

--
-- Indeks untuk tabel `calon_mahasiswa_jurusan`
--
ALTER TABLE `calon_mahasiswa_jurusan`
  ADD KEY `calon_mahasiswa_jurusan_calon_mahasiswa_id_foreign` (`calon_mahasiswa_id`),
  ADD KEY `calon_mahasiswa_jurusan_jurusan_id_foreign` (`jurusan_id`);

--
-- Indeks untuk tabel `calon_mahasiswa_sub_kriteria`
--
ALTER TABLE `calon_mahasiswa_sub_kriteria`
  ADD KEY `calon_mahasiswa_sub_kriteria_calon_mahasiswa_id_foreign` (`calon_mahasiswa_id`),
  ADD KEY `calon_mahasiswa_sub_kriteria_sub_kriteria_id_foreign` (`sub_kriteria_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusans_peminatan_id_foreign` (`peminatan_id`);

--
-- Indeks untuk tabel `jurusan_sub_kriteria`
--
ALTER TABLE `jurusan_sub_kriteria`
  ADD KEY `jurusan_sub_kriteria_jurusan_id_foreign` (`jurusan_id`),
  ADD KEY `jurusan_sub_kriteria_sub_kriteria_id_foreign` (`sub_kriteria_id`);

--
-- Indeks untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminatans`
--
ALTER TABLE `peminatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon_mahasiswas`
--
ALTER TABLE `calon_mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peminatans`
--
ALTER TABLE `peminatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `calon_mahasiswas`
--
ALTER TABLE `calon_mahasiswas`
  ADD CONSTRAINT `calon_mahasiswas_peminatan_id_foreign` FOREIGN KEY (`peminatan_id`) REFERENCES `peminatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `calon_mahasiswa_jurusan`
--
ALTER TABLE `calon_mahasiswa_jurusan`
  ADD CONSTRAINT `calon_mahasiswa_jurusan_calon_mahasiswa_id_foreign` FOREIGN KEY (`calon_mahasiswa_id`) REFERENCES `calon_mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calon_mahasiswa_jurusan_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `calon_mahasiswa_sub_kriteria`
--
ALTER TABLE `calon_mahasiswa_sub_kriteria`
  ADD CONSTRAINT `calon_mahasiswa_sub_kriteria_calon_mahasiswa_id_foreign` FOREIGN KEY (`calon_mahasiswa_id`) REFERENCES `calon_mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calon_mahasiswa_sub_kriteria_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD CONSTRAINT `jurusans_peminatan_id_foreign` FOREIGN KEY (`peminatan_id`) REFERENCES `peminatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurusan_sub_kriteria`
--
ALTER TABLE `jurusan_sub_kriteria`
  ADD CONSTRAINT `jurusan_sub_kriteria_jurusan_id_foreign` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurusan_sub_kriteria_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriterias` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriterias`
--
ALTER TABLE `sub_kriterias`
  ADD CONSTRAINT `sub_kriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
