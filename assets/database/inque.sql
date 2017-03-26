-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 07:04 PM
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
  `upload_pdf` text,
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

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_slug`, `upload_pdf`, `categories_description`, `categories_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Kitchen', 'kitchen', '1490536997_bath-catalogue-inque.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting\r\nIndustry. Lorem Ipsum has been the industry''s', 1, '2017-02-16 18:35:45', '0000-00-00 00:00:00', 0),
(2, 'Bathroom', 'bathroom', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting\r\nIndustry. Lorem Ipsum has been the industry''s', 1, '2017-02-18 16:58:07', '0000-00-00 00:00:00', 0),
(3, 'Furniture-Fitting', 'furniture-fitting', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting\r\nIndustry. Lorem Ipsum has been the industry''s', 0, '2017-02-18 17:11:23', '0000-00-00 00:00:00', 0),
(4, 'Office Furniture', 'office-furniture', NULL, 'dsdfsdfsdf', 0, '2017-02-18 17:11:54', '0000-00-00 00:00:00', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(19, 'dsfsdfsdf', 'prince.pandey7@gmail.com', '5654645645', 'gfhfghfgh', NULL, NULL, 'dfgdfgdfg', 1, '2017-03-15 17:58:16'),
(20, 'ffsdfsdf', 'sdfsd@gmail.com', '9865896873', 'addfsdf', NULL, NULL, 'sdfsdfsdf', 1, '2017-03-22 15:15:07'),
(21, 'ffsdfsdf', 'sdfsd@gmail.com', '9865896873', 'addfsdf', NULL, NULL, 'sdfsdfsdf', 1, '2017-03-22 15:15:34'),
(22, '', '', '', '', NULL, NULL, '', 1, '2017-03-22 17:19:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_description`, `event_evenue`, `event_start_date`, `event_end_date`, `event_images`, `event_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Live Space India 2016', 'Be the first to know about the products, store events and other discount information', 'Comment Building, Bandra West, Mumbai, Maharashtra', '2017-03-19', '0000-00-00', NULL, 1, '2017-02-11 02:35:05', '0000-00-00 00:00:00', 0),
(2, 'Live Space India 2016', 'Be the first to know about the products, store events and other discount information', 'Comment Building, Bandra West, Mumbai, Maharashtra ', '2017-03-20', '0000-00-00', NULL, 1, '2017-02-16 18:04:56', '0000-00-00 00:00:00', 0),
(18, 'Live Space India 2016', 'Be the first to know about the products, store events and other discount information', 'Comment Building, Bandra West, Mumbai, Maharashtra', '2017-03-02', '0000-00-00', '14897770520_office-Furniture-bg.png,14897770521_past-event-img.png', 1, '2017-03-07 18:57:32', '0000-00-00 00:00:00', 0),
(19, 'Live Space India 2016', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English.', '2017-04-12', '0000-00-00', '', 1, '2017-03-22 15:30:04', '0000-00-00 00:00:00', 0),
(20, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin.', '2017-04-06', '0000-00-00', '', 1, '2017-03-22 15:30:52', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(255) DEFAULT NULL,
  `gallery_description` text,
  `gallery_main_image` varchar(100) DEFAULT NULL,
  `gallery_thumnail_image` varchar(100) DEFAULT NULL,
  `gallery_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_description`, `gallery_main_image`, `gallery_thumnail_image`, `gallery_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(2, 'dfs', 'fsdfsdfsdf', '47311489856996_gof-700x442.png', '58431489856996_01.png', 1, '2017-03-18 17:09:56', '0000-00-00 00:00:00', 0),
(3, 'dfg', 'dfgdfgdfgdfg', '70081490199194_013tree copy.jpg', '50101490199194_013tree copy.jpg', 1, '2017-03-22 16:13:14', '0000-00-00 00:00:00', 0),
(4, 'sdf', 'sdfsdfsdfsdf', '37331490199231_18.jpg', '28591490199231_18.jpg', 1, '2017-03-22 16:13:51', '0000-00-00 00:00:00', 0),
(5, 'ghfg', 'hfghfghfghfghg', '98021490199246_19.jpg', '30851490199246_19.jpg', 1, '2017-03-22 16:14:06', '0000-00-00 00:00:00', 0),
(6, 'The standard Lorem Ipsum passage, used since the 1500s', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '65671490199268_20.jpg', '85091490199268_20.jpg', 1, '2017-03-22 16:14:28', '0000-00-00 00:00:00', 0),
(8, 'The standard Lorem Ipsum passage, used since the 1500s', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '43901490199307_015.JPG', '80951490199307_015.JPG', 0, '2017-03-22 16:15:07', '0000-00-00 00:00:00', 0),
(10, 'The standard Lorem Ipsum passage, used since the 1500s', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '78111490199471_01918_midastouch_1600x1200.jpg', '43461490199471_01918_midastouch_1600x1200.jpg', 1, '2017-03-22 16:15:49', '0000-00-00 00:00:00', 0),
(11, 'The standard Lorem Ipsum passage, used since the 1500s', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '13851490199727_01930_FERRARIPASSION_1920X1200.JPG', '99711490199727_01930_FERRARIPASSION_1920X1200.JPG', 1, '2017-03-22 16:22:07', '0000-00-00 00:00:00', 0),
(12, 'asdsad', 'asdsad', '69021490201517_3.jpg', '74571490201517_3.jpg', 1, '2017-03-22 16:51:57', '0000-00-00 00:00:00', 0),
(13, 'fsdsdfsdfsdfsdfsdf', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '98831490201541_09.JPG', '98071490201541_09.JPG', 1, '2017-03-22 16:52:21', '0000-00-00 00:00:00', 0),
(14, 'dsdfsdfsd', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '74651490201588_2011.jpg', '43121490201588_2011.jpg', 1, '2017-03-22 16:53:08', '0000-00-00 00:00:00', 0),
(15, 'Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '25161490201625_464358_10150823892474384_406433779383_11866132_375325403_o.jpg', '74251490201625_464358_10150823892474384_406433779383_11866132_375325403_o.jpg', 1, '2017-03-22 16:53:45', '0000-00-00 00:00:00', 0),
(16, 'The standard Lorem Ipsum passage, used since the 1500s', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '61701490201660_1071109674[1].jpg', '88131490201660_1071109674[1].jpg', 1, '2017-03-22 16:54:20', '0000-00-00 00:00:00', 0),
(17, 'The standard Lorem Ipsum passage, used since the 1500s', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '20731490201680_1234341610.jpg', '13531490201680_1234341610.jpg', 1, '2017-03-22 16:54:40', '0000-00-00 00:00:00', 0),
(18, 'The standard Lorem Ipsum passage, used since the 1500s', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '22911490201706_abstract_0053.jpg', '36891490201706_abstract_0053.jpg', 1, '2017-03-22 16:55:06', '0000-00-00 00:00:00', 0),
(19, 'The standard Lorem Ipsum passage, used since the 1500s', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '40261490201733_abstract_0031.jpg', '41171490201733_abstract_0031.jpg', 1, '2017-03-22 16:55:33', '0000-00-00 00:00:00', 0);

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
  `categories_id` int(11) DEFAULT NULL,
  `subcategories_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `finish` varchar(100) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `features` text,
  `product_main_image` text,
  `product_thum_image` text,
  `kit_package_image` text,
  `planning_image` text,
  `product_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `subcategories_id`, `title`, `size`, `finish`, `height`, `material`, `features`, `product_main_image`, `product_thum_image`, `kit_package_image`, `planning_image`, `product_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 1, 1, 'EVA Slim Box Standard Drawer', '400/450/500/550/600/650/700', 'White & Gray', 'Drawer side heigth 200', '', 'sdfsdfsdfsdf', '1_1490375619_Product_Details_page_img.jpg', '1_1490375619_06.png', '1_1490375619_Product_Details_page_bottom_img01.jpg', NULL, 1, '2017-03-11 16:20:58', '0000-00-00 00:00:00', 0),
(2, 1, 1, 'EVA Slim Box Standard Drawer', '400/450/500/550/600/650/700', 'White & Grey', 'Drawer sides height 95mm', '', '', '1_1490375619_Product_Details_page_img.jpg', '1_1490375619_06.png', NULL, NULL, 1, '2017-03-24 17:21:22', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_product_catalogue`
--

CREATE TABLE IF NOT EXISTS `request_product_catalogue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT '0',
  `creted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_categories_id`, `categories_id`, `sub_categories_name`, `sub_categories_slug`, `sub_categories_description`, `sub_categories_status`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 1, 'EVA Slim Box Drawer k', 'eva-slim-box-drawer', 'asdsfsdf', 1, '2017-02-18 16:41:23', '0000-00-00 00:00:00', 0),
(2, 1, 'Rolling Shutter k', 'rolling-shutter', 'dsfsdfsdfsdf', 1, '2017-02-18 16:58:00', '0000-00-00 00:00:00', 0),
(3, 2, 'EVA Slim Box Drawer b', 'eva-slim-box-drawer', 'sdfsdfsdf', 1, '2017-02-18 16:58:22', '0000-00-00 00:00:00', 0),
(4, 2, 'Rolling Shutter b', 'rolling-shutter', 'sdfsdf', 1, '2017-03-20 16:43:21', '0000-00-00 00:00:00', 0);

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
