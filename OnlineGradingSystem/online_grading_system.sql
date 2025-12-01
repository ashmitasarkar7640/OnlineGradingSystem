-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 05:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_grading_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(20) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`) VALUES
(1, 'Admin', 'Admin01');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `ID` int(40) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Complain` varchar(100) NOT NULL,
  `Std_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`ID`, `Subject`, `Complain`, `Std_name`) VALUES
(9, 'DBMS', 'ttttrrrrr', 'am'),
(10, 'JAVA', 'cccccccccccccccccc', 'ankita'),
(22, 'OS', 'error', 'Meghla Paul');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Designation` varchar(15) NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `specialization` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` text NOT NULL,
  `mobile` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Id`, `Name`, `username`, `Designation`, `Qualification`, `specialization`, `email`, `password`, `gender`, `mobile`) VALUES
(14, 'Nayan Das1', 'nayan2', 'eee', 'hh', 'OOP', 'admin@gmail.com', '1234', '', 1234567555);

-- --------------------------------------------------------

--
-- Table structure for table `fac_notification`
--

CREATE TABLE `fac_notification` (
  `Id` int(50) NOT NULL,
  `Notification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_notification`
--

INSERT INTO `fac_notification` (`Id`, `Notification`) VALUES
(2, '\r\nuyufrrtjhg');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `Id` int(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Semester` varchar(15) NOT NULL,
  `OS` varchar(10) NOT NULL,
  `CA` varchar(10) NOT NULL,
  `OOP` varchar(10) NOT NULL,
  `JAVA` varchar(15) NOT NULL,
  `DBMS` varchar(10) NOT NULL,
  `Total` int(20) NOT NULL,
  `Grade` varchar(30) NOT NULL,
  `Remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`Id`, `Name`, `Semester`, `OS`, `CA`, `OOP`, `JAVA`, `DBMS`, `Total`, `Grade`, `Remarks`) VALUES
(1, 'Maithili Saha', '', '', '', '', '', '', 111, 'F', '				'),
(2, 'Meghla Paul', '', '23', '93', '88', '12', '45', 2, 'F', '				hhh'),
(3, 'Ashmita Sarkar', '', '96', '55', '45', '78', '69', 489, 'O', '				23'),
(4, 'Ashmita Sarkar', '4th', '99', '', '88', '45', '', 187, 'C', '				');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Id` int(11) NOT NULL,
  `Notification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Id`, `Notification`) VALUES
(4, 'The result will be published on 17/04/2022, at 10:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Id` int(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact` int(15) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Id`, `Name`, `Semester`, `Username`, `Password`, `Email`, `Gender`, `Contact`, `Address`, `Status`) VALUES
(7, 'Ankita sarkar', '1st', 'anki21', '1234ankita', 'ankitasarkar012003@g', 'Female', 123456789, 'a Road', 1),
(8, 'Meghla Paul', '2nd', 'megh06', '1234meghla', 'meghlapaul253@gmail.', 'Female', 12345, 'Malaynagar', 1),
(12, 'Ashmita Sarkar', '4th', 'Ashmita10', '1234ashmita', 'ashmitasarkar@gmail.', 'Female', 70055656, 'Ranir Bazar', 1),
(13, 'Riya Das', '5th', 'Riya01', '1234', 'riyacst01@gmail.com', 'Female', 1236547899, 'Bishalgarh', 0),
(14, 'Pragya Roy', '6th', 'Pragya01', '1234', 'pragyacst01@gmail.co', 'Female', 2147483647, 'Narshingarh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fac_notification`
--
ALTER TABLE `fac_notification`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `ID` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fac_notification`
--
ALTER TABLE `fac_notification`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
