-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 08:57 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inque`
--
CREATE DATABASE IF NOT EXISTS `inque` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inque`;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE IF NOT EXISTS `careers` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image_1` varchar(1000) NOT NULL,
  `image_2` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `careers_mail`
--

CREATE TABLE IF NOT EXISTS `careers_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `resume` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `careers_mail`
--

INSERT INTO `careers_mail` (`id`, `name`, `email`, `phone`, `city`, `state`, `country`, `message`, `resume`, `status`, `created_on`) VALUES
(1, 'sdfsdf', 'hfghfgh@gmail.com', '6765756', 'gfhfg', 'jghj', 'asd', 'asdasdasd', 'html file.docx', 1, '2017-03-15 18:02:17'),
(2, 'asd', 'pandeypriyanka775@gmail.com', '45645645645', 'gfhfg', 'fghf', 'ghfghfg', 'hfghfghfgh', 'PHP Interview Q.docx', 1, '2017-03-18 16:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(50) NOT NULL,
  `categories_slug` varchar(50) NOT NULL,
  `categories_description` text,
  `categories_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_slug`, `categories_description`, `categories_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Kitchen', 'kitchen', 'sdfsdfadfsdfsds dsf sdfsdf sdf sdf sdfsd fsdf dsf sdfdsfsdfsdfs dsdfs dfsdf sdf sdf sdfsd f', 1, '2017-02-16 18:35:45', '0000-00-00 00:00:00', 0),
(2, 'Bathroom', 'bathroom', 'sdfs dfsdsd', 1, '2017-02-18 16:58:07', '0000-00-00 00:00:00', 0),
(3, 'Furniture-Fitting', 'furniture-fitting', 'sdfsdf', 0, '2017-02-18 17:11:23', '0000-00-00 00:00:00', 0),
(4, 'Office Furniture', 'office-furniture', 'dsdfsdfsdf', 0, '2017-02-18 17:11:54', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `message` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `city`, `state`, `country`, `message`, `status`, `created_on`) VALUES
(1, 'fsdfsdfsdf', 'test@gmail.com', '8767898765', 'dsfsdfs', NULL, NULL, 'sdfsdfsdf', 1, '2017-03-15 16:02:38'),
(2, 'dfgdfgdfg', 'hfghfgh@gmail.com', '5678987654', 'gdflk;kl;', NULL, NULL, 'kl;kl;kl;', 1, '2017-03-15 16:05:26'),
(3, 'gfhgf', 'sdf@gmail.com', '5678765456', 'fghgf', NULL, NULL, 'hfghfgh', 1, '2017-03-15 16:06:28'),
(4, 'ghfghfg', 'hfghfgh@gmail.com', '7657657567', 'ghjghjghjghj', NULL, NULL, 'ghjghjghj', 1, '2017-03-15 17:53:15'),
(5, 'ghfghfg', 'hfghfgh@gmail.com', '7657657567', 'ghjghjghjghj', NULL, NULL, 'ghjghjghj', 1, '2017-03-15 17:53:21'),
(6, 'ghfghfg', 'hfghfgh@gmail.com', '7657657567', 'ghjghjghjghj', NULL, NULL, 'ghjghjghj', 1, '2017-03-15 17:53:23'),
(7, 'dsfsdf', 'hfghfgh@gmail.com', '6575675674', 'dfgdfg', NULL, NULL, 'dfgfdfgfdg', 1, '2017-03-15 17:54:47'),
(8, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:55:59'),
(9, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:56:00'),
(10, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:56:00'),
(11, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:56:01'),
(12, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:56:01'),
(13, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:56:01'),
(14, 'sdfsdf', 'hfghfgh@gmail.com', '9856985474', 'dfgdfgdfg', NULL, NULL, 'dfgdfg', 1, '2017-03-15 17:56:01'),
(15, 'dgdfgdfg', 'sdfdsfsdf@gmail.com', '6575675675', 'fghgf', NULL, NULL, 'hfghfgh', 1, '2017-03-15 17:56:43'),
(16, 'dgdfgdfg', 'sdfdsfsdf@gmail.com', '6575675675', 'fghgf', NULL, NULL, 'hfghfgh', 1, '2017-03-15 17:56:44'),
(17, 'dsfsdfsdf', 'prince.pandey7@gmail.com', '5654645645', 'gfhfghfgh', NULL, NULL, 'dfgdfgdfg', 1, '2017-03-15 17:57:27'),
(18, 'dsfsdfsdf', 'prince.pandey7@gmail.com', '5654645645', 'gfhfghfgh', NULL, NULL, 'dfgdfgdfg', 1, '2017-03-15 17:58:15'),
(19, 'dsfsdfsdf', 'prince.pandey7@gmail.com', '5654645645', 'gfhfghfgh', NULL, NULL, 'dfgdfgdfg', 1, '2017-03-15 17:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) DEFAULT NULL,
  `event_description` text,
  `event_evenue` text,
  `event_start_date` date NOT NULL DEFAULT '0000-00-00',
  `event_end_date` date NOT NULL DEFAULT '0000-00-00',
  `event_images` text,
  `event_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_evenue`, `event_start_date`, `event_end_date`, `event_images`, `event_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Live Space India 2016', 'Be the first to know about the products, store events and other discount information', 'Comment Building, Bandra West, Mumbai, Maharashtra', '2017-03-19', '0000-00-00', NULL, 1, '2017-02-11 02:35:05', '0000-00-00 00:00:00', 0),
(2, 'Live Space India 2016', 'Be the first to know about the products, store events and other discount information', 'Comment Building, Bandra West, Mumbai, Maharashtra ', '2017-03-20', '0000-00-00', NULL, 1, '2017-02-16 18:04:56', '0000-00-00 00:00:00', 0),
(18, 'Live Space India 2016', 'Be the first to know about the products, store events and other discount information', 'Comment Building, Bandra West, Mumbai, Maharashtra', '2017-03-02', '0000-00-00', '14897770520_office-Furniture-bg.png,14897770521_past-event-img.png', 1, '2017-03-07 18:57:32', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(255) DEFAULT NULL,
  `gallery_description` text,
  `gallery_main_image` varchar(50) DEFAULT NULL,
  `gallery_thumnail_image` varchar(50) DEFAULT NULL,
  `gallery_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_description`, `gallery_main_image`, `gallery_thumnail_image`, `gallery_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(2, 'dfs', 'fsdfsdfsdf', '47311489856996_gof-700x442.png', '58431489856996_01.png', 1, '2017-03-18 17:09:56', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `home_enquiry`
--

CREATE TABLE IF NOT EXISTS `home_enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `telephone` varchar(1000) NOT NULL,
  `fax` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE IF NOT EXISTS `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `pdf` varchar(1100) NOT NULL,
  `type` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pdf_mail`
--

CREATE TABLE IF NOT EXISTS `pdf_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `pdf_category` varchar(100) NOT NULL,
  `pdf_subcategory` varchar(100) NOT NULL,
  `pdf_name` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `finish` varchar(100) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `features` text,
  `product_main_image` text,
  `product_thum_image` text,
  `kit_package_image` text,
  `product_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `size`, `finish`, `height`, `material`, `features`, `product_main_image`, `product_thum_image`, `kit_package_image`, `product_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'fghgfh', '566', 'White & Gray', 'Drawer side heigth 200', '', 'sdfsdfsdfsdf', NULL, NULL, NULL, 1, '2017-03-11 16:20:58', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `sub_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `sub_categories_name` varchar(50) NOT NULL,
  `sub_categories_slug` varchar(50) NOT NULL,
  `sub_categories_description` text,
  `sub_categories_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sub_categories_id`),
  KEY `categories_id` (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_categories_id`, `categories_id`, `sub_categories_name`, `sub_categories_slug`, `sub_categories_description`, `sub_categories_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 1, 'kitchen1', 'kitchen1', 'asdsfsdf', 1, '2017-02-18 16:41:23', '0000-00-00 00:00:00', 0),
(2, 1, 'fsdfsdf sdf sdf sdf sdfsd fsdf sdfsd fsd f', 'fsdfsdf-sdf-sdf-sdf-sdfsd-fsdf-sdfsd-fsd-f', 'dsfsdfsdfsdf', 1, '2017-02-18 16:58:00', '0000-00-00 00:00:00', 0),
(3, 2, ' sdfsdfsdfsdf', '-sdfsdfsdfsdf', 'sdfsdfsdf', 1, '2017-02-18 16:58:22', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` datetime NOT NULL,
  `created_ip` varchar(20) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_ip` varchar(20) NOT NULL,
  `lastlogintime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `created`, `created_ip`, `modified`, `modified_ip`, `lastlogintime`) VALUES
(1, 'Prince', 'Pandey', 'admin', '0192023a7bbd73250516f069df18b500', '0000-00-00 00:00:00', '', '2017-02-19 15:16:41', '', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
