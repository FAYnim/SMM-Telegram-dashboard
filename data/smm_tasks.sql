-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2026 at 07:19 AM
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
-- Table structure for table `smm_tasks`
--

CREATE TABLE `smm_tasks` (
  `id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `status` enum('available','taken','pending_review','approved','rejected') DEFAULT 'available',
  `taken_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `smm_tasks`
--

INSERT INTO `smm_tasks` (`id`, `campaign_id`, `worker_id`, `status`, `taken_at`, `completed_at`, `reviewed_at`, `created_at`) VALUES
(1, 2, 12, 'approved', '2026-02-19 00:13:50', '2026-02-19 00:18:31', '2026-02-19 00:18:55', '2026-02-18 09:12:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smm_tasks`
--
ALTER TABLE `smm_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tasks_campaign_id` (`campaign_id`),
  ADD KEY `idx_tasks_worker_id` (`worker_id`),
  ADD KEY `idx_tasks_status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smm_tasks`
--
ALTER TABLE `smm_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `smm_tasks`
--
ALTER TABLE `smm_tasks`
  ADD CONSTRAINT `smm_tasks_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `smm_campaigns` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `smm_tasks_ibfk_2` FOREIGN KEY (`worker_id`) REFERENCES `smm_users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
