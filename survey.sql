-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 23, 2021 lúc 03:36 PM
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
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `prototype_id` bigint(20) UNSIGNED NOT NULL,
  `properties_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `survey_id`, `prototype_id`, `properties_id`, `rating`, `created_at`, `updated_at`) VALUES
(13, 17, 14, 16, 2, '2021-04-22 15:11:08', '2021-04-23 13:21:27'),
(14, 17, 14, 17, 2, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(15, 17, 14, 18, 4, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(16, 17, 14, 19, 2, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(17, 17, 15, 16, 3, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(18, 17, 15, 17, 5, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(19, 17, 15, 18, 2, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(20, 17, 15, 19, 4, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(21, 17, 16, 16, 1, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(22, 17, 16, 17, 3, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(23, 17, 16, 18, 2, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(24, 17, 16, 19, 4, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(25, 17, 17, 16, 4, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(26, 17, 17, 17, 2, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(27, 17, 17, 18, 4, '2021-04-22 15:11:08', '2021-04-22 15:12:39'),
(28, 17, 17, 19, 4, '2021-04-22 15:11:08', '2021-04-22 15:12:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_survey_id_foreign` (`survey_id`),
  ADD KEY `ratings_prototype_id_foreign` (`prototype_id`),
  ADD KEY `ratings_properties_id_foreign` (`properties_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
