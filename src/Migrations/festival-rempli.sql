-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 mars 2024 à 14:44
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `fest_client`
--

DROP TABLE IF EXISTS `fest_client`;
CREATE TABLE IF NOT EXISTS `fest_client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `adresse` varchar(350) NOT NULL,
  `rgpdDate` date DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fest_client`
--

INSERT INTO `fest_client` (`id`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `rgpdDate`, `mdp`) VALUES
(33, 'A', 'A', 'a@a.a', '222', '222', '2024-03-29', '$2y$10$cZrHk.PluA.9FiCfzQlxLeYmqWVRNtWdAvnSDgUrmLw8Wv7ZAnNcO'),
(32, 'He', 'He', 'he@he.com', '88888', 'hehehee', '2024-03-29', '$2y$10$YnBiTXqH9bApb7SbYzmWL.7V0422v8JS3Q9I.G7r9SP1cdnGMUcLe'),
(41, 'Michel', 'Jean-Louis', 'Jean-Louis.Michel@gmail.com', '0789896768', 'Chemin des Michels', '2024-03-29', '$2y$10$UZjYqjDsC8Q5LkUlwzj3PuHhzZC.329XQaCA9..AqfpnUSXOlyZoC'),
(37, 'V', 'v', 'v@v.com', '889898', 'vvvv', '2024-03-29', '$2y$10$5IJZkOP9amjgQVE6I3kX9e6DCtCBUcc44aApmPVpb.g7SYHVnxqdG'),
(36, 'O', 'O', 'o@o.com', '00000', 'ooo', '2024-03-29', '$2y$10$IGChGFhnGVeOVmMRp8VO1uhC7FtlKk8mZ/v87OBxHrJueaGOBRTJq'),
(35, 'Ke', 'Ke', 'KO@KO.com', '765645', 'Fsfs', '2024-03-29', '$2y$10$/nDExc/3nRsQSBEK2QjEVOE2rfu4OGqraM4ltpSJuJTRj9SRS2plm'),
(34, 'k', 'k', 'k@k.com', 'kkk', 'kkk', '2024-03-29', '$2y$10$XXj5PDtFRwqC4GoPO.eKY.BkUm0MZ1pdhxM87IDCvJohmqp0OY7YG'),
(14, 'T', 'T', 'T@T.c', '354352', 'fdsfsd', '2024-03-28', '$2y$10$8aVLnA9.CIXxPDmLw8uWFekpggp9/EmUHT/Hth8b8aWahVgCwaCau'),
(15, 'Y', 'T', 'T@Y.c', '354352', 'fdsfsd', '2024-03-28', '$2y$10$WXZbjHBM.edP3i5Z0p1l5./AHzdaxcuCAoWGeGItOS8IbbEySQCiK'),
(16, 'B', 'B', 'B@B.B', '354352', 'fdsfsd', '2024-03-28', '$2y$10$q/IlixhvYqFAeZ2fV6weuurDZ9lgkZn7TO/nIICxfVU6dosZUcDIC'),
(17, 'B', 'B', 'C@C.C', '354352', 'fdsfsd', '2024-03-28', '$2y$10$4cXbxVSRPmd6pLcMlhzr..gOvqUTDdcDzIkX3tIE.bN/4wD0CXJYq'),
(18, 'D', 'D', 'D@D.D', '354352', 'fdsfsd', '2024-03-28', '$2y$10$G4DIaOZpuGIaSOxLffRgUOy6re2tPf2g0yYhdtOG2cYlizpdZM.G.'),
(19, 'D', 'D', 'D@D.DD', '354352', 'fdsfsd', '2024-03-28', '$2y$10$wt0kfpvuETXG2/5WrRoaz.zpKSNvmtkIgQ3ubaWxGCedj2oRjyqTu'),
(20, 'D', 'D', 'D@D.FF', '354352', 'fdsfsd', '2024-03-28', '$2y$10$zuC5lmhHw0yFo1ACwD5f1ehvFevwngJ9sNvf947IaQMfteI.dUd1m'),
(21, 'D', 'D', 'D@D.FFh', '354352', 'fdsfsd', '2024-03-28', '$2y$10$ISq8WKiy4Fn.H38yHDfqZOYN60CjTntaiMP5Ljdl2J4dpdnexy1x6'),
(22, 'D', 'D', 'D@D.FFha', '354352', 'fdsfsd', '2024-03-28', '$2y$10$QI/qyWp110Nhno73w6utHO6R3fcnYbpWL3sn2ZRk/.EAWEXTBccvK'),
(23, 'Loeb', 'Elodie', 'el0@gmail.com', '0603509789', '2 Rue Claude Debussy', '2024-03-28', '$2y$10$LeuiHqZGcLbjgWQmqHFs9.uBacfwJfCesPM2v3IWfzbPTXAun9s32'),
(24, 'Loeb', 'Elodie', 'el@gmail.com', '0603509789', '2 Rue Claude Debussy', '2024-03-28', '$2y$10$JDte2bGOPfmsSkx.ktmCP.PFIX3Zph3pUKepUzloSLIbH3Lptpte.'),
(25, 'SO', 'SO', 'SO@SO.Com', '954935943', 'fdsfgs', '2024-03-28', '$2y$10$WXJrnpbHoYdgyLalDl.MhuFMPTvbYybwaMGSCHopA1WepFSvvwp2C'),
(26, 'SI', 'Si', 'Si@si.com', '848234832', 'SISISISIS', '2024-03-28', '$2y$10$YnhboXQ58mOw7uEYLmW/x.gSer1ul99UnVw0N05/pT2veY7VfsTUS'),
(27, 'SI', 'Si', 'Siu@si.com', '848234832', 'SISISISIS', '2024-03-28', '$2y$10$F9JqMZqjZAtr5I64A.g8z.Qe6C7B.ZBf71kGX4BznNpNmJqgL3Ga.'),
(28, 'do', 'do', 'do@do.com', '9432949329', 'DODODODDO', '2024-03-28', '$2y$10$VVC/QefILCUh7.vbpUm6yeZzNmFZEPb//7vzbjcJ1Lp9J1eF//JdG'),
(29, 'Po', 'po', 'po@po.com', '9999999', 'po', '2024-03-28', '$2y$10$z1VAK4Zt3oEmnz0JIUyXFuPDTgCAwRxdnhxEZltPxArDqEZFL0vBG'),
(30, 'Pi', 'po', 'pi@po.com', '9999999', 'po', '2024-03-28', '$2y$10$1WKrWFhBsnncMTVP8Tq8oeIcK9y5Durh1BQc4xkXa6MeRaQP25nqG'),
(31, 'Loeb', 'Elodie', 'ji@ji.com', '0603509789', '2 Rue Claude Debussy', '2024-03-28', '$2y$10$EROMzxc3pV1tsPwS7VtdQ.V2UHzeCJa7oNbyhMPH83aU62kGNtiJS'),
(38, 'MA', 'MA', 'MA@MA.com', '5634534', 'MAMA', '2024-03-29', '$2y$10$IZH6HtDHPraBAhWNi/eQ3OILL.dy07U1lxvXwlOVFiDzEq4sz5Hc.'),
(39, 'I', 'I', 'i@i.fr', '55', 'jjhh', '2024-03-29', '$2y$10$DHYYdlBZjO1dSKYp2DRx/O4xTPNzSXXHY6PDLaT9vsGgImKT43Z2O'),
(40, 'JO', 'jo', 'jo@jo.jo', '8888', 'jokmkm', '2024-03-29', '$2y$10$HggYLmVY1Z.sE9axzvXRKuB.FDjYb9l5kYy861Qc.yy5BL.guauma');

