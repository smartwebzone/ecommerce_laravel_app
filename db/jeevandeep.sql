-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 03:48 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeevandeep`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'r27moRdkKRppyeVqahCUQdJBYR6os7Ck', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'wJLQggA82WfE5vpBAHMnxrdXzyMi7Yhw', 1, '2017-11-01 06:44:26', '2017-11-01 06:44:26', '2017-11-01 06:44:26'),
(3, 3, '5gu6T2fKBMraE9dhs7Y0V7S03GSMq2Bp', 1, '2017-11-01 06:45:48', '2017-11-01 06:45:48', '2017-11-01 06:45:48'),
(4, 4, 'uCQz3QtACni931luZ6dtPav8oVjO4FdD', 1, '2017-11-01 06:55:47', '2017-11-01 06:55:47', '2017-11-01 06:55:47'),
(5, 5, 'dOx6NC6VxcnybE7jJedJYyj1M2FcltaH', 1, '2017-11-01 06:57:21', '2017-11-01 06:57:21', '2017-11-01 06:57:21'),
(6, 6, 'BZ2Nd8sLUCBbISNwM3n0LtVeAM7mqfLU', 1, '2017-11-01 06:58:19', '2017-11-01 06:58:19', '2017-11-01 06:58:19'),
(7, 7, 'Kg1dpCOC82RrNHTWp59ByNRGHrU1OhkT', 1, '2017-11-01 07:00:43', '2017-11-01 07:00:43', '2017-11-01 07:00:43'),
(8, 8, 'bgB8QEESpiUhAdjuRTW12ub4WfWYJcMj', 1, '2017-11-01 07:07:48', '2017-11-01 07:07:48', '2017-11-01 07:07:48'),
(9, 9, 'TazK7BOlQGe7HSxiNi8c4wn7dYzQNUAe', 1, '2017-11-01 07:09:23', '2017-11-01 07:09:23', '2017-11-01 07:09:23'),
(10, 10, '1gybQlgXLdDczIxTZRhB8oxRBz2rDKj2', 1, '2017-11-01 07:12:19', '2017-11-01 07:12:19', '2017-11-01 07:12:19'),
(11, 12, 'oluKo8UjgT20uC8CmADwaHLxtgB4zJBF', 1, '2017-11-01 07:30:11', '2017-11-01 07:30:11', '2017-11-01 07:30:11'),
(12, 12, 'vP16RRwn3WTyzrjq66jZOVmd0F6OrXoL', 1, '2017-11-01 07:30:49', '2017-11-01 07:30:49', '2017-11-01 07:30:49'),
(13, 14, '3GYmSRKkbRZ433mydEgWr7hqcgOMXuyM', 1, '2017-11-01 07:47:33', '2017-11-01 07:47:33', '2017-11-01 07:47:33'),
(14, 14, 'ksHM49MlQmGJ6l3Uk2DQ03GCCKtW1xl6', 1, '2017-11-01 07:47:36', '2017-11-01 07:47:36', '2017-11-01 07:47:36'),
(15, 14, 'weam3TYsLof0Y4G27ZR93U4HNfKrTMGx', 1, '2017-11-01 07:49:38', '2017-11-01 07:49:37', '2017-11-01 07:49:38'),
(16, 14, 'nHhD0PlpYXAINPyDiEtmd9R8l9PcfFUy', 1, '2017-11-01 08:00:11', '2017-11-01 08:00:11', '2017-11-01 08:00:11'),
(17, 16, 'nOfFBOaobwahvpR73eSTWb6SvRR4P5As', 1, '2017-11-04 01:03:04', '2017-11-04 01:03:04', '2017-11-04 01:03:04'),
(18, 17, 'MldwezIz8B3LbcWwThcLtepfGcOnJVrU', 1, '2017-11-04 01:15:27', '2017-11-04 01:15:27', '2017-11-04 01:15:27'),
(19, 18, 'Cb1EqJpV3s4p5zvmScVX0gbd9cUqTZvJ', 1, '2017-11-05 15:32:16', '2017-11-05 15:32:16', '2017-11-05 15:32:16'),
(20, 19, 'iJlteuLqwJXzbNSEXzZYMvZqQeK1Bt7O', 1, '2017-11-05 17:31:34', '2017-11-05 17:31:34', '2017-11-05 17:31:34'),
(21, 20, 'wgSCOXPZhkbv6gDo6NSsRPNGFzhlDWLP', 1, '2017-11-06 23:25:19', '2017-11-06 23:25:19', '2017-11-06 23:25:19'),
(22, 22, 'RwKeXzQP9NXsRkZp8dIzF6hzu1yPxwM6', 1, '2017-11-13 22:09:14', '2017-11-13 22:09:14', '2017-11-13 22:09:14'),
(23, 23, 'vBzWUZobDnSUfBJoGNFtTArfFmrpq2jw', 1, '2017-11-13 22:13:13', '2017-11-13 22:13:13', '2017-11-13 22:13:13'),
(24, 24, 'FP3qLtAvQVi4ZCICkA3xY5qPwA01TApR', 1, '2017-11-29 02:24:46', '2017-11-29 02:24:46', '2017-11-29 02:24:46'),
(28, 32, 'R6p0a5pZtPtvbUu5FPSEduz05DhnbUkb', 1, '2017-12-05 18:49:07', '2017-12-05 18:49:06', '2017-12-05 18:49:07'),
(29, 33, 'IHdaUtDHRguBNghQ1dLxJ8Nix3lguhI1', 1, '2017-12-05 18:51:47', '2017-12-05 18:51:47', '2017-12-05 18:51:47'),
(30, 34, '2fYlMjjSKHjALLbcReT1Jmg0PoGIqp8t', 1, '2017-12-05 19:04:52', '2017-12-05 19:04:52', '2017-12-05 19:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `address_master`
--

DROP TABLE IF EXISTS `address_master`;
CREATE TABLE `address_master` (
  `id` int(11) NOT NULL,
  `address_type` enum('billing','shipping') NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `update_date` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_master`
--

INSERT INTO `address_master` (`id`, `address_type`, `address1`, `address2`, `area`, `city`, `state`, `zip`, `add_date`, `added_by`, `update_date`, `updated_by`, `deleted_at`) VALUES
(1, 'shipping', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'Maharastra', '380058', '2017-11-06 11:32:38', 19, '2017-11-10 16:26:27', NULL, NULL),
(2, 'billing', 'A-102', 'Jalaram Chambers', 'Bhaktinagar', 'Navsari', 'Maharastra', '396445', '2017-11-06 11:32:38', 19, '2017-11-10 16:22:07', NULL, NULL),
(3, 'shipping', 'Sagar Apartment', 'Vyasvadi', 'Bhavsar Hostel', 'Ahmedabad', 'Gujarat', '380006', '2017-11-07 17:30:27', 20, '2017-11-07 17:30:27', NULL, NULL),
(4, 'billing', 'Sagar Apartment', 'Vyasvadi', 'Bhavsar Hostel', 'Ahmedabad', 'Gujarat', '380006', '2017-11-07 17:30:28', 20, '2017-11-07 17:30:28', NULL, NULL),
(5, 'shipping', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'GUJARAT', '396445', '2017-11-10 14:40:58', 1, '2017-12-05 20:33:24', NULL, NULL),
(6, 'billing', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'GUJARAT', '396445', '2017-11-10 14:40:58', 1, '2017-12-05 20:33:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address_user`
--

DROP TABLE IF EXISTS `address_user`;
CREATE TABLE `address_user` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_user`
--

INSERT INTO `address_user` (`address_id`, `user_id`) VALUES
(1, 19),
(2, 19),
(3, 20),
(4, 20),
(5, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_master`
--

DROP TABLE IF EXISTS `book_master`;
CREATE TABLE `book_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `standard_id` int(11) DEFAULT NULL,
  `medium` text,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `book_code` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_taxable` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Nontaxable, 1=Taxable',
  `tax` decimal(10,2) DEFAULT NULL,
  `price_after_tax` decimal(10,2) DEFAULT NULL,
  `shipping_charges` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) UNSIGNED NOT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `hsn_code` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `book_master`
--

