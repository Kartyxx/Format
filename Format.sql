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

INSERT INTO `formations` (`id_formation`, `titre`, `description`, `id_domaine`, `cout`, `nombre_max_participants`, `lieu`, `public_concerne`, `objectifs`, `contenu`, `id_photo`) VALUES
(6, 'IA', 'Apprendre les bases de l\'IA', 2, 500.00, 10, 'Toulouse', 'Tout le monde', 'Etre capable d\'utiliser une IA', 'Instructif', 5),
(7, 'Secourisme', 'Apprendre les geste de premiers secours', 4, 275.00, 10, 'Toulouse', 'Tout le monde', 'Etre capable de donner les premiers soins', 'Instructif', 6),
(8, 'Communication', 'Faire une communication impactante', 5, 300.00, 10, 'Toulouse', 'Tout le monde', 'Etre capable de réaliser une communication qui marque l\'utilisateur', 'Instructif', 7),
(9, 'Gestion', 'Apprendre à améliorer sa gestion', 1, 150.00, 10, 'Toulouse', 'Tout le monde', 'Etre capable d\'avoir une gestion précise et efficace', 'Instructif', 8);


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

INSERT INTO `sessions` (`id_sessions`, `id_formations`, `datesD`, `datesF`, `date_limite_inscription`, `lieux`) VALUES
(5, 6, '2024-12-14 00:00:00', '2024-12-15 00:00:00', '2024-12-13', 'Toulouse'),
(6, 6, '2024-12-14 00:00:00', '2024-12-15 00:00:00', '2024-12-13', 'Toulouse'),
(7, 7, '2024-12-14 00:00:00', '2024-12-15 00:00:00', '2024-12-13', 'Toulouse'),
(8, 8, '2024-12-14 00:00:00', '2024-12-15 00:00:00', '2024-12-13', 'Toulouse'),
(9, 9, '2024-12-14 00:00:00', '2024-12-15 00:00:00', '2024-12-13', 'Toulouse');


DROP TABLE IF EXISTS `interviens`;
CREATE TABLE IF NOT EXISTS `interviens` (
  `id_interviens` int NOT NULL AUTO_INCREMENT,
  `id_intervenants` int NOT NULL,
  `id_sessions` int NOT NULL,
  PRIMARY KEY (`id_interviens`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `interviens` (`id_interviens`, `id_intervenants`, `id_sessions`) VALUES
(5, 6, 5),
(6, 7, 5),
(7, 8, 6),
(8, 9, 6),
(9, 11, 7),
(10, 15, 8),
(11, 5, 9);



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

INSERT INTO `photo` (`id_photo`, `libelle`) VALUES
(5, 'formation.png'),
(6, 'secourisme.png'),
(7, 'communication.png'),
(8, 'gestion.png');



INSERT INTO `utilisateur` (`id_utilisateur`, `id_entreprise`, `nom`, `prenom`, `email`, `mot_de_passe`, `status`, `localisation`, `codeP`, `ville`, `fonction`) VALUES
(5, 3, 'courtine', 'Jérome', 'Jcourtine@gmail.com', '$2y$10$KOpeyfHK0ZhaXayOCgkWre9z1amI9.Q9giW9PcHVFbSrfWGvKP/Qe', 'directeur', 'toulouse', '31100', 'toulouse', 'PDG'),
(6, 1, 'Stéphanie', 'Andres', 'A.Stéphanie@gmail.com', '$2y$10$ELPgWVGgobcy/xMsGFNhMuvEt0PDz5fl4WNQytvSaLODZp5.wpLX.', 'secretaire', 'toulouse', '31100', 'toulouse', 'secraitaire'),
(7, 1, 'segouffin', 'romain', 'romain@gmail.com', '$2y$10$mBJH5FPJ18eqIUrP9lQTOub4ECTMyd1Erj8jhO4H8q44SHs4lXQQ6', 'bénévoles', '128 avenue jules julien', '31400', 'Toulouse', 'cadre');



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


