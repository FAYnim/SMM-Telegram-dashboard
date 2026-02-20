-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2026 at 01:44 AM
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
-- Table structure for table `smm_settings`
--

CREATE TABLE `smm_settings` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `smm_settings`
--

INSERT INTO `smm_settings` (`id`, `category`, `setting_key`, `setting_value`, `description`, `updated_at`) VALUES
(1, 'payment', 'dana_number', '0810-0101-01010', 'Nomor DANA untuk topup', '2026-01-25 21:59:17'),
(2, 'payment', 'dana_name', 'Budi Doremi', 'Nama pemilik akun DANA', '2026-01-25 21:59:17'),
(3, 'payment', 'shopeepay_number', '0898-7654-2109', 'Nomor ShopeePay untuk topup', '2026-01-25 21:59:17'),
(4, 'payment', 'shopeepay_name', 'Ahmad Yani', 'Nama pemilik akun ShopeePay', '2026-01-25 21:59:17'),
(5, 'withdraw', 'min_withdraw', '5000', 'Minimum jumlah withdrawal', '2026-02-03 12:50:03'),
(6, 'withdraw', 'admin_fee', '3', 'Biaya admin withdrawal', '2026-02-03 12:49:38'),
(7, 'withdraw', 'admin_fee_type', 'percentage', 'Tipe biaya admin: flat (nominal) atau percentage (persentase)', '2026-01-25 21:59:17'),
(8, 'campaign', 'min_price_per_task', '50', 'Minimum harga per task (Rp)', '2026-02-03 12:47:53'),
(9, 'referral', 'mandatory', 'yes', 'Apakah kode referral wajib untuk user baru (yes/no)', '2026-01-29 06:00:57'),
(10, 'referral', 'reward_amount', '5000', 'Jumlah reward referral dalam Rupiah', '2026-01-29 05:48:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smm_settings`
--
ALTER TABLE `smm_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_category_key` (`category`,`setting_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smm_settings`
--
ALTER TABLE `smm_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
