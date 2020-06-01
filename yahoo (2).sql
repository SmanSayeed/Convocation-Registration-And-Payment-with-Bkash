-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 08:31 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yahoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finals`
--

CREATE TABLE `finals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrationnobsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rollnobsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessionbsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registrationnomsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rollnomsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sessionmsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resultbsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultmsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trdx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bkashno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amountpaid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificateb` int(11) DEFAULT NULL,
  `certificatem` int(11) DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactemail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` int(11) DEFAULT '1',
  `f_key` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finals`
--

INSERT INTO `finals` (`id`, `username`, `father`, `mother`, `hall`, `registrationnobsc`, `rollnobsc`, `sessionbsc`, `registrationnomsc`, `rollnomsc`, `sessionmsc`, `degree`, `resultbsc`, `resultmsc`, `address`, `job`, `trdx`, `bkashno`, `amountpaid`, `certificateb`, `certificatem`, `mobile`, `contactemail`, `faculty`, `dept`, `key`, `f_key`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Saadman Sayeed', 'Md. Anwarul Hoque', 'Mst. Moriom Begum', 'Shahid Dhirendranath Datta Hall', '11508022', '11508022', '2013-2014', '11508022', '11508022', '2013-2014', 'Bachelor\'s and Master\'s', '3.9', '3.6', 'Uttarkhan, Dhaka', 'No Job', NULL, NULL, NULL, 2, 1, '123456789', '786saadman@gmail.com', 'Engineering', 'CSE', 1, 2, '1569003372-saadmansayeed.jpg', NULL, NULL),
(2, 'Sumon', 'Md. Anwarul Hoque', 'Mst. Moriom Begum', 'Kazi Nazrul Islam Hall', '11508022', '11508022', '2007-2008', NULL, NULL, NULL, 'Bachelor\'s', '3.6', NULL, 'Uttarkhan, Dhaka', 'No Job', NULL, NULL, NULL, 0, NULL, '123456789', '786saadman@gmail.com', 'Science', 'Math', 1, 3, '1569004246-sumon.jpg', NULL, NULL);

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
(3, '2019_08_25_202805_create_admins_table', 1),
(4, '2019_08_25_211837_create_finals_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `useremail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_key` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `useremail`, `email_verified_at`, `password`, `final_key`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Saadman Sayeed', '01937570729', '786saadman@gmail.com', NULL, '$2y$10$dD0KpSTPanxLyRi1rPlYfutw0YM1x540H1c27CkwgAEoWtIsf22dK', 1, NULL, '2019-09-20 12:09:00', '2019-09-20 12:09:00'),
(3, 'Sumon', '06958412364', '786saadman@gmail.com', NULL, '$2y$10$pYBRUfVCmcKVKbqrIh3NEOYi8npGbmwTUPEdYT666HYO65lw02zGa', 1, NULL, '2019-09-20 12:23:39', '2019-09-20 12:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finals`
--
ALTER TABLE `finals`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finals`
--
ALTER TABLE `finals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
