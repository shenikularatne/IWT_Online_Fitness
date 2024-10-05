-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2024 at 09:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheni_iwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `trainer_schedule`
--

CREATE TABLE `trainer_schedule` (
  `S_ID` int(10) NOT NULL,
  `T_ID` int(10) NOT NULL,
  `C_ID` int(10) NOT NULL,
  `C_Name` varchar(100) NOT NULL,
  `S_Date` date NOT NULL,
  `S_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer_schedule`
--

INSERT INTO `trainer_schedule` (`S_ID`, `T_ID`, `C_ID`, `C_Name`, `S_Date`, `S_Time`) VALUES
(3, 1, 1, 'harry styles', '2024-12-12', '20:30:00'),
(4, 1, 2, 'niall horan', '2024-10-18', '19:27:00'),
(5, 2, 3, 'louis tomlinson', '2024-11-13', '15:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trainer_schedule`
--
ALTER TABLE `trainer_schedule`
  ADD PRIMARY KEY (`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trainer_schedule`
--
ALTER TABLE `trainer_schedule`
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
