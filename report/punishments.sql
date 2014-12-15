-- phpMyAdmin SQL Dump
-- version 4.0.10.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2014 at 01:11 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Nirvana_SQL`
--

-- --------------------------------------------------------

--
-- Table structure for table `punishments`
--

CREATE TABLE IF NOT EXISTS `punishments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID for this punishment',
  `UUID` varchar(32) NOT NULL COMMENT 'UUID of the offender',
  `Username` varchar(16) NOT NULL COMMENT 'Loads the silly username becuase of the rate limiting',
  `Type` enum('ban','mute','kick','warn') NOT NULL COMMENT 'Type of punishment, either ban, mute or warning',
  `Duration` float NOT NULL COMMENT 'The length of the punishment',
  `TimeFormat` enum('minutes','hours','days') NOT NULL COMMENT 'Type of length, either minutes, hours, days',
  `Reason` enum('griefing','stealing','hacking','flying','killaura','quickbow','harassment','spamming','advertising','abusingpms','other') NOT NULL COMMENT 'The reason of which they are been punished for',
  `TimePlaced` datetime NOT NULL COMMENT 'The time of which the punishment was placed',
  `ReportBy` int(11) NOT NULL COMMENT 'The staff member ID whom is filling out this report',
  `Comments` varchar(256) NOT NULL COMMENT 'Any comments that see fit to be added.',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='The ban management system for http://bans.nirvanamc.com' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `punishments`
--

INSERT INTO `punishments` (`ID`, `UUID`, `Username`, `Type`, `Duration`, `TimeFormat`, `Reason`, `TimePlaced`, `ReportBy`, `Comments`) VALUES
(1, '8f65bf20b3e645ffb67ba14a9a54e7b6', 'DiamondXF', 'mute', 1, 'days', 'abusingpms', '2014-10-10 22:33:41', 12, 'Was spamming staff members'),
(2, '069a79f444e94726a5befca90e38aaf5', 'Notch', 'ban', 30, 'minutes', 'advertising', '2014-10-10 18:48:51', 12, 'Caught advertising my dog');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
