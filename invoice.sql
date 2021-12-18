-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 01:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicedb`
--
CREATE DATABASE IF NOT EXISTS `invoicedb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `invoicedb`;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `order_id` int(11) NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_cedula` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `sub_total` float NOT NULL,
  `total` float NOT NULL,
  `tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`order_id`, `cashier_id`, `customer_id`, `customer_cedula`, `customer_name`, `customer_phone`, `customer_email`, `date`, `sub_total`, `total`, `tax`) VALUES
(4, 1, 5, 112409007, 'Adolfo Nuñez', 85685656, 'adolfo23@gmail.com', '2021-11-03', 13500, 15255, 1755),
(5, 1, 1, 195482765, 'Pedro Salgado', 88889999, 'pedrito@gmail.com', '2021-11-26', 2200, 2486, 286),
(6, 1, 4, 114556786, 'Jorge Rivera', 89676767, 'jorriv@gmail.com', '2021-12-03', 4300, 4859, 559),
(7, 1, 2, 111327890, 'Isabela Rojas', 87909090, 'isarojas@gmail.com', '2021-12-09', 7300, 8249, 949),
(8, 1, 2, 111327890, 'Isabela Rojas', 87909090, 'isarojas@gmail.com', '2021-12-11', 15586, 17612, 2026);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_customer_id` (`customer_id`),
  ADD KEY `FK_cashier_id` (`cashier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
