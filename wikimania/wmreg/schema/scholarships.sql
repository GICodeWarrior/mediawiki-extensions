-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: 
-- Generation Time: Jan 08, 2011 at 06:00 PM
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
-- Table structure for table `scholarships`
--

CREATE TABLE IF NOT EXISTS `scholarships` (
  `id` int(11) NOT NULL auto_increment,
  `fname` varchar(32) character set utf8 default NULL,
  `lname` varchar(32) character set utf8 default NULL,
  `email` varchar(64) default NULL,
  `telephone` varchar(16) default NULL,
  `address` text character set utf8,
  `nationality` varchar(64) default NULL,
  `residence` varchar(64) default NULL,
  `haspassport` tinyint(1) default NULL,
  `airport` varchar(64) character set utf8 default NULL,
  `languages` varchar(64) character set utf8 default NULL,
  `dob` date default NULL,
  `sex` enum('m','f','d') default NULL,
  `occupation` varchar(64) character set utf8 default NULL,
  `areaofstudy` varchar(64) character set utf8 default NULL,
  `wm05` tinyint(1) default NULL,
  `wm06` tinyint(1) default NULL,
  `wm07` tinyint(1) default NULL,
  `wm08` tinyint(1) default NULL,
  `wm09` tinyint(1) default NULL,
  `wm10` tinyint(1) default NULL,
  `presentation` tinyint(1) default NULL,
  `howheard` text character set utf8,
  `why` text character set utf8,
  `future` text character set utf8,
  `username` varchar(64) character set utf8 default NULL,
  `project` text,
  `projectlangs` text,
  `involvement` text character set utf8,
  `contribution` text character set utf8,
  `wantspartial` tinyint(1) NOT NULL default '0',
  `canpaydiff` tinyint(1) NOT NULL default '0',
  `sincere` tinyint(1) NOT NULL default '0',
  `agreestotravelconditions` tinyint(1) NOT NULL default '0',
  `willgetvisa` tinyint(1) NOT NULL default '0',
  `willpayincidentals` tinyint(1) NOT NULL default '0',
  `rank` int(11) NOT NULL default '0',
  `notes` text character set utf8,
  `exclude` tinyint(1) NOT NULL default '0',
  `confirmed` tinyint(1) NOT NULL default '0',
  `confhash` varchar(8) default NULL,
  `entered_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;
