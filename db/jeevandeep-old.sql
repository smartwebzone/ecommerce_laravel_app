-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 03:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 1, 'r27moRdkKRppyeVqahCUQdJBYR6os7Ck', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `address_master`
--

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
(4, 'shipping', 'kjk', NULL, 'kj', 'k', 'jk', 'jk', '2017-10-29 00:04:55', 1, '2017-10-29 00:04:55', NULL, NULL),
(5, 'shipping', 'kjk', NULL, 'kj', 'k', 'jk', 'jk', '2017-10-29 00:06:09', 1, '2017-10-29 00:06:09', NULL, NULL),
(6, 'shipping', 'lk', NULL, 'l', 'lk', 'lk', 'klk', '2017-10-29 00:15:49', 1, '2017-10-29 00:15:49', NULL, NULL),
(7, 'shipping', 'lk', NULL, 'l', 'lk', 'lk', 'klk', '2017-10-29 00:16:56', 1, '2017-10-29 00:16:56', NULL, NULL),
(8, 'shipping', 'lk', NULL, 'l', 'lk', 'lk', 'klk', '2017-10-29 00:19:56', 1, '2017-10-29 00:19:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `address_user`
--

CREATE TABLE `address_user` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_user`
--

INSERT INTO `address_user` (`address_id`, `user_id`) VALUES
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_master`
--

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
(1, 1, 1, 'Fabri-Fast Tool', 'Algebra, Trigonometric, etc', 'R.K sharma', 'PL3298382983', '5000.00', 1, '50.00', '7500.00', '30.00', 1, 1, '2017-10-25 17:42:13', '2017-10-25 17:42:13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `total_price`, `add_date`) VALUES
(1, 1, 20, '7524.78', '0000-00-00 00:00:00'),
(2, 1, 25, '7524.78', '0000-00-00 00:00:00'),
(3, 1, 20, '7524.78', '0000-00-00 00:00:00'),
(4, 1, 25, '7524.78', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

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
(1, 'abc', '9999999999', 'raviverma9590@gmail.com', 'ravi', 'Ahmedabad', 'Ahmedabad', '380009', 'Ahmedabad', 'Gujarat', '380009', '380009', 'PjshhdHjksjk281JHJhj(@hjdshsj', 1, '2017-10-23 18:00:50', 1, '2017-10-23 18:00:50', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

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
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `shipping` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `preferred_delivery_date` date DEFAULT NULL,
  `preferred_delivery_time` time DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

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
(36, 1, 'MFk2Dh5ph0B3QPaKDk5u7BL7hnT4svll', '2017-10-27 17:28:32', '2017-10-27 17:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_books`
--

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
(25, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

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
(20, 1, 1, 1, 1, 'Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 17:17:13', 1, '2017-10-25 17:17:13', NULL, NULL, NULL),
(23, 1, 1, 1, 1, 'Copy of Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 20:00:24', 1, '2017-10-25 20:00:24', NULL, NULL, NULL),
(24, 1, 1, 1, 1, 'Copy of Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 20:02:03', 1, '2017-10-25 20:02:03', NULL, NULL, NULL),
(25, 1, 1, 1, 1, 'Copy of Pipeline 1', 'Algebra, Trigonometric, etc', 'fd', '21.00', '21.00', 1, '2017-10-25 20:02:43', 1, '2017-10-25 20:02:43', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

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
(1, 1, '2017-10-15 09:37:35', '2017-10-15 09:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `school_master`
--

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
(1, 'St. Thomas', '9999999999', 'rv9510648077@gmail.com', 'ravi', 'swastik', 'opp', 'Ahmedabad', 'Gujarat', '380009', 'navrangpura', 1, '', '2017-10-23 18:01:54', 1, '2017-10-23 18:02:35', 1, NULL, NULL),
(2, 'jkdsjk', '9999999999', 'rv9510648077@gmail.com', 'lk', 'l', 'kl', 'l', 'Gujarat', '454545', 'navrangpura', 1, '', '2017-10-23 18:20:17', 1, '2017-10-23 18:20:17', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_standard`
--

CREATE TABLE `school_standard` (
  `school_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_standard`
--

INSERT INTO `school_standard` (`school_id`, `standard_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

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
(2, 'rob', 'Algebra, Trigonometric, etc', 1, '2017-10-23 18:12:47', 1, '2017-10-23 18:12:47', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

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
(17, NULL, 'ip', '::1', '2017-10-28 06:11:08', '2017-10-28 06:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `parent_first_name`, `parent_middle_name`, `parent_last_name`, `mobile`, `landline`, `last_login`, `status`, `created_at`, `updated_at`, `deleted_at`, `deleted_by`, `uuid`, `is_active`) VALUES
(1, 1, 'rob@devsimplify.com', '$2y$10$jiEY8c90BRrVLdFiykHAyOi4m2g0I/rZ.2kFb.QoAn5Q.Ijs4r1MO', 'Rob', 'Prakashchandra', 'Dev', NULL, NULL, NULL, '9510983350', NULL, '2017-10-28 06:11:20', 1, '2017-10-28 17:41:20', '2017-10-28 06:11:20', NULL, NULL, NULL, 1);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `book_master`
--
ALTER TABLE `book_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
