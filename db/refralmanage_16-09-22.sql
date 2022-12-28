-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 08:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `refralmanage`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_commission`
--

INSERT INTO `tb_commission` (`com_id`, `cus_id`, `cus_ref_id`, `com_amount`, `user_id`, `created`, `updated`) VALUES
(2, 7, 5, 15.00, 0, '2022-09-15 10:19:15', NULL),
(3, 9, 5, 20.00, 0, '2022-09-15 10:21:02', NULL);

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
(15, 11, 'Profile_details1.png', '2022-09-02 11:55:23', NULL),
(16, 11, 'localhost_ArdourFundly_mobile_authentication_changePassword(Samsung_Galaxy_S8+)_(1).png', '2022-09-02 11:55:23', NULL),
(17, 11, 'localhost_ArdourFundly_mobile_authentication(Samsung_Galaxy_S8+).png', '2022-09-02 11:55:23', NULL);

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
(1, 1, 1, 4, '2022-07-02 12:40:37', '2022-09-07 04:05:39'),
(2, 1, 4, 4, '2022-07-02 12:40:37', '2022-09-07 04:05:44'),
(3, 2, 1, 4, '2022-07-07 08:41:54', '2022-09-07 04:05:46'),
(4, 2, 4, 4, '2022-07-07 08:41:54', '2022-09-07 04:05:48'),
(5, 3, 4, 4, '2022-07-07 09:15:37', '2022-09-07 04:05:51'),
(6, 3, 5, 4, '2022-07-07 09:15:37', '2022-09-07 04:05:53'),
(7, 4, 11, 4, '2022-09-07 06:42:17', NULL),
(8, 5, 11, 4, '2022-09-07 06:45:00', NULL),
(9, 6, 11, 4, '2022-09-07 06:49:35', NULL);

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
(1, 'Gauraj Info tech PVT LTD', 9968796351, 'gayraj123@gmail.com', '804 K-10 atlantis grand 804 K-10', 'https://gaurajinfotech.com/', 'jbjjkhui', 'Screenshot_(1)6.png', 'Screenshot_(2)6.png', 'video6.mp4', 4, '2022-06-23 11:56:27', '2022-09-07 04:01:34'),
(4, 'Clicer web tech', 8200394894, 'clickers123@gmail.com', 'asavdvd', 'https://clickerswebtech.com/', 'sdvf  ffb ', 'Defaultone.png', 'default_-_Copy2.png', 'video9.mp4', 4, '2022-06-23 12:14:29', '2022-09-07 04:01:37'),
(5, 'Vertical plast', 9874561234, 'vertcalplast789@gmail.com', 'kutch mandvi surat', 'https://vertical.com/', 'hkbhjvhj', 'repairman-doing-air-conditioner-service_(2)1.jpg', '', '', 4, '2022-06-24 13:53:44', '2022-09-07 04:01:39'),
(6, 'Devshiv mega coprp', 9978745866, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 4, '2022-06-28 10:17:54', '2022-09-07 04:01:41'),
(7, 'Gauraj Info tech PVT LTD 1', 9968796351, 'gayraj123@gmail.com', '804 K-10 atlantis grand 804 K-10', 'https://gaurajinfotech.com/', 'jbjjkhui', 'Screenshot_(1)6.png', 'Screenshot_(2)6.png', 'video6.mp4', 4, '2022-06-23 11:56:27', '2022-09-07 04:01:44'),
(8, 'Clicer web tech 1', 8200394894, 'clickers123@gmail.com', 'asavdvd', 'https://clickerswebtech.com/', 'sdvf  ffb ', 'Defaultone.png', 'default_-_Copy2.png', 'video9.mp4', 4, '2022-06-23 12:14:29', '2022-09-07 04:01:46'),
(9, 'Vertical plast 1', 9874561234, 'vertcalplast789@gmail.com', 'kutch mandvi surat', 'https://vertical.com/', 'hkbhjvhj', 'repairman-doing-air-conditioner-service_(2)1.jpg', '', '', 4, '2022-06-24 13:53:44', '2022-09-07 04:01:48'),
(10, 'Devshiv mega coprp 1', 9978745866, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 4, '2022-06-28 10:17:54', '2022-09-07 04:01:50'),
(11, 'Test', 9987789855, 'tset123@gmail.com', 'dwsdssd', 'https://tesr.com/', 'dadasdsad', 'The-Difference-Types-of-Web-Hosting-21.jpg', 'indian-rupee-sign-flat-white-icons-on-round-color-backgrounds-6-bonus-icons-included-2CB6YHK-removebg-preview1.png', '', 4, '2022-09-02 11:55:23', '2022-09-07 04:01:54'),
(12, 'Devshiv mega coprp 2', 9978745868, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 4, '2022-06-28 10:17:54', NULL),
(13, 'Test 3', 9987789857, 'tset123@gmail.com', 'dwsdssd', 'https://tesr.com/', 'dadasdsad', 'The-Difference-Types-of-Web-Hosting-21.jpg', 'indian-rupee-sign-flat-white-icons-on-round-color-backgrounds-6-bonus-icons-included-2CB6YHK-removebg-preview1.png', '', 4, '2022-09-02 11:55:23', NULL);

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
(1, 'Suthar Bhavin Pravinbhai', 'sutharbhavin29@gmail.com', 'employee', 'Admin@1234', 4, '2022-09-07 04:02:16', '2022-09-07 04:02:16'),
(2, 'Jaimin Parekh', 'jaimin123@gmail.com', 'employee', 'c1e1c1944c1b5dc24cbf7edd83168d9f', 4, '2022-09-07 04:02:19', '2022-09-07 04:02:19'),
(3, 'Jagdish Parmar', 'jagdish123@gmail.com', 'Worker', '0b3bc9ce555f07d127c6da44337e364f', 4, '2022-09-07 04:02:21', '2022-09-07 04:02:21'),
(4, 'Test', 'test123@gmail.com', 'Worker', '5c428d8875d2948607f3e3fe134d71b4', 4, '2022-09-07 06:42:17', NULL),
(5, 'Test', 'test123@gmail.com', 'Worker', '3691308f2a4c2f6983f2880d32e29c84', 4, '2022-09-07 06:45:00', NULL),
(6, 'Test', 'test123@gmail.com', 'Worker', '5c428d8875d2948607f3e3fe134d71b4', 4, '2022-09-07 06:49:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `cus_id` int(11) NOT NULL,
  `customer_code` varchar(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone_no` bigint(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(100) DEFAULT NULL,
  `cus_ref_id` int(11) DEFAULT NULL,
  `referral_check` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`cus_id`, `customer_code`, `customer_name`, `customer_address`, `customer_phone_no`, `customer_email`, `customer_password`, `cus_ref_id`, `referral_check`, `user_id`, `created`, `updated`) VALUES
