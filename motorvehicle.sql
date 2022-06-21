-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 05:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorvehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `tax_payment`
--

CREATE TABLE `tax_payment` (
  `id` int(9) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `tax_year` year(4) NOT NULL DEFAULT current_timestamp(),
  `payment_type` varchar(40) NOT NULL,
  `amount` float NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tax_payment`
--

INSERT INTO `tax_payment` (`id`, `vehicle_number`, `tax_year`, `payment_type`, `amount`, `payment_status`) VALUES
(2, '1234', 2022, 'Full Payment', 3000, 'Fully Paid'),
(3, '453', 2022, 'Partial Payment', 50, 'Not Fully Paid'),
(4, '45ht', 2020, 'Partial Payment', 60, 'Not Fully Paid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_payment`
--
ALTER TABLE `tax_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tax_payment`
--
ALTER TABLE `tax_payment`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
