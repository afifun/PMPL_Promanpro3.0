-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2014 at 08:17 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7
-- Generation Time: Apr 15, 2014 at 01:01 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `promanpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `invitation`
--

CREATE TABLE IF NOT EXISTS `invitation` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `idProject` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------


--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` text,
  `PJ` varchar(20) NOT NULL,
  `Progress` int(11) NOT NULL,
  `Start_Time` date NOT NULL,
  `End_Time` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`ID`, `pID`, `Name`, `Description`, `PJ`, `Progress`, `Start_Time`, `End_Time`) VALUES
(1, 0, 'test', NULL, '', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Name`, `Email`) VALUES
(2, 'testname', 'testpwd', 'test', 'test@test.com'),
(3, 'testname2', 'test2', 'test2', 'test2@test.com'),
(4, 'aa', 'aa', 'aa', 'aa@aa.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
