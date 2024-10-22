-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 sep. 2024 à 11:20
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `edap`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noms` varchar(255) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `nompere` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `classe` varchar(50) NOT NULL,
  `nommere` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `etatClasse` varchar(50) NOT NULL,
  `bulletin` varchar(255) NOT NULL,
  `ecoleprov` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL,
  `numTel` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
