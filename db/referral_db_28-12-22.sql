-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 07:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `referral_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_commission`
--

CREATE TABLE `tb_commission` (
  `com_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cus_ref_id` int(11) DEFAULT NULL,
  `com_amount` double(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_commission`
--

INSERT INTO `tb_commission` (`com_id`, `cus_id`, `cus_ref_id`, `com_amount`, `user_id`, `created`, `updated`) VALUES
(1, 5, 4, 120.00, 0, '2022-09-22 05:14:17', NULL),
(2, 5, 4, 30.00, 0, '2022-09-22 14:29:14', NULL),
(3, 5, 4, 20.00, 0, '2022-09-28 11:28:29', NULL),
(4, 5, 4, 30.00, 0, '2022-09-28 11:52:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_company_images`
--

CREATE TABLE `tb_company_images` (
  `cm_img_id` int(11) NOT NULL,
  `cm_id` int(11) NOT NULL,
  `cm_img_name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_company_images`
--

INSERT INTO `tb_company_images` (`cm_img_id`, `cm_id`, `cm_img_name`, `created`, `updated`) VALUES
(13, 6, 'Screenshot_(7).png', '2022-06-28 13:16:34', NULL),
(14, 11, 'Screenshot_(7)1.png', '2022-09-16 05:23:13', NULL),
(15, 11, 'Screenshot_(8).png', '2022-09-16 05:23:13', NULL),
(16, 11, 'Screenshot_(9).png', '2022-09-16 05:23:13', NULL),
(17, 13, 'Screenshot_(22).png', '2022-09-22 06:03:15', NULL),
(18, 13, 'Screenshot_(23).png', '2022-09-22 06:03:15', NULL),
(19, 13, 'Screenshot_(24).png', '2022-09-22 06:03:15', NULL),
(20, 14, '', '2022-09-22 06:36:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_company_link_user`
--

CREATE TABLE `tb_company_link_user` (
  `clu_id` int(11) NOT NULL,
  `cum_id` int(11) NOT NULL,
  `cm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_company_link_user`
--

INSERT INTO `tb_company_link_user` (`clu_id`, `cum_id`, `cm_id`, `user_id`, `created`, `updated`) VALUES
(1, 1, 1, 1, '2022-07-02 12:40:37', NULL),
(2, 1, 4, 1, '2022-07-02 12:40:37', NULL),
(3, 2, 1, 1, '2022-07-07 08:41:54', NULL),
(4, 2, 4, 1, '2022-07-07 08:41:54', NULL),
(5, 3, 4, 1, '2022-07-07 09:15:37', NULL),
(6, 3, 5, 1, '2022-07-07 09:15:37', NULL),
(7, 4, 11, 1, '2022-09-16 05:41:14', NULL),
(8, 5, 12, 5, '2022-09-16 09:22:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_company_master`
--

CREATE TABLE `tb_company_master` (
  `cm_id` int(11) NOT NULL,
  `company_name` varchar(155) NOT NULL,
  `company_phone_no` bigint(20) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_address` text NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `company_logo` text NOT NULL,
  `company_banner` text NOT NULL,
  `company_video` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_company_master`
--

INSERT INTO `tb_company_master` (`cm_id`, `company_name`, `company_phone_no`, `company_email`, `company_address`, `company_website`, `notes`, `company_logo`, `company_banner`, `company_video`, `user_id`, `created`, `updated`) VALUES
(1, 'Gauraj Info tech PVT LTD', 9968796351, 'gayraj123@gmail.com', '804 K-10 atlantis grand 804 K-10', 'https://gaurajinfotech.com/', 'jbjjkhui', 'Screenshot_(1)6.png', 'Screenshot_(2)6.png', 'video6.mp4', 1, '2022-06-23 11:56:27', '2022-07-04 06:38:58'),
(4, 'Clicer web tech', 8200394894, 'clickers123@gmail.com', 'asavdvd', 'https://clickerswebtech.com/', 'sdvf  ffb ', 'Defaultone.png', 'default_-_Copy2.png', 'video9.mp4', 1, '2022-06-23 12:14:29', '2022-06-24 13:54:09'),
(5, 'Vertical plast', 9874561234, 'vertcalplast789@gmail.com', 'kutch mandvi surat', 'https://vertical.com/', 'hkbhjvhj', 'repairman-doing-air-conditioner-service_(2)1.jpg', '', '', 1, '2022-06-24 13:53:44', NULL),
(6, 'Devshiv mega coprp', 9978745866, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 1, '2022-06-28 10:17:54', '2022-06-28 13:16:34'),
(7, 'Gauraj Info tech PVT LTD 1', 9968796351, 'gayraj123@gmail.com', '804 K-10 atlantis grand 804 K-10', 'https://gaurajinfotech.com/', 'jbjjkhui', 'Screenshot_(1)6.png', 'Screenshot_(2)6.png', 'video6.mp4', 1, '2022-06-23 11:56:27', '2022-07-14 05:50:54'),
(8, 'Clicer web tech 1', 8200394894, 'clickers123@gmail.com', 'asavdvd', 'https://clickerswebtech.com/', 'sdvf  ffb ', 'Defaultone.png', 'default_-_Copy2.png', 'video9.mp4', 1, '2022-06-23 12:14:29', '2022-07-14 05:50:58'),
(9, 'Vertical plast 1', 9874561234, 'vertcalplast789@gmail.com', 'kutch mandvi surat', 'https://vertical.com/', 'hkbhjvhj', 'repairman-doing-air-conditioner-service_(2)1.jpg', '', '', 1, '2022-06-24 13:53:44', '2022-07-14 05:51:01'),
(10, 'Devshiv mega coprp 1', 9978745866, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 1, '2022-06-28 10:17:54', '2022-07-14 05:51:04'),
(11, 'New for test', 9979825123, 'gmaiak@gnail.com', 'hhjkhjh', 'https://newest.com/', '', 'lwp.jpg', 'devshiv1.png', '', 1, '2022-09-16 05:23:13', NULL),
(12, 'Test fida', 7405474884, 'fbvohra95@gmail.com', 'Kosamba', 'https://www.fidaalivahora.com', 'Testing ', '', '', '', 5, '2022-09-16 09:20:50', NULL),
(14, 'TESTED', 9988774455, 'tested@gmail.com', 'ss', 'https://tested.com/', 'dddf', 'devshiv3.png', 'bb.jpg', 'whatsapp-video-2021-09-16-at-94535-pm_4m9GkZTt_aogJ.mp4', 1, '2022-09-22 06:11:29', '2022-09-22 06:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_company_user_master`
--

CREATE TABLE `tb_company_user_master` (
  `cum_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_company_user_master`
--

INSERT INTO `tb_company_user_master` (`cum_id`, `name`, `email`, `designation`, `password`, `user_id`, `created`, `updated`) VALUES
(1, 'Suthar Bhavin Pravinbhai', 'sutharbhavin29@gmail.com', 'employee', 'Admin@1234', 1, '2022-06-30 11:01:12', NULL),
(2, 'Jaimin Parekh', 'jaimin123@gmail.com', 'employee', 'c1e1c1944c1b5dc24cbf7edd83168d9f', 1, '2022-07-06 12:00:49', NULL),
(3, 'Jagdish Parmar', 'jagdish123@gmail.com', 'Worker', '0b3bc9ce555f07d127c6da44337e364f', 1, '2022-07-07 09:15:37', NULL),
(4, 'New test ', 'newtsert123@gmn.com', 'employee', '12bce374e7be15142e8172f668da00d8', 1, '2022-09-16 05:41:14', NULL),
(5, 'Fida', 'fida@gmail.com', 'Ceo', '0b3bc9ce555f07d127c6da44337e364f', 5, '2022-09-16 09:22:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `cus_id` int(11) NOT NULL,
  `ur_id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `customer_code` varchar(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_phone_no` varchar(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(100) DEFAULT NULL,
  `cus_ref_id` int(11) DEFAULT NULL,
  `referral_check` int(11) NOT NULL DEFAULT 0,
  `refer_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` enum('admin','customer') NOT NULL,
  `convert_cus` int(11) DEFAULT NULL,
  `convert_cus_date` datetime DEFAULT NULL,
  `is_referral_counted` tinyint(1) NOT NULL DEFAULT 0,
  `is_bought_counted` tinyint(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`cus_id`, `ur_id`, `plan_id`, `customer_code`, `customer_name`, `customer_address`, `customer_phone_no`, `customer_email`, `customer_password`, `cus_ref_id`, `referral_check`, `refer_date`, `user_id`, `user_type`, `convert_cus`, `convert_cus_date`, `is_referral_counted`, `is_bought_counted`, `created`, `updated`) VALUES
(4, 2, 1, 'CUS1001', 'Nai Arnav Jitendrabhai', 'bjvbjbh', '+918200971432', 'arnavnai78@gmail.com', 'b9a83fdd268ba0233fe5649349fd9d60', NULL, 0, NULL, 1, 'admin', NULL, NULL, 0, 0, '2022-07-08 05:24:25', '2022-12-13 17:39:22'),
(5, 2, 1, 'CUS1002', 'Patel puja Karanbhai', 'bkhjhjg', '8747859666', 'puja8877@gmail.com', '2070fdbde6d459e8c55bd81e5c5e802e', 4, 1, '2022-10-06 11:25:52', 1, 'admin', NULL, NULL, 0, 0, '2022-07-09 10:53:15', '2022-12-13 17:39:22'),
(6, 2, 1, 'CUS1003', 'Suthar Rucha Anilbhai', 'kiijijij', '8879458596', 'rucha123@gmail.com', '2098aeb77dc9a9b2959e31427e857658', 4, 1, '2022-10-07 12:25:20', 1, 'admin', 1, '2022-11-07 18:07:00', 0, 0, '2022-07-11 05:14:24', '2022-12-13 17:39:22'),
(7, 2, 1, 'CUS1004', 'Soni Mohit', 'Vadodra', '8460008885', 'test123@gmial.com', NULL, 4, 1, '2022-10-10 19:25:50', 1, 'admin', NULL, NULL, 0, 0, '2022-09-16 05:57:41', '2022-12-13 17:39:22'),
(9, 2, 1, 'CUS1005', 'Nihar soni', 'Test', '9722104104', 'soni@gamil.com', NULL, 4, 1, NULL, 4, 'admin', NULL, '2022-10-21 16:19:54', 0, 0, '2022-10-20 02:48:54', '2022-12-13 17:39:22'),
(10, 2, 1, 'CUS1006', 'Tejas Soni', 'Test', '1122112211', 'soni@gmail.com', NULL, 4, 1, '2022-10-21 09:48:30', 4, 'admin', 1, '2022-10-21 16:27:42', 0, 0, '2022-10-21 04:18:30', '2022-12-13 17:39:22'),
(11, 2, 1, 'CUS1007', 'Aadhya Soni', 'Test', '1122332211', 'test@gmail.com', NULL, 4, 1, NULL, 6, 'admin', NULL, NULL, 0, 0, '2022-10-21 14:05:36', '2022-12-13 17:39:22'),
(12, 2, 1, 'CUS1008', 'Amarjit Singh ', 'USA', '2032193685', 'amarji@gmail.com', NULL, 4, 1, '2022-10-22 10:19:47', 4, 'admin', NULL, NULL, 0, 0, '2022-10-22 16:49:47', '2022-12-13 17:39:22'),
(13, 2, 1, 'CUS1001', 'Nasrin Patel', 'abc,bharuch\r\n', '+919904707610', 'nasu@gmail.com', NULL, 7, 1, NULL, 13, 'admin', 1, '2022-11-07 17:32:35', 0, 0, '2022-11-01 10:42:38', '2022-12-13 17:39:22'),
(14, 2, 1, 'CUS1002', 'Nihar Soni', 'Test', '9722103103', 'soni123@gmail.com', NULL, 4, 1, '2022-11-01 10:05:43', 4, 'admin', NULL, NULL, 0, 0, '2022-11-01 16:35:43', '2022-12-13 17:39:22'),
(15, 2, 1, 'CUS1003', 'Akta Soni', 'Test', '9879276347', 'akta@gmail.com', NULL, 4, 1, '2022-11-05 11:59:32', 4, 'admin', 1, '2022-11-05 12:03:29', 0, 0, '2022-11-05 06:29:32', '2022-12-13 17:39:22'),
(16, 2, 1, 'CUS1004', 'fidaali', '', '+917405474884', 'fbvohra95@gmail.com', NULL, 4, 1, '2022-11-05 03:35:40', 4, 'admin', NULL, NULL, 0, 0, '2022-11-05 10:05:40', '2022-12-20 06:31:05'),
(19, 2, 1, 'CUS1007', 'test', '\r\nxyz,surat', '7896541230', 'a@gmail.com', NULL, 7, 1, '2022-11-05 10:53:31', 7, 'admin', 1, '2022-11-12 13:30:02', 0, 0, '2022-11-05 17:23:31', '2022-12-13 17:39:22'),
(22, 2, 1, 'CUS1001', 'n', 'abc,bharuch\r\nxyz,surat', '7891236054', 'est@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', 1, '2022-11-08 18:55:20', 0, 0, '2022-11-08 13:23:32', '2022-12-13 17:39:22'),
(23, 2, 1, 'CUS1001', 'xyz opq', 'abc,bharuch\r\nxyz,surat', '9903214568', 't@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', 1, '2022-11-12 13:29:50', 0, 0, '2022-11-12 07:57:05', '2022-12-13 17:39:22'),
(24, 2, 1, 'CUS1001', 'nasu', 'abc,bharuchhv\r\nxyz,surat', '9903217412', 'test5@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-12 07:57:52', '2022-12-13 17:39:22'),
(25, 2, 1, 'CUS1001', 'xyz opq', 'abc,bharuch\r\nxyz,surat', '8903214560', 'efg@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-12 08:13:04', '2022-12-13 17:39:22'),
(26, 2, 1, 'CUS1001', 'code test', 'abc,bharuch\r\nxyz,surat', '1236547890', 'code@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-24 15:50:11', '2022-12-13 17:39:22'),
(27, 2, 1, 'CUS1001', 'gbna', 'abc,bharuch\r\nxyz,surat', '918200971430', 'tes1t@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-25 09:03:18', '2022-12-13 17:39:22'),
(28, 2, 1, 'CUS1001', 'ddddddd', 'abc,bharuch\r\nxyz,surat', '+911237896054', 'dd@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-25 09:15:51', '2022-12-13 17:39:22'),
(29, 2, 1, 'CUS1001', 'cod1', '', '+918200959418', 'cod1@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-25 17:26:57', '2022-12-13 17:39:22'),
(30, 2, 1, 'CUS1001', 'jklmn', 'abc,bharuch\r\nxyz,surat', '+918200971432', 'testo@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-26 07:13:06', '2022-12-13 17:39:22'),
(31, 2, 1, 'CUS1001', 'hhhk', 'abc,bharuch\r\nxyz,surat', '+919903214561', 'onwtest@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-26 07:29:51', '2022-12-13 17:39:22'),
(33, 2, 1, 'CUS1001', 'ghjghj', 'abc,bharuch\r\nxyz,surat', '+916431972000', 'tegfhst@gmail.com', NULL, 30, 1, '2022-11-26 01:38:12', 30, 'admin', 1, '2022-11-29 16:33:03', 0, 0, '2022-11-26 08:08:12', '2022-12-13 17:39:22'),
(34, 2, 1, 'CUS1001', 'sdf', '', '+917539518260', 'cod22@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-26 08:36:05', '2022-12-13 17:39:22'),
(35, 2, 1, 'CUS1001', 'tryg', '', '+917890123654', 'cod112@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-26 08:46:04', '2022-12-13 17:39:22'),
(36, 2, 1, 'CUS1001', 'hjhg', '', '+917985641320', 'fg@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-26 09:30:41', '2022-12-13 17:39:22'),
(37, 2, 1, 'CUS1001', 'tft', '', '+91120365470', 'fgl@gmail.com', NULL, NULL, 1, NULL, 13, 'admin', NULL, NULL, 0, 0, '2022-11-26 09:46:10', '2022-12-13 17:39:22'),
(38, 2, 1, 'CUS1001', 'abc', 'abc,bharuch\r\nxyz,surat', '7869541233', 'testg@gmail.com', NULL, 13, 1, '2022-12-10 03:42:33', 13, '', NULL, NULL, 0, 0, '2022-12-10 10:12:33', '2022-12-13 17:39:22'),
(39, 2, 1, 'CUS1001', 'sunday', 'abc,bharuch\r\nxyz,surat', '+9199032114540', 'txszdest@gmail.com', NULL, 4, 1, NULL, 4, '', NULL, NULL, 0, 0, '2022-12-11 10:32:42', '2022-12-13 17:39:22'),
(40, 2, 1, 'CUS1001', 'Nasrin ', 'hbhub', '+919903214560', 'testghvvttcc@gmail.com', NULL, 4, 1, '2022-12-11 05:50:42', 4, '', NULL, NULL, 0, 0, '2022-12-11 12:20:42', '2022-12-13 17:39:22'),
(41, 2, 1, 'CUS1001', 'gfgg', NULL, '+919032145600', 'tecvccggst@gmail.com', NULL, 4, 1, '2022-12-13 04:18:16', 4, '', NULL, NULL, 0, 0, '2022-12-13 10:48:17', '2022-12-13 17:39:22'),
(43, 0, NULL, '', 'register', NULL, '+919904707610', 'nasu@gmail.com', NULL, NULL, 0, NULL, 0, 'admin', NULL, NULL, 0, 0, '2022-12-20 09:48:14', NULL),
(44, 0, NULL, '', 'xyz opq', NULL, '+919904707610', 'test@gmail.com', NULL, NULL, 0, NULL, 0, 'admin', NULL, NULL, 0, 0, '2022-12-20 09:49:33', NULL),
(45, 0, NULL, '', 'xyz opq', NULL, '+917452036586', 'tejghjist@gmail.com', NULL, NULL, 0, NULL, 0, 'admin', NULL, NULL, 0, 0, '2022-12-20 10:15:16', NULL),
(46, 0, NULL, '', 'xyz opq', NULL, '+912190321456', 'tesjhkhkt@gmail.com', NULL, NULL, 0, NULL, 0, 'admin', NULL, NULL, 0, 0, '2022-12-20 10:16:17', NULL),
(47, 0, NULL, '', 'xyz opq', NULL, '+911203650478', 'st@gmail.com', NULL, NULL, 0, NULL, 0, 'admin', NULL, NULL, 0, 0, '2022-12-20 10:19:24', NULL),
(48, 0, NULL, '', ' all done', NULL, '+918200971431', 'alltest@gmail.com', NULL, NULL, 0, NULL, 0, 'admin', NULL, NULL, 0, 0, '2022-12-20 10:36:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_bank_accounts`
--

CREATE TABLE `tb_customer_bank_accounts` (
  `cba_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` bigint(14) NOT NULL,
  `ifsc_code` varchar(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `paypal_id` varchar(150) DEFAULT NULL,
  `stripe_id` varchar(150) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer_bank_accounts`
--

INSERT INTO `tb_customer_bank_accounts` (`cba_id`, `cus_id`, `account_name`, `account_number`, `ifsc_code`, `branch_name`, `paypal_id`, `stripe_id`, `created`, `updated`) VALUES
(1, 1, 'SUTHAR BHAVIN PRAVINBHAI', 21474836478888, 'SBIN00091', 'SOJITRA', 'gpay123456', 'stripeid456', '2022-06-28 06:49:48', '2022-09-15 04:00:12'),
(2, 4, 'Nai Arnav Jeetbhaui', 35033734709, 'SBIN000911', 'VVN', '', '', '2022-09-20 05:00:51', NULL),
(3, 9, 'Test', 1234567890, '124', 'Test', 'test', 'Test', '2022-10-21 14:03:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_map_company`
--

CREATE TABLE `tb_customer_map_company` (
  `cmp_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `cm_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer_map_company`
--

INSERT INTO `tb_customer_map_company` (`cmp_id`, `cus_id`, `cm_id`, `created`, `updated`) VALUES
(15, 5, 5, '2022-07-09 10:53:15', NULL),
(16, 6, 6, '2022-07-11 05:14:24', NULL),
(17, 7, 11, '2022-09-16 05:57:41', NULL),
(18, 4, 1, '2022-09-20 05:00:51', NULL),
(21, 10, 1, '2022-10-21 04:18:30', NULL),
(22, 9, 1, '2022-10-21 14:03:07', NULL),
(24, 12, 1, '2022-10-22 16:49:47', NULL),
(25, 14, 1, '2022-11-01 16:35:43', NULL),
(26, 11, 1, '2022-11-01 18:06:18', NULL),
(27, 15, 1, '2022-11-05 06:29:32', NULL),
(28, 16, 1, '2022-11-05 10:05:40', NULL),
(32, 19, 4, '2022-11-05 17:23:31', NULL),
(35, 22, 1, '2022-11-08 13:23:32', NULL),
(36, 23, 4, '2022-11-12 07:57:05', NULL),
(37, 24, 4, '2022-11-12 07:57:52', NULL),
(38, 13, 1, '2022-11-12 07:58:33', NULL),
(39, 25, 5, '2022-11-12 08:13:04', NULL),
(40, 26, 4, '2022-11-24 15:50:12', NULL),
(41, 27, 4, '2022-11-25 09:03:19', NULL),
(42, 28, 5, '2022-11-25 09:15:51', NULL),
(43, 29, 4, '2022-11-25 17:26:57', NULL),
(44, 30, 5, '2022-11-26 07:13:06', NULL),
(45, 31, 1, '2022-11-26 07:29:51', NULL),
(47, 33, 4, '2022-11-26 08:08:12', NULL),
(49, 34, 4, '2022-11-26 08:36:05', NULL),
(50, 35, 4, '2022-11-26 08:46:05', NULL),
(51, 36, 4, '2022-11-26 09:30:41', NULL),
(52, 37, 4, '2022-11-26 09:46:10', NULL),
(53, 38, 1, '2022-12-10 10:12:33', NULL),
(55, 39, 4, '2022-12-11 10:36:16', NULL),
(56, 40, 4, '2022-12-11 12:20:43', NULL),
(57, 41, 1, '2022-12-13 10:48:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_referral`
--

CREATE TABLE `tb_customer_referral` (
  `cr_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_phone_no` bigint(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer_referral`
--

INSERT INTO `tb_customer_referral` (`cr_id`, `cus_id`, `customer_name`, `customer_address`, `customer_phone_no`, `customer_email`, `created`, `updated`, `user_id`) VALUES
(3, 4, 'Nai Nilesh Laxmanbhai', 'sssssss', 8877445599, 'nilesh123@gmail.com', '2022-07-08 06:14:34', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_ref_company`
--

CREATE TABLE `tb_customer_ref_company` (
  `crc_id` int(11) NOT NULL,
  `cr_id` int(11) NOT NULL,
  `cm_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer_ref_company`
--

INSERT INTO `tb_customer_ref_company` (`crc_id`, `cr_id`, `cm_id`, `created`, `updated`) VALUES
(3, 3, 1, '2022-07-08 08:51:45', NULL),
(4, 3, 4, '2022-07-08 08:51:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer_ref_con`
--

CREATE TABLE `tb_customer_ref_con` (
  `crc_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `cus_ref_total_amt` double(10,2) NOT NULL,
  `cus_con_total_amt` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL COMMENT 'customer referral count + customer convert count',
  `total_customer_ref` int(11) DEFAULT NULL,
  `total_customer_con` int(11) DEFAULT NULL,
  `cus_ref_id` text DEFAULT NULL,
  `cus_con_id` text DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_customer_ref_con`
--

INSERT INTO `tb_customer_ref_con` (`crc_id`, `cus_id`, `plan_id`, `cus_ref_total_amt`, `cus_con_total_amt`, `total`, `total_customer_ref`, `total_customer_con`, `cus_ref_id`, `cus_con_id`, `entry_date`, `created`, `updated`) VALUES
(1, 4, 1, 5.00, 5.00, 10.00, 5, 1, NULL, NULL, '2022-10-22', '2022-10-22 05:04:15', NULL),
(2, 4, 1, 6.00, 5.00, 11.00, 6, 1, NULL, NULL, '2022-10-27', '2022-10-27 02:04:29', NULL),
(3, 4, 1, 6.00, 5.00, 11.00, 6, 1, NULL, NULL, '2022-10-31', '2022-10-30 13:00:03', NULL),
(4, 4, 1, 6.00, 5.00, 11.00, 6, 1, NULL, NULL, '2022-10-31', '2022-10-31 00:47:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_email_template`
--

CREATE TABLE `tb_email_template` (
  `et_id` int(11) NOT NULL,
  `email_for` varchar(255) NOT NULL,
  `email_subject` text NOT NULL,
  `email` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan`
--

CREATE TABLE `tb_plan` (
  `plan_id` int(11) NOT NULL,
  `ref_con_fee` double(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_plan`
--

INSERT INTO `tb_plan` (`plan_id`, `ref_con_fee`, `created`, `updated`) VALUES
(1, 5.00, '2022-10-17 09:58:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan_det`
--

CREATE TABLE `tb_plan_det` (
  `plan_det_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `ref_days_from` int(11) NOT NULL DEFAULT 0,
  `ref_days_to` int(11) NOT NULL DEFAULT 0,
  `ref_fee_per_wise` double(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_plan_det`
--

INSERT INTO `tb_plan_det` (`plan_det_id`, `plan_id`, `ref_days_from`, `ref_days_to`, `ref_fee_per_wise`, `created`, `updated`) VALUES
(1, 1, 0, 20, 1.00, '2022-10-17 09:58:08', NULL),
(2, 1, 21, 40, 1.25, '2022-10-17 09:58:08', NULL),
(3, 1, 41, 60, 1.50, '2022-10-17 09:58:08', NULL),
(4, 1, 61, 80, 2.00, '2022-10-17 09:58:08', NULL),
(5, 1, 81, 100, 2.25, '2022-10-17 09:58:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `pro_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_rate` double(10,2) NOT NULL,
  `product_commission` double(10,2) NOT NULL,
  `product_description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pro_id`, `product_name`, `product_code`, `product_rate`, `product_commission`, `product_description`, `created`, `updated`) VALUES
(6, 'WEB HOSTING', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(7, 'WEB HOSTING1', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(8, 'WEB HOSTING2', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(9, 'WEB HOSTING4', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(10, 'WEB HOSTING5', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(11, 'WEB HOSTING6', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(12, 'WEB HOSTING7', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL),
(13, 'WEB HOSTING8', 'GO10011', 15000.00, 10.00, 'dhdh', '2022-06-29 12:39:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_company`
--

CREATE TABLE `tb_product_company` (
  `pro_comp_id` int(11) NOT NULL,
  `cm_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product_company`
--

INSERT INTO `tb_product_company` (`pro_comp_id`, `cm_id`, `pro_id`, `created`, `updated`) VALUES
(23, 1, 6, '2022-06-29 12:39:40', NULL),
(24, 1, 7, '2022-06-29 12:39:40', NULL),
(25, 1, 8, '2022-07-04 10:47:54', NULL),
(26, 1, 9, '2022-07-04 10:48:55', NULL),
(27, 1, 10, '2022-06-29 12:39:40', NULL),
(28, 1, 11, '2022-06-29 12:39:40', NULL),
(29, 1, 12, '2022-07-04 10:47:54', NULL),
(30, 1, 13, '2022-07-04 10:48:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_images`
--

CREATE TABLE `tb_product_images` (
  `pro_img_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_img_name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product_images`
--

INSERT INTO `tb_product_images` (`pro_img_id`, `pro_id`, `pro_img_name`, `created`, `updated`) VALUES
(19, 6, '6151fdd721a9e.png', '2022-06-29 12:39:40', NULL),
(20, 7, '6151fdd721a9e.png', '2022-06-29 12:39:40', NULL),
(21, 8, '6151fdd721a9e.png', '2022-07-04 10:49:48', NULL),
(22, 9, '6151fdd721a9e.png', '2022-07-04 10:49:48', NULL),
(23, 10, '6151fdd721a9e.png', '2022-06-29 12:39:40', NULL),
(24, 11, '6151fdd721a9e.png', '2022-06-29 12:39:40', NULL),
(25, 12, '6151fdd721a9e.png', '2022-07-04 10:49:48', NULL),
(26, 13, '6151fdd721a9e.png', '2022-07-04 10:49:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quotation`
--

CREATE TABLE `tb_quotation` (
  `qut_id` int(11) NOT NULL,
  `cm_id` int(11) NOT NULL,
  `qut_code` varchar(10) NOT NULL,
  `qut_subject` varchar(255) NOT NULL,
  `qut_cus_id` int(11) NOT NULL,
  `qut_add` text DEFAULT NULL,
  `qut_created` date NOT NULL,
  `qut_expired` date NOT NULL,
  `qut_status` enum('pending','cancel','confirm') NOT NULL,
  `qut_discount_type` int(11) NOT NULL COMMENT '1 = flat, 2 = discount',
  `qut_discount_figure` double(10,2) NOT NULL,
  `qut_discount_amount` double(10,2) NOT NULL,
  `qut_tax_type` varchar(100) NOT NULL,
  `qut_tax_rate` int(11) NOT NULL,
  `qut_sub_total` double(10,2) NOT NULL,
  `qut_grand_total` double(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_quotation`
--

INSERT INTO `tb_quotation` (`qut_id`, `cm_id`, `qut_code`, `qut_subject`, `qut_cus_id`, `qut_add`, `qut_created`, `qut_expired`, `qut_status`, `qut_discount_type`, `qut_discount_figure`, `qut_discount_amount`, `qut_tax_type`, `qut_tax_rate`, `qut_sub_total`, `qut_grand_total`, `user_id`, `created`, `updated`) VALUES
(1, 4, 'QUOTE1001', 'For buy product from clickers web tech', 4, 'D-8 Suvana appartment ', '2022-07-14', '2022-07-22', 'pending', 1, 10.00, 10.00, 'capital_gains_10_per', 15, 150.00, 155.00, 1, '2022-07-14 09:11:54', NULL),
(2, 8, 'QUOTE1002', 'For buy product from clickers web tech two', 5, 'dd', '2022-07-14', '2022-07-22', 'confirm', 1, 2.00, 2.00, 'no_tax', 0, 10.00, 8.00, 1, '2022-07-14 10:42:59', NULL),
(3, 6, 'QUOTE1003', 'For buy product from clickers web tech three', 6, '', '2022-07-14', '2022-07-22', 'cancel', 2, 10.00, 25.00, 'no_tax', 0, 250.00, 225.00, 1, '2022-07-14 10:48:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quotation_product`
--

CREATE TABLE `tb_quotation_product` (
  `qut_pro_id` int(11) NOT NULL,
  `qut_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `qut_item_name` varchar(100) NOT NULL,
  `qut_qty_hrs` int(11) NOT NULL,
  `qut_unit_price` double(10,2) NOT NULL,
  `qut_sub_total_item` double(10,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_quotation_product`
--

INSERT INTO `tb_quotation_product` (`qut_pro_id`, `qut_id`, `cus_id`, `qut_item_name`, `qut_qty_hrs`, `qut_unit_price`, `qut_sub_total_item`, `created`, `updated`) VALUES
(1, 1, 4, 'Webhosting', 1, 150.00, 150.00, '2022-07-14 14:41:54', NULL),
(2, 2, 5, 'ABC', 1, 10.00, 10.00, '2022-07-14 16:12:59', NULL),
(3, 3, 6, 'swf', 1, 250.00, 250.00, '2022-07-14 16:18:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `ur_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('admin','referral') NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `ur_id`, `name`, `phone_no`, `email`, `password`, `user_type`, `created`, `updated`) VALUES
(1, 1, 'Suthar Bhavin', '8200394893', 'admin123@gmail.com', '26dc318942685872cf79c5eb96c9bb13', 'admin', '2022-06-22 09:45:51', '2022-09-10 13:05:41'),
(4, 1, 'Mohit Soni', '8460008884', 'sonimohitr@gmail.com', '26dc318942685872cf79c5eb96c9bb13', 'admin', '2022-07-20 14:17:33', NULL),
(5, 1, 'Fidaali Vora', '7405474884', 'fbvohra95@gmail.com', 'c773b0987409797f04b1aeee9091bf02', 'admin', '2022-07-20 14:17:33', NULL),
(6, 1, 'Nasrin Patel', '+919904707610', 'nasu@gmail.com', 'b4f7cd60ef4924be421118b39f60ce44', 'admin', '2022-07-20 14:17:33', '2022-11-26 05:42:31'),
(8, 1, 'Nasu', '+918200971432', 'nasu@gmail.com', 'bdc33f6e3050269df8ed98c2bc4ae8ec', 'admin', '2022-07-20 14:17:33', '2022-11-26 05:51:30'),
(13, 1, 'admincod', '+918200959418', 'admin@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'admin', '2022-11-25 17:55:19', '2022-11-25 18:25:20'),
(14, 1, 'dec', '+918200971431', 'tip@gmail.com', 'bca47c0066c1ea6a9d3ed28e963f58cc', 'admin', '2022-12-13 15:28:58', '2022-12-13 15:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_permission`
--

CREATE TABLE `tb_user_permission` (
  `up_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `view` tinyint(4) NOT NULL,
  `create_all` tinyint(4) NOT NULL,
  `edit_all` tinyint(4) NOT NULL,
  `delete_all` tinyint(4) NOT NULL,
  `import_all` tinyint(4) NOT NULL,
  `export_all` tinyint(4) NOT NULL,
  `view_all` tinyint(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_permission`
--

INSERT INTO `tb_user_permission` (`up_id`, `role_id`, `module_name`, `view`, `create_all`, `edit_all`, `delete_all`, `import_all`, `export_all`, `view_all`, `created`, `updated`) VALUES
(1, 1, 'company', 1, 1, 1, 1, 0, 0, 0, '2022-09-10 13:20:09', NULL),
(2, 1, 'customer', 1, 1, 1, 1, 0, 0, 0, '2022-09-10 13:20:09', NULL),
(3, 1, 'user', 1, 1, 1, 1, 0, 0, 0, '2022-09-10 13:20:09', NULL),
(4, 1, 'user_role', 1, 1, 1, 1, 0, 0, 0, '2022-09-10 13:20:09', NULL),
(5, 1, 'email_temp', 1, 1, 1, 1, 0, 0, 0, '2022-09-15 04:12:45', '2022-10-17 10:01:53'),
(6, 2, 'company', 0, 0, 0, 0, 0, 0, 0, '2022-09-30 12:55:27', '2022-10-17 08:20:26'),
(7, 2, 'customer', 1, 1, 1, 1, 0, 0, 0, '2022-09-30 12:55:27', NULL),
(8, 2, 'user', 0, 0, 0, 0, 0, 0, 0, '2022-09-30 12:55:27', '2022-10-17 08:20:41'),
(9, 2, 'user_role', 0, 0, 0, 0, 0, 0, 0, '2022-09-30 12:55:27', '2022-10-17 11:13:10'),
(10, 2, 'email_temp', 0, 0, 0, 0, 0, 0, 0, '2022-09-30 12:55:27', '2022-10-17 10:02:01'),
(11, 1, 'plan', 1, 1, 1, 1, 0, 0, 0, '2022-10-17 08:21:44', NULL),
(12, 2, 'plan', 0, 0, 0, 0, 0, 0, 0, '2022-10-17 08:21:44', '2022-10-17 11:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`role_id`, `role_name`, `created`, `updated`) VALUES
(1, 'Admin', '2022-09-10 13:20:09', NULL),
(2, 'Referral', '2022-09-30 12:55:27', '2022-11-01 18:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_commission`
--
ALTER TABLE `tb_commission`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tb_company_images`
--
ALTER TABLE `tb_company_images`
  ADD PRIMARY KEY (`cm_img_id`);

--
-- Indexes for table `tb_company_link_user`
--
ALTER TABLE `tb_company_link_user`
  ADD PRIMARY KEY (`clu_id`);

--
-- Indexes for table `tb_company_master`
--
ALTER TABLE `tb_company_master`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `tb_company_user_master`
--
ALTER TABLE `tb_company_user_master`
  ADD PRIMARY KEY (`cum_id`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_customer_bank_accounts`
--
ALTER TABLE `tb_customer_bank_accounts`
  ADD PRIMARY KEY (`cba_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `tb_customer_map_company`
--
ALTER TABLE `tb_customer_map_company`
  ADD PRIMARY KEY (`cmp_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `cm_id` (`cm_id`);

--
-- Indexes for table `tb_customer_referral`
--
ALTER TABLE `tb_customer_referral`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `tb_customer_ref_company`
--
ALTER TABLE `tb_customer_ref_company`
  ADD PRIMARY KEY (`crc_id`);

--
-- Indexes for table `tb_email_template`
--
ALTER TABLE `tb_email_template`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `tb_plan`
--
ALTER TABLE `tb_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tb_plan_det`
--
ALTER TABLE `tb_plan_det`
  ADD PRIMARY KEY (`plan_det_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_product_company`
--
ALTER TABLE `tb_product_company`
  ADD PRIMARY KEY (`pro_comp_id`),
  ADD KEY `cm_id` (`cm_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  ADD PRIMARY KEY (`pro_img_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  ADD PRIMARY KEY (`qut_id`),
  ADD KEY `cm_id` (`cm_id`),
  ADD KEY `qut_cus_id` (`qut_cus_id`);

--
-- Indexes for table `tb_quotation_product`
--
ALTER TABLE `tb_quotation_product`
  ADD PRIMARY KEY (`qut_pro_id`),
  ADD KEY `qut_id` (`qut_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `ur_id` (`ur_id`);

--
-- Indexes for table `tb_user_permission`
--
ALTER TABLE `tb_user_permission`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_commission`
--
ALTER TABLE `tb_commission`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_company_images`
--
ALTER TABLE `tb_company_images`
  MODIFY `cm_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_company_link_user`
--
ALTER TABLE `tb_company_link_user`
  MODIFY `clu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_company_master`
--
ALTER TABLE `tb_company_master`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_company_user_master`
--
ALTER TABLE `tb_company_user_master`
  MODIFY `cum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_customer_bank_accounts`
--
ALTER TABLE `tb_customer_bank_accounts`
  MODIFY `cba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_customer_map_company`
--
ALTER TABLE `tb_customer_map_company`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_customer_referral`
--
ALTER TABLE `tb_customer_referral`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_customer_ref_company`
--
ALTER TABLE `tb_customer_ref_company`
  MODIFY `crc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_email_template`
--
ALTER TABLE `tb_email_template`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_plan`
--
ALTER TABLE `tb_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_plan_det`
--
ALTER TABLE `tb_plan_det`
  MODIFY `plan_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_product_company`
--
ALTER TABLE `tb_product_company`
  MODIFY `pro_comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  MODIFY `pro_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  MODIFY `qut_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_quotation_product`
--
ALTER TABLE `tb_quotation_product`
  MODIFY `qut_pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user_permission`
--
ALTER TABLE `tb_user_permission`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_customer_map_company`
--
ALTER TABLE `tb_customer_map_company`
  ADD CONSTRAINT `tb_customer_map_company_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `tb_customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_customer_map_company_ibfk_2` FOREIGN KEY (`cm_id`) REFERENCES `tb_company_master` (`cm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product_company`
--
ALTER TABLE `tb_product_company`
  ADD CONSTRAINT `tb_product_company_ibfk_1` FOREIGN KEY (`cm_id`) REFERENCES `tb_company_master` (`cm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_product_company_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `tb_product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  ADD CONSTRAINT `tb_product_images_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tb_product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  ADD CONSTRAINT `tb_quotation_ibfk_1` FOREIGN KEY (`cm_id`) REFERENCES `tb_company_master` (`cm_id`),
  ADD CONSTRAINT `tb_quotation_ibfk_2` FOREIGN KEY (`qut_cus_id`) REFERENCES `tb_customer` (`cus_id`);

--
-- Constraints for table `tb_quotation_product`
--
ALTER TABLE `tb_quotation_product`
  ADD CONSTRAINT `tb_quotation_product_ibfk_1` FOREIGN KEY (`qut_id`) REFERENCES `tb_quotation` (`qut_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
