-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 18 mei 2015 om 01:54
-- Serverversie: 5.6.21
-- PHP-versie: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `studentapp`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `message` varchar(600) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `message`, `visitor_name`, `visitor_email`, `student_name`, `student_email`, `date`) VALUES
(24, 'Ja de mike', 'Daan Gorinsek', 'daangorinsek@gmail.com', 'Mike Radino', 'r0372514@student.thomasmore.be', '2015-05-17'),
(25, 'Testnaam 3', 'Daan Gorinsek', 'daangorinsek@gmail.com', 'test naam 3', 'r0369854@student.thomasmore.be', '2015-05-17'),
(29, 'Hey, testnaam1, moet ik bokes meebrengen of niet ?', 'Daan Gorinsek', 'daangorinsek@gmail.com', 'test naam 1', 'r0334568@student.thomasmore.be', '2015-05-17'),
(32, 'Hey testnaam 2', 'Daan Gorinsek', 'daangorinsek@gmail.com', 'test naam 2', 'r0359437@student.thomasmore.be', '2015-05-17'),
(61, 'heeey', 'Daan Gorinsek', 'daangorinsek@gmail.com', 'test naam 4', 'r0372515@student.thomasmore.be', '2015-05-17');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
