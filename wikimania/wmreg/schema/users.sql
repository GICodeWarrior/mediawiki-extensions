-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: 
-- Generation Time: Dec 31, 2010 at 01:14 PM
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(20) default NULL,
  `password` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `reviewer` tinyint(1) default NULL,
  `isvalid` tinyint(1) default NULL,
  `isadmin` tinyint(1) default NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `reviewer`, `isvalid`, `isadmin`) VALUES
(1, 'Harel', '78e73f7a3c979540bb374f7ccd3ef3ce8df97b1b', 'harel.cain@gmail.com', 1, 1, 1);
