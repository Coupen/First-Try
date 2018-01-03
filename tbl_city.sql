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
-- Table structure for table `tbl_city`
--

DROP TABLE IF EXISTS `tbl_city`;
CREATE TABLE IF NOT EXISTS `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(25) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tbl_state` (`state_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
