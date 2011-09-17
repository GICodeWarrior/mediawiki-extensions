-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: 
-- Generation Time: Jan 18, 2011 at 06:00 PM
-- Server version: 5.0.54
-- PHP Version: 5.3.3-pl1-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db00009`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `unique_code` varchar(8) NOT NULL,
  `given_name` varchar(24) character set utf8 NOT NULL,
  `surname` varchar(24) character set utf8 NOT NULL,
  `sex` enum('m','f','d') NOT NULL,
  `country` varchar(4) NOT NULL,
  `langn` varchar(4) NOT NULL,
  `lang1` varchar(4) NOT NULL,
  `lang1-level` enum('1','2','3','4') NOT NULL,
  `lang2` varchar(4) NOT NULL,
  `lang2-level` enum('1','2','3','4') NOT NULL,
  `lang3` varchar(4) NOT NULL,
  `lang3-level` enum('1','2','3','4') NOT NULL,
  `wiki_id` varchar(100) character set utf8 NOT NULL,
  `wiki_language` varchar(12) NOT NULL,
  `wiki_project` varchar(12) NOT NULL,
  `email` varchar(48) character set utf8 NOT NULL,
  `join_date` set('1','2','3','4','5','6','7') NOT NULL,
  `tours` enum('','1','2','3','4','5') NOT NULL,
  `showname` set('1','2','3') NOT NULL,
  `custom_showname` varchar(30) character set utf8 NOT NULL,
  `size` enum('XXS','XS','S','M','L','XL','XXL','XXXL') NOT NULL,
  `color` enum('W','B') default NULL,
  `food` enum('','1','2','3') NOT NULL,
  `food_other` varchar(64) character set utf8 NOT NULL,
  `visa_assistance` tinyint(1) NOT NULL,
  `nationality` varchar(4) NOT NULL,
  `passport` varchar(30) character set utf8 NOT NULL,
  `passport_valid` date default NULL,
  `passport_issued` varchar(30) character set utf8 NOT NULL,
  `birthday` date default NULL,
  `countryofbirth` varchar(4) NOT NULL,
  `homeaddress` text character set utf8 NOT NULL,
  `visa_assistance_description` text character set utf8 NOT NULL,
  `nights` set('1','2','3','4','5','6','7','8') NOT NULL,
  `room` enum('','1','2','3') NOT NULL,
  `room_partner` varchar(64) character set utf8 NOT NULL,
  `room_number` varchar(5) character set utf8 default NULL,
  `room_requests` text character set utf8 NOT NULL,
  `hotels` enum('','1','2','3','4','5','6','7','8','9') NOT NULL,
  `discount_code` varchar(16) character set utf8 NOT NULL,
  `signuptime` datetime NOT NULL,
  `attendance_cost` decimal(10,2) NOT NULL,
  `accommodation_cost` decimal(10,2) NOT NULL,
  `vat_cost` decimal(10,2) NOT NULL,
  `cost_total` decimal(10,2) NOT NULL,
  `currency` varchar(4) NOT NULL,
  `paypal` tinyint(1) NOT NULL,
  `cost_paid` decimal(10,2) NOT NULL,
  `status` smallint(6) NOT NULL,
  UNIQUE KEY `unique_code` (`unique_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
