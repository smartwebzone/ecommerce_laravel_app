-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2017 at 03:19 PM
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
(18, 17, 'MldwezIz8B3LbcWwThcLtepfGcOnJVrU', 1, '2017-11-04 01:15:27', '2017-11-04 01:15:27', '2017-11-04 01:15:27');

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
(1, 'shipping', 'M-303', 'Aarohi Elegance', 'South Bopal', 'Ahmedabad', 'Gujarat', '380058', '2017-11-05 10:32:28', 17, '2017-11-05 18:32:15', NULL, NULL),
(2, 'billing', 'Bungalow 4', 'Swara Bungalows', 'Valam', 'Visnagar', 'Gujarat', '396445', '2017-11-05 10:32:28', 17, '2017-11-05 16:14:33', NULL, NULL);

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
(1, 17),
(2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `book_master`
--

DROP TABLE IF EXISTS `book_master`;
CREATE TABLE `book_master` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `book_code` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_taxable` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Nontaxable, 1=Taxable',
  `tax` decimal(10,2) DEFAULT NULL,
  `price_after_tax` decimal(10,2) DEFAULT NULL,
  `shipping_charges` decimal(10,2) DEFAULT NULL,
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

INSERT INTO `book_master` (`id`, `company_id`, `standard_id`, `name`, `description`, `author`, `book_code`, `price`, `is_taxable`, `tax`, `price_after_tax`, `shipping_charges`, `status`, `added_by`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 1, 'Fabri-Fast Tool', 'Algebra, Trigonometric, etc', 'R.K sharma', 'PL3298382983', '5000.00', 1, '50.00', '7500.00', '30.00', 1, 1, '2017-10-25 17:42:13', '2017-10-25 17:42:13', NULL, NULL, NULL),
(2, 1, 2, 'Physics', 'Newton\'s all laws', 'Newton', 'N123456', '199.25', 1, '12.00', '223.16', '50.00', 1, 1, '2017-11-04 11:34:38', '2017-11-04 11:34:38', NULL, NULL, NULL),
(3, 1, 1, 'Mathematics', 'Algebra, Trigonometric, etc', 'Rohit Modi', 'R123', '150.00', 1, '12.00', '168.00', '10.00', 1, 1, '2017-11-04 11:35:11', '2017-11-04 11:35:11', NULL, NULL, NULL);

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
(1, 'Safal Infotech', '9974916374', 'ajaydpatel15@gmail.com', 'Ajay Patel', '208, Rudra Arcade', 'Hemlet Cross Road', 'Navrangpura', 'Ahmedabad', 'Gujarat', '380009', 'PayUMoney', 'PjshhdHjksjk281JHJhj(@hjdshsj', 1, '2017-10-23 18:00:50', 1, '2017-11-04 10:06:17', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `template` enum('Register','Order','Forgot Password') DEFAULT NULL,
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
(2, 'Forgot Password', 'Forgot Password', 'Forgot your password?', 'Hi <<student_name>>,\r\n\r\nYou have requested for a new password. Please click on below link to reset your password.\r\n<<reset_password_link>>\r\n\r\nThanks,\r\nJeevandeep Team', 1, '2017-10-15 11:46:08', 1, '2017-10-15 11:46:08', NULL, NULL, NULL);

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
(1, 'Sanskar Bharti', 'from Navsari missing', 1, '2017-11-05 14:08:50', NULL, '2017-11-05 14:08:50', NULL, NULL, NULL);

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
(1, 'Grade 1', 'Grade 1 missing', 1, '2017-11-05 14:18:08', NULL, '2017-11-05 14:18:08', NULL, NULL, NULL);

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
(1, 17, '5000.00', '2500.00', '0.00', '7535.40', 1, '2017-11-05 12:50:06', NULL, NULL, '2017-10-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 12:50:06', NULL, NULL, NULL, '0', NULL),
(2, 17, '5000.00', '2500.00', '0.00', '7524.78', 1, '2017-11-05 12:50:10', NULL, NULL, '2017-10-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 12:50:10', NULL, NULL, NULL, '0', NULL),
(3, 17, '5000.00', '2500.00', '0.00', '7535.40', 1, '2017-11-05 13:02:23', NULL, NULL, '2017-04-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 13:02:23', NULL, NULL, NULL, '0', NULL),
(4, 17, '5000.00', '2500.00', '0.00', '7524.78', 1, '2017-11-05 13:02:26', NULL, NULL, '2017-04-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 13:22:15', NULL, NULL, NULL, '0', NULL),
(5, 17, '5000.00', '2500.00', '0.00', '7524.78', 1, '2017-11-05 13:22:59', NULL, NULL, '2017-03-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 13:22:59', NULL, NULL, NULL, '0', NULL),
(6, 17, '5000.00', '2500.00', '0.00', '7524.78', 1, '2017-11-05 13:27:23', NULL, NULL, '2017-02-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-05 13:27:23', NULL, NULL, NULL, '0', NULL);

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
(1, 26, 1, '7535'),
(2, 20, 1, '7525'),
(3, 26, 1, '7535'),
(4, 20, 1, '7525'),
(5, 20, 1, '7525'),
(6, 20, 1, '7525');

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
(70, 1, 'sykQLJdwFidxiAPYfSIKP7uO7ohdpDpT', '2017-11-04 23:01:32', '2017-11-04 23:01:32');

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
(20, 1, 15),
(25, 1, 15),
(26, 1, 2);

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
(20, 1, 1, 1, 1, 'Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '50.00', 1, '2017-10-25 17:17:13', 1, '2017-11-05 11:33:50', 1, NULL, NULL),
(23, 1, 1, 1, 1, 'Copy of Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 20:00:24', 1, '2017-11-04 10:10:58', NULL, '2017-11-03 22:40:58', NULL),
(24, 1, 1, 1, 1, 'Copy of Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 20:02:03', 1, '2017-11-04 10:11:03', NULL, '2017-11-03 22:41:03', NULL),
(25, 1, 1, 1, 1, 'Copy of Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 20:02:43', 1, '2017-11-04 10:11:07', NULL, '2017-11-03 22:41:07', NULL),
(26, 1, 1, 1, 1, 'Prod 2', 'Test desc', 'Test desc long', '30.00', '60.00', 1, '2017-11-04 11:26:27', 1, '2017-11-05 11:32:17', 1, NULL, NULL);

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
(2, 17, 'eBZR92xq4amG3svS5u07h24wCscFlCK8', 1, '2017-11-04 20:19:49', '2017-11-04 20:19:30', '2017-11-04 20:19:49');

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
(1, 1, '2017-11-03 23:45:51', '2017-11-03 23:45:51'),
(14, 5, '2017-11-03 23:46:09', '2017-11-03 23:46:09'),
(17, 5, '2017-11-04 01:15:28', '2017-11-04 01:15:28');

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

INSERT INTO `standard_master` (`id`, `name`, `description`, `status`, `created_at`, `added_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Gread 8-12', '99999999', 1, '2017-10-23 18:02:26', 1, '2017-10-23 18:02:26', NULL, NULL, NULL),
(2, 'Grade 6', 'Algebra, Trigonometric, etc', 1, '2017-10-23 18:12:47', 1, '2017-11-04 10:06:40', 1, NULL, NULL);

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
(1, 'Gujarat', 'GJ'),
(2, 'Maharastra', 'MH');

-- --------------------------------------------------------

--
-- Table structure for table `status_master`
--

DROP TABLE IF EXISTS `status_master`;
CREATE TABLE `status_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_on` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_master`
--

INSERT INTO `status_master` (`id`, `name`, `add_date`, `added_by`, `update_date`, `updated_by`, `deleted_on`, `deleted_by`) VALUES
(1, 'PAID', '0000-00-00 00:00:00', 0, NULL, NULL, NULL, NULL);

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
(51, 17, 'user', NULL, '2017-11-04 21:00:59', '2017-11-04 21:00:59');

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
(1, 1, 'rob@devsimplify.com', '$2y$10$jiEY8c90BRrVLdFiykHAyOi4m2g0I/rZ.2kFb.QoAn5Q.Ijs4r1MO', 'Rob', 'Prakashchandra', 'Dev', NULL, NULL, NULL, '9510983350', NULL, '2017-11-04 23:01:32', 1, '2017-11-05 11:31:32', '2017-11-04 23:01:32', NULL, NULL, NULL, 1, ''),
(14, 0, 'raviverma9590@gmail.com', '$2y$10$XKoqZy8bN7W/ssSu3eLnveFbu0iEv8OkT864MUvR.gqIkM.RksYdG', 'ravi', 'omp', 'verma', 'ompra', 'bhav', 'verma', '9714617041', '9714614071', '2017-11-04 11:16:09', 1, '2017-11-04 11:16:09', '2017-11-03 23:46:09', NULL, NULL, NULL, 1, 'COMPLETED'),
(15, 0, 'rohitpmodi@gmail.com', '$2y$10$S0wZPlP0TNBUGOBrwxsN4.y/2U4mfvF0zpkqt1/hPyL58ums0WmTe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-04 10:44:38', 1, '2017-11-03 23:14:38', '2017-11-03 23:14:38', NULL, NULL, NULL, 0, 'dpMSYeitbB53ixqN'),
(16, 0, 'rohitpmodi1@gmail.com', '$2y$10$WWQBj6HhMUHs7PQGfUIGEOGaJXA7gayX/womXbtZA6/eN7BzZJFOC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-04 01:03:04', 1, '2017-11-04 12:33:04', '2017-11-04 01:03:04', NULL, NULL, NULL, 1, 'COMPLETED'),
(17, 0, 'rohitpmodi+1@gmail.com', '$2y$10$Rqv3m7p6S0hLeJZrDX3Yd.zCrNUNXGHvWGmE1MGBisKux/kQvXwYy', 'Yashvi', 'R', 'Modi', 'Rohit', 'P', 'Modi', '9510983350', '02637252003', '2017-11-04 21:05:38', 1, '2017-11-05 09:35:38', '2017-11-04 21:05:38', NULL, NULL, NULL, 1, 'COMPLETED');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_master`
--
ALTER TABLE `book_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `form_posts`
--
ALTER TABLE `form_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missing_schools`
--
ALTER TABLE `missing_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `missing_standards`
--
ALTER TABLE `missing_standards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_master`
--
ALTER TABLE `status_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
