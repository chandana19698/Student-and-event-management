-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 03:13 PM
-- Server version: 5.5.27
-- PHP Version: 5.6.18

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventregistration`
--

CREATE TABLE IF NOT EXISTS `eventregistration` (
  `ID` varchar(250) NOT NULL,
  `NAME` varchar(250) NOT NULL,
  `PHONE` INTEGER(250) NOT NULL,
  `USERNAME` varchar(250) NOT NULL,
  `EVENT_NAME` varchar(250) NOT NULL,
  `E_ID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventregistration`
--

INSERT INTO `userlogin` (`ID`, `NAME`, `PHONE`,`USERNAME`,`EVENT_NAME`,`E_ID`) VALUES
(1, 'chandana', '1234567890','chandana','hacker rank','1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
