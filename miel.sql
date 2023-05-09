-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2023 at 01:11 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miel`
--

-- --------------------------------------------------------

--
-- Table structure for table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id_eleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(255) DEFAULT NULL,
  `prenom_eleve` varchar(255) DEFAULT NULL,
  `classe_eleve` varchar(255) DEFAULT NULL,
  `password_eleves` varchar(255) NOT NULL,
  PRIMARY KEY (`id_eleve`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table 'administrateur'
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom`, `mot_de_passe`) VALUES
(1, 'admin', 'pass');

--
-- Table structure for table `miel`
--

DROP TABLE IF EXISTS `miel`;
CREATE TABLE IF NOT EXISTS `miel` (
  `id_miel` int(11) NOT NULL AUTO_INCREMENT,
  `nom_miel` varchar(255) NOT NULL,
  `apiculteur` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_miel`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `miel`
--

INSERT INTO `miel` (`id_miel`, `nom_miel`, `apiculteur`, `prix`, `image`) VALUES
(1, 'Miel de Romarin', 'Abeille Heureuse', '9 EURO', 'miel_romarin.png'),
(2, 'Miel de Thym', 'Abeille Heureuse', '10 EURO', 'thym_miel.png'),
(3, 'Miel de Bretagne ', 'Abeille Heureuse', '12 EURO', 'bretagne_miel.png'),
(4, 'Miel d\'Acacia', 'Abeille Heureuse', '15 EURO', 'acacia_miel.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
