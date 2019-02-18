-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2019 at 08:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_cw`
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
(1, 'Ford', 'Camaro', '2015', '267417', 'Aliquid repudiandae possimus ex.', 'Turquoise', 'voluptas', 100.00, 0.00, 1, 1, 2, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-15 07:26:41', '2019-02-17 01:55:15'),
(2, 'Mitsubishi', 'Ram', '1999', '528710', 'Est itaque soluta dolores.', 'Indigo', 'et', 100.00, 0.00, 0, 1, 7, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-01-20 18:03:03', '2019-02-17 01:55:15'),
(3, 'Toyote', 'Mustang', '1999', '792082', 'Voluptas doloribus vero.', 'Blue', 'fugit', 100.00, 0.00, 0, 1, 7, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-02-14 08:03:34', '2019-02-17 01:55:15'),
(4, 'Dodge', 'Supra', '2002', '247411', 'Aliquid ipsam et.', 'RosyBrown', 'est', 100.00, 0.00, 0, 1, 3, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-14 13:43:17', '2019-02-17 01:55:15'),
(5, 'Chevy', 'Camaro', '2006', '931386', 'Velit quo sapiente.', 'Darkorange', 'ad', 100.00, 0.00, 1, 1, 9, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-27 12:25:36', '2019-02-17 01:55:15'),
(6, 'Chevy', 'Ram', '2002', '970731', 'Quo occaecati.', 'PowderBlue', 'corporis', 100.00, 0.00, 0, 1, 8, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-02-01 03:31:32', '2019-02-17 01:55:15'),
(7, 'Ford', 'F140', '2004', '203275', 'Ullam ducimus fugit soluta.', 'Wheat', 'laboriosam', 100.00, 0.00, 0, 1, 9, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-01-14 15:16:03', '2019-02-17 01:55:15'),
(8, 'Ford', 'Camaro', '2011', '405610', 'Omnis qui.', 'GhostWhite', 'est', 100.00, 0.00, 1, 1, 4, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-01-27 10:04:15', '2019-02-17 01:55:15'),
(9, 'Chevy', 'Supra', '1999', '954801', 'Ea iusto atque.', 'Darkorange', 'ea', 100.00, 0.00, 1, 1, 1, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-03 04:07:39', '2019-02-17 01:55:15'),
(10, 'Ford', 'Camaro', '2014', '643778', 'Vero et vitae.', 'Ivory', 'voluptates', 100.00, 0.00, 1, 1, 5, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-02-06 10:34:04', '2019-02-17 01:55:15'),
(11, 'Mitsubishi', 'HHR', '2002', '442721', 'Harum amet in voluptatibus.', 'Peru', 'reiciendis', 100.00, 0.00, 1, 1, 10, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-16 23:38:42', '2019-02-17 01:55:15'),
(12, 'Toyote', 'Ram', '2000', '616500', 'Est ratione eum consequatur fugiat.', 'Yellow', 'aliquam', 100.00, 0.00, 0, 1, 10, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-12 23:27:06', '2019-02-17 01:55:15'),
(13, 'Mitsubishi', 'Camaro', '2011', '882781', 'Aliquid neque minima est.', 'PowderBlue', 'reprehenderit', 100.00, 0.00, 1, 1, 6, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-02-04 13:19:36', '2019-02-17 01:55:15'),
(14, 'Toyote', 'Camaro', '2002', '651228', 'Iste quo cupiditate et.', 'SaddleBrown', 'vitae', 100.00, 0.00, 0, 1, 2, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-15 08:23:19', '2019-02-17 01:55:16'),
(15, 'Toyote', 'Mustang', '2019', '174426', 'Aut dolorem nihil autem.', 'Snow', 'non', 100.00, 0.00, 0, 1, 2, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-02-03 03:03:31', '2019-02-17 01:55:16'),
(16, 'Chevy', 'Mustang', '2007', '372299', 'Ullam minus ut.', 'Tan', 'id', 100.00, 0.00, 0, 1, 5, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-31 21:35:59', '2019-02-17 01:55:16'),
(17, 'Dodge', 'Mustang', '2003', '363452', 'Facilis laudantium quia magnam.', 'SeaGreen', 'voluptatem', 100.00, 0.00, 0, 1, 5, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-29 01:53:41', '2019-02-17 01:55:16'),
(18, 'Chevy', 'Ram', '2013', '962197', 'Nisi quia dolorem tenetur.', 'Aqua', 'sit', 100.00, 0.00, 1, 1, 3, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-23 17:47:31', '2019-02-17 01:55:16'),
(19, 'Ford', 'Mustang', '1999', '028506', 'Totam voluptatem aspernatur tempora delectus.', 'SeaGreen', 'omnis', 100.00, 0.00, 1, 1, 2, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-06 11:46:10', '2019-02-17 01:55:16'),
(20, 'Mitsubishi', 'Mustang', '2003', '299362', 'Ducimus consequatur.', 'SeaShell', 'deserunt', 100.00, 0.00, 1, 1, 7, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-15 22:36:22', '2019-02-17 01:55:16'),
(21, 'Porsche', 'HHR', '2005', '823070', 'Cupiditate molestias odio voluptatem.', 'MediumSlateBlue', 'laboriosam', 100.00, 0.00, 1, 1, 8, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-22 03:46:35', '2019-02-17 01:55:16'),
(22, 'Ford', 'Supra', '2009', '692178', 'Et amet iusto.', 'LightSlateGray', 'natus', 100.00, 0.00, 0, 1, 4, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-12 15:01:23', '2019-02-17 01:55:16'),
(23, 'Chevy', 'Camaro', '2001', '175346', 'Deleniti et optio dolores.', 'HoneyDew', 'quisquam', 100.00, 0.00, 1, 1, 2, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-12 22:11:44', '2019-02-17 01:55:16'),
(24, 'Ford', 'Camaro', '2009', '855724', 'Totam tenetur consequuntur vitae.', 'MediumVioletRed', 'tenetur', 100.00, 0.00, 1, 1, 9, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-01-16 14:21:09', '2019-02-17 01:55:16'),
(25, 'Mitsubishi', 'HHR', '2002', '940536', 'Ipsam illo rerum.', 'Wheat', 'animi', 100.00, 0.00, 0, 1, 10, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-02-09 05:54:48', '2019-02-17 01:55:16'),
(26, 'Ford', 'HHR', '2007', '111550', 'Omnis iste commodi.', 'Tan', 'non', 100.00, 0.00, 1, 1, 3, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-02-07 23:24:11', '2019-02-17 01:55:16'),
(27, 'Mitsubishi', 'Ram', '2002', '533837', 'Est dignissimos aperiam dignissimos.', 'Aqua', 'laborum', 100.00, 0.00, 0, 1, 8, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-10 04:10:56', '2019-02-17 01:55:16'),
(28, 'Dodge', 'Mustang', '2002', '612034', 'Ipsam voluptas voluptatem.', 'MediumSlateBlue', 'autem', 100.00, 0.00, 0, 1, 10, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-10 19:10:47', '2019-02-17 01:55:16'),
(29, 'Toyote', 'F140', '2009', '146139', 'Velit tenetur iusto.', 'LavenderBlush', 'et', 100.00, 0.00, 0, 1, 4, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-18 15:48:40', '2019-02-17 01:55:16'),
(30, 'Mitsubishi', 'Ram', '2009', '276040', 'Qui non reiciendis tenetur assumenda.', 'SlateBlue', 'iusto', 100.00, 0.00, 0, 1, 6, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-02-03 20:27:59', '2019-02-17 01:55:16'),
(31, 'Chevy', 'Supra', '2001', '706638', 'Et id consequatur odit.', 'DarkViolet', 'eos', 100.00, 0.00, 0, 1, 2, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-17 13:19:08', '2019-02-17 01:55:16'),
(32, 'Porsche', 'Camaro', '2008', '516634', 'Natus perferendis optio sunt.', 'Chartreuse', 'esse', 100.00, 0.00, 1, 1, 2, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-25 09:07:33', '2019-02-17 01:55:16'),
(33, 'Mitsubishi', 'Mustang', '2005', '394070', 'Quae sed qui cupiditate.', 'Silver', 'soluta', 100.00, 0.00, 0, 1, 1, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-18 22:59:38', '2019-02-17 01:55:16'),
(34, 'Ford', 'HHR', '2008', '502911', 'Fuga quo veniam.', 'Tomato', 'sed', 100.00, 0.00, 1, 1, 4, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-16 13:36:55', '2019-02-17 01:55:16'),
(35, 'Porsche', 'Mustang', '2015', '313866', 'Eos consequatur at veniam.', 'ForestGreen', 'ut', 100.00, 0.00, 0, 1, 7, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-14 11:06:08', '2019-02-17 01:55:16'),
(36, 'Chevy', 'Camaro', '2016', '871331', 'Consequatur quibusdam vel.', 'DarkRed', 'consectetur', 100.00, 0.00, 1, 1, 9, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-05 23:40:57', '2019-02-17 01:55:16'),
(37, 'Dodge', 'Supra', '2010', '196115', 'Beatae voluptatibus rerum in consequuntur.', 'PeachPuff', 'quos', 100.00, 0.00, 0, 1, 8, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-18 11:23:46', '2019-02-17 01:55:16'),
(38, 'Mitsubishi', 'Supra', '2012', '854078', 'Dignissimos et aliquam ea.', 'LightSteelBlue', 'blanditiis', 100.00, 0.00, 1, 1, 3, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-21 06:53:24', '2019-02-17 01:55:16'),
(39, 'Mitsubishi', 'F140', '2014', '468124', 'Saepe saepe perspiciatis sint.', 'Teal', 'animi', 100.00, 0.00, 1, 1, 6, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-29 03:56:19', '2019-02-17 01:55:16'),
(40, 'Dodge', 'Camaro', '2000', '615876', 'Aliquid occaecati et.', 'MediumAquaMarine', 'optio', 100.00, 0.00, 1, 1, 6, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-22 09:01:07', '2019-02-17 01:55:16'),
(41, 'Dodge', 'Camaro', '2006', '299041', 'Aut voluptatem et aut.', 'LightSlateGray', 'aut', 100.00, 0.00, 0, 1, 8, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-28 15:43:54', '2019-02-17 01:55:16'),
(42, 'Mitsubishi', 'Ram', '2015', '189000', 'Tenetur qui velit cupiditate.', 'DimGrey', 'non', 100.00, 0.00, 0, 1, 7, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-02-17 00:24:05', '2019-02-17 01:55:16'),
(43, 'Porsche', 'Mustang', '2010', '497879', 'Molestiae est adipisci velit.', 'MintCream', 'consequuntur', 100.00, 0.00, 1, 1, 1, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-17 05:26:10', '2019-02-17 01:55:16'),
(44, 'Mitsubishi', 'HHR', '2000', '948442', 'Consequatur vel distinctio fugit.', 'DarkBlue', 'cupiditate', 100.00, 0.00, 0, 1, 9, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-25 15:07:47', '2019-02-17 01:55:16'),
(45, 'Ford', 'HHR', '2009', '531224', 'Voluptatibus quibusdam ut.', 'MidnightBlue', 'voluptatem', 100.00, 0.00, 1, 1, 9, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-02-09 06:20:47', '2019-02-17 01:55:16'),
(46, 'Mitsubishi', 'Ram', '1999', '527756', 'Voluptatem voluptas sed est molestiae.', 'Gainsboro', 'aut', 100.00, 0.00, 0, 1, 3, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-10 13:11:25', '2019-02-17 01:55:16'),
(47, 'Chevy', 'HHR', '2002', '183659', 'Fugit harum at facilis.', 'Red', 'aut', 100.00, 0.00, 0, 1, 2, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-28 14:27:35', '2019-02-17 01:55:16'),
(48, 'Ford', 'F140', '2001', '466155', 'Repellendus nemo id facilis beatae.', 'DarkSlateGray', 'aut', 100.00, 0.00, 1, 1, 2, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-16 15:33:46', '2019-02-17 01:55:16'),
(49, 'Porsche', 'Mustang', '2014', '541145', 'Esse sint voluptatum et voluptatem.', 'DarkMagenta', 'voluptatibus', 100.00, 0.00, 0, 1, 1, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-10 03:11:52', '2019-02-17 01:55:16'),
(50, 'Porsche', 'HHR', '2006', '395492', 'Corrupti et molestiae ut.', 'ForestGreen', 'et', 100.00, 0.00, 0, 1, 5, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-14 19:34:46', '2019-02-17 01:55:16'),
(51, 'Toyote', 'HHR', '2003', '973836', 'Laboriosam mollitia sequi aut.', 'MediumSeaGreen', 'officiis', 100.00, 0.00, 0, 1, 6, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-23 04:09:04', '2019-02-17 01:55:16'),
(52, 'Porsche', 'HHR', '2007', '509488', 'In eligendi vitae.', 'Silver', 'sit', 100.00, 0.00, 1, 1, 5, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-26 06:34:04', '2019-02-17 01:55:17'),
(53, 'Chevy', 'HHR', '2014', '002009', 'Vero aut.', 'Ivory', 'eum', 100.00, 0.00, 1, 1, 6, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-10 08:57:32', '2019-02-17 01:55:17'),
(54, 'Mitsubishi', 'Mustang', '2018', '233375', 'Quos non suscipit quibusdam.', 'Lavender', 'laborum', 100.00, 0.00, 1, 1, 1, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-09 18:41:23', '2019-02-17 01:55:17'),
(55, 'Mitsubishi', 'Camaro', '2005', '480326', 'Molestiae dignissimos tempora ducimus.', 'MediumSpringGreen', 'aperiam', 100.00, 0.00, 0, 1, 7, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-08 09:07:42', '2019-02-17 01:55:17'),
(56, 'Dodge', 'F140', '2015', '625347', 'Labore praesentium consequuntur.', 'DarkKhaki', 'error', 100.00, 0.00, 1, 1, 3, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-19 18:20:25', '2019-02-17 01:55:17'),
(57, 'Mitsubishi', 'Ram', '2016', '255686', 'Perspiciatis eos rerum minima officiis.', 'DarkSlateBlue', 'laboriosam', 100.00, 0.00, 1, 1, 6, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-01 21:05:21', '2019-02-17 01:55:17'),
(58, 'Ford', 'Camaro', '2007', '089796', 'Harum repellendus.', 'Linen', 'rem', 100.00, 0.00, 1, 1, 2, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-14 22:38:10', '2019-02-17 01:55:17'),
(59, 'Porsche', 'Mustang', '2000', '328371', 'Earum itaque similique.', 'Olive', 'hic', 100.00, 0.00, 1, 1, 4, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-10 19:14:33', '2019-02-17 01:55:17'),
(60, 'Porsche', 'Mustang', '2003', '388853', 'Quo facilis quas impedit.', 'Tomato', 'occaecati', 100.00, 0.00, 0, 1, 5, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-19 05:08:53', '2019-02-17 01:55:17'),
(61, 'Toyote', 'Mustang', '2017', '879838', 'Eius ratione quos architecto.', 'Bisque', 'amet', 100.00, 0.00, 1, 1, 4, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-28 19:36:21', '2019-02-17 01:55:17'),
(62, 'Porsche', 'F140', '2017', '964447', 'Rerum odio dicta.', 'MistyRose', 'at', 100.00, 0.00, 0, 1, 4, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-11 15:20:55', '2019-02-17 01:55:17'),
(63, 'Toyote', 'F140', '2013', '692139', 'Voluptatem voluptas recusandae dolorem.', 'Maroon', 'aut', 100.00, 0.00, 1, 1, 3, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-09 11:44:09', '2019-02-17 01:55:17'),
(64, 'Dodge', 'HHR', '2010', '598421', 'Et cumque voluptate.', 'MediumSlateBlue', 'enim', 100.00, 0.00, 1, 1, 4, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-14 14:23:29', '2019-02-17 01:55:17'),
(65, 'Dodge', 'HHR', '2010', '059032', 'Veniam ex et.', 'LightPink', 'quia', 100.00, 0.00, 0, 1, 5, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-18 21:08:39', '2019-02-17 01:55:17'),
(66, 'Porsche', 'Mustang', '2019', '596242', 'Et non minus dicta explicabo.', 'Crimson', 'doloremque', 100.00, 0.00, 0, 1, 10, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-05 05:01:33', '2019-02-17 01:55:17'),
(67, 'Dodge', 'Mustang', '2013', '883494', 'Odio nostrum velit.', 'MidnightBlue', 'expedita', 100.00, 0.00, 1, 1, 7, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-29 16:23:36', '2019-02-17 01:55:17'),
(68, 'Dodge', 'Mustang', '2007', '179800', 'In quaerat et.', 'DarkRed', 'illum', 100.00, 0.00, 0, 1, 10, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-02-01 22:42:52', '2019-02-17 01:55:17'),
(69, 'Dodge', 'Camaro', '2017', '077271', 'Ab sint in enim.', 'CadetBlue', 'sit', 100.00, 0.00, 1, 1, 8, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-26 09:17:15', '2019-02-17 01:55:17'),
(70, 'Dodge', 'F140', '2017', '688598', 'Eveniet provident sit non.', 'MediumPurple', 'officia', 100.00, 0.00, 1, 1, 6, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-02-03 21:38:50', '2019-02-17 01:55:17'),
(71, 'Chevy', 'Camaro', '2010', '134855', 'Repudiandae et odio fuga.', 'MediumPurple', 'nam', 100.00, 0.00, 1, 1, 9, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-08 01:13:56', '2019-02-17 01:55:17'),
(72, 'Dodge', 'Mustang', '1999', '737804', 'Ipsum eius vel ea.', 'LemonChiffon', 'id', 100.00, 0.00, 0, 1, 1, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-01-30 15:26:58', '2019-02-17 01:55:17'),
(73, 'Toyote', 'Camaro', '2012', '623389', 'Repellendus consectetur eaque sit delectus.', 'Ivory', 'distinctio', 100.00, 0.00, 0, 1, 5, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-28 02:10:15', '2019-02-17 01:55:17'),
(74, 'Chevy', 'Supra', '2007', '190004', 'Blanditiis delectus minus.', 'Azure', 'mollitia', 100.00, 0.00, 1, 1, 7, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-02-05 02:47:08', '2019-02-17 01:55:17'),
(75, 'Toyote', 'Ram', '2009', '414159', 'Quo velit porro.', 'DarkSalmon', 'non', 100.00, 0.00, 1, 1, 1, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-01-31 03:14:35', '2019-02-17 01:55:17'),
(76, 'Mitsubishi', 'F140', '2019', '099452', 'Officia assumenda.', 'Khaki', 'est', 100.00, 0.00, 0, 1, 9, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-01-27 19:55:39', '2019-02-17 01:55:17'),
(77, 'Dodge', 'Camaro', '2008', '068413', 'Provident enim.', 'Green', 'modi', 100.00, 0.00, 0, 1, 2, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-21 15:40:42', '2019-02-17 01:55:17'),
(78, 'Porsche', 'Mustang', '2002', '113124', 'Dolor recusandae minus et.', 'DarkMagenta', 'unde', 100.00, 0.00, 0, 1, 2, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-30 14:08:25', '2019-02-17 01:55:17'),
(79, 'Ford', 'Supra', '2018', '146042', 'Beatae fuga aspernatur.', 'Yellow', 'deleniti', 100.00, 0.00, 0, 1, 6, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-14 04:07:58', '2019-02-17 01:55:18'),
(80, 'Mitsubishi', 'F140', '2014', '140197', 'Et ullam odit.', 'SkyBlue', 'dolores', 100.00, 0.00, 0, 1, 2, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-20 02:48:45', '2019-02-17 01:55:18'),
(81, 'Mitsubishi', 'HHR', '2011', '114262', 'At dignissimos non natus.', 'Coral', 'doloremque', 100.00, 0.00, 0, 1, 6, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-26 22:00:36', '2019-02-17 01:55:18'),
(82, 'Toyote', 'Supra', '2011', '686016', 'Veniam unde.', 'MediumVioletRed', 'et', 100.00, 0.00, 1, 1, 2, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-13 17:21:16', '2019-02-17 01:55:18'),
(83, 'Chevy', 'HHR', '2005', '606903', 'Ratione in sit laboriosam quisquam.', 'Cyan', 'repellat', 100.00, 0.00, 0, 1, 10, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-21 23:45:04', '2019-02-17 01:55:18'),
(84, 'Toyote', 'HHR', '2010', '206956', 'Consequuntur molestiae quia temporibus.', 'Black', 'hic', 100.00, 0.00, 1, 1, 9, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-29 22:04:51', '2019-02-17 01:55:18'),
(85, 'Toyote', 'Mustang', '2000', '448638', 'Dolorem omnis odit.', 'Sienna', 'minima', 100.00, 0.00, 0, 1, 4, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-31 11:51:41', '2019-02-17 01:55:18'),
(86, 'Porsche', 'Supra', '2002', '681799', 'Eum numquam.', 'SkyBlue', 'quo', 100.00, 0.00, 0, 1, 3, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-18 20:43:06', '2019-02-17 01:55:18'),
(87, 'Mitsubishi', 'Camaro', '1999', '340385', 'Quam sunt corporis.', 'Silver', 'alias', 100.00, 0.00, 1, 1, 7, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-02-08 15:44:39', '2019-02-17 01:55:18'),
(88, 'Dodge', 'Camaro', '2018', '496401', 'Corrupti provident quos.', 'Darkorange', 'magnam', 100.00, 0.00, 1, 1, 5, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-17 09:13:46', '2019-02-17 01:55:18'),
(89, 'Ford', 'F140', '2019', '801930', 'Nesciunt at aperiam magnam.', 'Ivory', 'dolore', 100.00, 0.00, 1, 1, 10, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-14 07:21:59', '2019-02-17 01:55:18'),
(90, 'Dodge', 'F140', '1999', '825803', 'Libero aut at error.', 'MediumAquaMarine', 'est', 100.00, 0.00, 1, 1, 10, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-22 07:52:27', '2019-02-17 01:55:18'),
(91, 'Chevy', 'F140', '2011', '490373', 'Eos tenetur voluptatum eos.', 'LimeGreen', 'est', 100.00, 0.00, 1, 1, 10, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-02-13 15:26:54', '2019-02-17 01:55:18'),
(92, 'Mitsubishi', 'Supra', '2006', '866079', 'Consequatur cum voluptates sunt.', 'DarkOliveGreen', 'molestias', 100.00, 0.00, 0, 1, 4, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-22 03:20:33', '2019-02-17 01:55:18'),
(93, 'Porsche', 'Mustang', '2015', '834564', 'Excepturi ut explicabo atque.', 'Lime', 'eius', 100.00, 0.00, 1, 1, 10, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-12 12:06:30', '2019-02-17 01:55:18'),
(94, 'Mitsubishi', 'Camaro', '2004', '976524', 'Laborum mollitia repudiandae fugiat.', 'MediumSlateBlue', 'minus', 100.00, 0.00, 1, 1, 10, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-17 13:43:02', '2019-02-17 01:55:18'),
(95, 'Chevy', 'Supra', '2000', '281925', 'Quod magni reiciendis mollitia.', 'Orchid', 'velit', 100.00, 0.00, 1, 1, 3, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-14 06:57:03', '2019-02-17 01:55:18'),
(96, 'Ford', 'Camaro', '2019', '288216', 'Omnis iste ut.', 'Green', 'quaerat', 100.00, 0.00, 1, 1, 2, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-02-10 02:15:18', '2019-02-17 01:55:18'),
(97, 'Mitsubishi', 'Ram', '2014', '161177', 'Numquam cumque modi voluptatibus.', 'Moccasin', 'at', 100.00, 0.00, 0, 1, 2, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-27 15:23:08', '2019-02-17 01:55:18'),
(98, 'Dodge', 'HHR', '2003', '355395', 'Tempore dolores.', 'LightSkyBlue', 'et', 100.00, 0.00, 0, 1, 5, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-31 01:46:14', '2019-02-17 01:55:18'),
(99, 'Porsche', 'F140', '2002', '756907', 'Fuga vitae debitis animi.', 'LemonChiffon', 'quae', 100.00, 0.00, 1, 1, 7, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-01 05:32:44', '2019-02-17 01:55:18'),
(100, 'Ford', 'F140', '2001', '533166', 'Perferendis neque ipsum.', 'Plum', 'sit', 100.00, 0.00, 0, 1, 10, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-31 12:46:21', '2019-02-17 01:55:18'),
(101, 'Ford', 'F140', '2013', '213906', 'Nemo tempore praesentium dolorem.', 'LemonChiffon', 'vero', 100.00, 0.00, 0, 1, 2, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-11 04:51:34', '2019-02-17 01:55:18'),
(102, 'Ford', 'Mustang', '2002', '717124', 'Ut autem quae non.', 'GhostWhite', 'sint', 100.00, 0.00, 1, 1, 9, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-03 15:16:23', '2019-02-17 01:55:19'),
(103, 'Dodge', 'Ram', '2009', '739804', 'Id qui nemo.', 'SandyBrown', 'ea', 100.00, 0.00, 1, 1, 1, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-03 14:22:49', '2019-02-17 01:55:19'),
(104, 'Dodge', 'Ram', '2005', '272613', 'Et adipisci unde.', 'Tan', 'quos', 100.00, 0.00, 0, 1, 2, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-02-04 00:22:33', '2019-02-17 01:55:19'),
(105, 'Mitsubishi', 'Mustang', '2001', '370352', 'Perferendis repellat.', 'FireBrick', 'qui', 100.00, 0.00, 0, 1, 5, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-02-16 17:42:18', '2019-02-17 01:55:19'),
(106, 'Porsche', 'HHR', '2013', '259646', 'Rerum iure quam ut.', 'Turquoise', 'sit', 100.00, 0.00, 0, 1, 4, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-16 14:45:54', '2019-02-17 01:55:19'),
(107, 'Porsche', 'HHR', '2015', '323493', 'Iusto et dolores.', 'CornflowerBlue', 'labore', 100.00, 0.00, 1, 1, 3, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-21 05:10:56', '2019-02-17 01:55:19'),
(108, 'Chevy', 'Ram', '2015', '234548', 'Pariatur sequi ea quaerat.', 'SeaShell', 'ipsam', 100.00, 0.00, 1, 1, 4, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-31 19:48:01', '2019-02-17 01:55:19'),
(109, 'Ford', 'Supra', '2009', '499496', 'Earum quo expedita.', 'Red', 'dolore', 100.00, 0.00, 1, 1, 6, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-06 13:47:26', '2019-02-17 01:55:19'),
(110, 'Porsche', 'Supra', '2008', '286860', 'Eligendi natus voluptatem iure.', 'LightSteelBlue', 'omnis', 100.00, 0.00, 0, 1, 3, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-19 11:53:04', '2019-02-17 01:55:19'),
(111, 'Chevy', 'Supra', '2014', '088349', 'Consequatur voluptatem amet quidem.', 'Red', 'nostrum', 100.00, 0.00, 1, 1, 10, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-01-15 10:39:10', '2019-02-17 01:55:19'),
(112, 'Porsche', 'HHR', '2007', '205101', 'Temporibus itaque modi iste.', 'Orange', 'amet', 100.00, 0.00, 1, 1, 7, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-25 23:45:19', '2019-02-17 01:55:19'),
(113, 'Porsche', 'HHR', '2008', '756906', 'Est dolor a.', 'DarkOliveGreen', 'enim', 100.00, 0.00, 1, 1, 10, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-01-27 07:59:54', '2019-02-17 01:55:19'),
(114, 'Ford', 'HHR', '2005', '214881', 'Et quas.', 'LightCyan', 'quasi', 100.00, 0.00, 1, 1, 3, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-01-25 02:37:16', '2019-02-17 01:55:19'),
(115, 'Toyote', 'HHR', '2010', '316802', 'Et doloribus placeat nam repellat.', 'Orange', 'facilis', 100.00, 0.00, 1, 1, 4, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-12 06:11:12', '2019-02-17 01:55:19'),
(116, 'Ford', 'HHR', '1999', '567753', 'Aut magni molestias.', 'Red', 'possimus', 100.00, 0.00, 1, 1, 2, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-15 22:23:49', '2019-02-17 01:55:19'),
(117, 'Porsche', 'Supra', '2009', '415024', 'Soluta alias maiores.', 'MintCream', 'expedita', 100.00, 0.00, 0, 1, 3, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-21 13:46:54', '2019-02-17 01:55:19'),
(118, 'Chevy', 'Mustang', '2010', '725778', 'Animi rerum dolores ut.', 'DarkGoldenRod', 'quia', 100.00, 0.00, 1, 1, 6, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-02-13 17:23:23', '2019-02-17 01:55:19'),
(119, 'Mitsubishi', 'Ram', '2009', '965825', 'Ipsam ullam.', 'GreenYellow', 'id', 100.00, 0.00, 1, 1, 9, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-28 15:48:49', '2019-02-17 01:55:19'),
(120, 'Porsche', 'Mustang', '2008', '301678', 'Odio harum officiis id.', 'Aquamarine', 'sit', 100.00, 0.00, 1, 1, 4, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-10 15:33:30', '2019-02-17 01:55:19'),
(121, 'Toyote', 'F140', '2008', '735648', 'At doloribus placeat.', 'DarkOrchid', 'ex', 100.00, 0.00, 0, 1, 6, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-13 14:47:37', '2019-02-17 01:55:19'),
(122, 'Porsche', 'Mustang', '2013', '925583', 'Facere distinctio.', 'Gainsboro', 'nam', 100.00, 0.00, 1, 1, 8, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-02-05 05:41:05', '2019-02-17 01:55:19'),
(123, 'Dodge', 'Camaro', '2000', '455353', 'Illum minus expedita voluptates.', 'Violet', 'voluptatum', 100.00, 0.00, 1, 1, 7, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-02-11 00:10:47', '2019-02-17 01:55:19'),
(124, 'Toyote', 'Camaro', '2010', '646050', 'Delectus quaerat et.', 'DimGrey', 'et', 100.00, 0.00, 0, 1, 3, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-02-04 02:40:11', '2019-02-17 01:55:19'),
(125, 'Ford', 'HHR', '2001', '293090', 'Ex tempore ab nihil.', 'Maroon', 'dolore', 100.00, 0.00, 0, 1, 6, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-11 13:34:29', '2019-02-17 01:55:19'),
(126, 'Chevy', 'HHR', '2002', '779400', 'Id distinctio odit ea.', 'LightCoral', 'ullam', 100.00, 0.00, 0, 1, 10, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-02-07 22:49:37', '2019-02-17 01:55:19'),
(127, 'Dodge', 'F140', '2002', '408042', 'Explicabo consequatur beatae.', 'Turquoise', 'eveniet', 100.00, 0.00, 1, 1, 2, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-04 16:54:03', '2019-02-17 01:55:19'),
(128, 'Chevy', 'Ram', '2000', '638265', 'Quia occaecati quam rerum.', 'MediumPurple', 'magni', 100.00, 0.00, 0, 1, 4, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-27 21:23:28', '2019-02-17 01:55:20'),
(129, 'Mitsubishi', 'Mustang', '2014', '447849', 'Doloribus officia amet nobis.', 'MediumBlue', 'voluptatem', 100.00, 0.00, 1, 1, 5, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-24 20:43:01', '2019-02-17 01:55:20'),
(130, 'Ford', 'Ram', '2014', '793360', 'Iste voluptas consequatur.', 'AliceBlue', 'dolores', 100.00, 0.00, 1, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-04 23:39:44', '2019-02-17 01:55:20'),
(131, 'Chevy', 'Camaro', '1999', '421211', 'Error quo natus placeat.', 'White', 'omnis', 100.00, 0.00, 0, 1, 4, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-02-09 21:53:29', '2019-02-17 01:55:20'),
(132, 'Chevy', 'F140', '2006', '344910', 'Et enim architecto.', 'MediumVioletRed', 'odit', 100.00, 0.00, 1, 1, 5, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-03 10:28:08', '2019-02-17 01:55:20'),
(133, 'Ford', 'Mustang', '2002', '313658', 'Tempore quia molestias dignissimos.', 'LimeGreen', 'sed', 100.00, 0.00, 0, 1, 8, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-11 12:47:09', '2019-02-17 01:55:20'),
(134, 'Toyote', 'HHR', '2009', '792708', 'Cum accusamus qui laudantium.', 'LightPink', 'repellat', 100.00, 0.00, 0, 1, 7, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-01-17 09:53:06', '2019-02-17 01:55:20'),
(135, 'Porsche', 'F140', '2004', '605377', 'Non ipsa et.', 'PaleTurquoise', 'et', 100.00, 0.00, 0, 1, 10, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-24 09:17:52', '2019-02-17 01:55:20'),
(136, 'Dodge', 'Camaro', '2010', '616586', 'Optio et dolores ut consequuntur.', 'Indigo', 'iste', 100.00, 0.00, 1, 1, 7, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-02-10 07:11:29', '2019-02-17 01:55:20'),
(137, 'Toyote', 'Mustang', '2009', '736660', 'Et aut dolor.', 'DarkSlateBlue', 'debitis', 100.00, 0.00, 1, 1, 1, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-10 01:20:58', '2019-02-17 01:55:20'),
(138, 'Chevy', 'HHR', '2015', '387283', 'Earum aut asperiores.', 'Orange', 'quidem', 100.00, 0.00, 0, 1, 2, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-11 17:02:38', '2019-02-17 01:55:20'),
(139, 'Ford', 'Camaro', '2015', '484094', 'Doloribus libero nesciunt.', 'DarkTurquoise', 'id', 100.00, 0.00, 1, 1, 2, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-11 12:22:14', '2019-02-17 01:55:20'),
(140, 'Porsche', 'HHR', '2004', '858933', 'Vero numquam quo dolorum.', 'SlateBlue', 'eos', 100.00, 0.00, 1, 1, 6, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-14 20:15:56', '2019-02-17 01:55:20'),
(141, 'Porsche', 'Ram', '2017', '017444', 'Accusamus qui consequatur.', 'Linen', 'magni', 100.00, 0.00, 1, 1, 4, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-29 22:53:25', '2019-02-17 01:55:20'),
(142, 'Toyote', 'Mustang', '2005', '950332', 'Quae minus eaque suscipit.', 'SandyBrown', 'qui', 100.00, 0.00, 0, 1, 3, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-17 21:49:26', '2019-02-17 01:55:20'),
(143, 'Mitsubishi', 'Mustang', '2000', '026136', 'Aspernatur vitae in et.', 'OldLace', 'facilis', 100.00, 0.00, 0, 1, 3, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-14 15:13:08', '2019-02-17 01:55:20'),
(144, 'Dodge', 'HHR', '2015', '304325', 'Minus enim nam.', 'MintCream', 'accusantium', 100.00, 0.00, 1, 1, 4, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-12 17:28:42', '2019-02-17 01:55:20'),
(145, 'Porsche', 'F140', '2015', '146206', 'Sapiente et quidem.', 'Lavender', 'iusto', 100.00, 0.00, 1, 1, 10, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-28 21:38:18', '2019-02-17 01:55:20'),
(146, 'Dodge', 'Mustang', '1999', '622163', 'Architecto laudantium mollitia id eligendi.', 'Peru', 'illum', 100.00, 0.00, 0, 1, 8, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-03 02:53:44', '2019-02-17 01:55:20'),
(147, 'Porsche', 'Mustang', '1999', '090824', 'Corporis qui vel.', 'NavajoWhite', 'doloribus', 100.00, 0.00, 1, 1, 3, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-30 19:35:40', '2019-02-17 01:55:20'),
(148, 'Dodge', 'Supra', '2014', '343766', 'Quis porro ut nobis.', 'Lavender', 'est', 100.00, 0.00, 0, 1, 9, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-15 09:41:38', '2019-02-17 01:55:20'),
(149, 'Mitsubishi', 'Camaro', '2018', '154576', 'Ut eum unde vel delectus.', 'Cyan', 'necessitatibus', 100.00, 0.00, 0, 1, 10, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-23 09:23:41', '2019-02-17 01:55:20'),
(150, 'Dodge', 'Camaro', '2000', '676302', 'Optio quibusdam repellat dolor.', 'MistyRose', 'ipsum', 100.00, 0.00, 1, 1, 4, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-29 02:17:39', '2019-02-17 01:55:20'),
(151, 'Chevy', 'Supra', '2017', '794478', 'Aut id magnam sequi.', 'Teal', 'rerum', 100.00, 0.00, 0, 1, 4, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-19 09:29:34', '2019-02-17 01:55:20'),
(152, 'Mitsubishi', 'Supra', '2002', '963152', 'Ut dolore et.', 'SeaShell', 'possimus', 100.00, 0.00, 1, 1, 2, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-02 11:22:16', '2019-02-17 01:55:20'),
(153, 'Ford', 'F140', '2008', '600425', 'Iusto et.', 'LightSalmon', 'maiores', 100.00, 0.00, 0, 1, 4, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-20 08:40:17', '2019-02-17 01:55:20'),
(154, 'Chevy', 'Ram', '2015', '960397', 'Mollitia quia aut consequatur mollitia.', 'LightSteelBlue', 'nulla', 100.00, 0.00, 1, 1, 9, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-26 22:55:07', '2019-02-17 01:55:20'),
(155, 'Porsche', 'Ram', '2018', '180733', 'Eum esse beatae.', 'Indigo', 'non', 100.00, 0.00, 0, 1, 5, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-31 00:51:22', '2019-02-17 01:55:20'),
(156, 'Ford', 'Ram', '2013', '562325', 'Doloremque facere eaque libero.', 'LightBlue', 'rem', 100.00, 0.00, 0, 1, 1, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-01-21 08:25:02', '2019-02-17 01:55:20'),
(157, 'Dodge', 'Supra', '2014', '423047', 'Laboriosam quas suscipit ea.', 'Thistle', 'esse', 100.00, 0.00, 0, 1, 8, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-02-11 19:28:33', '2019-02-17 01:55:20'),
(158, 'Ford', 'Supra', '2005', '299706', 'Sed totam est.', 'DarkGreen', 'quod', 100.00, 0.00, 0, 1, 2, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-11 10:04:29', '2019-02-17 01:55:20'),
(159, 'Dodge', 'Mustang', '1999', '987083', 'Labore vel veniam a deleniti.', 'PeachPuff', 'aut', 100.00, 0.00, 0, 1, 2, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-12 11:28:35', '2019-02-17 01:55:20'),
(160, 'Dodge', 'Camaro', '2005', '295705', 'Recusandae fugit perspiciatis.', 'Brown', 'libero', 100.00, 0.00, 0, 1, 8, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-23 14:32:02', '2019-02-17 01:55:20'),
(161, 'Chevy', 'Camaro', '2011', '356539', 'Rerum fugit et enim.', 'Violet', 'est', 100.00, 0.00, 0, 1, 10, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-18 06:14:29', '2019-02-17 01:55:21'),
(162, 'Mitsubishi', 'Camaro', '2013', '794829', 'Blanditiis ut deleniti.', 'LightSlateGray', 'et', 100.00, 0.00, 0, 1, 4, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-24 03:50:50', '2019-02-17 01:55:21'),
(163, 'Ford', 'Supra', '2015', '631374', 'Voluptatibus qui nihil.', 'SlateBlue', 'fugiat', 100.00, 0.00, 1, 1, 10, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-14 11:34:29', '2019-02-17 01:55:21'),
(164, 'Porsche', 'HHR', '2015', '106787', 'Eaque impedit sed iusto.', 'Lavender', 'cumque', 100.00, 0.00, 0, 1, 1, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-22 02:52:55', '2019-02-17 01:55:21'),
(165, 'Chevy', 'Supra', '2008', '128769', 'Quidem accusamus consequuntur ut.', 'Aqua', 'dolor', 100.00, 0.00, 0, 1, 3, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-30 22:40:18', '2019-02-17 01:55:21'),
(166, 'Dodge', 'Mustang', '2008', '633571', 'Ex voluptatem est rem quia.', 'BlueViolet', 'quo', 100.00, 0.00, 1, 1, 6, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-22 14:15:35', '2019-02-17 01:55:21'),
(167, 'Porsche', 'Ram', '2006', '848432', 'Quam sunt nobis maiores.', 'Blue', 'cumque', 100.00, 0.00, 1, 1, 5, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-14 06:16:15', '2019-02-17 01:55:21'),
(168, 'Ford', 'HHR', '2011', '650740', 'Veritatis et ut.', 'LightSteelBlue', 'nemo', 100.00, 0.00, 1, 1, 5, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-01 10:18:30', '2019-02-17 01:55:21'),
(169, 'Dodge', 'Supra', '2016', '717204', 'Sed quis eligendi.', 'SpringGreen', 'maxime', 100.00, 0.00, 1, 1, 2, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-02-05 04:18:45', '2019-02-17 01:55:21'),
(170, 'Dodge', 'Mustang', '2003', '805961', 'Doloremque nostrum saepe.', 'Crimson', 'vel', 100.00, 0.00, 0, 1, 2, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-30 12:25:17', '2019-02-17 01:55:21'),
(171, 'Mitsubishi', 'Mustang', '1999', '813995', 'Temporibus quos sint est.', 'PaleTurquoise', 'nostrum', 100.00, 0.00, 0, 1, 1, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-07 14:33:25', '2019-02-17 01:55:21'),
(172, 'Ford', 'Camaro', '2007', '311024', 'Veniam qui mollitia voluptate.', 'DarkBlue', 'quaerat', 100.00, 0.00, 1, 1, 10, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-02-07 19:32:43', '2019-02-17 01:55:21'),
(173, 'Dodge', 'F140', '2008', '387579', 'Ex omnis nisi nostrum.', 'SaddleBrown', 'aut', 100.00, 0.00, 1, 1, 6, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-16 14:48:36', '2019-02-17 01:55:21'),
(174, 'Ford', 'F140', '2005', '187999', 'Optio sunt ad consequatur.', 'Ivory', 'ea', 100.00, 0.00, 1, 1, 7, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-02-11 22:59:07', '2019-02-17 01:55:21'),
(175, 'Toyote', 'Supra', '2007', '406493', 'Natus reprehenderit quasi ullam quasi.', 'MediumSpringGreen', 'officiis', 100.00, 0.00, 1, 1, 10, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-12 14:55:36', '2019-02-17 01:55:21'),
(176, 'Dodge', 'Supra', '2014', '183978', 'Debitis velit aut aut.', 'LightCyan', 'molestiae', 100.00, 0.00, 1, 1, 6, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-01-26 01:11:57', '2019-02-17 01:55:21'),
(177, 'Dodge', 'Mustang', '2004', '291125', 'Odio velit harum cumque.', 'LightSeaGreen', 'vel', 100.00, 0.00, 1, 1, 8, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-24 12:57:20', '2019-02-17 01:55:21'),
(178, 'Ford', 'Camaro', '2007', '410386', 'Vero mollitia nesciunt esse.', 'FireBrick', 'totam', 100.00, 0.00, 1, 1, 8, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-22 12:30:52', '2019-02-17 01:55:21'),
(179, 'Porsche', 'Ram', '2005', '084851', 'Minima laboriosam aspernatur.', 'Gainsboro', 'minus', 100.00, 0.00, 1, 1, 3, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-27 14:58:48', '2019-02-17 01:55:21'),
(180, 'Porsche', 'Ram', '2006', '223803', 'Et omnis harum labore.', 'RosyBrown', 'et', 100.00, 0.00, 1, 1, 8, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-14 04:59:50', '2019-02-17 01:55:21'),
(181, 'Ford', 'Ram', '2015', '948947', 'Adipisci eaque corrupti aperiam.', 'BurlyWood', 'totam', 100.00, 0.00, 1, 1, 7, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-15 19:42:53', '2019-02-17 01:55:21'),
(182, 'Ford', 'Mustang', '2012', '857156', 'Officiis qui eum voluptatem.', 'Black', 'voluptatum', 100.00, 0.00, 1, 1, 5, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-01-24 07:12:08', '2019-02-17 01:55:21'),
(183, 'Chevy', 'Supra', '2013', '382706', 'Dicta ab mollitia.', 'White', 'et', 100.00, 0.00, 1, 1, 2, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-17 23:49:05', '2019-02-17 01:55:21'),
(184, 'Chevy', 'Supra', '2005', '114850', 'Enim quam aut exercitationem.', 'PeachPuff', 'odit', 100.00, 0.00, 0, 1, 9, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-26 15:18:51', '2019-02-17 01:55:21'),
(185, 'Chevy', 'Mustang', '2016', '554848', 'Sunt excepturi eum.', 'Sienna', 'vel', 100.00, 0.00, 1, 1, 10, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-01-18 08:49:13', '2019-02-17 01:55:21'),
(186, 'Mitsubishi', 'HHR', '2009', '936015', 'Ad ducimus dolores totam dolorum.', 'Linen', 'magni', 100.00, 0.00, 1, 1, 5, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-01-29 11:15:24', '2019-02-17 01:55:22'),
(187, 'Ford', 'Supra', '2008', '550234', 'Minus ullam ut sint.', 'DeepPink', 'voluptates', 100.00, 0.00, 0, 1, 5, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-26 04:01:58', '2019-02-17 01:55:22'),
(188, 'Mitsubishi', 'Camaro', '2009', '350080', 'Omnis dolor odit ut.', 'CadetBlue', 'et', 100.00, 0.00, 0, 1, 10, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-12 14:38:07', '2019-02-17 01:55:22'),
(189, 'Ford', 'Mustang', '2011', '563616', 'Consectetur ratione et.', 'Orange', 'quo', 100.00, 0.00, 1, 1, 10, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-09 05:28:36', '2019-02-17 01:55:22'),
(190, 'Mitsubishi', 'Camaro', '1999', '744312', 'Aut et sed.', 'Lime', 'exercitationem', 100.00, 0.00, 0, 1, 2, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-03 11:31:25', '2019-02-17 01:55:22'),
(191, 'Toyote', 'Ram', '2008', '841229', 'Voluptas doloremque ea nulla natus.', 'SpringGreen', 'autem', 100.00, 0.00, 0, 1, 7, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-01-15 16:16:02', '2019-02-17 01:55:22'),
(192, 'Toyote', 'HHR', '2004', '318625', 'Quam hic ipsa.', 'LightSalmon', 'sit', 100.00, 0.00, 0, 1, 8, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-14 14:44:41', '2019-02-17 01:55:22'),
(193, 'Chevy', 'Camaro', '2008', '533104', 'Beatae laborum.', 'Khaki', 'architecto', 100.00, 0.00, 0, 1, 9, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-15 02:49:51', '2019-02-17 01:55:22'),
(194, 'Porsche', 'Supra', '2015', '589031', 'Ad laborum quis.', 'DarkGray', 'ut', 100.00, 0.00, 1, 1, 1, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-03 11:41:28', '2019-02-17 01:55:22'),
(195, 'Ford', 'Ram', '2005', '980152', 'Odit aut ipsa aut.', 'WhiteSmoke', 'id', 100.00, 0.00, 0, 1, 6, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-02-08 23:53:21', '2019-02-17 01:55:22'),
(196, 'Dodge', 'F140', '2013', '914470', 'Maiores veniam.', 'Red', 'consequuntur', 100.00, 0.00, 0, 1, 1, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-24 22:47:17', '2019-02-17 01:55:22'),
(197, 'Porsche', 'Mustang', '2015', '721289', 'Dicta labore et incidunt.', 'SlateGray', 'debitis', 100.00, 0.00, 0, 1, 3, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-02-13 05:31:14', '2019-02-17 01:55:22'),
(198, 'Toyote', 'Supra', '2018', '669279', 'Ut similique asperiores sunt.', 'MediumOrchid', 'dolor', 100.00, 0.00, 0, 1, 4, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-23 11:24:23', '2019-02-17 01:55:22'),
(199, 'Ford', 'Camaro', '2011', '255829', 'Officia rerum sed.', 'PowderBlue', 'quia', 100.00, 0.00, 1, 1, 3, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-08 01:07:52', '2019-02-17 01:55:22'),
(200, 'Mitsubishi', 'Camaro', '2012', '125224', 'Repellendus quaerat.', 'Beige', 'eos', 100.00, 0.00, 1, 1, 1, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-28 05:44:14', '2019-02-17 01:55:22'),
(201, 'Mitsubishi', 'F140', '2010', '887794', 'Ipsa quo qui amet harum.', 'DarkKhaki', 'voluptatem', 100.00, 0.00, 1, 1, 5, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-01-17 10:20:44', '2019-02-17 01:55:22'),
(202, 'Dodge', 'Ram', '2017', '463539', 'Corporis nam alias ad.', 'SkyBlue', 'corporis', 100.00, 0.00, 0, 1, 10, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-16 03:03:50', '2019-02-17 01:55:22'),
(203, 'Dodge', 'Camaro', '2014', '283781', 'Aut dicta qui.', 'PeachPuff', 'voluptatem', 100.00, 0.00, 0, 1, 2, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-01-26 12:14:24', '2019-02-17 01:55:22'),
(204, 'Chevy', 'Ram', '2007', '591446', 'Corrupti exercitationem autem.', 'Aqua', 'voluptas', 100.00, 0.00, 1, 1, 3, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-20 11:34:31', '2019-02-17 01:55:22'),
(205, 'Toyote', 'HHR', '2014', '668360', 'Aspernatur beatae sunt.', 'Thistle', 'consequatur', 100.00, 0.00, 0, 1, 9, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-02-05 10:53:29', '2019-02-17 01:55:22'),
(206, 'Dodge', 'F140', '2003', '965284', 'Omnis beatae repudiandae amet.', 'Darkorange', 'eum', 100.00, 0.00, 0, 1, 10, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-01-27 03:28:25', '2019-02-17 01:55:22'),
(207, 'Chevy', 'HHR', '2014', '000591', 'Perferendis odit.', 'FloralWhite', 'et', 100.00, 0.00, 0, 1, 7, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-22 06:52:30', '2019-02-17 01:55:22'),
(208, 'Chevy', 'Ram', '2003', '464820', 'Aut veniam aliquam.', 'AliceBlue', 'molestias', 100.00, 0.00, 1, 1, 4, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-29 20:42:04', '2019-02-17 01:55:22'),
(209, 'Porsche', 'Camaro', '2003', '203638', 'A aut placeat earum.', 'DarkGoldenRod', 'officia', 100.00, 0.00, 0, 1, 9, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-30 10:14:59', '2019-02-17 01:55:23'),
(210, 'Toyote', 'Ram', '2001', '018240', 'Ipsa distinctio.', 'NavajoWhite', 'in', 100.00, 0.00, 0, 1, 4, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-28 16:26:55', '2019-02-17 01:55:23'),
(211, 'Chevy', 'Camaro', '2005', '572789', 'Eligendi ea non enim.', 'BlanchedAlmond', 'sit', 100.00, 0.00, 1, 1, 10, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-01 17:35:10', '2019-02-17 01:55:23'),
(212, 'Toyote', 'Mustang', '2000', '907731', 'Vel pariatur expedita minima.', 'DimGray', 'sed', 100.00, 0.00, 0, 1, 8, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-20 14:18:10', '2019-02-17 01:55:23'),
(213, 'Ford', 'HHR', '2018', '779571', 'Beatae dolore magni.', 'Aquamarine', 'rerum', 100.00, 0.00, 0, 1, 4, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-30 19:59:07', '2019-02-17 01:55:23'),
(214, 'Dodge', 'Supra', '2003', '121165', 'Aut quos temporibus quia.', 'LightSkyBlue', 'labore', 100.00, 0.00, 1, 1, 8, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-02-11 18:40:52', '2019-02-17 01:55:23'),
(215, 'Ford', 'Camaro', '2007', '060137', 'Totam dolor quisquam vitae.', 'LightCoral', 'reiciendis', 100.00, 0.00, 1, 1, 8, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-20 06:40:19', '2019-02-17 01:55:23'),
(216, 'Toyote', 'Supra', '2004', '222846', 'Est quia laboriosam.', 'NavajoWhite', 'impedit', 100.00, 0.00, 0, 1, 9, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-16 12:10:30', '2019-02-17 01:55:23'),
(217, 'Chevy', 'Ram', '2010', '415483', 'Et suscipit ut eum.', 'LightCoral', 'voluptates', 100.00, 0.00, 0, 1, 2, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-02-01 15:30:12', '2019-02-17 01:55:23'),
(218, 'Toyote', 'Supra', '2011', '135587', 'Quos debitis minus voluptatem.', 'BurlyWood', 'repudiandae', 100.00, 0.00, 0, 1, 7, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-15 07:00:55', '2019-02-17 01:55:23'),
(219, 'Chevy', 'Mustang', '2017', '556477', 'Quam ipsa ut.', 'SlateBlue', 'mollitia', 100.00, 0.00, 1, 1, 9, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-02-08 09:00:23', '2019-02-17 01:55:23'),
(220, 'Chevy', 'Supra', '2016', '464241', 'Autem atque error impedit.', 'LightCyan', 'officia', 100.00, 0.00, 1, 1, 1, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-14 09:45:36', '2019-02-17 01:55:23'),
(221, 'Chevy', 'Supra', '2018', '231218', 'Dolor aliquam aut eligendi.', 'DarkSlateGray', 'ullam', 100.00, 0.00, 0, 1, 3, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-02-04 20:23:33', '2019-02-17 01:55:23'),
(222, 'Toyote', 'Ram', '2006', '435460', 'Accusantium voluptatem commodi dolores.', 'FloralWhite', 'vitae', 100.00, 0.00, 1, 1, 5, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-02-06 22:24:29', '2019-02-17 01:55:23'),
(223, 'Dodge', 'Ram', '2018', '911358', 'Nam praesentium.', 'DeepSkyBlue', 'ab', 100.00, 0.00, 1, 1, 1, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-01-30 05:50:59', '2019-02-17 01:55:23'),
(224, 'Ford', 'Mustang', '2002', '819231', 'Nisi ea dolores.', 'Blue', 'sit', 100.00, 0.00, 1, 1, 8, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-07 14:32:39', '2019-02-17 01:55:23'),
(225, 'Mitsubishi', 'F140', '2003', '051554', 'Quibusdam possimus sint quia porro.', 'Indigo', 'accusamus', 100.00, 0.00, 1, 1, 7, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-16 10:27:45', '2019-02-17 01:55:23'),
(226, 'Dodge', 'Supra', '2003', '269429', 'Fugiat esse.', 'Green', 'dignissimos', 100.00, 0.00, 0, 1, 8, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-17 20:44:16', '2019-02-17 01:55:23'),
(227, 'Mitsubishi', 'Camaro', '2017', '450326', 'Maiores molestiae at.', 'LightYellow', 'quo', 100.00, 0.00, 0, 1, 1, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-02-10 06:27:41', '2019-02-17 01:55:23'),
(228, 'Ford', 'Mustang', '2007', '353269', 'Ipsum neque.', 'Lime', 'veniam', 100.00, 0.00, 0, 1, 5, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-02-11 12:02:43', '2019-02-17 01:55:23'),
(229, 'Chevy', 'Ram', '2008', '771765', 'Et libero provident blanditiis in.', 'Wheat', 'earum', 100.00, 0.00, 1, 1, 3, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-20 09:10:09', '2019-02-17 01:55:23'),
(230, 'Chevy', 'Supra', '2014', '519325', 'Placeat dolor quis.', 'DarkSalmon', 'consequatur', 100.00, 0.00, 1, 1, 7, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-28 20:33:04', '2019-02-17 01:55:23'),
(231, 'Toyote', 'F140', '2011', '965091', 'Qui et nostrum nam.', 'PaleGreen', 'sit', 100.00, 0.00, 0, 1, 9, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-23 20:58:07', '2019-02-17 01:55:23'),
(232, 'Mitsubishi', 'Ram', '2014', '572176', 'Ut impedit nemo.', 'Chartreuse', 'voluptatum', 100.00, 0.00, 1, 1, 3, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-24 16:57:40', '2019-02-17 01:55:23'),
(233, 'Toyote', 'Ram', '2011', '196625', 'Consequatur earum animi.', 'Red', 'distinctio', 100.00, 0.00, 0, 1, 8, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-18 11:59:35', '2019-02-17 01:55:23'),
(234, 'Toyote', 'Ram', '2001', '881721', 'Nemo ipsam ipsa.', 'Snow', 'sed', 100.00, 0.00, 1, 1, 4, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-22 19:45:11', '2019-02-17 01:55:23'),
(235, 'Dodge', 'HHR', '2015', '213446', 'Quos et quos corrupti.', 'WhiteSmoke', 'minus', 100.00, 0.00, 1, 1, 6, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-25 10:45:17', '2019-02-17 01:55:23'),
(236, 'Mitsubishi', 'Mustang', '2007', '619037', 'Perferendis recusandae facilis est quo.', 'DarkBlue', 'cum', 100.00, 0.00, 1, 1, 5, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-03 23:06:11', '2019-02-17 01:55:23'),
(237, 'Porsche', 'Mustang', '2007', '209805', 'Aut consequatur doloribus.', 'Fuchsia', 'velit', 100.00, 0.00, 0, 1, 6, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-15 11:01:18', '2019-02-17 01:55:23'),
(238, 'Chevy', 'Supra', '2004', '496516', 'Omnis vero odit.', 'DarkOliveGreen', 'enim', 100.00, 0.00, 1, 1, 7, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-25 10:53:12', '2019-02-17 01:55:23'),
(239, 'Dodge', 'Camaro', '2012', '560010', 'Ad qui et.', 'Blue', 'nesciunt', 100.00, 0.00, 1, 1, 5, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-11 12:01:20', '2019-02-17 01:55:23'),
(240, 'Dodge', 'Mustang', '2001', '924361', 'Laudantium corrupti eum.', 'PapayaWhip', 'doloremque', 100.00, 0.00, 0, 1, 6, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-26 04:43:23', '2019-02-17 01:55:23'),
(241, 'Ford', 'Camaro', '2009', '299349', 'Quia maiores quidem.', 'LightSteelBlue', 'iure', 100.00, 0.00, 0, 1, 5, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-22 04:17:56', '2019-02-17 01:55:23'),
(242, 'Dodge', 'F140', '2006', '153030', 'Aliquid et eius ut.', 'Yellow', 'dolores', 100.00, 0.00, 0, 1, 5, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-01-31 06:43:56', '2019-02-17 01:55:24'),
(243, 'Toyote', 'Ram', '2013', '282201', 'Minima cum voluptatem animi.', 'DarkSeaGreen', 'corrupti', 100.00, 0.00, 0, 1, 10, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-03 00:59:29', '2019-02-17 01:55:24'),
(244, 'Porsche', 'Supra', '2005', '456469', 'Voluptatem est qui.', 'Black', 'commodi', 100.00, 0.00, 1, 1, 10, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-17 20:50:24', '2019-02-17 01:55:24'),
(245, 'Dodge', 'F140', '2000', '790472', 'Nihil ut natus.', 'DarkKhaki', 'libero', 100.00, 0.00, 0, 1, 7, 1, NULL, 8, 1, NULL, NULL, NULL, '2019-01-23 12:13:25', '2019-02-17 01:55:24'),
(246, 'Ford', 'Camaro', '1999', '930253', 'Recusandae hic at voluptatum.', 'Orange', 'adipisci', 100.00, 0.00, 1, 1, 7, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-24 08:23:18', '2019-02-17 01:55:24'),
(247, 'Toyote', 'HHR', '2014', '222364', 'Et velit deleniti velit corporis.', 'YellowGreen', 'tempora', 100.00, 0.00, 1, 1, 5, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-01-20 07:27:21', '2019-02-17 01:55:24'),
(248, 'Toyote', 'Mustang', '2017', '590565', 'Soluta et cupiditate fugiat.', 'Chartreuse', 'voluptatem', 100.00, 0.00, 0, 1, 4, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-17 12:32:09', '2019-02-17 01:55:24'),
(249, 'Porsche', 'F140', '2017', '476148', 'Enim accusantium quis.', 'Sienna', 'repellat', 100.00, 0.00, 0, 1, 5, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-15 20:34:17', '2019-02-17 01:55:24'),
(250, 'Ford', 'Mustang', '2002', '137212', 'Id occaecati hic qui nihil.', 'DarkBlue', 'repudiandae', 100.00, 0.00, 1, 1, 8, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-10 15:41:27', '2019-02-17 01:55:24'),
(251, 'Chevy', 'F140', '2002', '993313', 'Et nobis esse voluptatum.', 'RosyBrown', 'occaecati', 100.00, 0.00, 1, 1, 8, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-14 15:37:29', '2019-02-17 01:55:24'),
(252, 'Mitsubishi', 'F140', '2004', '845745', 'Dicta illo provident.', 'Salmon', 'saepe', 100.00, 0.00, 1, 1, 6, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-02 09:46:51', '2019-02-17 01:55:24'),
(253, 'Mitsubishi', 'Camaro', '2011', '513171', 'Voluptatem praesentium ut quia.', 'MidnightBlue', 'a', 100.00, 0.00, 1, 1, 4, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-01-17 00:10:39', '2019-02-17 01:55:24'),
(254, 'Ford', 'Ram', '2008', '753889', 'Et qui.', 'Turquoise', 'aut', 100.00, 0.00, 1, 1, 1, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-21 09:59:22', '2019-02-17 01:55:24'),
(255, 'Toyote', 'Mustang', '2016', '112486', 'Maxime nobis soluta quisquam velit.', 'Crimson', 'at', 100.00, 0.00, 0, 1, 1, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-28 09:55:08', '2019-02-17 01:55:24'),
(256, 'Mitsubishi', 'HHR', '2010', '125227', 'Consectetur ut ab aspernatur.', 'YellowGreen', 'qui', 100.00, 0.00, 1, 1, 1, 2, NULL, 4, 1, NULL, NULL, NULL, '2019-02-14 17:30:42', '2019-02-17 01:55:24');
INSERT INTO `cars` (`id`, `make`, `model`, `year`, `vin`, `note`, `color`, `stock`, `price`, `price_plus`, `level`, `status`, `dealer_id`, `body_style_id`, `customer_id`, `employee_id`, `service_id`, `payment_id`, `user_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(257, 'Chevy', 'F140', '2003', '735229', 'Dolorem expedita earum sint.', 'Snow', 'sit', 100.00, 0.00, 1, 1, 3, 2, NULL, 10, 1, NULL, NULL, NULL, '2019-02-01 06:15:22', '2019-02-17 01:55:24'),
(258, 'Porsche', 'Ram', '2013', '887056', 'Aut magni dolor.', 'MediumTurquoise', 'libero', 100.00, 0.00, 1, 1, 10, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-01-30 19:53:57', '2019-02-17 01:55:24'),
(259, 'Dodge', 'Camaro', '2006', '617022', 'Facilis maiores temporibus et ut.', 'ForestGreen', 'odio', 100.00, 0.00, 1, 1, 8, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-20 07:02:26', '2019-02-17 01:55:24'),
(260, 'Ford', 'Mustang', '2012', '535271', 'Et et est.', 'LawnGreen', 'consequuntur', 100.00, 0.00, 0, 1, 6, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-05 00:40:19', '2019-02-17 01:55:24'),
(261, 'Porsche', 'F140', '2002', '302432', 'Deleniti aut modi omnis fugit.', 'Orchid', 'iusto', 100.00, 0.00, 1, 1, 3, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-14 07:36:03', '2019-02-17 01:55:24'),
(262, 'Ford', 'F140', '2007', '565507', 'Eum vel.', 'Lime', 'quia', 100.00, 0.00, 0, 1, 8, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-23 03:16:42', '2019-02-17 01:55:24'),
(263, 'Ford', 'HHR', '2014', '940399', 'Qui voluptas est sed ut.', 'HoneyDew', 'est', 100.00, 0.00, 0, 1, 4, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-02 22:07:21', '2019-02-17 01:55:24'),
(264, 'Ford', 'Camaro', '2005', '412907', 'Incidunt aut rerum.', 'Azure', 'cum', 100.00, 0.00, 1, 1, 5, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-01-27 21:54:08', '2019-02-17 01:55:24'),
(265, 'Porsche', 'Camaro', '2008', '848742', 'Sint quis placeat ut tempora.', 'LemonChiffon', 'itaque', 100.00, 0.00, 1, 1, 6, 1, NULL, 6, 1, NULL, NULL, NULL, '2019-02-13 05:46:59', '2019-02-17 01:55:24'),
(266, 'Chevy', 'Mustang', '2005', '821005', 'Repellendus perferendis doloremque vitae.', 'OldLace', 'qui', 100.00, 0.00, 1, 1, 5, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-09 16:23:15', '2019-02-17 01:55:24'),
(267, 'Chevy', 'Ram', '2012', '662556', 'Vel dolorem consequatur magnam aut.', 'Khaki', 'et', 100.00, 0.00, 0, 1, 2, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-28 23:54:29', '2019-02-17 01:55:24'),
(268, 'Dodge', 'F140', '2012', '670267', 'Voluptas veniam eos.', 'LightSlateGray', 'laboriosam', 100.00, 0.00, 1, 1, 4, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-08 03:42:47', '2019-02-17 01:55:24'),
(269, 'Mitsubishi', 'Supra', '2014', '064017', 'Quia fugiat.', 'MediumVioletRed', 'voluptas', 100.00, 0.00, 0, 1, 5, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-02-01 17:40:01', '2019-02-17 01:55:24'),
(270, 'Dodge', 'Ram', '2004', '651100', 'Unde soluta animi quibusdam.', 'Teal', 'eum', 100.00, 0.00, 0, 1, 3, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-01-29 11:19:39', '2019-02-17 01:55:24'),
(271, 'Ford', 'Supra', '2006', '430280', 'Quia repellat laboriosam blanditiis esse.', 'MediumSlateBlue', 'quisquam', 100.00, 0.00, 0, 1, 9, 2, NULL, 9, 1, NULL, NULL, NULL, '2019-02-06 14:13:10', '2019-02-17 01:55:24'),
(272, 'Toyote', 'F140', '2009', '718979', 'Beatae laborum quibusdam.', 'Tan', 'quia', 100.00, 0.00, 0, 1, 3, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-01-21 00:43:38', '2019-02-17 01:55:25'),
(273, 'Porsche', 'Mustang', '2015', '981966', 'Nostrum eius quia sint.', 'Aqua', 'vero', 100.00, 0.00, 1, 1, 6, 2, NULL, 3, 1, NULL, NULL, NULL, '2019-02-04 12:48:05', '2019-02-17 01:55:25'),
(274, 'Dodge', 'Ram', '2018', '253916', 'Occaecati maiores.', 'White', 'non', 100.00, 0.00, 1, 1, 5, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-23 22:00:37', '2019-02-17 01:55:25'),
(275, 'Dodge', 'F140', '2011', '350349', 'Quos aut facere enim.', 'Blue', 'odio', 100.00, 0.00, 1, 1, 5, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-27 16:06:32', '2019-02-17 01:55:25'),
(276, 'Dodge', 'Camaro', '2010', '857913', 'Dolorem exercitationem ullam id.', 'Beige', 'illum', 100.00, 0.00, 1, 1, 4, 1, NULL, 5, 1, NULL, NULL, NULL, '2019-02-11 07:01:19', '2019-02-17 01:55:25'),
(277, 'Mitsubishi', 'Supra', '1999', '097115', 'Ea repellat iusto.', 'Linen', 'unde', 100.00, 0.00, 1, 1, 8, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-02-15 06:58:48', '2019-02-17 01:55:25'),
(278, 'Ford', 'Supra', '2009', '761088', 'Quo in.', 'Navy', 'velit', 100.00, 0.00, 0, 1, 10, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-02-08 16:01:09', '2019-02-17 01:55:25'),
(279, 'Ford', 'F140', '2002', '002398', 'Distinctio voluptatem sint velit.', 'DarkGoldenRod', 'quod', 100.00, 0.00, 1, 1, 8, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-02-12 10:14:58', '2019-02-17 01:55:25'),
(280, 'Chevy', 'F140', '2000', '261375', 'Omnis sed voluptatum eaque.', 'Aquamarine', 'doloribus', 100.00, 0.00, 0, 1, 3, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-02-11 23:19:10', '2019-02-17 01:55:25'),
(281, 'Toyote', 'HHR', '2011', '774830', 'Tempora consequatur alias non.', 'LightSalmon', 'ut', 100.00, 0.00, 1, 1, 2, 1, NULL, 3, 1, NULL, NULL, NULL, '2019-02-11 04:38:44', '2019-02-17 01:55:25'),
(282, 'Toyote', 'F140', '2019', '407677', 'Quasi est doloremque in.', 'Tomato', 'et', 100.00, 0.00, 1, 1, 1, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-06 16:09:19', '2019-02-17 01:55:25'),
(283, 'Ford', 'Supra', '2003', '459874', 'Vel doloribus sint harum.', 'RosyBrown', 'hic', 100.00, 0.00, 0, 1, 2, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-02-11 13:31:28', '2019-02-17 01:55:25'),
(284, 'Porsche', 'Camaro', '2015', '676978', 'Qui est modi dolorem.', 'Snow', 'quibusdam', 100.00, 0.00, 1, 1, 4, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-22 02:00:50', '2019-02-17 01:55:25'),
(285, 'Porsche', 'Ram', '2012', '837706', 'Aliquid unde cumque.', 'Purple', 'exercitationem', 100.00, 0.00, 1, 1, 2, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-20 10:27:27', '2019-02-17 01:55:25'),
(286, 'Mitsubishi', 'HHR', '2002', '816521', 'Tempore sunt ut autem molestiae.', 'Cyan', 'quas', 100.00, 0.00, 1, 1, 1, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-21 18:32:23', '2019-02-17 01:55:25'),
(287, 'Dodge', 'Camaro', '2019', '912372', 'Consequuntur hic omnis id.', 'LavenderBlush', 'qui', 100.00, 0.00, 0, 1, 8, 2, NULL, 8, 1, NULL, NULL, NULL, '2019-01-25 09:04:19', '2019-02-17 01:55:25'),
(288, 'Mitsubishi', 'Supra', '2012', '000809', 'Illum eaque et excepturi.', 'MediumTurquoise', 'consectetur', 100.00, 0.00, 1, 1, 1, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-02-09 18:33:08', '2019-02-17 01:55:25'),
(289, 'Dodge', 'HHR', '2015', '898894', 'Qui animi et asperiores.', 'DarkMagenta', 'ad', 100.00, 0.00, 1, 1, 4, 1, NULL, 10, 1, NULL, NULL, NULL, '2019-01-30 19:34:42', '2019-02-17 01:55:25'),
(290, 'Porsche', 'Supra', '2003', '874247', 'Inventore magnam nemo.', 'SteelBlue', 'dolores', 100.00, 0.00, 1, 1, 1, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-02-09 01:47:21', '2019-02-17 01:55:25'),
(291, 'Porsche', 'F140', '2003', '387981', 'Dolor numquam autem.', 'LightCoral', 'aut', 100.00, 0.00, 0, 1, 5, 2, NULL, 7, 1, NULL, NULL, NULL, '2019-01-31 04:35:47', '2019-02-17 01:55:25'),
(292, 'Dodge', 'Ram', '2004', '219018', 'Ipsam ut sit ut.', 'Blue', 'eos', 100.00, 0.00, 0, 1, 6, 2, NULL, 6, 1, NULL, NULL, NULL, '2019-01-26 03:22:19', '2019-02-17 01:55:25'),
(293, 'Porsche', 'Ram', '2009', '582252', 'Rerum sunt commodi vero.', 'PaleGoldenRod', 'sint', 100.00, 0.00, 0, 1, 7, 1, NULL, 1, 1, NULL, NULL, NULL, '2019-01-23 10:45:03', '2019-02-17 01:55:25'),
(294, 'Toyote', 'Mustang', '2007', '542266', 'Sunt sit omnis.', 'White', 'ut', 100.00, 0.00, 0, 1, 8, 1, NULL, 9, 1, NULL, NULL, NULL, '2019-02-11 14:08:24', '2019-02-17 01:55:25'),
(295, 'Porsche', 'HHR', '2000', '492162', 'Nostrum dolor quidem odio.', 'Orchid', 'rerum', 100.00, 0.00, 0, 1, 4, 1, NULL, 4, 1, NULL, NULL, NULL, '2019-01-28 13:42:06', '2019-02-17 01:55:25'),
(296, 'Toyote', 'Camaro', '2017', '269193', 'Quia nam.', 'LavenderBlush', 'laudantium', 100.00, 0.00, 0, 1, 2, 1, NULL, 7, 1, NULL, NULL, NULL, '2019-01-28 21:04:56', '2019-02-17 01:55:26'),
(297, 'Ford', 'HHR', '2004', '707986', 'Mollitia quia minima.', 'Red', 'quis', 100.00, 0.00, 1, 1, 4, 2, NULL, 1, 1, NULL, NULL, NULL, '2019-01-13 07:10:51', '2019-02-17 01:55:26'),
(298, 'Mitsubishi', 'Supra', '2007', '079819', 'Aliquid inventore commodi veritatis.', 'GhostWhite', 'delectus', 100.00, 0.00, 1, 1, 10, 1, NULL, 2, 1, NULL, NULL, NULL, '2019-02-13 16:32:37', '2019-02-17 01:55:26'),
(299, 'Porsche', 'F140', '2001', '718509', 'Est voluptatem et dolorem.', 'LightGreen', 'enim', 100.00, 0.00, 1, 1, 7, 2, NULL, 5, 1, NULL, NULL, NULL, '2019-02-08 13:51:34', '2019-02-17 01:55:26'),
(300, 'Ford', 'F140', '2010', '496281', 'Tempore voluptatem qui.', 'GreenYellow', 'odio', 100.00, 0.00, 1, 1, 8, 2, NULL, 2, 1, NULL, NULL, NULL, '2019-01-14 23:29:39', '2019-02-17 01:55:26');

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
(1, 'Raul Hernandez', 'raulhernandezing@gmail.com', '46595659', '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, NULL, NULL);

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
(1, 'Ford of Naperville', 'raulhernandezing@gmail.com', '1-888-626-3708', 'Dorothy Mraz Feeney', '855.907.8844', 'Suite 595', 'Lake', 'IL', 'USA', 637189, 1, 'chevy', 'Prudence Pollich II Champlin', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(2, ' Lexus of Westmont', 'raulhernandezing@gmail.com', '1-877-773-7880', 'Dr. Jefferey Yundt Weimann', '855.524.8001', 'Suite 797', 'New', 'IL', 'USA', 141717, 1, 'chevy', 'Prof. Eino Schimmel IV Ullrich', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(3, 'Mitsubishi of Joliet', 'raulhernandezing@gmail.com', '1-800-403-9348', 'Dejon Langworth Sr. Berge', '877-457-1689', 'Suite 899', 'Lake', 'IL', 'USA', 928332, 1, 'chevy', 'Virginia O\'Connell V Lemke', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(4, ' Downers Grove Motors', 'raulhernandezing@gmail.com', '844-418-5432', 'Miss Kassandra Wolf IV Daugherty', '(800) 875-8716', 'Apt. 363', 'West', 'IL', 'USA', 298857, 1, 'chevy', 'Dr. Jovany Gottlieb Mohr', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(5, ' Toyota of westmont', 'raulhernandezing@gmail.com', '800-294-7063', 'Keira Hirthe Rau', '844.987.6433', 'Apt. 897', 'West', 'IL', 'USA', 777737, 1, 'chevy', 'Joan Windler Altenwerth', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(6, 'Porsche of Westmont', 'raulhernandezing@gmail.com', '888-568-6222', 'Syble Mueller MD Raynor', '855-254-8195', 'Suite 823', 'Lake', 'IL', 'USA', 222632, 1, 'chevy', 'Doyle O\'Hara Lemke', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(7, ' Hiundy of Westmont', 'raulhernandezing@gmail.com', '800-887-0107', 'Cicero Okuneva Block', '(800) 644-1928', 'Apt. 492', 'East', 'IL', 'USA', 50889, 1, 'chevy', 'Rick Bayer Yundt', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(8, 'Ultimo Motors', 'raulhernandezing@gmail.com', '1-877-327-3076', 'Chanelle Schmeler Stoltenberg', '800.910.1765', 'Apt. 689', 'East', 'IL', 'USA', 795701, 1, 'chevy', 'Miss Estrella Feil MD Marks', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(9, 'Advantage Chevy', 'raulhernandezing@gmail.com', '855-521-3930', 'Mr. Sterling Bailey I Wisoky', '800-916-0731', 'Suite 343', 'Port', 'IL', 'USA', 247354, 1, 'chevy', 'Aaliyah Greenfelder I Padberg', '2018-01-15 07:01:13', '2019-02-17 01:55:14'),
(10, ' Acura of Westmont', 'raulhernandezing@gmail.com', '(888) 217-0794', 'Robyn Moen Schroeder', '844-278-4149', 'Apt. 985', 'West', 'IL', 'USA', 758753, 1, 'chevy', 'Miss Joy Rogahn MD Johnston', '2018-01-15 07:01:13', '2019-02-17 01:55:14');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `last_name`, `email`, `phone`, `photo`, `address`, `city`, `state`, `country`, `zip_code`, `status`, `rol_id`, `created_at`, `updated_at`) VALUES
(1, 'Raul ', 'Hernandez', 'raulhernandezing@gmail.com', '4422263267', NULL, '217 bunkerhill  ', 'Bolngbrook', 'IL', 'USA', 60440, 1, 1, NULL, NULL),
(2, 'Angel', 'Rodriguez', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(3, 'Alfredo ', 'Quintana', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(4, 'Cecilio ', 'Gonzales', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(5, 'odin ', 'Ruiz', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(6, 'Carlos ', 'Ruiz', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(7, 'Lino ', 'Perez', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(8, 'Rick ', 'Carls', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(9, 'George  ', 'Smith', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL),
(10, 'Rogelio ', 'Perez', 'raulhernandezing@gmail.com', '46595659', NULL, '544 boughton rd', 'Bolngbrook', 'IL', 'USA', 60440, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rent', 'payment for the building rent', 2000.00, 1, NULL, NULL),
(2, 'Insurance', 'Insurance payment', 500.00, 1, NULL, NULL),
(3, 'Water bill', 'Montly paymen for Water', 200.00, 1, NULL, NULL),
(4, 'Paint', 'We paint tha main entrance', 200.00, 1, NULL, NULL);

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
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2018_09_13_000000_create_rols_table', 1),
(41, '2018_09_13_183508_create_dealers_table', 1),
(42, '2018_09_13_183526_create_customers_table', 1),
(43, '2018_09_13_183625_create_employees_table', 1),
(44, '2018_09_13_183824_create_extras_table', 1),
(45, '2018_09_13_183943_create_payments_table', 1),
(46, '2018_09_13_184134_create_body_style_table', 1),
(47, '2018_09_13_184201_create_services_table', 1),
(48, '2018_09_13_184320_create_users_table', 1),
(49, '2018_09_13_184333_create_invoices_table', 1),
(50, '2018_09_13_184334_create_cars_table', 1),
(51, '2018_09_21_082915_create_car_extra_migration', 1),
(52, '2019_02_03_160941_create_expenses_table', 1),
(53, '2019_02_03_164036_create_supplies_table', 1),
(54, '2019_02_04_002350_create_monthly_expenses', 1),
(55, '2019_02_04_002811_create_month__expenses', 1),
(56, '2019_02_04_002836_create_month__supplies', 1),
(57, '2019_02_06_121851_unique_expense_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `month_passives`
--

CREATE TABLE `month_passives` (
  `id` int(10) UNSIGNED NOT NULL,
  `month_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month_passive_expense`
--

CREATE TABLE `month_passive_expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `expense_id` int(10) UNSIGNED DEFAULT NULL,
  `month_passive_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month_passive_supply`
--

CREATE TABLE `month_passive_supply` (
  `id` int(10) UNSIGNED NOT NULL,
  `supply_id` int(10) UNSIGNED DEFAULT NULL,
  `month_passive_id` int(10) UNSIGNED DEFAULT NULL,
  `total_price` double(8,2) NOT NULL DEFAULT '0.00',
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'Can access to whole application, services create and delete data', 1, NULL, NULL),
(2, 'Admin', 'Can access to whole application and services', 1, NULL, NULL),
(3, 'Manager', 'Can  check and aproval cars', 1, NULL, NULL),
(4, 'Detailer', 'Just to make details ', 1, NULL, NULL),
(5, 'Salaried', 'worker who is paid a fixed amount of money or compensation', 1, NULL, NULL),
(6, 'External', 'worker who is working in the customer location', 1, NULL, NULL);

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
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measure` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `name`, `description`, `measure`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'carpet soap', 'Soap for the carpet', 'Gallon', 100.00, 1, NULL, NULL),
(2, 'Spray Bottles', 'Bottles to spray soap', 'Unit', 5.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unique_expenses`
--

CREATE TABLE `unique_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `month_passive_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `employee_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'raulhernandezing@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, 1, NULL, NULL, NULL);

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
  ADD KEY `employees_rol_id_foreign` (`rol_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `month_passives`
--
ALTER TABLE `month_passives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_passive_expense`
--
ALTER TABLE `month_passive_expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `month_passive_expense_expense_id_foreign` (`expense_id`),
  ADD KEY `month_passive_expense_month_passive_id_foreign` (`month_passive_id`);

--
-- Indexes for table `month_passive_supply`
--
ALTER TABLE `month_passive_supply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `month_passive_supply_supply_id_foreign` (`supply_id`),
  ADD KEY `month_passive_supply_month_passive_id_foreign` (`month_passive_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_body_style_id_foreign` (`body_style_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unique_expenses`
--
ALTER TABLE `unique_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unique_expenses_month_passive_id_foreign` (`month_passive_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_employee_id_foreign` (`employee_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `car_extra`
--
ALTER TABLE `car_extra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `month_passives`
--
ALTER TABLE `month_passives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `month_passive_expense`
--
ALTER TABLE `month_passive_expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `month_passive_supply`
--
ALTER TABLE `month_passive_supply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unique_expenses`
--
ALTER TABLE `unique_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `employees_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_dealer_id_foreign` FOREIGN KEY (`dealer_id`) REFERENCES `dealers` (`id`),
  ADD CONSTRAINT `invoices_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`);

--
-- Constraints for table `month_passive_expense`
--
ALTER TABLE `month_passive_expense`
  ADD CONSTRAINT `month_passive_expense_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `month_passive_expense_month_passive_id_foreign` FOREIGN KEY (`month_passive_id`) REFERENCES `month_passives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `month_passive_supply`
--
ALTER TABLE `month_passive_supply`
  ADD CONSTRAINT `month_passive_supply_month_passive_id_foreign` FOREIGN KEY (`month_passive_id`) REFERENCES `month_passives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `month_passive_supply_supply_id_foreign` FOREIGN KEY (`supply_id`) REFERENCES `supplies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_body_style_id_foreign` FOREIGN KEY (`body_style_id`) REFERENCES `body_style` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unique_expenses`
--
ALTER TABLE `unique_expenses`
  ADD CONSTRAINT `unique_expenses_month_passive_id_foreign` FOREIGN KEY (`month_passive_id`) REFERENCES `month_passives` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
