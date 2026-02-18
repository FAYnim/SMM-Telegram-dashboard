-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2026 at 03:51 PM
-- Server version: 11.4.7-MariaDB-cll-lve
-- PHP Version: 8.4.17

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
-- Table structure for table `smm_withdrawals`
--

CREATE TABLE `smm_withdrawals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `destination_account` varchar(255) NOT NULL,
  `fee` decimal(10,2) DEFAULT 0.00,
  `status` enum('pending','approved','rejected','canceled') DEFAULT 'pending',
  `admin_id` int(11) DEFAULT NULL,
  `admin_notes` text DEFAULT NULL,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `smm_withdrawals`
--

INSERT INTO `smm_withdrawals` (`id`, `user_id`, `amount`, `destination_account`, `fee`, `status`, `admin_id`, `admin_notes`, `processed_at`, `created_at`) VALUES
(1, 4, 50000.00, 'DANA 0812****5678', 2500.00, 'pending', NULL, NULL, NULL, '2026-02-15 13:45:00'),
(2, 5, 100000.00, 'ShopeePay 0856****1234', 5000.00, 'pending', NULL, NULL, NULL, '2026-02-15 12:30:00'),
(3, 6, 200000.00, 'DANA 0813****9012', 10000.00, 'pending', NULL, NULL, NULL, '2026-02-15 10:15:00'),
(4, 7, 75000.00, 'ShopeePay 0878****3456', 3750.00, 'approved', 4, 'Sudah ditransfer', '2026-02-15 11:55:00', '2026-02-14 20:00:00'),
(5, 8, 30000.00, 'DANA 0812****7890', 1500.00, 'pending', NULL, NULL, NULL, '2026-02-14 18:30:00'),
(6, 9, 150000.00, 'DANA 0815****4567', 7500.00, 'rejected', 4, 'Saldo tidak cukup', '2026-02-14 16:00:00', '2026-02-14 15:00:00'),
(7, 10, 25000.00, 'ShopeePay 0821****6789', 1250.00, 'pending', NULL, NULL, NULL, '2026-02-14 11:00:00'),
(8, 11, 60000.00, 'DANA 0819****2345', 3000.00, 'approved', 4, 'OK', '2026-02-14 09:00:00', '2026-02-13 22:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smm_withdrawals`
--
ALTER TABLE `smm_withdrawals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `idx_withdrawals_user_id` (`user_id`),
  ADD KEY `idx_withdrawals_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smm_withdrawals`
--
ALTER TABLE `smm_withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smm_withdrawals`
--
ALTER TABLE `smm_withdrawals`
  ADD CONSTRAINT `smm_withdrawals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `smm_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `smm_withdrawals_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `smm_users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
