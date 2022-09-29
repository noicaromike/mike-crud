-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2022 at 06:17 AM
-- Server version: 5.7.36
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myway_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `users_id`, `product_code`, `name`, `price`, `description`, `qty`, `created_at`, `updated_at`) VALUES
(1, 6, '0005', 'Arabica medium roast', '300', 'Arabica Coffee', '500', '2022-09-28 07:06:54', '2022-09-28 07:06:54'),
(2, 6, '0006', 'Dairy Milk', '90', 'Fresh Milk', '200', '2022-09-28 10:53:12', '2022-09-28 10:53:12'),
(3, 6, '0007', 'Cup', '5', '12oz cup', '1000', '2022-09-28 11:43:48', '2022-09-28 11:43:48'),
(8, 6, '0008', 'Dairy Milk', '90', 'milk', '500', '2022-09-28 20:13:46', '2022-09-29 06:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `address`, `created_at`) VALUES
(8, 'Angelita', 'Oracion', 'angelita@gmail.com', '$2y$10$mXYHU25XpygGDHiNyjdZeu/BYT8XwaqeK6ux2m5R/87PdHaB3aSnq', '09514930557', '66 San Juan II', '2022-09-27 15:19:04'),
(6, 'Michael', 'Oracion', 'oracionmike2@gmail.com', '$2y$10$LbogcYmJydYCfoXcE0mWIeVny0/PyCWuOukvV6di9hlUZmjF7dWIK', '09514930557', '66 San Juan II', '2022-09-27 12:53:00'),
(7, 'Michael', 'Oracion', 'test@test.com', '$2y$10$FXdgSvY1tW5rDvfmjLiOr.YVG5vFWI8LTSexSMxg55VfCqv7haMc.', '09514930557', '66 San Juan II', '2022-09-27 13:02:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
