-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2026 at 02:16 PM
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
-- Database: `skypack`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('eng.hamzatahir@outlook.com|127.0.0.1', 'i:1;', 1767449048),
('eng.hamzatahir@outlook.com|127.0.0.1:timer', 'i:1767449048;', 1767449048);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Riyadh', 'country/city/riyadh.png', NULL, NULL),
(2, 1, 'Jeddah', 'country/city/jeddah.png', NULL, NULL),
(3, 1, 'Dammam', 'country/city/dammam.png', NULL, NULL),
(4, 2, 'Dubai', 'country/city/dubai.png', NULL, NULL),
(5, 2, 'Abu Dhabi', 'country/city/abudhabi.png', NULL, NULL),
(6, 2, 'Sharjah', 'country/city/sharjah.png', NULL, NULL),
(7, 3, 'Karachi', 'country/city/karachi.png', NULL, NULL),
(8, 3, 'Lahore', 'country/city/lahore.png', NULL, NULL),
(9, 3, 'Islamabad', 'country/city/islamabad.png', NULL, NULL),
(10, 4, 'Mumbai', 'country/city/mumbai.png', NULL, NULL),
(11, 4, 'Delhi', 'country/city/delhi.png', NULL, NULL),
(12, 4, 'Bangalore', 'country/city/bangalore.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `mobile_number_2` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `passport_expiry` date DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `ID_number` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `passport_pic` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `delete_by` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `country`, `email`, `mobile_number`, `mobile_number_2`, `active`, `address`, `city`, `password`, `passport_expiry`, `passport_no`, `ID_number`, `profession`, `gender`, `passport_pic`, `profile_image`, `create_by`, `update_by`, `delete_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Hamza Tahir', 'Pakistan', 'abc@abc.com', '03470066234', NULL, 1, 'shah faisal colony no3', 'karachi', '$2y$12$d1qKe.XVmfIIjVxXf90pp.lJz4SP8PaUTHkkRf4by3MC3LrF/yhze', NULL, NULL, NULL, NULL, 'male', 'clients/passports/3nKdIvzKHZFLVpwK0hZEiDt45wnZfusECjr2cYJU.png', 'clients/profiles/Q6mA52MAAmCs0VZSRPX1ANup5PEygcKKOuXg0RqT.png', NULL, NULL, NULL, NULL, '2026-01-01 09:49:35', '2026-01-01 09:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Saudi Arabia', 'country/saudi.png', NULL, NULL),
(2, 'United Arab Emirates', 'country/uae.png', NULL, NULL),
(3, 'Pakistan', 'country/pakistan.png', NULL, NULL),
(4, 'India', 'country/india.png', NULL, NULL),
(5, 'United States', 'country/usa.png', NULL, NULL),
(6, 'United Kingdom', 'country/uk.png', NULL, NULL),
(7, 'Canada', 'country/canada.png', NULL, NULL),
(8, 'Germany', 'country/germany.png', NULL, NULL),
(9, 'France', 'country/france.png', NULL, NULL),
(10, 'Turkey', 'country/turkey.png', NULL, NULL);

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
-- Table structure for table `inquiry_detail`
--

CREATE TABLE `inquiry_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_master_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `unit` varchar(255) DEFAULT NULL,
  `rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_detail`
--

INSERT INTO `inquiry_detail` (`id`, `inquiry_master_id`, `item_id`, `description`, `qty`, `unit`, `rate`, `amount`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'light', 10, 'kg', 5.00, 50.00, '2026-01-03 08:32:30', '2026-01-03 08:32:30'),
(5, 2, 1, 'light', 1, 'kg', 10.00, 10.00, '2026-01-03 11:18:57', '2026-01-03 11:18:57'),
(6, 2, 2, 'pc', 1, 'kg', 10.00, 10.00, '2026-01-03 11:18:57', '2026-01-03 11:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_master`
--

CREATE TABLE `inquiry_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `travel_flight_id` bigint(20) UNSIGNED DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `remarks` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `delivery_address` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `Qrcode` varchar(255) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ucode` varchar(255) DEFAULT NULL,
  `traveler_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_master`
--

