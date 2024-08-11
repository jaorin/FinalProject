-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 04:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Datetoday` date DEFAULT NULL,
  `DateCheckout` date DEFAULT NULL,
  `LeaseID` int(11) DEFAULT NULL,
  `Usersid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `created_at`, `updated_at`, `Datetoday`, `DateCheckout`, `LeaseID`, `Usersid`) VALUES
(15, '2024-03-01 09:27:12', '2024-03-01 09:27:12', '2024-03-01', '2024-03-31', 35, 2),
(16, '2024-03-09 12:03:21', '2024-03-09 12:03:21', '2024-03-10', '2024-04-09', 35, 2),
(17, '2024-03-09 12:03:31', '2024-03-09 12:03:31', '2024-03-10', '2024-04-09', 41, 27),
(18, '2024-03-09 12:03:47', '2024-03-09 12:03:47', '2024-03-10', '2024-04-09', 40, 26),
(19, '2024-03-09 12:04:41', '2024-03-09 12:04:41', '2024-03-10', '2024-04-09', 41, 27),
(20, '2024-03-09 12:04:52', '2024-03-09 12:04:52', '2024-03-10', '2024-04-09', 40, 26);

-- --------------------------------------------------------

--
-- Table structure for table `dormitories`
--

CREATE TABLE `dormitories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Namedormi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bankaccount` int(11) DEFAULT NULL,
  `Logobank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Incomes` decimal(8,2) DEFAULT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `DateInvoices` datetime DEFAULT NULL,
  `Date_Pay` datetime DEFAULT NULL,
  `Pay_Date` datetime DEFAULT NULL,
  `Delay_Date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Water_Old` int(11) DEFAULT NULL,
  `Water_New` int(11) DEFAULT NULL,
  `Water_Unit` int(11) DEFAULT NULL,
  `Water_Perunit` int(11) DEFAULT NULL,
  `Water_Total` decimal(8,2) DEFAULT NULL,
  `Electricity_Old` int(11) DEFAULT NULL,
  `Electricity_New` int(11) DEFAULT NULL,
  `Electricity_Unit` int(11) DEFAULT NULL,
  `Electricity_Perunit` int(11) DEFAULT NULL,
  `Electricity_Total` decimal(8,2) DEFAULT NULL,
  `Room_Price` decimal(8,2) DEFAULT NULL,
  `Net_Pay` decimal(8,2) DEFAULT NULL,
  `LeaseID` int(11) DEFAULT NULL,
  `Delay_Price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `created_at`, `updated_at`, `DateInvoices`, `Date_Pay`, `Pay_Date`, `Delay_Date`, `Water_Old`, `Water_New`, `Water_Unit`, `Water_Perunit`, `Water_Total`, `Electricity_Old`, `Electricity_New`, `Electricity_Unit`, `Electricity_Perunit`, `Electricity_Total`, `Room_Price`, `Net_Pay`, `LeaseID`, `Delay_Price`) VALUES
(112, '2024-03-06 06:53:35', '2024-03-06 07:05:29', '2024-02-14 20:53:00', '2024-02-14 20:53:00', '2024-02-21 20:53:00', '15', 1450, 1500, 50, 18, '900.00', 1600, 1650, 50, 5, '250.00', '1500.00', '3400.00', 35, '750.00'),
(113, '2024-03-06 07:06:42', '2024-03-06 07:06:42', '2024-03-06 21:06:00', '2024-03-06 21:06:00', '2024-03-13 21:06:00', '0', 1500, 1550, 50, 18, '900.00', 1650, 1700, 50, 5, '250.00', '1500.00', '2650.00', 35, '0.00'),
(114, '2024-03-06 11:01:54', '2024-03-09 10:37:16', '2024-03-07 01:01:00', '2024-03-07 01:01:00', '2024-03-14 01:01:00', '0', 0, 50, 50, 18, '900.00', 0, 50, 50, 5, '250.00', '1500.00', '2650.00', 41, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE `leases` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `Usersid` int(11) DEFAULT NULL,
  `Idcard` int(11) DEFAULT NULL,
  `DateLease` date DEFAULT NULL,
  `Vehicle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Carregistration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Roomer` int(11) DEFAULT NULL,
  `KeyCard` int(11) DEFAULT NULL,
  `KeyPrice` decimal(8,2) DEFAULT NULL,
  `Room_Price` decimal(8,2) DEFAULT NULL,
  `Booking_Price` decimal(8,2) DEFAULT NULL,
  `Deposit_Price` decimal(8,2) DEFAULT NULL,
  `Net_Pay` decimal(8,2) DEFAULT NULL,
  `Meter_Water` int(11) DEFAULT NULL,
  `Meter_Electricity` int(11) DEFAULT NULL,
  `Status_Lease` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PaymentStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Booking_Slip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Idcard_Doc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Lease_Doc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Checkout` datetime DEFAULT NULL,
  `LeaseTotal` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `created_at`, `updated_at`, `RoomID`, `Usersid`, `Idcard`, `DateLease`, `Vehicle`, `Carregistration`, `Roomer`, `KeyCard`, `KeyPrice`, `Room_Price`, `Booking_Price`, `Deposit_Price`, `Net_Pay`, `Meter_Water`, `Meter_Electricity`, `Status_Lease`, `PaymentStatus`, `Booking_Slip`, `Idcard_Doc`, `Lease_Doc`, `Checkout`, `LeaseTotal`) VALUES
