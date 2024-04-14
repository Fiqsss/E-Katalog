-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.11:3306
-- Generation Time: Apr 15, 2024 at 07:39 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u325384802_ekatalog`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_16_020426_produk', 1),
(6, '2023_08_02_160043_transaksi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sarofiqs@gmail.com', '$2y$10$D9vk0RO3UH4ghrM/rdSVHeQVl9g.Z6585CTVYJeJ8OsY.vEENL2m6', '2024-04-01 07:39:42');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `matcode` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `namabarang`, `matcode`, `kategori`, `gambar`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'FAWR FZ RF-GPS/GLONASS Indoor', 'FAWR GPS', 'ANTENA', 'image1.jpeg', '2023-07-31', NULL, NULL),
(2, 'antena GPS anti jam super anti petir', '50531800083Z', 'ANTENA', 'image2.jpeg', '2023-07-31', NULL, NULL),
(3, 'Kabel power 4×16 Bongkar', 'CBLPOWER 4X16', 'ANTENA', 'image3.jpeg', '2023-07-31', NULL, NULL),
(4, 'Antena Rosenberger 10 port', 'BA-B74Q7X90V-00', 'ANTENA', 'image4.jpeg', '2023-07-31', NULL, NULL),
(5, 'RF Jumper DM ke DM, 10M', 'WSM-0305242', 'ANTENA', 'image5.jpeg', '2023-08-04', NULL, NULL),
(6, 'Antena SXD4H-33-18-iVT-DB8P', 'SXD4H-33-18-IVT-DB', 'ANTENA', 'image6.jpeg', '2023-08-04', NULL, NULL),
(7, 'CM-ADWTY5-OD6 Combiner', '56602400109_ST', 'ANTENA', 'image8.jpeg', '2023-08-04', NULL, NULL),
(8, '4 port Multibeam Antenna Commscope', '2CPX208R-V4', 'ANTENA', 'image11.jpeg', '2023-08-04', NULL, NULL),
(9, 'ANT 2.3-2.7 BS OMN 360X8', '350-07-019A', 'ANTENA', 'image12.jpeg', '2023-09-06', '2023-09-06 13:47:14', '2023-09-06 13:47:14'),
(10, 'Konektor N untuk Kabel 1/4', '180000012792_ST', 'MICROWAVE', 'image13.jpeg', '2023-08-06', '2023-09-06 13:48:44', '2023-09-06 13:48:44'),
(11, 'Rakitan Modul RFU ZXMW SRU2 13GH (BTRX3', '122395831011_ST', 'MICROWAVE', 'image14.jpeg', '2023-08-06', '2023-09-06 13:52:08', '2023-09-06 13:52:08'),
(12, 'ZTE-033040400092', 'Jumper Optik SingleMode LC/PC 10m', 'MICROWAVE', 'image15.jpeg', '2023-08-06', '2023-09-06 13:53:25', '2023-09-06 13:53:25'),
(13, 'IP-20C-Daya Tinggi-7-161F-5W6-L', '22-0870-0', 'MICROWAVE', 'image16.jpeg', '2023-08-06', '2023-09-06 13:55:02', '2023-09-06 13:55:02'),
(14, 'IP-10 XC E1 AUX NON XPIC', '9-X802-0', 'MICROWAVE', 'image17.jpeg', '2023-08-06', '2023-09-06 13:56:48', '2023-09-06 13:56:48'),
(16, 'Coupler 7.1-8.5GHz', 'MA-0851-1.004', 'MICROWAVE', 'image19.jpeg', '2023-08-06', '2023-09-06 13:59:04', '2023-09-06 13:59:04'),
(17, 'Outdoor Ethernet surge protector', '903-00-213.DIS', 'MICROWAVE', 'image21.jpeg', '2023-08-06', '2023-09-06 14:00:16', '2023-09-06 14:00:16'),
(18, 'ANT 8FT 6.425-7.125Ghz SP UDR70', 'AN-3035-0.001', 'MICROWAVE', 'image22.jpeg', '2023-08-06', '2023-09-06 14:01:59', '2023-09-06 14:01:59'),
(19, 'IP-20N LIC TDM 16xE1/DS 1 24-L004-0', '24-L004-0', 'MICROWAVE', 'image24.jpeg', '2023-08-06', '2023-09-06 14:03:10', '2023-09-06 14:03:10'),
(20, 'CSU ZXDU58', 'CDMA-0027', 'CDMA', 'image25.jpeg', '2023-07-12', '2023-09-06 14:08:48', '2023-09-06 14:08:48'),
(21, 'ZXD2400', 'CDMA – ZXD2400', 'CDMA', 'image27.jpeg', '2023-08-12', '2023-09-06 14:11:00', '2023-09-06 14:11:00'),
(22, 'IDU ALCATEL CDMA', '3DB06602ADXX.DIS', 'CDMA', 'image29.jpeg', '2023-08-12', '2023-09-06 14:11:55', '2023-09-06 14:11:55'),
(23, 'CC', 'CDMA-0031', 'CDMA', 'image30.jpeg', '2023-08-12', '2023-09-06 14:19:54', '2023-09-06 14:19:54'),
(24, '473152A.101', 'FWNA Dismantle', 'EnodeB', '473152A.101_4.jpg', '2023-09-14', '2023-09-14 01:58:01', '2023-09-14 01:58:01'),
(25, 'SFP SM-1000BASE-LX LC', '202-00-380A.DIS', 'EnodeB', '202-00-380A.DIS_2-scaled.jpg', '2023-09-14', '2023-09-14 01:59:53', '2023-09-14 01:59:53'),
(26, '1+0 Testing accessory package (4-18G)|', '180000078371_ST', 'EnodeB', '180000078371_3-scaled.jpg', '2023-09-14', '2023-09-14 02:01:06', '2023-09-14 02:01:06'),
(27, '1+0 Testing Accessory Package (23G)|', '180000462936_ST', 'EnodeB', '180000462936_ST_1-scaled.jpg', '2023-09-14', '2023-09-14 02:02:48', '2023-09-14 02:02:48'),
(28, 'FXCA FLEXI RF MODULE 850 TRIPLE 70W DIS', '472142A.303', 'EnodeB', '472142A.303_1.jpg', '2023-09-14', '2023-09-14 02:03:58', '2023-09-14 02:04:25'),
(29, 'Purchase padlock master 50mm', 'AS00002', 'EnodeB', 'AS00002.jpg', '2023-09-14', '2023-09-14 02:05:35', '2023-09-14 02:05:35'),
(30, 'AC/DC Indoor Power Cenverter for AIRHARM', 'AC-DC-IDU-AIR4G', 'EnodeB', 'AC-DC-IDU-AIR4G.jpg', '2023-09-14', '2023-09-14 02:07:05', '2023-09-14 02:07:05'),
(31, 'TI 3128LTE LABEL', 'LBL-TI3128', 'EnodeB', 'LBL-TI3128.jpg', '2023-09-14', '2023-09-14 02:12:17', '2023-09-14 02:12:17'),
(32, 'RET Motor_ECU-001 Dismantle', 'RET-ECU001.DIS', 'IP RAN', 'RET-ECU001.DIS_2-scaled.jpg', '2023-09-14', '2023-09-14 02:13:49', '2023-09-14 02:13:49'),
(33, 'Chassis Switch ZXR10 8902', 'SW-ZXR10 8902.DIS', 'IP RAN', 'SW-ZXR10-8902.DIS_4-scaled.jpg', '2023-09-14', '2023-09-14 02:14:37', '2023-09-14 02:14:37'),
(34, 'Small dummy tray Dismantle Dis', '760-046574.DIS', 'IP RAN', '760-046574.DIS_1-scaled.jpg', '2023-09-14', '2023-09-14 02:16:26', '2023-09-14 02:16:26'),
(35, 'Grounding 25mm NYAF BLUE', 'AC0102.DIS', 'IP RAN', 'AC0102.DIS_1-scaled.jpg', '2023-09-14', '2023-09-14 02:18:02', '2023-09-14 02:18:02'),
(36, 'Cable Power Black 16mm', 'AC0107.DIS', 'IP RAN', 'AC0107.DIS_1-scaled.jpg', '2023-09-14', '2023-09-14 02:18:45', '2023-09-14 02:18:45'),
(37, 'Ethernet Cable ZXR10 5928E-Install_10m', '52740203672_ST', 'IP RAN', '52740203672_ST_1.jpg', '2023-09-14', '2023-09-14 02:20:09', '2023-09-14 02:20:09'),
(38, 'Grounding Suprime 16mm NYAF Black', 'AC0100.DIS', 'IP RAN', 'AC0100.DIS_1-scaled.jpg', '2023-09-14', '2023-09-14 02:22:20', '2023-09-14 02:22:20'),
(39, 'LSA Terminal 10 Port', 'LOCAL-INSMAT-019', 'POWER SYSTEM', 'LOCAL-INSMAT-019_2-scaled.jpg', '2023-09-14', '2023-09-14 02:24:37', '2023-09-14 02:24:37'),
(40, 'Steel Flexible Conduit 1 Inch', 'LOCAL-INSMAT-014', 'POWER SYSTEM', 'LOCAL-INSMAT-014_2-scaled.jpg', '2023-09-14', '2023-09-14 02:26:53', '2023-09-14 02:26:53'),
(41, 'Black vinyl cable 16 mm2', 'POW6', 'POWER SYSTEM', 'POW6-scaled.jpeg', '2023-09-14', '2023-09-14 02:28:22', '2023-09-14 02:28:22'),
(42, 'MCB 1 Phase 6A (Schneider)', 'LM-SBA-13', 'POWER SYSTEM', 'LM-SBA-13.jpg', '2023-09-14', '2023-09-14 02:29:24', '2023-09-14 02:29:24'),
(43, 'Rectifier Module Vertiv', 'R48-3000E3', 'POWER SYSTEM', 'R48-3000E3.jpg', '2023-09-14', '2023-09-14 02:31:12', '2023-09-14 02:31:12'),
(44, 'BATTERY 150AH', 'SF-BATT150', 'POWER SYSTEM', 'SF-BATT150.jpg', '2023-09-14', '2023-09-14 02:32:12', '2023-09-14 02:32:12'),
(45, 'BATTERY 100AH', 'SF-BATT100', 'POWER SYSTEM', 'SF-BATT100.jpg', '2023-09-14', '2023-09-14 02:33:09', '2023-09-14 02:33:09'),
(46, 'Module Delta ESR-48/56C', 'DPR 2900 B-48', 'POWER SYSTEM', 'DPR-2900-B-48.jpg', '2023-09-14', '2023-09-14 02:35:06', '2023-09-14 02:35:06'),
(47, 'Outdoor DCPDB', 'POW002', 'POWER SYSTEM', 'IMG_20190814_113313-scaled.jpg', '2023-09-14', '2023-09-14 02:36:19', '2023-09-14 02:36:19'),
(48, 'Panel Input UPS ZXDP03X', 'AC0018', 'POWER SYSTEM', 'AC0018.jpg', '2023-09-14', '2023-09-14 02:37:12', '2023-09-14 02:37:12'),
(49, 'MCB MERLIN GERIN 63A SINGLE PHASE', 'MCB-MG63ASP001', 'POWER SYSTEM', 'MCB-MG63ASP001.jpg', '2023-09-14', '2023-09-14 02:38:22', '2023-09-14 02:38:22'),
(50, 'New OVC Vertiv', 'EPC48300', 'POWER SYTEM', 'EPC48300.jpg', '2023-09-14', '2023-09-14 02:39:39', '2023-09-14 02:39:39'),
(51, 'Fuse 10A', 'PSP004-11', 'POWER SYSTEM', 'Fuse-10A-scaled.jpg', '2023-09-14', '2023-09-14 02:40:25', '2023-09-14 02:40:25'),
(52, 'Door Open Switch', 'PSP004-13', 'POWER SYSTEM', 'Door-Open-Switch-scaled.jpg', '2023-09-14', '2023-09-14 02:41:05', '2023-09-14 02:41:05'),
(53, 'Controller', 'PSP004-2', 'POWER SYSTEM', 'Controler_1-scaled.jpg', '2023-09-14', '2023-09-14 02:42:17', '2023-09-14 02:42:17'),
(56, 'PADLOCK MASTER LOCK CODE 175 D 50MM', 'LOCAL-INSMAT-015', 'POWERSYSTEM', 'LOCK.jpeg', '2023-08-18', '2023-09-18 15:02:41', '2023-09-18 15:06:13'),
(57, 'Steel Flexible Conduit 1 Inch', 'LOCAL-INSMAT-014', 'POWESYSTEM', 'JUMPER.jpeg', '2023-09-06', '2023-09-18 15:09:35', '2023-09-18 15:09:35'),
(58, 'Indoor AC-DC POE Supply MIT-09G-24H', '133-00-123EU.DIS', 'MICROWAVE', 'POE.jpeg', '2023-09-04', '2023-09-18 15:11:27', '2023-09-18 15:11:27'),
(60, 'SWITCH ZXR10 5928E-MAIN DISMANTLE', 'SW01-5928E.DIS', 'IPRAN', 'ZXR10.jpeg', '2023-09-18', '2023-09-18 15:12:50', '2023-09-18 15:12:50'),
(62, 'SFP+ 10Gbps 1550nm 40KM-ER Dis', 'JJDP-550010-40C6.D', 'IPRAN', 'SFP10GB.jpeg', '2023-09-18', '2023-09-18 15:16:28', '2023-09-18 15:16:28'),
(63, 'SFP-1GE-LX (Juniper) Dis', '740-031850.DIS', 'IPRAN', 'SFP1GE.jpeg', '2023-09-18', '2023-09-18 15:17:42', '2023-09-18 15:17:42'),
(64, '48V50Ah III High-adapted battery system', '51201000027Z', 'POWERSYSTEM', 'PWRSYS.jpeg', '2023-09-18', '2023-09-18 15:18:41', '2023-09-18 15:18:41'),
(65, 'Rack BTS CBTS 12', 'CDMA-0006', 'CDMA', 'CDMA.jpeg', '2023-09-18', '2023-09-18 15:19:29', '2023-09-18 15:19:29'),
(66, 'CSU510B', '180000351966.DIS', 'POWERSYSTEM', 'CSUU.jpeg', '2023-09-18', '2023-09-18 15:20:37', '2023-09-18 15:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `qty_permintaan` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PROCCESS',
  `tanggal_transaksi` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `produk_id`, `qty_permintaan`, `status`, `tanggal_transaksi`, `created_at`, `updated_at`) VALUES
(2, 8, 12, 'KOMPLIT', '2023-09-01', '2023-09-07 08:22:36', '2023-09-07 23:40:41'),
(3, 2, 2, 'KOMPLIT', '2023-09-01', '2023-09-07 23:40:12', '2023-09-12 00:35:58'),
(4, 20, 1, 'KOMPLIT', '2023-09-02', '2023-09-07 23:41:04', '2023-09-12 00:36:00'),
(5, 5, 3, 'KOMPLIT', '2023-09-08', '2023-09-07 23:41:15', '2023-09-12 00:36:19'),
(6, 8, 3, 'KOMPLIT', '2023-09-08', '2023-09-07 23:43:04', '2023-09-12 00:36:17'),
(7, 7, 2, 'KOMPLIT', '2023-09-03', '2023-09-07 23:44:10', '2023-09-12 00:36:15'),
(8, 3, 10, 'KOMPLIT', '2023-09-08', '2023-09-07 23:44:25', '2023-09-12 00:36:13'),
(9, 11, 3, 'KOMPLIT', '2023-09-08', '2023-09-07 23:44:36', '2023-09-12 00:36:11'),
(10, 13, 3, 'KOMPLIT', '2023-09-08', '2023-09-07 23:44:47', '2023-09-12 00:36:08'),
(11, 17, 1, 'KOMPLIT', '2023-09-08', '2023-09-07 23:45:22', '2023-09-12 00:36:03'),
(12, 9, 1, 'KOMPLIT', '2023-09-08', '2023-09-07 23:45:35', '2023-09-12 00:36:28'),
(13, 10, 10, 'KOMPLIT', '2023-09-14', '2023-09-14 00:38:51', '2023-09-15 07:24:11'),
(14, 16, 5, 'KOMPLIT', '2023-09-14', '2023-09-14 02:08:08', '2023-09-19 02:39:30'),
(15, 3, 20, 'KOMPLIT', '2023-09-15', '2023-09-15 07:24:08', '2023-09-19 02:39:27'),
(17, 1, 12, 'KOMPLIT', '2023-09-19', '2023-09-19 11:52:42', '2023-09-19 11:52:59'),
(18, 1, 12, 'KOMPLIT', '2023-09-19', '2023-09-19 11:59:27', '2023-09-19 12:00:42'),
(19, 2, 12, 'KOMPLIT', '2023-09-26', '2023-09-27 02:44:54', '2023-09-27 02:45:14'),
(20, 1, 89789, 'KOMPLIT', '2023-10-07', '2023-10-07 03:53:43', '2023-10-07 03:53:55'),
(21, 1, 68, 'KOMPLIT', '2023-11-25', '2023-11-25 05:49:23', '2023-11-25 05:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', '', 'admin', '$2y$10$MxXY9h0fa2X2sNnXjs4/IeJY1KEYvY5Wv6QlJbNUBPChxkUwoyuOm', NULL, NULL, NULL),
(5, 'operator', '', 'operator', '$2y$10$gu.3PC2bxmJKnRIsup9SS.9tjQDtUiUTi7ifGLLR.RL/h6qCRgMO.', NULL, '2023-09-06 13:22:19', '2023-09-15 08:05:30'),
(8, 'arofiq', 'sarofiqs@gmail.com', 'admin', '$2y$10$ThXKJYVBJcw49oY9gsrXm.gJc/9R23WEbUetYkbmCaKxewkxxD1ry', 'xOCueSosF9c19VyhMkLtpjyiZEDHObdgGViKaTg2Kb8knJtU70eU5peazSxL', '2023-09-14 02:10:08', '2023-09-30 02:35:38'),
(9, 'juna', 'ahmadjunaidin@gmail.com', 'operator', '$2y$10$y.XbulZJjVgZRriHOOqlm.n.2gxuJQnZGNDEEkM9l/1RN88X6QOiW', NULL, '2023-09-15 08:05:49', '2023-09-22 20:58:14'),
(10, 'prio', 'prioadipurnomo@smartfren.com', 'operator', '$2y$10$a.bCOpYhGEPdrBMowe.u/uy8JdsA6XvKNPlweLssSF8cSgqbLo.oC', NULL, '2023-09-15 08:06:06', '2023-09-22 20:57:43'),
(11, 'ica', 'annisacitra@smartfren.com', 'admin', '$2y$10$T/rj2Oki6Msv201g/LriauE7bOB6CouKBRxD0BoFqZ4ZjwSC.rwkC', NULL, '2023-09-15 08:06:27', '2023-09-22 20:56:51'),
(12, 'ali', 'aliromadhon@gmail.com', 'operator', '$2y$10$3VQ4mcjH8avG9T.lQhhS4.8OBQypAks5mEcJ.3MSrLtBiZDeW2qOy', NULL, '2023-09-22 20:58:38', '2023-09-22 20:58:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
