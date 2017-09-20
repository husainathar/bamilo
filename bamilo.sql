-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 09:06 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bamilo`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(255) NOT NULL,
  `desc` text,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`attribute_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`, `desc`, `category_id`) VALUES
(1, 'Size', NULL, 1),
(2, 'Material', NULL, 1),
(3, 'Size', NULL, 2),
(4, 'Material', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_options_info`
--

CREATE TABLE IF NOT EXISTS `attribute_options_info` (
  `attribute_options_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  PRIMARY KEY (`attribute_options_info_id`),
  KEY `attribute_id` (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `attribute_options_info`
--

INSERT INTO `attribute_options_info` (`attribute_options_info_id`, `attribute_id`, `option`) VALUES
(1, 1, 'Small(s)'),
(2, 1, 'Medium(M)'),
(3, 1, 'Large(L)'),
(4, 1, 'Extra Large(XL)'),
(5, 2, 'Cotton'),
(6, 2, 'Silk'),
(7, 2, 'Linen'),
(8, 3, '6'),
(9, 3, '7'),
(10, 3, '8'),
(11, 3, '9'),
(12, 4, 'Leather'),
(13, 4, 'Synthetic');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `desc` text,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`category_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `desc`, `parent_id`, `is_active`) VALUES
(1, 'Shirts', NULL, NULL, 1),
(2, 'Shoes', NULL, NULL, 1),
(3, 'T-Shirt', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `desc` text,
  `price` double(22,2) NOT NULL DEFAULT '0.00',
  `status` enum('Available','Not Available','Coming Soon') DEFAULT 'Available',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `model`, `image_url`, `desc`, `price`, `status`, `quantity`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'OLP-1000', 'uploads/products/1.jpg', 'Shirt Description', 500.00, 'Available', 5, NULL, '2017-09-19 09:17:42', NULL, NULL),
(2, 1, 'OLP-1001', 'uploads/products/2.jpg', NULL, 600.00, 'Available', 2, NULL, '2017-09-19 09:17:42', NULL, NULL),
(3, 2, 'SHOES-100', 'uploads/products/3.jpg', NULL, 800.00, 'Available', 8, NULL, '2017-09-19 09:18:56', NULL, NULL),
(4, 2, 'OLX-200', 'uploads/products/4.jpg', NULL, 450.00, 'Available', 5, NULL, '2017-09-19 09:18:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute_info`
--

CREATE TABLE IF NOT EXISTS `product_attribute_info` (
  `product_attribute_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `attribute_options_info_id` int(11) NOT NULL,
  PRIMARY KEY (`product_attribute_info_id`),
  KEY `product_id` (`product_id`),
  KEY `attribute_options_info_id` (`attribute_options_info_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_attribute_info`
--

INSERT INTO `product_attribute_info` (`product_attribute_info_id`, `product_id`, `attribute_options_info_id`) VALUES
(1, 1, 2),
(2, 1, 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `attribute_options_info`
--
ALTER TABLE `attribute_options_info`
  ADD CONSTRAINT `attribute_options_info_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `product_attribute_info`
--
ALTER TABLE `product_attribute_info`
  ADD CONSTRAINT `product_attribute_info_ibfk_2` FOREIGN KEY (`attribute_options_info_id`) REFERENCES `attribute_options_info` (`attribute_options_info_id`),
  ADD CONSTRAINT `product_attribute_info_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
