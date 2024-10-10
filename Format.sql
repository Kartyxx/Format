-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 oct. 2024 à 09:30
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
-- Base de données : `format`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--
DROP Database IF EXISTS `format`;
CREATE Database IF NOT EXISTS `format`;
Use `format`;

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_entreprise` int NOT NULL AUTO_INCREMENT,
  `nomEntr` varchar(50) NOT NULL,
  `courriel` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `nomPrenomPdg` varchar(255) NOT NULL,
  `Icom` int DEFAULT NULL,
  PRIMARY KEY (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nomEntr`, `courriel`, `tel`, `fax`, `nomPrenomPdg`, `Icom`) VALUES
(1, 'Tech Solutions', 'contact@techsolutions.com', '0123456789', '0123456788', 'Jean Dupont', 1),
(2, 'Green Energy Corp', 'info@greenenergy.com', '0234567890', '0234567889', 'Marie Curie', 2),
(3, 'Foodies Delight', 'hello@foodiesdelight.com', '0345678901', '0345678890', 'Pierre Martin', 3),
(4, 'Health First', 'support@healthfirst.com', '0456789012', '0456789001', 'Sophie Laurent', 4),
(5, 'Travel Buddy', 'service@travelbuddy.com', '0567890123', '0567890112', 'Antoine Dumas', 5);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id_formation` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `domaine` varchar(100) DEFAULT NULL,
  `description` enum('gestion','informatique','développement durable','secourisme','communication') NOT NULL,
  `cout` decimal(10,2) DEFAULT NULL,
  `nombre_max_participants` int DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `public_concerne` varchar(255) DEFAULT NULL,
  `objectifs` text,
  `contenu` text,
  `date_limite_inscription` date DEFAULT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id_inscription` int NOT NULL AUTO_INCREMENT,
  `id_participant` int DEFAULT NULL,
  `id_formation` int DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `statut_inscription` enum('Inscrit','Non inscrit') DEFAULT NULL,
  PRIMARY KEY (`id_inscription`),
  KEY `id_participant` (`id_participant`),
  KEY `id_formation` (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `id_entreprise` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `status` enum('salariés','bénévoles') NOT NULL,
  `localisation` varchar(100) DEFAULT NULL,
  `codeP` int DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `entreprise_fk_1` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `id_entreprise`, `nom`, `prenom`, `email`, `mot_de_passe`, `status`, `localisation`, `codeP`, `ville`, `fonction`) VALUES
(2, 1, 'aaaaa', 'aaaaa', 'jean01@example.com', '$2y$10$bk29YUEkn41/WgNRNBMI0.AOf/8J9N7B2dFB2lKWvqKiH850/Nbbq', 'salariés', 'aaaa', 0, 'aaaa', 'aaaa'),
(6, 3, 'aaaa', 'aaa', 'gabinscaca@caca.com', '$2y$10$fNSJOT7E8jcRLlDD6e/wXuYy78pIpt/YaK3I/WHAjSGhdGWqX3SKi', 'bénévoles', 'aaaa', 0, 'aaaa', 'aaaa'),
(7, 3, 'picras', 'loic', 'loiccaca@caca.caca', '$2y$10$HGTYj79dngrLNKQTm4HuvOiFcwbTeH4OW/SXxBARsGgSUURaA002K', 'bénévoles', 'ozenne', 31, '31', 'aaaa');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_fk_1` FOREIGN KEY (`id_participant`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `inscriptions_fk_2` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id_formation`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `entreprise_fk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
