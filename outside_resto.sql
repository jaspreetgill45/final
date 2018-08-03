-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 02:21 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE OUTSIDE_RESTO1;
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_time`) VALUES
(19, 'jas', 'hello', '2018-08-03 10:29:36'),
(20, 'ddev1', 'hi', '2018-08-03 10:30:56'),
(21, 'hhuh', 'ok', '2018-08-03 10:31:44'),
(22, 'jp', 'allright', '2018-08-03 10:32:58'),
(23, 'jsingh002', 'ollright', '2018-08-03 10:36:57'),
(24, 'ddev1', 'heelo', '2018-08-03 10:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `name` varchar(256) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `uname`, `name`, `size`, `type`, `location`) VALUES
(2, 'ddev1', 'chair-1148930_1920.jpg', 228019, 'image/jpeg', 'uploads/chair-1148930_1920.jpg'),
(3, 'ddev1', 'chair-1148930_1920.jpg', 228019, 'image/jpeg', 'images/chair-1148930_1920.jpg'),
(4, 'ddev1', 'damask-937606_1280.jpg', 615592, 'image/jpeg', 'images/damask-937606_1280.jpg'),
(5, 'ddev1', 'damask-937606_1280.jpg', 615592, 'image/jpeg', 'images/damask-937606_1280.jpg'),
(6, 'ddev1', 'dish-918613_1920.jpg', 186654, 'image/jpeg', 'images/dish-918613_1920.jpg'),
(7, 'ddev1', 'dish-918613_1920.jpg', 186654, 'image/jpeg', 'images/dish-918613_1920.jpg'),
(8, 'ddev1', 'dish-918613_1920.jpg', 186654, 'image/jpeg', 'images/dish-918613_1920.jpg'),
(9, 'ddev1', 'damask-937606_1280.jpg', 615592, 'image/jpeg', 'images/damask-937606_1280.jpg'),
(10, 'ddev1', 'dish-918613_1920.jpg', 186654, 'image/jpeg', 'images/dish-918613_1920.jpg'),
(11, 'ddev1', 'dish-918613_1920.jpg', 186654, 'image/jpeg', 'images/dish-918613_1920.jpg'),
(12, 'ddev1', 'buddhist-315297_1280.jpg', 376034, 'image/jpeg', 'images/buddhist-315297_1280.jpg'),
(13, 'ddev1', 'grill-party-3524649_1920.jpg', 549802, 'image/jpeg', 'images/grill-party-3524649_1920.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `DateOfBirth` date NOT NULL,
  `phoneNo` text NOT NULL,
  `email` text NOT NULL,
  `passwrd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `DateOfBirth`, `phoneNo`, `email`, `passwrd`) VALUES
('2', '', '', '0000-00-00', '', '', 'dev'),
('ddev1', 'd', 'dev', '1998-02-01', '7783845239', 'jaspreetgill270@gmail.com', 'dev');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `spCheck` (IN `uname` TEXT, IN `password` TEXT)  NO SQL
SELECT username,passwrd
FROM users
WHERE username = uname AND passwrd = password$$

DELIMITER ;
