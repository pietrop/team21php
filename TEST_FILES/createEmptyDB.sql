-- phpMyAdmin SQL Dump
-- version 4.2.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2015 at 05:18 PM
-- Server version: 5.6.20
-- PHP Version: 5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `team21`
--
CREATE DATABASE IF NOT EXISTS `team21` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `team21`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `email` varchar(320) NOT NULL,
  `firstName` varchar(160) DEFAULT NULL,
  `lastName` varchar(160) DEFAULT NULL,
  `password` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

DROP TABLE IF EXISTS `assessments`;
CREATE TABLE IF NOT EXISTS `assessments` (
  `assessmentID` int(100) NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `mark` int(100) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Forum`
--

DROP TABLE IF EXISTS `Forum`;
CREATE TABLE IF NOT EXISTS `Forum` (
`postID` int(11) NOT NULL,
  `student_ID` varchar(40) NOT NULL,
  `parentPost_ID` int(11) DEFAULT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupreportassessment`
--

DROP TABLE IF EXISTS `groupreportassessment`;
CREATE TABLE IF NOT EXISTS `groupreportassessment` (
`assessmentID` int(100) unsigned NOT NULL COMMENT 'we need to find a way to increase the max possible size of this column. ',
  `group_ID` int(99) DEFAULT NULL,
  `report_ID` int(99) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(99) NOT NULL,
  `student_ID` varchar(320) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
`reportID` int(99) NOT NULL,
  `group_ID` int(99) NOT NULL COMMENT 'foreign key',
  `abstract` text,
  `review1` text,
  `review2` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `email` varchar(320) NOT NULL DEFAULT '',
  `firstName` varchar(160) DEFAULT NULL,
  `lastName` varchar(160) DEFAULT NULL,
  `password` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `studentswithgroupid`
--
DROP VIEW IF EXISTS `studentswithgroupid`;
CREATE TABLE IF NOT EXISTS `studentswithgroupid` (
`email` varchar(320)
,`firstName` varchar(160)
,`lastName` varchar(160)
,`groupID` int(99)
);
-- --------------------------------------------------------

--
-- Structure for view `studentswithgroupid`
--
DROP TABLE IF EXISTS `studentswithgroupid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `studentswithgroupid` AS select `students`.`email` AS `email`,`students`.`firstName` AS `firstName`,`students`.`lastName` AS `lastName`,`groups`.`groupID` AS `groupID` from (`students` left join `groups` on((`students`.`email` = `groups`.`student_ID`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`email`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
 ADD PRIMARY KEY (`assessmentID`,`criteria`);

--
-- Indexes for table `Forum`
--
ALTER TABLE `Forum`
 ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `groupreportassessment`
--
ALTER TABLE `groupreportassessment`
 ADD PRIMARY KEY (`assessmentID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`groupID`,`student_ID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Forum`
--
ALTER TABLE `Forum`
MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `groupreportassessment`
--
ALTER TABLE `groupreportassessment`
MODIFY `assessmentID` int(100) unsigned NOT NULL AUTO_INCREMENT COMMENT 'we need to find a way to increase the max possible size of this column. ',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
MODIFY `reportID` int(99) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
