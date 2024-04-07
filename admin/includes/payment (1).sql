-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2024 at 05:42 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `north_shore`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phone` int(12) NOT NULL,
  `Amount` decimal(65,2) NOT NULL,
  `Total_amout` decimal(65,2) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp(),
  `DayOfTheWeek` varchar(15) NOT NULL,
  `payment_DayOfTheMonth` int(11) NOT NULL,
  `payment_Month` int(11) NOT NULL,
  `payment_Year` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user_id`, `payment_id`, `firstname`, `lastname`, `email`, `phone`, `Amount`, `Total_amout`, `Time`, `DayOfTheWeek`, `payment_DayOfTheMonth`, `payment_Month`, `payment_Year`) VALUES
(11, 17, 'Abraham', 'Cadet', 'abrahamcadet10@gmail.com', 88888888, '2.00', '2.00', '2024-02-29 23:04:04', '', 0, 0, 0),
(11, 18, 'Firstname on card', 'Lastname on card', 'abrahamcadet10@gmail.com', 88888888, '11.00', '13.00', '2024-03-01 16:45:38', '', 0, 0, 0),
(11, 19, 'Firstname on card', 'Lastname on card', 'abrahamcadet10@gmail.com', 88888888, '11.00', '24.00', '2024-03-01 16:47:13', '', 0, 0, 0),
(11, 20, 'Firstname on card', 'Lastname on card', 'abrahamcadet10@gmail.com', 88888888, '11.12', '35.12', '2024-03-01 16:49:58', '', 0, 0, 0),
(11, 21, 'Firstname on card', 'Lastname on card', 'abrahamcadet10@gmail.com', 88888888, '1.00', '36.12', '2024-03-01 16:50:27', '', 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
