-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2014 at 09:09 PM
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
  `event_id` varchar(20) NOT NULL,
  `place` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` text NOT NULL,
  `deadline` date NOT NULL,
  `ph_no` int(10) NOT NULL,
  `evnt_des` text NOT NULL,
  `type_vol` text NOT NULL,
  `vol_strength_needed` int(11) NOT NULL,
  `posted_by` varchar(20) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `ph_no` (`ph_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `place`, `date`, `time`, `duration`, `deadline`, `ph_no`, `evnt_des`, `type_vol`, `vol_strength_needed`, `posted_by`) VALUES
('e10', '', '2014-06-17', '09:00:00', '4', '2014-05-11', 65768, 'science', 'student', 4, 's2'),
('e11', '', '2014-05-10', '09:00:00', '2', '2014-05-03', 657686, 'books', 'student', 3, 's2'),
('e13', '', '2014-05-04', '09:00:00', '3', '2014-04-28', 547656, 'study', 'student', 2, 's3'),
('e14', '', '2014-04-26', '13:00:00', '2', '2014-04-23', 567879, 'computers', 'student', 3, 's4'),
('e16', '', '2014-05-07', '13:00:00', '2', '2014-04-26', 2147483647, 'biology', 'student', 8, 's2'),
('e18', '', '2014-05-24', '13:00:00', '2', '2014-04-08', 5334535, 'maths', 'student', 6, 's3'),
('e19', '', '2014-05-30', '13:00:00', '2', '2014-04-26', 5334535, 'phy', 'student', 6, 's5'),
('e33', '', '2014-06-14', '14:58:00', '4', '2014-05-22', 456, 'fiytf', 'student', 3, 's4'),
('e44', '', '2014-05-30', '13:00:00', '2', '2014-04-26', 5334535, 'phy', 'student', 5, 's5'),
('e57', '', '2014-05-08', '05:00:00', '2', '2014-04-28', 123456789, 'fun', 'student', 8, 's1');

-- --------------------------------------------------------

--
-- Table structure for table `le10`
--

CREATE TABLE IF NOT EXISTS `le10` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le10`
--

INSERT INTO `le10` (`name`, `phone`) VALUES
('shashank', 1234),
('rakesh', 476587),
('reddy', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `le11`
--

CREATE TABLE IF NOT EXISTS `le11` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le11`
--

INSERT INTO `le11` (`name`, `phone`) VALUES
('reddy', 123456789),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('shashank', 1234),
('shashank', 1234);

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
('reddy', 123456789),
('rakesh', 476587),
('shashank', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `le14`
--

CREATE TABLE IF NOT EXISTS `le14` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le14`
--

INSERT INTO `le14` (`name`, `phone`) VALUES
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('shashank', 1234),
('rakesh', 476587),
('shashank', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `le16`
--

CREATE TABLE IF NOT EXISTS `le16` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le16`
--

INSERT INTO `le16` (`name`, `phone`) VALUES
('rakesh', 476587),
('rakesh', 476587),
('shashank', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `le18`
--

CREATE TABLE IF NOT EXISTS `le18` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `le19`
--

CREATE TABLE IF NOT EXISTS `le19` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le19`
--

INSERT INTO `le19` (`name`, `phone`) VALUES
('rakesh', 476587),
('shashank', 1234),
('reddy', 123456789),
('shashank', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `le33`
--

CREATE TABLE IF NOT EXISTS `le33` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le33`
--

INSERT INTO `le33` (`name`, `phone`) VALUES
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587),
('rakesh', 476587);

-- --------------------------------------------------------

--
-- Table structure for table `le44`
--

CREATE TABLE IF NOT EXISTS `le44` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `le57`
--

CREATE TABLE IF NOT EXISTS `le57` (
  `name` varchar(20) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('e10', 'science cl', 'Le10'),
('e11', 'book club', 'Le11'),
('e13', 'studygrup', 'Le13'),
('e14', 'csi', 'Le14'),
('e16', 'heart inst', 'Le16'),
('e18', 'heart inst', 'Le18'),
('e19', 'msc', 'Le19'),
('e33', 'hjuh', 'Le33'),
('e44', 'msc', 'Le44'),
('e57', 'social', 'Le57');

-- --------------------------------------------------------

--
-- Table structure for table `seeker`
--

CREATE TABLE IF NOT EXISTS `seeker` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `Org_name` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeker`
--

INSERT INTO `seeker` (`user`, `pass`, `Org_name`, `phone`, `address`) VALUES
('s1', 'p1', 'social', 123456789, 'delhi\r\nindia');

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
  `evnts` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`phno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vol`
--

INSERT INTO `vol` (`name`, `age`, `gender`, `occ`, `phno`, `evnts`, `username`, `password`) VALUES
('shashank', 23, 'male', 'student', 1234, '   ,e19 ', 'vol1', 'pass1'),
('ram', 23, 'male', 'doctor', 235346, '', 'vol2', 'pass2'),
('rakesh', 24, 'm', 'student', 476587, ' ', 'vol4', 'pass4'),
('reddy', 24, 'male', 'student', 123456789, '   ', 'vol3', 'pass3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
