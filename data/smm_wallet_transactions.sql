-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2026 at 07:18 AM
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
-- Table structure for table `smm_wallet_transactions`
--

CREATE TABLE `smm_wallet_transactions` (
  `id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `type` enum('deposit','task_reward','withdraw','adjustment') NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `balance_before` decimal(15,2) NOT NULL,
  `balance_after` decimal(15,2) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected','canceled') DEFAULT 'approved',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `smm_wallet_transactions`
--

INSERT INTO `smm_wallet_transactions` (`id`, `wallet_id`, `type`, `amount`, `balance_before`, `balance_after`, `description`, `reference_id`, `status`, `created_at`) VALUES
(1, 1, 'deposit', 5000.00, 0.00, 5000.00, 'Reward referral dari user baru', NULL, 'approved', '2026-01-25 21:59:57'),
(2, 2, 'deposit', 120000.00, 0.00, 120000.00, 'Top-up manual oleh Admin', NULL, 'approved', '2026-01-26 23:28:59'),
(3, 1, 'deposit', 5000.00, 5000.00, 10000.00, 'Reward referral dari user baru', NULL, 'approved', '2026-01-26 23:43:59'),
(4, 1, 'deposit', 5000.00, 10000.00, 15000.00, 'Reward referral dari user baru', NULL, 'approved', '2026-01-29 06:04:22'),
(5, 1, 'deposit', 5000.00, 15000.00, 20000.00, 'Reward referral dari user baru', NULL, 'approved', '2026-01-29 06:07:26'),
(6, 1, 'deposit', 5000.00, 20000.00, 25000.00, 'Reward referral dari user baru', NULL, 'approved', '2026-01-29 06:23:11'),
(7, 1, 'withdraw', -10300.00, 50000.00, 39700.00, 'Withdraw disetujui oleh Admin (Amount: 10.000, Fee: 300)', 1, 'approved', '2026-02-18 09:07:27'),
(8, 4, 'task_reward', 500.00, 0.00, 500.00, 'Reward task: SMM Bot', 1, 'approved', '2026-02-19 00:18:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smm_wallet_transactions`
--
ALTER TABLE `smm_wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_wallet_transactions_wallet_id` (`wallet_id`),
  ADD KEY `idx_wallet_transactions_type` (`type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smm_wallet_transactions`
--
ALTER TABLE `smm_wallet_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smm_wallet_transactions`
--
ALTER TABLE `smm_wallet_transactions`
  ADD CONSTRAINT `smm_wallet_transactions_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `smm_wallets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
