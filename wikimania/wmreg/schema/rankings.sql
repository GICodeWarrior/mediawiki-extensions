-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: 
-- Generation Time: Dec 31, 2010 at 01:13 PM
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
-- Table structure for table `rankings`
--

CREATE TABLE IF NOT EXISTS `rankings` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `rank` int(11) NOT NULL default '0',
  `criterion` enum('valid','onwiki','offwiki','nationality','representation','special') default NULL,
  `entered_on` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `scholarship_id` (`scholarship_id`),
  KEY `user_id` (`user_id`,`scholarship_id`),
  KEY `user_id_2` (`user_id`,`scholarship_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35029 ;
