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
-- Table structure for table `Breed`
--

CREATE TABLE `Breed` (
  `BreedID` int(11) NOT NULL,
  `BreedName` varchar(50) NOT NULL,
  `Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Breed`
--

INSERT INTO `Breed` (`BreedID`, `BreedName`, `Image`) VALUES
(1, 'Australorp', 'images/australorp.jpg'),
(2, 'Isa Brown', 'images/isabrown.jpg'),
(3, 'Leghorn', 'images/leghorn.jpg'),
(4, 'Plymouth Rock', 'images/plymouthrock.jpg'),
(5, 'Rhode Island Red', 'images/rhodered.jpg'),
(6, 'Bresse Gauloise', 'images/bressegauloise.jpg'),
(7, 'Cornish Cross', 'images/cornishcross.jpg'),
(8, 'Red Ranger', 'images/redranger.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Breed`
--
ALTER TABLE `Breed`
  ADD PRIMARY KEY (`BreedID`),
  ADD UNIQUE KEY `BreedName` (`BreedName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Breed`
--
ALTER TABLE `Breed`
  MODIFY `BreedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
