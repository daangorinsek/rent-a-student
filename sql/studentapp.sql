-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 03:57 PM
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
  `branch` varchar(255) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `description`, `photo_url`, `branch`, `grade`, `date`, `group`) VALUES
(15, 'r0372514@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'ådï¯uƒlå›4–\\qÄR]ògðÝd±r«KI5Én', 'Mike Radino', '', 'uploads/5554a32faf7727.86486595.jpg', 'Design', '3de jaar', '2015-05-15', '1'),
(16, 'r0334568@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'Bí¸óú—Þ¶I§?Áƒ‚–pîŒbjÒâ­,[hd ¹ñ', 'test naam 1', '', 'uploads/5554a9db44a506.00908468.jpg', 'Design', '1ste jaar', '2015-06-26', '1'),
(17, 'r0359437@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'å³æ5bxˆ‰Yµ¤zèÑr¼ˆô–ç/d2ÏŠö¿', 'test naam 2', '', 'uploads/5554a9f734b393.20493851.jpg', 'Developement', '2de jaar', '2015-05-20', '1'),
(18, 'r0369854@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'ä•]Ê¾S¸¨h²©t669î2y•éÎwogç ¯lK', 'test naam 3', '', 'uploads/5554aa18916891.72788811.jpg', 'Developement', '3de jaar', '2015-05-27', '1'),
(19, 'r0372515@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', '@ûf^jnÃlÇBÍ[Ü¿É±­â÷8-mÛôPêd˜zªå', 'test naam 4', '', 'uploads/5554aa3e0ad735.49069087.jpg', 'Developement', '2de jaar', '2015-05-27', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `fb_id` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

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
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
