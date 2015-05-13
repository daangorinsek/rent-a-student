-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 03:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` int(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `joined` datetime NOT NULL,
  `branch` varchar(255) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `group` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `description`, `photo_url`, `joined`, `branch`, `grade`, `group`) VALUES
(8, 'r0372514@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', '\\v¿A±rÝ|ì½Dõ}÷3\\(Ÿ´À\rlC{B¾(=¦', 'Mike Radino', '', '', '2015-05-13 14:35:52', 'Design', '2de jaar', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `hash`) VALUES
(2, 2, '21339981cf206af8b298ad9ac8269009d48a8b8424fc8d24dd621f8d0b8785cf'),
(3, 4, '1381756f339377a1d62e6c99ad8ec7cbb4106639bc032680012f0f8f6b856ad7'),
(4, 5, '6a79e7f21180969e46cb4402124e39d95acc3fef4d7983f48dd4c57b636eccb9'),
(5, 6, '7c802cb6b17896fbab3fa6bc47550ce9e0e4af3a6c517a64ff57bfa848173d92'),
(6, 7, '0d944c14720d8359d89658e14d12004074cd384b04a28b948def6aa316496825'),
(7, 8, 'e6b8f9c6d4d55dd8e96159961a2b246bd4f06d98faa02dca8ce1813cc65226e9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