INSERT INTO `inquiry_master` (`id`, `client_id`, `travel_flight_id`, `entry_date`, `status`, `remarks`, `active`, `delivery_address`, `contact_person`, `contact_no`, `Qrcode`, `delete_by`, `deleted_at`, `ucode`, `traveler_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2026-01-03', 'Completed', NULL, 1, 'Shah Faisal Colony No 2', '03470066234', '0000000', NULL, NULL, NULL, '1P19EO', 1, '2026-01-01 09:52:28', '2026-01-03 17:52:59'),
(2, 1, 2, '2026-01-03', 'Completed', 'adsjcndascjndc', 1, 'Shah Faisal Colony No 2', '03470066234', '0000000', NULL, 1, '2026-01-24 10:12:57', 'RXJ0BO', 1, '2026-01-03 11:18:57', '2026-01-24 10:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `under` bigint(20) UNSIGNED DEFAULT NULL,
  `isgroup` tinyint(1) NOT NULL DEFAULT 0,
  `level` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `rate` decimal(12,2) NOT NULL DEFAULT 0.00,
  `unit` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `keyfield` varchar(255) DEFAULT NULL,
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `delete_by` bigint(20) UNSIGNED DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `under`, `isgroup`, `level`, `description`, `active`, `rate`, `unit`, `brand`, `model`, `size`, `keyfield`, `create_by`, `create_at`, `update_by`, `update_at`, `delete_by`, `delete_at`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 1, 0, NULL, NULL, 1, 10.00, 'kg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-01 09:51:24', '2026-01-01 09:51:24'),
(2, 'admin', NULL, 0, NULL, NULL, 1, 2.00, 'kg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-03 11:10:07', '2026-01-03 11:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `travel_flight_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `sender_type` varchar(255) NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `inquiry_id`, `travel_flight_id`, `sender_id`, `sender_type`, `receiver_id`, `receiver_type`, `title`, `description`, `image`, `read_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'client', 1, 'traveler', 'Heloo', 'Testing', NULL, '2026-01-03 09:02:50', NULL, '2026-01-03 08:24:12', '2026-01-03 09:02:50'),
(2, 2, 2, 1, 'traveler', 1, 'client', 'Title', 'HEHE', NULL, '2026-01-03 11:19:53', NULL, '2026-01-03 11:19:47', '2026-01-03 11:19:53'),
(3, 2, 2, 1, 'client', 1, 'traveler', 'test', '12121212', NULL, NULL, NULL, '2026-01-24 10:12:33', '2026-01-24 10:12:33');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_27_061001_create_products_table', 1),
(5, '2025_11_26_140849_create_clients_table', 1),
(6, '2025_11_26_155124_add_missing_columns_to_clients_table', 1),
(7, '2025_11_27_093038_create_travelers_table', 1),
(8, '2025_11_27_095356_create_travel_flights_table', 1),
(9, '2025_11_28_131943_create_inquiry_master_table', 1),
(10, '2025_11_28_132011_create_inquiry_detail_table', 1),
(11, '2025_11_28_142307_create_inventory_table', 1),
(12, '2025_12_02_143649_create_countries_table', 1),
(13, '2025_12_02_143751_create_cities_table', 1),
(15, '2025_12_27_113321_create_withdraw_requests_table', 2),
(16, '2025_12_31_212717_create_messages_table', 2),
(17, '2026_01_02_152915_create_traveler_bank_accounts_table', 2),
(18, '2026_01_23_110500_add_description_and_tags_to_travel_flights', 3);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travelers`
--

CREATE TABLE `travelers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `mobile_number_2` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `passport_expiry` date DEFAULT NULL,
  `passport_no` varchar(255) DEFAULT NULL,
  `ID_number` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `passport_pic` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `create_by` varchar(255) DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `delete_by` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travelers`
--

INSERT INTO `travelers` (`id`, `full_name`, `country`, `email`, `mobile_number`, `mobile_number_2`, `active`, `address`, `city`, `password`, `passport_expiry`, `passport_no`, `ID_number`, `profession`, `gender`, `passport_pic`, `profile_image`, `create_by`, `update_by`, `delete_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Fahad Travelre', 'Pakistan', 'abc@abc.com', '03470066234', NULL, 1, 'shah faisal colony no3', 'karachi', '$2y$12$90mVbQVQyxnCvqNHQo4pXOtUuImUspLeZOrTYuK.PwWxFkrSJ/KYS', NULL, NULL, NULL, NULL, 'male', 'clients/passports/ZzwTtGeFtgy0wDhdjWLsWCyhq8GJz2Waj0LlY19O.png', 'clients/profiles/9gEmobb1XfsjtsFxo0R018pJJLlkgW7YWidCSU0D.png', NULL, NULL, NULL, NULL, '2026-01-01 09:46:45', '2026-01-01 09:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `traveler_bank_accounts`
--

CREATE TABLE `traveler_bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_title` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `swift_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traveler_bank_accounts`
--

INSERT INTO `traveler_bank_accounts` (`id`, `traveler_id`, `bank_name`, `account_title`, `account_number`, `iban`, `swift_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Alfalah', 'Muhammad Hamza', '0000000000000000', 'PAK_0000000000000000', '123', '2026-01-02 13:06:55', '2026-01-02 13:07:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `travel_flights`
--

CREATE TABLE `travel_flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `pnr_no` varchar(255) DEFAULT NULL,
  `flight_date` date DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `origin_date_time` datetime DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `destination_date_time` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `ticket_pic` varchar(255) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `rate_per_unit` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `restrictions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`restrictions`)),
  `total` decimal(10,2) DEFAULT NULL,
  `keyfield` varchar(255) DEFAULT NULL,
  `Qrcode` varchar(255) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `delete_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_flights`
