-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 06:35 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `long` double DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `countries`:
--

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso2`, `iso3`, `flag`, `lat`, `long`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'afghanistan', 'AF', 'AFG', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_the_Taliban.svg/320px-Flag_of_the_Taliban.svg.png', 33, 65, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:26', NULL),
(2, 'albania', 'AL', 'ALB', 'https://flagcdn.com/w320/al.png', 41, 20, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:27', NULL),
(3, 'algeria', 'DZ', 'DZA', 'https://flagcdn.com/w320/dz.png', 28, 3, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:28', NULL),
(4, 'american samoa', 'AS', 'ASM', 'https://flagcdn.com/w320/as.png', -14.33333333, -170, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:28', NULL),
(5, 'andorra', 'AD', 'AND', 'https://flagcdn.com/w320/ad.png', 42.5, 1.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:29', NULL),
(6, 'angola', 'AO', 'AGO', 'https://flagcdn.com/w320/ao.png', -12.5, 18.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:30', NULL),
(7, 'anguilla', 'AI', 'AIA', 'https://flagcdn.com/w320/ai.png', 18.25, -63.16666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:31', NULL),
(8, 'antarctica', 'AQ', 'ATA', 'https://flagcdn.com/w320/aq.png', -90, 0, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:32', NULL),
(9, 'antigua and barbuda', 'AG', 'ATG', 'https://flagcdn.com/w320/ag.png', 17.05, -61.8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:32', NULL),
(10, 'argentina', 'AR', 'ARG', 'https://flagcdn.com/w320/ar.png', -34, -64, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:33', NULL),
(11, 'armenia', 'AM', 'ARM', 'https://flagcdn.com/w320/am.png', 40, 45, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:34', NULL),
(12, 'aruba', 'AW', 'ABW', 'https://flagcdn.com/w320/aw.png', 12.5, -69.96666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:35', NULL),
(13, 'australia', 'AU', 'AUS', 'https://flagcdn.com/w320/au.png', -27, 133, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:36', NULL),
(14, 'austria', 'AT', 'AUT', 'https://flagcdn.com/w320/at.png', 47.33333333, 13.33333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:37', NULL),
(15, 'azerbaijan', 'AZ', 'AZE', 'https://flagcdn.com/w320/az.png', 40.5, 47.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:30:37', NULL),
(16, 'bahamas', 'BS', 'BHS', 'https://flagcdn.com/w320/bs.png', 24.25, -76, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:09', NULL),
(17, 'bahrain', 'BH', 'BHR', 'https://flagcdn.com/w320/bh.png', 26, 50.55, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:10', NULL),
(18, 'bangladesh', 'BD', 'BGD', 'https://flagcdn.com/w320/bd.png', 24, 90, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:11', NULL),
(19, 'barbados', 'BB', 'BRB', 'https://flagcdn.com/w320/bb.png', 13.16666666, -59.53333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:12', NULL),
(20, 'belarus', 'BY', 'BLR', 'https://flagcdn.com/w320/by.png', 53, 28, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:12', NULL),
(21, 'belgium', 'BE', 'BEL', 'https://flagcdn.com/w320/be.png', 50.83333333, 4, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:13', NULL),
(22, 'belize', 'BZ', 'BLZ', 'https://flagcdn.com/w320/bz.png', 17.25, -88.75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:14', NULL),
(23, 'benin', 'BJ', 'BEN', 'https://flagcdn.com/w320/bj.png', 9.5, 2.25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:15', NULL),
(24, 'bermuda', 'BM', 'BMU', 'https://flagcdn.com/w320/bm.png', 32.33333333, -64.75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:15', NULL),
(25, 'bhutan', 'BT', 'BTN', 'https://flagcdn.com/w320/bt.png', 27.5, 90.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:16', NULL),
(26, 'bolivia', 'BO', 'BOL', 'https://flagcdn.com/w320/bo.png', -17, -65, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:17', NULL),
(27, 'bosnia and herzegovina', 'BA', 'BIH', 'https://flagcdn.com/w320/ba.png', 44, 18, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:18', NULL),
(28, 'botswana', 'BW', 'BWA', 'https://flagcdn.com/w320/bw.png', -22, 24, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:19', NULL),
(29, 'bouvet island', 'BV', 'BVT', 'https://flagcdn.com/w320/bv.png', -54.43333333, 3.4, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:19', NULL),
(30, 'brazil', 'BR', 'BRA', 'https://flagcdn.com/w320/br.png', -10, -55, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:20', NULL),
(31, 'british indian ocean territory', 'IO', 'IOT', 'https://flagcdn.com/w320/io.png', -6, 71.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:21', NULL),
(32, 'brunei', 'BN', 'BRN', 'https://flagcdn.com/w320/bn.png', 4.5, 114.66666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:22', NULL),
(33, 'bulgaria', 'BG', 'BGR', 'https://flagcdn.com/w320/bg.png', 43, 25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:23', NULL),
(34, 'burkina faso', 'BF', 'BFA', 'https://flagcdn.com/w320/bf.png', 13, -2, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:23', NULL),
(35, 'burundi', 'BI', 'BDI', 'https://flagcdn.com/w320/bi.png', -3.5, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:24', NULL),
(36, 'cambodia', 'KH', 'KHM', 'https://flagcdn.com/w320/kh.png', 13, 105, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:25', NULL),
(37, 'cameroon', 'CM', 'CMR', 'https://flagcdn.com/w320/cm.png', 6, 12, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:26', NULL),
(38, 'canada', 'CA', 'CAN', 'https://flagcdn.com/w320/ca.png', 60, -95, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:26', NULL),
(39, 'cape verde', 'CV', 'CPV', 'https://flagcdn.com/w320/cv.png', 16, -24, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:27', NULL),
(40, 'cayman islands', 'KY', 'CYM', 'https://flagcdn.com/w320/ky.png', 19.5, -80.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:28', NULL),
(41, 'central african republic', 'CF', 'CAF', 'https://flagcdn.com/w320/cf.png', 7, 21, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:29', NULL),
(42, 'chad', 'TD', 'TCD', 'https://flagcdn.com/w320/td.png', 15, 19, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:30', NULL),
(43, 'chile', 'CL', 'CHL', 'https://flagcdn.com/w320/cl.png', -30, -71, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:30', NULL),
(44, 'china', 'CN', 'CHN', 'https://flagcdn.com/w320/cn.png', 35, 105, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:31', NULL),
(45, 'christmas island', 'CX', 'CXR', 'https://flagcdn.com/w320/cx.png', -10.5, 105.66666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:32', NULL),
(46, 'cocos (keeling) islands', 'CC', 'CCK', 'https://flagcdn.com/w320/cc.png', -12.5, 96.83333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:33', NULL),
(47, 'colombia', 'CO', 'COL', 'https://flagcdn.com/w320/co.png', 4, -72, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:34', NULL),
(48, 'comoros', 'KM', 'COM', 'https://flagcdn.com/w320/km.png', -12.16666666, 44.25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:35', NULL),
(49, 'republic of the congo', 'CG', 'COG', 'https://flagcdn.com/w320/cg.png', -1, 15, 'active', '2022-08-19 06:50:11', '2022-08-30 05:15:10', NULL),
(50, 'dr congo', 'CD', 'COD', 'https://flagcdn.com/w320/cd.png', 0, 25, 'active', '2022-08-19 06:50:11', '2022-08-30 05:15:10', NULL),
(51, 'cook islands', 'CK', 'COK', 'https://flagcdn.com/w320/ck.png', -21.23333333, -159.76666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:37', NULL),
(52, 'costa rica', 'CR', 'CRI', 'https://flagcdn.com/w320/cr.png', 10, -84, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:38', NULL),
(53, 'ivory coast', 'CI', 'CIV', 'https://flagcdn.com/w320/ci.png', 8, -5, 'active', '2022-08-19 06:50:11', '2022-08-30 05:09:58', NULL),
(54, 'croatia', 'HR', 'HRV', 'https://flagcdn.com/w320/hr.png', 45.16666666, 15.5, 'active', '2022-08-19 06:50:11', '2022-08-30 05:09:58', NULL),
(55, 'cuba', 'CU', 'CUB', 'https://flagcdn.com/w320/cu.png', 21.5, -80, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:40', NULL),
(56, 'cyprus', 'CY', 'CYP', 'https://flagcdn.com/w320/cy.png', 35, 33, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:41', NULL),
(57, 'czech republic', 'CZ', 'CZE', 'https://flagcdn.com/w320/cz.png', 49.75, 15.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:42', NULL),
(58, 'denmark', 'DK', 'DNK', 'https://flagcdn.com/w320/dk.png', 56, 10, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:42', NULL),
(59, 'djibouti', 'DJ', 'DJI', 'https://flagcdn.com/w320/dj.png', 11.5, 43, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:43', NULL),
(60, 'dominica', 'DM', 'DMA', 'https://flagcdn.com/w320/dm.png', 15.41666666, -61.33333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:44', NULL),
(61, 'dominican republic', 'DO', 'DOM', 'https://flagcdn.com/w320/do.png', 19, -70.66666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:45', NULL),
(62, 'timor-Leste', 'TL', 'TLS', 'https://flagcdn.com/w320/tl.png', -8.83333333, 125.91666666, 'active', '2022-08-19 06:50:11', '2022-08-30 05:09:59', NULL),
(63, 'ecuador', 'EC', 'ECU', 'https://flagcdn.com/w320/ec.png', -2, -77.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:46', NULL),
(64, 'egypt', 'EG', 'EGY', 'https://flagcdn.com/w320/eg.png', 27, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:47', NULL),
(65, 'el salvador', 'SV', 'SLV', 'https://flagcdn.com/w320/sv.png', 13.83333333, -88.91666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:48', NULL),
(66, 'equatorial guinea', 'GQ', 'GNQ', 'https://flagcdn.com/w320/gq.png', 2, 10, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:49', NULL),
(67, 'eritrea', 'ER', 'ERI', 'https://flagcdn.com/w320/er.png', 15, 39, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:50', NULL),
(68, 'estonia', 'EE', 'EST', 'https://flagcdn.com/w320/ee.png', 59, 26, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:50', NULL),
(69, 'ethiopia', 'ET', 'ETH', 'https://flagcdn.com/w320/et.png', 8, 38, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:51', NULL),
(70, 'external territories of australia', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-19 06:50:11', '2022-08-19 06:50:11', NULL),
(71, 'falkland islands', 'FK', 'FLK', 'https://flagcdn.com/w320/fk.png', -51.75, -59, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:53', NULL),
(72, 'faroe islands', 'FO', 'FRO', 'https://flagcdn.com/w320/fo.png', 62, -7, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:53', NULL),
(73, 'fiji', 'FJ', 'FJI', 'https://flagcdn.com/w320/fj.png', -18, 175, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:01', NULL),
(74, 'finland', 'FI', 'FIN', 'https://flagcdn.com/w320/fi.png', 64, 26, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:55', NULL),
(75, 'france', 'FR', 'FRA', 'https://flagcdn.com/w320/fr.png', 46, 2, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:56', NULL),
(76, 'french guiana', 'GF', 'GUF', 'https://flagcdn.com/w320/gf.png', 4, -53, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:57', NULL),
(77, 'french polynesia', 'PF', 'PYF', 'https://flagcdn.com/w320/pf.png', -15, -140, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:57', NULL),
(78, 'french southern and antarctic lands', 'TF', 'ATF', 'https://flagcdn.com/w320/tf.png', -49.25, 69.167, 'active', '2022-08-19 06:50:11', '2022-08-30 05:18:54', NULL),
(79, 'gabon', 'GA', 'GAB', 'https://flagcdn.com/w320/ga.png', -1, 11.75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:33:59', NULL),
(80, 'gambia', 'GM', 'GMB', 'https://flagcdn.com/w320/gm.png', 13.46666666, -16.56666666, 'active', '2022-08-19 06:50:11', '2022-08-30 05:11:55', NULL),
(81, 'georgia', 'GE', 'GEO', 'https://flagcdn.com/w320/ge.png', 42, 43.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:01', NULL),
(82, 'germany', 'DE', 'DEU', 'https://flagcdn.com/w320/de.png', 51, 9, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:01', NULL),
(83, 'ghana', 'GH', 'GHA', 'https://flagcdn.com/w320/gh.png', 8, -2, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:02', NULL),
(84, 'gibraltar', 'GI', 'GIB', 'https://flagcdn.com/w320/gi.png', 36.13333333, -5.35, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:03', NULL),
(85, 'greece', 'GR', 'GRC', 'https://flagcdn.com/w320/gr.png', 39, 22, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:04', NULL),
(86, 'greenland', 'GL', 'GRL', 'https://flagcdn.com/w320/gl.png', 72, -40, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:05', NULL),
(87, 'grenada', 'GD', 'GRD', 'https://flagcdn.com/w320/gd.png', 12.11666666, -61.66666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:05', NULL),
(88, 'guadeloupe', 'GP', 'GLP', 'https://flagcdn.com/w320/gp.png', 16.25, -61.583333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:06', NULL),
(89, 'guam', 'GU', 'GUM', 'https://flagcdn.com/w320/gu.png', 13.46666666, 144.78333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:07', NULL),
(90, 'guatemala', 'GT', 'GTM', 'https://flagcdn.com/w320/gt.png', 15.5, -90.25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:08', NULL),
(91, 'guernsey', 'GG', 'GGY', 'https://flagcdn.com/w320/gg.png', 49.46666666, -2.58333333, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:03', NULL),
(92, 'guinea', 'GN', 'GIN', 'https://flagcdn.com/w320/gn.png', 11, -10, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:09', NULL),
(93, 'guinea-bissau', 'GW', 'GNB', 'https://flagcdn.com/w320/gw.png', 12, -15, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:10', NULL),
(94, 'guyana', 'GY', 'GUY', 'https://flagcdn.com/w320/gy.png', 5, -59, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:11', NULL),
(95, 'haiti', 'HT', 'HTI', 'https://flagcdn.com/w320/ht.png', 19, -72.41666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:12', NULL),
(96, 'heard island and mcDonald islands', 'HM', 'HMD', 'https://flagcdn.com/w320/hm.png', -53.1, 72.51666666, 'active', '2022-08-19 06:50:11', '2022-08-30 05:31:14', NULL),
(97, 'honduras', 'HN', 'HND', 'https://flagcdn.com/w320/hn.png', 15, -86.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:13', NULL),
(98, 'hong kong', 'HK', 'HKG', 'https://flagcdn.com/w320/hk.png', 22.267, 114.188, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:05', NULL),
(99, 'hungary', 'HU', 'HUN', 'https://flagcdn.com/w320/hu.png', 47, 20, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:15', NULL),
(100, 'iceland', 'IS', 'ISL', 'https://flagcdn.com/w320/is.png', 65, -18, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:16', NULL),
(101, 'india', 'IN', 'IND', 'https://flagcdn.com/w320/in.png', 20, 77, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:16', NULL),
(102, 'indonesia', 'ID', 'IDN', 'https://flagcdn.com/w320/id.png', -5, 120, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:17', NULL),
(103, 'iran', 'IR', 'IRN', 'https://flagcdn.com/w320/ir.png', 32, 53, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:18', NULL),
(104, 'iraq', 'IQ', 'IRQ', 'https://flagcdn.com/w320/iq.png', 33, 44, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:19', NULL),
(105, 'ireland', 'IE', 'IRL', 'https://flagcdn.com/w320/ie.png', 53, -8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:20', NULL),
(106, 'israel', 'IL', 'ISR', 'https://flagcdn.com/w320/il.png', 31.47, 35.13, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:20', NULL),
(107, 'italy', 'IT', 'ITA', 'https://flagcdn.com/w320/it.png', 42.83333333, 12.83333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:21', NULL),
(108, 'jamaica', 'JM', 'JAM', 'https://flagcdn.com/w320/jm.png', 18.25, -77.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:22', NULL),
(109, 'japan', 'JP', 'JPN', 'https://flagcdn.com/w320/jp.png', 36, 138, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:23', NULL),
(110, 'jersey', 'JE', 'JEY', 'https://flagcdn.com/w320/je.png', 49.25, -2.16666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:24', NULL),
(111, 'jordan', 'JO', 'JOR', 'https://flagcdn.com/w320/jo.png', 31, 36, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:24', NULL),
(112, 'kazakhstan', 'KZ', 'KAZ', 'https://flagcdn.com/w320/kz.png', 48, 68, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:25', NULL),
(113, 'kenya', 'KE', 'KEN', 'https://flagcdn.com/w320/ke.png', 1, 38, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:26', NULL),
(114, 'kiribati', 'KI', 'KIR', 'https://flagcdn.com/w320/ki.png', 1.41666666, 173, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:27', NULL),
(115, 'north korea', 'KP', 'PRK', 'https://flagcdn.com/w320/kp.png', 40, 127, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:06', NULL),
(116, 'south korea', 'KR', 'KOR', 'https://flagcdn.com/w320/kr.png', 37, 127.5, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:06', NULL),
(117, 'kuwait', 'KW', 'KWT', 'https://flagcdn.com/w320/kw.png', 29.5, 45.75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:29', NULL),
(118, 'kyrgyzstan', 'KG', 'KGZ', 'https://flagcdn.com/w320/kg.png', 41, 75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:30', NULL),
(119, 'laos', 'LA', 'LAO', 'https://flagcdn.com/w320/la.png', 18, 105, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:31', NULL),
(120, 'latvia', 'LV', 'LVA', 'https://flagcdn.com/w320/lv.png', 57, 25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:31', NULL),
(121, 'lebanon', 'LB', 'LBN', 'https://flagcdn.com/w320/lb.png', 33.83333333, 35.83333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:32', NULL),
(122, 'lesotho', 'LS', 'LSO', 'https://flagcdn.com/w320/ls.png', -29.5, 28.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:33', NULL),
(123, 'liberia', 'LR', 'LBR', 'https://flagcdn.com/w320/lr.png', 6.5, -9.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:34', NULL),
(124, 'libya', 'LY', 'LBY', 'https://flagcdn.com/w320/ly.png', 25, 17, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:35', NULL),
(125, 'liechtenstein', 'LI', 'LIE', 'https://flagcdn.com/w320/li.png', 47.26666666, 9.53333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:35', NULL),
(126, 'lithuania', 'LT', 'LTU', 'https://flagcdn.com/w320/lt.png', 56, 24, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:36', NULL),
(127, 'luxembourg', 'LU', 'LUX', 'https://flagcdn.com/w320/lu.png', 49.75, 6.16666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:37', NULL),
(128, 'macau', 'MO', 'MAC', 'https://flagcdn.com/w320/mo.png', 22.16666666, 113.55, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:07', NULL),
(129, 'north macedonia', 'MK', 'MKD', 'https://flagcdn.com/w320/mk.png', 41.83333333, 22, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:08', NULL),
(130, 'madagascar', 'MG', 'MDG', 'https://flagcdn.com/w320/mg.png', -20, 47, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:39', NULL),
(131, 'malawi', 'MW', 'MWI', 'https://flagcdn.com/w320/mw.png', -13.5, 34, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:40', NULL),
(132, 'malaysia', 'MY', 'MYS', 'https://flagcdn.com/w320/my.png', 2.5, 112.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:41', NULL),
(133, 'maldives', 'MV', 'MDV', 'https://flagcdn.com/w320/mv.png', 3.25, 73, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:42', NULL),
(134, 'mali', 'ML', 'MLI', 'https://flagcdn.com/w320/ml.png', 17, -4, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:42', NULL),
(135, 'malta', 'MT', 'MLT', 'https://flagcdn.com/w320/mt.png', 35.83333333, 14.58333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:43', NULL),
(136, 'isle of man', 'IM', 'IMN', 'https://flagcdn.com/w320/im.png', 54.25, -4.5, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:09', NULL),
(137, 'marshall islands', 'MH', 'MHL', 'https://flagcdn.com/w320/mh.png', 9, 168, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:45', NULL),
(138, 'martinique', 'MQ', 'MTQ', 'https://flagcdn.com/w320/mq.png', 14.666667, -61, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:46', NULL),
(139, 'mauritania', 'MR', 'MRT', 'https://flagcdn.com/w320/mr.png', 20, -12, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:46', NULL),
(140, 'mauritius', 'MU', 'MUS', 'https://flagcdn.com/w320/mu.png', -20.28333333, 57.55, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:47', NULL),
(141, 'mayotte', 'YT', 'MYT', 'https://flagcdn.com/w320/yt.png', -12.83333333, 45.16666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:48', NULL),
(142, 'mexico', 'MX', 'MEX', 'https://flagcdn.com/w320/mx.png', 23, -102, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:49', NULL),
(143, 'micronesia', 'FM', 'FSM', 'https://flagcdn.com/w320/fm.png', 6.91666666, 158.25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:49', NULL),
(144, 'moldova', 'MD', 'MDA', 'https://flagcdn.com/w320/md.png', 47, 29, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:50', NULL),
(145, 'monaco', 'MC', 'MCO', 'https://flagcdn.com/w320/mc.png', 43.73333333, 7.4, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:51', NULL),
(146, 'mongolia', 'MN', 'MNG', 'https://flagcdn.com/w320/mn.png', 46, 105, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:52', NULL),
(147, 'montserrat', 'MS', 'MSR', 'https://flagcdn.com/w320/ms.png', 16.75, -62.2, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:53', NULL),
(148, 'morocco', 'MA', 'MAR', 'https://flagcdn.com/w320/ma.png', 32, -5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:53', NULL),
(149, 'mozambique', 'MZ', 'MOZ', 'https://flagcdn.com/w320/mz.png', -18.25, 35, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:54', NULL),
(150, 'myanmar', 'MM', 'MMR', 'https://flagcdn.com/w320/mm.png', 22, 98, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:55', NULL),
(151, 'namibia', 'NA', 'NAM', 'https://flagcdn.com/w320/na.png', -22, 17, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:56', NULL),
(152, 'nauru', 'NR', 'NRU', 'https://flagcdn.com/w320/nr.png', -0.53333333, 166.91666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:57', NULL),
(153, 'nepal', 'NP', 'NPL', 'https://flagcdn.com/w320/np.png', 28, 84, 'active', '2022-08-19 06:50:11', '2022-08-30 02:34:57', NULL),
(154, 'netherlands antilles', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-19 06:50:11', '2022-08-19 06:50:11', NULL),
(155, 'netherlands', 'NL', 'NLD', 'https://flagcdn.com/w320/nl.png', 52.5, 5.75, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:10', NULL),
(156, 'new caledonia', 'NC', 'NCL', 'https://flagcdn.com/w320/nc.png', -21.5, 165.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:00', NULL),
(157, 'new zealand', 'NZ', 'NZL', 'https://flagcdn.com/w320/nz.png', -41, 174, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:00', NULL),
(158, 'nicaragua', 'NI', 'NIC', 'https://flagcdn.com/w320/ni.png', 13, -85, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:01', NULL),
(159, 'niger', 'NE', 'NER', 'https://flagcdn.com/w320/ne.png', 16, 8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:02', NULL),
(160, 'nigeria', 'NG', 'NGA', 'https://flagcdn.com/w320/ng.png', 10, 8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:03', NULL),
(161, 'niue', 'NU', 'NIU', 'https://flagcdn.com/w320/nu.png', -19.03333333, -169.86666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:04', NULL),
(162, 'norfolk island', 'NF', 'NFK', 'https://flagcdn.com/w320/nf.png', -29.03333333, 167.95, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:04', NULL),
(163, 'northern mariana islands', 'MP', 'MNP', 'https://flagcdn.com/w320/mp.png', 15.2, 145.75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:05', NULL),
(164, 'norway', 'NO', 'NOR', 'https://flagcdn.com/w320/no.png', 62, 10, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:06', NULL),
(165, 'oman', 'OM', 'OMN', 'https://flagcdn.com/w320/om.png', 21, 57, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:07', NULL),
(166, 'pakistan', 'PK', 'PAK', 'https://flagcdn.com/w320/pk.png', 30, 70, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:08', NULL),
(167, 'palau', 'PW', 'PLW', 'https://flagcdn.com/w320/pw.png', 7.5, 134.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:08', NULL),
(168, 'palestine', 'PS', 'PSE', 'https://flagcdn.com/w320/ps.png', 31.9, 35.2, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:11', NULL),
(169, 'panama', 'PA', 'PAN', 'https://flagcdn.com/w320/pa.png', 9, -80, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:10', NULL),
(170, 'papua new guinea', 'PG', 'PNG', 'https://flagcdn.com/w320/pg.png', -6, 147, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:11', NULL),
(171, 'paraguay', 'PY', 'PRY', 'https://flagcdn.com/w320/py.png', -23, -58, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:11', NULL),
(172, 'peru', 'PE', 'PER', 'https://flagcdn.com/w320/pe.png', -10, -76, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:12', NULL),
(173, 'philippines', 'PH', 'PHL', 'https://flagcdn.com/w320/ph.png', 13, 122, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:13', NULL),
(174, 'pitcairn islands', 'PN', 'PCN', 'https://flagcdn.com/w320/pn.png', -25.06666666, -130.1, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:12', NULL),
(175, 'poland', 'PL', 'POL', 'https://flagcdn.com/w320/pl.png', 52, 20, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:15', NULL),
(176, 'portugal', 'PT', 'PRT', 'https://flagcdn.com/w320/pt.png', 39.5, -8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:15', NULL),
(177, 'puerto rico', 'PR', 'PRI', 'https://flagcdn.com/w320/pr.png', 18.25, -66.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:16', NULL),
(178, 'qatar', 'QA', 'QAT', 'https://flagcdn.com/w320/qa.png', 25.5, 51.25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:17', NULL),
(179, 'reunion', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-19 06:50:11', '2022-08-19 06:50:11', NULL),
(180, 'romania', 'RO', 'ROU', 'https://flagcdn.com/w320/ro.png', 46, 25, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:18', NULL),
(181, 'russia', 'RU', 'RUS', 'https://flagcdn.com/w320/ru.png', 60, 100, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:19', NULL),
(182, 'rwanda', 'RW', 'RWA', 'https://flagcdn.com/w320/rw.png', -2, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:20', NULL),
(183, 'saint helena, ascension and tristan da cunha', 'SH', 'SHN', 'https://flagcdn.com/w320/sh.png', -15.95, -5.72, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:14', NULL),
(184, 'saint kitts and nevis', 'KN', 'KNA', 'https://flagcdn.com/w320/kn.png', 17.33333333, -62.75, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:22', NULL),
(185, 'saint lucia', 'LC', 'LCA', 'https://flagcdn.com/w320/lc.png', 13.88333333, -60.96666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:22', NULL),
(186, 'saint pierre and miquelon', 'PM', 'SPM', 'https://flagcdn.com/w320/pm.png', 46.83333333, -56.33333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:23', NULL),
(187, 'saint vincent and the grenadines', 'VC', 'VCT', 'https://flagcdn.com/w320/vc.png', 13.25, -61.2, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:24', NULL),
(188, 'samoa', 'WS', 'WSM', 'https://flagcdn.com/w320/ws.png', -13.58333333, -172.33333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:25', NULL),
(189, 'san marino', 'SM', 'SMR', 'https://flagcdn.com/w320/sm.png', 43.76666666, 12.41666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:26', NULL),
(190, 'são tomé and príncipe', 'ST', 'STP', 'https://flagcdn.com/w320/st.png', 1, 7, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:14', NULL),
(191, 'saudi arabia', 'SA', 'SAU', 'https://flagcdn.com/w320/sa.png', 25, 45, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:27', NULL),
(192, 'senegal', 'SN', 'SEN', 'https://flagcdn.com/w320/sn.png', 14, -14, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:28', NULL),
(193, 'serbia', 'RS', 'SRB', 'https://flagcdn.com/w320/rs.png', 44, 21, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:29', NULL),
(194, 'seychelles', 'SC', 'SYC', 'https://flagcdn.com/w320/sc.png', -4.58333333, 55.66666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:29', NULL),
(195, 'sierra leone', 'SL', 'SLE', 'https://flagcdn.com/w320/sl.png', 8.5, -11.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:30', NULL),
(196, 'singapore', 'SG', 'SGP', 'https://flagcdn.com/w320/sg.png', 1.36666666, 103.8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:31', NULL),
(197, 'slovakia', 'SK', 'SVK', 'https://flagcdn.com/w320/sk.png', 48.66666666, 19.5, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:32', NULL),
(198, 'slovenia', 'SI', 'SVN', 'https://flagcdn.com/w320/si.png', 46.11666666, 14.81666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:33', NULL),
(199, 'smaller territories of the uk', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-19 06:50:11', '2022-08-19 06:50:11', NULL),
(200, 'solomon islands', 'SB', 'SLB', 'https://flagcdn.com/w320/sb.png', -8, 159, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:34', NULL),
(201, 'somalia', 'SO', 'SOM', 'https://flagcdn.com/w320/so.png', 10, 49, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:35', NULL),
(202, 'south africa', 'ZA', 'ZAF', 'https://flagcdn.com/w320/za.png', -29, 24, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:36', NULL),
(203, 'south georgia', 'GS', 'SGS', 'https://flagcdn.com/w320/gs.png', -54.5, -37, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:36', NULL),
(204, 'south sudan', 'SS', 'SSD', 'https://flagcdn.com/w320/ss.png', 7, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:37', NULL),
(205, 'spain', 'ES', 'ESP', 'https://flagcdn.com/w320/es.png', 40, -4, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:38', NULL),
(206, 'sri lanka', 'LK', 'LKA', 'https://flagcdn.com/w320/lk.png', 7, 81, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:39', NULL),
(207, 'sudan', 'SD', 'SDN', 'https://flagcdn.com/w320/sd.png', 15, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:40', NULL),
(208, 'suriname', 'SR', 'SUR', 'https://flagcdn.com/w320/sr.png', 4, -56, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:40', NULL),
(209, 'svalbard and jan mayen', 'SJ', 'SJM', 'https://flagcdn.com/w320/sj.png', 78, 20, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:16', NULL),
(210, 'eswatini', 'SZ', 'SWZ', 'https://flagcdn.com/w320/sz.png', -26.5, 31.5, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:17', NULL),
(211, 'sweden', 'SE', 'SWE', 'https://flagcdn.com/w320/se.png', 62, 15, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:43', NULL),
(212, 'switzerland', 'CH', 'CHE', 'https://flagcdn.com/w320/ch.png', 47, 8, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:44', NULL),
(213, 'syria', 'SY', 'SYR', 'https://flagcdn.com/w320/sy.png', 35, 38, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:44', NULL),
(214, 'taiwan', 'TW', 'TWN', 'https://flagcdn.com/w320/tw.png', 23.5, 121, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:45', NULL),
(215, 'tajikistan', 'TJ', 'TJK', 'https://flagcdn.com/w320/tj.png', 39, 71, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:46', NULL),
(216, 'tanzania', 'TZ', 'TZA', 'https://flagcdn.com/w320/tz.png', -6, 35, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:47', NULL),
(217, 'thailand', 'TH', 'THA', 'https://flagcdn.com/w320/th.png', 15, 100, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:48', NULL),
(218, 'togo', 'TG', 'TGO', 'https://flagcdn.com/w320/tg.png', 8, 1.16666666, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:48', NULL),
(219, 'tokelau', 'TK', 'TKL', 'https://flagcdn.com/w320/tk.png', -9, -172, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:49', NULL),
(220, 'tonga', 'TO', 'TON', 'https://flagcdn.com/w320/to.png', -20, -175, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:50', NULL),
(221, 'trinidad and tobago', 'TT', 'TTO', 'https://flagcdn.com/w320/tt.png', 11, -61, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:51', NULL),
(222, 'tunisia', 'TN', 'TUN', 'https://flagcdn.com/w320/tn.png', 34, 9, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:51', NULL),
(223, 'turkey', 'TR', 'TUR', 'https://flagcdn.com/w320/tr.png', 39, 35, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:52', NULL),
(224, 'turkmenistan', 'TM', 'TKM', 'https://flagcdn.com/w320/tm.png', 40, 60, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:53', NULL),
(225, 'turks and caicos islands', 'TC', 'TCA', 'https://flagcdn.com/w320/tc.png', 21.75, -71.58333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:54', NULL),
(226, 'tuvalu', 'TV', 'TUV', 'https://flagcdn.com/w320/tv.png', -8, 178, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:55', NULL),
(227, 'uganda', 'UG', 'UGA', 'https://flagcdn.com/w320/ug.png', 1, 32, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:55', NULL),
(228, 'ukraine', 'UA', 'UKR', 'https://flagcdn.com/w320/ua.png', 49, 32, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:56', NULL),
(229, 'united arab emirates', 'AE', 'ARE', 'https://flagcdn.com/w320/ae.png', 24, 54, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:57', NULL),
(230, 'united kingdom', 'GB', 'GBR', 'https://flagcdn.com/w320/gb.png', 54, -2, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:58', NULL),
(231, 'united states', 'US', 'USA', 'https://flagcdn.com/w320/us.png', 38, -97, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:58', NULL),
(232, 'united states minor outlying islands', 'UM', 'UMI', 'https://flagcdn.com/w320/um.png', 19.3, 166.633333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:35:59', NULL),
(233, 'uruguay', 'UY', 'URY', 'https://flagcdn.com/w320/uy.png', -33, -56, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:00', NULL),
(234, 'uzbekistan', 'UZ', 'UZB', 'https://flagcdn.com/w320/uz.png', 41, 64, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:01', NULL),
(235, 'vanuatu', 'VU', 'VUT', 'https://flagcdn.com/w320/vu.png', -16, 167, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:02', NULL),
(236, 'vatican city', 'VA', 'VAT', 'https://flagcdn.com/w320/va.png', 41.9, 12.45, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:17', NULL),
(237, 'venezuela', 'VE', 'VEN', 'https://flagcdn.com/w320/ve.png', 8, -66, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:03', NULL),
(238, 'vietnam', 'VN', 'VNM', 'https://flagcdn.com/w320/vn.png', 16.16666666, 107.83333333, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:04', NULL),
(239, 'british virgin islands', 'VG', 'VGB', 'https://flagcdn.com/w320/vg.png', 18.431383, -64.62305, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:18', NULL),
(240, 'united states virgin islands', 'VI', 'VIR', 'https://flagcdn.com/w320/vi.png', 18.35, -64.933333, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:19', NULL),
(241, 'wallis and futuna', 'WF', 'WLF', 'https://flagcdn.com/w320/wf.png', -13.3, -176.2, 'active', '2022-08-19 06:50:11', '2022-08-30 05:10:20', NULL),
(242, 'western sahara', 'EH', 'ESH', 'https://flagcdn.com/w320/eh.png', 24.5, -13, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:07', NULL),
(243, 'yemen', 'YE', 'YEM', 'https://flagcdn.com/w320/ye.png', 15, 48, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:08', NULL),
(244, 'yugoslavia', NULL, NULL, NULL, NULL, NULL, 'active', '2022-08-19 06:50:11', '2022-08-19 06:50:11', NULL),
(245, 'zambia', 'ZM', 'ZMB', 'https://flagcdn.com/w320/zm.png', -15, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:10', NULL),
(246, 'zimbabwe', 'ZW', 'ZWE', 'https://flagcdn.com/w320/zw.png', -20, 30, 'active', '2022-08-19 06:50:11', '2022-08-30 02:36:10', NULL);

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
-- RELATIONSHIPS FOR TABLE `tb_commission`:
--

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
-- RELATIONSHIPS FOR TABLE `tb_company_images`:
--

--
-- Dumping data for table `tb_company_images`
--

INSERT INTO `tb_company_images` (`cm_img_id`, `cm_id`, `cm_img_name`, `created`, `updated`) VALUES
(13, 6, 'Screenshot_(7).png', '2022-06-28 13:16:34', NULL),
(15, 11, 'Profile_details1.png', '2022-09-02 11:55:23', NULL),
(16, 11, 'localhost_ArdourFundly_mobile_authentication_changePassword(Samsung_Galaxy_S8+)_(1).png', '2022-09-02 11:55:23', NULL),
(17, 11, 'localhost_ArdourFundly_mobile_authentication(Samsung_Galaxy_S8+).png', '2022-09-02 11:55:23', NULL),
(18, 14, 'Screenshot_(13).png', '2022-09-22 06:00:18', NULL),
(19, 14, 'Screenshot_(14).png', '2022-09-22 06:00:18', NULL);

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
-- RELATIONSHIPS FOR TABLE `tb_company_link_user`:
--

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
-- RELATIONSHIPS FOR TABLE `tb_company_master`:
--

--
-- Dumping data for table `tb_company_master`
--

INSERT INTO `tb_company_master` (`cm_id`, `company_name`, `company_phone_no`, `company_email`, `company_address`, `company_website`, `notes`, `company_logo`, `company_banner`, `company_video`, `user_id`, `created`, `updated`) VALUES
(1, 'Gauraj Info tech PVT LTD', 9968796351, 'gayraj123@gmail.com', '804 K-10 atlantis grand 804 K-10', 'https://gaurajinfotech.com/', 'jbjjkhui', 'Screenshot_(1)6.png', 'Screenshot_(2)6.png', 'video6.mp4', 4, '2022-06-23 11:56:27', '2022-09-07 04:01:34'),
(4, 'Clicer web tech', 8200394894, 'clickers123@gmail.com', 'asavdvd', 'https://clickerswebtech.com/', 'sdvf  ffb ', 'Defaultone.png', 'default_-_Copy2.png', 'video9.mp4', 4, '2022-06-23 12:14:29', '2022-09-07 04:01:37'),
(5, 'Vertical plast', 9874561234, 'vertcalplast789@gmail.com', 'kutch mandvi surat', 'https://vertical.com/', 'hkbhjvhj', 'repairman-doing-air-conditioner-service_(2)1.jpg', '', '', 4, '2022-06-24 13:53:44', '2022-09-07 04:01:39'),
(6, 'Devshiv mega coprp', 9978745866, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 4, '2022-06-28 10:17:54', '2022-09-07 04:01:41'),
(7, 'Shivraj Info tech PVT LTD 1', 9968796351, 'gayraj123@gmail.com', '804 K-10 atlantis grand 804 K-10', 'https://gaurajinfotech.com/', 'jbjjkhui', 'Screenshot_(1)6.png', 'Screenshot_(2)6.png', 'video6.mp4', 4, '2022-06-23 11:56:27', '2022-10-06 04:39:24'),
(8, 'Flicker web tech 1', 8200394894, 'clickers123@gmail.com', 'asavdvd', 'https://clickerswebtech.com/', 'sdvf  ffb ', 'Defaultone.png', 'default_-_Copy2.png', 'video9.mp4', 4, '2022-06-23 12:14:29', '2022-10-06 04:39:32'),
(9, 'Vertical plast 1', 9874561234, 'vertcalplast789@gmail.com', 'kutch mandvi surat', 'https://vertical.com/', 'hkbhjvhj', 'repairman-doing-air-conditioner-service_(2)1.jpg', '', '', 4, '2022-06-24 13:53:44', '2022-09-07 04:01:48'),
(10, 'shiv mega coprp 1', 9978745866, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 4, '2022-06-28 10:17:54', '2022-10-06 04:39:43'),
(11, 'Test', 9987789855, 'tset123@gmail.com', 'dwsdssd', 'https://tesr.com/', 'dadasdsad', 'The-Difference-Types-of-Web-Hosting-21.jpg', 'indian-rupee-sign-flat-white-icons-on-round-color-backgrounds-6-bonus-icons-included-2CB6YHK-removebg-preview1.png', '', 4, '2022-09-02 11:55:23', '2022-09-07 04:01:54'),
(12, 'mega shiv corp 2', 9978745868, 'devshiv123@gmail.com', 'near valukans chokdi', 'https://devshivmegacopr.com/', 'best quality kajus are here', 'devshiv2.png', 'devshiv.png', '', 4, '2022-06-28 10:17:54', '2022-10-06 04:40:06'),
(13, 'Test 3', 9987789857, 'tset123@gmail.com', 'dwsdssd', 'https://tesr.com/', 'dadasdsad', 'The-Difference-Types-of-Web-Hosting-21.jpg', 'indian-rupee-sign-flat-white-icons-on-round-color-backgrounds-6-bonus-icons-included-2CB6YHK-removebg-preview1.png', '', 4, '2022-09-02 11:55:23', NULL),
(14, 'TESTED', 9988774455, 'tested@gmail.com', 'iujhu', 'https://tested.com/', 'testing', 'devshiv3.png', 'bb.jpg', 'whatsapp-video-2021-09-16-at-94535-pm_4m9GkZTt_aogJ.mp4', 4, '2022-09-22 06:00:18', NULL);

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
-- RELATIONSHIPS FOR TABLE `tb_company_user_master`:
--

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
  `ur_id` int(11) NOT NULL,
  `customer_code` varchar(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone_no` bigint(20) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(100) DEFAULT NULL,
  `cus_ref_id` int(11) DEFAULT NULL,
  `referral_check` int(11) NOT NULL DEFAULT 0,
  `refer_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `convert_cus` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tb_customer`:
--

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`cus_id`, `ur_id`, `customer_code`, `customer_name`, `customer_address`, `customer_phone_no`, `customer_email`, `customer_password`, `cus_ref_id`, `referral_check`, `refer_date`, `user_id`, `convert_cus`, `created`, `updated`) VALUES
(5, 2, 'CUS1002', 'Suthar Bhavin P', 'bkhjhjg', 8200394893, 'puja8877@gmail.com', '2070fdbde6d459e8c55bd81e5c5e802e', NULL, 0, NULL, 1, NULL, '2022-07-09 10:53:15', '2022-10-06 04:25:21'),
(12, 2, 'CUS1003', 'Tested', 'hbjhhj', 1234567990, 'tested123@mail.com', NULL, 5, 0, NULL, 4, NULL, '2022-10-03 08:19:06', '2022-10-08 11:53:35'),
(13, 2, 'CUS1004', 'Tested one', 'hbjhhj', 1234567990, 'tested456@mail.com', NULL, NULL, 0, NULL, 4, 1, '2022-10-03 08:19:06', '2022-10-06 05:11:42');

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
-- RELATIONSHIPS FOR TABLE `tb_customer_bank_accounts`:
--

--
-- Dumping data for table `tb_customer_bank_accounts`
--

INSERT INTO `tb_customer_bank_accounts` (`cba_id`, `cus_id`, `account_name`, `account_number`, `ifsc_code`, `branch_name`, `paypal_id`, `stripe_id`, `created`, `updated`) VALUES
(6, 5, 'Suthar Bhavin P', 35033734709, 'SBIN000911', 'kheda', 'vjvghvjg@bh', NULL, '2022-09-05 10:25:16', '2022-09-22 09:49:30');

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
-- RELATIONSHIPS FOR TABLE `tb_customer_map_company`:
--   `cus_id`
--       `tb_customer` -> `cus_id`
--   `cm_id`
--       `tb_company_master` -> `cm_id`
--

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
(50, 11, 13, '2022-09-20 05:16:20', NULL),
(51, 12, 14, '2022-10-03 08:19:06', NULL);

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
-- RELATIONSHIPS FOR TABLE `tb_customer_referral`:
--

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
-- RELATIONSHIPS FOR TABLE `tb_customer_ref_company`:
--