(35, '2024-03-01 09:18:45', '2024-03-01 09:18:45', 16, 2, NULL, '2024-03-01', NULL, NULL, NULL, NULL, NULL, '1500.00', '300.00', '200.00', '2000.00', 250, 400, NULL, NULL, NULL, NULL, '1', NULL, '2000.00'),
(40, '2024-03-04 03:15:52', '2024-03-04 03:15:52', 17, 26, NULL, '2024-03-04', NULL, NULL, NULL, NULL, NULL, '1500.00', '300.00', '200.00', '2000.00', 159, 753, NULL, NULL, NULL, NULL, '2', NULL, '2000.00'),
(41, '2024-03-06 11:00:16', '2024-03-06 11:00:16', 66, 27, NULL, '2024-03-07', NULL, NULL, NULL, NULL, NULL, '1500.00', '300.00', '200.00', '2000.00', 0, 0, NULL, NULL, NULL, NULL, '3', NULL, '2000.00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2023_05_30_151951_create_accounts_table', 1),
(6, '2023_05_30_155142_create_dormitories_table', 2),
(7, '2023_05_30_160044_gen_logobankder__to__logobank_table', 3),
(8, '2023_05_30_160626_drop__gen_logobankder_table', 4),
(9, '2023_05_30_160926_create_dormitories_table', 5),
(10, '2023_05_30_161404_create_type_rooms_table', 6),
(11, '2023_05_30_161706_create_rooms_table', 7),
(12, '2023_05_30_162509_create_leases_table', 8),
(13, '2023_05_30_162921_create_invoices_table', 9),
(14, '2023_05_30_163059_create_incomes_table', 10),
(15, '2023_08_16_144925_add_role_to_table', 11),
(16, '2023_08_16_151713_add_age_to_users_table', 12),
(17, '2023_08_16_151736_add_gender_to_users_table', 12),
(18, '2023_08_16_151754_add_phone_to_users_table', 12),
(19, '2023_08_16_152247_add_age_to_users_table', 13),
(20, '2023_08_16_152429_add_age_to_users_table', 14),
(21, '2023_08_16_152459_add_phone_to_users_table', 15),
(22, '2023_08_16_152524_add_gender_to_users_table', 15),
(23, '2023_08_16_152630_add_phone_to_users_table', 16),
(24, '2023_08_20_122901_create_roles_table', 17),
(25, '2023_08_20_124736_rename_role_to_users_table', 18),
(26, '2023_08_21_135532_rename__type_room_name_to_type_rooms_table', 19),
(27, '2023_08_23_144502_create_room_rents_table', 20),
(28, '2023_08_24_143158_rename__new__water_to_rooms_table', 21),
(29, '2023_08_24_143311_rename__new__electricity_to_rooms_table', 21),
(30, '2023_08_24_143947_add_invoice_id_columns_to_rooms_table', 22),
(31, '2023_08_24_144214_add_invoice_id_columns_to_rooms_table', 23),
(32, '2023_09_04_135236_create_checkouts_table', 24),
(33, '2024_02_05_102504_add__room_price__booking_price__deposit_price_columns_to_rooms_table', 25),
(34, '2024_02_09_094636_create_uploads_table', 26),
(35, '2024_03_06_122005_add__delay__price_columns_to_invoices_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `role_id`, `role_name`) VALUES
(1, '2023-08-20 05:31:14', '2023-08-20 05:31:14', 1, 'admin'),
(2, '2023-08-20 05:31:30', '2023-08-20 05:31:30', 2, 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `NumberRoom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'เลขห้อง',
  `Floor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ชั้น',
  `TypeRoomID` int(11) DEFAULT NULL COMMENT 'ประเถทห้อง',
  `RoomStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'สถานะ',
  `New_Water` int(11) DEFAULT NULL COMMENT 'มิเตอร์น้ำล่าสุด',
  `New_Electricity` int(11) DEFAULT NULL COMMENT 'มิเตอร์ไฟล่าสุด',
  `PayStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'สถานะการชำระ',
  `Room_Price` decimal(8,2) DEFAULT NULL,
  `Booking_Price` decimal(8,2) DEFAULT NULL,
  `Deposit_Price` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `created_at`, `updated_at`, `NumberRoom`, `Floor`, `TypeRoomID`, `RoomStatus`, `New_Water`, `New_Electricity`, `PayStatus`, `Room_Price`, `Booking_Price`, `Deposit_Price`) VALUES
(16, '2023-08-24 08:43:46', '2024-03-06 07:06:42', '101', '1', 1, 'มีผู้เช่า', 1550, 1700, 'ชำระเรียบร้อย', '1500.00', '300.00', '200.00'),
(17, '2023-08-24 08:44:11', '2024-03-04 05:12:19', '102', '1', 1, 'มีผู้เช่า', 350, 900, 'ชำระเรียบร้อย', '1500.00', '300.00', '200.00'),
(18, '2023-08-24 09:49:08', '2024-02-08 08:57:04', '103', '1', 1, 'ว่าง', 400, 1200, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(19, '2023-08-25 22:06:18', '2024-02-08 08:58:28', '104', '1', 1, 'ว่าง', 300, 1000, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(20, '2023-09-01 08:19:25', '2024-02-08 08:57:12', '105', '1', 1, 'ว่าง', 100, 100, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(21, '2023-09-03 20:51:21', '2024-02-08 08:57:20', '106', '1', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(22, '2023-09-03 20:51:30', '2024-02-08 08:57:27', '107', '1', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(23, '2023-09-03 20:52:17', '2024-02-08 08:57:35', '108', '1', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(24, '2023-09-03 20:52:23', '2023-09-09 04:51:39', '109', '1', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', NULL, NULL, NULL),
(25, '2023-09-03 20:52:29', '2024-02-08 08:57:45', '110', '1', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(26, '2023-09-03 20:52:38', '2024-03-01 09:11:31', '201', '2', NULL, 'ว่าง', 50, 150, 'ยังไม่ได้ชำระ', '1000.00', '300.00', '200.00'),
(28, '2024-02-05 03:36:08', '2024-02-08 08:58:37', '202', '2', NULL, 'ว่าง', 250, 450, 'ยังไม่ได้ชำระ', '1500.00', '500.00', '300.00'),
(29, '2024-03-04 02:48:31', '2024-03-04 02:48:31', '203', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(30, '2024-03-04 02:48:48', '2024-03-04 02:48:48', '204', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(31, '2024-03-04 02:49:03', '2024-03-04 02:49:03', '205', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(32, '2024-03-04 02:49:27', '2024-03-04 02:49:27', '206', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(33, '2024-03-04 02:49:45', '2024-03-04 02:49:45', '207', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(34, '2024-03-04 02:49:58', '2024-03-04 02:49:58', '208', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(35, '2024-03-04 02:50:12', '2024-03-04 02:50:12', '209', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(36, '2024-03-04 02:50:37', '2024-03-04 03:20:18', '210', '2', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(37, '2024-03-04 02:50:49', '2024-03-04 02:50:49', '301', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(38, '2024-03-04 02:51:07', '2024-03-04 02:51:07', '302', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(39, '2024-03-04 02:52:31', '2024-03-04 02:52:31', '303', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(40, '2024-03-04 02:52:45', '2024-03-04 02:52:45', '304', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(41, '2024-03-04 02:52:57', '2024-03-04 02:52:57', '305', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(42, '2024-03-04 02:53:08', '2024-03-04 02:53:08', '306', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(43, '2024-03-04 02:53:17', '2024-03-04 02:53:17', '307', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(44, '2024-03-04 02:53:27', '2024-03-04 02:53:27', '308', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(45, '2024-03-04 02:53:38', '2024-03-04 02:53:38', '309', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(46, '2024-03-04 02:53:55', '2024-03-04 02:53:55', '310', '3', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(47, '2024-03-04 02:54:09', '2024-03-04 02:54:09', '401', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(48, '2024-03-04 02:54:17', '2024-03-04 02:54:17', '402', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(49, '2024-03-04 02:54:26', '2024-03-04 02:54:26', '403', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(50, '2024-03-04 02:54:34', '2024-03-04 02:54:34', '404', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(51, '2024-03-04 02:54:41', '2024-03-04 02:54:41', '405', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(52, '2024-03-04 02:54:49', '2024-03-04 02:54:49', '406', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(53, '2024-03-04 02:54:58', '2024-03-04 02:54:58', '407', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(54, '2024-03-04 02:55:08', '2024-03-04 02:55:08', '408', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(55, '2024-03-04 02:55:17', '2024-03-04 02:55:35', '409', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(56, '2024-03-04 02:55:51', '2024-03-04 02:55:51', '410', '4', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(57, '2024-03-04 02:55:58', '2024-03-04 02:55:58', '501', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(58, '2024-03-04 02:56:06', '2024-03-04 02:56:06', '502', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(59, '2024-03-04 02:56:14', '2024-03-04 02:56:14', '503', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(60, '2024-03-04 02:56:22', '2024-03-04 02:56:22', '504', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(61, '2024-03-04 02:56:31', '2024-03-04 02:56:31', '505', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(62, '2024-03-04 02:56:39', '2024-03-04 02:56:39', '506', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(63, '2024-03-04 02:56:46', '2024-03-04 02:56:46', '507', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(64, '2024-03-04 02:56:55', '2024-03-04 02:56:55', '508', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(65, '2024-03-04 02:57:07', '2024-03-04 02:57:07', '509', '5', NULL, 'ว่าง', 0, 0, 'ยังไม่ได้ชำระ', '1500.00', '300.00', '200.00'),
(66, '2024-03-04 02:57:17', '2024-03-06 11:01:54', '510', '5', NULL, 'มีผู้เช่า', 50, 50, 'ชำระเรียบร้อย', '1500.00', '300.00', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `room_rents`
--

CREATE TABLE `room_rents` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `end_rent` datetime DEFAULT NULL,
  `rent_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_rooms`
--

CREATE TABLE `type_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `TypeRoomID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `Booking` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DepositBooking` decimal(8,2) DEFAULT NULL,
  `Water` int(11) DEFAULT NULL,
  `Electricity` int(11) DEFAULT NULL,
  `Deposit` int(11) DEFAULT NULL,
  `PhotoTypeRoom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateUpload` datetime DEFAULT NULL,
  `NumberRoom` int(11) DEFAULT NULL,
  `LeaseID` int(11) DEFAULT NULL,
  `Usersid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `created_at`, `updated_at`, `Photo`, `DateUpload`, `NumberRoom`, `LeaseID`, `Usersid`) VALUES
(43, '2024-03-04 08:35:37', '2024-03-04 08:35:37', 'uploads/A0iALSvuuh2dkJoN7rPZaArK8u6CZ5tYlbaTjDnG.jpg', '2024-03-11 22:35:00', 101, 35, 2),
(44, '2024-03-09 11:57:53', '2024-03-09 11:57:53', 'uploads/1kvoDclKU8oMq1w1MLsQqjWjjMI8sHF7wW1xFLvD.jpg', '2024-03-17 01:57:00', 102, 40, 26),
(45, '2024-03-09 11:58:10', '2024-03-09 11:58:10', 'uploads/B2DPhYHhSnaNzFEd3Iyo3NqaLyPagBnPod6u1ao0.jpg', '2024-03-17 01:57:00', 102, 40, 26),
(46, '2024-03-09 11:58:37', '2024-03-09 11:58:37', 'uploads/Ddd8xcYImaoZsldI6fvFW3x7OwW4ibSOuYw720B3.jpg', '2024-03-17 01:58:00', 510, 41, 27),
(47, '2024-03-09 11:58:49', '2024-03-09 11:58:49', 'uploads/chRoqMeOimmhYhVoXyfDkieWAFG89f1ZSNFdbhcd.jpg', '2024-03-17 01:58:00', 510, 41, 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'guest',
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `age`, `gender`, `phone`) VALUES
(1, 'Narin Prakobkit', 'narin.pra@vru.ac.th', NULL, '$2y$10$PirXFHRMpfasW6gdpNmtdu2Wlu4HcvXBMgexpRZ8wtGQz9AFosS26', NULL, '2023-05-31 05:19:41', '2023-08-17 06:17:07', '1', '31', 'ชาย', '0935356459'),
(2, 'Guest', 'guest@guest.com', NULL, '$2y$10$vXKShheDg.u341Tk/UNhX.SGqyYQWWT2ZMRaAWB.PPFWA8P0/gzeG', NULL, '2023-08-16 08:04:14', '2023-09-08 11:05:58', '2', '30', 'ชาย', '0935356459'),
(26, 'Somchai', 'Somchai@gmail.com', NULL, '$2y$10$B5D2WUuKBD27v1wnl2nw8uxmgrqYQIZ7oG9d2FSkxFRFV6ZeYOXyG', NULL, '2024-02-09 06:04:04', '2024-02-09 06:04:04', '2', '24', 'ชาย', '0912365498'),
(27, 'นรินทร์ ประกอบกิจ', 'test@test.com', NULL, '$2y$10$9coPIOQF1y/V6HBdFyUNaugMk8XTnBbmoeQVXK92KqdjlgJAEYbc2', NULL, '2024-03-06 11:00:01', '2024-03-06 11:00:01', '2', '30', 'ชาย', '0982726969'),
(28, 'กมลพรรณ ภาคนาม', 'mma@gmail.com', NULL, '$2y$10$3FufHArsiHGmjdDOqh38Qex8x7tjQQQiTlQV.Ll66zAnSsXbX3SRK', NULL, '2024-03-11 05:24:53', '2024-03-11 05:24:53', '2', '31', 'หญิง', '0982726969');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dormitories`
--
ALTER TABLE `dormitories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leases`
--
ALTER TABLE `leases`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_rents`
--
ALTER TABLE `room_rents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_rooms`
--
ALTER TABLE `type_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
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
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dormitories`
--
ALTER TABLE `dormitories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `leases`
--
ALTER TABLE `leases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `room_rents`
--
ALTER TABLE `room_rents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_rooms`
--
ALTER TABLE `type_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
