-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2015 at 04:50 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `team21`
--
CREATE DATABASE IF NOT EXISTS `team21` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `team21`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `email` varchar(320) NOT NULL,
  `firstName` varchar(160) DEFAULT NULL,
  `lastName` varchar(160) DEFAULT NULL,
  `password` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--
-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `assessmentID` int(100) NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `mark` int(100) DEFAULT NULL,
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
`postID` int(11) NOT NULL,
  `student_ID` varchar(50) NOT NULL,
  `parentPost_ID` int(11) DEFAULT NULL,
  `post` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupreportassessment`
--

CREATE TABLE `groupreportassessment` (
`assessmentID` int(11) NOT NULL,
  `group_ID` int(255) NOT NULL,
  `report_ID` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupreportassessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupID` int(99) NOT NULL,
  `student_ID` varchar(320) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
`reportID` int(99) NOT NULL,
  `group_ID` int(99) NOT NULL COMMENT 'foreign key',
  `abstract` text,
  `review1` text,
  `review2` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `email` varchar(320) NOT NULL DEFAULT '',
  `firstName` varchar(160) DEFAULT NULL,
  `lastName` varchar(160) DEFAULT NULL,
  `password` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

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
-- Indexes for table `forum`
--
ALTER TABLE `forum`
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
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groupreportassessment`
--
ALTER TABLE `groupreportassessment`
MODIFY `assessmentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
MODIFY `reportID` int(99) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;