--
-- Dumping data for table `tb_customer_ref_company`
--

INSERT INTO `tb_customer_ref_company` (`crc_id`, `cr_id`, `cm_id`, `created`, `updated`) VALUES
(3, 3, 1, '2022-07-08 08:51:45', NULL),
(4, 3, 4, '2022-07-08 08:51:45', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tb_email_template`:
--

--
-- Dumping data for table `tb_email_template`
--

INSERT INTO `tb_email_template` (`et_id`, `email_for`, `email_subject`, `email`, `created`, `updated`) VALUES
(1, 'Customer add', 'Welcome to referral management', 'Hii iam from referral managemnt wlcome to our website', '2022-09-23 11:59:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan`
--

CREATE TABLE `tb_plan` (
  `plan_id` int(11) NOT NULL,
  `ref_con_fee` double(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tb_plan`:
--

--
-- Dumping data for table `tb_plan`
--

INSERT INTO `tb_plan` (`plan_id`, `ref_con_fee`, `created`, `updated`) VALUES
(1, 5.00, '2022-10-07 08:15:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan_det`
--

CREATE TABLE `tb_plan_det` (
  `plan_det_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `ref_days_fromTo` varchar(100) NOT NULL,
  `ref_fee_per_wise` double(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `tb_plan_det`:
--

--
-- Dumping data for table `tb_plan_det`
--

INSERT INTO `tb_plan_det` (`plan_det_id`, `plan_id`, `ref_days_fromTo`, `ref_fee_per_wise`, `created`, `updated`) VALUES
(12, 1, '0-20', 1.00, '2022-10-07 08:58:59', NULL),
(13, 1, '21-40', 1.50, '2022-10-07 08:58:59', NULL),
(14, 1, '41-60', 2.00, '2022-10-07 08:58:59', NULL);

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
-- RELATIONSHIPS FOR TABLE `tb_product`:
--

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
-- RELATIONSHIPS FOR TABLE `tb_product_company`:
--   `cm_id`
--       `tb_company_master` -> `cm_id`
--   `pro_id`
--       `tb_product` -> `pro_id`
--

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
-- RELATIONSHIPS FOR TABLE `tb_product_images`:
--   `pro_id`
--       `tb_product` -> `pro_id`
--

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
-- RELATIONSHIPS FOR TABLE `tb_quotation`:
--   `cm_id`
--       `tb_company_master` -> `cm_id`
--   `qut_cus_id`
--       `tb_customer` -> `cus_id`
--

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
-- RELATIONSHIPS FOR TABLE `tb_quotation_product`:
--   `qut_id`
--       `tb_quotation` -> `qut_id`
--

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
-- RELATIONSHIPS FOR TABLE `tb_user`:
--   `ur_id`
--       `tb_user_role` -> `role_id`
--

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `ur_id`, `name`, `phone_no`, `email`, `password`, `created`, `updated`) VALUES
(4, 1, 'Suthar Bhavin P', 9724648214, 'bhavin29796@gmail.com', '26dc318942685872cf79c5eb96c9bb13', '2022-09-06 10:07:53', '2022-09-29 10:34:24'),
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
-- RELATIONSHIPS FOR TABLE `tb_user_permission`:
--   `role_id`
--       `tb_user_role` -> `role_id`
--

--
-- Dumping data for table `tb_user_permission`
--

INSERT INTO `tb_user_permission` (`up_id`, `role_id`, `module_name`, `view`, `create_all`, `edit_all`, `delete_all`, `import_all`, `export_all`, `view_all`, `created`, `updated`) VALUES
(1, 1, 'company', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(2, 1, 'customer', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(3, 1, 'user', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(4, 1, 'user_role', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 04:26:49', NULL),
(5, 1, 'commission', 1, 1, 1, 1, 0, 0, 0, '2022-09-12 07:23:21', NULL),
(6, 2, 'company', 1, 1, 1, 1, 0, 0, 0, '2022-09-29 08:29:18', NULL),
(7, 2, 'customer', 1, 1, 1, 1, 0, 0, 0, '2022-09-29 08:29:18', NULL),
(8, 2, 'user', 1, 1, 1, 1, 0, 0, 0, '2022-09-29 08:29:18', NULL),
(9, 2, 'user_role', 1, 1, 1, 1, 0, 0, 0, '2022-09-29 08:29:18', NULL),
(10, 2, 'commission', 1, 1, 1, 1, 0, 0, 0, '2022-09-29 08:29:18', NULL);

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
-- RELATIONSHIPS FOR TABLE `tb_user_role`:
--

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`role_id`, `role_name`, `created`, `updated`) VALUES
(1, 'Admin', '2022-09-12 04:26:49', NULL),
(2, 'Customer', '2022-09-29 08:29:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `tb_commission`
--
ALTER TABLE `tb_commission`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_company_images`
--
ALTER TABLE `tb_company_images`
  MODIFY `cm_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_company_link_user`
--
ALTER TABLE `tb_company_link_user`
  MODIFY `clu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_company_master`
--
ALTER TABLE `tb_company_master`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_company_user_master`
--
ALTER TABLE `tb_company_user_master`
  MODIFY `cum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_customer_bank_accounts`
--
ALTER TABLE `tb_customer_bank_accounts`
  MODIFY `cba_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_customer_map_company`
--
ALTER TABLE `tb_customer_map_company`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_plan`
--
ALTER TABLE `tb_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_plan_det`
--
ALTER TABLE `tb_plan_det`
  MODIFY `plan_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product_company`
--
ALTER TABLE `tb_product_company`
  MODIFY `pro_comp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  MODIFY `pro_img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  MODIFY `qut_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
