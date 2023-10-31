-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 08:22 AM
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
-- Database: `laravel_vendors_city`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_book`
--

CREATE TABLE `address_book` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `default_address` varchar(255) DEFAULT NULL,
  `address_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address_book`
--

INSERT INTO `address_book` (`id`, `userid`, `first_name`, `last_name`, `company`, `address1`, `address2`, `phone`, `email`, `city`, `pincode`, `state`, `country`, `default_address`, `address_type`) VALUES
(1, 2, 'dev', 'Patel', 'Dev Test Compant', 'Brahmpole street', 'malad', '9033259413', 'devang.hnrtechnologies@gmail.com', 'LAKHTAR', '382775', '3', '4', '1', NULL),
(2, 2, 'dev', 'Patel', 'Dev Test Compant', 'Brahmpole street', 'malad', '1234567890', 'devang@gmail.com', 'LAKHTAR', '999999', '3', '4', '1', NULL),
(3, 3, 'parth', 'prajapati', 'Dev Test Compant', 'Brahmpole street', 'malad', '1234567890', 'devang.hnrtechnologies@gmail.com', 'LAKHTAR', '999999', '3', '4', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `set_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `image`, `link`, `set_order`, `created_at`, `updated_at`) VALUES
(6, 'Exclusive Collection', 'Most Exclusive Brands', '1690544425fashion1_1.jpg', NULL, 2, '2023-07-28 06:10:26', '2023-07-28 06:10:26'),
(7, 'Discover Bestseller', 'most unique style', '1690544471fashion1_2.jpg', NULL, 1, '2023-07-28 06:11:11', '2023-07-28 06:11:11'),
(9, 'test', 'tst 123', '1695032343Chrysanthemum.jpg', 'https://bhaviklogistics.com/Aresstudio/beta/about', 3, '2023-09-18 10:19:04', '2023-09-18 10:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `page_url`, `image`, `description`, `created_at`, `updated_at`) VALUES
(6, 'The best way to predict the future is to create it', 'the-best-way-to-predict-the-future-is-to-create-it', '1691672315bg1.webp', NULL, '2023-08-10 12:58:35', '2023-08-10 12:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `set_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `group_id`, `name`, `page_url`, `meta_title`, `meta_keywords`, `meta_description`, `set_order`, `created_at`, `updated_at`) VALUES
(15, '7', 'Girls', 'girls', NULL, NULL, NULL, 0, '2023-09-19 09:09:43', '2023-09-19 09:09:43'),
(16, '7', 'Boys', 'boys', 'Boys', 'boys keyword', 'boys desc', 0, '2023-09-19 09:09:54', '2023-09-28 01:39:47'),
(17, '8', 'Men\'s Wear cat', 'men-s-wear-cat', NULL, NULL, NULL, 2, '2023-09-19 09:10:05', '2023-09-19 09:10:05'),
(18, '9', 'Women Casualwear', 'women-casualwear', NULL, NULL, NULL, 0, '2023-09-19 09:10:15', '2023-09-19 09:10:15'),
(19, '9', 'Women Ethnicwear', 'women-ethnicwear', NULL, NULL, NULL, 0, '2023-09-19 09:10:24', '2023-09-19 09:10:24'),
(20, '8', 'Bottom Wear', 'bottom-wear', 'Bottom', NULL, NULL, 1, '2023-09-19 10:44:29', '2023-09-19 10:46:17');

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
(1, 4, 6, 'Ahmedabad 1', '2023-10-27 00:47:40', '2023-10-27 00:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `ci_orders`
--

CREATE TABLE `ci_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` varchar(100) DEFAULT NULL,
  `order_total` decimal(15,2) NOT NULL,
  `order_status` varchar(1) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `paymentmode` int(11) NOT NULL COMMENT '"1" Cash,"2" online',
  `shippingcost` varchar(20) NOT NULL,
  `coup_name` varchar(255) NOT NULL,
  `coupondiscount` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_currency` varchar(255) NOT NULL,
  `list_order_status` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ci_orders`
--

INSERT INTO `ci_orders` (`order_id`, `user_id`, `order_number`, `order_total`, `order_status`, `transactionid`, `payment_status`, `paymentmode`, `shippingcost`, `coup_name`, `coupondiscount`, `coupon_code`, `created_at`, `order_currency`, `list_order_status`, `ip_address`) VALUES
(1, 2, '1', '1385.00', 'P', '', 'Success', 1, '0', '', '0', '', '2023-09-29 05:38:38', 'INR', '0', '::1'),
(2, 2, '2', '240.00', 'P', '', 'Success', 1, '0', '', '0', '', '2023-10-03 07:23:51', 'INR', '0', '::1'),
(3, 3, '3', '170.00', 'P', '', 'Success', 1, '0', '', '0', '', '2023-10-06 22:10:21', 'INR', '0', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `ci_order_item`
--

CREATE TABLE `ci_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_info_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_item_code` varchar(255) NOT NULL,
  `order_item_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_item_price` decimal(15,5) NOT NULL,
  `product_discount_amount` varchar(255) DEFAULT NULL,
  `order_item_currency` varchar(64) NOT NULL,
  `order_status` varchar(11) NOT NULL,
  `cdate` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `size_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `colour_id` int(11) NOT NULL,
  `colour_name` varchar(255) NOT NULL,
  `base_image` varchar(255) NOT NULL,
  `return_reasons` varchar(255) NOT NULL,
  `return_comment` text NOT NULL,
  `is_return` int(1) NOT NULL,
  `exchange_comment` text NOT NULL,
  `size_exchnage` varchar(255) NOT NULL,
  `is_exchnage` int(1) NOT NULL,
  `is_cancel` int(1) NOT NULL,
  `return_image` varchar(255) NOT NULL,
  `return_refund` int(11) NOT NULL COMMENT '(1 = wallet , 2 = refund)',
  `return_order_date` date NOT NULL,
  `reedem_approve` int(11) NOT NULL COMMENT '(0 = no-approve,1 = approve )',
  `exchange_reasons` varchar(255) NOT NULL,
  `exchange_image` varchar(255) NOT NULL,
  `exchange_refund` int(11) NOT NULL,
  `exchange_order_date` date NOT NULL,
  `sku_code` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ci_order_item`
--

INSERT INTO `ci_order_item` (`order_item_id`, `order_id`, `user_info_id`, `product_id`, `order_item_code`, `order_item_name`, `product_quantity`, `product_item_price`, `product_discount_amount`, `order_item_currency`, `order_status`, `cdate`, `deleted`, `size_id`, `size_name`, `colour_id`, `colour_name`, `base_image`, `return_reasons`, `return_comment`, `is_return`, `exchange_comment`, `size_exchnage`, `is_exchnage`, `is_cancel`, `return_image`, `return_refund`, `return_order_date`, `reedem_approve`, `exchange_reasons`, `exchange_image`, `exchange_refund`, `exchange_order_date`, `sku_code`, `product_code`) VALUES
(1, 1, 2, 20, '', 'Orange Cotton Printed Long Kurta', 1, '400.00000', '385', '', '', '2023-09-29', 0, 4, 'M', 4, 'Lime', '1695463364-20058041-01.jpg', '', '', 0, '', '', 0, 0, '', 0, '0000-00-00', 0, '', '', 0, '0000-00-00', '', ''),
(2, 1, 2, 21, '', 'Navy Cotton Printed Jacket', 2, '500.00000', '500', '', '', '2023-09-29', 0, 4, 'M', 3, 'Aqua', '1695463322-20043084-01.jpg', '', '', 0, '', '', 0, 0, '', 0, '0000-00-00', 0, '', '', 0, '0000-00-00', '', ''),
(3, 2, 2, 4, '', 'Brown Tshirt', 1, '250.00000', '240', '', '', '2023-10-03', 0, 2, 'L', 2, 'Blue', '1695120823F6.jpg', '', '', 0, '', '', 0, 0, '', 0, '0000-00-00', 0, '', '', 0, '0000-00-00', '', ''),
(4, 3, 3, 20, '', 'Orange Cotton Printed Long Kurta', 2, '100.00000', '85', '', '', '2023-10-07', 0, 3, 'S', 2, 'Blue', '1695463364-20058041-01.jpg', '', '', 0, '', '', 0, 0, '', 0, '0000-00-00', 0, '', '', 0, '0000-00-00', 'A-224', 'A-5628');

-- --------------------------------------------------------

--
-- Table structure for table `ci_shipping_address`
--

CREATE TABLE `ci_shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `bill_first_name` varchar(255) NOT NULL,
  `bill_last_name` varchar(255) NOT NULL,
  `bill_company` varchar(255) NOT NULL,
  `bill_address1` text NOT NULL,
  `bill_address2` text NOT NULL,
  `bill_city` varchar(255) NOT NULL,
  `bill_post_code` varchar(255) NOT NULL,
  `bill_country` varchar(255) NOT NULL,
  `bill_state` varchar(255) NOT NULL,
  `bill_phone_number` varchar(255) NOT NULL,
  `bill_email_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ci_shipping_address`
--

INSERT INTO `ci_shipping_address` (`id`, `user_id`, `order_id`, `first_name`, `last_name`, `company`, `address1`, `address2`, `city`, `post_code`, `country`, `state`, `phone_number`, `email_address`, `bill_first_name`, `bill_last_name`, `bill_company`, `bill_address1`, `bill_address2`, `bill_city`, `bill_post_code`, `bill_country`, `bill_state`, `bill_phone_number`, `bill_email_address`) VALUES
(1, 2, 1, 'dev', 'Patel', 'Dev Test Compant', 'Brahmpole street', 'malad', 'LAKHTAR', '382775', '4', '3', '9033259413', 'devang.hnrtechnologies@gmail.com', 'dev', 'Patel', 'Dev Test Compant', 'Brahmpole street', 'malad', 'LAKHTAR', '382775', '4', '3', '9033259413', 'devang.hnrtechnologies@gmail.com'),
(2, 2, 2, 'dev', 'Patel', 'Dev Test Compant', 'Brahmpole street', 'malad', 'LAKHTAR', '999999', '4', '3', '1234567890', 'devang@gmail.com', 'dev', 'Patel', 'Dev Test Compant', 'Brahmpole street', 'malad', 'LAKHTAR', '999999', '4', '3', '1234567890', 'devang@gmail.com'),
(3, 3, 3, 'parth', 'prajapati', 'Dev Test Compant', 'Brahmpole street', 'malad', 'LAKHTAR', '999999', '4', '3', '1234567890', 'devang.hnrtechnologies@gmail.com', 'parth', 'prajapati', 'Dev Test Compant', 'Brahmpole street', 'malad', 'LAKHTAR', '999999', '4', '3', '1234567890', 'devang.hnrtechnologies@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `name`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(3, 'product shipping policy', '<p><span style=\"color:rgb(102,102,102);\">product shipping policy</span></p>', 'product shipping policy', 'product shipping policy', '<p><span style=\"color:rgb(102,102,102);\">product shipping policy</span></p>', '2023-07-24 08:12:07', '2023-07-24 08:12:07'),
(4, 'terms-condition', '<p>terms-conditionnn</p>', 'terms-condition', 'terms-condition', '<p>terms-condition</p>', '2023-07-24 08:12:37', '2023-09-19 03:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `set_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `page_url`, `description`, `image`, `set_order`, `created_at`, `updated_at`) VALUES
(2, 'man', 'man', NULL, '1690610024home-shop-modern-01.png', 1, '2023-07-29 05:53:44', '2023-07-29 05:53:44'),
(3, 'women', 'women', NULL, '1690610039home-shop-modern-04.png', 2, '2023-07-29 05:53:59', '2023-07-29 05:53:59'),
(4, 'kids', 'kids', NULL, '1690610047home-shop-modern-02.png', 0, '2023-07-29 05:54:08', '2023-07-29 05:54:08'),
(7, 'Kids Collection', 'kids-collection', NULL, '1695367353images.jpg', 3, '2023-09-22 07:22:33', '2023-09-22 07:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `colours`
--

CREATE TABLE `colours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colours`
--

INSERT INTO `colours` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(2, 'Blue', '0000FF', '2023-07-28 06:44:32', '2023-07-28 06:44:32'),
(3, 'Aqua', '00FFFF', '2023-07-28 06:44:53', '2023-07-28 06:44:53'),
(4, 'Lime', '00FF00', '2023-07-28 06:45:09', '2023-08-02 00:49:13');

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
(4, 'India', '2023-09-25 07:06:45', '2023-09-25 07:06:45'),
(5, 'Bharat', '2023-09-25 07:06:54', '2023-09-25 07:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupan_name` varchar(255) NOT NULL,
  `coupan_code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `coupanvalue` int(11) NOT NULL COMMENT 'percentage=0;price=1',
  `minimum_order` varchar(255) NOT NULL,
  `no_of_coupons` varchar(255) NOT NULL,
  `no_of_coupons_user` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `subcategory_id` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_discounted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupans`
--

INSERT INTO `coupans` (`id`, `coupan_name`, `coupan_code`, `discount`, `coupanvalue`, `minimum_order`, `no_of_coupons`, `no_of_coupons_user`, `startdate`, `enddate`, `category_id`, `subcategory_id`, `description`, `is_active`, `created_at`, `updated_at`, `is_discounted`) VALUES
(1, 'Diwali', 'Diwali', 150, 1, '100', '15', '1', '2023-08-13', '2023-10-28', NULL, NULL, '<p>This is First Coupan</p>', 0, NULL, NULL, NULL),
(7, 'Navratri offer', 'NAV123', 10, 0, '1000', '5', '5', '2023-09-26', '2023-09-29', NULL, NULL, NULL, 0, '2023-09-25 11:02:19', '2023-09-25 11:02:19', NULL);

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
-- Table structure for table `front_users`
--

CREATE TABLE `front_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `front_users`
--

INSERT INTO `front_users` (`id`, `name`, `email`, `password`, `gender`, `mobile`, `dob`, `create_at`) VALUES
(2, 'devang', 'devang.hnrtechnologies@gmail.com', '$2y$10$rwOEv0ry2zigOoGNhWnUOuXeZsTzX5fY5Ro0LPSN7N/lXvwYY5j5K', 'Male', '9033259413', '1995-07-17', '2023-09-28'),
(3, 'Parth', 'parth.hnrtechnologies@gmail.com', '$2y$10$vyoBpeSbqaUGJBRBGpPHx.Cx23qcRSKJ1Dm6Dg57Z.gGfQZ23MwPu', NULL, '9033259413', NULL, '2023-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `set_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `page_url`, `set_order`, `created_at`, `updated_at`) VALUES
(7, 'Kid\'s Wear', 'kid-s-wear', 3, '2023-09-19 09:08:09', '2023-09-19 09:08:09'),
(8, 'Men\'s Wear', 'men-s-wear', 1, '2023-09-19 09:08:19', '2023-09-19 10:08:14'),
(9, 'Women\'s Wear', 'women-s-wear', 2, '2023-09-19 09:08:27', '2023-09-19 09:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Lather', '2023-07-28 23:57:16', '2023-07-28 23:57:16'),
(3, 'Cotton', '2023-07-28 23:57:25', '2023-07-28 23:57:25'),
(4, 'Silk', '2023-07-28 23:57:37', '2023-07-28 23:57:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_28_091042_create_categories_table', 2),
(6, '2023_07_28_094648_create_subcategories_table', 3),
(7, '2023_07_28_103239_create_banners_table', 4),
(8, '2023_07_28_114610_create_sizes_table', 5),
(9, '2023_07_28_120230_create_colours_table', 6),
(10, '2023_07_29_051620_create_materials_table', 7),
(11, '2023_07_29_052838_create_style_types_table', 8);

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
(1, 'Category', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(2, 'Subcategory', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(3, 'Product', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(4, 'Group', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(5, 'banner', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(6, 'colour', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(7, 'size', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(8, 'material', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(9, 'style type', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(10, 'sub banner', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(11, 'blog', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(12, 'cms', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(13, 'User Permission', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(14, 'Admin User', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(15, 'Coupan', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(16, 'collection', '2023-09-15 03:54:43', '2023-09-15 03:54:43'),
(17, 'customers', '2023-09-15 09:24:43', '2023-09-15 09:24:43'),
(18, 'subscribe', '2023-09-15 09:24:43', '2023-09-15 09:24:43'),
(19, 'country', '2023-09-15 09:24:43', '2023-09-15 09:24:43'),
(20, 'state', '2023-09-15 09:24:43', '2023-09-15 09:24:43'),
(21, 'Order', '2023-09-15 09:24:43', '2023-09-15 09:24:43'),
(22, 'Review', '2023-09-15 09:24:43', '2023-09-15 09:24:43');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `sale_product` int(11) DEFAULT NULL,
  `hot_product` int(11) DEFAULT NULL,
  `new_product` int(11) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `sku_code` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL COMMENT '0=percentage , 1=price,2=None',
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `recent_product` int(11) DEFAULT NULL,
  `feature_product` int(11) DEFAULT NULL,
  `best_seller` int(11) DEFAULT NULL,
  `material_id` varchar(255) DEFAULT NULL,
  `style_type_id` varchar(255) DEFAULT NULL,
  `lining` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `group_id`, `cat_id`, `subcat_id`, `name`, `page_url`, `sale_product`, `hot_product`, `new_product`, `product_code`, `sku_code`, `short_description`, `collection_id`, `discount`, `discount_type`, `description`, `image`, `recent_product`, `feature_product`, `best_seller`, `material_id`, `style_type_id`, `lining`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(4, 8, 17, 21, 'Brown Tshirt', 'brown-tshirt', 1, 0, 0, 'P001', 'sku001', 'Brown tshirt full sleeves with decent look', 2, '10', 1, '<p>fghs</p>', NULL, 0, 1, 1, '2', '2', 'xcbxc', NULL, NULL, NULL, '2023-08-02 06:03:48', '2023-09-19 10:53:05'),
(6, 9, 18, 23, 'Full Sleeve Tshirt', 'full-sleeve-tshirt', 0, 0, 1, 'T001', 'SK002', NULL, 2, NULL, NULL, NULL, NULL, 0, 0, 1, '3', '2', NULL, NULL, NULL, NULL, '2023-09-19 11:02:34', '2023-09-19 11:02:34'),
(18, 9, 18, 23, 'Cotton Dark Shirt', 'cotton-dark-shirt', 0, 0, 1, 'A-5696', 'A-W01', 'sdafsadf', 3, '10', 0, NULL, NULL, 0, 0, 1, '3', '3', NULL, NULL, NULL, NULL, '2023-09-21 12:58:08', '2023-09-21 12:58:08'),
(19, 8, 20, 26, 'Denim', 'denim', 0, 1, 1, 'A-5612', 'A-127', 'dfsgsdfgdf', 2, '70', 1, NULL, NULL, 0, 1, 0, '3', '3', NULL, NULL, NULL, NULL, '2023-09-21 12:59:04', '2023-09-21 12:59:04'),
(20, 7, 16, 18, 'Orange Cotton Printed Long Kurta', 'orange-cotton-printed-long-kurta', 1, 0, 0, 'A-5628', 'A-224', 'This is kids Kurta', 4, '15', 1, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, 1, 0, 1, '2,3,4', '2,3', 'Test', 'Orange Cotton Printed Long Kurta', 'Orange Cotton Printed Long Kurta keyword', 'Orange Cotton Printed Long Kurta descriotion', '2023-09-21 13:01:31', '2023-10-06 00:36:01'),
(21, 7, 16, 18, 'Navy Cotton Printed Jacket', 'navy-cotton-printed-jacket', 0, 1, 0, '12554', 'A-1234', 'This is kids wear', 4, '10', 2, '<p>TEST DESCRIPTION</p>', '1695880630no-image.png', 0, 0, 0, '3', '3', 'Test Description', NULL, NULL, NULL, '2023-09-23 10:01:18', '2023-09-28 00:27:12'),
(22, 7, 15, 15, 'Cotton Block Printed Top', 'cotton-block-printed-top', 0, 0, 0, '12003', 'A-125', 'This is girls wear', 4, '50', 1, NULL, NULL, 0, 0, 1, '3', '3', NULL, NULL, NULL, NULL, '2023-09-23 10:05:32', '2023-09-23 10:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

CREATE TABLE `product_attribute` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `colour_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`id`, `pid`, `size_id`, `price`, `colour_id`, `qty`) VALUES
(2, 2, 2, 200, 3, 20),
(3, 2, 4, 300, 4, 30),
(4, 3, 2, 78, 3, 2),
(5, 4, 2, 250, 2, 5),
(6, 4, 3, 200, 3, 5),
(7, 5, 2, 1500, 2, 1),
(8, 6, 3, 300, 3, 5),
(9, 6, 4, 350, 3, 5),
(10, 7, 2, 1500, 2, 1),
(11, 8, 2, 1500, 2, 1),
(12, 9, 3, 1500, 2, 1),
(13, 11, 2, 1500, 2, 1),
(14, 12, 2, 1500, 2, 1),
(15, 13, 2, 1500, 2, 1),
(16, 14, 2, 1500, 3, 1),
(17, 14, 2, 1500, 2, 1),
(18, 15, 2, 1500, 2, 1),
(19, 15, 3, 1500, 3, 10),
(20, 16, 2, 1500, 2, 1),
(21, 18, 2, 2000, 2, 75),
(22, 18, 3, 1500, 3, 75),
(23, 18, 4, 1000, 4, 75),
(24, 19, 2, 1350, 3, 75),
(25, 19, 3, 1500, 4, 75),
(26, 20, 3, 100, 2, 0),
(27, 20, 2, 200, 4, 4),
(28, 21, 3, 940, 4, 75),
(29, 21, 4, 500, 3, 75),
(30, 22, 3, 850, 4, 75),
(31, 22, 4, 940, 3, 75),
(32, 20, 3, 300, 3, 6),
(34, 20, 4, 100, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `baseimage` int(11) NOT NULL,
  `baseimageHover` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `pid`, `image`, `baseimage`, `baseimageHover`, `created_at`, `updated_at`) VALUES
(8, 4, '1695120823F6.jpg', 1, 0, '2023-09-19 10:53:44', '2023-09-19 10:53:44'),
(9, 4, '16951208341_1.webp', 0, 1, '2023-09-19 10:53:54', '2023-09-19 10:53:54'),
(10, 6, '16951214254.webp', 0, 1, '2023-09-19 11:03:45', '2023-09-19 11:03:45'),
(11, 6, '1695121425F4.jpg', 1, 0, '2023-09-19 11:03:45', '2023-09-19 11:03:45'),
(17, 21, '1695463322-20043084-01.jpg', 1, 0, '2023-09-23 10:02:02', '2023-09-23 10:02:02'),
(18, 21, '1695463327-20043084-02.jpg', 0, 1, '2023-09-23 10:02:07', '2023-09-23 10:02:07'),
(19, 20, '1695463364-20058041-01.jpg', 1, 0, '2023-09-23 10:02:44', '2023-09-23 10:02:44'),
(20, 20, '1695463368-20058041-02.jpg', 0, 1, '2023-09-23 10:02:49', '2023-09-23 10:02:49'),
(21, 22, '1695463565-10717734-1.jpg', 1, 0, '2023-09-23 10:06:05', '2023-09-23 10:06:05'),
(22, 22, '1695463569-10717734-3.jpg', 0, 1, '2023-09-23 10:06:09', '2023-09-23 10:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) DEFAULT 1 COMMENT '0=active,1=deactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `name`, `email`, `rate`, `comment`, `status`, `created_at`) VALUES
(2, 2, 20, 'dev patel', 'devang.hnrtechnologies@gmail.com', '4', 'test', 1, '2023-10-07 03:38:05'),
(3, 3, 20, 'Parth', 'parth.hnrtechnologies@gmail.com', '3', 'sfadf', 0, '2023-10-07 03:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'L', '2023-07-28 06:30:27', '2023-07-28 06:30:27'),
(3, 'S', '2023-07-28 06:30:42', '2023-07-28 06:30:42'),
(4, 'M', '2023-07-28 06:31:03', '2023-07-28 06:31:03');

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
(3, '4', 'Gujarat', '2023-09-24 11:56:33', '2023-09-25 07:07:14'),
(6, '4', 'Rajesthan', '2023-09-28 03:23:50', '2023-09-28 03:23:50'),
(7, '4', 'Punjab', '2023-09-28 03:25:08', '2023-09-28 03:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `style_types`
--

CREATE TABLE `style_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `style_types`
--

INSERT INTO `style_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Sports', '2023-07-29 00:07:14', '2023-07-29 00:07:14'),
(3, 'Formal', '2023-07-29 00:07:23', '2023-07-29 00:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `set_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `group_id`, `cat_id`, `name`, `page_url`, `meta_title`, `meta_keywords`, `meta_description`, `set_order`, `created_at`, `updated_at`, `image`) VALUES
(15, 7, 15, 'Crop Top', 'crop-top', NULL, NULL, NULL, 0, '2023-09-19 09:10:49', '2023-09-19 09:10:49', NULL),
(16, 7, 15, 'Gown', 'gown', NULL, NULL, NULL, 0, '2023-09-19 09:11:00', '2023-09-19 09:11:00', NULL),
(17, 7, 16, 'Blazers', 'blazers', NULL, NULL, NULL, 0, '2023-09-19 09:11:10', '2023-09-19 09:11:10', NULL),
(18, 7, 16, 'Suit', 'suit', NULL, NULL, NULL, 0, '2023-09-19 09:11:20', '2023-09-19 09:11:20', NULL),
(19, 8, 17, 'Suit Blazer', 'suit-blazer', NULL, NULL, NULL, 2, '2023-09-19 09:11:35', '2023-09-19 09:11:35', NULL),
(20, 8, 17, 'Indo Western', 'indo-western', NULL, NULL, NULL, 3, '2023-09-19 09:11:48', '2023-09-19 09:11:48', NULL),
(21, 8, 17, 'T-Shirts', 't-shirts', NULL, NULL, NULL, 1, '2023-09-19 09:11:59', '2023-09-19 10:50:01', NULL),
(22, 9, 18, 'Skirt', 'skirt', NULL, NULL, NULL, 0, '2023-09-19 09:12:18', '2023-09-19 09:12:18', NULL),
(23, 9, 18, 'Tops', 'tops', NULL, NULL, NULL, 0, '2023-09-19 09:12:31', '2023-09-19 10:58:40', NULL),
(24, 9, 18, 'Saree', 'saree', NULL, NULL, NULL, 0, '2023-09-19 09:12:42', '2023-09-19 09:12:42', NULL),
(25, 9, 19, 'Silk Saree', 'silk-saree', NULL, NULL, NULL, 0, '2023-09-19 09:12:53', '2023-09-19 09:12:53', NULL),
(26, 8, 20, 'Jeans', 'jeans', NULL, NULL, NULL, 0, '2023-09-19 10:47:15', '2023-09-19 10:47:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'test4@gmail.com', '2023-09-22 08:34:45', NULL),
(5, 'test5@gmail.com', '2023-09-22 08:34:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_banners`
--

CREATE TABLE `sub_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `set_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_banners`
--

INSERT INTO `sub_banners` (`id`, `link`, `video_link`, `image`, `set_order`, `created_at`, `updated_at`) VALUES
(4, NULL, NULL, '1695302543sub-banner.jpg', 0, '2023-09-21 13:22:23', '2023-09-21 13:22:23'),
(5, NULL, 'https://www.youtube.com/watch?v=cLY_NloNBL0', '1695302555sub-banner2.jpg', 1, '2023-09-21 13:22:35', '2023-09-21 13:22:35');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `mobile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', '', 'admin@gmail.com', NULL, '$2y$10$e72baN/g/IhpkD4b0PJ9zuSE6mQN7VFBzoqKjCE3pymA1LUQtAsx.', '', NULL, '2023-07-28 03:04:25', '2023-07-28 03:04:25'),
(3, '4', 'Sub Admin', 'sub', 'sub@gmail.com', NULL, '$2y$10$pqnAutawrB8LkMHNiP.oh.BR4.1K77fhF0/6xb5U1DkO46uttQZ4K', '1234567890', NULL, '2023-09-20 06:29:25', '2023-09-20 06:29:25');

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
(1, 'admin', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22', '2023-09-18 05:33:28', '2023-10-06 22:12:18'),
(4, 'subadmin', '1', '1', '2023-09-19 10:04:47', '2023-09-21 06:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userid`, `product_id`, `added_date`) VALUES
(1, 2, 21, '2023-10-06 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_book`
--
ALTER TABLE `address_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_orders`
--
ALTER TABLE `ci_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ci_order_item`
--
ALTER TABLE `ci_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `ci_shipping_address`
--
ALTER TABLE `ci_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colours`
--
ALTER TABLE `colours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `front_users`
--
ALTER TABLE `front_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `style_types`
--
ALTER TABLE `style_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_banners`
--
ALTER TABLE `sub_banners`
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
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_book`
--
ALTER TABLE `address_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ci_orders`
--
ALTER TABLE `ci_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_order_item`
--
ALTER TABLE `ci_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ci_shipping_address`
--
ALTER TABLE `ci_shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colours`
--
ALTER TABLE `colours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupans`
--
ALTER TABLE `coupans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_users`
--
ALTER TABLE `front_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `style_types`
--
ALTER TABLE `style_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sub_banners`
--
ALTER TABLE `sub_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
