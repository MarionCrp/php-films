-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2016 at 11:53 AM
-- Server version: 5.5.47-0+deb8u1
-- PHP Version: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteurs`
--

CREATE TABLE IF NOT EXISTS `acteurs` (
`id_acteur` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `casting`
--

CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
`id_film` int(11) NOT NULL,
  `nom_film` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `annee_film` smallint(6) NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id_film`, `nom_film`, `annee_film`, `score`) VALUES
(1, 'Star Wars VII: The Force Awakens', 2015, 2.2),
(2, 'Alien', 1979, 8.5),
(3, 'test', 2010, 5),
(4, 'test2', 2016, 5.3),
(5, 'test3', 2016, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteurs`
--
ALTER TABLE `acteurs`
 ADD PRIMARY KEY (`id_acteur`);

--
-- Indexes for table `casting`
--
ALTER TABLE `casting`
 ADD PRIMARY KEY (`id_film`,`id_acteur`), ADD KEY `fk_casting_acteur` (`id_acteur`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
 ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteurs`
--
ALTER TABLE `acteurs`
MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `casting`
--
ALTER TABLE `casting`
ADD CONSTRAINT `fk_casting_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteurs` (`id_acteur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_casting_film` FOREIGN KEY (`id_film`) REFERENCES `films` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
