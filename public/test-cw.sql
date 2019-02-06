-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2019 at 07:29 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-cw`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_style`
--

CREATE TABLE `body_style` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `body_style`
--

INSERT INTO `body_style` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sedan', 'car with four doors', 1, NULL, NULL),
(2, 'SUV', 'Big car built on a body-on-frame chassis', 1, NULL, NULL),
(3, 'Truck', 'large, heavy motor vehicle', 1, NULL, NULL),
(4, 'VAN', 'Type of road vehicle used for transporting goods or people', 1, NULL, NULL),
(5, 'Sport & Delux', 'Luxury Brands Cars', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '100.00',
  `price_plus` double(8,2) NOT NULL DEFAULT '0.00',
  `level` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `dealer_id` int(10) UNSIGNED DEFAULT NULL,
  `body_style_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `year`, `vin`, `note`, `color`, `stock`, `price`, `price_plus`, `level`, `status`, `dealer_id`, `body_style_id`, `customer_id`, `employee_id`, `service_id`, `payment_id`, `user_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 'Chevy', 'Silverado', '2015', '854925', NULL, NULL, '5erd', 100.00, 15.00, 4, 1, 5, NULL, NULL, 1, NULL, NULL, NULL, 1, '2019-01-14 09:09:47', '2019-01-13 06:48:25'),
