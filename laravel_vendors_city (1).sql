-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 05:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_vendors_city`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country`, `state`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 'udaipur', '2023-10-27 00:47:40', '2023-10-30 06:36:27'),
(2, 5, 3, 'Ahmedabad', '2023-10-30 03:41:20', '2023-10-30 03:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `created_at`, `updated_at`) VALUES
(5, 'India', '2023-09-25 07:06:54', '2023-10-30 06:35:57'),
(6, 'South Africa', '2023-09-29 05:35:25', '2023-09-29 05:35:25'),
(7, 'United Kingdom', '2023-09-29 05:37:30', '2023-09-29 05:37:30'),
(12, 'test', '2023-11-03 05:10:29', '2023-11-03 05:13:16'),
(13, 'test', '2023-11-03 06:28:50', '2023-11-03 06:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pname` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `pname`, `created_at`, `updated_at`) VALUES
(1, 'country', NULL, NULL),
(2, 'state', NULL, NULL),
(3, 'city', NULL, NULL),
(4, 'service', NULL, NULL),
(5, 'subservice', NULL, NULL),
(6, 'userpermission', NULL, NULL),
(7, 'adminuser', NULL, NULL),
(8, 'vendors', NULL, NULL);

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicename`, `created_at`, `updated_at`) VALUES
(1, 'service-1', '2023-10-30 23:20:58', '2023-10-30 23:20:58'),
(2, 'service-2', '2023-10-30 23:21:06', '2023-10-30 23:21:06'),
(3, 'service-3', '2023-10-30 23:21:14', '2023-10-30 23:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state`, `created_at`, `updated_at`) VALUES
(3, '5', 'Gujarat', '2023-09-24 11:56:33', '2023-10-30 03:41:03'),
(6, '5', 'Rajasthan', '2023-09-28 03:23:50', '2023-10-30 06:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE `subservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceid` varchar(255) NOT NULL,
  `subservicename` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `no_of_inquiry` varchar(255) DEFAULT NULL,
  `is_bookable` int(11) DEFAULT NULL COMMENT '0-booknow,1-enquiry',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subservices`
--

INSERT INTO `subservices` (`id`, `serviceid`, `subservicename`, `description`, `image`, `charge`, `no_of_inquiry`, `is_bookable`, `created_at`, `updated_at`) VALUES
(1, '3', 'test', '<p>aga</p>', '16990151431691648530product-image-26.jpg', 'adga', 'adgag', 0, '2023-11-02 04:29:55', '2023-11-03 07:09:04'),
(2, '3', 'test', NULL, '169892390912.png', '123', '321', 1, '2023-11-02 05:48:30', '2023-11-03 07:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `companywebsite` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `crole` varchar(255) DEFAULT NULL,
  `parentcname` varchar(255) DEFAULT NULL,
  `establishment_date` date DEFAULT NULL,
  `tlexpiry` date DEFAULT NULL,
  `staff` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `socialmedai` varchar(255) DEFAULT NULL,
  `vatcertificate` varchar(255) DEFAULT NULL,
  `trncertificate` varchar(255) DEFAULT NULL,
  `tradelicense` varchar(255) DEFAULT NULL,
  `vendor` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `mobile`, `companywebsite`, `city`, `crole`, `parentcname`, `establishment_date`, `tlexpiry`, `staff`, `remarks`, `socialmedai`, `vatcertificate`, `trncertificate`, `tradelicense`, `vendor`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', '', 'admin@gmail.com', NULL, '$2y$10$e72baN/g/IhpkD4b0PJ9zuSE6mQN7VFBzoqKjCE3pymA1LUQtAsx.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-07-28 03:04:25', '2023-07-28 03:04:25'),
(3, '4', '', 'sub', 'sub@gmail.com', NULL, '73756261646D696E', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-09-20 06:29:25', '2023-09-20 06:29:25'),
(45, '8', 'test', 'test', 'test@gmail.com', NULL, '$2y$10$gFGQAe61MSCOEoqxwuFKHuiBdMF1Gt0Tcc0FTGPhZlKX62mkCT35O', '0', 'test.com', '2', 'test', 'test', '2023-11-03', '2023-11-03', '', 'test', 'test', '6544bbfb57a6e.png', '6544bbfb58842.jpg', '6544bbfb58ea7.jpg', 1, 0, NULL, '2023-11-03 09:23:07', '2023-11-03 09:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `editperm` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `cname`, `permission`, `editperm`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1,2,3,4,5,6,7,8', '1,2,3,4,5,6,7,8', '2023-09-18 05:33:28', '2023-10-31 01:24:09'),
(4, 'subadmin', '1', '1', '2023-09-19 10:04:47', '2023-09-21 06:30:27'),
(8, 'vendor', '1,2,3,4,5,6,7,8', '1,2,3,4,5,6,7,8', '2023-10-31 01:27:53', '2023-11-02 06:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_attribute`
--

CREATE TABLE `vendors_attribute` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `poc` varchar(255) DEFAULT NULL,
  `poctitle` varchar(255) DEFAULT NULL,
  `c_email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors_attribute`
--

INSERT INTO `vendors_attribute` (`id`, `pid`, `poc`, `poctitle`, `c_email`, `telephone`) VALUES
(1, 40, 'juis brands', 'juis brands', 'juis@gmail.com', '7897899877'),
(2, 43, 'bchskbc', 'hbksba', 'admin@gmail.com', '7897897899'),
(3, 45, 'test', 'test', 'test@gmail.com', '7897897899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subservices`
--
ALTER TABLE `subservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors_attribute`
--
ALTER TABLE `vendors_attribute`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subservices`
--
ALTER TABLE `subservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendors_attribute`
--
ALTER TABLE `vendors_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
