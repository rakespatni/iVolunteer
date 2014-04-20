-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2014 at 09:24 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iv`
--
CREATE DATABASE IF NOT EXISTS `iv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `iv`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` varchar(8) NOT NULL,
  `place` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` text NOT NULL,
  `deadline` date NOT NULL,
  `ph_no` int(10) NOT NULL,
  `evnt_des` text NOT NULL,
  `type_vol` text NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `ph_no` (`ph_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `place`, `date`, `time`, `duration`, `deadline`, `ph_no`, `evnt_des`, `type_vol`) VALUES
('e1', 'delhi', '2014-04-29', '02:00:00', '3', '2014-04-22', 871425, 'blood don', 'doctor'),
('e10', 'chennai', '2014-06-17', '09:00:00', '4', '2014-05-11', 65768, 'science', 'student'),
('e11', 'kannur', '2014-05-10', '09:00:00', '2', '2014-05-03', 657686, 'books', 'student'),
('e13', 'calicut', '2014-05-04', '09:00:00', '3', '2014-04-28', 547656, 'study', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `le1`
--

CREATE TABLE IF NOT EXISTS `le1` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `le10`
--

CREATE TABLE IF NOT EXISTS `le10` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `le11`
--

CREATE TABLE IF NOT EXISTS `le11` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `le13`
--

CREATE TABLE IF NOT EXISTS `le13` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le13`
--

INSERT INTO `le13` (`name`, `phone`) VALUES
('shashank', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `list_id` varchar(10) NOT NULL,
  `Org_name` varchar(10) NOT NULL,
  `list_ref` varchar(10) NOT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `Org_name`, `list_ref`) VALUES
('e1', 'health clu', 'Le1'),
('e10', 'science cl', 'Le10'),
('e11', 'book club', 'Le11'),
('e13', 'studygrup', 'Le13');

-- --------------------------------------------------------

--
-- Table structure for table `vol`
--

CREATE TABLE IF NOT EXISTS `vol` (
  `name` text NOT NULL,
  `age` int(2) NOT NULL,
  `gender` char(6) NOT NULL,
  `occ` text NOT NULL,
  `phno` int(10) NOT NULL,
  `evnts` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`phno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`name`, `age`, `gender`, `occ`, `phno`, `evnts`, `username`, `password`) VALUES
('shashank', 23, 'male', 'student', 1234, 'e13', 'vol1', 'pass1'),
('ram', 23, 'male', 'doctor', 235346, '', 'vol2', 'pass2'),
('reddy', 24, 'male', 'student', 123456789, '', 'vol3', 'pass3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
