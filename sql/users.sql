-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2015 at 07:39 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `description`, `photo_url`, `branch`, `grade`, `date`, `group`) VALUES
(17, 'r0372981@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'å³æ5bxˆ‰Yµ¤zèÑr¼ˆô–ç/d2ÏŠö¿', 'Marie Louise', '', 'uploads/5554a9f734b393.20493851.jpg', 'Development', '3de jaar', '2015-05-15', '1'),
(18, 'r0369854@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'ä•]Ê¾S¸¨h²©t669î2y•éÎwogç ¯lK', 'test naam 3', '', 'uploads/5554aa18916891.72788811.jpg', 'Developement', '3de jaar', '2015-05-20', '1'),
(19, 'r0372515@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', '@ûf^jnÃlÇBÍ[Ü¿É±­â÷8-mÛôPêd˜zªå', 'test naam 4', '', 'uploads/5554aa3e0ad735.49069087.jpg', 'Developement', '2de jaar', '2015-05-27', '1'),
(20, 'r0372514@student.thomasmore.be', '^ˆH˜Ú(qQÐåoÆ)''s`=\rj«½Ö*ïrBØ', 'z{¡‚Š‡ÿ;B\r|rÜÅÉ,''ë$[):7¿³ºMªbŽ(', 'Mike', '', 'uploads/555753aa147ba5.87509045.jpg', 'Design', '3de jaar', '2015-06-26', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
