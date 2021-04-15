-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2021 lúc 07:21 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `survey`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_02_132154_create_surveys_table', 1),
(5, '2021_04_02_132216_create_properties_table', 1),
(6, '2021_04_02_132227_create_prototypes_table', 1),
(7, '2021_04_02_132235_create_ratings_table', 1),
(8, '2021_04_11_070259_add_level_to_rating_table', 2),
(9, '2021_04_11_071001_add_timestamps_to_prototypes_table', 3),
(10, '2021_04_13_043600_add_slug_surveys_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `properties` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `properties`
--

INSERT INTO `properties` (`id`, `properties`, `del_flag`, `created_at`, `updated_at`) VALUES
(1, 'tt1', 1, '2021-04-14 22:12:18', '2021-04-14 22:12:18'),
(2, 'tt1', 1, '2021-04-14 22:12:34', '2021-04-14 22:12:34'),
(3, 'tt1', 1, '2021-04-14 22:12:41', '2021-04-14 22:12:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prototypes`
--

CREATE TABLE `prototypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prototype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prototypes`
--

INSERT INTO `prototypes` (`id`, `prototype`, `del_flag`, `created_at`, `updated_at`) VALUES
(1, '12.jpg', 1, '2021-04-14 22:11:26', '2021-04-14 22:11:26'),
(2, '12.jpg', 1, '2021-04-14 22:12:18', '2021-04-14 22:12:18'),
(3, '12.jpg', 1, '2021-04-14 22:12:34', '2021-04-14 22:12:34'),
(4, '12.jpg', 1, '2021-04-14 22:12:41', '2021-04-14 22:12:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `prototype_id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `survey_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(4) NOT NULL DEFAULT 1,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `surveys`
--

INSERT INTO `surveys` (`id`, `user_id`, `survey_name`, `slug`, `del_flag`, `start_time`, `end_time`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Khảo sát áo chống nắng', '', 1, '2021-03-30 20:09:37', '2021-05-15 12:23:02', 'ĐATN cuối kì sinh viên', NULL, '2021-04-13 11:13:06'),
(2, 1, 'Khảo sát mua hàng', '', 1, NULL, NULL, 'Làm dự án', NULL, '2021-04-06 09:55:06'),
(3, 1, 'khảo sát', 'khao-sat', 0, '2021-04-13 12:15:33', NULL, 'abc', NULL, '2021-04-14 10:09:13'),
(4, 1, 'khảo sát test', 'khao-sat-test', 1, '2021-04-14 17:32:25', NULL, 'mục đích test', '2021-04-14 10:32:25', '2021-04-14 10:32:25'),
(5, 1, 'khảo sát test', 'khao-sat-test', 1, '2021-04-14 17:35:34', NULL, 'mục đích test', '2021-04-14 10:35:34', '2021-04-14 10:35:34'),
(6, 1, 'khảo sát test', 'khao-sat-test', 1, '2021-04-14 17:40:12', NULL, 'mục đích test', '2021-04-14 10:40:12', '2021-04-14 10:40:12'),
(7, 1, 'khảo sát test', 'khao-sat-test', 1, '2021-04-14 17:40:15', NULL, 'mục đích test', '2021-04-14 10:40:15', '2021-04-14 10:40:15'),
(8, 1, 'khảo sát test', 'khao-sat-test', 1, '2021-04-14 17:40:28', NULL, 'mục đích test', '2021-04-14 10:40:28', '2021-04-14 10:40:28'),
(9, 1, 'khảo sát test', 'khao-sat-test', 1, '2021-04-14 17:57:28', NULL, 'mục đích test', '2021-04-14 10:57:28', '2021-04-14 10:57:28'),
(10, 1, 'Khảo sát áo chống nắng', 'khao-sat-ao-chong-nang', 1, '2021-04-15 04:13:19', NULL, 'abc', '2021-04-14 21:13:19', '2021-04-14 21:13:19'),
(11, 1, 'Khảo sát áo chống nắng', 'khao-sat-ao-chong-nang', 1, '2021-04-15 05:11:26', NULL, 'abc', '2021-04-14 22:11:26', '2021-04-14 22:11:26'),
(12, 1, 'Khảo sát áo chống nắng', 'khao-sat-ao-chong-nang', 1, '2021-04-15 05:12:18', NULL, 'abc', '2021-04-14 22:12:18', '2021-04-14 22:12:18'),
(13, 1, 'Khảo sát áo chống nắng', 'khao-sat-ao-chong-nang', 1, '2021-04-15 05:12:34', NULL, 'abc', '2021-04-14 22:12:34', '2021-04-14 22:12:34'),
(14, 1, 'Khảo sát áo chống nắng', 'khao-sat-ao-chong-nang', 1, '2021-04-15 05:12:41', NULL, 'abc', '2021-04-14 22:12:41', '2021-04-14 22:12:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Le Thanh Nam', 'lethanhnam46@gmail.com', '$2y$10$MklT7oCMQgnoDyL4RTxOf.r.YQJzsBJHTBKlBBkPQwinjwsHBzjHS', '2021-04-05 08:24:52', '2021-04-05 08:24:52'),
(2, 'test', 'test@gmail.com', '$2y$10$JkA2RGMSIxckYza1NZW1h.FOSRRliGaDsrmoO1fJN9wcNwb4x0.Zi', '2021-04-13 06:46:38', '2021-04-13 06:46:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prototypes`
--
ALTER TABLE `prototypes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ratings_level_unique` (`level`),
  ADD KEY `ratings_survey_id_foreign` (`survey_id`),
  ADD KEY `ratings_prototype_id_foreign` (`prototype_id`),
  ADD KEY `ratings_properties_id_foreign` (`properties_id`);

--
-- Chỉ mục cho bảng `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surveys_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `prototypes`
--
ALTER TABLE `prototypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_properties_id_foreign` FOREIGN KEY (`properties_id`) REFERENCES `properties` (`id`),
  ADD CONSTRAINT `ratings_prototype_id_foreign` FOREIGN KEY (`prototype_id`) REFERENCES `prototypes` (`id`),
  ADD CONSTRAINT `ratings_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`);

--
-- Các ràng buộc cho bảng `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
