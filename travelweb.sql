-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 11:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(11) NOT NULL,
  `place` varchar(100) NOT NULL,
  `numOfGuest` int(11) NOT NULL,
  `arrival` date NOT NULL,
  `leaving` date NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `place`, `numOfGuest`, `arrival`, `leaving`, `userID`) VALUES
(1, 'Iriga', 10, '2022-12-13', '2022-12-15', 1),
(8, 'Naga', 20, '2023-01-04', '2022-12-30', 1),
(9, 'Naga', 20, '2022-12-30', '2022-12-23', 1),
(10, '12312', 123123, '2022-12-23', '2022-12-18', 1),
(11, 'fadfad', 123, '2023-01-06', '2022-12-08', 1),
(12, 'afasdf', 1231, '2022-12-08', '2022-12-22', 1),
(13, 'fad', 0, '2022-12-30', '2022-12-14', 1),
(14, 'fad', 111, '2022-12-30', '2022-12-14', 1),
(15, 'fad', 111, '2022-12-30', '2022-12-14', 1),
(16, 'fad', 111, '2022-12-30', '2022-12-14', 1),
(17, 'fad', 111, '2022-12-30', '2022-12-14', 1),
(18, 'adfadsf', 1231, '2022-12-10', '2022-12-29', 1),
(19, 'asdfasd', 123, '2022-12-15', '2022-12-21', 1),
(20, 'adfadsf', 123, '2022-12-24', '2022-12-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Star` int(11) NOT NULL,
  `Cost` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`ID`, `name`, `Description`, `Star`, `Cost`, `image`) VALUES
(1, 'Mumbai', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus explicabo possimus aliquid. Assumenda inventore architecto aliquid, eum hic odio esse nihil commodi, neque nemo porro saepe, labori', 4, 120, './images/p-1.jpg'),
(2, 'Sydney', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus explicabo possimus aliquid. Assumenda inventore architecto aliquid.', 3, 120, './images/p-2.jpg'),
(3, 'Hawaii', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus explicabo possimus aliquid. Assumenda inventore architecto aliquid, eum hic odio esse nihil commodi.', 4, 120, './images/p-3.jpg'),
(4, 'Paris', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus explicabo possimus aliquid. Assumenda inventore architecto aliquid, eum hic odio esse nihil commodi.', 5, 60, './images/p-4.jpg'),
(5, 'Tokyo', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus explicabo possimus aliquid. Assumenda inventore architecto aliquid, eum hic odio esse nihil commodi.', 4, 60, './images/p-5.jpg'),
(6, 'Egypt', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus explicabo possimus aliquid. Assumenda inventore architecto aliquid, eum hic odio esse nihil commodi.', 3, 60, './images/p-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `firstName`, `lastName`, `Contact`, `username`, `password`) VALUES
(1, 'Don', 'Curativo', '09123456789', 'asdf', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `booking_ibfk_1` (`userID`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