INSERT INTO `book_master` (`id`, `company_id`, `standard_id`, `medium`, `name`, `description`, `author`, `book_code`, `price`, `is_taxable`, `tax`, `price_after_tax`, `shipping_charges`, `quantity`, `weight`, `hsn_code`, `status`, `added_by`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 2, 1, '', 'Science', 'Science book', 'R.K sharma', 'PL3298382983', '150.00', 0, '0.00', '150.00', '20.00', 0, NULL, NULL, 1, 1, '2017-10-25 17:42:13', '2017-11-06 05:49:26', 1, NULL, NULL),
(2, 1, 1, '', 'Physics', 'Newton\'s all laws', 'Newton', 'N123456', '200.00', 1, '12.00', '224.00', '20.00', 0, NULL, NULL, 1, 1, '2017-11-04 11:34:38', '2017-11-06 05:46:23', 1, NULL, NULL),
(3, 1, 1, '', 'Mathematics', 'Algebra, Trigonometric, etc', 'Rohit Modi', 'R123', '180.00', 1, '18.00', '212.40', '20.00', 0, '0.00', '', 1, 1, '2017-11-04 11:35:11', '2017-11-10 12:59:34', 1, NULL, NULL),
(4, 2, 1, '', 'Social Science', 'Social Science Textbook', 'Rob Madson', 'B123567', '195.00', 0, '0.00', '195.00', '20.00', 0, NULL, NULL, 1, 1, '2017-11-06 05:48:43', '2017-11-06 05:49:19', 1, NULL, NULL),
(5, 1, 2, 'English', 'General Knowledge', 'General Knowledge Textbook', 'Rob Dev', 'Test12345', '190.00', 1, '15.00', '218.50', '10.00', 1, '50.10', '1234', 1, 1, '2017-11-07 12:44:47', '2017-11-10 12:14:24', 1, NULL, NULL),
(6, 1, 1, 'English', 'Periwinkle Blossoms Pattern & Motor Skills', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'PNE107', '97.00', 0, '0.00', '97.00', NULL, 75, '20.00', '4901', 1, 0, '2017-11-10 11:20:43', '2017-11-10 11:26:58', NULL, '2017-11-09 22:56:58', NULL),
(7, 2, 2, 'English', 'Periwinkle Blossoms Pattern & Motor Skills', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'PNE108', '97.00', 0, '0.00', '97.00', NULL, 75, '20.00', '4901', 1, 0, '2017-11-10 11:26:52', '2017-11-24 07:36:35', NULL, '2017-11-09 22:56:58', NULL),
(8, 1, 1, '', 'Test item', '', '', 'T123', '100.00', 1, '0.00', '100.00', NULL, 0, '0.00', '', 1, 1, '2017-11-10 12:39:58', '2017-11-10 12:40:08', NULL, '2017-11-10 00:10:08', NULL),
(9, 1, 1, '', 'Pencil', '', '', 'P123', '100.00', 1, '12.00', '112.00', NULL, 0, '0.00', '', 1, 1, '2017-11-14 15:27:01', '2017-11-14 15:27:01', NULL, NULL, NULL),
(10, 1, 1, '', 'Rubber', '', '', 'R1234', '10.00', 1, '5.00', '10.50', NULL, 0, '0.00', '', 1, 1, '2017-11-14 15:27:30', '2017-11-14 15:27:30', NULL, NULL, NULL),
(11, 1, 1, '', 'Sharpener ', '', '', 'S123', '5.00', 1, '12.00', '5.60', NULL, 0, '0.00', '', 1, 1, '2017-11-14 15:28:16', '2017-11-14 15:28:16', NULL, NULL, NULL),
(12, 1, 1, '', 'Color Box', '', '', 'C123', '50.00', 1, '12.00', '56.00', NULL, 0, '0.00', '', 1, 1, '2017-11-14 15:28:36', '2017-11-14 15:28:36', NULL, NULL, NULL),
(13, 1, 1, '', 'Mark', '', '', 'M123', '100.00', 1, '18.00', '118.00', NULL, 0, '0.00', '', 1, 1, '2017-11-14 15:28:55', '2017-11-14 15:28:55', NULL, NULL, NULL),
(15, 2, 2, 'English', 'Periwinkle Blossoms Pattern & Motor Skills', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'PNE107', '97.00', 0, '0.00', '97.00', NULL, 75, '20.00', '4901', 1, 0, '2017-11-24 07:46:38', '2017-11-24 07:46:38', NULL, NULL, NULL),
(16, 2, 2, 'Gujarati', 'Gujarati Book', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'PNE109', '100.00', 1, '0.12', '100.12', NULL, 75, '20.00', '4902', 1, 0, '2017-11-24 07:46:38', '2017-11-24 08:55:11', 1, NULL, NULL),
(17, 2, 2, 'English', 'Periwinkle Blossoms Pattern & Motor Skills - 2', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'PNE1010', '100.00', 1, '0.00', '100.00', NULL, 75, '20.00', '4901', 1, 0, '2017-11-24 08:05:35', '2017-11-24 08:28:39', 1, NULL, NULL),
(18, 2, 2, 'English', 'Periwinkle Blossoms Pattern & Motor Skills - 3', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'PNE1011', '86.61', 1, '12.00', '97.00', NULL, 75, '20.00', '4901', 1, 0, '2017-11-24 08:29:17', '2017-11-24 08:54:57', 1, NULL, NULL),
(19, 2, 1, '', 'Hello', 'How are you', '', 'A123456', '84.75', 1, '18.00', '100.00', NULL, 0, '0.00', '', 1, 1, '2017-11-24 08:31:48', '2017-11-24 08:54:48', 1, NULL, NULL),
(21, 2, NULL, '', 'Why this kolavery D o D', '', '', 'W124', '86.96', 1, '15.00', '100.00', NULL, 0, '0.00', '', 1, 1, '2017-11-24 10:55:21', '2017-11-24 10:55:21', NULL, NULL, NULL),
(22, 2, NULL, 'English', 'Periwinkle Blossoms Pattern & Motor Skills - 4', 'Periwinkle Blossoms Pattern & Motor Skills', 'Ayesha Baig', 'W124', '107.14', 1, '12.00', '120.00', NULL, 75, '20.00', '4901', 1, 0, '2017-11-24 10:56:38', '2017-11-28 11:31:11', 1, NULL, NULL),
(23, 2, NULL, '', 'Test', '', '', 'W124', '150.00', 1, '0.00', '150.00', NULL, 0, '0.00', '', 1, 1, '2017-11-28 11:31:41', '2017-11-28 11:32:28', 1, NULL, NULL),
(24, 1, NULL, '', 'Test', '', '', 'W124', '154.55', 1, '10.00', '170.00', NULL, 0, '0.00', '', 1, 1, '2017-11-28 11:34:33', '2017-11-28 11:34:53', 1, NULL, NULL),
(25, 1, NULL, '', 'Test', '', '', 'W124', '95.45', 1, '10.00', '105.00', NULL, 0, '0.00', '', 1, 1, '2017-11-28 11:35:31', '2017-11-28 11:35:31', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `preferred_delivery_date` date DEFAULT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

DROP TABLE IF EXISTS `city_master`;
CREATE TABLE `city_master` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

DROP TABLE IF EXISTS `company_master`;
CREATE TABLE `company_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `payment_gateway` varchar(50) DEFAULT NULL,
  `payment_gateway_key` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `company_master`
--

INSERT INTO `company_master` (`id`, `name`, `phone`, `email`, `contact_person`, `address1`, `address2`, `area`, `city`, `state`, `zip`, `payment_gateway`, `payment_gateway_key`, `status`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Safal Infotech', '9974916374', 'ajaydpatel15@gmail.com', 'Ajay Patel', '208, Rudra Arcade', 'Hemlet Cross Road', 'Navrangpura', 'Ahmedabad', 'Gujarat', '380009', 'PayUMoney', 'zPr3a9nc', 1, '2017-10-23 18:00:50', 1, '2017-12-07 08:49:18', 1, NULL, NULL),
(2, 'Yashvi IT Solutions', '9510983350', 'rohitpmodi@gmail.com', 'Rohit Modi', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'Gujarat', '380058', 'PayUMoney', 'xoA6hykW', 1, '2017-11-06 04:41:16', 1, '2017-11-14 15:08:12', 1, NULL, NULL),
(3, 'Jeevandeep', '9510983350', 'admin@jeevandeep.in', 'Ajay Patel', 'M-303', 'Aarohi', 'South Bopal', 'Ahmedabad', 'MAHARASTRA', '380058', '', '', 1, '2017-12-07 09:24:34', 1, '2017-12-07 09:24:34', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `template` enum('Register','Order','Forgot Password','Email Validation','Order Status') DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `template`, `subject`, `body`, `status`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Register', 'Register', 'Welcome to Jeevandeep Online Portal', 'Hello <<student_name>>,\r\n\r\nWelcome to Jeevandeep online portal.\r\n\r\nPlease find below login credentials.\r\nUsername : <<username>>\r\nPassword : <<password>>\r\n\r\nThanks,\r\nJeevandeep Team', 1, '2017-10-15 11:17:29', 1, '2017-10-15 11:48:00', 1, NULL, NULL),
(2, 'Forgot Password', 'Forgot Password', 'Forgot your password?', 'Hi <<parent_name>>,\r\n\r\nYou have requested for a new password. Please click on below link to reset your password.\r\n<<reset_password_link>>\r\n\r\nThanks,\r\nJeevandeep Team', 1, '2017-10-15 11:46:08', 1, '2017-11-29 15:07:53', 1, NULL, NULL),
(3, 'Order Generate', 'Order', 'Jeevandeep Order', 'Hi <<student_name>>,\n\nThank you for your purchase. If you have any questions that we can help with, please feel free to email us at info@jeevandeep.com. Thanks so much!\n<<order_details>>\nThanks,\nJeevandeep Team', 1, '2017-11-10 19:36:58', 1, '2017-11-10 21:49:16', 1, NULL, NULL),
(4, 'Change Order status', 'Order Status', 'Order was successfully updated', 'Hi <<student_name>>,\r\n\r\nYour Order #<<order_no>> is <strong><<status>></strong>.\r\n\r\nThank you,\r\nJeevandeep!', 1, '2017-11-10 19:40:03', 1, '2017-11-10 19:55:44', NULL, NULL, NULL),
(5, 'Send email validation link', 'Email Validation', 'Welcome to Jeevandeep', 'Hi User,\nTo sign in to our site, confirm you email by clicking below link:\n<strong>Verify:</strong> <<link>>\n<strong>Password:</strong> Password you set when creating account\n\nThank you, Jeevandeep!', 1, '2017-11-10 19:45:04', 1, '2017-11-14 10:38:52', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form_posts`
--

DROP TABLE IF EXISTS `form_posts`;
CREATE TABLE `form_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_name_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender_phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `is_answered` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reply` text COLLATE utf8_unicode_ci,
  `reply_admin` int(11) DEFAULT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `missing_schools`
--

DROP TABLE IF EXISTS `missing_schools`;
CREATE TABLE `missing_schools` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_schools`
--

INSERT INTO `missing_schools` (`id`, `name`, `description`, `status`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Sheth R.J.J', 'Navsari', 1, '2017-11-06 06:11:25', NULL, '2017-11-06 06:11:25', NULL, NULL, NULL),
(2, 'Diwan Ballubhai', 'Ahmedabad', 1, '2017-11-06 06:39:15', NULL, '2017-11-06 06:39:15', NULL, NULL, NULL),
(3, 'DPS Bopal', 'Ahmedabad city', 1, '2017-11-07 11:53:04', NULL, '2017-11-07 11:53:04', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `missing_standards`
--

DROP TABLE IF EXISTS `missing_standards`;
CREATE TABLE `missing_standards` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missing_standards`
--

INSERT INTO `missing_standards` (`id`, `name`, `description`, `status`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Grade 10', 'CN Vidyalaya', 1, '2017-11-06 06:39:44', NULL, '2017-11-06 06:39:44', NULL, NULL, NULL),
(2, 'Grade 5', 'Grade 5 for Sheth PH Vidyalaya missing', 1, '2017-11-07 11:53:49', NULL, '2017-11-07 11:53:49', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

DROP TABLE IF EXISTS `order_master`;
CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `shipping` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` varchar(50) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `preferred_delivery_date` date DEFAULT NULL,
  `billing_address1` varchar(100) DEFAULT NULL,
  `billing_address2` varchar(100) DEFAULT NULL,
  `billing_area` varchar(100) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(50) DEFAULT NULL,
  `billing_zip` varchar(10) DEFAULT NULL,
  `shipping_address1` varchar(100) DEFAULT NULL,
  `shipping_address2` varchar(100) DEFAULT NULL,
  `shipping_area` varchar(100) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_zip` varchar(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `issue_raised` enum('0','1') NOT NULL DEFAULT '0',
  `order_notes` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `user_id`, `amount`, `tax`, `shipping`, `total_amount`, `status_id`, `order_date`, `transaction_id`, `reference_no`, `preferred_delivery_date`, `billing_address1`, `billing_address2`, `billing_area`, `billing_city`, `billing_state`, `billing_zip`, `shipping_address1`, `shipping_address2`, `shipping_area`, `shipping_city`, `shipping_state`, `shipping_zip`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `issue_raised`, `order_notes`) VALUES
(1, 19, '380.00', '56.40', '23.60', '460.00', 1, '2017-11-06 06:06:11', NULL, NULL, '2017-10-06', 'A-102', 'Jalaram Chambers', 'Bhaktinagar', 'Navsari', 'Gujarat', '396445', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'Gujarat', '380058', '2017-11-06 06:06:11', NULL, NULL, NULL, '0', NULL),
(2, 19, '345.00', '0.00', '35.40', '380.40', 1, '2017-11-06 06:06:19', NULL, NULL, '2017-10-06', 'A-102', 'Jalaram Chambers', 'Bhaktinagar', 'Navsari', 'Gujarat', '396445', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'Gujarat', '380058', '2017-11-06 06:06:19', NULL, NULL, NULL, '0', NULL),
(3, 20, '380.00', '56.40', '23.60', '460.00', 1, '2017-11-07 12:09:08', NULL, NULL, '2017-10-05', 'Sagar Apartment', 'Vyasvadi', 'Bhavsar Hostel', 'Ahmedabad', 'Gujarat', '380006', 'Sagar Apartment', 'Vyasvadi', 'Bhavsar Hostel', 'Ahmedabad', 'Gujarat', '380006', '2017-12-07 14:43:19', 1, NULL, NULL, '0', NULL),
(4, 20, '345.00', '0.00', '35.40', '380.40', 1, '2017-11-07 12:09:16', NULL, NULL, '2017-10-05', 'Sagar Apartment', 'Vyasvadi', 'Bhavsar Hostel', 'Ahmedabad', 'Gujarat', '380006', 'Sagar Apartment', 'Vyasvadi', 'Bhavsar Hostel', 'Ahmedabad', 'Gujarat', '380006', '2017-12-07 14:43:19', NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `qty`, `price`) VALUES
(1, 20, 1, '460'),
(2, 26, 1, '380'),
(3, 20, 1, '460'),
(4, 26, 1, '380');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

DROP TABLE IF EXISTS `persistences`;
CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(18, 1, 'N6VxxDDk5iv8xTSlEnHEIgU3cOwh5Rdt', '2017-10-15 09:08:54', '2017-10-15 09:08:54'),
(19, 1, 'LPeT8FjI9l75Rq3IlZTF0DnJjDvZ51yL', '2017-10-15 21:05:26', '2017-10-15 21:05:26'),
(21, 1, 'fIhGN9w2uRL6oPu5dsnhGdLJ7rKjPWsT', '2017-10-15 21:58:06', '2017-10-15 21:58:06'),
(23, 1, 'MxgJQnOAyRsy7BatC5EY6ZfMV9SZG11R', '2017-10-17 03:36:51', '2017-10-17 03:36:51'),
(24, 1, 'KSfJrxGHg1IGhhoP3debUy60p8yCeeZI', '2017-10-23 04:26:19', '2017-10-23 04:26:19'),
(25, 1, 'wvLc9l3qvJO6L2Bpc17qomLDR5FlwgS4', '2017-10-23 06:21:51', '2017-10-23 06:21:51'),
(26, 1, '3TolQmG5rdI3WrigyFWtAYAyJWXwYiIa', '2017-10-23 14:57:59', '2017-10-23 14:57:59'),
(27, 1, 'PRgsb28Bcsv6uC9EU066gPoi8ZBRvjlE', '2017-10-25 04:33:43', '2017-10-25 04:33:43'),
(28, 1, '0QwjZj55meI28KUwrvkpuKesY84yi7A8', '2017-10-27 17:07:16', '2017-10-27 17:07:16'),
(29, 1, 'rFHfAYct0mzAr09BOkJ0tjqJN0f30AmH', '2017-10-27 17:09:54', '2017-10-27 17:09:54'),
(30, 1, 'U5NDQJ26XRhQo1Fpupc4ZnB4GHQ3Zm64', '2017-10-27 17:19:54', '2017-10-27 17:19:54'),
(33, 1, 'l8DHtPdED2Uod3948umVaIRq6Ss1fgCJ', '2017-10-27 17:26:18', '2017-10-27 17:26:18'),
(34, 1, 'WFa3fXgpWO7VxzxFaPWAfZqnmHTn4czu', '2017-10-27 17:26:31', '2017-10-27 17:26:31'),
(35, 1, 'y7BbK0jGMlDi9Bzq2EIsS8RsOsqPxbzK', '2017-10-27 17:27:00', '2017-10-27 17:27:00'),
(36, 1, 'MFk2Dh5ph0B3QPaKDk5u7BL7hnT4svll', '2017-10-27 17:28:32', '2017-10-27 17:28:32'),
(37, 14, '3u3vnEmuuJJlhz71QcFE4Zqo8d4ovKUE', '2017-11-01 07:48:09', '2017-11-01 07:48:09'),
(38, 14, '1aZ7WNsTnbthMPIWSBenoDwcseTmS4RY', '2017-11-01 07:53:32', '2017-11-01 07:53:32'),
(39, 14, 'v4tRn6PpbSbwOi5mQ7d8bbNAzaom2zzv', '2017-11-01 07:53:42', '2017-11-01 07:53:42'),
(40, 14, 'ZRjPgSszNmA9vhaJ5rYDPiAqEuJSeXRh', '2017-11-01 07:54:36', '2017-11-01 07:54:36'),
(41, 14, '5FZMZtuvnJSvIgrK1unMFScIpDazMdOJ', '2017-11-01 07:55:39', '2017-11-01 07:55:39'),
(42, 14, 'TX9GC03E5WL1qznSs9ERF6X2kpVodGdu', '2017-11-01 07:55:40', '2017-11-01 07:55:40'),
(43, 14, 'fjw1uuxnjUrg4czydmETngjEUB6Twdzy', '2017-11-01 07:56:27', '2017-11-01 07:56:27'),
(45, 14, 'J1QkyyPsTjBO4VgC9L6GYIQkbHx2zgcn', '2017-11-01 08:00:11', '2017-11-01 08:00:11'),
(46, 14, 'GclHGJzVUYxYNK93dPAHGRQTGDfF9DUf', '2017-11-01 08:09:53', '2017-11-01 08:09:53'),
(49, 14, 'qs0E61vpIpxHXRPpHsUeysih5dDw3XHc', '2017-11-03 08:01:50', '2017-11-03 08:01:50'),
(50, 14, 'zodzXsM8GEvRDIXa7JAUgeWmXISjWJtu', '2017-11-03 10:12:05', '2017-11-03 10:12:05'),
(53, 1, 'Lw5scytkJO4cY473GWIVXJWPF6EcVTUA', '2017-11-03 22:59:02', '2017-11-03 22:59:02'),
(54, 1, 'VYyzMCrgxG0clt1j7TfznhUZuLsNBNpH', '2017-11-03 23:15:30', '2017-11-03 23:15:30'),
(55, 16, 'QVEwkK8984zJYN4y8oniKw9t6HOHGDTK', '2017-11-04 01:03:04', '2017-11-04 01:03:04'),
(56, 17, '6k4Bqa7Gn3QQlWzGkPLd12zMsGRD6Wtw', '2017-11-04 01:15:27', '2017-11-04 01:15:27'),
(57, 17, 'qeRAoPG4HUFvjBVomdtRBDhWfgUUR7lK', '2017-11-04 16:39:04', '2017-11-04 16:39:04'),
(59, 17, '1C84I2ZsU3R2jwMThtPMviceBMCzmrW3', '2017-11-04 18:29:27', '2017-11-04 18:29:27'),
(60, 1, '41PAyhyGWZQeLeI6QD1QUlQv1GfcXvCP', '2017-11-04 19:05:54', '2017-11-04 19:05:54'),
(61, 17, 'CPgCbljZZjuNFMrZtvbg1OGz4rlYlcHi', '2017-11-04 19:12:27', '2017-11-04 19:12:27'),
(62, 17, '6G4ZWtNKRpQRoXKh4GyZFQMGGDspWLVA', '2017-11-04 19:39:42', '2017-11-04 19:39:42'),
(63, 17, 'LUbUYmSBXW0n54X2Wez7X5FxIZz81zQW', '2017-11-04 20:17:49', '2017-11-04 20:17:49'),
(64, 17, 'sQxGW15MuoUDuV5CmKKqRIefn9KhNtK3', '2017-11-04 20:20:13', '2017-11-04 20:20:13'),
(65, 1, '2Uvo02LIHD7yjcpHFWWOh9dXqWcL9hrT', '2017-11-04 20:28:59', '2017-11-04 20:28:59'),
(66, 1, 'ae7Y0sLkKVOErJW5KXfOJtVUsAoPQkoq', '2017-11-04 20:31:29', '2017-11-04 20:31:29'),
(67, 17, 'pCF9pPRRQhmZGh3XNqYAkbjr4EkOG9l2', '2017-11-04 21:01:04', '2017-11-04 21:01:04'),
(68, 1, 'D1GmWmsCva0an8Wbsj6LFnMtCE8fo2GZ', '2017-11-04 21:02:41', '2017-11-04 21:02:41'),
(69, 17, 'wAoSGhzDd2v14MDXDAoSyue3LuVqmKeR', '2017-11-04 21:05:38', '2017-11-04 21:05:38'),
(70, 1, 'sykQLJdwFidxiAPYfSIKP7uO7ohdpDpT', '2017-11-04 23:01:32', '2017-11-04 23:01:32'),
(71, 1, 'JU8ypMDSJII0qaD3UHKUxaCFf2N3Z81y', '2017-11-05 04:38:43', '2017-11-05 04:38:43'),
(72, 17, 'EK4wYYWBVTRDoovtWxIusjrzCfHrk6ED', '2017-11-05 07:06:28', '2017-11-05 07:06:28'),
(73, 1, 'O7kJJ5K7iU0emao8tDD68WMKWwoS4exL', '2017-11-05 07:06:51', '2017-11-05 07:06:51'),
(74, 1, 'afvP7MvN3bunaB1JnIvGP2Doinja5UIw', '2017-11-05 15:29:10', '2017-11-05 15:29:10'),
(75, 18, 'UFcDo76WiijpmH4PUd5bxRqPGlODXLYC', '2017-11-05 15:32:16', '2017-11-05 15:32:16'),
(76, 1, 'TWwnsc2pU13aoLM0KG5ayKWuGCQCKw78', '2017-11-05 15:39:32', '2017-11-05 15:39:32'),
(77, 1, 'veF9DQB1vkLP7ckB9MaoL5isp0ZEq5nD', '2017-11-05 17:10:55', '2017-11-05 17:10:55'),
(78, 19, 'dEghabINSFR41v6DMgjIpcojhiJbw1X6', '2017-11-05 17:31:34', '2017-11-05 17:31:34'),
(79, 1, 'oYB82Ml8gcKmVFIrIcAh6jwdDEXYZ5AP', '2017-11-06 06:19:27', '2017-11-06 06:19:27'),
(82, 20, '7Tmyo5ZqlmCqOlIdyVlPbJoOW8JEpKuY', '2017-11-06 23:25:19', '2017-11-06 23:25:19'),
(84, 1, 'J1eh1ZMKhSwcAWinqOyFlOlTq8lQJ2Ao', '2017-11-06 23:46:23', '2017-11-06 23:46:23'),
(85, 20, 'HLs28i1bZHGIlEhLUwsYPJc5bcDdDpoP', '2017-11-06 23:59:00', '2017-11-06 23:59:00'),
(86, 20, 'QE3PfMF1mnOeAT9rbFiERE2qzormeI1e', '2017-11-07 00:00:14', '2017-11-07 00:00:14'),
(87, 20, 'nFO0XjQm9rnEXc5lXLDEEaAONRbPLoaa', '2017-11-07 00:03:59', '2017-11-07 00:03:59'),
(88, 19, 'psjyXQ8sjrJ0tVambhLc1C6lI4Lcx7df', '2017-11-07 06:30:05', '2017-11-07 06:30:05'),
(89, 1, 'pSluWrTEwKCv1eqBlrGJih7urkGKWW8z', '2017-11-07 06:37:12', '2017-11-07 06:37:12'),
(90, 1, 'jOFSMGKbdbnDRLHcGsUeA4nH5YDlqf7s', '2017-11-08 23:22:06', '2017-11-08 23:22:06'),
(91, 1, 'ZWHklQlM8fDSWOFX75aveOvDr8B4vuAJ', '2017-11-08 23:43:43', '2017-11-08 23:43:43'),
(92, 1, '7vGGkrHUUKDDrULHCZW0FZ3rCKyHiDos', '2017-11-09 12:15:56', '2017-11-09 12:15:56'),
(93, 1, 'LsctMdEQccN0DVadBm9FZJ83rdoCSf4i', '2017-11-09 19:21:47', '2017-11-09 19:21:47'),
(94, 19, '3HxPTwOoZpOuzLu7kzPNuINNGqmReZy6', '2017-11-09 22:21:27', '2017-11-09 22:21:27'),
(95, 1, '8EalVdwXV4HCOaI0wGxwzlnY27wLqZvV', '2017-11-09 22:23:36', '2017-11-09 22:23:36'),
(96, 1, 'aJLtLIdi5etH6sxfH4EkEUrMjSP2VQ1j', '2017-11-09 22:28:31', '2017-11-09 22:28:31'),
(97, 1, '462gNm5zQ80jKVXOarsT5SCbD3wZEsBE', '2017-11-10 10:33:42', '2017-11-10 10:33:42'),
(98, 1, '4G4xUuUuhJ7ubHrUHZu4FvGH3C0SmpOb', '2017-11-13 07:23:38', '2017-11-13 07:23:38'),
(99, 1, 'rpO5rTxP7glOdgxSL1YDZvRnqY8vqtVJ', '2017-11-13 21:42:50', '2017-11-13 21:42:50'),
(100, 1, 'gcc4NN5kQx7Uff5wcxdb3d1PaKZgV4Bb', '2017-11-13 21:59:07', '2017-11-13 21:59:07'),
(102, 19, 'ewgE6DnQs99t4cCZHEcjJT7GnBg2cH4P', '2017-11-13 22:07:04', '2017-11-13 22:07:04'),
(103, 22, 'IyzzlTFX2lsWzCrMVKtvUowRWv3ww5SZ', '2017-11-13 22:09:14', '2017-11-13 22:09:14'),
(104, 23, '4159zBd83Lf2XxTMv8VWtghE1bg4uhcv', '2017-11-13 22:13:13', '2017-11-13 22:13:13'),
(105, 19, 'WGZGeRCY3P84QQE66Gvo39cRqpGv3no5', '2017-11-13 22:53:10', '2017-11-13 22:53:10'),
(106, 19, 'RorqpbmJ00UOWPCKYejk96yW0gm3daGk', '2017-11-13 22:53:33', '2017-11-13 22:53:33'),
(108, 1, 'fC0CBWjkpB0AoTnqpyJmSIyD7dyqBX07', '2017-11-13 22:56:14', '2017-11-13 22:56:14'),
(109, 1, 'ZRgyhlL6ADgvPbxyAzXZxrxmgvx7x6VB', '2017-11-14 02:37:33', '2017-11-14 02:37:33'),
(110, 1, 'SxKAChNxrglHIUd8fu7XydJBDZgIVctP', '2017-11-14 02:37:33', '2017-11-14 02:37:33'),
(111, 1, 'vUmMXRbSkcuXpBcH1kxlMDQBF2lfJU0f', '2017-11-16 22:50:24', '2017-11-16 22:50:24'),
(112, 1, 'q46EVu6U1tJw7muCDtMFUD3NI08aRiv8', '2017-11-17 00:30:14', '2017-11-17 00:30:14'),
(113, 1, 'BMwgKYmafrIV6vI44KW5cp4yqJsCyUGl', '2017-11-17 09:53:04', '2017-11-17 09:53:04'),
(114, 1, 'IpxIC3UGNDvv7MsVsJyUOWT1nAA5Vi5P', '2017-11-23 18:19:42', '2017-11-23 18:19:42'),
(115, 1, '5f1coeySQEzLTAGCJmpDb6DO3VIVD44I', '2017-11-27 21:53:22', '2017-11-27 21:53:22'),
(116, 1, 'lhBlZFreIOMWVnzF3ejzwPiKNa3DAYh7', '2017-11-28 19:44:32', '2017-11-28 19:44:32'),
(117, 1, 'U05uwalNWcWl3jR7kCQkVYyuvbMaKVAl', '2017-11-28 19:44:33', '2017-11-28 19:44:33'),
(119, 1, '2JVbSSpjXLUBNDIaotrELQFUz9p6pHMA', '2017-11-28 19:45:37', '2017-11-28 19:45:37'),
(120, 24, '56TI8Q15oDlyIczNXNUpvCxHbIlXUwI5', '2017-11-29 02:24:46', '2017-11-29 02:24:46'),
(121, 1, '0zX377Eh2oaI0Q3JHTjlN1gtcPAVCqMF', '2017-11-29 02:30:09', '2017-11-29 02:30:09'),
(122, 1, '2eXXyYcNdjQivzNqg5f7OTXVlbUH4LbR', '2017-12-05 00:53:20', '2017-12-05 00:53:20'),
(123, 1, 'dBwcf2IHBJgjhByADGN7f4CFaRLaF3jW', '2017-12-05 07:26:22', '2017-12-05 07:26:22'),
(124, 1, 'yQ8wthkjNU3YZqVnC7Cdj1XW6EgdBQQa', '2017-12-05 07:49:27', '2017-12-05 07:49:27'),
(125, 1, 'ZbewtC4ipisWPHjaH8dVUtu3HxwSg6jz', '2017-12-05 09:59:03', '2017-12-05 09:59:03'),
(126, 29, '2tbA6m7zflBsT2uRTnr5JGOLTrf7QHNl', '2017-12-05 18:35:19', '2017-12-05 18:35:19'),
(127, 29, 'XvCi6rSkJiNIPvDRHinqgGHSYFaxuQ2C', '2017-12-05 18:40:34', '2017-12-05 18:40:34'),
(128, 29, 'r6EkJ3LOiCq6VPG9mc0LiDFlpcEcrIP9', '2017-12-05 18:42:13', '2017-12-05 18:42:13'),
(129, 32, 'ZmyrAJrjan8bLtPgFURQvhaEQao001IG', '2017-12-05 18:49:07', '2017-12-05 18:49:07'),
(130, 33, '4lxX4hRHg2W5lFqbGdm6L5WpvTruKHSU', '2017-12-05 18:51:47', '2017-12-05 18:51:47'),
(131, 34, 'WIPZaV62oALS1rM1xQv7aoCPkQRhCRnU', '2017-12-05 19:04:52', '2017-12-05 19:04:52'),
(132, 34, 'koQZoxvRsbvMDDyEXiOf5aXYAdhMlbJC', '2017-12-05 19:06:04', '2017-12-05 19:06:04'),
(133, 1, 'HHXVl1N0PJlXta5yhg6R3oUrMfLdfY0W', '2017-12-05 19:23:53', '2017-12-05 19:23:53'),
(134, 19, 'FhBYjKDmDWAnqSz1mVDTEc1o5i4rnjTm', '2017-12-05 19:24:25', '2017-12-05 19:24:25'),
(135, 1, 'CpS66mZ6qfl7Us4YVhnrK4KODk3svG94', '2017-12-05 19:26:25', '2017-12-05 19:26:25'),
(136, 1, '44rqfEl8i0ynGayuZ1jwNLkS5OLlY3K8', '2017-12-05 19:31:52', '2017-12-05 19:31:52'),
(137, 1, 'PCK5DkmG9SVeQbCObI7QRJESX1g3GHyE', '2017-12-05 19:32:16', '2017-12-05 19:32:16'),
(138, 1, 'uSKU0kOyNMPvbv1L0RTmJS5bGSKrgTTM', '2017-12-06 19:15:57', '2017-12-06 19:15:57'),
(140, 19, 'oWXqtndakzK2n0KG7QrZZsN5J8bfHxE0', '2017-12-06 21:09:38', '2017-12-06 21:09:38'),
(141, 1, 'lskODAs75XUZG1e2CjXrPBM0hF2EUGd3', '2017-12-06 21:13:08', '2017-12-06 21:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_books`
--

DROP TABLE IF EXISTS `product_books`;
CREATE TABLE `product_books` (
  `product_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_books`
--

INSERT INTO `product_books` (`product_id`, `book_id`, `quantity`) VALUES
(20, 2, 1),
(20, 3, 1),
(26, 1, 1),
(26, 4, 1),
(27, 2, 1),
(27, 3, 1),
(28, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

DROP TABLE IF EXISTS `product_master`;
CREATE TABLE `product_master` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `is_taxable` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Nontaxable, 1=Taxable',
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `long_description` text NOT NULL,
  `instate_shipping_charges` decimal(10,2) DEFAULT NULL,
  `outstate_shipping_charges` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `school_id`, `standard_id`, `company_id`, `is_taxable`, `title`, `description`, `long_description`, `instate_shipping_charges`, `outstate_shipping_charges`, `status`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(20, 1, 1, 1, 1, 'Gread 8-12 Set 1', 'Algebra, Trigonometric, etc', 'Cras auctor ante non elementum malesuada. Cras posuere, est ac convallis auctor, ligula risus fermentum nibh, vitae efficitur libero mauris sed lectus. Sed varius turpis a tellus pulvinar tempus. In elit eros, iaculis a pulvinar at, suscipit viverra nisi. Suspendisse faucibus nunc ac massa consectetur sagittis. Etiam euismod nunc lorem. In nisi justo, consequat at ante vestibulum, tristique sagittis nisi.', '20.00', '50.00', 1, '2017-10-25 17:17:13', 1, '2017-11-06 05:50:36', 1, NULL, NULL),
(26, 1, 1, 1, 0, 'Gread 8-12 Set 2', 'Science, Social Science', 'Pellentesque justo libero, placerat a venenatis ut, rutrum ut sem. Curabitur in elit sit amet risus imperdiet ultrices sit amet eu ligula. Aliquam eleifend vulputate sem eget rutrum. Nulla a ornare felis. Nulla facilisi. Nam commodo, diam et mattis vestibulum, nisl nisi fringilla sapien, eget cursus elit metus nec magna. Nulla a sapien arcu. Ut viverra augue in sapien dapibus, at efficitur turpis molestie. Praesent nunc nisi, ultrices vel semper eu, dapibus at ex. Morbi sagittis lacinia libero. Donec auctor aliquam ex, non dictum ante laoreet sed.', '30.00', '60.00', 1, '2017-11-04 11:26:27', 1, '2017-11-10 11:03:24', 1, NULL, NULL),
(27, 1, 1, 1, 1, 'Copy of Gread 8-12 Set 1', 'Algebra, Trigonometric, etc', 'Cras auctor ante non elementum malesuada. Cras posuere, est ac convallis auctor, ligula risus fermentum nibh, vitae efficitur libero mauris sed lectus. Sed varius turpis a tellus pulvinar tempus. In elit eros, iaculis a pulvinar at, suscipit viverra nisi. Suspendisse faucibus nunc ac massa consectetur sagittis. Etiam euismod nunc lorem. In nisi justo, consequat at ante vestibulum, tristique sagittis nisi.', '20.00', '50.00', 1, '2017-11-07 12:41:57', 1, '2017-12-07 09:44:45', 1, '2017-12-06 21:14:45', NULL),
(28, 2, 2, 1, 1, 'Grade 6 Set 1', 'Test desc', 'Test desc long', '40.00', '60.00', 1, '2017-11-07 12:46:15', 1, '2017-11-13 09:09:53', 1, NULL, NULL),
(29, 1, 1, 1, 1, 'Test product', '', '', '20.00', '40.00', 1, '2017-11-10 12:50:35', 1, '2017-11-10 12:50:35', NULL, NULL, NULL),
(30, 2, 2, 2, 0, 'Hello', '', '', '50.00', '100.00', 1, '2017-11-24 11:03:17', 1, '2017-11-24 11:03:17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

DROP TABLE IF EXISTS `reminders`;
CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 17, 'kZ9nrA37qWyGvx2MpwbC6aTI3hOdnwum', 1, '2017-11-04 20:17:26', '2017-11-04 19:37:58', '2017-11-04 20:17:26'),
(2, 17, 'eBZR92xq4amG3svS5u07h24wCscFlCK8', 1, '2017-11-04 20:19:49', '2017-11-04 20:19:30', '2017-11-04 20:19:49'),
(3, 17, '4S1WYSt3bhaxhgdZNeH6cCyeG6JMWhSq', 1, '2017-11-05 06:24:34', '2017-11-05 06:24:14', '2017-11-05 06:24:34'),
(4, 20, 'Z3Kt9CzTsvg01e9wmIhe2IfIgnezdkW0', 1, '2017-11-06 23:42:47', '2017-11-06 23:40:50', '2017-11-06 23:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'SuperAdmin', NULL, '2016-09-27 06:35:26', '2016-09-27 06:35:26'),
(2, 'admin', 'Admin', '{\"admin.dashboard\":true,\"admin.settings\":true,\"admin.settings.save\":true,\"admin.log\":true,\"admin.form-post.index\":true,\"admin.photo_gallery.index\":true,\"admin.photo_gallery.view\":true,\"admin.photo_gallery.create\":true,\"admin.photo_gallery.store\":true,\"admin.photo_gallery.edit\":true,\"admin.photo_gallery.update\":true,\"admin.photo_gallery.destroy\":false,\"admin.slider.index\":false,\"admin.slider.view\":false,\"admin.slider.create\":false,\"admin.slider.store\":false,\"admin.slider.edit\":false,\"admin.slider.update\":false,\"admin.slider.destroy\":false,\"admin.article.index\":true,\"admin.article.view\":true,\"admin.article.create\":true,\"admin.article.store\":true,\"admin.article.edit\":true,\"admin.article.update\":true,\"admin.article.destroy\":false,\"admin.news.index\":false,\"admin.news.view\":false,\"admin.news.create\":false,\"admin.news.store\":false,\"admin.news.edit\":false,\"admin.news.update\":false,\"admin.news.destroy\":false,\"admin.project.index\":false,\"admin.project.view\":false,\"admin.project.create\":false,\"admin.project.store\":false,\"admin.project.edit\":false,\"admin.project.update\":false,\"admin.project.destroy\":false,\"admin.category.index\":true,\"admin.category.view\":true,\"admin.category.create\":true,\"admin.category.store\":true,\"admin.category.edit\":true,\"admin.category.update\":true,\"admin.category.destroy\":false,\"admin.faq.index\":true,\"admin.faq.view\":true,\"admin.faq.create\":true,\"admin.faq.store\":true,\"admin.faq.edit\":true,\"admin.faq.update\":true,\"admin.faq.destroy\":false,\"admin.page.index\":true,\"admin.page.view\":true,\"admin.page.create\":true,\"admin.page.store\":true,\"admin.page.edit\":true,\"admin.page.update\":true,\"admin.page.destroy\":false,\"admin.video.index\":true,\"admin.video.view\":true,\"admin.video.create\":true,\"admin.video.store\":true,\"admin.video.edit\":true,\"admin.video.update\":true,\"admin.video.destroy\":false,\"admin.menu.index\":true,\"admin.menu.view\":true,\"admin.menu.create\":false,\"admin.menu.store\":false,\"admin.menu.edit\":false,\"admin.menu.update\":false,\"admin.menu.destroy\":false,\"admin.setting.index\":true,\"admin.setting.view\":true,\"admin.setting.create\":true,\"admin.setting.store\":true,\"admin.setting.edit\":true,\"admin.setting.update\":true,\"admin.setting.destroy\":false,\"admin.user.index\":true,\"admin.user.view\":true,\"admin.user.create\":true,\"admin.user.store\":true,\"admin.user.edit\":true,\"admin.user.update\":true,\"admin.user.destroy\":false,\"admin.group.index\":true,\"admin.group.view\":true,\"admin.group.create\":true,\"admin.group.store\":true,\"admin.group.edit\":true,\"admin.group.update\":true,\"admin.group.destroy\":false,\"admin.product.index\":true,\"admin.product.view\":true,\"admin.product.create\":true,\"admin.product.store\":true,\"admin.product.edit\":true,\"admin.product.update\":true,\"admin.product.destroy\":false,\"admin.order.index\":true,\"admin.order.view\":true,\"admin.order.create\":true,\"admin.order.store\":true,\"admin.order.edit\":true,\"admin.order.update\":true,\"admin.order.destroy\":false}', '2016-10-04 05:26:37', '2016-10-04 05:26:37'),
(5, 'student', 'Student', NULL, '2017-02-01 20:25:23', '2017-02-01 20:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-12-05 02:56:01', '2017-12-05 02:56:01'),
(19, 5, '2017-11-05 17:31:34', '2017-11-05 17:31:34'),
(20, 5, '2017-11-06 23:25:19', '2017-11-06 23:25:19'),
(22, 5, '2017-11-13 22:09:15', '2017-11-13 22:09:15'),
(23, 5, '2017-11-13 22:13:14', '2017-11-13 22:13:14'),
(24, 5, '2017-11-29 02:24:46', '2017-11-29 02:24:46'),
(29, 5, '2017-12-05 18:42:13', '2017-12-05 18:42:13'),
(32, 5, '2017-12-05 18:49:07', '2017-12-05 18:49:07'),
(33, 5, '2017-12-05 18:51:48', '2017-12-05 18:51:48'),
(34, 5, '2017-12-05 19:04:52', '2017-12-05 19:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `school_master`
--

DROP TABLE IF EXISTS `school_master`;
CREATE TABLE `school_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_person` varchar(50) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `area` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lang` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_master`
--

INSERT INTO `school_master` (`id`, `name`, `phone`, `email`, `contact_person`, `address1`, `address2`, `city`, `state`, `zip`, `area`, `status`, `lang`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'St. Thomas', '9510983350', 'rohitpmodi@gmail.com', 'Rob Dev', 'Swastik', '', 'Ahmedabad', 'Gujarat', '380009', 'Navrangpura', 1, '', '2017-10-23 18:01:54', 1, '2017-11-04 10:10:14', 1, NULL, NULL),
(2, 'CN Vidyalaya', '9510983350', 'rohitpmodi@gmail.com', 'Vijay Sekhar', 'Ambavadi', 'Near Panchavati', 'Ahmedabad', 'Gujarat', '380006', 'Nehrunagar', 1, '', '2017-10-23 18:20:17', 1, '2017-11-04 10:09:12', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_standard`
--

DROP TABLE IF EXISTS `school_standard`;
CREATE TABLE `school_standard` (
  `school_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_standard`
--

INSERT INTO `school_standard` (`school_id`, `standard_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `settings` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `settings`, `updated_at`, `created_at`, `lang`) VALUES
(1, '{\"site_title\":\"Jeevandeep Prakashan Pvt. Ltd.\",\"ga_code\":\"\",\"meta_keywords\":\"\",\"meta_description\":\"\"}', '2016-12-29 12:59:54', '2016-12-29 12:59:54', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `standard_master`
--

DROP TABLE IF EXISTS `standard_master`;
CREATE TABLE `standard_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standard_master`
--

INSERT INTO `standard_master` (`id`, `name`, `description`, `status`, `position`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Gread 8-12', '99999999', 1, 1, '2017-10-23 18:02:26', 1, '2017-12-05 13:21:44', NULL, NULL, NULL),
(2, 'Grade 6', 'Algebra, Trigonometric, etc', 1, 2, '2017-10-23 18:12:47', 1, '2017-12-05 13:21:44', 1, NULL, NULL),
(3, 'Grade 7', '', 1, 3, '2017-11-28 11:10:35', 1, '2017-12-05 13:21:44', NULL, '2017-11-27 22:40:39', NULL),
(4, 'Grade 7', '', 1, 4, '2017-11-28 11:14:37', 1, '2017-12-05 13:21:44', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

DROP TABLE IF EXISTS `state_master`;
CREATE TABLE `state_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `name`, `code`) VALUES
(1, 'GUJARAT', 'GJ'),
(2, 'MAHARASTRA', 'MH'),
(3, 'ANDHRA PRADESH', 'AP'),
(4, 'ASSAM', 'AS'),
(5, 'ARUNACHAL PRADESH', 'ARP'),
(6, 'BIHAR', 'BR'),
(7, 'HARYANA', 'HR'),
(8, 'HIMACHAL PRADESH', 'HP'),
(9, 'JAMMU & KASHMIR', 'JK'),
(10, 'KARNATAKA', 'KA'),
(11, 'KERALA', 'KL'),
(12, 'MADHYA PRADESH', 'MP'),
(13, 'MANIPUR', 'MN'),
(14, 'MEGHALAYA', 'ML'),
(15, 'MIZORAM', 'MZ'),
(16, 'NAGALAND', 'NL'),
(17, 'ORISSA', 'OD'),
(18, 'PUNJAB', 'PB'),
(19, 'RAJASTHAN', 'RJ'),
(20, 'SIKKIM', 'SK'),
(21, 'TAMIL NADU', 'TN'),
(22, 'TRIPURA', 'TR'),
(23, 'UTTAR PRADESH', 'UP'),
(24, 'WEST BENGAL', 'WB'),
(25, 'GOA', 'GA'),
(26, 'PONDICHERY', 'PY'),
(27, 'LAKSHDWEEP', 'LD'),
(28, 'DAMAN & DIU', 'DD'),
(29, 'DADRA & NAGAR', 'DN'),
(30, 'CHANDIGARH', 'CH'),
(31, 'ANDAMAN & NICOBAR', 'AN'),
(32, 'UTTARAKHAND', 'UK'),
(33, 'JHARKHAND', 'JH'),
(34, 'CHATTISGARH', 'CGH'),
(35, 'DELHI', 'DL'),
(36, 'TELANGANA', 'TG');

-- --------------------------------------------------------

--
-- Table structure for table `status_master`
--

DROP TABLE IF EXISTS `status_master`;
CREATE TABLE `status_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) DEFAULT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_on` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_master`
--

INSERT INTO `status_master` (`id`, `name`, `add_date`, `added_by`, `update_date`, `updated_by`, `deleted_on`, `deleted_by`) VALUES
(1, 'Pending', '2017-11-05 00:00:00', 0, '2017-11-07 17:53:25', NULL, NULL, NULL),
(2, 'Confirmed', '2017-11-05 22:35:38', NULL, '2017-11-05 22:35:38', NULL, NULL, NULL),
(4, 'Shipped', '2017-11-05 22:35:55', NULL, '2017-11-05 22:35:55', NULL, NULL, NULL),
(5, 'Completed', '2017-11-05 22:36:08', NULL, '2017-11-07 17:57:37', NULL, NULL, NULL),
(6, 'Cancelled', '2017-11-05 22:36:16', NULL, '2017-11-05 22:36:16', NULL, NULL, NULL),
(7, 'Refunded', '2017-11-07 17:57:07', NULL, '2017-11-07 17:57:07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2017-10-09 22:02:39', '2017-10-09 22:02:39'),
(2, NULL, 'ip', '::1', '2017-10-09 22:02:39', '2017-10-09 22:02:39'),
(3, NULL, 'global', NULL, '2017-10-09 22:02:45', '2017-10-09 22:02:45'),
(4, NULL, 'ip', '::1', '2017-10-09 22:02:45', '2017-10-09 22:02:45'),
(5, NULL, 'global', NULL, '2017-10-15 08:27:37', '2017-10-15 08:27:37'),
(6, NULL, 'ip', '::1', '2017-10-15 08:27:38', '2017-10-15 08:27:38'),
(7, NULL, 'global', NULL, '2017-10-15 08:28:17', '2017-10-15 08:28:17'),
(8, NULL, 'ip', '::1', '2017-10-15 08:28:17', '2017-10-15 08:28:17'),
(9, NULL, 'global', NULL, '2017-10-15 08:29:22', '2017-10-15 08:29:22'),
(10, NULL, 'ip', '::1', '2017-10-15 08:29:22', '2017-10-15 08:29:22'),
(11, NULL, 'global', NULL, '2017-10-15 08:30:17', '2017-10-15 08:30:17'),
(12, NULL, 'ip', '::1', '2017-10-15 08:30:17', '2017-10-15 08:30:17'),
(13, NULL, 'global', NULL, '2017-10-15 08:31:45', '2017-10-15 08:31:45'),
(14, NULL, 'ip', '::1', '2017-10-15 08:31:46', '2017-10-15 08:31:46'),
(15, 1, 'user', NULL, '2017-10-15 08:31:46', '2017-10-15 08:31:46'),
(16, NULL, 'global', NULL, '2017-10-28 06:11:08', '2017-10-28 06:11:08'),
(17, NULL, 'ip', '::1', '2017-10-28 06:11:08', '2017-10-28 06:11:08'),
(18, NULL, 'global', NULL, '2017-11-01 07:39:25', '2017-11-01 07:39:25'),
(19, NULL, 'ip', '::1', '2017-11-01 07:39:25', '2017-11-01 07:39:25'),
(20, 13, 'user', NULL, '2017-11-01 07:39:25', '2017-11-01 07:39:25'),
(21, NULL, 'global', NULL, '2017-11-01 07:40:24', '2017-11-01 07:40:24'),
(22, NULL, 'ip', '::1', '2017-11-01 07:40:24', '2017-11-01 07:40:24'),
(23, 13, 'user', NULL, '2017-11-01 07:40:24', '2017-11-01 07:40:24'),
(24, NULL, 'global', NULL, '2017-11-03 08:01:42', '2017-11-03 08:01:42'),
(25, NULL, 'ip', '::1', '2017-11-03 08:01:42', '2017-11-03 08:01:42'),
(26, 14, 'user', NULL, '2017-11-03 08:01:42', '2017-11-03 08:01:42'),
(27, NULL, 'global', NULL, '2017-11-04 00:50:50', '2017-11-04 00:50:50'),
(28, NULL, 'ip', '::1', '2017-11-04 00:50:50', '2017-11-04 00:50:50'),
(29, NULL, 'global', NULL, '2017-11-04 00:51:45', '2017-11-04 00:51:45'),
(30, NULL, 'ip', '::1', '2017-11-04 00:51:45', '2017-11-04 00:51:45'),
(31, NULL, 'global', NULL, '2017-11-04 00:52:31', '2017-11-04 00:52:31'),
(32, NULL, 'ip', '::1', '2017-11-04 00:52:31', '2017-11-04 00:52:31'),
(33, NULL, 'global', NULL, '2017-11-04 16:38:56', '2017-11-04 16:38:56'),
(34, NULL, 'ip', '::1', '2017-11-04 16:38:56', '2017-11-04 16:38:56'),
(35, NULL, 'global', NULL, '2017-11-04 19:39:25', '2017-11-04 19:39:25'),
(36, NULL, 'ip', '::1', '2017-11-04 19:39:25', '2017-11-04 19:39:25'),
(37, NULL, 'global', NULL, '2017-11-04 19:39:29', '2017-11-04 19:39:29'),
(38, NULL, 'ip', '::1', '2017-11-04 19:39:29', '2017-11-04 19:39:29'),
(39, NULL, 'global', NULL, '2017-11-04 19:39:33', '2017-11-04 19:39:33'),
(40, NULL, 'ip', '::1', '2017-11-04 19:39:33', '2017-11-04 19:39:33'),
(41, NULL, 'global', NULL, '2017-11-04 20:17:38', '2017-11-04 20:17:38'),
(42, NULL, 'ip', '::1', '2017-11-04 20:17:38', '2017-11-04 20:17:38'),
(43, 17, 'user', NULL, '2017-11-04 20:17:39', '2017-11-04 20:17:39'),
(44, NULL, 'global', NULL, '2017-11-04 20:17:45', '2017-11-04 20:17:45'),
(45, NULL, 'ip', '::1', '2017-11-04 20:17:45', '2017-11-04 20:17:45'),
(46, 17, 'user', NULL, '2017-11-04 20:17:45', '2017-11-04 20:17:45'),
(47, NULL, 'global', NULL, '2017-11-04 20:19:58', '2017-11-04 20:19:58'),
(48, NULL, 'ip', '::1', '2017-11-04 20:19:58', '2017-11-04 20:19:58'),
(49, NULL, 'global', NULL, '2017-11-04 21:00:59', '2017-11-04 21:00:59'),
(50, NULL, 'ip', '::1', '2017-11-04 21:00:59', '2017-11-04 21:00:59'),
(51, 17, 'user', NULL, '2017-11-04 21:00:59', '2017-11-04 21:00:59'),
(52, NULL, 'global', NULL, '2017-11-05 17:10:31', '2017-11-05 17:10:31'),
(53, NULL, 'ip', '::1', '2017-11-05 17:10:31', '2017-11-05 17:10:31'),
(54, 1, 'user', NULL, '2017-11-05 17:10:31', '2017-11-05 17:10:31'),
(55, NULL, 'global', NULL, '2017-11-05 17:10:37', '2017-11-05 17:10:37'),
(56, NULL, 'ip', '::1', '2017-11-05 17:10:37', '2017-11-05 17:10:37'),
(57, 1, 'user', NULL, '2017-11-05 17:10:37', '2017-11-05 17:10:37'),
(58, NULL, 'global', NULL, '2017-11-08 23:21:17', '2017-11-08 23:21:17'),
(59, NULL, 'ip', '::1', '2017-11-08 23:21:17', '2017-11-08 23:21:17'),
(60, 1, 'user', NULL, '2017-11-08 23:21:17', '2017-11-08 23:21:17'),
(61, NULL, 'global', NULL, '2017-11-08 23:21:23', '2017-11-08 23:21:23'),
(62, NULL, 'ip', '::1', '2017-11-08 23:21:23', '2017-11-08 23:21:23'),
(63, 1, 'user', NULL, '2017-11-08 23:21:23', '2017-11-08 23:21:23'),
(64, NULL, 'global', NULL, '2017-11-08 23:43:27', '2017-11-08 23:43:27'),
(65, NULL, 'ip', '::1', '2017-11-08 23:43:27', '2017-11-08 23:43:27'),
(66, NULL, 'global', NULL, '2017-11-09 22:21:11', '2017-11-09 22:21:11'),
(67, NULL, 'ip', '::1', '2017-11-09 22:21:11', '2017-11-09 22:21:11'),
(68, NULL, 'global', NULL, '2017-11-09 22:21:16', '2017-11-09 22:21:16'),
(69, NULL, 'ip', '::1', '2017-11-09 22:21:16', '2017-11-09 22:21:16'),
(70, NULL, 'global', NULL, '2017-11-13 22:10:20', '2017-11-13 22:10:20'),
(71, NULL, 'ip', '::1', '2017-11-13 22:10:20', '2017-11-13 22:10:20'),
(72, 22, 'user', NULL, '2017-11-13 22:10:20', '2017-11-13 22:10:20'),
(73, NULL, 'global', NULL, '2017-11-13 22:11:06', '2017-11-13 22:11:06'),
(74, NULL, 'ip', '::1', '2017-11-13 22:11:06', '2017-11-13 22:11:06'),
(75, 22, 'user', NULL, '2017-11-13 22:11:06', '2017-11-13 22:11:06'),
(76, NULL, 'global', NULL, '2017-11-13 22:11:21', '2017-11-13 22:11:21'),
(77, NULL, 'ip', '::1', '2017-11-13 22:11:21', '2017-11-13 22:11:21'),
(78, NULL, 'global', NULL, '2017-11-13 22:12:18', '2017-11-13 22:12:18'),
(79, NULL, 'ip', '::1', '2017-11-13 22:12:18', '2017-11-13 22:12:18'),
(80, NULL, 'global', NULL, '2017-11-13 22:12:39', '2017-11-13 22:12:39'),
(81, NULL, 'ip', '::1', '2017-11-13 22:12:39', '2017-11-13 22:12:39'),
(82, 22, 'user', NULL, '2017-11-13 22:12:39', '2017-11-13 22:12:39'),
(83, NULL, 'global', NULL, '2017-11-23 21:50:40', '2017-11-23 21:50:40'),
(84, NULL, 'ip', '::1', '2017-11-23 21:50:40', '2017-11-23 21:50:40'),
(85, NULL, 'global', NULL, '2017-12-05 07:39:06', '2017-12-05 07:39:06'),
(86, NULL, 'ip', '::1', '2017-12-05 07:39:07', '2017-12-05 07:39:07'),
(87, NULL, 'global', NULL, '2017-12-05 07:39:19', '2017-12-05 07:39:19'),
(88, NULL, 'ip', '::1', '2017-12-05 07:39:19', '2017-12-05 07:39:19'),
(89, NULL, 'global', NULL, '2017-12-05 07:39:25', '2017-12-05 07:39:25'),
(90, NULL, 'ip', '::1', '2017-12-05 07:39:25', '2017-12-05 07:39:25'),
(91, 1, 'user', NULL, '2017-12-05 07:39:25', '2017-12-05 07:39:25'),
(92, NULL, 'global', NULL, '2017-12-05 07:44:48', '2017-12-05 07:44:48'),
(93, NULL, 'ip', '::1', '2017-12-05 07:44:48', '2017-12-05 07:44:48'),
(94, NULL, 'global', NULL, '2017-12-05 08:29:57', '2017-12-05 08:29:57'),
(95, NULL, 'ip', '::1', '2017-12-05 08:29:57', '2017-12-05 08:29:57'),
(96, NULL, 'global', NULL, '2017-12-05 08:39:23', '2017-12-05 08:39:23'),
(97, NULL, 'ip', '::1', '2017-12-05 08:39:23', '2017-12-05 08:39:23'),
(98, NULL, 'global', NULL, '2017-12-05 09:13:58', '2017-12-05 09:13:58'),
(99, NULL, 'ip', '::1', '2017-12-05 09:13:58', '2017-12-05 09:13:58'),
(100, NULL, 'global', NULL, '2017-12-05 09:26:00', '2017-12-05 09:26:00'),
(101, NULL, 'ip', '::1', '2017-12-05 09:26:00', '2017-12-05 09:26:00'),
(102, 1, 'user', NULL, '2017-12-05 09:26:00', '2017-12-05 09:26:00'),
(103, NULL, 'global', NULL, '2017-12-05 09:26:52', '2017-12-05 09:26:52'),
(104, NULL, 'ip', '::1', '2017-12-05 09:26:52', '2017-12-05 09:26:52'),
(105, 1, 'user', NULL, '2017-12-05 09:26:52', '2017-12-05 09:26:52'),
(106, NULL, 'global', NULL, '2017-12-05 09:28:36', '2017-12-05 09:28:36'),
(107, NULL, 'ip', '::1', '2017-12-05 09:28:36', '2017-12-05 09:28:36'),
(108, 1, 'user', NULL, '2017-12-05 09:28:36', '2017-12-05 09:28:36'),
(109, NULL, 'global', NULL, '2017-12-05 09:28:42', '2017-12-05 09:28:42'),
(110, NULL, 'ip', '::1', '2017-12-05 09:28:42', '2017-12-05 09:28:42'),
(111, NULL, 'global', NULL, '2017-12-05 09:28:52', '2017-12-05 09:28:52'),
(112, NULL, 'ip', '::1', '2017-12-05 09:28:52', '2017-12-05 09:28:52'),
(113, 1, 'user', NULL, '2017-12-05 09:28:52', '2017-12-05 09:28:52'),
(114, NULL, 'global', NULL, '2017-12-05 09:53:56', '2017-12-05 09:53:56'),
(115, NULL, 'ip', '::1', '2017-12-05 09:53:56', '2017-12-05 09:53:56'),
(116, 1, 'user', NULL, '2017-12-05 09:53:56', '2017-12-05 09:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `parent_first_name` varchar(50) DEFAULT NULL,
  `parent_middle_name` varchar(50) DEFAULT NULL,
  `parent_last_name` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `landline` varchar(50) DEFAULT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `uuid` char(36) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `verify` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `parent_first_name`, `parent_middle_name`, `parent_last_name`, `mobile`, `landline`, `last_login`, `status`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`, `uuid`, `is_active`, `verify`) VALUES
(1, 1, 'rob@devsimplify.com', '$2y$10$ppEsrJBB6Ut9ffX3cYVrlOBO30FgBn8M.ApVL2gncf4upykgUGpD2', 'Robson', 'P', 'Modi', 'Prakashchandra', 'Mohanlal', 'Modi', '9537720859', '02637252003', '2017-12-06 21:13:08', 1, '2017-12-07 09:43:08', '2017-12-06 21:13:08', NULL, NULL, NULL, 1, ''),
(19, 0, 'rohitpmodi@gmail.com', '$2y$10$wwuv413/.g1Z6tBQouMImOGLXWYyVQWRGr23kdIbThEMjk6XRvPB.', 'Yashvi', 'Rohitkumar', 'Modi', 'Rohit', 'Prakashchandra', 'Modi', '9510983350', '02637252003', '2017-12-06 21:09:38', 1, '2017-12-07 09:39:38', '2017-12-06 21:09:38', NULL, NULL, NULL, 1, 'COMPLETED'),
(20, 0, 'ajaydpatel15@gmail.com', '$2y$10$SBkyUjXT6T7XuU1anQ1NI.s7/c3rR62v1kCFQkpUFYDMFu8Xu/uym', 'Malhar', 'A', 'Modi', 'Ajay', 'D', 'Patel', '9974916374', '079252003', '2017-11-07 00:03:59', 1, '2017-11-07 12:33:59', '2017-11-07 00:03:59', NULL, NULL, NULL, 1, 'COMPLETED'),
(21, 0, 'rohitpmodi+6@gmail.com', '$2y$10$bdcIecZdAa6UHcVD/7jdxu7I52ZtQBfGyvjj2r423H6oAxLcDnLUW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-14 10:37:46', 1, '2017-11-13 22:07:46', '2017-11-13 22:07:46', NULL, NULL, NULL, 0, 'jCHSxVgg0wtfghpf'),
(22, 0, 'rohitpmodi+15@gmail.com', '$2y$10$AFSEKp.GWzmVJireNr7M5uVr93Bf5TNqKvy5rC66oc4ttCLCHLgGS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-13 22:09:14', 1, '2017-11-14 10:39:14', '2017-11-13 22:09:14', NULL, NULL, NULL, 1, 'COMPLETED'),
(23, 0, 'rohitpmodi+16@gmail.com', '$2y$10$MXpOVrCb901VjVdFrLgWWOIfsX27dpCRgyAFT.1l88GVUP1aT1IM2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-13 22:13:13', 1, '2017-11-14 10:43:13', '2017-11-13 22:13:13', NULL, NULL, NULL, 1, 'COMPLETED'),
(24, 0, 'rohitpmodi+8@gmail.com', '$2y$10$Vc2GU2Xtu3LutwHghokL1.IaTS/sgim/azY/dGBdNwo85z0fC2Pm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-29 02:24:46', 1, '2017-11-29 14:54:46', '2017-11-29 02:24:46', NULL, NULL, NULL, 1, 'COMPLETED'),
(25, 0, 'rohitpmodi+11@gmail.com', '$2y$10$9RAJee9nYgSoSUD7prkrsuFB9KM.GpHeC4srNn05nnEcRLb9vDBa.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-29 14:57:32', 1, '2017-11-29 02:27:32', '2017-11-29 02:27:32', NULL, NULL, NULL, 0, 'TKQF35yLPOteAYPx'),
(26, 0, 'xsdfsfsdf@gmail.com', '$2y$10$TMgNvQ3Sp9C7BlBdRHnVyOvJi4Oy34.EV3m3hYcsfIK.z/MYSf8oG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-05 21:57:16', 1, '2017-12-05 09:27:16', '2017-12-05 09:27:16', NULL, NULL, NULL, 0, 'zBKJW9DmWWDwg38p'),
(27, 0, 'rohitpmodi+612@gmail.com', '$2y$10$B47g49Yhxn64jZqIcn9lnetvVHk.r8iBspPxN4VorFV9vZ3sQiw1S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-05 22:55:04', 1, '2017-12-05 10:25:04', '2017-12-05 10:25:04', NULL, NULL, NULL, 0, 'c25VeweScs6ebiFL'),
(28, 0, 'rohitpmodi6@gmail.com', '$2y$10$6wueaaHmoxP2Q5PJLQ2uwOFG5SGNc2RXjlC891rqGOGQhysjg3GKa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-05 22:57:30', 1, '2017-12-05 10:27:30', '2017-12-05 10:27:30', NULL, NULL, NULL, 0, 'q8yjGIlDkq57bxjX'),
(30, 0, 'rohitpmodi+3@gmail.com', '$2y$10$CwLh1cCplvFTCK1VQ7voK.i4hi5V6j930.TAOR.k7OsTOJSgZXzQO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-06 07:14:37', 1, '2017-12-05 18:44:37', '2017-12-05 18:44:37', NULL, NULL, NULL, 0, '4udn8OKSaEsMX5CY'),
(31, 0, 'rohitpmodi+4@gmail.com', '$2y$10$fRbqH7Nur1gl3HJ/C/eUFuyn4JY3GuUxkRJVeM/kgOETLUBPrwvue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-06 07:18:01', 1, '2017-12-05 18:48:01', '2017-12-05 18:48:01', NULL, NULL, NULL, 0, 'yeG0TTpXBYOVa10K'),
(32, 0, 'rohitpmodi+5@gmail.com', '$2y$10$HytnImTtVK4sNFIAXwJnFe9wGpt.zV/dUuiaGPuBCuryO5sBeOGm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-05 18:49:07', 1, '2017-12-06 07:19:07', '2017-12-05 18:49:07', NULL, NULL, NULL, 1, 'COMPLETED'),
(33, 0, 'rohitpmodi+7@gmail.com', '$2y$10$GtYlW/cTGsFZNL9g6e4FmeLuBkmoZ6i.rmCSvO1acYH2OS3aAdUp6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-05 18:51:47', 1, '2017-12-06 07:21:47', '2017-12-05 18:51:47', NULL, NULL, NULL, 1, 'COMPLETED'),
(34, 0, 'rohitpmodi+9@gmail.com', '$2y$10$4jFd2HhlbulJeaoLJ9.8SuPrxneXEZeaSetbVMMQgIwKYOWtTC8lS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-05 19:06:04', 1, '2017-12-06 07:36:04', '2017-12-05 19:06:04', NULL, NULL, NULL, 1, 'I6ZulFGwZ2RjmebB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_master`
--
ALTER TABLE `address_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_user`
--
ALTER TABLE `address_user`
  ADD KEY `address_id` (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `book_master`
--
ALTER TABLE `book_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_code` (`book_code`,`price_after_tax`,`deleted_at`) USING BTREE,
  ADD KEY `company_id` (`company_id`),
  ADD KEY `standard_id` (`standard_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD KEY `state_id` (`state_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`deleted_at`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_posts`
--
ALTER TABLE `form_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_schools`
--
ALTER TABLE `missing_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missing_standards`
--
ALTER TABLE `missing_standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_master_ibfk_1` (`user_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`) USING BTREE;

--
-- Indexes for table `product_books`
--
ALTER TABLE `product_books`
  ADD UNIQUE KEY `product_id` (`product_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`,`deleted_at`),
  ADD KEY `standard_id` (`standard_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`) USING BTREE;

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `school_master`
--
ALTER TABLE `school_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_standard`
--
ALTER TABLE `school_standard`
  ADD UNIQUE KEY `school_id` (`school_id`,`standard_id`),
  ADD KEY `standard_id` (`standard_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_master`
--
ALTER TABLE `standard_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`deleted_at`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_master`
--
ALTER TABLE `status_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `book_master`
--
ALTER TABLE `book_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `form_posts`
--
ALTER TABLE `form_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missing_schools`
--
ALTER TABLE `missing_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `missing_standards`
--
ALTER TABLE `missing_standards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `school_master`
--
ALTER TABLE `school_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `standard_master`
--
ALTER TABLE `standard_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `status_master`
--
ALTER TABLE `status_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_user`
--
ALTER TABLE `address_user`
  ADD CONSTRAINT `address_user_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `address_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_master`
--
ALTER TABLE `book_master`
  ADD CONSTRAINT `book_master_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_master_ibfk_2` FOREIGN KEY (`standard_id`) REFERENCES `standard_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city_master`
--
ALTER TABLE `city_master`
  ADD CONSTRAINT `city_master_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_master_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_books`
--
ALTER TABLE `product_books`
  ADD CONSTRAINT `product_books_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`standard_id`) REFERENCES `standard_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_master_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_master_ibfk_3` FOREIGN KEY (`school_id`) REFERENCES `school_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school_standard`
--
ALTER TABLE `school_standard`
  ADD CONSTRAINT `school_standard_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `school_standard_ibfk_2` FOREIGN KEY (`standard_id`) REFERENCES `standard_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
