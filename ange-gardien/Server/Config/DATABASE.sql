SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `angegardien`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS `contacts_texto`;
DROP TABLE IF EXISTS `notes_text`;
DROP TABLE IF EXISTS `minuteurs`;
DROP TABLE IF EXISTS `utilisateurs`;

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientProvider` varchar(50) NOT NULL,
  `idClient` int(11) NOT NULL,
  `dateActivation` date NOT NULL,
  `actif` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idClient` (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `minuteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `alerteTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alertNb` int(4) NOT NULL DEFAULT 0,
  `dateDebut` datetime NOT NULL,
  `dateDeclenchement` datetime DEFAULT NULL,
  `motDePasseMd5` varchar(32) NOT NULL,
  `motDePasseAlerteMd5` varchar(32) NOT NULL,
  `nbEssais` int(11) NOT NULL DEFAULT 0,
  `declencher` tinyint(4) NOT NULL DEFAULT 0,
  `actif` tinyint(4) NOT NULL DEFAULT 1,
  `message` varchar(280) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtilisateur`) REFERENCES utilisateurs (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `contacts_texto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMinuteur` int(11) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `dateEnvoi` datetime NOT NULL,
  `statusEnvoi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idMinuteur`) REFERENCES minuteurs (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `notes_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMinuteur` int(11) NOT NULL,
  `note` varchar(120) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idMinuteur`) REFERENCES minuteurs (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;