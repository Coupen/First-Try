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
-- Table structure for table `tbl_state`
--

DROP TABLE IF EXISTS `tbl_state`;
CREATE TABLE IF NOT EXISTS `tbl_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(25) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`state_id`),
  UNIQUE KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD CONSTRAINT `tbl_state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `tbl_country` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
