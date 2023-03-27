-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 10:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ID` int(11) NOT NULL,
  `classid` varchar(500) NOT NULL,
  `classname` text NOT NULL,
  `yearofstudy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `classid`, `classname`, `yearofstudy`) VALUES
(2, '361228', 'Software Engineering', 1),
(3, '536441', 'Computer Science', 1),
(4, '565558', 'Software Engineering', 2),
(5, '962455', 'Electronic Engineering', 1),
(6, '896045', 'BCom', 4),
(7, '636979', 'IT', 4),
(8, '812925', 'Electronic analog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `classid` int(11) NOT NULL,
  `lesssoncode` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`ID`, `name`, `classid`, `lesssoncode`) VALUES
(4, 'Digital Logic', 536441, '3279-7204-4652'),
(5, 'Introduction to Programing', 361228, '7267-5194-5514'),
(6, 'C Programing', 565558, '9948-7716-2322'),
(7, 'Electric Nodes', 962455, '1972-3693-1793'),
(8, 'Introduction to Programing', 896045, '8485-5276-6898'),
(9, 'Digital Logic', 896045, '5543-7984-1434'),
(10, 'Business Intelligence', 636979, '2127-2840-7067'),
(11, 'dynamic', 812925, '8631-5880-8897');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(500) NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `username`, `password`, `usertype`) VALUES
(1, 'admin', '$2y$10$JZh8RV9CPZ5Fk3k.tvgsPuNlV1XNxTOWYg.ToqtBNEksMknAqXcmO', '');

-- --------------------------------------------------------

--
-- Table structure for table `registerstudents`
--

CREATE TABLE `registerstudents` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `regNo` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `studentid` varchar(500) NOT NULL,
  `studentname` text NOT NULL,
  `studentemail` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `courseid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `studentid`, `studentname`, `studentemail`, `password`, `courseid`) VALUES
(5, 'STU0', 'Alvin Odari Kiveu', 'alvinodarikiveu@student.ac.ke', '8173306b4dda9469c6b06689a85d4c11', '361228'),
(6, 'STU1', 'Brian Kinuttia', 'briankinuttia@student.ac.ke', '8173306b4dda9469c6b06689a85d4c11', '962455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registerstudents`
--
ALTER TABLE `registerstudents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registerstudents`
--
ALTER TABLE `registerstudents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
