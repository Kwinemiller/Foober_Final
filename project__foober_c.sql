-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 10:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project: foober_c`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` tinyint(10) UNSIGNED NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(48) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `email`, `password`, `firstname`, `lastname`, `date_created`) VALUES
(1, 'oneala5@mymail.nku.edu', '$2y$10$PmXwzttXFBLixjboo.7CdOIkzGlyz8jRCIvdASYKuuadvRdX.Px3.', 'Andrew', 'Oneal', '0000-00-00 00:00:00'),
(2, 'ncaporusso1@nku.edu', '$2y$10$9NLShnOYsbHH5vBBhyb6R.ohUpt1bMr9bCb3BBEgaHheefrzlPcS.', 'Nicholas', 'Caporusso', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'Available',
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(48) NOT NULL,
  `vehicle` varchar(64) NOT NULL,
  `vehicle_rank` text NOT NULL DEFAULT 'Normal',
  `vehicle_description` text NOT NULL,
  `countries` varchar(40) NOT NULL,
  `states` varchar(40) NOT NULL,
  `cities` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`ID`, `email`, `password`, `status`, `firstname`, `lastname`, `vehicle`, `vehicle_rank`, `vehicle_description`, `countries`, `states`, `cities`, `date_created`) VALUES
(987654324, 'oneala5@mymail.nku.edu', '$2y$10$b36EDqdXnmpkmoo7P6kJF..4Br9dnVCD/WnCkV6wr1iMWO2F26M/G', 'Available', 'Andrew', 'Oneal', 'Honda Fit', 'Normal', 'Blue Hatchback', 'United States', 'KY', 'Highland Heights', '0000-00-00 00:00:00'),
(987654325, 'md@foober.com', '$2y$10$Be0ha0PWufY8.1s00NlX7ebrtDSBKtKJS.0TFfHqzH/QcduoYTDim', 'Available', 'Andrew', 'Oneal', 'Subaru WRX', 'Normal', 'White Sedan', 'United States', 'Kentucky', 'Jeffersontown', '0000-00-00 00:00:00'),
(987654326, 'ncaporusso1@nku.edu', '$2y$10$nbhaUFAM861umGSu1sFIS.YVE06p1mUAEd8hjxdjwjeH9QD5GXuR6', 'Available', 'Nicholas', 'Caporusso', 'Lamborghini Murcielago', 'Luxury', 'Green Supercar', 'United States', 'Ohio', 'Cincinnati', '0000-00-00 00:00:00'),
(987654327, 'rl@foober.com', '$2y$10$GQfB15FTuB6Dws6QOxPEOuizf/x3agmG2Mp8cbT4swQN5fz3BYc1C', 'Available', 'Riley', 'Lingen', 'GMC Sierra', 'Cargo', 'Blue Truck', 'United States', 'Kentucky', 'Highland Heights', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `ID` int(10) UNSIGNED NOT NULL,
  `user_ID` int(10) UNSIGNED NOT NULL,
  `number` int(255) DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `security` tinyint(9) UNSIGNED DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `zip` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`ID`, `user_ID`, `number`, `expdate`, `security`, `name`, `zip`) VALUES
(9, 4, 123456789, '2023-01-07', 123, 'Nicholas Caporusso', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `ID` int(10) UNSIGNED NOT NULL,
  `passenger_ID` int(10) UNSIGNED DEFAULT NULL,
  `driver_ID` int(10) UNSIGNED DEFAULT NULL,
  `cost` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `dropoff_location` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_pickup` date NOT NULL,
  `date_dropoff` date NOT NULL,
  `rating_driver` tinyint(5) UNSIGNED NOT NULL DEFAULT 0,
  `rating_passenger` tinyint(5) UNSIGNED NOT NULL DEFAULT 0,
  `payment_ID` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `email` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `firstname` varchar(16) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `firstname`, `lastname`, `date_created`) VALUES
(4, 'ncaporusso1@nku.edu', '$2y$10$HJM2dMrxFXLTsp2in7YBH.L71xJjR.zsoPxik97D.YpzwAv7Fyau2', 'Nicholas', 'Caporusso', '0000-00-00 00:00:00'),
(5, 'oneala5@mymail.nku.edu', '$2y$10$cqegHQrChjkBVPEDI0IoS.rPNJSXYmiT7dJc5icDBqAjawep0BJY.', 'Andrew', 'Oneal', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `passenger_ID` (`passenger_ID`),
  ADD KEY `driver_ID` (`driver_ID`),
  ADD KEY `payment_ID` (`payment_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987654328;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `payment_ID` FOREIGN KEY (`payment_ID`) REFERENCES `payment_methods` (`ID`),
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`passenger_ID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `rides_ibfk_2` FOREIGN KEY (`driver_ID`) REFERENCES `drivers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