(4, 'CUS1001', 'Nai Arnav Jitendrabhai', 'bjvbjbh', 8254749614, 'arnavnai78@gmail.com', 'b9a83fdd268ba0233fe5649349fd9d60', 0, 0, 4, '2022-07-08 05:24:25', '2022-09-15 12:10:58'),
(5, 'CUS1002', 'Patel puja Karanbhai', 'bkhjhjg', 8747859666, 'puja8877@gmail.com', '2070fdbde6d459e8c55bd81e5c5e802e', 4, 1, 1, '2022-07-09 10:53:15', '2022-09-15 10:02:53'),
(6, 'CUS1003', 'Suthar Rucha Anilbhai', 'kiijijij', 8879458596, 'rucha123@gmail.com', '2098aeb77dc9a9b2959e31427e857658', 5, 1, 1, '2022-07-11 05:14:24', '2022-09-15 09:58:44'),
(7, 'CUS1004', 'Suthar bhavna rameshbhai', 'bhbhbkhb', 9515357580, 'bhavna258@gmail.com', '884a473d1e6e500ec6c25563397845bb', 5, 1, 4, '2022-09-07 05:39:48', '2022-09-15 09:58:46'),
(9, 'CUS1005', 'Nai Nilesh Laxmanbhai tt', 'Nera Ranip arjun aashram', 8524567891, 'nilesh123@gmail.com', '7313239dd5b60ab607884faef20d0f01', 5, 1, 4, '2022-09-12 06:37:32', '2022-09-15 09:58:56');

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
(1, 1, 'SUTHAR BHAVIN PRAVINBHAI', 21474836478888, 'SBIN00091', 'SOJITRA', NULL, NULL, '2022-06-28 06:49:48', '2022-06-28 07:17:06'),
(6, 5, 'Patel puja Karanbhai', 35033734709, 'SBIN000911', 'kheda', 'vjvghvjg@bh', NULL, '2022-09-05 10:25:16', '2022-09-15 10:05:04');

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
(16, 6, 6, '2022-07-11 05:14:24', NULL),
(23, 5, 1, '2022-09-05 09:51:58', NULL),
(24, 5, 5, '2022-09-05 09:51:58', NULL),
(25, 5, 6, '2022-09-05 09:51:58', NULL),
(38, 7, 10, '2022-09-07 05:41:09', NULL),
(39, 7, 11, '2022-09-07 05:41:09', NULL),
(46, 9, 13, '2022-09-14 05:22:05', NULL),
(47, 4, 1, '2022-09-15 12:10:58', NULL),
(48, 4, 4, '2022-09-15 12:10:58', NULL),
(49, 4, 5, '2022-09-15 12:10:58', NULL);

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
  `phone_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `ur_id`, `name`, `phone_no`, `email`, `password`, `created`, `updated`) VALUES
(4, 1, 'Suthar Bhavin P', 8200394896, 'bhavin29796@gmail.com', '26dc318942685872cf79c5eb96c9bb13', '2022-09-06 10:07:53', '2022-09-09 11:41:24'),
(5, 1, 'Fidaali Vahora', 7448854885, 'fbvohra95@gmail.com', '26dc318942685872cf79c5eb96c9bb13', '2022-09-06 11:29:18', '2022-09-09 11:43:11');

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
(1, 1, 'company', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(2, 1, 'customer', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(3, 1, 'user', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(4, 1, 'user_role', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(5, 1, 'commission', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 07:23:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`role_id`, `role_name`, `created`, `updated`) VALUES
(1, 'Admin', '2022-09-12 04:26:49', NULL);

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
  ADD KEY `tb_user_ibfk_1` (`ur_id`);

--
-- Indexes for table `tb_user_permission`
--
ALTER TABLE `tb_user_permission`
  ADD PRIMARY KEY (`up_id`),
  ADD KEY `tb_user_permission_ibfk_1` (`role_id`);

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
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_company_images`
--
ALTER TABLE `tb_company_images`
  MODIFY `cm_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_company_link_user`
--
ALTER TABLE `tb_company_link_user`
  MODIFY `clu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_company_master`
--
ALTER TABLE `tb_company_master`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_company_user_master`
--
ALTER TABLE `tb_company_user_master`
  MODIFY `cum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_customer_bank_accounts`
--
ALTER TABLE `tb_customer_bank_accounts`
  MODIFY `cba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_customer_map_company`
--
ALTER TABLE `tb_customer_map_company`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user_permission`
--
ALTER TABLE `tb_user_permission`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `tb_user_role` (`role_id`);

--
-- Constraints for table `tb_user_permission`
--
ALTER TABLE `tb_user_permission`
  ADD CONSTRAINT `tb_user_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_user_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
