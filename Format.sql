CREATE table `utilisateur`(
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `status` enum('salariés','bénévoles') NOT NULL,
  `localisation` varchar(100) DEFAULT NULL,
  `dateCompte` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
)

CREATE table `formation`(
  `idFormat` int NOT NULL AUTO_INCREMENT,
  `libélé` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `domaine` enum('salariés','bénévoles') NOT NULL,
  `localisation` varchar(100) DEFAULT NULL,
  `dateCompte` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
)
