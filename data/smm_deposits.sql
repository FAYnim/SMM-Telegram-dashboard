-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2026 at 09:20 AM
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
-- Database: `fayd7716_hosted`
--

-- --------------------------------------------------------

--
-- Table structure for table `smm_deposits`
--

CREATE TABLE `smm_deposits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `proof_image_id` varchar(500) DEFAULT NULL,
  `status` enum('pending','approved','rejected','canceled') DEFAULT 'pending',
  `admin_id` int(11) DEFAULT NULL,
  `admin_notes` text DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `smm_deposits`
--

INSERT INTO `smm_deposits` (`id`, `user_id`, `amount`, `proof_image_id`, `status`, `admin_id`, `admin_notes`, `processed_at`, `created_at`) VALUES
(1, 4, 120000.00, 'AgACAgUAAxkBAAIML2l3-Frb9v38jJ6kBaxrObL87cZOAALqEGsbQ4XBV0MNuKL6wuSHAQADAgADeAADOAQ', 'approved', 4, NULL, '2026-01-26 23:28:59', '2026-01-26 23:27:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smm_deposits`
--
ALTER TABLE `smm_deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `idx_deposits_user_id` (`user_id`),
  ADD KEY `idx_deposits_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smm_deposits`
--
ALTER TABLE `smm_deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smm_deposits`
--
ALTER TABLE `smm_deposits`
  ADD CONSTRAINT `smm_deposits_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `smm_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `smm_deposits_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `smm_users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
