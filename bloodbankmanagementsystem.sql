-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2023 at 11:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbankmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvalhistory`
--

CREATE TABLE `approvalhistory` (
  `HistoryID` int(11) NOT NULL,
  `RequestID` int(80) NOT NULL,
  `UserID` int(80) NOT NULL,
  `ApprovalDate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvalhistory`
--

INSERT INTO `approvalhistory` (`HistoryID`, `RequestID`, `UserID`, `ApprovalDate`) VALUES
(1, 1, 1, '2023-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `bloodrequest`
--

CREATE TABLE `bloodrequest` (
  `RequestID` int(11) NOT NULL,
  `UserID` int(80) NOT NULL,
  `BloodGroup` varchar(40) NOT NULL,
  `NumberOfBags` int(11) NOT NULL,
  `DateOfDonation` varchar(40) NOT NULL,
  `Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodrequest`
--

INSERT INTO `bloodrequest` (`RequestID`, `UserID`, `BloodGroup`, `NumberOfBags`, `DateOfDonation`, `Status`) VALUES
(1, 1, 'B+', 5, '2023-12-31', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `scheduleinfo`
--

CREATE TABLE `scheduleinfo` (
  `ScheduleID` int(11) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Phone` varchar(40) NOT NULL,
  `BloodGroup` varchar(40) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `DonationDate` varchar(40) NOT NULL,
  `ManagerEmail` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduleinfo`
--

INSERT INTO `scheduleinfo` (`ScheduleID`, `Name`, `Email`, `Phone`, `BloodGroup`, `Gender`, `DonationDate`, `ManagerEmail`) VALUES
(1, 'Rianul Amin', 'ppsppspsspss@gmail.com', '01402246680', 'B+', 'Male', '2023-12-27', 'forceupme@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `ProfilePicture` varchar(160) NOT NULL,
  `Role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `BloodGroup`, `DOB`, `Gender`, `Country`, `Phone`, `ProfilePicture`, `Role`) VALUES
(1, 'Ratul', 'Khan', 'forceupme121@gmail.com', '11111111', 'B+', '2023-12-27', 'Male', 'Bangladesh', '01920221854', 'uploads/images/https___images.genius.com_521b925045ca5be201953c54501f3b6a.640x640x1.png', 'Manager'),
(2, 'Rianul', 'Amin', 'rianulamin99@gmail.com', '12345678', 'B+', '2023-12-27', 'Male', 'Bangladesh', '01402246680', 'uploads/images/default_pfp.png', 'Donor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvalhistory`
--
ALTER TABLE `approvalhistory`
  ADD PRIMARY KEY (`HistoryID`);

--
-- Indexes for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  ADD PRIMARY KEY (`RequestID`);

--
-- Indexes for table `scheduleinfo`
--
ALTER TABLE `scheduleinfo`
  ADD PRIMARY KEY (`ScheduleID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvalhistory`
--
ALTER TABLE `approvalhistory`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloodrequest`
--
ALTER TABLE `bloodrequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scheduleinfo`
--
ALTER TABLE `scheduleinfo`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