(2, 'Chevy', 'Silverado', '2016', '854975', NULL, NULL, '234', 100.00, 10.00, 2, 1, 5, NULL, NULL, 4, NULL, NULL, NULL, NULL, '2019-01-15 06:11:27', '2019-01-16 04:09:48'),
(3, 'Porsche', 'Carrera', '2015', '562349', NULL, NULL, '54er', 100.00, 0.00, 2, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, 2, '2019-01-15 06:11:27', '2019-01-15 10:56:01'),
(4, 'VW', 'Passat', '2015', '562789', NULL, NULL, '54er', 100.00, 0.00, 4, 1, 5, NULL, NULL, 2, NULL, NULL, NULL, 1, '2019-01-13 09:09:47', '2019-01-13 06:48:25'),
(5, 'Chryser', '300c', '2015', '562459', NULL, NULL, '5erd', 100.00, 10.00, 4, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, 2, '2019-01-13 09:09:47', '2019-01-15 11:48:30'),
(6, 'Acura', 'tsx', '2015', '598349', NULL, NULL, '5erd', 80.00, 5.00, 3, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, 6, '2019-01-15 06:11:27', '2019-01-16 04:08:48'),
(7, 'Ford', 'Fusion', '2010', '659856', NULL, 'popo', '5erd', 100.00, 0.00, 1, 1, 3, NULL, 1, 1, NULL, NULL, NULL, NULL, '2019-01-10 09:09:47', '2019-01-15 11:47:40'),
(8, 'red', 'red', '2005', '164985', NULL, NULL, '54t', 100.00, 5.00, 2, 1, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-12 09:09:47', '2019-01-16 04:04:33'),
(9, 'Checy', 'avon', '2015', '164987', NULL, NULL, NULL, 100.00, 0.00, 2, 1, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-12 09:09:47', '2019-01-16 04:04:07'),
(10, 'Ford', 'fiesta', '2015', '164901', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 09:09:47', '2019-01-12 09:09:47'),
(12, 'Ford', 'fiesta', '2015', '164902', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-12 09:09:47', '2019-01-12 09:09:47'),
(13, 'Dodge', 'cabrio', '2015', '164903', NULL, NULL, NULL, 100.00, 0.00, 1, 1, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-11 09:09:47', '2019-01-16 01:02:46'),
(14, 'Ferrari', 'f130', '2015', '164904', NULL, NULL, '4r', 100.00, 0.00, 0, 1, 4, 3, NULL, 4, NULL, NULL, NULL, NULL, '2019-01-15 06:11:27', '2019-01-15 11:37:24'),
(15, 'porshe', 'spider', '2015', '164905', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-15 06:11:27', '2019-01-07 09:09:47'),
(16, 'Lincoln', 'Navigator', '2015', '154901', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-10 09:09:47', '2019-01-10 09:09:47'),
(17, 'Buggati', 'biron', '2015', '164906', NULL, NULL, '54t', 100.00, 0.00, 2, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-10 09:09:47', '2019-01-16 04:04:05'),
(18, 'Tesla', 'one', '2015', '164907', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-10 09:09:47', NULL),
(19, 'masserati', 'rx5', '2015', '184901', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-10 09:09:47', NULL),
(20, 'Toyota', 'tundr', '2015', '169901', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-15 06:11:27', NULL),
(21, 'Chevy', 'impala', '2015', '160901', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 3, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-15 06:11:27', '2019-01-16 00:54:44'),
(22, 'Ford', 'fiesta', '2015', '164201', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-08 09:09:47', NULL),
(23, 'Dodge', 'charger', '2015', '134901', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-08 09:09:47', '2019-01-16 01:02:42'),
(24, 'Lincoln', 'MQZ', '2015', '164401', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-07 09:09:47', NULL),
(25, 'Ford', 'F150', '2015', '164956', NULL, NULL, NULL, 100.00, 0.00, 0, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 09:09:47', NULL),
(26, 'red', 'rex', '2002', '164978', NULL, NULL, '4r', 100.00, 5.00, 4, 1, 3, 3, NULL, 2, NULL, NULL, NULL, 2, '2019-01-06 09:09:47', '2019-01-15 11:48:30'),
(27, 'mazda', '626', '2012', '764823', NULL, NULL, '54t', 100.00, 0.00, 3, 1, 2, NULL, NULL, 1, NULL, NULL, NULL, 3, '2019-01-14 11:14:13', '2019-01-16 01:38:36'),
(28, '5t', '5t', '2005', '454454', NULL, NULL, '54t', 100.00, 10.00, 2, 1, 4, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-01-15 06:11:27', '2019-01-16 04:04:20'),
(29, 'lexus', 'c300', '2005', '123456', NULL, NULL, '234r', 100.00, 5.00, 1, 1, 5, 2, NULL, 2, 2, NULL, NULL, NULL, '2019-01-16 00:56:38', '2019-01-16 04:02:58'),
(30, 'Dodge', 'cavaler', '2009', '123459', NULL, 'red', '90i0', 100.00, 5.00, 0, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-16 01:02:31', '2019-01-16 02:48:03'),
(31, 'VW', 'golf', '2009', '123451', NULL, NULL, '90i0', 100.00, 5.00, 0, 1, 1, NULL, NULL, 1, 1, NULL, NULL, NULL, '2019-01-16 01:07:49', '2019-01-16 02:47:43'),
(32, 'ferrari', 'spider', '2005', '147896', 'its red', NULL, '45', 100.00, 5.00, 0, 1, 4, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-16 03:13:25', '2019-01-16 03:13:25'),
(33, 'ford', 'mustang', '2005', '123412', 'hello', NULL, NULL, 100.00, 0.00, 4, 1, NULL, 1, 2, 2, 1, NULL, NULL, 4, '2019-01-16 03:58:25', '2019-01-16 04:00:04'),
(34, 'ford', 'mustang', '2005', '123326', NULL, NULL, NULL, 100.00, 0.00, 4, 1, NULL, 1, 3, 4, 1, NULL, NULL, 5, '2019-01-16 04:01:13', '2019-01-16 04:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `car_extra`
--

CREATE TABLE `car_extra` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL,
  `extra_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_extra`
--

INSERT INTO `car_extra` (`id`, `car_id`, `extra_id`, `created_at`, `updated_at`) VALUES
(2, 5, 2, '2019-01-13 04:41:44', '2019-01-13 04:41:44'),
(10, 1, 2, '2019-01-13 06:31:42', '2019-01-13 06:31:42'),
(11, 1, 1, '2019-01-13 06:34:31', '2019-01-13 06:34:31'),
(12, 6, 1, '2019-01-13 06:36:12', '2019-01-13 06:36:12'),
(13, 26, 1, '2019-01-15 11:47:32', '2019-01-15 11:47:32'),
(14, 29, 1, '2019-01-16 00:56:38', '2019-01-16 00:56:38'),
(15, 31, 1, '2019-01-16 02:47:43', '2019-01-16 02:47:43'),
(16, 30, 1, '2019-01-16 02:48:03', '2019-01-16 02:48:03'),
(17, 32, 1, '2019-01-16 03:13:25', '2019-01-16 03:13:25'),
(18, 28, 2, '2019-01-16 04:04:20', '2019-01-16 04:04:20'),
(19, 8, 1, '2019-01-16 04:04:33', '2019-01-16 04:04:33'),
(20, 2, 2, '2019-01-16 04:09:48', '2019-01-16 04:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'IL',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USA',
  `zip_code` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `city`, `state`, `country`, `zip_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Raul Hernandezp', 'raulhernandezing@gmail.com', '46595659', '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, NULL, '2019-01-16 04:06:12'),
(2, 'Raul Hernandez', 'admin@gmail.com', '456234', '2312 oge', 'wailcity', 'IL', 'USA', 150, 0, '2019-01-16 03:58:25', '2019-01-16 04:05:51'),
(3, 'rancheritos', 'ingraulhernandez@hotmail.com', '456234', '2312 oge', 'wailcity', 'IL', 'USA', 150, 0, '2019-01-16 04:01:13', '2019-01-16 04:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'IL',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USA',
  `zip_code` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `name`, `email`, `phone`, `contact`, `contact_phone`, `address`, `city`, `state`, `country`, `zip_code`, `status`, `logo`, `manager`, `created_at`, `updated_at`) VALUES
(1, 'Advantage Chevy', 'raulhernandezing@gmail.com', '46595659', 'Juan Perez', '456956598', '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 'chevy', 'John smit', NULL, NULL),
(2, 'Porsche of westmont ', 'raulhernandezing@gmail.com', '46595659', 'Juan Perez', '456956598', '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 'chevy', 'John smit', NULL, NULL),
(3, 'Ultima Motors', 'raulhernandezing@gmail.com', '46595659', 'Juan Perez', '456956598', '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 'chevy', 'John smit', NULL, NULL),
(4, 'Ferrari Motors', 'ferra@mail.com', '234242', NULL, NULL, 'siempre vie', 'lemont', 'IL', 'USA', 50740, 1, NULL, NULL, NULL, NULL),
(5, 'Lexus', 'lexra@mail.com', '234242', NULL, NULL, 'siempre vie', 'lemont', 'IL', 'USA', 50340, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'IL',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USA',
  `zip_code` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rol_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `last_name`, `email`, `phone`, `photo`, `address`, `city`, `state`, `country`, `zip_code`, `status`, `rol_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Luis Fernando', 'Ortiz', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL, NULL),
(2, 'Angel', 'Rodriguez', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL, NULL),
(3, 'Alfredo ', 'Quintana', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL, NULL),
(4, 'Cecilio ', 'Gonzales', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `name`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Gas 5 Dlls', 'Select if you put 5 Dollars Gas', 5.00, 1, NULL, NULL),
(2, 'Gas 10 Dlls', 'Select if you pay 10 Dollars Gas', 10.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealer_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `due` double(8,2) NOT NULL,
  `due_by` date DEFAULT NULL,
  `send_times` int(11) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `dealer_id`, `payment_id`, `customer_id`, `due`, `due_by`, `send_times`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 300.00, '2019-01-28', 1, 1, '2019-01-13 06:37:08', '2019-01-13 06:48:25'),
(2, 3, 1, NULL, 315.00, '2019-01-30', 1, 1, '2019-01-15 11:47:45', '2019-01-15 11:48:30'),
(3, 2, NULL, NULL, 100.00, '2019-01-30', 1, 0, '2019-01-16 01:38:36', '2019-01-16 01:38:36'),
(4, NULL, 1, 2, 0.00, '2019-01-30', 1, 1, '2019-01-16 04:00:04', '2019-01-16 04:00:04'),
(5, NULL, 1, 3, 200.00, '2019-01-30', 1, 1, '2019-01-16 04:07:45', '2019-01-16 04:07:45'),
(6, 1, NULL, NULL, 85.00, '2019-01-30', 1, 0, '2019-01-16 04:08:48', '2019-01-16 04:08:48'),
(7, 1, NULL, NULL, 85.00, '2019-01-30', 1, 0, '2019-01-16 04:09:25', '2019-01-16 04:09:25');

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
(92, '2014_10_12_000000_create_users_table', 1),
(93, '2014_10_12_100000_create_password_resets_table', 1),
(94, '2018_09_13_000000_create_rols_table', 1),
(95, '2018_09_13_183508_create_dealers_table', 1),
(96, '2018_09_13_183526_create_customers_table', 1),
(97, '2018_09_13_183625_create_employees_table', 1),
(98, '2018_09_13_183824_create_extras_table', 1),
(99, '2018_09_13_183943_create_payments_table', 1),
(100, '2018_09_13_184134_create_body_style_table', 1),
(101, '2018_09_13_184201_create_services_table', 1),
(102, '2018_09_13_184333_create_invoices_table', 1),
(103, '2018_09_13_184334_create_cars_table', 1),
(104, '2018_09_21_082915_create_car_extra_migration', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Money in hand', 1, NULL, NULL),
(2, 'Credit or debit Card', 'Slide Card with terminal', 1, NULL, NULL),
(3, 'Transfer', 'Money is sent from one bank account to another', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rols`
--

CREATE TABLE `rols` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rols`
--

INSERT INTO `rols` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Can access to whole application and services', 1, NULL, NULL),
(2, 'Manager', 'Can  check and aproval cars', 1, NULL, NULL),
(3, 'Detailer', 'Just to make details ', 1, NULL, NULL),
(4, 'Salaried', 'worker who is paid a fixed amount of money or compensation', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `body_style_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `status`, `body_style_id`, `created_at`, `updated_at`) VALUES
(1, 'Full Detail', 'An auto detail typically includes washing, waxing and detailing the exterior, and vacuuming, deep cleaning and detailing the interior. ', 100.00, 1, NULL, NULL, NULL),
(2, 'Hand Car Wash', 'clean the exterior and express vacum.', 40.00, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_style`
--
ALTER TABLE `body_style`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cars_vin_unique` (`vin`),
  ADD KEY `cars_dealer_id_foreign` (`dealer_id`),
  ADD KEY `cars_invoice_id_foreign` (`invoice_id`),
  ADD KEY `cars_customer_id_foreign` (`customer_id`),
  ADD KEY `cars_employee_id_foreign` (`employee_id`),
  ADD KEY `cars_service_id_foreign` (`service_id`),
  ADD KEY `cars_payment_id_foreign` (`payment_id`),
  ADD KEY `cars_user_id_foreign` (`user_id`),
  ADD KEY `cars_body_style_id_foreign` (`body_style_id`);

--
-- Indexes for table `car_extra`
--
ALTER TABLE `car_extra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_extra_car_id_foreign` (`car_id`),
  ADD KEY `car_extra_extra_id_foreign` (`extra_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_rol_id_foreign` (`rol_id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_payment_id_foreign` (`payment_id`),
  ADD KEY `invoices_dealer_id_foreign` (`dealer_id`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_body_style_id_foreign` (`body_style_id`);

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
-- AUTO_INCREMENT for table `body_style`
--
ALTER TABLE `body_style`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `car_extra`
--
ALTER TABLE `car_extra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_body_style_id_foreign` FOREIGN KEY (`body_style_id`) REFERENCES `body_style` (`id`),
  ADD CONSTRAINT `cars_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `cars_dealer_id_foreign` FOREIGN KEY (`dealer_id`) REFERENCES `dealers` (`id`),
  ADD CONSTRAINT `cars_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `cars_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `cars_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `cars_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `car_extra`
--
ALTER TABLE `car_extra`
  ADD CONSTRAINT `car_extra_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_extra_extra_id_foreign` FOREIGN KEY (`extra_id`) REFERENCES `extras` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `rols` (`id`),
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_dealer_id_foreign` FOREIGN KEY (`dealer_id`) REFERENCES `dealers` (`id`),
  ADD CONSTRAINT `invoices_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_body_style_id_foreign` FOREIGN KEY (`body_style_id`) REFERENCES `body_style` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
