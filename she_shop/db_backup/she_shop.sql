-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 12:19 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `she_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `machine_name`) VALUES
(1, 'Evening dresses', 'ev-cat.jpg', 'evening-dresses'),
(2, 'Bags', 'bags-cat.jpg', 'bags'),
(3, 'Ballet shoes', 'nice-ballet-shoes.jpg', 'ballet-shoes');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `article`, `menu_id`) VALUES
(1, 'About our company', 'Text demo for article to about page', 1),
(2, 'Company services online', 'Dami text for this services page', 2),
(3, 'About us in israel', 'About israel company article demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `link`, `machine_name`) VALUES
(1, 'About our company', 'About us', 'about'),
(2, 'Our company services', 'Services', 'services');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  `uid` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `data`, `uid`, `order_date`) VALUES
(1, '{"c4ca4238a0b923820dcc509a6f75849b":{"rowid":"c4ca4238a0b923820dcc509a6f75849b","id":"1","qty":"2","price":"85.95","name":"Evening dresses 1","subtotal":171.9},"a87ff679a2f3e71d9181a67b7542122c":{"rowid":"a87ff679a2f3e71d9181a67b7542122c","id":"4","qty":"4","price":"23.99","name":"Evening dresses 2","subtotal":95.96},"1679091c5a880faf6fb5e6087eb1b2dc":{"rowid":"1679091c5a880faf6fb5e6087eb1b2dc","id":"6","qty":"1","price":"6.45","name":"bbd 666 shoes","subtotal":6.45}}', 1, '2015-01-20 13:18:42'),
(2, '{"c81e728d9d4c2f636f067f89cc14862c":{"rowid":"c81e728d9d4c2f636f067f89cc14862c","id":"2","qty":"3","price":"32.50","name":"Bags foo 1","subtotal":97.5},"e4da3b7fbbce2345d7772b0674a318d5":{"rowid":"e4da3b7fbbce2345d7772b0674a318d5","id":"5","qty":"1","price":"64.00","name":"Bags foo 2","subtotal":64},"a87ff679a2f3e71d9181a67b7542122c":{"rowid":"a87ff679a2f3e71d9181a67b7542122c","id":"4","qty":"2","price":"23.99","name":"Evening dresses 2","subtotal":47.98}}', 2, '2015-01-20 13:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `categorie_id`, `machine_name`, `image`, `price`, `visibility`) VALUES
(1, 'Evening dresses 1', 'Evening dresses text demo', 1, 'evening-dresses-1', 'img_2772_2.jpg', '85.95', 1),
(2, 'Bags foo 1', 'demo text desc for Bags foo 1', 2, 'bags-foo-1', '403285.jpg', '32.50', 1),
(3, 'Ballet shoes blerina', 'Ballet shoes blerina is the best ever', 3, 'ballet-shoes-blerina', 'Ballet-Shoes-ballet-35247561-1050-750.jpg', '12.00', 1),
(4, 'Evening dresses 2', 'Evening dresses 2 foo text for check', 1, 'evening-dresses-2', 'img_6479.jpg', '23.99', 1),
(5, 'Bags foo 2', 'demo text desc for Bags foo 2', 2, 'bags-foo-2', 'ladies-designer-bags-b.jpg', '64.00', 1),
(6, 'bbd 666 shoes', 'text demo for bbd 666 shoes', 3, 'bbd-666-shoes', 'Diane_449_Retouch.jpg', '6.45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `uid` int(11) NOT NULL COMMENT 'foreign key for user.id',
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `role`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@domain.com', '983573f9876e89766abfa21fef1262f2f581740d'),
(2, 'Avi aviel', 'avi@walla.com', '983573f9876e89766abfa21fef1262f2f581740d'),
(3, 'Israel', 'israel@dami.net', '983573f9876e89766abfa21fef1262f2f581740d'),
(4, 'hanan', 'hanan@bezeq.net', '7bb2e974e4f6458b6f3dac479cc85f5ea98d78f8'),
(5, 'moshe mosh', 'mosh@moshe.com', '7bb2e974e4f6458b6f3dac479cc85f5ea98d78f8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
