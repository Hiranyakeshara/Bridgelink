-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 02:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bridgelink`
--

-- --------------------------------------------------------

--
-- Table structure for table `endpoints`
--

CREATE TABLE `endpoints` (
  `id` int(25) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `basenetwork` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `vpn_id` int(25) NOT NULL,
  `vpn_name` varchar(255) NOT NULL,
  `device_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `endpoints`
--

INSERT INTO `endpoints` (`id`, `device_name`, `basenetwork`, `ip`, `vpn_id`, `vpn_name`, `device_type`) VALUES
(1, '', '192.168.10.1', '', 0, '', '2'),
(2, 'uwasara pc', '192.168.10.1', '', 0, '', '3'),
(3, 'Kasun PC', '192.168.10.1', '192.168.10.12', 0, '', 'Computer'),
(4, 'chamara printer', '192.168.10.1', '192.168.10.13', 0, '', 'Printer'),
(5, 'thamara pc', '192.168.10.1', '192.168.10.14', 0, '', 'Computer'),
(6, 'pasindu', '192.168.10.1', '192.168.10.15', 0, '', 'Computer'),
(7, 'sample PC', '192.168.20.1', '192.168.20.3', 0, '', 'Computer'),
(8, 'kasundie PC', '192.168.40.1', '192.168.40.2', 0, '', 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `ip_id` int(50) NOT NULL,
  `vpn_id` int(50) NOT NULL,
  `base_network` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`ip_id`, `vpn_id`, `base_network`, `ip`) VALUES
(2, 3, '192.168.50.1', '192.168.50.10'),
(3, 3, '192.168.70.1', '192.168.70.10'),
(4, 3, '192.168.70.1', '192.168.70.10');

-- --------------------------------------------------------

--
-- Table structure for table `router`
--

CREATE TABLE `router` (
  `id` int(11) NOT NULL,
  `router_name` varchar(50) NOT NULL,
  `router_type` varchar(20) NOT NULL,
  `device_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `router`
--

INSERT INTO `router` (`id`, `router_name`, `router_type`, `device_count`) VALUES
(1, 'hr router', ' Computer', 20),
(2, 'dp router ', ' 200', 10),
(3, 'it router', ' 1808', 10);

-- --------------------------------------------------------

--
-- Table structure for table `switch`
--

CREATE TABLE `switch` (
  `id` int(11) NOT NULL,
  `switch_name` varchar(50) NOT NULL,
  `switch_type` varchar(20) NOT NULL,
  `port_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `switch`
--

INSERT INTO `switch` (`id`, `switch_name`, `switch_type`, `port_count`) VALUES
(1, 'hr switch', 'Printer', 5),
(2, 'IT department switch', 'Printer', 34);

-- --------------------------------------------------------

--
-- Table structure for table `vpn`
--

CREATE TABLE `vpn` (
  `vpn_id` int(11) NOT NULL,
  `vpn_name` varchar(50) NOT NULL,
  `start_ip` varchar(15) NOT NULL,
  `end_ip` varchar(15) NOT NULL,
  `user_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vpn`
--

INSERT INTO `vpn` (`vpn_id`, `vpn_name`, `start_ip`, `end_ip`, `user_capacity`) VALUES
(3, 'manager vpn', '192.168.30.1', '192.168.30.254', 254),
(4, 'clientVPN', ' 192.168.50.1', '192.168.50.254', 254),
(5, 'health_VPN', '192.168.60.1', '192.168.60.254', 254);

-- --------------------------------------------------------

--
-- Table structure for table `vpn_users`
--

CREATE TABLE `vpn_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `vpn_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vpn_users`
--

INSERT INTO `vpn_users` (`user_id`, `user_name`, `vpn_id`, `ip`, `password`) VALUES
(1, 'Hiranya', 4, '', '#hiranya'),
(7, 'chamara', 3, '192.168.40.1', '#chamara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `endpoints`
--
ALTER TABLE `endpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD PRIMARY KEY (`ip_id`),
  ADD KEY `vpn_id` (`vpn_id`);

--
-- Indexes for table `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `switch`
--
ALTER TABLE `switch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vpn`
--
ALTER TABLE `vpn`
  ADD PRIMARY KEY (`vpn_id`);

--
-- Indexes for table `vpn_users`
--
ALTER TABLE `vpn_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `ip` (`ip`),
  ADD KEY `vpn_id` (`vpn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `endpoints`
--
ALTER TABLE `endpoints`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ip_address`
--
ALTER TABLE `ip_address`
  MODIFY `ip_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `router`
--
ALTER TABLE `router`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `switch`
--
ALTER TABLE `switch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vpn`
--
ALTER TABLE `vpn`
  MODIFY `vpn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vpn_users`
--
ALTER TABLE `vpn_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD CONSTRAINT `ip_address_ibfk_1` FOREIGN KEY (`vpn_id`) REFERENCES `vpn` (`vpn_id`);

--
-- Constraints for table `vpn_users`
--
ALTER TABLE `vpn_users`
  ADD CONSTRAINT `vpn_users_ibfk_1` FOREIGN KEY (`vpn_id`) REFERENCES `vpn` (`vpn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
