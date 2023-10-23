-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 08:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapping`
--

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Municipality` varchar(255) NOT NULL,
  `Barangay` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `Municipality`, `Barangay`, `created_at`, `updated_at`) VALUES
(51, 'Sogod', 'Zone 3', '2023-10-07 07:19:01', '2023-10-07 07:19:01'),
(52, 'Sogod', 'Zone 3', '2023-10-07 07:21:49', '2023-10-07 07:21:49'),
(53, 'Sogod', 'Zone 3', '2023-10-07 07:24:14', '2023-10-07 07:24:14'),
(54, 'Sogod', 'Zone 3', '2023-10-07 07:27:35', '2023-10-07 07:27:35'),
(55, 'Sogod', 'Zone 3', '2023-10-07 07:29:01', '2023-10-07 07:29:01'),
(56, 'Sogod', 'Zone 3', '2023-10-07 07:29:51', '2023-10-07 07:29:51'),
(57, 'Sogod', 'Zone 3', '2023-10-07 07:33:15', '2023-10-07 07:33:15'),
(58, 'Sogod', 'Zone 3', '2023-10-07 07:34:45', '2023-10-07 07:34:45'),
(59, 'Sogod', 'Zone 3', '2023-10-07 07:36:01', '2023-10-07 07:36:01'),
(60, 'Bontoc', 'Zone 3', '2023-10-07 07:55:19', '2023-10-07 07:55:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
