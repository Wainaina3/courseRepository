-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 05:52 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courserepo`
--

-- --------------------------------------------------------

--
-- Table structure for table `courseoutline`
--

CREATE TABLE IF NOT EXISTS `courseoutline` (
  `courseId` varchar(200) NOT NULL,
  `courseTitle` varchar(255) NOT NULL,
  `courseObjectives` text NOT NULL,
  `scheduleTableName` varchar(255) NOT NULL,
  `courseEvaluation` text NOT NULL,
  `readings` text NOT NULL,
  `courseSemester` varchar(200) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `departmentId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `courseoutline`
--
DELIMITER $$
CREATE TRIGGER `storeDeletedOutlines` BEFORE DELETE ON `courseoutline`
 FOR EACH ROW INSERT IGNORE INTO deletedcourseoutline (
   courseId,
   courseTitle,
   courseObjectives,
   scheduleTableName,
   courseEvaluation,
   readings,
   courseSemester,
   facultyId,
   departmentId
 ) VALUES (
   OLD.courseId,
   OLD.courseTitle,
   OLD.courseObjectives,
   OLD.scheduleTableName,
   OLD.courseEvaluation,
   OLD.readings,
   OLD.courseSemester,
   OLD.facultyId,
   OLD.departmentId
 )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deletedcourseoutline`
--

CREATE TABLE IF NOT EXISTS `deletedcourseoutline` (
  `courseId` varchar(200) NOT NULL,
  `courseTitle` varchar(255) NOT NULL,
  `courseObjectives` text NOT NULL,
  `scheduleTableName` varchar(255) NOT NULL,
  `courseEvaluation` text NOT NULL,
  `readings` text NOT NULL,
  `courseSemester` varchar(200) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `departmentId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `departmentId` varchar(250) NOT NULL,
  `departmentName` varchar(255) NOT NULL,
  `deparmentHOD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyId` int(11) NOT NULL,
  `facultyUsername` varchar(200) NOT NULL,
  `facultyFirstName` varchar(200) NOT NULL,
  `facultyLastName` varchar(200) NOT NULL,
  `departmentId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pdffiletable`
--

CREATE TABLE IF NOT EXISTS `pdffiletable` (
  `courseId` varchar(200) NOT NULL,
  `courseTitle` varchar(200) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `facultyId` int(11) NOT NULL,
  `fileId` varchar(200) NOT NULL,
  `storageLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scheduletable`
--

CREATE TABLE IF NOT EXISTS `scheduletable` (
  `courseId` varchar(200) NOT NULL,
  `date` varchar(255) NOT NULL,
  `tasks` text NOT NULL,
  `topics` varchar(255) NOT NULL,
  `week` varchar(200) NOT NULL,
  `milestone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `jwi_user_id` int(11) NOT NULL,
  `jwi_user_code` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_department` enum('None','1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_type` enum('Regular','Admin') COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_status` enum('Enabled','Disabled','Deleted') COLLATE utf8_unicode_ci NOT NULL,
  `jwi_user_propic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jwi_user_dob` date DEFAULT NULL,
  `jwi_user_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jwi_user_contact` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jwi_user_cv` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courseoutline`
--
ALTER TABLE `courseoutline`
  ADD UNIQUE KEY `courseId` (`courseId`),
  ADD UNIQUE KEY `courseTitle` (`courseTitle`);

--
-- Indexes for table `deletedcourseoutline`
--
ALTER TABLE `deletedcourseoutline`
  ADD UNIQUE KEY `courseId` (`courseId`),
  ADD UNIQUE KEY `courseTitle` (`courseTitle`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`jwi_user_id`),
  ADD UNIQUE KEY `jwi_user_code` (`jwi_user_code`),
  ADD UNIQUE KEY `jwi_user_username` (`jwi_user_username`),
  ADD UNIQUE KEY `jwi_user_email` (`jwi_user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `jwi_user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