--

INSERT INTO `travel_flights` (`id`, `traveler_id`, `pnr_no`, `flight_date`, `origin`, `origin_date_time`, `destination`, `destination_date_time`, `status`, `active`, `ticket_pic`, `weight`, `rate_per_unit`, `description`, `restrictions`, `total`, `keyfield`, `Qrcode`, `create_by`, `update_by`, `delete_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '00', '2026-01-21', '1', '2026-01-21 15:48:00', '7', '2026-01-21 19:48:00', 'Completed', 1, 'flights/tickets/ecFJwQNjUbFljgpf0Jr4ichvnxNpRXhucvZdvJC5.jpg', 10.00, 5.00, NULL, NULL, 50.00, NULL, NULL, 1, 1, NULL, NULL, '2026-01-01 09:48:55', '2026-01-03 17:55:34'),
(2, 1, '33', '2026-01-31', '2', '2026-01-31 17:14:00', '7', '2026-01-31 22:14:00', 'Completed', 1, 'flights/tickets/EmulXsFhu3kkDaIodCJyiu5n4Dw3avOHAPjmGl0t.jpg', 5.00, 5.00, NULL, NULL, 25.00, NULL, NULL, 1, 1, NULL, NULL, '2026-01-03 11:14:37', '2026-01-03 17:55:27'),
(3, 1, 'xx-909', '2026-01-31', '2', '2026-01-31 14:18:00', '7', '2026-01-31 19:18:00', 'Pending', 1, 'flights/tickets/V2gmZZnyX8XiqSAiPprJDighdsx05dtVyEbkjYv2.png', 10.00, 5.00, 'Traveling light with extra baggage allowance. happy to help', '[\"hello\",\"121\",\"1211\"]', 50.00, NULL, NULL, 1, 1, NULL, NULL, '2026-01-23 08:19:53', '2026-01-24 12:39:54');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'abc@abc.com', NULL, '$2y$12$91Kpof2DjTj9onZbAv5Bu.NJQR0Q9HLbAf8OhPf6lljU16dEsgLVi', NULL, '2026-01-01 09:50:57', '2026-01-01 09:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_requests`
--

CREATE TABLE `withdraw_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_master_id` bigint(20) UNSIGNED NOT NULL,
  `traveler_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `screenshot` varchar(255) DEFAULT NULL,
  `delete_by` varchar(255) DEFAULT NULL,
  `deleted_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdraw_requests`
--

INSERT INTO `withdraw_requests` (`id`, `inquiry_master_id`, `traveler_id`, `amount`, `status`, `screenshot`, `delete_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50.00, 'Completed', 'withdraw_screenshots/EZb8DpO7RScOo9eUlmzLh3LXFvQGx1H5CbGJG93x.png', NULL, NULL, '2026-01-02 14:24:43', '2026-01-02 14:43:58'),
(2, 2, 1, 20.00, 'Pending', 'withdraw_screenshots/Uoh0qAls1h4ZOeaTcxju3RFUEQGZD7Q0jrSmTOAH.jpg', NULL, NULL, '2026-01-03 17:49:01', '2026-01-05 12:54:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiry_detail`
--
ALTER TABLE `inquiry_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry_master`
--
ALTER TABLE `inquiry_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `travelers`
--
ALTER TABLE `travelers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `travelers_email_unique` (`email`);

--
-- Indexes for table `traveler_bank_accounts`
--
ALTER TABLE `traveler_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `traveler_bank_accounts_traveler_id_unique` (`traveler_id`);

--
-- Indexes for table `travel_flights`
--
ALTER TABLE `travel_flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `withdraw_requests_traveler_id_foreign` (`traveler_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiry_detail`
--
ALTER TABLE `inquiry_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiry_master`
--
ALTER TABLE `inquiry_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travelers`
--
ALTER TABLE `travelers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traveler_bank_accounts`
--
ALTER TABLE `traveler_bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travel_flights`
--
ALTER TABLE `travel_flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `traveler_bank_accounts`
--
ALTER TABLE `traveler_bank_accounts`
  ADD CONSTRAINT `traveler_bank_accounts_traveler_id_foreign` FOREIGN KEY (`traveler_id`) REFERENCES `travelers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `withdraw_requests`
--
ALTER TABLE `withdraw_requests`
  ADD CONSTRAINT `withdraw_requests_traveler_id_foreign` FOREIGN KEY (`traveler_id`) REFERENCES `travelers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
