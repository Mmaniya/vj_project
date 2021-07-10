-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 06:02 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_users`
--

CREATE TABLE `tbl_admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_users`
--

INSERT INTO `tbl_admin_users` (`id`, `username`, `mobile`, `email`, `password`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Admin Users', '9876543210', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'A', '2021-03-14 17:07:44', '2021-03-25 08:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approved_uesrs`
--

CREATE TABLE `tbl_approved_uesrs` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount_credited` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `existing_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `if_deposited` enum('Y','N') DEFAULT 'N',
  `deposit_amt` varchar(100) NOT NULL,
  `deposit_date` varchar(100) NOT NULL,
  `approved_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `credited_amt` varchar(50) NOT NULL,
  `if_credited` enum('Y','N') NOT NULL DEFAULT 'N',
  `credited_date` varchar(50) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_approved_uesrs`
--
ALTER TABLE `tbl_approved_uesrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_users`
--
ALTER TABLE `tbl_admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_approved_uesrs`
--
ALTER TABLE `tbl_approved_uesrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
