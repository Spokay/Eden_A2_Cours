-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 nov. 2021 à 15:58
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
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_emprunt` int(3) NOT NULL,
  `id_livre` int(3) DEFAULT NULL,
  `id_abonne` int(3) DEFAULT NULL,
  `date_sortie` date NOT NULL,
  `date_rendu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_livre`, `id_abonne`, `date_sortie`, `date_rendu`) VALUES
(29, 105, 2, '2020-11-02', '2010-11-12'),
(30, 100, 1, '2021-11-10', NULL),
(31, 100, 1, '2021-11-10', '2021-11-11'),
(32, 100, 1, '2021-11-10', '2021-11-11'),
(33, 101, 2, '2021-11-10', NULL),
(34, 105, 4, '2021-11-10', '2017-11-14'),
(35, 105, 1, '2021-11-10', '2021-10-04'),
(38, 102, 2, '2021-11-10', '2019-11-02'),
(40, 103, 3, '2021-11-12', NULL),
(41, 103, 3, '2021-11-15', NULL),
(43, 103, 4, '2021-11-12', '2021-11-23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id_emprunt`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id_emprunt` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
