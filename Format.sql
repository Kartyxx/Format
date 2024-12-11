-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 oct. 2024 à 22:14
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
DROP DATABASE IF EXISTS `format`;

-- Crée la base de données si elle n'existe pas
CREATE DATABASE IF NOT EXISTS `format`;

-- Sélectionne la base de données
USE `format`;
-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nomEntr`, `courriel`, `tel`, `fax`, `nomPrenomPdg`, `Icom`) VALUES
(1, 'TechCorp', 'contact@techcorp.com', '0123456789', '0123456790', 'Jean Dupont', 12345678),
(2, 'InnoSolutions', 'info@innosolutions.com', '0987654321', '0987654322', 'Marie Curie', 87654321),
(3, 'GreenEnergy', 'hello@greenenergy.com', '0147852369', '0147852370', 'Luc Martin', 11223344),
(4, 'CreativeDesign', 'support@creativedesign.com', '0158923674', '0158923675', 'Alice Leroy', 22334455),
(5, 'SmartBuild', 'info@smartbuild.com', '0163587945', '0163587946', 'Philippe Rousseau', 33445566);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id_formation` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `id_domaine` int NOT NULL,
  `cout` decimal(10,2) DEFAULT NULL,
  `nombre_max_participants` int DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `public_concerne` varchar(255) DEFAULT NULL,
  `objectifs` text,
  `contenu` text,
  `id_photo` int NOT NULL,
  PRIMARY KEY (`id_formation`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id_inscription` int NOT NULL AUTO_INCREMENT,
  `id_participant` int DEFAULT NULL,
  `id_sessions` int DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `statut_inscription` enum('en cours','refusé', 'validé') DEFAULT NULL,
  PRIMARY KEY (`id_inscription`),
  KEY `id_participant` (`id_participant`),
  KEY `id_sessions` (`id_sessions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `status` enum('salariés','bénévoles','secretaire','directeur') CHARACTER SET utf8mb4 NOT NULL,
  `localisation` varchar(100) DEFAULT NULL,
  `codeP` varchar(5) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `entreprise_fk_1` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 ;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id_sessions` int NOT NULL AUTO_INCREMENT,
  `id_formations` int NOT NULL,
  `datesD` datetime NOT NULL,
  `datesF` datetime NOT NULL,
  `date_limite_inscription` date DEFAULT NULL,
  `lieux` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sessions`),
  KEY `sessions_fk_1` (`id_formations`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `interviens`;
CREATE TABLE IF NOT EXISTS `interviens` (
  `id_interviens` int NOT NULL AUTO_INCREMENT,
  `id_intervenants` int NOT NULL,
  `id_sessions` int NOT NULL,
  PRIMARY KEY (`id_interviens`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS `intervenants`;
CREATE TABLE IF NOT EXISTS `intervenants` (
  `id_intervenants` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `id_domaine` int NOT NULL,
  PRIMARY KEY (`id_intervenants`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int NOT NULL AUTO_INCREMENT,
  `libelle` enum('gestion','informatique','développement durable','secourisme','communication') NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO domaine (id_domaine, libelle) VALUES 
(1,'Gestion'), 
(2,'Informatique'), 
(3,'Développement durable'), 
(4,'Secourisme'), 
(5,'Communication');

INSERT INTO intervenants (nom, id_domaine) VALUES
('Alice Dupont', '1'),
('Jean Martin', '2'),
('Clara Morel', '2'),
('Paul Durant', '2'),
('Marie Lefebvre', '2'),
('Julien Robert', '1'),
('Sophie Garnier', '4'),
('Lucas Bernard', '1'),
('Laura Petit', '3'),
('Thomas Durand', '4'),
('Emilie Caron', '5'),
('Antoine Lambert', '5');


DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_fk_1` FOREIGN KEY (`id_participant`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `inscriptions_fk_2` FOREIGN KEY (`id_sessions`) REFERENCES `sessions` (`id_sessions`);

ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_fk_1` FOREIGN KEY (`id_formations`) REFERENCES `formations` (`id_formation`);
  --
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `entreprise_fk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);


ALTER TABLE `formations`
  ADD CONSTRAINT `domaine_fk_1` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id_domaine`),
  ADD CONSTRAINT `photo_fk_1` FOREIGN KEY (`id_photo`) REFERENCES `photo` (`id_photo`);

  ALTER TABLE `interviens`
  ADD CONSTRAINT `id_intervenants_fk_1` FOREIGN KEY (`id_intervenants`) REFERENCES `intervenants` (`id_intervenants`),
  ADD CONSTRAINT `id_sessions_fk_2` FOREIGN KEY (`id_sessions`) REFERENCES `sessions` (`id_sessions`);

  ALTER TABLE `intervenants`
  ADD CONSTRAINT `id_domaine_fk_1` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id_domaine`);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


