-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 11:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_transaction`
--

CREATE TABLE `cart_transaction` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_product` int(11) DEFAULT 0,
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'refleksi dan massage', '2019-11-06 10:27:35', '2020-04-24 23:45:13'),
(2, 'beauty treatment', '2019-11-06 10:27:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `gender`, `created`, `updated`) VALUES
(1, 'Rika Nugraha', '0895380049141', 'P', '2019-11-06 09:00:31', '0000-00-00 00:00:00'),
(2, 'nuriyus', '0859196173278', 'P', '2019-11-06 09:02:06', '0000-00-00 00:00:00'),
(3, 'febri ', '082154379849', 'L', '2019-11-06 09:02:40', '0000-00-00 00:00:00'),
(4, 'yanto', '089661561839', 'L', '2019-11-06 09:03:14', '0000-00-00 00:00:00'),
(5, 'leli', '081522957143', 'P', '2019-11-06 09:04:00', '0000-00-00 00:00:00'),
(6, 'elsan', '081256061086', 'L', '2019-11-06 09:04:51', '0000-00-00 00:00:00'),
(7, 'fitriani', '089675007352', 'P', '2019-11-06 09:06:03', '0000-00-00 00:00:00'),
(8, 'gessy', '0895706496909', 'P', '2019-11-06 09:06:59', '0000-00-00 00:00:00'),
(9, 'jeri', '089675413206', 'L', '2019-11-06 09:07:34', '0000-00-00 00:00:00'),
(10, 'sisi', '089650458819', 'P', '2019-11-06 09:08:29', '0000-00-00 00:00:00'),
(11, 'lisma', '082154384412', 'P', '2019-11-06 09:09:13', '0000-00-00 00:00:00'),
(12, 'nia', '085754620952', 'P', '2019-11-06 09:10:31', '0000-00-00 00:00:00'),
(13, 'rita', '081316400731', 'P', '2019-11-06 09:11:21', '0000-00-00 00:00:00'),
(14, 'nur dwi', '089694178297', 'P', '2019-11-06 09:12:03', '0000-00-00 00:00:00'),
(15, 'zegy', '082256794572', 'L', '2019-11-06 09:13:04', '0000-00-00 00:00:00'),
(16, 'wilda', '085750590941', 'P', '2019-11-06 09:13:35', '0000-00-00 00:00:00'),
(17, 'widya', '082256439707', 'P', '2019-11-06 09:14:12', '0000-00-00 00:00:00'),
(18, 'mia prf', '082247528727', 'P', '2019-11-06 09:14:55', '0000-00-00 00:00:00'),
(19, 'miske', '089631116225', 'P', '2019-11-06 09:16:16', '0000-00-00 00:00:00'),
(20, 'muslim', '08992438650', 'L', '2019-11-06 09:16:58', '0000-00-00 00:00:00'),
(21, 'alif angga', '082251591096', 'L', '2019-11-06 09:18:28', '0000-00-00 00:00:00'),
(22, 'alif fitrah', '089693838921', 'L', '2019-11-06 09:18:57', '0000-00-00 00:00:00'),
(23, 'albird', '089657564668', 'L', '2019-11-06 09:19:49', '0000-00-00 00:00:00'),
(24, 'dio', '081253466514', 'L', '2019-11-06 09:20:59', '0000-00-00 00:00:00'),
(25, 'egi', '085822587654', 'L', '2019-11-06 09:21:52', '0000-00-00 00:00:00'),
(26, 'erna', '089693827366', 'P', '2019-11-06 09:22:32', '0000-00-00 00:00:00'),
(27, 'lia', '089667847379', 'P', '2019-11-06 09:23:40', '0000-00-00 00:00:00'),
(28, 'rindo', '081522512682', 'L', '2019-11-06 09:25:59', '0000-00-00 00:00:00'),
(29, 'tiya', '085345253209', 'P', '2019-11-06 09:27:41', '0000-00-00 00:00:00'),
(30, 'bagus', '081255208908', 'L', '2019-11-06 09:29:08', '0000-00-00 00:00:00'),
(34, 'Anita Ratna Pertiwi', '081649290009', 'P', '2020-05-01 04:05:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item_stock`
--

CREATE TABLE `item_stock` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_stock`
--

INSERT INTO `item_stock` (`item_id`, `name`, `price`, `stock`, `created`, `updated`) VALUES
(1, 'lulur wajah sari ayu 200ml', 45000, 9, '2020-01-14 22:36:21', '2020-01-21 13:27:42'),
(4, 'Wardah Olive Oil for Massage 150ml', 39000, 8, '2020-01-21 19:22:58', '2020-02-06 15:54:32'),
(5, 'latulipe massage cream 200g ', 75000, 1, '2020-01-21 19:24:59', '2020-01-21 18:51:01'),
(6, 'Herborist Spa Series Massage Oil Jasmine 150ml', 35000, 0, '2020-01-21 19:26:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `category_id`, `product_code`, `price`, `created`, `updated`) VALUES
(1, 'Refleksi + bekam (50 menit)', 1, 'A001', 50000, '2019-11-06 10:31:20', '0000-00-00 00:00:00'),
(2, 'Refleksi kaki tangan + urut badan (1,5 jam)', 1, 'A002', 100000, '2019-11-06 10:31:47', '0000-00-00 00:00:00'),
(3, 'Refleksi kepala + kaki tangan (1 jam)', 1, 'A003', 80000, '2019-11-06 10:32:11', '0000-00-00 00:00:00'),
(4, 'totok wajah (45 menit)', 2, 'B001', 50000, '2019-11-06 10:32:34', '0000-00-00 00:00:00'),
(5, 'ear candle dan pijat kepala (45 menit)', 1, 'A004', 50000, '2019-11-06 10:33:11', '2019-11-06 04:33:30'),
(6, 'Guasa + urut badan (i jam 15 menit) ', 1, 'A005', 100000, '2019-11-06 10:34:11', '2019-11-06 04:34:31'),
(7, 'totok wajah + facial (1,5 jam)', 2, 'B002', 100000, '2019-11-06 10:35:19', '0000-00-00 00:00:00'),
(8, 'Lulur badan (30 menit) ', 2, 'B003', 50000, '2019-11-06 10:35:47', '0000-00-00 00:00:00'),
(9, 'Lulur badan + masker badan (1 jam 30 menit)', 2, 'B004', 100000, '2019-11-06 10:36:15', '2019-11-12 04:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `therapist_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_product` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`detail_id`, `sale_id`, `product_id`, `therapist_id`, `price`, `discount_product`, `total`) VALUES
(88, 128, 5, 1, 50000, 0, 50000),
(89, 128, 5, 1, 50000, 0, 50000),
(92, 130, 7, 2, 100000, 0, 100000),
(93, 130, 3, 2, 80000, 0, 80000),
(94, 131, 6, 2, 100000, 0, 100000),
(95, 131, 5, 2, 50000, 0, 50000),
(96, 132, 6, 1, 100000, 10, 90000),
(97, 132, 9, 1, 100000, 20, 80000),
(98, 133, 8, 1, 50000, 0, 50000),
(99, 133, 6, 1, 100000, 0, 100000),
(100, 134, 6, 1, 100000, 0, 100000),
(101, 134, 9, 2, 100000, 0, 100000),
(102, 135, 3, 1, 80000, 0, 80000),
(103, 135, 4, 2, 50000, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `sale_transaction`
--

CREATE TABLE `sale_transaction` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) DEFAULT 0,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_transaction`
--

INSERT INTO `sale_transaction` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(8, 'CR2004280001', 21, 400000, 50, 200000, 200000, 0, 'aaa', '2020-04-28', 2, '2020-04-28 23:14:13'),
(9, 'CR2004280002', 30, 100000, 50, 50000, 50000, 0, 'aaa', '2020-04-28', 2, '2020-04-28 23:18:42'),
(10, 'CR2004280003', 25, 50000, 20, 40000, 50000, 10000, 'aaa', '2020-04-28', 2, '2020-04-28 23:20:06'),
(12, 'CR2004290001', 23, 100000, 0, 100000, 100000, 0, 'uuu', '2020-04-29', 2, '2020-04-29 01:06:08'),
(13, 'CR2004290002', 6, 100000, 20, 80000, 100000, 20000, 'uuuuu', '2020-04-29', 2, '2020-04-29 01:06:55'),
(14, 'CR2004300001', 7, 100000, 20, 80000, 100000, 20000, '', '2020-04-30', 2, '2020-04-30 23:57:51'),
(15, 'CR2005010001', 22, 100000, 30, 70000, 100000, 30000, '', '2020-05-01', 2, '2020-05-01 00:13:01'),
(16, 'CR2005010002', 18, 50000, 0, 50000, 50000, 0, '', '2020-05-01', 2, '2020-05-01 00:13:33'),
(17, 'CR2005010003', 11, 100000, 0, 100000, 100000, 0, '', '2020-05-01', 2, '2020-05-01 00:37:48'),
(18, 'CR2005010004', 24, 150000, 20, 120000, 150000, 30000, '', '2020-05-01', 2, '2020-05-01 02:20:42'),
(20, 'CR2005010006', 20, 135000, 0, 135000, 140000, 5000, '', '2020-05-01', 2, '2020-05-01 03:51:19'),
(21, 'CR2005010007', 15, 185000, 0, 185000, 190000, 5000, '', '2020-05-01', 2, '2020-05-01 03:57:38'),
(22, 'CR2005010008', 34, 100000, 15, 85000, 100000, 15000, '', '2020-05-01', 3, '2020-05-01 04:09:49'),
(23, 'CR2005010009', 19, 50000, 0, 50000, 50000, 0, '', '2020-05-01', 2, '2020-05-01 22:49:12'),
(24, 'CR2005020001', 16, 100000, 0, 100000, 100000, 0, '', '2020-05-02', 2, '2020-05-02 19:11:31'),
(25, 'CR2005020002', 9, 80000, 0, 80000, 100000, 20000, '', '2020-05-02', 2, '2020-05-02 19:12:26'),
(26, 'CR2005020003', 3, 100000, 0, 100000, 100000, 0, '', '2020-05-02', 2, '2020-05-02 19:13:05'),
(27, 'CR2005020004', 8, 50000, 0, 50000, 50000, 0, '', '2020-05-02', 2, '2020-05-02 19:13:34'),
(28, 'CR2005020005', 5, 50000, 0, 50000, 50000, 0, '', '2020-05-02', 2, '2020-05-02 19:14:06'),
(29, 'CR2005020006', 19, 100000, 0, 100000, 100000, 0, '', '2020-05-02', 2, '2020-05-02 19:14:40'),
(30, 'CR2005020007', 21, 50000, 0, 50000, 50000, 0, '', '2020-05-02', 2, '2020-05-02 19:29:50'),
(31, 'CR2005030001', 1, 50000, 0, 50000, 50000, 0, '', '2020-05-03', 2, '2020-05-03 21:12:31'),
(32, 'CR2005030002', 2, 80000, 0, 80000, 100000, 20000, '', '2020-05-03', 2, '2020-05-03 21:12:31'),
(33, 'CR2005030003', 3, 100000, 0, 100000, 100000, 0, '', '2020-05-03', 0, '2020-05-03 21:16:01'),
(36, 'CR2005030004', 4, 80000, 0, 80000, 80000, 0, '', '2020-05-03', 0, '2020-05-03 21:20:16'),
(37, 'CR2005030005', 5, 120000, 0, 120000, 120000, 0, '', '2020-05-03', 0, '2020-05-03 21:20:16'),
(40, 'CR2005040001', 6, 100000, 0, 100000, 100000, 0, '', '2020-05-04', 2, '2020-05-04 21:26:12'),
(41, 'CR2005040002', 7, 160000, 0, 160000, 160000, 0, '', '2020-05-04', 0, '2020-05-04 21:26:12'),
(44, 'CR2005040003', 8, 100000, 0, 100000, 100000, 0, '', '2020-05-04', 2, '2020-05-04 21:29:29'),
(45, 'CR2005040004', 9, 110000, 0, 110000, 110000, 0, '', '2020-05-04', 2, '2020-05-04 21:29:29'),
(46, 'CR2005040005', 21, 50000, 0, 50000, 50000, 0, '', '2020-05-04', 2, '2020-05-04 21:31:42'),
(47, 'CR2005040006', 24, 80000, 0, 80000, 80000, 0, '', '2020-05-04', 2, '2020-05-04 21:31:42'),
(48, 'CR2005050001', 13, 50000, 0, 50000, 50000, 0, '', '2020-05-05', 2, '2020-05-05 21:33:38'),
(49, 'CR2005050002', 14, 100000, 0, 100000, 100000, 0, '', '2020-05-05', 2, '2020-05-05 21:33:38'),
(50, 'CR2005050003', 25, 180000, 0, 180000, 180000, 0, '', '2020-05-05', 2, '2020-05-05 21:35:53'),
(51, 'CR2005050004', 20, 80000, 0, 80000, 100000, 20000, '', '2020-05-05', 2, '2020-05-05 21:35:53'),
(52, 'CR2005050006', 15, 80000, 0, 80000, 80000, 0, '', '2020-05-05', 2, '2020-05-05 21:35:53'),
(53, 'CR2005050005', 22, 50000, 0, 50000, 50000, 0, '', '2020-05-05', 2, '2020-05-05 21:35:53'),
(54, 'CR2005070001', 5, 120000, 0, 120000, 120000, 0, '', '2020-05-07', 2, '2020-05-07 21:41:31'),
(55, 'CR2005070002', 23, 100000, 0, 100000, 100000, 0, '', '2020-05-07', 2, '2020-05-07 21:41:31'),
(56, 'CR2005070003', 16, 80000, 0, 80000, 80000, 0, '', '2020-05-07', 2, '2020-05-07 21:41:31'),
(57, 'CR2005070004', 4, 60000, 0, 60000, 60000, 0, '', '2020-05-07', 2, '2020-05-07 21:41:31'),
(58, 'CR2005080001', 34, 120000, 0, 120000, 120000, 0, '', '2020-05-08', 2, '2020-06-08 22:16:23'),
(59, 'CR2005080002', 29, 50000, 0, 50000, 50000, 0, '', '2020-05-08', 2, '2020-05-08 22:16:23'),
(60, 'CR2005080003', 28, 80000, 0, 80000, 80000, 0, '', '2020-05-08', 2, '2020-05-08 22:16:23'),
(61, 'CR2005080004', 26, 90000, 0, 90000, 100000, 10000, '', '2020-05-08', 2, '2020-05-08 22:16:23'),
(62, 'CR2005080005', 2, 100000, 0, 100000, 100000, 0, '', '2020-05-08', 2, '2020-05-08 22:16:23'),
(63, 'CR2005090001', 27, 60000, 0, 60000, 60000, 0, '', '2020-05-09', 2, '2020-05-09 22:16:23'),
(64, 'CR2005090002', 7, 100000, 0, 100000, 100000, 0, '', '2020-05-09', 2, '2020-05-09 22:16:23'),
(65, 'CR2005090003', 1, 50000, 0, 50000, 50000, 0, '', '2020-05-09', 2, '2020-05-09 22:40:05'),
(66, 'CR2005090004', 9, 80000, 0, 80000, 80000, 0, '', '2020-05-09', 2, '2020-05-09 23:33:39'),
(67, 'CR2005100001', 4, 100000, 0, 100000, 100000, 0, '', '2020-05-10', 2, '2020-05-10 23:33:39'),
(68, 'CR2005100002', 5, 50000, 0, 50000, 50000, 0, '', '2020-05-10', 2, '2020-05-10 23:36:43'),
(69, 'CR2005100003', 6, 90000, 0, 90000, 90000, 0, '', '2020-05-10', 2, '2020-05-10 23:38:03'),
(70, 'CR2005100004', 15, 80000, 0, 80000, 80000, 0, '', '2020-05-10', 2, '2020-05-10 23:39:31'),
(71, 'CR2005100005', 23, 60000, 0, 60000, 60000, 0, '', '2020-05-10', 2, '2020-05-10 23:40:49'),
(72, 'CR2005100006', 8, 50000, 0, 50000, 50000, 0, '', '2020-05-10', 2, '2020-05-10 23:42:06'),
(73, 'CR2005120001', 21, 100000, 0, 100000, 100000, 0, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(74, 'CR2005120002', 24, 90000, 0, 90000, 100000, 10000, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(75, 'CR2005120003', 16, 70000, 0, 70000, 70000, 0, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(76, 'CR2005120004', 20, 110000, 0, 110000, 120000, 10000, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(77, 'CR2005120005', 10, 120000, 0, 120000, 120000, 0, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(78, 'CR2005120006', 12, 100000, 0, 100000, 100000, 0, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(79, 'CR2005120007', 4, 80000, 0, 80000, 80000, 0, '', '2020-05-12', 2, '2020-05-12 19:25:59'),
(80, 'CR2005130001', 6, 100000, 0, 100000, 100000, 0, '', '2020-05-13', 2, '2020-05-13 19:25:59'),
(81, 'CR2005130002', 17, 180000, 0, 180000, 200000, 20000, '', '2020-05-13', 2, '2020-05-13 19:25:59'),
(82, 'CR2005130003', 23, 120000, 0, 120000, 120000, 0, '', '2020-05-13', 2, '2020-05-13 19:25:59'),
(83, 'CR2005130004', 14, 80000, 0, 80000, 80000, 0, '', '2020-05-13', 2, '2020-05-13 19:25:59'),
(84, 'CR2005140001', 8, 50000, 0, 50000, 50000, 0, '', '2020-05-14', 2, '2020-05-14 19:36:42'),
(85, 'CR2005140002', 13, 50000, 0, 50000, 50000, 0, '', '2020-05-14', 2, '2020-05-14 19:36:42'),
(86, 'CR2005140003', 2, 60000, 0, 60000, 60000, 0, '', '2020-05-14', 2, '2020-05-14 19:36:42'),
(87, 'CR2005150001', 19, 50000, 0, 50000, 50000, 0, '', '2020-05-15', 2, '2020-05-15 19:36:42'),
(88, 'CR2005150002', 5, 100000, 0, 100000, 100000, 0, '', '2020-05-15', 2, '2020-05-15 19:36:42'),
(89, 'CR2005150003', 21, 130000, 0, 130000, 150000, 20000, '', '2020-05-15', 2, '2020-05-15 19:36:42'),
(90, 'CR2005150004', 30, 80000, 0, 80000, 80000, 0, '', '2020-05-15', 2, '2020-05-15 19:36:42'),
(91, 'CR2008190001', 24, 150000, 0, 150000, 200000, 50000, '', '2020-08-19', 2, '2020-08-19 12:07:08'),
(92, 'CR2008210001', 24, 80000, 0, 80000, 100000, 20000, '', '2020-08-21', 2, '2020-08-21 00:24:12'),
(93, 'CR2008210002', 21, 50000, 0, 50000, 50000, 0, '', '2020-08-21', 2, '2020-08-21 00:25:59'),
(94, 'CR2008280001', 13, 100000, 0, 100000, 100000, 0, '', '2020-08-28', 2, '2020-08-28 01:11:00'),
(95, 'CR2008280002', 15, 220000, 0, 220000, 250000, 30000, '', '2020-08-28', 2, '2020-08-28 01:13:46'),
(96, 'CR2008280003', 23, 85000, 0, 85000, 100000, 15000, '', '2020-08-28', 2, '2020-08-28 01:18:03'),
(97, 'CR2008300001', 29, 50000, 0, 50000, 50000, 0, '', '2020-08-30', 2, '2020-08-30 00:08:15'),
(98, 'CR2008300002', 3, 150000, 0, 150000, 150000, 0, '', '2020-08-30', 2, '2020-08-30 00:27:47'),
(99, 'CR2008310001', 2, 100000, 0, 100000, 100000, 0, '', '2020-08-31', 2, '2020-08-31 10:50:13'),
(100, 'CR2008310002', 34, 50000, 10, 45000, 50000, 5000, '', '2020-08-31', 2, '2020-08-31 13:51:28'),
(101, 'CR2009070001', 21, 200000, 0, 200000, 200000, 0, '', '2020-09-07', 2, '2020-09-07 15:33:46'),
(102, 'CR2009070002', 30, 200000, 0, 200000, 200000, 0, '', '2020-09-07', 2, '2020-09-07 15:46:48'),
(103, 'CR2009100001', 34, 100000, 0, 100000, 100000, 0, '', '2020-09-10', 2, '2020-09-10 14:38:43'),
(104, 'CR2009100002', 23, 100000, 0, 100000, 100000, 0, '', '2020-09-10', 2, '2020-09-10 14:39:15'),
(105, 'CR2009100003', 25, 50000, 0, 50000, 50000, 0, '', '2020-09-10', 2, '2020-09-10 14:40:44'),
(106, 'CR2009110001', 24, 100000, 0, 100000, 100000, 0, '', '2020-09-11', 2, '2020-09-11 22:04:56'),
(107, 'CR2009110002', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-11', 2, '2020-09-11 23:15:54'),
(108, 'CR2009110003', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-11', 2, '2020-09-11 23:16:10'),
(109, 'CR2009110004', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-11', 2, '2020-09-11 23:32:21'),
(110, 'CR2009110005', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-11', 2, '2020-09-11 23:49:09'),
(111, 'CR2009110006', NULL, 150000, 0, 150000, 150000, 0, '', '2020-09-11', 2, '2020-09-11 23:49:38'),
(112, 'CR2009120001', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-12', 2, '2020-09-12 00:30:50'),
(113, 'CR2009120002', NULL, 150000, 0, 150000, 150000, 0, '', '2020-09-12', 2, '2020-09-12 00:31:03'),
(114, 'CR2009120003', NULL, 150000, 0, 150000, 150000, 0, '', '2020-09-12', 2, '2020-09-12 00:31:13'),
(115, 'CR2009120004', NULL, 135000, 0, 135000, 135000, 0, '', '2020-09-12', 2, '2020-09-12 00:34:09'),
(116, 'CR2009120005', NULL, 135000, 0, 135000, 135000, 0, '', '2020-09-12', 2, '2020-09-12 00:34:38'),
(117, 'CR2009120006', NULL, 135000, 0, 135000, 135000, 0, '', '2020-09-12', 2, '2020-09-12 00:34:49'),
(118, 'CR2009120007', NULL, 135000, 0, 135000, 135000, 0, '', '2020-09-12', 2, '2020-09-12 00:35:26'),
(119, 'CR2009120008', 34, 100000, 0, 100000, 100000, 0, '', '2020-09-12', 2, '2020-09-12 00:38:14'),
(120, 'CR2009120009', NULL, 100000, 0, 100000, 100000, 0, '', '2020-09-12', 2, '2020-09-12 00:41:19'),
(121, 'CR2009120010', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-12', 2, '2020-09-12 01:00:48'),
(122, 'CR2009120011', 34, 150000, 0, 150000, 150000, 0, '', '2020-09-12', 2, '2020-09-12 01:46:46'),
(123, 'CR2009120012', 23, 100000, 0, 100000, 100000, 0, '', '2020-09-12', 2, '2020-09-12 02:33:40'),
(124, 'CR2009120013', NULL, 50000, 15, 42500, 45000, 2500, '', '2020-09-12', 2, '2020-09-12 02:38:44'),
(125, 'CR2009120014', 23, 250000, 0, 250000, 250000, 0, '', '2020-09-12', 2, '2020-09-12 02:52:45'),
(126, 'CR2009120015', NULL, 250000, 0, 250000, 250000, 0, '', '2020-09-12', 2, '2020-09-12 02:54:20'),
(127, 'CR2009120016', 22, 100000, 0, 100000, 100000, 0, '', '2020-09-12', 2, '2020-09-12 03:00:48'),
(128, 'CR2009120017', NULL, 100000, 0, 100000, 100000, 0, '', '2020-09-12', 2, '2020-09-12 03:04:40'),
(129, 'CR2009120018', 23, 180000, 0, 180000, 180000, 0, '', '2020-09-12', 2, '2020-09-12 03:06:09'),
(130, 'CR2009120019', NULL, 180000, 0, 180000, 180000, 0, '', '2020-09-12', 2, '2020-09-12 03:07:48'),
(131, 'CR2009120020', 24, 150000, 0, 150000, 150000, 0, '', '2020-09-12', 2, '2020-09-12 03:22:05'),
(132, 'CR2009120021', 21, 170000, 0, 170000, 200000, 30000, '', '2020-09-12', 2, '2020-09-12 03:24:54'),
(133, 'CR2009140001', 24, 150000, 10, 135000, 150000, 15000, '', '2020-09-14', 2, '2020-09-14 02:30:40'),
(134, 'CR2009290001', 5, 200000, 0, 200000, 200000, 0, '', '2020-09-29', 2, '2020-09-29 19:05:31'),
(135, 'CR2009290002', 2, 130000, 0, 130000, 150000, 20000, '', '2020-09-29', 2, '2020-09-29 19:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `user_id`) VALUES
(2, 1, 'in', '', 2, 4, '2020-01-21', '2020-01-21 20:30:58', 2),
(4, 4, 'in', '', 1, 2, '2020-01-21', '2020-01-21 20:38:10', 2),
(10, 5, 'out', 'hilang', NULL, 1, '2020-01-22', '2020-01-22 14:48:24', 2),
(12, 4, 'in', '', NULL, 3, '2020-01-22', '2020-01-22 14:51:27', 2),
(13, 4, 'out', 'habis', NULL, 2, '2020-01-22', '2020-01-22 14:51:49', 2),
(15, 4, 'out', 'habis', NULL, 2, '2020-01-22', '2020-01-22 14:53:21', 2),
(16, 4, 'in', '', 1, 2, '2020-01-22', '2020-01-22 14:54:01', 2),
(17, 4, 'out', 'kadaluarsa', NULL, 2, '2020-01-22', '2020-01-22 14:54:26', 2),
(22, 5, 'in', '', NULL, 2, '2020-02-06', '2020-02-06 21:58:37', 2),
(27, 4, 'in', '', 1, 2, '2020-02-19', '2020-02-19 17:19:30', NULL),
(32, 5, 'out', 'habis', NULL, 2, '2020-02-19', '2020-02-19 17:33:05', NULL),
(39, 5, 'in', '', 1, 2, '2020-04-12', '2020-04-12 22:33:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'toko B', '08123456789', 'jalan gajah mada', 'oil massage dan candle', '2019-11-06 08:54:35', '2019-11-18 03:03:17'),
(2, 'toko C', '081276589034', 'jln Gadjah Mada', 'lulur sariayu, dan latulip', '2019-11-06 08:55:59', '2019-11-18 03:03:49'),
(4, 'Toko A', '056121001', 'Jln Ahmad Yani Pontianak', NULL, '2019-11-13 11:19:47', '2019-11-13 05:20:10'),
(11, 'toko d', '0987665779', 'jln raya', 'aaaa', '2020-05-01 23:13:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `therapist_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`therapist_id`, `name`, `phone`, `gender`, `created`, `updated`) VALUES
(1, 'Nisa', '0800000001', 'P', '2020-08-28 00:26:24', '2020-08-28 00:33:34'),
(2, 'Riska', '08976453260', 'P', '2020-08-28 00:31:58', '2020-08-28 00:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`, `address`, `level`) VALUES
(2, 'rika nugraha', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'jln sungai raya dalam', 1),
(3, 'liaa', 'kasir', '29c748d4d8f4bd5cbc0f3f60cb7ed3d0', 'jln tanjung pura', 2),
(9, 'aa', 'bbbbb', '594f803b380a41396ed63dca39503542', 'aaaa', 2),
(14, 'tata', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'serdam', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_transaction`
--
ALTER TABLE `cart_transaction`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `item_stock`
--
ALTER TABLE `item_stock`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_ibfk_1` (`category_id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `therapist_id` (`therapist_id`);

--
-- Indexes for table `sale_transaction`
--
ALTER TABLE `sale_transaction`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `stock_ibfk_2` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`therapist_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `item_stock`
--
ALTER TABLE `item_stock`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `sale_transaction`
--
ALTER TABLE `sale_transaction`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `therapist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_transaction`
--
ALTER TABLE `cart_transaction`
  ADD CONSTRAINT `cart_transaction_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_transaction_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_transaction_ibfk_3` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD CONSTRAINT `sale_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `sale_detail_ibfk_2` FOREIGN KEY (`therapist_id`) REFERENCES `therapist` (`therapist_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_stock` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
