-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 19 oct. 2024 à 09:55
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `edap`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `etat` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id`, `noms`, `genre`, `nompere`, `age`, `classe`, `nommere`, `adresse`, `etatClasse`, `bulletin`, `ecoleprov`, `section`, `numTel`, `etat`, `date`) VALUES
(19, 'FIKIRI', 'F', 'ZAHINDA', '19', '3ème', 'JEANNE', 'FULL', 'Doublante', 'bulletin_67117f8466e596.07529114.pdf', 'HHH', 'Péd', '0987675443', 'validé', '0000-00-00 00:00:00'),
(18, 'ZIHINDULA black', 'M', 'ZAGABE', '24', '5ème', 'JULIENNE', 'WALUNG', 'Montante', 'bulletin_67117f3b415af0.34157306.pdf', 'HI', 'Péd', '0987655555', 'validé', '0000-00-00 00:00:00'),
(23, 'ZIHALIRWA BLACK', 'M', 'BALAGIZI', '15', '1ère', 'SIFA', 'WALUNGU', 'Montante', 'bulletin_67137e219dabb0.10056439.pdf', 'HJKHK', 'Péd', '09393893', 'validé', '0000-00-00 00:00:00'),
(17, 'RIZIKI MAOMBI', 'F', 'safari', '17', '2ème', 'FURAHA', 'KIH', 'Doublante', 'bulletin_67117ef52c6a73.14822417.pdf', 'POLELE', 'Péd', '098753245', 'validé', '0000-00-00 00:00:00'),
(16, 'safari daniel', 'M', 'matabishi', '18', '2ème', 'kalinzi', 'kilwa', 'Montante', 'bulletin_67117ea640bcb3.97282868.pdf', 'likasi', 'Péd', '00000000', 'validé', '0000-00-00 00:00:00'),
(20, 'joyce', 'F', 'ZAHINDA', '19', '7ème', 'JEANNE', 'FULL', 'Doublante', 'bulletin_6712bdd65b9c15.05304778.pdf', 'HHH', 'Sec', '0987675443', 'validé', '0000-00-00 00:00:00'),
(21, 'zigashane', 'M', 'ZAHINDA', '19', '7ème', 'JEANNE', 'FULL', 'Doublante', 'bulletin_6712d2c9e2a559.04419034.pdf', 'HHH', 'Sec', '0987675443', 'validé', '0000-00-00 00:00:00'),
(22, 'CIZA', 'M', 'CIRIMWAMI', '12', '8ème', 'MARCELINE', 'WAL', 'Doublante', 'bulletin_67137910f17a76.81705441.pdf', 'MUSHERE', 'Sec', '098278376', 'validé', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `photo`) VALUES
(6, 'sec', '$2y$10$OJaFgFfiwVSmogb0ik/.x.Wj/Z85Qf/0d6hon8hoWxFzLm0De5Mjm', 'uploads/fr-05.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
