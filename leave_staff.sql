-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 11:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_staff`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-11-03 05:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `latitude` decimal(10,6) DEFAULT NULL,
  `longitude` decimal(10,6) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `latitude`, `longitude`, `link`) VALUES
(1, '9.064987', '6.566891', 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `timestamp`, `message`) VALUES
(1, '2023-11-29 20:59:07', 'Robbbery in 2nd street');

-- --------------------------------------------------------

--
-- Table structure for table `tblcrimes`
--

CREATE TABLE `tblcrimes` (
  `id` int(11) NOT NULL,
  `CrimeId` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Occupation` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Number` varchar(100) NOT NULL,
  `Crime` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Img` varchar(200) NOT NULL,
  `Status` int(1) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcrimes`
--

INSERT INTO `tblcrimes` (`id`, `CrimeId`, `FirstName`, `LastName`, `Gender`, `Dob`, `Occupation`, `Address`, `Number`, `Crime`, `Location`, `Img`, `Status`, `Date`) VALUES
(2, 1, 'Shadrach', 'Musa', 'male', '13 February 1990', 'Mechanic', 'jah 33 gag', '2147483647', 'female', 'Layali', '', 1, '2023-11-26 21:07:41'),
(3, 2, 'SANI', 'ABUBAKAR', 'male', '07 November 2023', 'skjsn', 'jah 33 gag', '908777789', 'female', 'Royal Suite', '', 1, '2023-11-26 21:43:21'),
(4, 3, 'MICAH', 'EMMANUEL', 'male', '06 November 2023', 'ss', '1412 BROADWAY NEW YORK NY', '2147483647', 'Robbery', 'Royal Suite', '', 1, '2023-11-26 21:46:26'),
(5, 4, 'KASHIM', 'KELVIN', 'Female', '06 November 2023', 'KKKMM', '1412 BROADWAY NEW YORK NY', '09153108599', 'Rape', 'FL', '', 1, '2023-11-26 21:50:28'),
(6, 10, 'Peter', 'Samuel', 'Male', '15 June 1989', 'Teacher', '26, Murtala Rd', '09152108792', 'Theft', 'Cheche', '', 1, '2023-12-05 05:00:48'),
(7, 11, 'Abel', 'Musa', 'Male', '16 May 2000', 'Student', '7, Murtala Arena Rd', '07052108856', 'Theft', 'Royal Suite', '', 1, '2023-12-05 05:02:53'),
(8, 12, 'Austin', 'Samuel', 'Male', '17 May 1988', 'Teacher', '26, Murtala Rd', '09152108792', 'Robbery', 'Cheche', '', 1, '2023-12-05 05:04:19'),
(9, 13, 'Babsy', 'Kure', 'Male', '17 August 2004', 'Student', '26, Kano District', '08152308792', 'Robbery', 'Layali', '', 1, '2023-12-05 05:06:34'),
(10, 14, 'Hauwa', 'Salihu', 'Female', '17 August 2001', 'Student', '2, GRA District', '08152308792', 'Theft', 'GRA', '', 1, '2023-12-05 05:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `DepartmentShortName` varchar(100) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `DepartmentName`, `DepartmentShortName`, `CreationDate`) VALUES
(2, 'Information Technologies', 'ICT', '2017-11-01 07:19:37'),
(3, 'Library', 'LIb', '2021-05-21 08:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `emp_id` int(11) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(180) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Dob` varchar(100) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Av_leave` varchar(150) NOT NULL,
  `Phonenumber` char(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(30) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`emp_id`, `FirstName`, `LastName`, `EmailId`, `Password`, `Gender`, `Dob`, `Department`, `Address`, `Av_leave`, `Phonenumber`, `Status`, `RegDate`, `role`, `location`) VALUES
(1, 'Janobe', 'Martins', 'janobe@janobe.com', '36d59e2369f00c4d9f336acf4408bae9', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '30', '0248865955', 1, '2017-11-10 11:29:59', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(2, 'David', 'Ene', 'davidikpeme01@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '12 October 2001', 'ICT', '1412 BROADWAY NEW YORK NY', '30', '08088682643', 1, '2017-11-10 13:40:02', 'Admin', '1.jpg'),
(4, 'Nathaniel', 'Nkrumah', 'nat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'Admin', 'NO-IMAGE-AVAILABLE.jpg'),
(5, 'Gideon', 'Annan', 'gideon@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Male', '3 February, 1990', 'ICT', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'HOD', 'photo5.jpg'),
(6, 'Martha', 'Arthur', 'mat@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'LIb', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'Staff', 'NO-IMAGE-AVAILABLE.jpg'),
(7, 'Bridget', 'Gafa', 'bridget@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'ICT', 'N NEPO', '1', '0596667981', 1, '2017-11-10 13:40:02', 'Staff', '1920_File_logo4.png'),
(8, 'Anna', 'Mensah', 'an@gmail.com', 'b4cc344d25a2efe540adbf2678e2304c', 'Female', '3 February, 1990', 'ICT', 'N NEPO', '30', '587944255', 1, '2017-11-10 13:40:02', 'HOD', 'NO-IMAGE-AVAILABLE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblleaves`
--

