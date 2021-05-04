-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 04:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

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
(2, '2021_04_02_132154_create_surveys_table', 1),
(3, '2021_04_02_132216_create_properties_table', 1),
(4, '2021_04_02_132227_create_prototypes_table', 1),
(5, '2021_04_02_132235_create_ratings_table', 1),
(6, '2021_04_23_205519_create_prototype_properties_table', 1),
(7, '2021_04_24_164210_create_results_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `properties_name`, `weight`, `created_at`, `updated_at`) VALUES
(68, 'chống mưa', 20, '2021-04-25 05:05:51', NULL),
(69, 'chống gió', 10, '2021-04-25 05:05:51', NULL),
(70, 'chống nắng', 12, '2021-04-25 05:05:51', NULL),
(71, 'Độ tiện dụng', 23, '2021-04-25 05:05:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prototypes`
--

CREATE TABLE `prototypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `prototype_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prototypes`
--

INSERT INTO `prototypes` (`id`, `survey_id`, `prototype_name`, `created_at`, `updated_at`) VALUES
(28, 27, '2021-04-25__1.jpg', '2021-04-25 05:05:51', NULL),
(29, 27, '2021-04-25__2.jpg', '2021-04-25 05:05:51', NULL),
(30, 27, '2021-04-25__3.jpg', '2021-04-25 05:05:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prototypes_properties`
--

CREATE TABLE `prototypes_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prototype_id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prototypes_properties`
--

INSERT INTO `prototypes_properties` (`id`, `prototype_id`, `properties_id`, `created_at`, `updated_at`) VALUES
(47, 28, 68, '2021-04-25 05:05:51', NULL),
(48, 28, 69, '2021-04-25 05:05:51', NULL),
(49, 28, 70, '2021-04-25 05:05:51', NULL),
(50, 28, 71, '2021-04-25 05:05:51', NULL),
(51, 29, 68, '2021-04-25 05:05:51', NULL),
(52, 29, 69, '2021-04-25 05:05:51', NULL),
(53, 29, 70, '2021-04-25 05:05:51', NULL),
(54, 29, 71, '2021-04-25 05:05:51', NULL),
(55, 30, 68, '2021-04-25 05:05:51', NULL),
(56, 30, 69, '2021-04-25 05:05:51', NULL),
(57, 30, 70, '2021-04-25 05:05:51', NULL),
(58, 30, 71, '2021-04-25 05:05:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `survey_id`, `created_at`, `updated_at`) VALUES
(20, 27, '2021-04-25 10:25:33', NULL),
(21, 27, '2021-04-25 10:36:09', NULL),
(22, 27, '2021-04-25 17:33:34', NULL),
(23, 27, '2021-04-25 17:33:46', NULL),
(24, 27, '2021-04-25 17:34:03', NULL),
(25, 27, '2021-04-25 17:39:47', NULL),
(26, 27, '2021-04-25 17:40:04', NULL),
(27, 27, '2021-04-25 17:42:45', NULL),
(28, 27, '2021-04-25 17:45:31', NULL),
(29, 27, '2021-04-25 17:46:11', NULL),
(30, 27, '2021-04-25 17:46:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating_id` bigint(20) UNSIGNED NOT NULL,
  `prototype_id` bigint(20) NOT NULL,
  `properties_id` bigint(20) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `weighted_score` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `rating_id`, `prototype_id`, `properties_id`, `rating`, `weighted_score`, `created_at`, `updated_at`) VALUES
(13, 20, 28, 68, 5, 1.00, '2021-04-25 10:25:33', NULL),
(14, 20, 29, 68, 5, 1.00, '2021-04-25 10:25:33', NULL),
(15, 20, 30, 68, 5, 1.00, '2021-04-25 10:25:33', NULL),
(16, 20, 28, 69, 5, 0.50, '2021-04-25 10:25:33', NULL),
(17, 20, 29, 69, 5, 0.50, '2021-04-25 10:25:33', NULL),
(18, 20, 30, 69, 5, 0.50, '2021-04-25 10:25:33', NULL),
(19, 20, 28, 70, 5, 0.60, '2021-04-25 10:25:33', NULL),
(20, 20, 29, 70, 5, 0.60, '2021-04-25 10:25:33', NULL),
(21, 20, 30, 70, 5, 0.60, '2021-04-25 10:25:33', NULL),
(22, 20, 28, 71, 5, 1.15, '2021-04-25 10:25:33', NULL),
(23, 20, 29, 71, 5, 1.15, '2021-04-25 10:25:33', NULL),
(24, 20, 30, 71, 5, 1.15, '2021-04-25 10:25:33', NULL),
(25, 21, 28, 68, 1, 0.20, '2021-04-25 10:36:09', NULL),
(26, 21, 29, 68, 1, 0.20, '2021-04-25 10:36:09', NULL),
(27, 21, 30, 68, 1, 0.20, '2021-04-25 10:36:09', NULL),
(28, 21, 28, 69, 1, 0.10, '2021-04-25 10:36:09', NULL),
(29, 21, 29, 69, 1, 0.10, '2021-04-25 10:36:09', NULL),
(30, 21, 30, 69, 1, 0.10, '2021-04-25 10:36:09', NULL),
(31, 21, 28, 70, 1, 0.12, '2021-04-25 10:36:09', NULL),
(32, 21, 29, 70, 1, 0.12, '2021-04-25 10:36:09', NULL),
(33, 21, 30, 70, 1, 0.12, '2021-04-25 10:36:09', NULL),
(34, 21, 28, 71, 1, 0.23, '2021-04-25 10:36:09', NULL),
(35, 21, 29, 71, 1, 0.23, '2021-04-25 10:36:09', NULL),
(36, 21, 30, 71, 1, 0.23, '2021-04-25 10:36:09', NULL),
(37, 23, 28, 68, 1, 0.20, '2021-04-25 17:33:46', NULL),
(38, 23, 29, 68, 2, 0.40, '2021-04-25 17:33:46', NULL),
(39, 23, 28, 69, 2, 0.20, '2021-04-25 17:33:46', NULL),
(40, 24, 28, 68, 1, 0.20, '2021-04-25 17:34:03', NULL),
(41, 24, 29, 68, 2, 0.40, '2021-04-25 17:34:03', NULL),
(42, 24, 30, 68, 2, 0.40, '2021-04-25 17:34:03', NULL),
(43, 24, 28, 69, 2, 0.20, '2021-04-25 17:34:03', NULL),
(44, 24, 29, 69, 4, 0.40, '2021-04-25 17:34:03', NULL),
(45, 24, 30, 69, 2, 0.20, '2021-04-25 17:34:03', NULL),
(46, 24, 28, 70, 4, 0.48, '2021-04-25 17:34:03', NULL),
(47, 24, 29, 70, 4, 0.48, '2021-04-25 17:34:03', NULL),
(48, 24, 30, 70, 4, 0.48, '2021-04-25 17:34:03', NULL),
(49, 24, 28, 71, 4, 0.92, '2021-04-25 17:34:03', NULL),
(50, 24, 29, 71, 5, 1.15, '2021-04-25 17:34:03', NULL),
(51, 24, 30, 71, 4, 0.92, '2021-04-25 17:34:03', NULL),
(52, 25, 28, 68, 1, 0.20, '2021-04-25 17:39:47', NULL),
(53, 25, 29, 68, 2, 0.40, '2021-04-25 17:39:47', NULL),
(54, 25, 30, 68, 2, 0.40, '2021-04-25 17:39:47', NULL),
(55, 25, 28, 69, 2, 0.20, '2021-04-25 17:39:47', NULL),
(56, 25, 29, 69, 4, 0.40, '2021-04-25 17:39:47', NULL),
(57, 25, 30, 69, 2, 0.20, '2021-04-25 17:39:47', NULL),
(58, 25, 28, 70, 4, 0.48, '2021-04-25 17:39:47', NULL),
(59, 25, 29, 70, 4, 0.48, '2021-04-25 17:39:47', NULL),
(60, 25, 30, 70, 4, 0.48, '2021-04-25 17:39:47', NULL),
(61, 25, 28, 71, 4, 0.92, '2021-04-25 17:39:47', NULL),
(62, 25, 29, 71, 5, 1.15, '2021-04-25 17:39:47', NULL),
(63, 25, 30, 71, 4, 0.92, '2021-04-25 17:39:47', NULL),
(64, 26, 28, 68, 1, 0.20, '2021-04-25 17:40:04', NULL),
(65, 26, 29, 68, 2, 0.40, '2021-04-25 17:40:04', NULL),
(66, 26, 30, 68, 2, 0.40, '2021-04-25 17:40:04', NULL),
(67, 26, 28, 69, 2, 0.20, '2021-04-25 17:40:04', NULL),
(68, 26, 29, 69, 4, 0.40, '2021-04-25 17:40:04', NULL),
(69, 26, 30, 69, 2, 0.20, '2021-04-25 17:40:04', NULL),
(70, 26, 28, 70, 4, 0.48, '2021-04-25 17:40:04', NULL),
(71, 26, 29, 70, 4, 0.48, '2021-04-25 17:40:04', NULL),
(72, 26, 30, 70, 4, 0.48, '2021-04-25 17:40:04', NULL),
(73, 26, 28, 71, 4, 0.92, '2021-04-25 17:40:04', NULL),
(74, 26, 29, 71, 5, 1.15, '2021-04-25 17:40:04', NULL),
(75, 26, 30, 71, 4, 0.92, '2021-04-25 17:40:04', NULL),
(76, 27, 28, 68, 1, 0.20, '2021-04-25 17:42:46', NULL),
(77, 27, 29, 68, 2, 0.40, '2021-04-25 17:42:46', NULL),
(78, 27, 30, 68, 2, 0.40, '2021-04-25 17:42:46', NULL),
(79, 27, 28, 69, 2, 0.20, '2021-04-25 17:42:46', NULL),
(80, 27, 29, 69, 4, 0.40, '2021-04-25 17:42:46', NULL),
(81, 27, 30, 69, 2, 0.20, '2021-04-25 17:42:46', NULL),
(82, 27, 28, 70, 4, 0.48, '2021-04-25 17:42:46', NULL),
(83, 27, 29, 70, 4, 0.48, '2021-04-25 17:42:46', NULL),
(84, 27, 30, 70, 4, 0.48, '2021-04-25 17:42:46', NULL),
(85, 27, 28, 71, 4, 0.92, '2021-04-25 17:42:46', NULL),
(86, 27, 29, 71, 5, 1.15, '2021-04-25 17:42:46', NULL),
(87, 27, 30, 71, 4, 0.92, '2021-04-25 17:42:46', NULL),
(88, 28, 28, 68, 1, 0.20, '2021-04-25 17:45:31', NULL),
(89, 28, 29, 68, 2, 0.40, '2021-04-25 17:45:31', NULL),
(90, 28, 30, 68, 2, 0.40, '2021-04-25 17:45:31', NULL),
(91, 28, 28, 69, 2, 0.20, '2021-04-25 17:45:31', NULL),
(92, 28, 29, 69, 4, 0.40, '2021-04-25 17:45:31', NULL),
(93, 28, 30, 69, 2, 0.20, '2021-04-25 17:45:31', NULL),
(94, 28, 28, 70, 4, 0.48, '2021-04-25 17:45:31', NULL),
(95, 28, 29, 70, 4, 0.48, '2021-04-25 17:45:31', NULL),
(96, 28, 30, 70, 4, 0.48, '2021-04-25 17:45:31', NULL),
(97, 28, 28, 71, 4, 0.92, '2021-04-25 17:45:31', NULL),
(98, 28, 29, 71, 5, 1.15, '2021-04-25 17:45:31', NULL),
(99, 28, 30, 71, 4, 0.92, '2021-04-25 17:45:31', NULL),
(100, 29, 28, 68, 1, 0.20, '2021-04-25 17:46:11', NULL),
(101, 29, 29, 68, 2, 0.40, '2021-04-25 17:46:11', NULL),
(102, 29, 30, 68, 2, 0.40, '2021-04-25 17:46:11', NULL),
(103, 29, 28, 69, 2, 0.20, '2021-04-25 17:46:11', NULL),
(104, 29, 29, 69, 4, 0.40, '2021-04-25 17:46:11', NULL),
(105, 29, 30, 69, 2, 0.20, '2021-04-25 17:46:11', NULL),
(106, 29, 28, 70, 4, 0.48, '2021-04-25 17:46:11', NULL),
(107, 29, 29, 70, 4, 0.48, '2021-04-25 17:46:11', NULL),
(108, 29, 30, 70, 4, 0.48, '2021-04-25 17:46:11', NULL),
(109, 29, 28, 71, 4, 0.92, '2021-04-25 17:46:11', NULL),
(110, 29, 29, 71, 5, 1.15, '2021-04-25 17:46:11', NULL),
(111, 29, 30, 71, 4, 0.92, '2021-04-25 17:46:11', NULL),
(112, 30, 28, 68, 1, 0.20, '2021-04-25 17:46:42', NULL),
(113, 30, 29, 68, 2, 0.40, '2021-04-25 17:46:42', NULL),
(114, 30, 30, 68, 2, 0.40, '2021-04-25 17:46:42', NULL),
(115, 30, 28, 69, 2, 0.20, '2021-04-25 17:46:42', NULL),
(116, 30, 29, 69, 4, 0.40, '2021-04-25 17:46:42', NULL),
(117, 30, 30, 69, 2, 0.20, '2021-04-25 17:46:42', NULL),
(118, 30, 28, 70, 4, 0.48, '2021-04-25 17:46:42', NULL),
(119, 30, 29, 70, 4, 0.48, '2021-04-25 17:46:42', NULL),
(120, 30, 30, 70, 4, 0.48, '2021-04-25 17:46:42', NULL),
(121, 30, 28, 71, 4, 0.92, '2021-04-25 17:46:42', NULL),
(122, 30, 29, 71, 5, 1.15, '2021-04-25 17:46:42', NULL),
(123, 30, 30, 71, 4, 0.92, '2021-04-25 17:46:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `survey_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `user_id`, `survey_name`, `slug`, `level`, `del_flag`, `note`, `created_at`, `updated_at`) VALUES
(27, 1, 'Khảo sát áo chống nắng', 'khao-sat-ao-chong-nang', 5, 1, 'Project cuối kì', '2021-04-25 05:05:51', '2021-04-25 07:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Le Thanh Nam', 'lethanhnam46@gmail.com', '$2y$10$ZHu6HnTJxWzqRLOOne9ve.SXSv1Ha7i.mbFzONROW892oQIKcjJSK', '2021-04-24 10:31:20', '2021-04-24 10:31:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prototypes`
--
ALTER TABLE `prototypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prototypes_survey_id_foreign` (`survey_id`);

--
-- Indexes for table `prototypes_properties`
--
ALTER TABLE `prototypes_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prototypes_properties_prototype_id_index` (`prototype_id`),
  ADD KEY `prototypes_properties_properties_id_index` (`properties_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_survey_id_foreign` (`survey_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_rating_id_foreign` (`rating_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surveys_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `prototypes`
--
ALTER TABLE `prototypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `prototypes_properties`
--
ALTER TABLE `prototypes_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prototypes`
--
ALTER TABLE `prototypes`
  ADD CONSTRAINT `prototypes_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`);

--
-- Constraints for table `prototypes_properties`
--
ALTER TABLE `prototypes_properties`
  ADD CONSTRAINT `prototypes_properties_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prototypes_properties_prototype_id_foreign` FOREIGN KEY (`prototype_id`) REFERENCES `prototypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `ratings` (`id`);

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
