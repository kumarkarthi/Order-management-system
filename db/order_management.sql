-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2017 at 09:13 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_entity`
--

CREATE TABLE `order_entity` (
  `id` int(11) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_entity`
--

INSERT INTO `order_entity` (`id`, `email_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'karthikkumar@gmail.com', '2', '2017-04-28 05:51:34', '2017-04-28 03:15:47'),
(2, 'test@gmail.com', '1', '2017-04-28 06:48:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item_entity`
--

CREATE TABLE `order_item_entity` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item_entity`
--

INSERT INTO `order_item_entity` (`id`, `order_id`, `name`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apple', 55, 2, '2017-04-28 05:53:05', NULL),
(2, 1, 'Orange', 60, 2, '2017-04-28 05:53:21', NULL),
(3, 2, 'Orange', 55, 3, '2017-04-28 06:48:23', NULL),
(4, 2, 'Apple', 60, 3, '2017-04-28 06:48:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_entity`
--
ALTER TABLE `order_entity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item_entity`
--
ALTER TABLE `order_item_entity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_entity`
--
ALTER TABLE `order_entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_item_entity`
--
ALTER TABLE `order_item_entity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
