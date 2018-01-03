-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2018 at 01:00 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coupon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

DROP TABLE IF EXISTS `tbl_country`;
CREATE TABLE IF NOT EXISTS `tbl_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(25) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`country_id`, `country_name`, `country_code`) VALUES
(1, 'India', 'IND'),
(2, 'United Kingdom', 'UK'),
(3, 'United States of America', 'USA'),
(4, 'Pakistan', 'PAK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
