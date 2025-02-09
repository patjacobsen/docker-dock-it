-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220331.b9ddf0b305
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2025 at 03:26 PM
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
-- Table structure for table `Eggs`
--

CREATE TABLE `Eggs` (
  `ChickenID` int(11) DEFAULT NULL,
  `EggID` int(11) NOT NULL,
  `EggCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Eggs`
--

INSERT INTO `Eggs` (`ChickenID`, `EggID`, `EggCount`) VALUES
(1, 1, 6),
(2, 2, 3),
(3, 3, 0),
(4, 4, 8),
(5, 5, 4),
(6, 6, 3),
(7, 7, 0),
(8, 8, 2),
(9, 9, 7),
(10, 10, 5),
(11, 11, 4),
(12, 12, 6),
(13, 13, 71),
(14, 14, 12),
(15, 15, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Eggs`
--
ALTER TABLE `Eggs`
  ADD PRIMARY KEY (`EggID`),
  ADD UNIQUE KEY `ChickenID` (`ChickenID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Eggs`
--
ALTER TABLE `Eggs`
  MODIFY `EggID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
