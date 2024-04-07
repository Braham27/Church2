-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2024 at 05:39 AM
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `user_firstname` varchar(250) NOT NULL,
  `user_lastname` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_email` text NOT NULL,
  `user_image` text NOT NULL,
  `user_ministry` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `user_address` text NOT NULL,
  `user_city` varchar(250) NOT NULL,
  `user_state` varchar(250) NOT NULL,
  `user_zip` int(12) NOT NULL,
  `user_description` varchar(250) NOT NULL,
  `user_tel` int(15) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_image`, `user_ministry`, `position`, `user_address`, `user_city`, `user_state`, `user_zip`, `user_description`, `user_tel`, `Status`) VALUES
(48, 'braham27', 'Abraham', 'Cadet', '$2y$10$kHMSIS7W7JOA7xW/veRYDuT.RXtlsM.f7JHpAWg16BRMaGexjGtkW', 'Maricharleshermione@gmail.com', 'Businessman.png', 'men', 'President', '', 'Hollywood', 'Massachussets', 33002, 'Say Something About This Member?', 111, 'Inactive'),
(49, 'tscadet@gmail.com', 'test', 'tes', 'fb2f14ae4cf8ede7', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Inactive'),
(26, 'cscadet@gmail.com', 'Smith', 'Cadet', '$2y$10$bPwP/ethBoCfZjZxLd00MOttUxSMPSvcS5hmjaGEJq6HE8bwykJt6', 'S@gmail.com', 'Businessman.png', 'Pastor', 'pastor', '', 'FL', 'Massachussets', 33023, '8578888164', 2222, 'Inactive'),
(27, 'cscadet@gmail.com', 'Smith', 'Cadet', 'c6d132ef5338e6df', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Inactive'),
(17, 'cscadet@gmail.com', 'Smith', 'Cadet', '3d034d1b3b1fd544', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(30, 'cscadet@gmail.com', 'Smith3', 'Cadet', '74f94552509cd9cd', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(29, 'cscadet@gmail.com', 'Smith', 'Cadet', '0ac1d6b9ef276be6', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(19, 'cscadet@gmail.com', 'Smith', 'Cadet', '109d9ad2f41da764', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(20, 'cscadet@gmail.com', 'Smith', 'Cadet', '80611044edec6915', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(21, 'cscadet@gmail.com', 'Smith', 'Cadet', '0490f1c188ffedf5', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(47, 'tscadet@gmail.com', 'test', 'tes', 'test', 'SC@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, ' 8578888164 ', 2222, 'Active'),
(23, 'cscadet@gmail.com', 'Smith2', 'Cadet', 'b55757652bfa803e', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(24, 'cscadet@gmail.com', 'Smith1', 'Cadet', 'f653267ddec434e4', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(25, 'cscadet@gmail.com', 'Smith2', 'Cadet', 'e68e28a8b49dac38', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(39, 'cscadet@gmail.com', 'Smith3', 'Cadet', '57ee06eb8cafc63c', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(37, 'cscadet@gmail.com', 'Smith3', 'Cadet', '1a0e70d6a7a959eb', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(41, 'cscadet@gmail.com', 'Smith3', 'Cadet', '7e9a4592a7e55e7b', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(42, 'cscadet@gmail.com', 'Smith3', 'Cadet', '1e4c5c4f8d5a7e56', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(43, 'cscadet@gmail.com', 'Smith3', 'Cadet', '1b5e783ebe9d6be1', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(44, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'ba65ac666e3dc1af', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(45, 'cscadet@gmail.com', 'Smith3', 'Cadet', '622f5dff8b2e2609', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(46, 'mscadet@gmail.com', 'Smith3', 'Maricharles', 'b73910c157c3fc96', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Inactive'),
(50, 'braham27', 'Abraham', '123456789\\\';l,./][865132', '$2y$10$u/0a9e7uzYOgy.N122041uR6YVC0CBjCYbQkjTYSqAEIRx80lmU16', 'Maricharleshermione@gmail.com', 'Businessman.png', 'cleaning', ';\\\'.\\\';l-20980987q98534}{][\\\\=-+_\\\"\\\"', '11 haha ', 'Hollywood', 'Massachussets', 33020, 'Say Something About This Member?', 333, 'Active'),
(51, 'tscadet@gmail.com', 'test', 'tes', 'cd5ad21b1fbd385c', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(52, 'cscadet@gmail.com', 'Smith3', 'Cadet', '06b798d6a49e956f', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(53, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'd3a7c91a82ace68d', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(54, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'dc9e7b9e418eaa84', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(55, 'mscadet@gmail.com', 'Smith3', 'Maricharles', '61a557596100d7d5', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(56, 'tscadet@gmail.com', 'test', 'tes', 'd6ee663fa54e1f21', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(57, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'b491c9c9c9a997ce', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(58, 'cscadet@gmail.com', 'Smith3', 'Cadet', '24619e5f42c603ea', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(59, 'cscadet@gmail.com', 'Smith3', 'Cadet', '3a9ee9124c202228', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(60, 'mscadet@gmail.com', 'Smith3', 'Maricharles', '05f65717f5054aa1', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(61, 'tscadet@gmail.com', 'test', 'tes', '567892c80b6b13a2', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(62, 'cscadet@gmail.com', 'Smith3', 'Cadet', '798c9fdcf1a095cd', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(63, 'cscadet@gmail.com', 'Smith3', 'Cadet', '72b9df9b71f89398', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(64, 'cscadet@gmail.com', 'Smith3', 'Cadet', '114caa4ac3b3cff6', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(65, 'mscadet@gmail.com', 'Smith3', 'Maricharles', 'fe763bec5a531f8b', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(66, 'tscadet@gmail.com', 'test', 'tes', '50b25f0555ee76f9', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(67, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'fded4f737413ce41', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(68, 'cscadet@gmail.com', 'Smith3', 'Cadet', '6c715b6879420d81', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(69, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'ad579b2cce932400', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(70, 'mscadet@gmail.com', 'Smith3', 'Maricharles', '6297e292982b85fe', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(71, 'tscadet@gmail.com', 'test', 'tes', '679ba6b4525ef110', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(72, 'cscadet@gmail.com', 'Smith3', 'Cadet', '1c3700e1a9544fce', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(73, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'e20a1fdcb896c58c', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(74, 'cscadet@gmail.com', 'Smith3', 'Cadet', '34c44255a96e9b9a', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(75, 'mscadet@gmail.com', 'Smith3', 'Maricharles', 'b9fd3d09aea59f70', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(76, 'tscadet@gmail.com', 'test', 'tes', '301aa6da2afa2f8a', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(77, 'cscadet@gmail.com', 'Smith3', 'Cadet', 'd854ba296205b5ad', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(78, 'cscadet@gmail.com', 'Smith3', 'Cadet', '81f7bd7b6713cbd4', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(79, 'cscadet@gmail.com', 'Smith3', 'Cadet', '56bbe420bf99acb4', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(80, 'mscadet@gmail.com', 'Smith3', 'Maricharles', '3ef0185c79aedfc3', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(81, 'tscadet@gmail.com', 'test', 'tes', 'ed845d37ad87e41a', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(82, 'cscadet@gmail.com', 'Smith3', 'Cadet', '8ca7242d8691da3b', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(83, 'cscadet@gmail.com', 'Smith3', 'Cadet', '8f4bc98dd834539f', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(84, 'cscadet@gmail.com', 'Smith3', 'Cadet', '2a6d30920966ba3c', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active'),
(85, 'mscadet@gmail.com', 'Smith3', 'Maricharles', 'aa143faa2bdd048c', 'scadet@gmail.com', 'Businessman.png', 'Pastor', 'pastor', 'Hollywood', 'FL', '33024', 33024, '8578888164', 2222, 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
