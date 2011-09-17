-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2010 at 09:35 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `unique_code` varchar(8) NOT NULL,
  `given_name` varchar(24) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(24) CHARACTER SET utf8 NOT NULL,
  `sex` enum('m','f','d') NOT NULL,
  `country` varchar(4) NOT NULL,
  `langn` varchar(4) NOT NULL,
  `lang1` varchar(4) NOT NULL,
  `lang1-level` enum('1','2','3','4') NOT NULL,
  `lang2` varchar(4) NOT NULL,
  `lang2-level` enum('1','2','3','4') NOT NULL,
  `lang3` varchar(4) NOT NULL,
  `lang3-level` enum('1','2','3','4') NOT NULL,
  `wiki_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `wiki_language` varchar(12) NOT NULL,
  `wiki_project` varchar(12) NOT NULL,
  `email` varchar(48) CHARACTER SET utf8 NOT NULL,
  `join_date` set('1','2','3','4','5','6','7') NOT NULL,
  `tours` enum('','1','2','3','4','5') NOT NULL,
  `showname` set('1','2','3') NOT NULL,
  `custom_showname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `size` enum('XXS','XS','S','M','L','XL','XXL','XXXL') NOT NULL,
  `color` enum('W','B') NOT NULL,
  `food` enum('','1','2','3') NOT NULL,
  `food_other` varchar(64) CHARACTER SET utf8 NOT NULL,
  `visa_assistance` tinyint(1) NOT NULL,
  `nationality` varchar(4) NOT NULL,
  `passport` varchar(30) CHARACTER SET utf8 NOT NULL,
  `passport_valid` date NOT NULL,
  `passport_issued` varchar(30) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  `countryofbirth` varchar(4) NOT NULL,
  `homeaddress` text CHARACTER SET utf8 NOT NULL,
  `visa_assistance_description` text CHARACTER SET utf8 NOT NULL,
  `nights` set('1','2','3','4','5','6','7','8') NOT NULL,
  `room` enum('','1','2','3') NOT NULL,
  `room_partner` varchar(64) CHARACTER SET utf8 NOT NULL,
  `room_requests` text CHARACTER SET utf8 NOT NULL,
  `hotels` enum('','1','2','3','4','5','6','7','8') NOT NULL,
  `receipt` tinyint(1) NOT NULL,
  `receipt_address` text CHARACTER SET utf8 NOT NULL,
  `discount_code` varchar(16) CHARACTER SET utf8 NOT NULL,
  `signuptime` datetime NOT NULL,
  `cost_total` smallint(6) NOT NULL,
  `paypal` tinyint(1) NOT NULL,
  UNIQUE KEY `unique_code` (`unique_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
