-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2023 at 07:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drone_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `drones`
--

CREATE TABLE `drones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `bettery` varchar(255) NOT NULL,
  `instruction_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drones`
--

INSERT INTO `drones` (`id`, `type`, `bettery`, `instruction_id`, `plan_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'SPRAY', '42000', 1, 1, 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 'MAPPING', '20000', 2, 2, 2, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 'SPRAY', '50000', 3, 3, 3, '2023-05-27 01:16:52', '2023-05-27 01:16:52');

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
-- Table structure for table `farms`
--

CREATE TABLE `farms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Apple Farm', 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 'Orange Farm', 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 'Rice Farm', 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speed` int(11) NOT NULL,
  `altitude` varchar(255) NOT NULL,
  `start_plan` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `speed`, `altitude`, `start_plan`, `created_at`, `updated_at`) VALUES
(1, 100, '100m', 0, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 200, '200m', 0, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 300, '300m', 0, '2023-05-27 01:16:52', '2023-05-27 01:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `latitude` double(8,2) NOT NULL,
  `longitude` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 12121.22, 12133.22, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 34566.22, 1234.22, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 3456.22, 2223.22, '2023-05-27 01:16:52', '2023-05-27 01:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `drone_id` bigint(20) UNSIGNED NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `image_name`, `height`, `width`, `drone_id`, `farm_id`, `created_at`, `updated_at`) VALUES
(1, 'farm1.png', 200, 150, 1, 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 'farm2.png', 200, 150, 1, 2, '2023-05-27 01:16:52', '2023-05-27 01:16:52');

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
(1, '2012_05_22_123723_create_provinces_table', 1),
(2, '2013_05_22_123834_create_farms_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_05_22_123638_create_locations_table', 1),
(8, '2023_05_22_124025_create_plans_table', 1),
(9, '2023_05_22_124103_create_instructions_table', 1),
(10, '2023_05_24_170024_create_drones_table', 1),
(11, '2023_05_24_170127_create_maps_table', 1);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'API Token', 'de35b4bd98b2f0db89759def4230c054247648b14cd53714dcd047691d58cafa', '[\"select\",\"create\",\"delete\",\"update\"]', '2023-05-27 01:27:43', NULL, '2023-05-27 01:25:57', '2023-05-27 01:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `area` varchar(255) NOT NULL,
  `density` int(11) NOT NULL,
  `farm_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `type`, `datetime`, `area`, `density`, `farm_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Order1', 'SPAY', '2023-06-10 23:59:59', 'POLYGON(1223.23, 1232.545, 326554.323, 323231.6132, 32323.434)', 299, 1, 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 'Order2', 'MAPPING', '2023-06-10 23:59:59', 'POLYGON(1223.23, 1232.545, 326554.323, 323231.6132, 32323.434)', 300, 2, 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 'Order3', 'SPAY', '2023-06-10 23:59:59', 'POLYGON(1223.23, 1232.545, 326554.323, 323231.6132, 32323.434)', 400, 1, 1, '2023-05-27 01:16:52', '2023-05-27 01:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Battambang', '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 'KompongCham', '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 'Phnom Penh', '2023-05-27 01:16:52', '2023-05-27 01:16:52');

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
  `role` varchar(255) NOT NULL DEFAULT 'farmer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'visal', 'sal@gmail.com', NULL, '$2y$10$mF29I1jp2KWlAu2MIBscT.vZn6g1MkD8GIrBaEICbHSJTZYqsqMRC', 'farmer', NULL, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(2, 'navin', 'navin@gmail.com', NULL, '$2y$10$xehDksHAc2eGFcWEiuhEnOrRRyIUHFVmKoIP4UDrkY0kv8eHyqcO6', 'farmer', NULL, '2023-05-27 01:16:52', '2023-05-27 01:16:52'),
(3, 'sal', 'sal24fdd@gmail.com', NULL, '$2y$10$RwXmGal/sp04vc73EkJ1k.O3hbQQNvHjcTGVFPnsvtgDPHqGaug1K', 'farmer', NULL, '2023-05-27 01:25:57', '2023-05-27 01:25:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drones`
--
ALTER TABLE `drones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drones_instruction_id_foreign` (`instruction_id`),
  ADD KEY `drones_plan_id_foreign` (`plan_id`),
  ADD KEY `drones_location_id_foreign` (`location_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farms_province_id_foreign` (`province_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maps_drone_id_foreign` (`drone_id`),
  ADD KEY `maps_farm_id_foreign` (`farm_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plans_farm_id_foreign` (`farm_id`),
  ADD KEY `plans_user_id_foreign` (`user_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinces_name_unique` (`name`);

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
-- AUTO_INCREMENT for table `drones`
--
ALTER TABLE `drones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farms`
--
ALTER TABLE `farms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drones`
--
ALTER TABLE `drones`
  ADD CONSTRAINT `drones_instruction_id_foreign` FOREIGN KEY (`instruction_id`) REFERENCES `instructions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drones_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drones_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farms`
--
ALTER TABLE `farms`
  ADD CONSTRAINT `farms_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maps`
--
ALTER TABLE `maps`
  ADD CONSTRAINT `maps_drone_id_foreign` FOREIGN KEY (`drone_id`) REFERENCES `drones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maps_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
