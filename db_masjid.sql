-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 07:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(4, '2019_08_08_162556_table_zis_type', 2),
(7, '2014_10_12_100000_create_password_resets_table', 3),
(8, '2019_08_01_230612_create_permission_tables', 3),
(9, '2019_08_08_163048_tb_zis_type', 3),
(10, '2019_11_08_164354_alamat_jamaah', 4),
(12, '2020_04_21_221610_blog', 5),
(13, '2019_08_19_000000_create_failed_jobs_table', 6),
(15, '2020_04_29_015723_pengumuman', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 1),
(3, 'App\\User', 3),
(4, 'App\\User', 1),
(4, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Create Masjid Report', 'web', '2019-11-02 13:15:42', '2020-04-28 00:07:24'),
(2, 'Edit Masjid Report', 'web', '2019-11-02 13:22:37', '2020-04-28 00:07:39'),
(3, 'Soft Delete Masjid Report', 'web', '2019-11-02 13:22:55', '2020-04-28 00:09:09'),
(4, 'Permanent Delete Masjid Report', 'web', '2019-11-02 13:23:27', '2020-04-28 00:10:56'),
(5, 'Jamaah [CRUD]', 'web', '2019-11-02 13:23:48', '2020-04-28 00:18:48'),
(7, 'Administer roles & permissions', 'web', '2019-11-02 14:37:24', '2019-11-02 14:37:24'),
(8, 'Content', 'web', '2020-04-27 09:48:23', '2020-04-27 09:48:23'),
(9, 'Announcer', 'web', '2020-04-29 00:11:13', '2020-04-29 00:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2019-11-02 13:33:57', '2019-11-02 13:33:57'),
(2, 'Pengurus', 'web', '2019-11-02 13:44:02', '2019-11-02 13:44:02'),
(3, 'RIMYA', 'web', '2019-11-02 13:44:22', '2020-04-26 01:48:45'),
(4, 'Humas', 'web', '2020-04-27 09:49:08', '2020-04-27 09:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(7, 1),
(8, 1),
(8, 4),
(9, 1),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_alamat_jamaah`
--

CREATE TABLE `tb_alamat_jamaah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_alamat` int(3) NOT NULL,
  `kategori_jamaah` int(11) NOT NULL,
  `nama_pemilik` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `penginput` int(11) NOT NULL,
  `uuid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_alamat_jamaah`
--

INSERT INTO `tb_alamat_jamaah` (`id`, `kategori_alamat`, `kategori_jamaah`, `nama_pemilik`, `alamat`, `rt`, `rw`, `penginput`, `uuid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Nomor 1', 'Rumah Nomor 1', 1, 2, 1, '2da82cf9527d4b7da2f396db3e9f6022', '2019-11-14 13:59:27', '2019-11-21 08:00:58', '2019-11-21 08:00:58'),
(2, 1, 1, 'Nomor 2', 'Alamat Nomor 2', 3, 3, 1, 'aac7e077b95940e3a2803764e92949fd', '2019-11-14 14:01:24', '2020-04-09 15:27:00', '2020-04-09 15:27:00'),
(3, 1, 1, 'Nomor 3', 'Alamat Nomor 3', 1, 1, 1, 'b70c949c0c654c43be675756c39f9405', '2019-11-14 14:02:18', '2020-04-09 15:32:56', '2020-04-09 15:32:56'),
(4, 1, 1, 'nyalain fillable', 'alamat nyalain fillable', 2, 1, 1, '1157b30c689e4f15be6a62515e17294f', '2019-11-15 00:53:17', '2020-05-01 10:11:14', '2020-05-01 10:11:14'),
(5, 1, 1, 'balikin normal', 'alamat normal', 2, 2, 1, 'dc7e50b667c34f14b26e7cf1736f473d', '2019-11-15 01:05:42', '2019-11-21 08:10:32', NULL),
(6, 2, 1, 'balikin normal 2', 'normal 2', 1, 1, 1, '6348e9d59aa047b292bc97d9ea0234cb', '2019-11-15 01:08:11', '2019-11-21 07:48:07', NULL),
(7, 1, 1, 'Blok', 'alamt blok', 1, 1, 1, '031b969ba7dc440a80096ad0890f1487', '2019-11-15 01:36:49', '2019-11-21 08:08:32', '2019-11-21 08:08:32'),
(8, 2, 1, 'balikin normal x', 'normal 2', 1, 1, 1, '6348e9d59aa047b292bc97d9ea0234cb', '2019-11-15 01:08:11', '2019-11-21 08:28:13', NULL),
(9, 1, 1, 'Blok x', 'alamt blok', 1, 1, 1, '031b969ba7dc440a80096ad0890f1487', '2019-11-15 01:36:49', '2019-11-21 08:27:41', NULL),
(10, 1, 1, 'kepala jamaah x', 'jl. dlem komplek', 9, 10, 1, '11c0ea0b3eeb4f47b599173add760080', '2020-01-07 08:08:15', '2020-01-07 08:09:16', '2020-01-07 08:09:16'),
(11, 1, 1, 'Manusia Ikan', 'jlin aja dulu', 2, 2, 1, '75777aa2632f4f6eba9fd08753629962', '2020-04-04 13:53:16', '2020-04-04 13:53:16', NULL),
(12, 2, 1, 'Data External', 'disono jauh', 2, 4, 1, 'b1d09dbf5bd94d04b99412950cc84883', '2020-04-09 15:33:43', '2020-04-09 15:33:43', NULL),
(13, 1, 1, 'Kanko', 'b3/23', 12, 13, 1, 'c0bf45a77a6046ca945eff5824a255b0', '2020-05-01 09:54:45', '2020-05-01 09:54:45', NULL),
(14, 1, 1, 'Bewjo', 'e2/3', 1, 13, 1, 'c0fcd42ff70741748f44fc2e937e4ef6', '2020-05-01 09:57:26', '2020-05-01 10:07:16', '2020-05-01 10:07:16'),
(15, 1, 1, 'Genji', 'b2/3', 10, 13, 1, '08b9574da9934971b1f70c5b712f182b', '2020-05-01 10:08:58', '2020-05-01 10:09:02', '2020-05-01 10:09:02'),
(16, 1, 2, 'Genji', 'b2/3', 10, 13, 1, 'd6230274391c434ab67443f39f05cbdf', '2020-05-01 10:10:34', '2020-05-01 10:10:34', NULL),
(17, 1, 3, 'Serizawa', 'Gembel', 10, 13, 1, 'dbfcfdc25356425a9d2e8ced30e59c8a', '2020-05-01 10:11:02', '2020-05-01 10:11:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id`, `gambar`, `judul`, `isi`, `slug`, `penulis`, `created_at`, `updated_at`) VALUES
(1, 'daengweb-1587651893.jpg', 'awdawd', '<p>wawdadaw</p>', 'awdawd', 2, '2020-04-23 07:24:54', '2020-04-23 07:24:54'),
(2, 'daengweb-1587652265.jpg', 'lagi dong', '<p>lagi</p>', 'lagi-dong', 3, '2020-04-23 07:31:06', '2020-04-23 07:31:06'),
(3, 'blog-tmbn-1587652697.jpg', 'tambah', '<p>awdadaw</p>', 'tambah', 1, '2020-04-23 07:38:17', '2020-04-23 07:38:17'),
(4, 'blog-tmbn-1587652697.jpg', 'awdawd', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'awdawd-1', 2, '2020-04-23 07:40:26', '2020-04-23 07:40:26'),
(5, 'blog-tmbn-1587652697.jpg', 'aa', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'aa', 1, '2020-04-23 07:53:09', '2020-04-23 07:53:09'),
(6, 'blog-tmbn-1587656310.jpg', 'Pengajian Malam Minggu', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'pengajian-malam-minggu', 1, '2020-04-23 08:38:30', '2020-04-23 08:38:30'),
(7, 'tmbnail.jpg', 'Pengajian Malam Minggu', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'awdad', 1, '2020-04-23 09:22:45', '2020-04-23 09:22:45'),
(8, 'tmbnail.jpg', 'Jika gambar tidak ada maka', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is Kosong gambarne simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'jika-gambar-tidak-ada-maka', 1, '2020-04-23 09:23:40', '2020-04-23 09:23:40'),
(9, 'tmbnail.jpg', 'ada gambar', '<p>&lt;p&gt;&lt;strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"&gt;Lorem Ipsum&lt;/strong&gt;&lt;span style=\"color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;<br></p>', 'ada-gambar', 1, '2020-04-23 09:25:20', '2020-04-23 09:25:20'),
(10, 'tmbnail.jpg', 'ada gambar', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'ada-gambar-1', 1, '2020-04-23 09:26:37', '2020-04-23 09:26:37'),
(11, 'blog-tmbn-1587659353.jpg', 'Upload', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'aa-1', 1, '2020-04-23 09:29:13', '2020-04-23 09:29:13'),
(12, 'tmbnail.jpg', 'tidak upload', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'tidak-upload', 1, '2020-04-23 09:29:31', '2020-04-23 09:29:31'),
(13, 'blog-tmbn-1587694535.jpeg', 'Lorem Ipsum Dolor Sir Amet Mectaquar', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'lorem-ipsum-dolor-sir-amet-mectaquar', 1, '2020-04-23 19:15:35', '2020-04-23 19:15:35'),
(14, 'blog-tmbn-1587694786.jpg', 'Lorem Ipsum Dolor Sir Amet Mectaquar', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'lorem-ipsum-dolor-sir-amet-mectaquar-1', 1, '2020-04-23 19:19:46', '2020-04-23 19:19:46'),
(15, 'tmbnail.jpg', 'Lorem Ipsum Dolor Sir Amet Mectaquar', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>', 'lorem-ipsum-dolor-sir-amet-mectaquar-2', 1, '2020-04-23 19:20:14', '2020-04-23 19:20:14'),
(16, 'blog-tmbn-1587877701.jpg', 'By Zeynep Tufekci, Jeremy Howard, Trisha Greenhalgh', '<p id=\"7c35\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\"><em class=\"kk\" style=\"box-sizing: inherit;\">By Zeynep Tufekci, Jeremy Howard, Trisha Greenhalgh</em></p><p id=\"2e71\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">If you feel confused about whether people should wear masks and why and what kind, you’re not alone. COVID-19 is a novel disease and we’re learning new things about it every day. However, much of the confusion around masks stems from the conflation of two very different functions of masks.</p><p id=\"b158\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Masks can be worn to<em class=\"kk\" style=\"box-sizing: inherit;\">&nbsp;protect the wearer</em>&nbsp;from getting infected or masks can be worn to&nbsp;<em class=\"kk\" style=\"box-sizing: inherit;\">protect others</em>&nbsp;from being infected by the wearer. Protecting the wearer is difficult: It requires medical-grade respirator masks, a proper fit, and careful putting on and taking off. But masks can also be worn to prevent transmission to others, and this is their most important use for society. If we lower the likelihood of one person infecting another, the impact is exponential, so even a small reduction in those odds results in a huge decrease in deaths. Luckily, blocking transmission outward at the source is much easier. It can be accomplished with something as simple as a cloth mask.</p><p id=\"6be7\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">A key transmission route of COVID-19 is via droplets that fly out of our mouths — that includes when we speak, not just when we cough or sneeze. A portion of these droplets&nbsp;<a href=\"https://academic.oup.com/aje/article-abstract/20/3/611/280025\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">quickly evaporate</a>, becoming tiny particles whose inhalation by those nearby is hard to prevent. This is especially relevant for doctors and nurses who work with sick people all day. Medical workers are also at risk from procedures such as intubation, which generate very tiny particles that can float around, possibly for hours. That’s why their gear is called “personal protective equipment,” or PPE, and has stringent requirements for fit in order to stop&nbsp;<em class=\"kk\" style=\"box-sizing: inherit;\">ingress</em>&nbsp;— the term for the transmission of these outside particles to the wearer. Until now, most scientific research and discussion about masks has been directed at protecting medical workers from ingress.</p><p id=\"7302\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">But the opposite concern also exists:&nbsp;<em class=\"kk\" style=\"box-sizing: inherit;\">egress</em>, or transmission of particles from the wearer to the outside world. Historically, much less research has been conducted on egress, but controlling it — also known as “source control” — is crucial to stopping the person-to-person spread of a disease. Obviously, society-wide source control becomes very important during a pandemic. Unfortunately, many&nbsp;<a href=\"https://www.bbc.com/news/health-51205344\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">articles</a>&nbsp;<a href=\"https://twitter.com/zeynep/status/1252336027064307714\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">in the lay press</a>&nbsp;— and even some&nbsp;<a href=\"https://www.cebm.net/covid-19/covid-19-masks-on-or-off/\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">in the scientific press</a>&nbsp;— don’t properly distinguish between ingress and egress, thereby adding to the confusion.</p><p id=\"e49c\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The good news is that preventing transmission to others through egress is relatively easy. It’s like stopping gushing water from a hose right at the source, by turning off the faucet, compared with the difficulty of trying to catch all the drops of water after we’ve pointed the hose up and they’ve flown all over the place.&nbsp;<a href=\"https://www.preprints.org/manuscript/202004.0203/v1\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">Research shows</a>&nbsp;that even a cotton mask dramatically reduces the number of virus particles emitted from our mouths —&nbsp;<a href=\"https://www.nejm.org/doi/full/10.1056/NEJMc2007800\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">by as much as 99 percent</a>. This reduction provides two huge benefits. Fewer virus particles mean that people have a better chance of avoiding infection, and if they are infected,&nbsp;<a href=\"https://www.thelancet.com/journals/laninf/article/PIIS1473-3099(20)30196-1/fulltext\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">the lower viral exposure load</a>&nbsp;may give them a better<a href=\"https://www.thelancet.com/journals/laninf/article/PIIS1473-3099(20)30232-2/fulltext\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">&nbsp;chance</a>&nbsp;of contracting only&nbsp;<a href=\"https://nymag.com/intelligencer/2020/03/is-viral-load-key-to-understanding-coronaviruss-severity.html\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">a mild illness</a>.</p><p id=\"29c2\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">COVID-19 has been hard to control partly because people can infect others before they themselves display any symptoms — and even if they never develop any illness.&nbsp;<a href=\"https://www.nature.com/articles/s41591-020-0869-5\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">Three</a>&nbsp;<a href=\"https://wellcomeopenresearch.org/articles/5-58\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">recent</a>&nbsp;<a href=\"https://medrxiv.org/content/10.1101/2020.03.05.20031815v1\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">studies</a>&nbsp;show that nearly half of patients are infected by people who aren’t coughing or sneezing yet. Many people have no awareness of the risk they pose to others, because they don’t feel sick themselves, and many may never&nbsp;<a href=\"https://www.navytimes.com/news/coronavirus/2020/04/16/secdef-majority-of-roosevelt-sailors-with-covid-19-are-asymptomatic-flattop-still-wartime-ready\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">become overtly ill</a>.</p><p id=\"4683\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Think of the coronavirus pandemic as a fire ravaging our cities and towns that is spread by infected people breathing out invisible embers every time they speak, cough, or sneeze. Sneezing is the most dangerous — it spreads embers farthest — coughing second, and speaking least, though it still can spread these embers. These invisible sparks cause others to catch fire and in turn breathe out embers until we truly catch fire — and get sick. That’s when we call in the firefighters — our medical workers. The people who run into these raging blazes to put them out need special heat-resistant suits and gloves, helmets, and oxygen tanks so they can keep breathing in the fire — all that PPE, with proper fit too.</p><p id=\"30ee\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">If we could just keep our embers from being sent out every time we spoke or coughed, many fewer people would catch fire. Masks help us do that. And because we don’t know for sure who’s sick, the only solution is for everyone to wear masks. This eventually benefits the wearer because fewer fires mean we’re all less likely to be burned.&nbsp;<em class=\"kk\" style=\"box-sizing: inherit;\">My mask protects you; your masks protect me.</em>&nbsp;Plus, our firefighters would no longer be overwhelmed, and we could more easily go back to work and the rest of our public lives.</p><p id=\"3e0f\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">To better understand what level of mask-wearing we need in the population to get this pandemic under control, we assembled a transdisciplinary team of 19 experts and looked at a range of mathematical models and other research to learn what would happen if most people wore a mask in public. We wrote and submitted&nbsp;<a href=\"https://www.preprints.org/manuscript/202004.0203/v1\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">an academic paper</a>&nbsp;as well as&nbsp;<a href=\"https://www.fast.ai/2020/04/13/masks-summary/\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">a layperson’s summary</a>. Every infectious disease has a reproduction rate, called R. When it’s 1.0, that means the average infected person infects one other person. The 1918 pandemic flu had an R of 1.8 — so one infected person infected, on average, almost two others. COVID-19’s rate, in the absence of measures such as social distancing and masks, is at least 2.4. A disease dies out if its R falls under 1.0. The lower the number, the faster it dies out.</p><p id=\"94bf\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The effectiveness of mask-wearing depends on three things: the basic reproduction number, R0, of the virus in a community; masks’ efficacy at blocking transmission; and the percentage of people wearing masks. The blue area of the graph below indicates an R0 below 1.0, the magic number needed to make the disease die out.</p><p id=\"6c62\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Models show that if 80 percent of people wear masks that are 60 percent effective,&nbsp;<a href=\"https://www.nejm.org/doi/full/10.1056/NEJMc2007800\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">easily achievable</a>&nbsp;with cloth, we can get to an effective R0 of less than one. That’s enough to halt the spread of the disease. Many countries already have more than 80 percent of their population wearing masks in public, including countries such as Hong Kong, where most stores deny entry to unmasked customers, and the more than 30 countries that legally require masks in public spaces, such as Israel, Singapore, and the Czech Republic. Mask use in combination with physical distancing is even more powerful.</p><p id=\"6c62\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\"><img src=\"https://miro.medium.com/max/1400/1*Xl_huI2LfdzGlJhf48AQ1Q.png\" alt=\"\"><br></p><p id=\"a6b2\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">While cloth masks are sufficient for protecting others, people who are immunocompromised or those who have a few left over from fire season or hobbies may be considering wearing N95s, to better protect themselves.&nbsp;<mark class=\"pr ps lm\" style=\"box-sizing: inherit; cursor: pointer; background-color: rgb(255, 213, 194); color: currentcolor;\">One note of caution: Many nonmedical N95s have exhalation valves (to make them less stuffy to wear) that let out unfiltered air, and thus they won’t stop the wearer from infecting others — so they shouldn’t be worn around other people unless the valve is covered over with tape or cloth.</mark></p><p id=\"e9a5\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The community use of masks for source control is a “public good”: something we all contribute to that eventually benefits everyone — but only if almost everyone contributes, which can be a challenge to persuade people to do. It’s like emission filters in our car exhausts and chimneys: They need to be installed in all cars, factories, and houses to guarantee clean air for everyone. Usually, laws, regulations, mandates, or strong cultural norms ensure maximal participation. And once that happens, the result can be amazing.</p><p id=\"adc8\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">For example, in Hong Kong, only four confirmed deaths due to COVID-19 have been recorded since the beginning of the pandemic, despite high density, mass transportation, and proximity to Wuhan. Hong Kong’s health authorities&nbsp;<a href=\"https://twitter.com/lwcalex/status/1235091542219448321\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">credit</a>&nbsp;their citizens’ near-universal mask-wearing as a key factor (surveys show&nbsp;<a href=\"https://www.sciencedirect.com/science/article/pii/S2468266720300906\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">almost 100 percent voluntary compliance</a>). Similarly, Taiwan ramped up&nbsp;<a href=\"https://cdn.jamanetwork.com/ama/content_public/journal/jama/0/jvp200035supp1_prod.pdf?Expires=2147483647&amp;Signature=bIZCLS7ZLWTJd~U~H40JgiEGdFb3ggVUJpBvJ7KdANK7HgK1zaj4uWHvqweGym1nWfO~nXt9Y5i1vX79pF7zjjqfzmJAy3udTdpVVZQe07xnQIPcBMXLwZ5XjgTO8yKFXVIpxsXhrmOu8sGSpKiEmQ86ZCKfOTar7fMAGmUCtjiYVFwf31K3REWAA-r3hZyoZpqz3QKpVgpsRpF9fV9thQCq0~yvbvRKTH4PcoB~CZgmXH7rpVb6bILXQn5zBCphf6pyLAa4zIebUEKfCdCYdSdi9LeIEUsesqsYpNWgHJcr4K1LC0hFlst0RHQz-vZ7I-OvrX~5jel6zjjtuDQzjQ__&amp;Key-Pair-Id=APKAIE5G5CRDK6RD3PGA\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">mask production early on</a>&nbsp;and distributed masks to the population, mandating their use in public transit and recommending their use in other public places — a recommendation that&nbsp;<a href=\"https://www.eastasiaforum.org/2020/04/02/lessons-from-taiwans-coronavirus-response/\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">has been widely complied with</a>. The country continues to function fully, and their schools have been open since the end of February, while their death total remains very low, at only six. In the Czech Republic, masks were not used during the initial outbreak, but after a grassroots campaign led to a government mandate on March 18, masks in public became ubiquitous. The results took a while to be reflected in&nbsp;<a href=\"https://onemocneni-aktualne.mzcr.cz/covid-19\" class=\"cn dq ju jv jw jx\" target=\"_blank\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(0, 0, 0, 0.84)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">the official statistics</a>: The first five days of April still saw an average of 257 new cases and nine deaths per day, but the most recent five days of data show an average of 120 new cases and five deaths per day. Of course, we can’t know for sure to what degree these success stories are due to masks, but we do know that in every region that has adopted widespread mask-wearing, case and death rates have been reduced within a few weeks.</p><p id=\"b96c\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">We know a vaccine may take years, and in the meantime, we will need to find ways to make our societies function as safely as possible. Our governments can and should do much — make tests widely available, fund research, ensure medical workers have everything they need. But ordinary people are not helpless; in fact, we have more power than we realize. Along with keeping our distance whenever possible and maintaining good hygiene, all of us wearing just a cloth mask could help stop this pandemic in its tracks.</p><p id=\"b96c\" class=\"jy jz da bq ka b gn kb gp kc kd ke kf kg kh ki kj fn\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgba(0, 0, 0, 0.84); word-break: break-word; line-height: 1.58; letter-spacing: -0.004em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Source :&nbsp;<a href=\"https://medium.com/the-atlantic/the-real-reason-to-wear-a-mask-e6405abbc484\" style=\"background-color: rgb(255, 255, 255); font-family: Nunito, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;, &quot;Noto Color Emoji&quot;; font-size: 1rem;\">https://medium.com/the-atlantic/the-real-reason-to-wear-a-mask-e6405abbc484</a></p>', 'by-zeynep-tufekci-jeremy-howard-trisha-greenhalgh', 1, '2020-04-25 22:08:22', '2020-04-25 22:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_jamaah`
--

CREATE TABLE `tb_data_jamaah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_alamat_jamaah` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `penginput` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_data_jamaah`
--

INSERT INTO `tb_data_jamaah` (`id`, `id_alamat_jamaah`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `penginput`, `uuid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, '5', 'ssr', 2, '1333-03-03', 1, 'bc9c9986fe79445abf95582382c66072', '2019-11-21 08:11:19', '2019-11-21 08:11:19', NULL),
(15, '5', 'geger', 2, '2223-03-03', 1, 'bedafb7a6a6a40b3bcd7c81ead2c413f', '2019-11-21 08:11:27', '2019-11-21 08:11:27', NULL),
(16, '5', 'uio', 2, '1990-06-06', 1, '08afac12f57a48fd82a56613fa9bf30e', '2019-11-21 08:11:37', '2019-11-21 08:11:37', NULL),
(17, '5', 'Lo', 2, '1995-08-08', 1, '93d67f44b7f64623b720e15b91787c84', '2019-11-21 08:11:53', '2019-11-21 08:11:53', NULL),
(18, '8', 'geger', 2, '2223-03-03', 1, 'bedafb7a6a6a40b3bcd7c81ead2c413f', '2019-11-21 08:11:27', '2019-11-21 08:28:13', '2019-11-21 08:28:13'),
(19, '8', 'geger 1', 2, '2223-03-03', 1, 'bedafb7a6a6a40b3bcd7c81ead2c413f', '2019-11-21 08:11:27', '2019-11-21 08:28:13', '2019-11-21 08:28:13'),
(22, '5', 'geger 9', 2, '2223-03-03', 1, 'bedafb7a6a6a40b3bcd7c81ead2c413f', '2019-11-21 08:11:27', '2019-11-29 10:16:36', '2019-11-29 10:16:36'),
(23, '3', 'kepala 3', 1, '1990-02-02', 1, '993332305483467599a65b3c6c102e18', '2019-11-21 08:39:02', '2020-04-09 15:32:56', '2020-04-09 15:32:56'),
(24, '3', 'erqq', 1, '2122-02-02', 1, 'e177dd1200f543ae9046a0b1d8ad2f55', '2019-11-21 08:41:03', '2020-04-09 15:32:56', '2020-04-09 15:32:56'),
(25, '2', 'bapak nomor 2', 1, '1997-02-02', 1, '45d49f2bc8764e17866b74bf9509e9de', '2019-11-23 09:55:36', '2020-04-09 15:26:57', '2020-04-09 15:26:57'),
(26, '9', 'Bapak Manusia X', 1, '1990-02-20', 1, '9a1ed4798efd41078f591e535e74b856', '2019-11-29 10:09:58', '2019-11-29 10:09:58', NULL),
(27, '10', 'anak segiro ramos', 1, '1997-08-01', 1, '48dde436070f4acb8cb9ab1c4c32029f', '2020-01-07 08:08:30', '2020-01-07 08:09:16', '2020-01-07 08:09:16'),
(28, '11', 'Isiti Manusia Ikan', 2, '1989-08-08', 1, 'b4aa47ad6b4d41b683ac8855a9e75c08', '2020-04-04 13:53:46', '2020-04-04 13:53:46', NULL),
(29, '12', 'Bapaknya', 1, '1990-03-08', 1, 'e87e44ac55a24849986d2de53eac0604', '2020-04-09 15:35:32', '2020-04-09 15:35:32', NULL),
(30, '14', 'Bewjo', 1, '1998-12-05', 1, '4fa2fe1e7f874d8abd2544c55a90bf73', '2020-05-01 09:58:19', '2020-05-01 10:07:16', '2020-05-01 10:07:16'),
(31, '14', 'Umi', 2, '1999-02-05', 1, '3f279d03aab048dd86aa65fd6bbcbdcf', '2020-05-01 09:59:46', '2020-05-01 10:07:16', '2020-05-01 10:07:16'),
(32, '13', 'Kanko', 1, '1990-10-21', 1, '3d4d10f8e72c4b6182a850ff21eadf4e', '2020-05-01 10:11:39', '2020-05-01 10:11:39', NULL),
(33, '13', 'Kanki', 1, '1993-10-02', 1, '2091268597f9473099cb67f9404a794f', '2020-05-01 10:11:52', '2020-05-01 10:11:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas_penerimaan`
--

CREATE TABLE `tb_kas_penerimaan` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `penerimaan` int(32) NOT NULL,
  `pj` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kas_penerimaan`
--

INSERT INTO `tb_kas_penerimaan` (`id`, `keterangan`, `catatan`, `penerimaan`, `pj`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jamaah Depan Masjid', 'Coba lagi bor', 150000, 1, '2018-03-02 17:52:58', '2020-04-28 08:14:34', NULL),
(2, 'Dari jamaah Ganteng 2', 'coba kasih catatan', 200000, 1, '2020-03-04 17:54:17', '2020-04-28 08:07:08', NULL),
(3, '-', NULL, 0, 1, '2020-04-04 19:32:39', '2020-05-05 07:11:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kas_pengeluaran`
--

CREATE TABLE `tb_kas_pengeluaran` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `pengeluaran` int(32) NOT NULL,
  `pj` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kas_pengeluaran`
--

INSERT INTO `tb_kas_pengeluaran` (`id`, `keterangan`, `catatan`, `pengeluaran`, `pj`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pembelian Cat Tembok Nipon', 'cat tembok merka Nipon 25 kg', 100000, 1, '2020-04-04 00:00:00', '2020-04-28 15:31:56', NULL),
(2, 'Kuas', 'Merek Bahlul', 30000, 1, '2020-04-04 00:00:00', '2020-04-04 00:00:00', NULL),
(3, 'Kuas', 'Merek Bahlul', 30000, 1, '2020-04-04 00:00:00', '2020-04-04 00:00:00', NULL),
(4, 'Beli Bambu', NULL, 100000, 1, '2020-04-04 21:25:30', '2020-04-04 21:25:30', NULL),
(5, 'Beli Cable ties', NULL, 20000, 1, '2020-04-04 21:26:20', '2020-04-04 21:26:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_pengumuman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id`, `uuid`, `judul_pengumuman`, `deskripsi`, `penulis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'b566cbbecc7b408f84d8bd2db585d6a3', 'ini judul nya', 'ini isi', 1, '2020-04-28 19:31:30', '2020-04-28 22:53:20', NULL),
(2, '7c709f539e7840ae88002bfc0f1dc6c7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industrynya', 'ini judulnya awadek', 1, '2020-04-28 19:32:10', '2020-04-29 01:02:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_qurban_penerimaan`
--

CREATE TABLE `tb_qurban_penerimaan` (
  `id` int(11) NOT NULL,
  `jenis_hewan` int(1) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `nama_lain` longtext DEFAULT NULL,
  `permintaan` longtext DEFAULT NULL,
  `nomor_handphone` varchar(30) DEFAULT NULL,
  `disaksikan` int(1) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `penerima` int(11) NOT NULL,
  `hijri` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_qurban_penerimaan`
--

INSERT INTO `tb_qurban_penerimaan` (`id`, `jenis_hewan`, `atas_nama`, `alamat`, `nama_lain`, `permintaan`, `nomor_handphone`, `disaksikan`, `keterangan`, `penerima`, `hijri`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sm', 's1/3', 's', NULL, '2', 1, NULL, 1, '1439-12-25', '2019-08-22 17:00:00', '2019-08-22 17:00:00'),
(2, 2, 'san', 'b2/1', 's', NULL, '12', 0, NULL, 1, '1439-12-25', '2019-08-22 17:00:00', '2019-08-22 17:00:00'),
(3, 3, 'Irsad Setiawan', 'Ds. Suryo No. 170, Tangerang Selatan 78313, NTT', NULL, NULL, NULL, 0, NULL, 1, '1439-12-25', '2019-08-09 05:24:47', NULL),
(4, 1, 'Olivia Kuswandari', 'Ds. Baranang No. 250, Banda Aceh 77068, KalSel', NULL, NULL, NULL, 1, NULL, 2, '1440-12-25', '2019-08-22 18:43:45', NULL),
(5, 2, 'Cahyono Tasdik Saptono', 'Ds. Dago No. 214, Langsa 88867, KalBar', NULL, NULL, NULL, 0, NULL, 1, '1440-12-25', '2019-08-16 14:52:17', NULL),
(6, 3, 'Kawaca Limar Saragih', 'Dk. Babadan No. 957, Pasuruan 11681, KalTim', NULL, NULL, NULL, 1, NULL, 4, '1440-12-25', '2019-08-18 13:12:50', NULL),
(7, 1, 'Najam Saefullah S.E.I', 'Psr. Baranang No. 392, Prabumulih 44441, DKI', NULL, NULL, NULL, 1, NULL, 1, '1441-12-25', '2019-08-18 03:20:47', NULL),
(8, 3, 'Nadia Wulandari', 'Psr. Fajar No. 791, Pekanbaru 10409, NTB', 'Samsudin, mahmoed, butuyun', NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-07-25 01:05:47', NULL),
(9, 1, 'Kiandra Riyanti', 'Ki. Gegerkalong Hilir No. 25, Bengkulu 75139, Bali', NULL, NULL, NULL, 0, NULL, 3, '1441-12-25', '2019-08-17 20:33:48', NULL),
(10, 3, 'Harjasa Ridwan Sirait', 'Jr. Bakit  No. 864, Bandung 52963, NTT', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-07-25 11:28:46', NULL),
(11, 3, 'Daniswara Edi Kurniawan S.Kom', 'Jln. Bara No. 267, Balikpapan 72033, Lampung', NULL, NULL, NULL, 0, NULL, 2, '1441-12-25', '2019-07-24 19:23:29', NULL),
(12, 2, 'Kamidin Saefullah', 'Jln. Kalimalang No. 792, Padangpanjang 13127, NTT', NULL, NULL, NULL, 0, NULL, 2, '1441-12-25', '2019-08-17 02:45:49', NULL),
(13, 3, 'Syahrini Kamila Usamah S.Pt', 'Jr. Siliwangi No. 964, Pekanbaru 68398, Papua', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-05 22:09:45', NULL),
(14, 1, 'Jumari Mahesa Damanik S.Sos', 'Psr. Imam No. 983, Gunungsitoli 57961, KalTeng', NULL, NULL, NULL, 1, NULL, 3, '1441-12-25', '2019-07-23 20:53:20', NULL),
(15, 2, 'Jamal Wasita S.Sos', 'Psr. Sutarjo No. 241, Bukittinggi 16525, KalBar', NULL, NULL, NULL, 1, NULL, 5, '1441-12-25', '2019-08-02 12:24:29', NULL),
(16, 3, 'Tira Laksmiwati S.E.I', 'Kpg. Suryo Pranoto No. 547, Tanjung Pinang 56930, Gorontalo', NULL, NULL, NULL, 1, NULL, 3, '1441-12-25', '2019-08-16 17:28:11', NULL),
(17, 1, 'Dimas Utama', 'Kpg. Yohanes No. 45, Payakumbuh 36278, SulBar', NULL, NULL, NULL, 1, NULL, 1, '1441-12-25', '2019-07-28 18:00:33', NULL),
(18, 1, 'Cemeti Anggriawan', 'Psr. Laswi No. 391, Salatiga 54906, SulBar', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-08-22 01:16:13', NULL),
(19, 2, 'Zamira Padma Rahimah S.H.', 'Kpg. Diponegoro No. 685, Banjar 81839, NTB', NULL, NULL, NULL, 1, NULL, 1, '1441-12-25', '2019-08-01 03:01:21', NULL),
(20, 1, 'Akarsana Damanik', 'Jr. Cikutra Barat No. 11, Bukittinggi 53919, DKI', NULL, NULL, NULL, 0, NULL, 1, '1441-12-25', '2019-08-08 15:13:58', NULL),
(21, 2, 'Almira Yuni Hasanah', 'Ds. Babah No. 261, Pematangsiantar 12273, JaTeng', NULL, NULL, NULL, 0, NULL, 1, '1441-12-25', '2019-08-20 13:34:17', NULL),
(22, 1, 'Ibrahim Sinaga', 'Gg. Setia Budi No. 781, Palembang 33339, SulTra', NULL, NULL, NULL, 1, NULL, 3, '1441-12-25', '2019-08-04 11:30:48', NULL),
(23, 1, 'Jasmin Mulyani S.H.', 'Gg. Banda No. 289, Depok 52188, DKI', NULL, NULL, NULL, 1, NULL, 1, '1441-12-25', '2019-08-02 23:35:31', NULL),
(24, 3, 'Mulyono Hutagalung', 'Ds. Pacuan Kuda No. 940, Cimahi 40286, BaBel', NULL, NULL, NULL, 1, NULL, 2, '1441-12-25', '2019-07-31 00:58:54', NULL),
(25, 2, 'Hadi Garan Habibi', 'Gg. Astana Anyar No. 476, Bekasi 76172, KepR', NULL, NULL, NULL, 0, NULL, 2, '1441-12-25', '2019-08-07 22:42:28', NULL),
(26, 1, 'Lembah Adika Mustofa S.Sos', 'Ds. Gotong Royong No. 769, Palopo 63270, Lampung', NULL, NULL, NULL, 1, NULL, 2, '1441-12-25', '2019-08-22 18:51:18', NULL),
(27, 2, 'Mumpuni Natsir M.TI.', 'Gg. Wahidin Sudirohusodo No. 875, Serang 19202, SumBar', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-08-02 09:30:56', NULL),
(28, 2, 'Vanesa Utami', 'Psr. Gatot Subroto No. 557, Tidore Kepulauan 20774, SumSel', NULL, NULL, NULL, 1, NULL, 3, '1441-12-25', '2019-08-21 09:46:01', NULL),
(29, 3, 'Silvia Hartati', 'Dk. K.H. Wahid Hasyim (Kopo) No. 717, Lubuklinggau 91643, JaTeng', NULL, NULL, NULL, 0, NULL, 3, '1441-12-25', '2019-07-27 03:36:46', NULL),
(30, 2, 'Kunthara Bambang Kusumo', 'Jr. Honggowongso No. 399, Metro 87581, NTT', NULL, NULL, NULL, 0, NULL, 2, '1441-12-25', '2019-08-03 07:16:28', NULL),
(31, 1, 'Ratih Puspasari', 'Dk. Padma No. 634, Binjai 88729, Papua', NULL, NULL, NULL, 0, NULL, 3, '1441-12-25', '2019-08-04 08:54:31', NULL),
(32, 1, 'Galih Tarihoran', 'Psr. Gardujati No. 799, Bitung 92397, Aceh', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-20 01:14:27', NULL),
(33, 1, 'Hamima Maimunah Laksmiwati S.IP', 'Kpg. Bawal No. 245, Yogyakarta 76943, KalSel', NULL, NULL, NULL, 1, NULL, 1, '1441-12-25', '2019-07-25 12:14:40', NULL),
(34, 2, 'Wakiman Hidayanto S.IP', 'Gg. Sukabumi No. 3, Binjai 76618, KalTeng', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-19 22:40:18', NULL),
(35, 1, 'Anita Usada', 'Psr. Reksoninten No. 436, Banjarbaru 75261, Papua', NULL, NULL, NULL, 0, NULL, 3, '1441-12-25', '2019-08-03 05:28:08', NULL),
(36, 1, 'Danuja Budiyanto', 'Gg. Tentara Pelajar No. 694, Balikpapan 88194, KalBar', NULL, NULL, NULL, 0, NULL, 2, '1441-12-25', '2019-08-23 06:42:10', NULL),
(37, 3, 'Kamidin Sinaga', 'Ds. Bhayangkara No. 704, Subulussalam 89586, KepR', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-07-24 03:59:41', NULL),
(38, 2, 'Kayla Suci Hasanah S.Psi', 'Kpg. Wora Wari No. 867, Tangerang Selatan 62939, JaBar', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-01 23:13:43', NULL),
(39, 2, 'Nardi Prasasta', 'Kpg. Baranangsiang No. 202, Pekalongan 74574, KalBar', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-08-05 10:53:11', NULL),
(40, 1, 'Jabal Prakasa', 'Ki. M.T. Haryono No. 248, Pariaman 19379, Aceh', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-16 18:37:08', NULL),
(41, 2, 'Safina Padma Usada', 'Gg. Badak No. 101, Padangpanjang 27431, SumUt', NULL, NULL, NULL, 0, NULL, 1, '1441-12-25', '2019-07-30 19:20:16', NULL),
(42, 2, 'Hilda Maryati', 'Jr. Sampangan No. 85, Kotamobagu 49570, JaTeng', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-05 18:02:51', NULL),
(43, 3, 'Ganjaran Iswahyudi', 'Jln. Agus Salim No. 629, Lubuklinggau 68757, BaBel', NULL, NULL, NULL, 1, NULL, 5, '1441-12-25', '2019-07-24 05:24:14', NULL),
(44, 1, 'Lukita Hutagalung', 'Gg. Surapati No. 901, Payakumbuh 33204, KalTim', NULL, NULL, NULL, 0, NULL, 2, '1441-12-25', '2019-08-10 08:11:27', NULL),
(45, 3, 'Cemeti Balapati Ramadan S.T.', 'Dk. Radio No. 748, Palopo 30927, DIY', NULL, NULL, NULL, 0, NULL, 3, '1441-12-25', '2019-07-30 04:18:06', NULL),
(46, 3, 'Ghaliyati Padmasari', 'Ki. Bakhita No. 769, Palangka Raya 13708, SumUt', NULL, NULL, NULL, 0, NULL, 1, '1441-12-25', '2019-08-15 08:13:40', NULL),
(47, 2, 'Danu Sitorus S.T.', 'Psr. Sutami No. 452, Administrasi Jakarta Utara 22135, Maluku', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-07-31 01:43:39', NULL),
(48, 2, 'Liman Hidayanto S.IP', 'Gg. Bambu No. 105, Bima 47193, Lampung', NULL, NULL, NULL, 1, NULL, 4, '1441-12-25', '2019-08-04 07:18:35', NULL),
(49, 1, 'Titin Mayasari', 'Dk. Sukabumi No. 95, Pagar Alam 52708, SulBar', NULL, NULL, NULL, 1, NULL, 5, '1441-12-25', '2019-08-07 22:57:43', NULL),
(50, 2, 'Jindra Garang Halim', 'Jln. Jagakarsa No. 874, Denpasar 81747, Gorontalo', NULL, NULL, NULL, 1, NULL, 5, '1441-12-25', '2019-08-17 08:16:42', NULL),
(51, 3, 'Ika Raisa Nurdiyanti S.E.', 'Jln. Basudewo No. 603, Administrasi Jakarta Barat 72094, PapBar', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-07-27 20:13:31', NULL),
(52, 1, 'Elisa Anggraini M.Farm', 'Jr. Umalas No. 898, Jambi 83550, KalSel', NULL, NULL, NULL, 0, NULL, 3, '1441-12-25', '2019-08-19 05:00:32', NULL),
(53, 2, 'Bahuwirya Tamba', 'Ds. Raden Saleh No. 144, Balikpapan 59808, SumUt', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-21 00:59:38', NULL),
(54, 1, 'Faizah Ajeng Farida', 'Dk. Ciwastra No. 147, Cirebon 97126, PapBar', NULL, NULL, NULL, 1, NULL, 3, '1441-12-25', '2019-07-26 13:00:13', NULL),
(55, 1, 'Umaya Budiman S.Sos', 'Ki. Kiaracondong No. 745, Administrasi Jakarta Selatan 20819, JaTeng', NULL, NULL, NULL, 0, NULL, 1, '1441-12-25', '2019-08-20 16:11:43', NULL),
(56, 2, 'Respati Saiful Haryanto S.Pt', 'Psr. Moch. Yamin No. 221, Banjarmasin 52070, SumUt', NULL, NULL, NULL, 1, NULL, 3, '1441-12-25', '2019-08-03 20:31:33', NULL),
(57, 2, 'Rini Nasyidah S.Pd', 'Kpg. Yosodipuro No. 526, Tasikmalaya 94144, NTB', NULL, NULL, NULL, 0, NULL, 5, '1441-12-25', '2019-08-12 21:24:00', NULL),
(58, 3, 'Daruna Marbun', 'Gg. Pacuan Kuda No. 886, Banjar 41201, MalUt', NULL, NULL, NULL, 1, NULL, 4, '1441-12-25', '2019-08-01 15:13:28', NULL),
(59, 2, 'Nova Lailasari S.Kom', 'Psr. Gardujati No. 620, Sawahlunto 17974, Riau', NULL, NULL, NULL, 1, NULL, 5, '1441-12-25', '2019-07-31 05:28:14', NULL),
(60, 2, 'Kamal Natsir S.IP', 'Dk. Gegerkalong Hilir No. 760, Tidore Kepulauan 85564, DKI', NULL, NULL, NULL, 0, NULL, 1, '1441-12-25', '2019-08-15 16:05:56', NULL),
(61, 3, 'Pia Nasyiah', 'Psr. Mulyadi No. 812, Denpasar 12846, KalBar', NULL, NULL, NULL, 1, NULL, 5, '1441-12-25', '2019-08-19 05:09:56', NULL),
(62, 2, 'Rahman Mahesa Marpaung', 'Psr. Jamika No. 874, Bengkulu 35095, JaBar', NULL, NULL, NULL, 0, NULL, 4, '1441-12-25', '2019-08-01 08:38:29', NULL),
(63, 1, 'Jenkinok', 'Sunter Karya B90 No 20', NULL, NULL, NULL, NULL, NULL, 2, '1441-03-05', '2019-11-02 10:19:15', '2019-11-02 10:19:15'),
(64, 1, 'a', 'a', 'a', 'a', NULL, NULL, NULL, 2, '1441-03-05', '2019-11-02 10:35:46', '2019-11-02 10:35:46'),
(65, 1, 'a', 'a', 'a', 'a', NULL, 1, NULL, 2, '1441-03-05', '2019-11-02 10:36:09', '2019-11-02 10:36:09'),
(66, 3, 'Sapi Babibu', 'Rumah Bapak Sapi Babibu', 'Sapi Babibu', 'Paha Belakang Sebelah Kanan', NULL, 1, NULL, 2, '1441-03-05', '2019-11-02 10:40:13', '2019-11-02 10:40:13'),
(67, 2, 'ad', 'ad', 'ad', 'ad', NULL, NULL, NULL, 2, '1441-03-05', '2019-11-02 11:13:04', '2019-11-02 11:13:04'),
(68, 1, 'Samsudin', '<table>\r\n  <tr>\r\n    <th>Company</th>\r\n    <th>Contact</th>\r\n    <th>Country</th>\r\n  </tr>\r\n  <tr>\r\n    <td>Alfreds Futterkiste</td>\r\n    <td>Maria Anders</td>\r\n    <td>Germany</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Centro comercial Moctezuma</td>\r\n    <td>Francisco Chang</td>\r\n    <td>Mexico</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Ernst Handel</td>\r\n    <td>Roland Mendel</td>\r\n    <td>Austria</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Island Trading</td>\r\n    <td>Helen Bennett</td>\r\n    <td>UK</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Laughing Bacchus Winecellars</td>\r\n    <td>Yoshi Tannamuri</td>\r\n    <td>Canada</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Magazzini Alimentari Riuniti</td>\r\n    <td>Giovanni Rovelli</td>\r\n    <td>Italy</td>\r\n  </tr>\r\n</table>', '<table>\r\n  <tr>\r\n    <th>Company</th>\r\n    <th>Contact</th>\r\n    <th>Country</th>\r\n  </tr>\r\n  <tr>\r\n    <td>Alfreds Futterkiste</td>\r\n    <td>Maria Anders</td>\r\n    <td>Germany</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Centro comercial Moctezuma</td>\r\n    <td>Francisco Chang</td>\r\n    <td>Mexico</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Ernst Handel</td>\r\n    <td>Roland Mendel</td>\r\n    <td>Austria</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Island Trading</td>\r\n    <td>Helen Bennett</td>\r\n    <td>UK</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Laughing Bacchus Winecellars</td>\r\n    <td>Yoshi Tannamuri</td>\r\n    <td>Canada</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Magazzini Alimentari Riuniti</td>\r\n    <td>Giovanni Rovelli</td>\r\n    <td>Italy</td>\r\n  </tr>\r\n</table>', '<table>\r\n  <tr>\r\n    <th>Company</th>\r\n    <th>Contact</th>\r\n    <th>Country</th>\r\n  </tr>\r\n  <tr>\r\n    <td>Alfreds Futterkiste</td>\r\n    <td>Maria Anders</td>\r\n    <td>Germany</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Centro comercial Moctezuma</td>\r\n    <td>Francisco Chang</td>\r\n    <td>Mexico</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Ernst Handel</td>\r\n    <td>Roland Mendel</td>\r\n    <td>Austria</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Island Trading</td>\r\n    <td>Helen Bennett</td>\r\n    <td>UK</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Laughing Bacchus Winecellars</td>\r\n    <td>Yoshi Tannamuri</td>\r\n    <td>Canada</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Magazzini Alimentari Riuniti</td>\r\n    <td>Giovanni Rovelli</td>\r\n    <td>Italy</td>\r\n  </tr>\r\n</table>', NULL, 1, NULL, 1, '1441-03-12', '2019-11-09 05:13:56', '2019-11-09 05:13:56'),
(69, 1, 'Kambing Item', 'Jl. aja dlu', NULL, 'gak ada\r\nyaudah', NULL, 1, NULL, 1, '1441-08-10', '2020-04-03 15:43:50', '2020-04-03 15:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_zis`
--

CREATE TABLE `tb_zis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuidq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zis_name` int(11) NOT NULL,
  `amil` int(11) NOT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lain` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_jiwa` int(11) NOT NULL,
  `uang` bigint(20) DEFAULT NULL,
  `uang_infaq` bigint(20) DEFAULT NULL,
  `jumlah_uang_shadaqoh` bigint(20) DEFAULT NULL,
  `beras` decimal(8,2) DEFAULT NULL,
  `beras_infaq` decimal(8,2) DEFAULT NULL,
  `beras_shadaqoh` decimal(8,2) DEFAULT NULL,
  `hijri` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_zis`
--

INSERT INTO `tb_zis` (`id`, `uuidq`, `zis_name`, `amil`, `atas_nama`, `nama_lain`, `jumlah_jiwa`, `uang`, `uang_infaq`, `jumlah_uang_shadaqoh`, `beras`, `beras_infaq`, `beras_shadaqoh`, `hijri`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, '1ede2665d4924116bec0d7c5f8ecb81f', 1, 2, 'da', 'w', 1, 100000, NULL, NULL, NULL, NULL, NULL, '1441-04-24', '2019-12-21 14:13:16', '2019-12-21 14:13:16', NULL),
(15, '319a317909fd4927be5094db785ce920', 2, 1, 'Kodok', NULL, 1, 230000, NULL, NULL, NULL, NULL, NULL, '1441-05-11', '2020-01-06 05:21:04', '2020-01-06 05:21:04', NULL),
(16, '5e71381a464145f388cff64242dcf7f4', 1, 1, 'Tanpa Nama', 'Kosong', 2, 10000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:34:28', '2020-01-07 07:34:28', NULL),
(17, 'afaa65a02beb42acb9aa2cdf83ac5c96', 1, 1, 'Kodok', NULL, 2, 30000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:35:31', '2020-01-07 07:35:31', NULL),
(18, '6286de5a34fc4f2997490d26135e7141', 1, 1, 'coba uuid', NULL, 2, 12000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:38:46', '2020-01-07 07:38:46', NULL),
(19, 'ddd91e5085d4497fa619111cbab91727', 1, 1, 'a', NULL, 2, 2000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:45:40', '2020-01-07 07:45:40', NULL),
(20, '5a8a4fe3cd3048878b296fa299bd91ea', 1, 1, 'coba uuid 2', NULL, 1, 10000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:48:21', '2020-01-07 07:48:21', NULL),
(21, '5cba160770a7439eabb8579abfc6b356', 1, 1, 'coba uuid 3', NULL, 2, 25000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:48:51', '2020-01-07 07:48:51', NULL),
(22, 'ec2bc987f19749a0b9b3664e850cc1b4', 1, 1, 'coba uuid 4', NULL, 2, 10000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:49:55', '2020-01-07 07:49:55', NULL),
(23, 'a6694d2c382846a0b6328a9d4211bad1', 1, 1, 'coba uuid 5', NULL, 2, 12000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:52:28', '2020-01-07 07:52:28', NULL),
(24, '4070b0a0b69445c2a45fedb9f0fbcec8', 1, 1, 'coba uuid 6', NULL, 2, 10, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:55:56', '2020-04-27 08:11:35', '2020-04-27 08:11:35'),
(25, 'be3f60be27fe4c8ebb43f0b62dde1b2a', 3, 1, 'coba uuid 6', NULL, 2, 10, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 07:55:57', '2020-01-07 07:55:57', NULL),
(26, 'b1848d9310784cefa513b8ad8b4a762f', 1, 1, 'balikin uuid', NULL, 2, 120000, NULL, NULL, NULL, NULL, NULL, '1441-05-12', '2020-01-07 09:56:26', '2020-01-07 09:56:26', NULL),
(27, '7978a445b1e34d05b83c68f29af3698a', 1, 1, 'Melik De esential', NULL, 2, 100000, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 02:34:15', '2020-03-07 02:34:15', NULL),
(28, 'ac874b18175a43b6bfd6c05bb868a6a8', 1, 1, '2', '2', 3, NULL, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 03:44:58', '2020-04-27 08:12:51', '2020-04-27 08:12:51'),
(29, '3f59b1f66eb54fba9c7c6f0d3e123359', 1, 1, 'oppo', NULL, 2, 10, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 03:48:38', '2020-04-27 08:13:50', '2020-04-27 08:13:50'),
(30, '07d612c8d2064411b3f216a7a12c4133', 1, 1, 'Kodok', '2', 2, 22, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 04:07:07', '2020-03-07 04:07:07', NULL),
(31, '54ebc5a5fb194744b5be00779616b740', 1, 1, 'pala kosong', NULL, 2, 21, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 04:37:19', '2020-03-07 04:37:19', NULL),
(32, 'c187d69d7eb8474ca446d81d858ae6b9', 1, 1, 'gak pake titik', NULL, 2, 270000, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 04:40:45', '2020-03-07 04:40:45', NULL),
(33, '8dee584d2fb94fb7a9bd13ce2e3d97cf', 1, 1, 'Kagebinzu', 'Keluara Kagebinzu', 10, 1000000, NULL, NULL, NULL, NULL, NULL, '1441-07-13', '2020-03-07 04:41:35', '2020-03-07 04:41:35', NULL),
(34, 'b59f3024eea840d1831ecf0c2c7167b0', 2, 1, 'Coba lagi udah lama gk nyoba', NULL, 2, 120000, 30000, NULL, '5.55', NULL, NULL, '1441-08-08', '2020-04-01 11:51:08', '2020-04-01 11:51:08', NULL),
(35, 'cc73f201a22b43e9bdcc4f6aca06080e', 1, 1, 'yailah', 'gk ada', 1, 5000, NULL, NULL, NULL, NULL, NULL, '1441-08-10', '2020-04-03 14:40:28', '2020-04-27 08:06:21', '2020-04-27 08:06:21'),
(36, '0383e4148ffd44738f3188ac1e10afe6', 2, 1, 'Kotak biru', NULL, 2, 1500000, NULL, NULL, NULL, NULL, NULL, '1441-08-10', '2020-04-03 15:07:15', '2020-04-03 15:07:15', NULL),
(37, '62d17806e6e14fdf89908fd549d0b08d', 1, 1, 'gak punya nama', NULL, 2, 100000, NULL, NULL, NULL, NULL, NULL, '1441-08-10', '2020-04-03 15:16:43', '2020-04-03 15:16:43', NULL),
(38, 'd66c78d54a9f4a728f838747a002a4a5', 1, 1, 'Kampang', 'gk', 2, 2000000, NULL, NULL, NULL, '3.00', NULL, '1441-09-03', '2020-04-25 08:27:40', '2020-04-25 08:27:40', NULL),
(39, '3cbff69b1ea2492c8b5a34d1b8859a0f', 1, 1, 'yailah', NULL, 3, 100000, NULL, NULL, NULL, NULL, NULL, '1441-09-03', '2020-04-25 08:35:51', '2020-04-25 08:35:51', NULL),
(40, 'd0a4b1fd93da41d69e46c9a61a2fffb7', 1, 1, 'abcd', 'abcd', 1, NULL, NULL, NULL, '5.00', NULL, NULL, '1441-09-03', '2020-04-25 08:56:00', '2020-04-25 08:56:00', NULL),
(41, 'e3abb272b0f9417b8a0361925207fff8', 3, 1, 'bcde Auah gelap', 'awdw', 1, 510000, NULL, NULL, '4.00', NULL, NULL, '1441-09-06', '2020-04-25 08:57:51', '2020-04-28 08:59:18', NULL),
(42, '76bb2f04562e4064900a80ec20b628aa', 1, 1, 'uuidq', 'uuidq', 2, NULL, NULL, NULL, '1.00', NULL, NULL, '1441-09-03', '2020-04-25 08:59:04', '2020-04-25 08:59:04', NULL),
(43, '5171c6580cdf44b4ab6b2c67c1b8b982', 1, 1, 'aw', 'aw', 2, NULL, NULL, NULL, NULL, '2.00', NULL, '1441-09-03', '2020-04-25 09:00:38', '2020-04-25 09:00:38', NULL),
(44, 'aee906e5cc5a4fa5b5f8e9acba898bf8', 1, 1, 'langsunbg', 'ni kangsu', 2, NULL, NULL, NULL, NULL, '3.00', NULL, '1441-09-03', '2020-04-25 09:05:11', '2020-04-25 09:05:11', NULL),
(45, '6daee400b60e448fae3275a3973e2bee', 2, 1, 'yailah', 'w', 1, NULL, NULL, NULL, '2.00', NULL, NULL, '1441-09-04', '2020-04-25 22:14:11', '2020-04-25 22:14:11', NULL),
(46, '36ebe708c29649dda915935ee4624ce3', 2, 1, 'yailah1', '2', 2, 200000, NULL, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-25 22:14:45', '2020-04-25 22:14:45', NULL),
(47, '329c0d656d974dc48c9122e611c0a556', 1, 1, 'coba 1', NULL, 2, 200000, NULL, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-25 23:12:29', '2020-04-25 23:12:29', NULL),
(48, '0b87cb88265341e8bf0adaf7288c5408', 1, 1, 'coba 2', '2', 2, 20000, NULL, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-25 23:35:03', '2020-04-25 23:35:03', NULL),
(49, '097aa31941a04d85a8927ecec36afda5', 1, 1, 'coba 3', 'gk ada', 2, NULL, 30, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-25 23:36:34', '2020-04-27 08:20:57', '2020-04-27 08:20:57'),
(50, '5c7e77a05f114269a890dfd5c9ad7132', 1, 1, 'coba beras aja', NULL, 2, NULL, NULL, NULL, '2.00', '2.00', NULL, '1441-09-04', '2020-04-25 23:40:28', '2020-04-25 23:40:28', NULL),
(51, '7aae2f886de24af7a4cfc41f773c3e01', 1, 1, 'coba 6', NULL, 2, 20, NULL, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-25 23:41:54', '2020-04-25 23:41:54', NULL),
(52, 'dc0dd08b51eb42ad95bab6f2450b8a8c', 1, 1, 'coba 7', NULL, 1, 30, NULL, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-25 23:48:45', '2020-04-25 23:48:45', NULL),
(53, '07b635d208134ceb929f33ff151b1aa4', 1, 1, 'namaaa', NULL, 2, NULL, NULL, NULL, '2.00', NULL, NULL, '1441-09-04', '2020-04-26 01:22:42', '2020-04-26 01:22:42', NULL),
(54, '1a3ee3a9d6f94967a9dd0aec76fc08a1', 1, 1, 'samsss', NULL, 2, NULL, NULL, NULL, '4.00', NULL, NULL, '1441-09-04', '2020-04-26 01:23:36', '2020-04-26 01:23:36', NULL),
(55, 'cf91d87f208848f59e4a4e27abcb1e32', 1, 1, 'sava', NULL, 3, NULL, NULL, NULL, '3.00', NULL, NULL, '1441-09-04', '2020-04-26 01:24:46', '2020-04-26 01:24:46', NULL),
(56, 'ff26b9d1101646c0aa98aa21fb042aeb', 1, 1, 'coba 2x', NULL, 1, NULL, 30000, NULL, '3.00', NULL, NULL, '1441-09-04', '2020-04-26 01:25:13', '2020-04-26 01:25:13', NULL),
(57, 'f1df2baadb7d472390954549876bd8fb', 2, 1, 'punya dd', NULL, 22, 1000, NULL, NULL, NULL, NULL, NULL, '1441-09-04', '2020-04-26 01:25:42', '2020-04-26 02:36:16', NULL),
(58, 'a1353e1cb76e41c8a3a0726358c0f7c1', 3, 3, 'Samsding', NULL, 2, 200000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:06:14', '2020-04-28 09:06:14', NULL),
(59, '22cecd40e9fa4b599a0091ba6944bced', 3, 3, 'yailah', 'Benrin eror', 2, 10000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:06:53', '2020-04-28 09:06:53', NULL),
(60, '2298642996d74938ac1d842070bef12d', 3, 3, 'lagi', 'wad', 2, 20000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:07:38', '2020-04-28 09:07:38', NULL),
(61, '805a014b0b5c4df1b35c1b691ee549d3', 1, 3, 'ini hasil dd', 'awdad', 2, 10000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:08:40', '2020-04-28 09:08:40', NULL),
(62, '93cef1b86544464a882a43bb9b1521d4', 1, 3, 'gak bener', NULL, 2, 10000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:09:22', '2020-04-28 09:09:22', NULL),
(63, '668f88b9a2654d3498869a3aa0b00492', 1, 3, 'ini hasil dd', 'aa', 2, 25000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:12:15', '2020-04-28 09:12:15', NULL),
(64, '480fe908acbe4c44a6171469f7e800ce', 2, 1, 'yailah', 'awdawda', 2, 2000000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:14:53', '2020-04-28 09:14:53', NULL),
(65, 'fab8dfc3eabb426696fbfcb24dd41733', 3, 1, 'yailah', 'a', 2, 2000000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:29:53', '2020-04-28 09:29:53', NULL),
(66, '8f2b7467fa7f4770b0faff2288596c39', 3, 1, 'Orang kaya bor', 'Gak ada', 1, NULL, NULL, NULL, '4.50', NULL, NULL, '1441-09-06', '2020-04-28 09:30:21', '2020-04-28 09:41:04', NULL),
(67, 'a7d2b04aa9cb44c698e87a63e8f74bbc', 1, 1, 'Samsudin dan anak', 'gakada', 2, 200000, NULL, NULL, NULL, NULL, NULL, '1441-09-06', '2020-04-28 09:37:16', '2020-04-28 09:39:46', NULL),
(68, '30627c2400be48ceb5443fe0bb1e5aa0', 1, 1, 'Bejo', 'Gk ada', 2, NULL, NULL, NULL, '3.50', NULL, NULL, '1441-09-13', '2020-05-05 00:27:15', '2020-05-05 00:27:15', NULL),
(69, '2045a0d1e39d4eccb3468bd00bc29139', 1, 1, 'hos', 'aw', 2, NULL, NULL, NULL, '3.40', NULL, NULL, '1441-09-13', '2020-05-05 07:32:17', '2020-05-05 07:32:17', NULL),
(70, '1e3006ed37f64d928e95ea94aa92c404', 1, 1, 'kosong dah', 'osong', 2, 0, NULL, NULL, NULL, NULL, NULL, '1441-09-13', '2020-05-05 07:41:46', '2020-05-05 07:41:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_zis_type`
--

CREATE TABLE `tb_zis_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zis_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_zis_type`
--

INSERT INTO `tb_zis_type` (`id`, `zis_name`, `created_at`, `updated_at`) VALUES
(1, 'Zakat Fitrah', '2019-08-23 17:00:00', '2019-08-23 17:00:00'),
(2, 'Zakat Mall', '2019-08-23 17:00:00', '2019-08-23 17:00:00'),
(3, 'Fidyah', '2019-08-23 17:00:00', '2019-08-23 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@admin.com', NULL, '$2y$10$ePsuZ8j.O8tKiH5odyg5c.YnQHHlnasB8rkhV7pyGuGSC2TubDWYO', NULL, '2019-08-02 11:34:41', '2019-11-02 14:44:21'),
(2, 'pengurus satu', 'pengurus', 'mail@mail.com', NULL, '$2y$10$Lndsl7z96DZhZ8fzsnAizeQmAyz/H3JZU2LSPRaPgZBpabjUCEX3i', NULL, '2019-08-02 11:35:32', '2019-08-02 11:35:32'),
(3, 'rimya', 'ular7', 'rimya@rimya.com', NULL, '$2y$10$cT7PEy7Im1713kD4ma7Cleu/.6XYBiE7GvmQ5u9uL38Nkeb09UvIO', NULL, '2020-04-22 11:56:26', '2020-04-27 09:56:03'),
(4, 'Penulis Article', 'blog', 'blog@blog.com', NULL, '123456', NULL, '2020-04-27 09:38:24', '2020-04-27 09:38:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tb_alamat_jamaah`
--
ALTER TABLE `tb_alamat_jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_jamaah`
--
ALTER TABLE `tb_data_jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kas_penerimaan`
--
ALTER TABLE `tb_kas_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kas_pengeluaran`
--
ALTER TABLE `tb_kas_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_qurban_penerimaan`
--
ALTER TABLE `tb_qurban_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_zis`
--
ALTER TABLE `tb_zis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_zis_type`
--
ALTER TABLE `tb_zis_type`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_alamat_jamaah`
--
ALTER TABLE `tb_alamat_jamaah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_data_jamaah`
--
ALTER TABLE `tb_data_jamaah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_kas_penerimaan`
--
ALTER TABLE `tb_kas_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kas_pengeluaran`
--
ALTER TABLE `tb_kas_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_qurban_penerimaan`
--
ALTER TABLE `tb_qurban_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_zis`
--
ALTER TABLE `tb_zis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_zis_type`
--
ALTER TABLE `tb_zis_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
