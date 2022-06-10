-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 08:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinesh_joomdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `textdata`
--

CREATE TABLE `textdata` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `textmsz` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textdata`
--

INSERT INTO `textdata` (`id`, `userid`, `textmsz`, `created`) VALUES
(3, 6, 'sdfsf', '2022-06-10 08:46:58'),
(4, 6, 'fhfhhj', '2022-06-10 08:47:13'),
(5, 6, 'bvvjvjkvk', '2022-06-10 08:47:19'),
(6, 6, 'Dev', '2022-06-10 09:03:48'),
(7, 6, 'Dev', '2022-06-10 09:03:51'),
(8, 6, 'sdfsf', '2022-06-10 09:04:12'),
(9, 6, 'Dinesh', '2022-06-10 09:04:52'),
(10, 6, 'dsf', '2022-06-10 09:05:24'),
(11, 6, 'dsfsdf', '2022-06-10 09:05:29'),
(12, 6, 'ok', '2022-06-10 09:05:34'),
(13, 6, 'sfsfd#%$^%&^*fsjg  \nsdf  \n\n\n\nsdf gig', '2022-06-10 09:05:43'),
(14, 6, 'd', '2022-06-10 09:06:47'),
(15, 6, 'dinesh\n\ngangwar', '2022-06-10 09:09:28'),
(16, 6, 'dev\n\n\n\n\n\npatel', '2022-06-10 09:09:39'),
(17, 6, 'Dev\n\nsdjfhjjg \n\n\n\n$#$^%&(^*\n\n\npatel', '2022-06-10 09:09:55'),
(18, 6, '@jhkhs\n\ndsf', '2022-06-10 09:10:05'),
(19, 6, 'dinesh\n\n\n@2\n\nyears', '2022-06-10 09:10:41'),
(20, 6, '', '2022-06-10 09:12:49'),
(21, 6, '', '2022-06-10 09:15:11'),
(22, 6, 'age\'s', '2022-06-10 09:15:54'),
(23, 6, 'GHdhf*^%#!@#$(&*%(_)&^!\":\":\":\'\';./,][\n\nOHk Working Fine', '2022-06-10 09:16:18'),
(24, 6, 'jh', '2022-06-10 09:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `status`, `created`, `updated`) VALUES
(5, 'Dinesh', 'dineshgangwar1997@gmail.com', '12345', 1, '2022-06-09 21:56:00', '2022-06-09 21:56:00'),
(6, 'dev', 'dev7@gmail.com', '12345', 1, '2022-06-10 07:22:29', '2022-06-10 07:22:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `textdata`
--
ALTER TABLE `textdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `textdata`
--
ALTER TABLE `textdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
