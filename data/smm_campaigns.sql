-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2026 at 04:14 PM
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
-- Table structure for table `smm_campaigns`
--

CREATE TABLE `smm_campaigns` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `social_account_id` int(11) DEFAULT NULL,
  `campaign_title` varchar(255) NOT NULL,
  `type` enum('view','like','comment','share','follow') NOT NULL,
  `link_target` text NOT NULL,
  `price_per_task` decimal(10,2) NOT NULL,
  `target_total` int(11) NOT NULL,
  `completed_count` int(11) DEFAULT 0,
  `campaign_balance` decimal(15,2) DEFAULT 0.00,
  `campaign_budget` decimal(15,2) DEFAULT 0.00,
  `status` enum('creating','draft','active','paused','completed','deleted') DEFAULT 'creating',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
ALTER TABLE `smm_campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_campaigns_client_id` (`client_id`),
  ADD KEY `idx_campaigns_social_account_id` (`social_account_id`),
  ADD KEY `idx_campaigns_status` (`status`);

ALTER TABLE `smm_campaigns`
  ADD CONSTRAINT `smm_campaigns_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `smm_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `smm_campaigns_ibfk_2` FOREIGN KEY (`social_account_id`) REFERENCES `smm_social_accounts` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
