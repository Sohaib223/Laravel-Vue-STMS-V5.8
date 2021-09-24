-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2019 at 12:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

DROP TABLE IF EXISTS `complaints`;
CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `complain_code` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `address` text,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `location_id`, `complain_code`, `title`, `description`, `address`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, 'sda', 'asdasd', 'asfas', 5, 3, '2019-03-28 07:53:29', '2019-03-28 08:30:50'),
(3, 1, 3, 'CM-4399971', 'sdvwesev', 'sevsaegsae', 'cbxadv', 3, 3, '2019-03-28 07:58:46', '2019-03-27 15:05:41'),
(4, 1, 3, 'CM-1396571', 'sdvwesev', 'sevsaegsae', 'asgasg', 3, 3, '2019-03-28 07:59:14', '2019-03-27 15:05:36'),
(5, 1, 3, 'CM-8880651', 'About Roads', 'Perfectly Made', 'asgasgb', 2, 3, '2019-03-28 08:31:41', '2019-03-27 15:05:33'),
(6, 1, 3, 'CM-8388421', 'Make A Complaint', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 3, '2019-03-28 11:01:37', '2019-03-28 07:00:43'),
(7, 1, 3, 'CM-4012571', 'Make A Complaint', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 3, '2019-03-28 11:01:49', '2019-03-28 07:00:41'),
(8, 1, 3, 'CM-6416781', 'Complaint', 'Complaint', 'Complaint', 2, 3, '2019-03-28 11:02:18', '2019-03-28 07:00:39'),
(9, 1, 3, 'CM-3999941', 'Make A Complaint', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 3, '2019-03-28 11:17:13', '2019-03-28 07:00:36'),
(10, 1, 3, 'CM-3054841', 'Lorem Ipsum is simply dumm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2, 3, '2019-03-28 11:19:53', '2019-03-28 07:00:34'),
(11, 1, 3, 'CM-1471201', 'asf', 'avasvasvasgas', 'asgasg', 1, 3, '2019-03-27 14:28:03', '2019-03-27 15:05:45'),
(12, 9, 3, 'CM-5565699', 'abcd', 'xzvxzbzbzxzx zxvzd sbxx', 'asfsa', 1, 3, '2019-03-27 20:31:07', '2019-03-28 07:00:48'),
(13, 1, 3, 'CM-2597501', 'abcd', 'asg', 'asf', 1, 3, '2019-03-28 03:46:21', '2019-03-28 07:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_category`
--

DROP TABLE IF EXISTS `complaint_category`;
CREATE TABLE IF NOT EXISTS `complaint_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint_category`
--

INSERT INTO `complaint_category` (`id`, `category_name`, `status`) VALUES
(1, 'abcdasf', 2),
(2, 'asfgsaf', 2),
(3, 'asgsag', 2),
(5, 'asf', 2),
(6, 'hello worl,d', 2),
(7, 'asfasgdchsfgnt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `id_prove` varchar(200) DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `id_prove`, `contact_no`, `address`) VALUES
(2, 9, 'Huzaifa', 'Siddiqui', 'huzzee.24.sidd@gmail.com.jpeg', '1521521512521', 'Dastagir Block 15agasgasg'),
(3, 10, 'sohaib', 'wajid', 'suhaib.wajid@gmail.com.jpeg', '2023486534', 'asgasgas');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_help`
--

DROP TABLE IF EXISTS `emergency_help`;
CREATE TABLE IF NOT EXISTS `emergency_help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `description` text,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency_help`
--

INSERT INTO `emergency_help` (`id`, `user_id`, `location_id`, `address`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 'abacsa', 'asgasf', 2, '2019-03-27 16:38:50', '2019-03-28 07:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `status`) VALUES
(1, 'Route::Resource(\'api/fee', 2),
(2, 'Route::Resource(\'api/feedback\',\'FeedbacksController\');', 2),
(3, 'Karachi Gujar Nalaasdasdas', 2),
(4, 'Machar koloni', 2),
(5, 'aREA toO', 2),
(6, 'ASDASD', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` text,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `user_id`, `read_at`, `location_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Building On Fire', 'Building On Fire Thats Why Traffic Is jammed In dash dasdh road', 1, NULL, 3, 'abcd road2', 2, '2019-03-27 15:44:13', '2019-03-28 07:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('huzzee.24.sidd@gmail.com', '$2y$10$44YAmRZ.9J/ck4WTcZmKZ.q70LP3YHbZv4Pt5SEjaCUjWeIb4JpLm', '2019-03-28 07:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Traffic Police', 1),
(3, 'User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `latitude` int(11) DEFAULT NULL,
  `longitude` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `reg_no` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `status`, `is_verified`, `reg_no`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@yoursite.com', 1, '2019-03-27 19:00:00', '$2y$10$AN2MApT8WJ2yYmvS37xw0OmOsbww7Dj91Oyt3cLn68kn139vq2kTO', 1, 1, NULL, 'TK62UP8GuYM6wDPmVSojRnCK2g80vNk3HzMP22PrBUr6II3d3bqgASc1jxdp', '2019-03-27 10:22:33', '2019-03-27 20:42:34'),
(6, 'haris', 'harisali241@gmail.com', 2, NULL, '$2y$10$hd2yso1oCJL8zVYLjdTij.xpQV8YDJ63ac2LZ0JZtapoXZ62/1imq', 1, 0, NULL, 'pKo6PgiQqE6gNJyAy2DPe0NGJ7PtuOsokZYbkyw0DxEpMwZpSX8JLm47pl2u', '2019-03-26 14:36:51', '2019-03-26 14:36:51'),
(9, 'Huzaifa Siddiqui', 'huzzee.24.sidd@gmail.com', 2, '2019-03-27 20:09:51', '$2y$10$qQS65.y9SE3GTHs4fT20mOk7AbTGvmH3AEjGG0wo32gTUMgnBCItq', 1, 1, 'RG-7671261', 'RbB2onFgw9hFxguaYN6xa7pdYkDAz7pW48EyHa9Z3ExJSNhLsn1ykOLlF4Xi', '2019-03-27 18:56:14', '2019-03-27 20:30:43'),
(10, 'sohaib wajid', 'suhaib.wajid@gmail.com', 2, NULL, '$2y$10$NSCLxb1oxJpsJhps8tQt4uuLYWPnc0vLML1BmyD1iBJTlf7Qtqvpa', 1, 0, NULL, NULL, '2019-03-28 07:09:36', '2019-03-28 07:09:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
