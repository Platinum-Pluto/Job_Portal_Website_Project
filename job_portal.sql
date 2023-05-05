-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 01:17 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(6) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `User_Name`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `User_ID` int(6) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `NID` int(11) NOT NULL,
  `switchmode` int(3) DEFAULT NULL,
  `notifSet` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`User_ID`, `User_Name`, `Password`, `Email`, `City`, `NID`, `switchmode`, `notifSet`) VALUES
(1, 'user1', 'user1', 'asakura@gmail.com', 'DHAKA', 1234, 0, 0),
(2, 'aaaaa', 'user2', 'helloworld@yellow.com', 'BADDA', 456, 0, 0),
(3, 'user3', 'user3', 'asd@gmail.com', 'BADDA', 1928572, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `Admin_ID` int(6) NOT NULL,
  `Status` int(11) NOT NULL,
  `Notify_user` int(11) NOT NULL,
  `Notify_admin` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Job_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `User_ID` int(6) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Job_ID` int(6) NOT NULL,
  `Job_Title` varchar(100) NOT NULL,
  `Job_Description` varchar(500) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Interview_Date` date NOT NULL,
  `Interview_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Job_Title`, `Job_Description`, `Salary`, `Location`, `Company_Name`, `Qualification`, `Interview_Date`, `Interview_Time`) VALUES
(2, 'Data Analyst', 'dfufhehrferf.', 60000, 'DHAKA', 'Opus', 'Masters', '2023-07-12', '10:18:00'),
(3, 'AAA', 'daefre', 234444, 'DHAKA', 'Opus', 'Bachelors', '2023-04-20', '13:19:00'),
(4, 'Software Engineer', 'duihdfwqe0po0o0', 32000, 'RAJSHAHI', 'BJIT', 'B.Sc', '2023-10-19', '33:30:33'),
(5, 'Manager', 'aiudhgionw', 24000, 'DHAKA', 'Bengal Knittex', 'Masters', '2023-04-18', '33:30:33'),
(6, 'Assistant', 'swfdcvc', 8000, 'DHAKA', 'BJIT', 'Masters', '2023-04-26', '33:30:33'),
(7, 'Intern', 'safdfg', 5000, 'DHAKA', 'Tesla', 'Masters', '2023-04-15', '33:30:33'),
(8, 'Desk Officer', 'safnuahfuh', 18000, 'DHAKA', 'Bengal Knittex', 'Masters', '2023-04-30', '33:30:33'),
(9, 'Intern', 'dewetrtt6', 8000, 'BADDA', 'OPUS', 'Masters', '2023-05-16', '15:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `nid`
--

CREATE TABLE `nid` (
  `NID` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nid`
--

INSERT INTO `nid` (`NID`) VALUES
(111),
(222),
(333),
(456),
(1234),
(1928572);

-- --------------------------------------------------------

--
-- Table structure for table `posted_jobs`
--

CREATE TABLE `posted_jobs` (
  `Admin_ID` int(11) NOT NULL,
  `Job_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(6) NOT NULL,
  `theme` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `theme`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `User_ID` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `switchmode` int(3) DEFAULT NULL,
  `notifSet` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `nid`
--
ALTER TABLE `nid`
  ADD PRIMARY KEY (`NID`);

--
-- Indexes for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD PRIMARY KEY (`Admin_ID`,`Job_ID`),
  ADD KEY `Job_ID` (`Job_ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `User_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `Admin_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posted_jobs`
--
ALTER TABLE `posted_jobs`
  ADD CONSTRAINT `posted_jobs_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  ADD CONSTRAINT `posted_jobs_ibfk_2` FOREIGN KEY (`Job_ID`) REFERENCES `jobs` (`Job_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
