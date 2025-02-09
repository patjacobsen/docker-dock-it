-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220331.b9ddf0b305
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2025 at 03:25 PM
-- Server version: 10.4.34-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjacobsen`
--

-- --------------------------------------------------------

--
-- Table structure for table `Chickens`
--

CREATE TABLE `Chickens` (
  `ID` int(255) NOT NULL,
  `BreedID` int(11) NOT NULL,
  `Age` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Chickens`
--

INSERT INTO `Chickens` (`ID`, `BreedID`, `Age`) VALUES
(1, 5, '2 years'),
(2, 5, '1 year'),
(3, 3, '3 years'),
(4, 3, '2 years'),
(5, 3, '4 years'),
(6, 3, '1 year'),
(7, 2, '3 years'),
(8, 2, '2 years'),
(9, 2, '4 years'),
(10, 4, '3 years'),
(11, 4, '5 years'),
(12, 4, '2 years'),
(14, 1, '5 years'),
(17, 6, '5 months'),
(18, 6, '8 months'),
(19, 7, '6 months'),
(20, 7, '8 months'),
(21, 7, '4 months'),
(22, 8, '4 months'),
(23, 8, '6 months'),
(24, 6, '8 months'),
(25, 6, '5 months'),
(26, 8, '9 months'),
(27, 7, '6 months'),
(28, 8, '8 months'),
(43, 3, '3 years');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Chickens`
--
ALTER TABLE `Chickens`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Chickens`
--
ALTER TABLE `Chickens`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
