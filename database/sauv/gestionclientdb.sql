-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 mai 2025 à 06:44
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
-- Base de données : `gestionclientdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `clientt`
--

DROP TABLE IF EXISTS `clientt`;
CREATE TABLE IF NOT EXISTS `clientt` (
  `idclient` int NOT NULL AUTO_INCREMENT,
  `idclientmembre` int NOT NULL,
  `nomclient` varchar(100) NOT NULL,
  `prenomclient` varchar(50) DEFAULT NULL,
  `villeclient` varchar(100) DEFAULT NULL,
  `quartierclient` varchar(100) DEFAULT NULL,
  `telephoneclient` varchar(50) DEFAULT NULL,
  `commentaireclient` text,
  `lienphotoclient` text,
  `dateajoutclient` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idclient`),
  KEY `fk_client_membre` (`idclientmembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `idmembre` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(220) NOT NULL,
  `motdepasse` text NOT NULL,
  `dateinscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmembre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idmembre`, `pseudo`, `email`, `motdepasse`, `dateinscription`) VALUES
(1, 'Van', 'van2021@outlook.fr', '9cf95dacd226dcf43da376cdb6cbba7035218921', '2025-05-22 22:47:37'),
(6, 'bobo', 'bobo@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '2025-05-22 23:08:18'),
(7, 'babana', 'babana@gamil.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', '2025-05-22 23:32:37');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `clientt`
--
ALTER TABLE `clientt`
  ADD CONSTRAINT `fk_client_membre` FOREIGN KEY (`idclientmembre`) REFERENCES `membre` (`idmembre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
