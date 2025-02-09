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
-- Table structure for table `Meat`
--

CREATE TABLE `Meat` (
  `ChickenID` int(11) NOT NULL,
  `MeatID` int(11) NOT NULL,
  `Meat` char(50) NOT NULL,
  `Weight` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Meat`
--

INSERT INTO `Meat` (`ChickenID`, `MeatID`, `Meat`, `Weight`) VALUES
(16, 1, 'Chicken Breast', '1lbs'),
(17, 2, 'Legs', '3lbs'),
(18, 3, 'Whole Chicken', '3lbs'),
(19, 4, 'Whole Chicken', '3lbs'),
(20, 5, 'Chicken Breast', '1lbs'),
(21, 6, 'Whole Chicken', '3lbs'),
(22, 7, 'Legs', '1lbs'),
(23, 8, 'Whole Chicken', '3lbs'),
(24, 9, 'Whole Chicken', '3lbs'),
(25, 10, 'Legs', '213lb'),
(26, 12, 'Chicken Breast', '2 lbs'),
(27, 13, 'Legs', '1lbs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Meat`
--
ALTER TABLE `Meat`
  ADD PRIMARY KEY (`ChickenID`),
  ADD UNIQUE KEY `ChickenID` (`ChickenID`),
  ADD UNIQUE KEY `MeatID` (`MeatID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Meat`
--
ALTER TABLE `Meat`
  MODIFY `MeatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
