-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 07 mars 2022 à 16:24
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `baston`
--

-- --------------------------------------------------------

--
-- Structure de la table `arme`
--

CREATE TABLE `arme` (
  `ARMEID` int(11) NOT NULL,
  `ARMENOM` varchar(50) NOT NULL,
  `ARMEDEGATS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`ARMEID`, `ARMENOM`, `ARMEDEGATS`) VALUES
(1, 'BATARANG', 5),
(2, 'BATGRIFFE', 10),
(3, 'BATGRENADE', 20),
(6, 'RAYON THERMIQUE', 5),
(7, 'SUPER SOUFFLE', 15),
(8, 'LASER OPTIQUE', 25),
(9, 'EPEE MAGIQUE', 5),
(10, 'LASSO PARALYSANT', 15),
(11, 'LANCER DE POIDS', 25),
(12, 'GRIFFE DE FEU', 5),
(13, 'KATANA', 15),
(14, 'ARME X', 25),
(15, 'TORNADE GEANTE', 5),
(16, 'PLUIE ACIDE', 15),
(17, 'DELUGE DE FOUDRE', 25);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `EQUIPEID` int(11) NOT NULL,
  `EQUIPENOM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`EQUIPEID`, `EQUIPENOM`) VALUES
(1, 'JUSTICE LEAGUE'),
(2, 'XMEN'),
(3, 'AVENGERS'),
(4, 'GARDIENS DE LA GALAXIE'),
(5, 'UMBRELLA ACADEMY');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `PARTIEID` int(11) NOT NULL,
  `GAGNANTID` int(11) NOT NULL,
  `PERDANTID` int(11) NOT NULL,
  `PARTIEDEBUT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`PARTIEID`, `GAGNANTID`, `PERDANTID`, `PARTIEDEBUT`) VALUES
(1, 1, 6, '2022-03-08 15:17:26'),
(2, 5, 3, '2022-03-09 15:17:26'),
(3, 2, 4, '2022-03-10 15:17:26'),
(4, 1, 4, '2022-03-16 15:17:26');

-- --------------------------------------------------------

--
-- Structure de la table `persoarme`
--

CREATE TABLE `persoarme` (
  `PERSOID` int(11) NOT NULL,
  `ARMEID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE `personnage` (
  `PERSOID` int(11) NOT NULL,
  `EQUIPEID` int(11) NOT NULL,
  `PERSONOM` varchar(50) NOT NULL,
  `PERSOVIE` int(11) NOT NULL DEFAULT 100,
  `PERSOAVATAR` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnage`
--

INSERT INTO `personnage` (`PERSOID`, `EQUIPEID`, `PERSONOM`, `PERSOVIE`, `PERSOAVATAR`) VALUES
(1, 1, 'SUPERMAN', 100, NULL),
(2, 1, 'WONDERWOMAN', 100, NULL),
(3, 1, 'BATMAN', 100, NULL),
(4, 2, 'WOLWERINE', 100, NULL),
(5, 2, 'DARK PHOENIX', 100, NULL),
(6, 2, 'TORNADE', 100, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `arme`
--
ALTER TABLE `arme`
  ADD PRIMARY KEY (`ARMEID`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`EQUIPEID`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`PARTIEID`),
  ADD KEY `FK_GAGNER` (`GAGNANTID`),
  ADD KEY `FK_PERDRE` (`PERDANTID`);

--
-- Index pour la table `persoarme`
--
ALTER TABLE `persoarme`
  ADD PRIMARY KEY (`PERSOID`,`ARMEID`),
  ADD KEY `FK_UTILISER` (`ARMEID`);

--
-- Index pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD PRIMARY KEY (`PERSOID`),
  ADD KEY `FK_CONCERNER` (`EQUIPEID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `arme`
--
ALTER TABLE `arme`
  MODIFY `ARMEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `EQUIPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `PARTIEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personnage`
--
ALTER TABLE `personnage`
  MODIFY `PERSOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `FK_GAGNER` FOREIGN KEY (`GAGNANTID`) REFERENCES `personnage` (`PERSOID`),
  ADD CONSTRAINT `FK_PERDRE` FOREIGN KEY (`PERDANTID`) REFERENCES `personnage` (`PERSOID`);

--
-- Contraintes pour la table `persoarme`
--
ALTER TABLE `persoarme`
  ADD CONSTRAINT `FK_UTILISER` FOREIGN KEY (`ARMEID`) REFERENCES `arme` (`ARMEID`),
  ADD CONSTRAINT `FK_UTILISER2` FOREIGN KEY (`PERSOID`) REFERENCES `personnage` (`PERSOID`);

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `FK_CONCERNER` FOREIGN KEY (`EQUIPEID`) REFERENCES `equipe` (`EQUIPEID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
