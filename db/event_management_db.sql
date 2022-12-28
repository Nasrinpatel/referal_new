-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 10:29 AM
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
-- Database: `event_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency_master`
--

CREATE TABLE `agency_master` (
  `id` int(100) NOT NULL,
  `agency_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(100) NOT NULL,
  `state_id` int(100) NOT NULL,
  `country_id` int(100) NOT NULL,
  `website` varchar(255) NOT NULL,
  `agency_email` varchar(100) NOT NULL,
  `agency_phone` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency_master`
--

INSERT INTO `agency_master` (`id`, `agency_name`, `address`, `city_id`, `state_id`, `country_id`, `website`, `agency_email`, `agency_phone`, `created_date`, `updated_date`) VALUES
(21, 'agency one ', 'abc,bharuch\r\nxyz,surat', 1, 1, 1, 'oneweb.com', 'one@gmail.com', '1234569870', '2022-07-19 12:47:46', NULL),
(22, 'agency one ', 'abc,bharuch\r\nxyz,surat', 1, 1, 1, 'oneweb.com', 'one@gmail.com', '1234569870', '2022-07-19 12:47:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artist_master`
--

CREATE TABLE `artist_master` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `city_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `name`, `state_id`, `created_date`) VALUES
(1, 'vadodara', 1, '2022-06-28 09:45:37'),
(2, 'ahmedabad', 2, '2022-06-28 09:45:37'),
(8, 'Surat', 0, '2022-07-21 04:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `id` int(100) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(100) NOT NULL,
  `state_id` int(100) NOT NULL,
  `country_id` int(100) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company_master`
--

CREATE TABLE `company_master` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `designation_id` varchar(150) NOT NULL,
  `agency_id` int(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`contact_id`, `name`, `phone`, `designation_id`, `agency_id`, `created_date`, `updated_date`) VALUES
(29, 'cp1', '9903214560', '1', 21, '2022-07-19 12:48:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `name`, `created_date`) VALUES
(1, 'India', '2022-06-28 09:50:24'),
(2, 'USA', '2022-06-28 09:50:24'),
(6, 'UK', '2022-07-20 09:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(100) NOT NULL,
  `state_id` int(100) NOT NULL,
  `country_id` int(100) NOT NULL,
  `agency_selection` varchar(255) NOT NULL,
  `status` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `designation_master`
--

CREATE TABLE `designation_master` (
  `designation_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation_master`
--

INSERT INTO `designation_master` (`designation_id`, `name`, `status`, `created_date`) VALUES
(2, 'Manager', 1, '2022-06-28 09:45:37'),
(21, 'CEO', 0, '2022-07-20 11:11:15'),
(38, 'new', 0, '2022-07-21 07:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `state_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `name`, `country_id`, `created_date`) VALUES
(1, 'Gujarat', 1, '2022-06-28 09:46:08'),
(2, 'Goa', 2, '2022-06-28 09:46:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency_master`
--
ALTER TABLE `agency_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist_master`
--
ALTER TABLE `artist_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_master`
--
ALTER TABLE `company_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation_master`
--
ALTER TABLE `designation_master`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agency_master`
--
ALTER TABLE `agency_master`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `artist_master`
--
ALTER TABLE `artist_master`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_master`
--
ALTER TABLE `company_master`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation_master`
--
ALTER TABLE `designation_master`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
