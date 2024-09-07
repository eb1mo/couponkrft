-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 05:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coupon_system_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'test', '$2y$10$PXHCSkkuM/jcYLMSPKfvwuXLRyaJn8xJx8cqMroajN9EDxs8db3Fa', '2024-09-07 02:28:39'),
(2, 'test1', '$2y$10$OM0kfHuoCLAKuEVKUV0uTeq1tkN4NkXVCtJyx4f/3F5R7pZxklCAi', '2024-09-07 02:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `digits` int(11) DEFAULT NULL,
  `usage_limit` int(11) DEFAULT 1,
  `used_count` int(11) DEFAULT 0,
  `expiry_date` date DEFAULT NULL,
  `discount_min` int(11) DEFAULT NULL,
  `discount_max` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `admin_id`, `code`, `prefix`, `digits`, `usage_limit`, `used_count`, `expiry_date`, `discount_min`, `discount_max`, `created_at`) VALUES
(1, 1, 'ABC0001', 'ABC', 4, 1, 1, '2024-09-09', 5, 25, '2024-09-07 02:30:31'),
(2, 1, 'ABC0002', 'ABC', 4, 1, 0, '2024-09-09', 5, 25, '2024-09-07 02:30:31'),
(3, 2, 'XYZNrOj', 'XYZ', 4, 2, 2, '2024-09-09', 0, 10, '2024-09-07 02:38:47'),
(4, 2, 'XYZxi6L', 'XYZ', 4, 0, 0, '2024-09-09', 0, 10, '2024-09-07 02:38:47'),
(5, 2, 'XYZNuB5', 'XYZ', 4, 0, 0, '2024-09-09', 0, 10, '2024-09-07 02:38:47'),
(6, 2, 'XYZ5WLP', 'XYZ', 4, 0, 0, '2024-09-09', 0, 10, '2024-09-07 02:38:47'),
(7, 2, 'XYZgZb3', 'XYZ', 4, 0, 0, '2024-09-09', 0, 10, '2024-09-07 02:38:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
