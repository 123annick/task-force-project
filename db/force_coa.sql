-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 07:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `force coa`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(60) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_name`, `created_at`) VALUES
(2, 'Mobile Money', '2023-08-17'),
(3, 'Equity Bank', '2023-08-17'),
(4, 'Mokash', '2023-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `id` int(11) NOT NULL,
  `month_year` varchar(7) NOT NULL,
  `budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `month_year`, `budget`) VALUES
(1, '2023-08', -73350);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`) VALUES
(2, 'Living Allowance ', '2023-08-17 23:54:17'),
(3, 'Communication', '2023-08-17 23:54:29'),
(4, 'Transport', '2023-08-17 23:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `sub_category_name` varchar(60) NOT NULL,
  `main_category` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `sub_category_name`, `main_category`, `created_at`) VALUES
(2, 'Canal Box', 3, '2023-08-17 23:55:24'),
(3, 'Call Subscription', 3, '2023-08-17 23:55:43'),
(4, 'Inzu', 2, '2023-08-17 23:56:06'),
(5, 'Ibyokurya', 2, '2023-08-17 23:56:16'),
(6, 'Imyambaro', 2, '2023-08-17 23:56:30'),
(7, 'Job Transport', 4, '2023-08-17 23:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `type` varchar(3) NOT NULL,
  `payment_by` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total_paid` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `type`, `payment_by`, `sub_category_id`, `date`, `total_paid`, `description`) VALUES
(2, 'Calan Box', 'out', 2, 2, '2023-08-18 00:24:44', 25000, 'You can set the session timeout using the session.gc_maxlifetime directive in your PHP configuration or by using the ini_set() function within your PHP script. This value represents the maximum lifetime of a session in seconds. For example, to set the session timeout to 30 minutes:'),
(3, 'Umuhungu unyishyuye', 'in', 2, 6, '2023-08-18 00:26:04', 3500, 'It is important to note that the session may not expire exactly at the specified time due to the session garbage collection process. '),
(4, 'Kugura phone', 'out', 3, 3, '2023-08-18 00:30:40', 252000, 'To handle session expiration due to inactivity, you can check the last activity timestamp in the session');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
