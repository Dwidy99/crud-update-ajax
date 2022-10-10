-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 01:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crudajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `cg_id` smallint(6) NOT NULL,
  `customer_group` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`cg_id`, `customer_group`) VALUES
(1, 'Retail'),
(2, 'Wholesale');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` smallint(6) NOT NULL,
  `product_id` smallint(6) DEFAULT NULL,
  `cg_id` smallint(6) DEFAULT NULL,
  `price` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `product_id`, `cg_id`, `price`) VALUES
(1, 1, 1, 320),
(2, 1, 2, 123),
(3, 3, 1, 51),
(4, 2, 2, 6799),
(42, 23, 1, 45),
(43, 24, 1, 46),
(44, 25, 1, 13),
(46, 27, 2, 34),
(47, 28, 2, 329),
(48, 29, 1, 3200),
(49, 30, 2, 3200),
(50, 31, 2, 99),
(51, 32, 2, 99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` smallint(6) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`) VALUES
(1, 'Keyboard'),
(2, 'Charger HP'),
(3, 'Monitor'),
(4, 'Charger'),
(23, 'Kebal'),
(24, 'Electrical'),
(25, 'Laptop'),
(27, 'Sepeda'),
(28, 'Keyboards'),
(29, 'Keyboard'),
(30, 'Keyboard'),
(31, 'Mobil'),
(32, 'Mobil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`cg_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`),
  ADD UNIQUE KEY `product_id_cg_id` (`product_id`,`cg_id`),
  ADD KEY `customer_group_id` (`cg_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `cg_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