-- --------------------------------------------------------

--
-- Structure de la table `fest_options`
--

DROP TABLE IF EXISTS `fest_options`;
CREATE TABLE IF NOT EXISTS `fest_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomOptions` varchar(200) DEFAULT NULL,
  `prix` int DEFAULT NULL,
  `nombre` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fest_options`
--

INSERT INTO `fest_options` (`id`, `nomOptions`, `prix`, `nombre`) VALUES
(1, 'tente', 5, 1),
(2, 'tente', 5, 1),
(3, 'tente', 5, 1),
(4, 'tente', 5, 1),
(5, NULL, 0, 0),
(6, NULL, 0, 0),
(7, NULL, 0, 0),
(8, 'van', 15, 2),
(9, 'tente', 5, 1),
(10, 'tente', 5, 1),
(11, 'tente', 5, 1),
(12, NULL, 0, 0),
(13, 'van', 15, 2),
(14, '', 0, 0),
(15, 'tente', 5, 1),
(16, 'van', 40, 1),
(17, 'tente', 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fest_pass`
--

DROP TABLE IF EXISTS `fest_pass`;
CREATE TABLE IF NOT EXISTS `fest_pass` (
  `id` int NOT NULL AUTO_INCREMENT,
  `typePass` varchar(50) DEFAULT NULL,
  `prixPass` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fest_pass`
--

INSERT INTO `fest_pass` (`id`, `typePass`, `prixPass`) VALUES
(1, 'on', 50),
(2, 'pass2joursreduit', 50),
(3, 'pass2joursreduit', 50),
(4, 'pass2joursreduit', 50),
(5, 'pass2joursreduit', 50),
(6, 'pass2joursreduit', 50),
(7, 'pass2joursreduit', 50),
(8, 'pass2joursreduit', 50),
(9, 'pass2joursreduit', 50),
(10, 'pass2joursreduit', 50),
(11, 'pass2joursreduit', 50),
(12, 'pass2joursreduit', 50),
(13, 'pass2joursreduit', 50),
(14, 'pass1jourreduit', 25),
(15, 'pass1jourreduit', 25),
(16, 'pass2joursreduit', 50),
(17, 'pass2joursreduit', 50),
(18, 'pass2joursreduit', 50),
(19, 'pass1jourreduit', 25),
(20, 'pass2joursreduit', 50),
(21, 'pass2joursreduit', 50),
(22, 'pass2joursreduit', 50),
(23, 'pass3joursreduit', 65),
(24, 'pass2jours', 70),
(25, 'pass2joursreduit', 50),
(26, 'pass1jourreduit', 25),
(27, 'pass2joursreduit', 50),
(28, 'pass2joursreduit', 50),
(29, 'pass1jourreduit', 25);

-- --------------------------------------------------------

--
-- Structure de la table `fest_reservations`
--

DROP TABLE IF EXISTS `fest_reservations`;
CREATE TABLE IF NOT EXISTS `fest_reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` int NOT NULL,
  `reduit` tinyint(1) DEFAULT NULL,
  `prixTotal` int DEFAULT NULL,
  `enfants` tinyint(1) DEFAULT NULL,
  `luges` int DEFAULT NULL,
  `casques` varchar(50) DEFAULT NULL,
  `id_client` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_1` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fest_reservations`
--

INSERT INTO `fest_reservations` (`id`, `nombre`, `reduit`, `prixTotal`, `enfants`, `luges`, `casques`, `id_client`) VALUES
(1, 4, 0, 212, 0, 0, '0', 10),
(2, 6, 0, 315, 0, 0, '0', 11),
(3, 4, 0, 295, 0, 0, '0', 12),
(4, 3, 0, 162, 0, 0, '0', 13),
(5, 6, 0, 315, 0, 4, '0', 14),
(6, 6, 0, 315, 0, 4, '0', 15),
(7, 6, 0, 315, 0, 4, '0', 16),
(8, 8, 0, 415, 0, 4, '0', 17),
(9, 8, 0, 415, 0, 4, '0', 18),
(10, 8, 0, 415, 0, 4, '0', 19),
(11, 8, 0, 415, 0, 4, '0', 20),
(12, 8, 0, 415, 0, 4, '0', 21),
(13, 8, 0, 415, 0, 4, '0', 22),
(14, 4, 0, 212, 0, 0, '0', 23),
(15, 6, 0, 315, 0, 0, '0', 24),
(16, 12, 0, 605, 0, 0, '0', 25),
(17, 1, 0, 30, 0, 0, '0', 26),
(18, 1, 0, 30, 0, 0, '0', 27),
(19, 4, 0, 205, 0, 0, '0', 28),
(20, 8, 0, 400, 0, 0, '0', 29),
(21, 8, 0, 400, 0, 0, '0', 30),
(22, 5, 0, 125, 0, 0, '0', 31),
(23, 7, 0, 365, 0, 0, '0', 32),
(24, 6, 0, 311, 0, 0, '3', 33),
(25, 5, 0, 255, 0, 0, '0', 34),
(26, 8, 0, 525, 0, 0, '0', 35),
(27, 6, 0, 420, 0, 0, '0', 36),
(28, 7, 0, 365, 0, 0, '0', 37),
(29, 8, 0, 200, 0, 0, '0', 38),
(30, 6, 0, 305, 0, 0, '0', 39),
(31, 8, 0, 440, 0, 3, '0', 40),
(32, 5, 0, 152, 0, 0, '1', 41);

-- --------------------------------------------------------

--
-- Structure de la table `fest_reservations_options`
--

DROP TABLE IF EXISTS `fest_reservations_options`;
CREATE TABLE IF NOT EXISTS `fest_reservations_options` (
  `id_res` int NOT NULL,
  `id_opt` int NOT NULL,
  `jour` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_res`,`id_opt`),
  KEY `id_opt` (`id_opt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fest_reservations_options`
--

INSERT INTO `fest_reservations_options` (`id_res`, `id_opt`, `jour`) VALUES
(25, 10, '0000-00-00'),
(26, 11, '0000-00-00'),
(27, 12, '0000-00-00'),
(28, 13, '01/07'),
(29, 14, ''),
(30, 15, '02/07'),
(31, 16, '02/07'),
(32, 17, '01/07');

-- --------------------------------------------------------

--
-- Structure de la table `fest_reservations_pass`
--

DROP TABLE IF EXISTS `fest_reservations_pass`;
CREATE TABLE IF NOT EXISTS `fest_reservations_pass` (
  `id_resa` int NOT NULL,
  `id_pass` int NOT NULL,
  `jour` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_resa`,`id_pass`),
  KEY `id_pass` (`id_pass`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fest_reservations_pass`
--

INSERT INTO `fest_reservations_pass` (`id_resa`, `id_pass`, `jour`) VALUES
(8, 5, '0000-00-00'),
(9, 6, '0000-00-00'),
(10, 7, 'du 01/07 au 02/07'),
(11, 8, 'du 01/07 au 02/07'),
(12, 9, 'du 01/07 au 02/07'),
(13, 10, 'du 01/07 au 02/07'),
(14, 11, 'du 02/07 au 03/07'),
(15, 12, 'du 02/07 au 03/07'),
(16, 13, 'du 01/07 au 02/07'),
(17, 14, '01/07'),
(18, 15, '01/07'),
(19, 16, 'du 02/07 au 03/07'),
(20, 17, 'du 02/07 au 03/07'),
(21, 18, 'du 02/07 au 03/07'),
(22, 19, '01/07'),
(23, 20, 'du 02/07 au 03/07'),
(24, 21, 'du 02/07 au 03/07'),
(25, 22, 'du 01/07 au 02/07'),
(26, 23, ''),
(27, 24, 'du 02/07 au 03/07'),
(28, 25, 'du 02/07 au 03/07'),
(29, 26, ''),
(30, 27, 'du 01/07 au 02/07'),
(31, 28, 'du 01/07 au 02/07'),
(32, 29, '01/07');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

