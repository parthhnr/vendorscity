-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2023 at 10:07 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnrte46y_vendorscity`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country`, `state`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 'udaipur', '2023-10-27 00:47:40', '2023-10-30 06:36:27'),
(2, 5, 3, 'Ahmedabad', '2023-10-30 03:41:20', '2023-10-30 03:41:20'),
(3, 5, 3, 'Surendranag', '2023-11-02 04:23:37', '2023-11-02 04:23:37'),
(4, 5, 12, 'Mumbai', '2023-11-03 03:01:29', '2023-11-03 03:01:29'),
(5, 5, 12, 'Pune', '2023-11-03 03:02:20', '2023-11-03 03:02:20'),
(9, 9, 9, 'Per', '2023-11-03 06:35:32', '2023-11-03 07:31:58'),
(13, 20, 19, 'Afghanistan city', '2023-11-08 04:39:28', '2023-11-08 04:39:35'),
(15, 22, 21, 'eg1', '2023-11-11 00:14:26', '2023-11-11 00:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `name`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Condition', '<p>test terms</p>', '1', '2', '3', '2023-11-10 05:39:01', '2023-11-10 05:40:41'),
(2, 'Privacy Policy', '<p>test</p>', 't1', 'k1', 'kd', '2023-11-10 05:42:01', '2023-11-10 05:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(8, 'US', '2023-10-27 13:30:41', '2023-10-27 13:30:41'),
(9, 'Australia', '2023-11-02 04:21:34', '2023-11-02 04:21:34'),
(10, 'Newzeland', '2023-11-02 04:22:12', '2023-11-02 04:22:12'),
(20, 'Afghanistan', '2023-11-08 04:27:36', '2023-11-08 04:27:36'),
(22, 'UAE', '2023-11-11 00:12:30', '2023-11-11 00:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `subservice_id` int(11) DEFAULT NULL,
  `price` bigint(20) DEFAULT NULL,
  `inquiry_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accept_reject` int(11) NOT NULL COMMENT '(0=default,1=accept,2=accept)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `email`, `mobile`, `service_id`, `subservice_id`, `price`, `inquiry_date`, `accept_reject`) VALUES
(1, 'Ventesh', 'ventesh@gmail.com', 1234567890, 2, 9, 120, '2023-11-09 14:43:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `subservice_id` varchar(255) NOT NULL,
  `packagecategory_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `service_id`, `subservice_id`, `packagecategory_id`, `name`, `price`, `image`, `description`) VALUES
(1, '1', '3', '2', 'test', '123456', '170064251912.png', '<p>test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `package_categories`
--

CREATE TABLE `package_categories` (
  `id` int(11) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `subservice_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_categories`
--

INSERT INTO `package_categories` (`id`, `service_id`, `subservice_id`, `name`) VALUES
(1, '3', '5', 'ac technician'),
(2, '1', '3', 'Category 1'),
(3, '1', '4', 'Category 2');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(8, 'vendors', NULL, NULL),
(9, 'Prices', NULL, NULL),
(10, 'CMS', NULL, NULL),
(11, 'PackageCategory', NULL, NULL),
(12, 'Packages', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `based_on_booking_service_label` varchar(255) DEFAULT NULL,
  `based_on_booking_service_price` int(11) DEFAULT NULL,
  `set_order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `based_on_listing_criteria_label` varchar(255) DEFAULT NULL,
  `based_on_listing_criteria_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `based_on_booking_service_label`, `based_on_booking_service_price`, `set_order`, `created_at`, `updated_at`, `based_on_listing_criteria_label`, `based_on_listing_criteria_price`) VALUES
(1, 'Based on Booking Services', 10, 0, '2023-11-06 03:43:43', '2023-11-11 00:07:16', 'Based on Listing Criteria', 100);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` int(11) NOT NULL,
  `servicename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `country`, `servicename`, `created_at`, `updated_at`) VALUES
(1, 5, 'Movers/Relocations', '2023-10-30 23:20:58', '2023-11-22 05:23:21'),
(2, 10, 'Engineering Dept and Handyman', '2023-10-30 23:21:06', '2023-11-22 05:23:11'),
(3, 22, 'Air conditioning Maintenance', '2023-10-30 23:21:14', '2023-11-22 05:23:02'),
(4, 8, 'Storage and Warehousing', '2023-11-02 04:24:25', '2023-11-22 05:22:55'),
(6, 20, 'Ordinary lab support', '2023-11-03 07:35:34', '2023-11-22 05:22:49'),
(7, 22, 'House Keeping and Cleaning', '2023-11-03 07:35:53', '2023-11-20 00:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `state`, `created_at`, `updated_at`) VALUES
(3, '5', 'Gujarat', '2023-09-24 11:56:33', '2023-10-30 03:41:03'),
(6, '5', 'Rajasthan', '2023-09-28 03:23:50', '2023-10-30 06:36:14'),
(9, '9', 'Perth', '2023-11-02 04:22:44', '2023-11-03 07:31:29'),
(12, '5', 'Maharastra', '2023-11-03 03:01:02', '2023-11-03 03:01:02'),
(16, '9', 'Sydney', '2023-11-03 07:31:17', '2023-11-03 07:31:17'),
(19, '20', 'Afghanistan State', '2023-11-08 04:27:55', '2023-11-08 04:28:09'),
(20, '20', 'kabul', '2023-11-08 05:54:40', '2023-11-08 05:54:40'),
(21, '22', 'dubai', '2023-11-11 00:13:07', '2023-11-11 00:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `subscription_name` varchar(255) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `services` varchar(255) NOT NULL,
  `sub_service` varchar(255) NOT NULL,
  `total` bigint(20) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `vendor_id`, `subscription_name`, `subscription_id`, `country`, `state`, `city`, `services`, `sub_service`, `total`, `startdate`, `enddate`, `added_date`) VALUES
(1, 45, 'Based on Services Leads', 1, 5, 3, 3, '1,3', '4', 1000, '2023-11-07 13:13:24', '2023-12-07 13:13:24', '2023-11-07 13:13:24'),
(2, 45, 'Based on Listing Criteria', 2, 0, 0, 0, '', '', 1800, '2023-11-07 13:13:52', '2023-12-07 13:13:52', '2023-11-07 13:13:52'),
(3, 45, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-07 13:14:02', '2023-12-07 13:14:02', '2023-11-07 13:14:02'),
(4, 48, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-08 09:26:25', '2023-12-08 09:26:25', '2023-11-08 09:26:25'),
(5, 49, 'Based on Listing Criteria', 2, 0, 0, 0, '', '', 1800, '2023-11-09 07:16:25', '2023-12-09 07:16:25', '2023-11-09 07:16:25'),
(6, 48, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-09 08:20:56', '2023-12-09 08:20:56', '2023-11-09 08:20:56'),
(7, 48, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-09 08:21:15', '2023-12-09 08:21:15', '2023-11-09 08:21:15'),
(8, 48, 'Based on Listing Criteria', 2, 0, 0, 0, '', '', 1800, '2023-11-09 08:21:53', '2023-12-09 08:21:53', '2023-11-09 08:21:53'),
(9, 48, 'Based on Services Leads', 1, 5, 3, 2, '2,3', '5', 600, '2023-11-09 08:22:53', '2023-12-09 08:22:53', '2023-11-09 08:22:53'),
(10, 49, 'Based on Services Leads', 1, 5, 12, 4, '3,4', '2,5', 800, '2023-11-09 08:27:33', '2023-12-09 08:27:33', '2023-11-09 08:27:33'),
(11, 59, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-10 05:29:54', '2023-12-10 05:29:54', '2023-11-10 05:29:54'),
(12, 59, 'Based on Listing Criteria', 2, 0, 0, 0, '', '', 1800, '2023-11-10 05:30:05', '2023-12-10 05:30:05', '2023-11-10 05:30:05'),
(13, 59, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-10 05:38:30', '2023-12-10 05:38:30', '2023-11-10 05:38:30'),
(14, 59, 'Based on Booking Services', 2, 0, 0, 0, '', '', 1500, '2023-11-10 05:38:52', '2023-12-10 05:38:52', '2023-11-10 05:38:52'),
(15, 48, 'Based on Listing Criteria', 2, 0, 0, 0, '', '', 100, '2023-11-11 06:12:14', '2023-12-11 06:12:14', '2023-11-11 06:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_subservice_attribute`
--

CREATE TABLE `subscription_subservice_attribute` (
  `id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `subservice_id` int(11) NOT NULL,
  `charge` bigint(20) NOT NULL,
  `no_of_inquiry` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_subservice_attribute`
--

INSERT INTO `subscription_subservice_attribute` (`id`, `subscription_id`, `service_id`, `subservice_id`, `charge`, `no_of_inquiry`) VALUES
(1, 1, 1, 4, 1000, 15),
(2, 9, 3, 5, 600, 5),
(3, 10, 4, 2, 200, 2),
(4, 10, 3, 5, 600, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE `subservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serviceid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subservicename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_inquiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bookable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0-booknow,1-enquiry',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subservices`
--

INSERT INTO `subservices` (`id`, `serviceid`, `subservicename`, `description`, `image`, `charge`, `no_of_inquiry`, `is_bookable`, `created_at`, `updated_at`) VALUES
(2, '4', 'E commerce & Fulfillment', '<p>test 123</p>', '16990008529f053fe2697053d22a3ed289c06d9df6.jpg', '200', '2', '1', '2023-11-03 03:10:52', '2023-11-03 07:36:26'),
(3, '1', 'Home Search', NULL, '1699017002111.jpg', '500', '5', '1', '2023-11-03 07:40:02', '2023-11-03 07:40:02'),
(4, '1', 'Storage and Self Storage', NULL, '16990170862.jpg', '1000', '15', '0', '2023-11-03 07:41:26', '2023-11-03 07:41:26'),
(5, '3', 'AC repair', NULL, '1699017358download.jpg', '100', '10', '0', '2023-11-03 07:45:58', '2023-11-11 00:33:39'),
(6, '2', 'dev sub services', '<p>Test Description</p>', '1699438309no-image.png', '150', '10', '1', '2023-11-08 04:41:49', '2023-11-20 05:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companywebsite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentcname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_date` date DEFAULT NULL,
  `tlexpiry` date DEFAULT NULL,
  `staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialmedai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vatcertificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trncertificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tradelicense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL COMMENT '0-Active,1-Inactive',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `mobile`, `companywebsite`, `city`, `crole`, `parentcname`, `establishment_date`, `tlexpiry`, `staff`, `remarks`, `socialmedai`, `vatcertificate`, `trncertificate`, `tradelicense`, `vendor`, `is_active`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', '', 'admin@gmail.com', NULL, '$2y$10$e72baN/g/IhpkD4b0PJ9zuSE6mQN7VFBzoqKjCE3pymA1LUQtAsx.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-07-28 03:04:25', '2023-07-28 03:04:25'),
(3, '4', '', 'sub', 'sub@gmail.com', NULL, '73756261646D696E', '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-09-20 06:29:25', '2023-09-20 06:29:25'),
(48, '8', 'dev private limited', 'dev private limited', 'dev@gmail.com', NULL, '$2y$10$cAVhRVaHiWPXjBKgmmGotOTZP3PAsr06zxMnrTKEZLFBuTcm5oIY.', '9033259413', 'Dev.in', '4', '', '', '0000-00-00', '0000-00-00', '1', '', '', NULL, NULL, NULL, 1, 0, '1699435933avatar1.jpg', NULL, '2023-11-08 05:18:21', '2023-11-08 05:18:21'),
(49, '8', 'Raj & Sons', 'raj sons', 'raj@gmail.com', NULL, '$2y$10$/spX7h2pFWs9XcLg1Fim.uGu52k.ePz9jb68iMyVeWwrbfIZgrxoG', '9856985698', 'www.raj.com', '4', 'Role1', 'Raj & Niks', '2022-10-30', '2024-05-02', '15', '', '', '654b7bda4a414.jpg', '654c9be417bb8.docx', '654b7bda4b14a.jpg', 1, 0, '1699448740Koala.jpg', NULL, '2023-11-08 09:37:19', '2023-11-08 09:37:19'),
(63, '4', 'xyz', 'xyz', 'test@gmail.com', NULL, '$2y$10$YC.u0wAojeHlamWi7ZOKxe2yIUTgsgJnKz.2LBu8BYn7nepTSjGCy', '9999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-11-11 00:24:53', '2023-11-11 00:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `editperm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `cname`, `permission`, `editperm`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1,2,3,4,5,6,7,8,9,10,11,12', '1,2,3,4,5,6,7,8,9,10,11,12', '2023-09-18 05:33:28', '2023-11-22 00:11:54'),
(4, 'subadmin', '1', '1', '2023-09-19 10:04:47', '2023-09-21 06:30:27'),
(8, 'vendor', '1,2,3,4,5,6,7', '1,2,3,4,5,6,7', '2023-10-31 01:27:53', '2023-11-03 00:57:43');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors_attribute`
--

INSERT INTO `vendors_attribute` (`id`, `pid`, `poc`, `poctitle`, `c_email`, `telephone`) VALUES
(1, 40, 'juis brands', 'juis brands', 'juis@gmail.com', '7897899877'),
(3, 41, 'test', 'test', 'test@gmail.com', '7897897899'),
(4, 44, 'test 1', 't1', 't1@gmail.com', '9999999999'),
(5, 44, 'test 2', 't2', 't2@gmail.com', '8888888888'),
(7, 44, 't4', 't44', 't4@gmail.com', '2222222222'),
(10, 45, 'abc123', 'abc123', 'abc123@gmail.com', '1234567890'),
(14, 48, 'poc full ', 'poc title', 'company@gmail.com', '123456789'),
(17, 46, 'test', 'test', 'test@gmail.com', '1234567890'),
(21, 49, 'Rajnikant', 'T1', 'rajp@gmail.com', '9658965896'),
(22, 49, 'Nikul', 'T2', 'nik@gmail.com', '8569856985'),
(25, 62, 't1', 't1', 't1@gmail.com', '7897897899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_categories`
--
ALTER TABLE `package_categories`
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
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_subservice_attribute`
--
ALTER TABLE `subscription_subservice_attribute`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `package_categories`
--
ALTER TABLE `package_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscription_subservice_attribute`
--
ALTER TABLE `subscription_subservice_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subservices`
--
ALTER TABLE `subservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendors_attribute`
--
ALTER TABLE `vendors_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