CREATE TABLE `tblleaves` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(110) NOT NULL,
  `ToDate` varchar(120) NOT NULL,
  `FromDate` varchar(120) NOT NULL,
  `Description` mediumtext NOT NULL,
  `PostingDate` date NOT NULL,
  `AdminRemark` mediumtext DEFAULT NULL,
  `registra_remarks` mediumtext NOT NULL,
  `AdminRemarkDate` varchar(120) DEFAULT NULL,
  `Status` int(1) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT 0,
  `IsRead` int(1) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `num_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleaves`
--

INSERT INTO `tblleaves` (`id`, `LeaveType`, `ToDate`, `FromDate`, `Description`, `PostingDate`, `AdminRemark`, `registra_remarks`, `AdminRemarkDate`, `Status`, `admin_status`, `IsRead`, `empid`, `num_days`) VALUES
(13, 'Casual Leave', '2021-05-02', '2021-05-12', 'I want to take a leave.', '2021-05-20', 'Ok', 'ok', '2021-05-24 20:26:19 ', 1, 1, 1, 7, 3),
(14, 'Medical Leave', '08-05-2021', '11-05-2021', 'Noted', '0000-00-00', 'Not this time', '', '2021-05-21 0:31:10 ', 0, 0, 1, 6, 4),
(16, 'Casual Leave', '02-05-2021', '05-05-2021', 'Nice Leave', '2021-05-20', 'Ok', 'Noted', '2021-05-24 20:42:18 ', 1, 1, 1, 7, 4),
(17, 'Casual Leave', '11-05-2021', '15-05-2021', 'Just', '2021-05-21', 'Leave Approved', 'Noted', '2021-05-24 19:56:45 ', 1, 1, 1, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblleavetype`
--

CREATE TABLE `tblleavetype` (
  `id` int(11) NOT NULL,
  `LeaveType` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `date_from` varchar(200) NOT NULL,
  `date_to` varchar(200) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblleavetype`
--

INSERT INTO `tblleavetype` (`id`, `LeaveType`, `Description`, `date_from`, `date_to`, `CreationDate`) VALUES
(5, 'Casual Leave', 'Casual Leave', '2021-05-23', '2021-06-20', '2021-05-19 14:32:03'),
(6, 'Medical Leave', 'Medical Leave', '2021-05-05', '2021-05-28', '2021-05-19 15:29:05'),
(8, 'Other', 'Leave all staff', '31-05-2021', '04-06-2021', '2021-05-20 17:17:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcrimes`
--
ALTER TABLE `tblcrimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tblleaves`
--
ALTER TABLE `tblleaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UserEmail` (`empid`);

--
-- Indexes for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcrimes`
--
ALTER TABLE `tblcrimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblleaves`
--
ALTER TABLE `tblleaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblleavetype`
--
ALTER TABLE `tblleavetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
