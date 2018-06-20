-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2018 at 12:06 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donair_spice_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aleksandar Potic', 'aleksandar1995potic@admin.com', '$2y$10$2Qbgr.YeEb7tQJVCFOUy/.i3apMHA9M6tDN5dmtAPInQHs523Ao3S', NULL, NULL, '2018-05-08 14:35:50'),
(2, 'Admin', 'admin@admin.com', '$2y$10$2Qbgr.YeEb7tQJVCFOUy/.i3apMHA9M6tDN5dmtAPInQHs523Ao3S', 'vEzMfxBKWkf3NcumX7aAjzmO8KPux0O2hy9PjyI2ilVzaXgnUhMkoLsglQhe', '2018-05-08 14:36:13', '2018-05-08 14:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_off` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `coupon_type`, `percent_off`, `price_off`, `created_at`, `updated_at`) VALUES
(1, '123456', 'percent', '10', '4', '2018-05-10 16:59:02', '2018-05-10 17:06:26'),
(2, 'SADS1132', 'fixed', '0', '55', '2018-05-10 16:59:25', '2018-05-10 16:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `fulfilled_orders`
--

CREATE TABLE `fulfilled_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `fulfilment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fulfilled_orders`
--

INSERT INTO `fulfilled_orders` (`id`, `total_price`, `quantity`, `size`, `product_id`, `user_id`, `fName`, `lName`, `email`, `phone`, `address`, `city`, `country`, `company`, `postalCode`, `shipping_method`, `payment_method`, `transaction_id`, `fulfilment_status`, `created_at`, `updated_at`) VALUES
(1, 453.45, 12, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-12-12 13:50:57', '2018-05-10 12:50:57'),
(2, 122.21, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-12 20:42:25', '2018-05-10 20:42:25'),
(3, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-12 07:49:23', '2018-05-11 07:49:23'),
(4, 88.45, 12, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-12 08:40:37', '2018-05-11 08:40:37'),
(5, 100, 4, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-24 18:09:51', '2018-05-11 18:09:51'),
(6, 45.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-13 00:00:00', '2018-05-11 23:00:00'),
(7, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-11 02:00:00', '2018-05-11 02:00:00'),
(8, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-13 08:14:23', '2018-05-13 08:14:23'),
(9, 1233, 23, '', 9, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-13 08:14:34', '2018-05-13 08:14:34'),
(10, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 01:06:00', '2018-05-14 01:05:00'),
(11, 3443, 2, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 08:10:47', '2018-05-14 08:10:47'),
(12, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 10:30:41', '2018-05-14 10:30:41'),
(13, 123.45, 12, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 12:49:18', '2018-05-14 12:49:18'),
(14, 988, 5, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 14:24:36', '2018-05-14 14:24:36'),
(15, 988, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 14:24:49', '2018-05-14 14:24:49'),
(16, 988, 34, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 14:28:52', '2018-05-14 14:28:52'),
(17, 13.45, 34, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 14:31:56', '2018-05-14 14:31:56'),
(18, 123.45, 34, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 14:33:09', '2018-05-14 14:33:09'),
(19, 433, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 14:34:08', '2018-05-14 14:34:08'),
(20, 123.45, 12, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 15:27:36', '2018-05-14 15:27:36'),
(21, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 15:31:13', '2018-05-14 15:31:13'),
(22, 123.45, 12, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-14 16:09:00', '2018-05-14 16:09:00'),
(23, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-15 08:07:15', '2018-05-15 08:07:15'),
(24, 123.45, 3, '', 8, NULL, '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, 'Accepted', '2018-05-18 14:05:32', '2018-05-18 14:05:32'),
(25, 239.96, 4, '10', 8, 6, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'United States', 'Kompanija', '121212', 'shipping-one', NULL, NULL, 'Accepted', '2018-05-24 07:28:24', '2018-05-24 07:28:24'),
(26, 119.96, 4, '5', 8, 6, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'Prov123', NULL, '121212', 'shipping-one', NULL, NULL, 'Accepted', '2018-05-24 07:32:13', '2018-05-24 07:32:13'),
(27, 119.98, 2, '10', 8, NULL, 'Aleksandar', 'Potic', 'nik@gmail.com', '3433434343', 'nik', 'Houston', 'United States', 'Kompanija', '77005', NULL, 'shipping-two', NULL, 'Accepted', '2018-05-24 07:35:24', '2018-05-24 07:35:24'),
(28, 119.96, 4, '5', 8, NULL, 'Aleksandar', 'Potic', 'nik@gmail.com', '3433434343', 'nik', 'Houston', 'United States', 'Kompanija', '77005', NULL, NULL, NULL, 'Accepted', '2018-05-24 11:22:10', '2018-05-24 11:22:10'),
(29, 299.95, 5, '10', 8, NULL, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'United States', 'Kompanija', '121212', 'shipping-one', NULL, NULL, 'Accepted', '2018-05-24 11:22:21', '2018-05-24 11:22:21'),
(30, 119.96, 4, '5', 8, 7, 'Aleksandar', 'Potic', 'nik@gmail.com', '3433434343', 'nik', 'Houston', 'United States', 'Kompanija', '77005', 'Shipping-two', 'Card or Debit Card', NULL, 'Accepted', '2018-05-24 15:13:05', '2018-05-24 15:13:05'),
(31, 149.95, 5, '5', 8, 19, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'United States', 'Kompanija', '121212', 'Shipping_one', 'Paypal', NULL, 'Accepted', '2018-05-24 20:11:16', '2018-05-24 20:11:16'),
(32, 119.96, 4, '5', 8, 19, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'United States', 'Kompanija', '121212', 'Shipping_one', 'Paypal', NULL, 'Accepted', '2018-05-24 20:13:58', '2018-05-24 20:13:58'),
(33, 179.97, 3, '10', 8, 19, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'United States', 'Kompanija', '121212', 'Shipping_one', 'Paypal', NULL, 'Accepted', '2018-05-24 20:39:28', '2018-05-24 20:39:28'),
(34, 29.99, 1, '5', 8, 19, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', 'Adresa1', 'LA', 'Serbia', 'Kompanija', '121212', 'Shipping_one', 'Paypal', NULL, 'Accepted', '2018-05-24 20:39:30', '2018-05-24 20:39:30');

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
(3, '2018_05_07_181707_create_admins_table', 2),
(4, '2018_05_08_101625_create_products_table', 3),
(5, '2018_05_09_121332_create_orders_table', 4),
(6, '2018_05_09_122439_create_fulfilled_orders_table', 4),
(7, '2018_05_09_122925_create_orders_table', 5),
(8, '2018_05_09_122936_create_fulfilled_orders_table', 5),
(9, '2018_05_09_123113_create_orders_table', 6),
(10, '2018_05_09_123138_create_fulfilled_orders_table', 6),
(11, '2018_05_10_182550_create_coupons_table', 7),
(12, '2018_05_10_185436_create_coupons_table', 8),
(13, '2018_05_10_185726_create_coupons_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `fulfilment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `quantity`, `size`, `product_id`, `user_id`, `fName`, `lName`, `email`, `company`, `phone`, `address`, `city`, `country`, `postalCode`, `shipping_method`, `payment_method`, `transaction_id`, `fulfilment_status`, `created_at`, `updated_at`) VALUES
(1, 29.99, 1, '5', 8, NULL, 'Aleksandar', 'Potic', 'nik@gmail.com', 'Kompanija', '3433434343', 'nik', 'Houston', 'United States', '77005', 'Shipping_one', 'Card or Debit Card', '1234d3p1ce5b07cfedee0ef7.22564873', 'Fulfilled', '2018-05-25 06:57:19', '2018-05-25 06:57:19'),
(2, 29.99, 1, '5', 8, NULL, 'Aleksandar', 'Potic', 'nik@gmail.com', 'Kompanija', '3433434343', 'nik', 'Houston', 'United States', '77005', 'Shipping_one', 'Card or Debit Card', '1234d3p1ce5b07d0e3c8f6d2.08856673', 'Fulfilled', '2018-05-25 07:01:25', '2018-05-25 07:01:25'),
(3, 29.99, 1, '5', 8, NULL, 'Aleksandar', 'Potic', 'nik@gmail.com', 'Kompanija', '3433434343', 'nik', 'Houston', 'United States', '77005', 'Shipping_one', 'Card or Debit Card', '1234d3p1ce5b07d94a995c82.50480530', 'Fulfilled', '2018-05-25 07:37:16', '2018-05-25 07:37:16'),
(4, 299.95, 5, '10', 8, 19, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', NULL, '0665064004', 'nik', 'Houston', 'Texas', '77005', 'Shipping-two', 'Card or Debit Card', '1234d3p1ce5b07df1ec1f931.50224866', 'Fulfilled', '2018-05-25 08:02:08', '2018-05-25 08:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('aleksandar1995potic@gmail.com', '$2y$10$8kgUze91iFZd5YiaZZfYv.gEZFTh6L8v44XsJJYVnmOTTj2XPMkZq', '2018-05-22 06:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nutrition_label` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `size`, `nutrition_label`, `inventory_status`, `created_at`, `updated_at`) VALUES
(8, 'Donair Spice', 'public/GdyTk3Qe2eQOr3bS.jpg', 'This product is very good.', 123, 'Small', 'adsdas ads adsdas', 78, '2018-05-08 09:56:29', '2018-05-14 09:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card` text COLLATE utf8mb4_unicode_ci,
  `expiry_month` text COLLATE utf8mb4_unicode_ci,
  `expiry_year` text COLLATE utf8mb4_unicode_ci,
  `cvv` text COLLATE utf8mb4_unicode_ci,
  `total_spent` double DEFAULT '0',
  `coupon_status` tinyint(1) DEFAULT '0',
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `postal_code`, `city`, `province`, `card`, `expiry_month`, `expiry_year`, `cvv`, `total_spent`, `coupon_status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', 'nik', '0665064004', '77005', 'Houston', 'Texas', 'eyJpdiI6Im41N0YrSEZcL0gzcjhsNStlRWJ6bmNBPT0iLCJ2YWx1ZSI6IkFBd0xLVURWNFhzUGtwYXEzRGlKUTd2ZjZQbDZ1MVFibjlEVks0eDlLTXc9IiwibWFjIjoiNDVmNWM4OTg2YjJlZjFlMzFhMTdiZDMwNzc3ZjgzN2FjN2Q4YzcwZjVlNDA4NzI0NDYwOWZmNGJjZTg5YjE1ZCJ9', 'eyJpdiI6IlwvZVNrQVwvdm5IRHRGdUQ4T28rcFNNZz09IiwidmFsdWUiOiJvVHZYbkhlTWtmTnBZajBZQ3RHdmxnPT0iLCJtYWMiOiIwMGY2M2ZmYjhhZjJiYWM2MzE1MjkyZmIxMzk5NWEwMjIyYzFhZmY4MzYwNjdlOTFjMTA3ZThlYjQ4Y2VhZTFkIn0=', 'eyJpdiI6IkFwTVBvMDI1UGswSDFuQUdoTm1EZkE9PSIsInZhbHVlIjoiRFVOVUxnQXRIR0IxYmhmSUNZSm1IZz09IiwibWFjIjoiYTliZjZmMjRmYTE3M2UwZmIxNDA1MDkxYzE0YTlmNTkwMmRjNjY2NTU2NTgyMzQwOTYzN2E0Yzc0NjExMTRmZiJ9', 'eyJpdiI6Im8wdVNKM3JrT3BZVXdCN09zODFyMnc9PSIsInZhbHVlIjoiNnRWd3F1MjRQVERjc0hLNDlReDBVUT09IiwibWFjIjoiNmM4OTQ0MDkzZTZlMmRjMWY3ZmYxOWQxNjkxOGZlNDM2NGYzOTdmNWRjY2UzZGY3M2M2NmQxOTdhNWUyZWJiZiJ9', 779.8199999999999, 0, '$2y$10$98dj/5OOahC/JkJAQ6/xQugFDGdMyZOpu7mDb9AHgVoxmZVuJhkMq', 'U0ooOExYoemHv7iR5KSepuRY1UDSHawpkiHhhXKpk4CTYXabhJRPRtMkc5ae', '2018-05-24 18:48:11', '2018-05-25 08:02:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `fulfilled_orders`
--
ALTER TABLE `fulfilled_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fulfilled_orders`
--
ALTER TABLE `fulfilled_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
