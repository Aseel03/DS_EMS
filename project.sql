-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2015 at 09:37 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `hcp`
--

CREATE TABLE `hcp` (
  `hcp_id` int(11) NOT NULL,
  `hcp_name` varchar(255) NOT NULL,
  `hcp_phone` varchar(100) NOT NULL,
  `hcp_prouduct` varchar(255) NOT NULL,
  `hcp_email` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hcp`
--

INSERT INTO `hcp` (`hcp_id`, `hcp_name`, `hcp_phone`, `hcp_prouduct`, `hcp_email`, `users_id`) VALUES
(1, 'TESTHCP', '561111111', 'ADOL 500 MG 24', 'info@compny.com', 16),
(10, 'MOH', '042313Â§32', '', 'MOH@company.com', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_name` varchar(255) NOT NULL,
  `orders_date` date NOT NULL,
  `orders_deliverdate` date NOT NULL,
  `orders_details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `hcp_id` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_name`, `orders_date`, `orders_deliverdate`, `orders_details`, `status`, `user_id`, `hcp_id`) VALUES
(3, '11', '0000-00-00', '0000-00-00', '', '', 9, 16),
(5, '1212', '2012-12-01', '0000-00-00', 'xx21x21x21x21x21x', '0', 9, 16),
(6, '21212', '2012-12-01', '0000-00-00', '1212121', '0', 9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_phone` int(11) NOT NULL,
  `users_station` varchar(255) NOT NULL,
  `users_type` int(11) NOT NULL,
  `users_status` int(2) NOT NULL,
  `full` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `users_email`, `users_password`, `users_phone`, `users_station`, `users_type`, `users_status`, `full`) VALUES
(9, 'dsems', 'ds.ems2015@gmail.com', '123', 544490913, 'Arrays', 0, 1, 0),
(18, 'adminHCP', 'zzz@xxxcv.com', '123', 231321, '132132132', 1, 1, 0),
(19, 'emp', 'zzz@xv.com', '123', 1321327771, '4444132132', 2, 1, 0),
(22, 'supplier', 'supplier3@yah.com', '123', 54232312, 'arrass', 3, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hcp`
--
ALTER TABLE `hcp`
  ADD PRIMARY KEY (`hcp_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hcp`
--
ALTER TABLE `hcp`
  MODIFY `hcp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
