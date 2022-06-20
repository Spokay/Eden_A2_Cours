-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 06 mai 2022 à 14:03
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
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `Id_article` int(11) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Texte` text NOT NULL,
  `Id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Id_article`, `Titre`, `Date`, `Photo`, `Texte`, `Id_user`) VALUES
(1, 'Test', '2021-06-09', '', 'Salut les boomers !', 4),
(26, 'OkBoomer', '2022-05-06', 'pngwing.com.png', 'super ouai', 6);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `Id_comment` int(11) NOT NULL,
  `Texte` text NOT NULL,
  `Date` date NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Id_article` int(11) DEFAULT NULL,
  `Id_comment_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`Id_comment`, `Texte`, `Date`, `Id_user`, `Id_article`, `Id_comment_parent`) VALUES
(1, 'salut', '2022-05-06', 6, 1, NULL),
(2, 'coucou', '2022-05-06', 6, 1, NULL),
(3, 'ouaip', '2022-05-06', 6, 1, NULL),
(4, 'ok', '2022-05-06', 6, 1, NULL),
(5, 'ok', '2022-05-06', 6, 1, NULL),
(6, 'ok', '2022-05-06', 6, 1, NULL),
(7, 'super', '2022-05-06', 6, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `Id_role` int(11) NOT NULL,
  `Libelle_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`Id_role`, `Libelle_role`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Editeur'),
(4, 'Lecteur');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `Id_user` int(11) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `PW` varchar(80) NOT NULL,
  `Id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id_user`, `Login`, `PW`, `Id_role`) VALUES
(4, 'titi', '$2y$10$HIV.NE3p0Hpjx5G6CvfpvOeTUKSBweqbDDbIdo23hggtKVCapMf5C', 1),
(5, 'admin123', '$2y$10$bzbwEirYnbVmsZER.e0o9ufGDosxLCsLV5OmZmbxrnOc5LVKIJJie', 1),
(6, 'michel', '$2y$10$y8nS584GY8LExDTfddFx0uQdIgWfRJDNafKp2uQOIb7U9KuYFQZr6', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id_article`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Id_comment`),
  ADD KEY `id_user` (`Id_user`,`Id_article`,`Id_comment_parent`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id_role`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`),
  ADD KEY `Id_role` (`Id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `Id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `Id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `Id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`Id_user`) REFERENCES `user` (`Id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Id_role`) REFERENCES `role` (`Id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
