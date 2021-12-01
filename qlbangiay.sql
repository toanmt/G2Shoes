-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 01, 2021 lúc 02:33 PM
-- Phiên bản máy phục vụ: 5.7.33
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`username`, `password`, `created_at`, `updated_at`) VALUES
('admin', '$2y$10$2.95q9FqnEKWgjHh/tZnVOB1y8L60xbViK3HNraeAQFZO9CAx880m', '2021-11-17 08:06:57', '2021-11-17 09:04:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Converse', '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(2, 'Vans', '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(3, 'Adidas', '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(4, 'Nike', '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(5, 'Puma', '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(6, 'Domba', '2021-11-17 08:06:57', '2021-11-17 08:06:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'cv_classic1_anh1.webp', 1, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(2, 'cv_classic1_anh2.webp', 1, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(3, 'cv_classic2_anh1.webp', 2, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(4, 'cv_classic2_anh2.webp', 2, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(5, 'cv_classic3_anh1.webp', 3, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(6, 'cv_classic3_anh2.webp', 3, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(7, 'cv_classic4_anh1.webp', 4, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(8, 'cv_classic4_anh2.webp', 4, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(9, 'vans_oldskool1_anh1.webp', 5, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(10, 'vans_oldskool1_anh2.webp', 5, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(11, 'vans_oldskool2_anh1.webp', 6, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(12, 'vans_oldskool2_anh2.webp', 6, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(13, 'vans_oldskool3_anh1.webp', 7, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(14, 'vans_oldskool3_anh2.webp', 7, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(15, 'vans_oldskool4_anh1.webp', 8, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(16, 'vans_oldskool4_anh2.webp', 8, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(17, 'adidas_superstar1_anh1.webp', 9, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(18, 'adidas_superstar1_anh2.webp', 9, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(19, 'adidas_superstar2_anh1.webp', 10, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(20, 'adidas_superstar2_anh2.webp', 10, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(21, 'adidas_superstar3_anh1.webp', 11, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(22, 'adidas_superstar3_anh2.webp', 11, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(23, 'adidas_superstar4_anh1.webp', 12, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(24, 'adidas_superstar4_anh2.webp', 12, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(25, 'nike_airforced1_anh1.webp', 13, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(26, 'nike_airforced1_anh2.webp', 13, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(27, 'nike_airforced2_anh1.webp', 14, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(28, 'nike_airforced2_anh2.webp', 14, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(29, 'nike_airforced3_anh1.webp', 15, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(30, 'nike_airforced3_anh2.webp', 15, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(31, 'nike_airforced4_anh1.webp', 16, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(32, 'nike_airforced4_anh2.webp', 16, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(33, 'puma_suede1_anh1.webp', 17, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(34, 'puma_suede1_anh2.webp', 17, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(35, 'puma_suede2_anh1.webp', 18, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(36, 'puma_suede2_anh2.webp', 18, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(37, 'domba_highpoint1_anh1.webp', 19, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(38, 'domba_highpoint1_anh2.webp', 19, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(39, 'domba_highpoint2_anh1.webp', 20, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(40, 'domba_highpoint2_anh2.webp', 20, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(41, 'vans_oldskool5_anh1.webp', 21, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(42, 'vans_oldskool5_anh2.webp', 21, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(43, 'vans_oldskool6_anh1.webp', 22, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(44, 'vans_oldskool6_anh2.webp', 22, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(45, 'vans_oldskool7_anh1.webp', 23, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(46, 'vans_oldskool7_anh2.webp', 23, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(47, 'vans_oldskool8_anh1.webp', 24, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(48, 'vans_oldskool8_anh2.webp', 24, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(49, 'vans_oldskool9_anh1.webp', 25, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(50, 'vans_oldskool9_anh2.webp', 25, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(51, 'vans_oldskool10_anh1.webp', 26, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(52, 'vans_oldskool10_anh2.webp', 26, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(53, 'vans_oldskool11_anh1.webp', 27, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(54, 'vans_oldskool11_anh2.webp', 27, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(55, 'vans_oldskool12_anh1.webp', 28, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(56, 'vans_oldskool12_anh2.webp', 28, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(57, 'vans_oldskool13_anh1.webp', 29, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(58, 'vans_oldskool13_anh2.webp', 29, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(59, 'vans_authentic1_anh1.webp', 30, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(60, 'vans_authentic1_anh2.webp', 30, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(61, 'vans_authentic2_anh1.webp', 31, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(62, 'vans_authentic2_anh2.webp', 31, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(63, 'vans_authentic3_anh1.webp', 32, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(64, 'vans_authentic3_anh2.webp', 32, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(65, 'cv_classic5_anh1.webp', 33, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(66, 'cv_classic5_anh2.webp', 33, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(67, 'cv_chuck1_anh1.webp', 34, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(68, 'cv_chuck1_anh2.webp', 34, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(69, 'cv_chuck2_anh1.webp', 35, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(70, 'cv_chuck2_anh2.webp', 35, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(71, 'cv_chuck3_anh1.webp', 36, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(72, 'cv_chuck3_anh2.webp', 36, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(73, 'adidas_superstar5_anh1.webp', 37, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(74, 'adidas_superstar5_anh2.webp', 37, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(75, 'adidas_superstar6_anh1.webp', 38, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(76, 'adidas_superstar6_anh2.webp', 38, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(77, 'adidas_superstar7_anh1.webp', 39, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(78, 'adidas_superstar7_anh2.webp', 39, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(79, 'adidas_ultraboost1_anh1.webp', 40, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(80, 'adidas_ultraboost1_anh2.webp', 40, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(81, 'adidas_ultraboost2_anh1.webp', 41, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(82, 'adidas_ultraboost2_anh2.webp', 41, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(83, 'adidas_ultraboost3_anh1.webp', 42, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(84, 'adidas_ultraboost3_anh2.webp', 42, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(85, 'adidas_ultraboost4_anh1.webp', 43, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(86, 'adidas_ultraboost4_anh2.webp', 43, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(87, 'nike_airforced5_anh1.webp', 44, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(88, 'nike_airforced5_anh2.webp', 44, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(89, 'nike_airforced6_anh1.webp', 45, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(90, 'nike_airforced6_anh2.webp', 45, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(91, 'nike_blazer1_anh1.webp', 46, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(92, 'nike_blazer1_anh2.webp', 46, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(93, 'nike_blazer2_anh1.webp', 47, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(94, 'nike_blazer2_anh2.webp', 47, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(95, 'nike_blazer3_anh1.webp', 48, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(96, 'nike_blazer3_anh2.webp', 48, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(97, 'nike_blazer4_anh1.webp', 49, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(98, 'nike_blazer4_anh2.webp', 49, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(99, 'nike_blazer5_anh1.webp', 50, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(100, 'nike_blazer5_anh2.webp', 50, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(101, 'adidas_superstar1_anh1.webp', 51, '2021-11-18 16:58:39', '2021-11-18 16:58:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` double NOT NULL,
  `status` tinyint(1) NOT NULL,
  `voucher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoices`
--

INSERT INTO `invoices` (`id`, `customer_name`, `phone`, `address`, `email`, `shipping_cost`, `status`, `voucher_id`, `created_at`, `updated_at`) VALUES
(1, 'àdsfasd', '324123412', '154151315', '12431423421', 30, 1, 9, '2021-11-30 17:00:00', '2021-11-30 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_details`
--

INSERT INTO `invoice_details` (`invoice_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 11, 10, '2021-11-30 17:00:00', '2021-11-30 17:00:00');

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
(13, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(14, '2021_10_29_162423_create_admins_table', 1),
(15, '2021_10_29_163012_create_brands_table', 1),
(16, '2021_10_29_163317_create_types_table', 1),
(17, '2021_10_29_163805_create_sizes_table', 1),
(18, '2021_10_29_164201_create_products_table', 1),
(19, '2021_10_29_164817_create_comments_table', 1),
(20, '2021_10_29_165113_create_vouchers_table', 1),
(21, '2021_10_29_165625_create_invoices_table', 1),
(22, '2021_10_29_170257_create_invoice_details_table', 1),
(23, '2021_10_31_140541_create_product_sizes_table', 1),
(24, '2021_10_31_141656_create_images_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `updated_at`) VALUES
('vantien2000@gmail.com', '2KAfm2rTbD9vOGogmdmrZDjzFQgkPHmZtd6GTcXU', '2021-10-29 20:48:33', '2021-10-29 20:48:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `discount` int(11) NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `discount`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'Converse Classic Low White', 800000, 0, 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(2, 'Converse Classic High Black', 850000, 0, 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(3, 'Converse Classic Custom Glitter', 820000, 5, 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(4, 'Converse Classic Custom All Star', 900000, 4, 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(5, 'Vans Old Skool Pig Suede', 976000, 4, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(6, 'Vans Old Skool Gremlins', 800000, 5, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(7, 'Vans Old Skool Mixed Corduroy', 900000, 5, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(8, 'Vans Old Skool Eco Theory', 800000, 10, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(9, 'Adidas Exhibit Low', 760000, 6, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(10, 'Adidas Stan Smith Green', 940000, 10, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(11, 'Adidas 4D Fusio', 780000, 10, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(12, 'Adidas SuperEarth SW', 900000, 5, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(13, 'Nike Air Force 1 Colorful', 980000, 0, 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(14, 'Nike Airmax Axis Triplewhite', 790000, 3, 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(15, 'Nike Airmax 97 WMN The Future', 900000, 0, 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(16, 'Nike Jordan Mid Turf Orange', 999000, 0, 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(17, 'Puma Suede Classic Peacoat-White', 800000, 0, 5, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(18, 'Puma Suede Black Fives Phantom', 980000, 0, 5, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(19, 'Domba Highpoint 2 Gold Metallic', 990000, 20, 6, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(20, 'Domba Highpoint 2 Silver Metallic', 999000, 20, 6, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(21, 'Vans Old Skool The Exorcist', 800000, 0, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(22, 'Vans Old Skool Cozy Mule', 700000, 0, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(23, 'Vans Old Skool Loteria', 900000, 0, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(24, 'Vans Old Skool Beetlejuice', 800000, 5, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(25, 'Vans Old Skool Moca Frances', 650000, 0, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(26, 'Vans Old Skool Fangs', 750000, 0, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(27, 'Vans Old Skool Anaheim Factory', 980000, 3, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(28, 'Vans Old Skool Classic Sport', 800000, 2, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(29, 'Vans Old Skool Canvas', 990000, 0, 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(30, 'Vans Authentic Classic', 600000, 2, 8, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(31, 'Vans Authentic Beetlejuice', 800000, 0, 8, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(32, 'Vans Authentic Gumsole', 500000, 0, 8, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(33, 'Converse Classic Oregon Ducks', 900000, 2, 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(34, 'Converse Chuck 70S Court Reimagined', 900000, 7, 7, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(35, 'Converse Chuck 70S Boston Celtics', 800000, 3, 7, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(36, 'Converse Chuck 70S Los Angeles', 900000, 0, 7, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(37, 'Adidas Superstar Slip-On', 750000, 3, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(38, 'Adidas Superstar Simpsons Squishee', 800000, 0, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(39, 'Adidas Superstar X LEGO®', 900000, 5, 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(40, 'Adidas Ultraboost 21', 700000, 3, 9, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(41, 'Adidas Ultraboost 21 Tokyo', 750000, 3, 9, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(42, 'Adidas Ultraboost Response', 780000, 0, 9, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(43, 'Adidas Ultraboost Parley', 700000, 2, 9, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(44, 'Nike Air Force 1 White Love For All', 800000, 3, 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(45, 'Nike Air Max 97 Pink Cream', 690000, 0, 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(46, 'Nike Blazer Low 77 Premium', 800000, 6, 10, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(47, 'Nike Blazer Mid 77 Cozi', 720000, 0, 10, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(48, 'Nike Blazer Mid 77 Vintage', 734000, 3, 10, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(49, 'Nike Blazer Low Pro GT', 800000, 5, 10, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(50, 'Nike Blazer SB Zoom Premium', 960000, 10, 10, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(51, 'vantien2k', 1200000, 1, 5, '2021-11-18 16:58:39', '2021-11-18 16:58:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sizes`
--

CREATE TABLE `product_sizes` (
  `size_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_sizes`
--

INSERT INTO `product_sizes` (`size_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, 3, 150, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(3, 17, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(4, 4, 100, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(6, 1, 100, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(6, 12, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(6, 18, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(6, 19, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(7, 4, 100, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(7, 13, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(7, 18, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(9, 2, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(9, 6, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(10, 6, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(10, 9, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(11, 7, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(11, 20, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(12, 7, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(13, 15, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(14, 8, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(14, 15, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(15, 8, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(15, 10, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(16, 9, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(16, 10, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(16, 11, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(16, 16, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(17, 11, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(17, 16, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58'),
(18, 20, 200, '2021-11-17 08:06:58', '2021-11-17 08:06:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_number` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size_number`, `created_at`, `updated_at`) VALUES
(3, 36.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(4, 36.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(6, 37.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(7, 38.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(9, 39.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(10, 39.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(11, 40.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(12, 40.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(13, 41.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(14, 41.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(15, 42.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(16, 42.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(17, 43.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(18, 43.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(19, 44.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(20, 44.50, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(21, 45.00, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(22, 34.00, '2021-11-22 19:13:21', '2021-11-22 19:13:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `type_name`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'Converse CLASSIC', 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(2, 'Vans OLD SKOOL', 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(3, 'Adidas SUPERSTAR', 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(4, 'Nike AIR FORCE', 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(5, 'Puma SUEDE', 5, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(6, 'Domba HIGHPOINT', 6, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(7, 'Converse CHUCK 70S', 1, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(8, 'Vans AUTHENTIC', 2, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(9, 'Adidas ULTRABOOST', 3, '2021-11-17 08:06:57', '2021-11-17 08:06:57'),
(10, 'Nike BLAZER', 4, '2021-11-17 08:06:57', '2021-11-17 08:06:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(10) UNSIGNED NOT NULL,
  `voucher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `expired_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `voucher_name`, `percent`, `amount`, `expired_date`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Giam10', 10, 35, '2021-11-29 00:00:00', 0, '2021-11-27 09:07:10', '2021-11-27 09:07:10'),
(10, 'SALE50', 50, 35, '2021-12-11 00:00:00', 0, '2021-11-27 09:07:29', '2021-11-27 09:07:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_phone_unique` (`phone`),
  ADD UNIQUE KEY `invoices_email_unique` (`email`),
  ADD KEY `invoices_voucher_id_foreign` (`voucher_id`);

--
-- Chỉ mục cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_id`,`product_id`),
  ADD KEY `invoice_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`);

--
-- Chỉ mục cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`size_id`,`product_id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
