-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 jan. 2022 à 16:02
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
-- Base de données : `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'chemise'),
(2, 'pull'),
(3, 't-shirt'),
(4, 'pantalon'),
(5, 'botte'),
(7, 'soulier');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id_etat` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id_etat`, `nom`) VALUES
(1, 'preparation'),
(2, 'expedie'),
(3, 'arrive');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `status`) VALUES
(1, 'Spokayyyyy', 'test', 'Bressange', 'Hug', 'hugo@gmail.com', 'm', 'Bordeaux', 45000, '28 rue des potiers', 0),
(3, 'joe', 'joe', 'joe', 'joe', 'joe@joe.fr', 'm', 'Paris', 23145, '6, allée d\'ARZ', 0),
(4, 'bonsoir', '02af8e49016521ad8dd60f8451f3ffe3', 'Chior', 'Daniel', 'joe@michel.fr', 'm', 'Rien', 12340, '100 rue des potiers', 0),
(6, 'Jackie', 'f02368945726d5fc2a14eb576f7276c0', 'Jack', 'Jack', 'jack@test.fr', 'm', 'Brest', 34500, '2 rue des papillons', 0),
(8, 'Slayer', '121189969c46f49b8249633c2d5a7bfa', 'Bernard', 'Bernard', 'bernard@orange.fr', 'm', 'Calais', 99000, '12 rue du chanteur', 0),
(9, 'Hugo', '1b3840b0b70d91c17e70014c8537dbba', 'Hugo', 'Hugo', 'hbre@gmail.com', 'm', 'Colombes', 92700, '28 rue des potiers', 0),
(10, 'Admin', '0192023a7bbd73250516f069df18b500', 'Admin', 'Admin', 'admin@gmail.fr', 'm', 'Paris', 92700, '28 rue des potiers', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `id_taille` int(11) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `id_categorie`, `titre`, `description`, `couleur`, `id_taille`, `public`, `photo`, `prix`, `stock`) VALUES
(14, '9683284842385617', 1, 'chemise blanche', 'chemise blanche normale', 'blanc', 5, 'm', '/A2_Cours/site/photo/9683284842385617-chemiseblanchem.jpg', 23, 120),
(15, '4010439593903523', 1, 'Pull gris', 'pull gris en coton ', 'gris', 1, 'm', '/A2_Cours/site/photo/4010439593903523-pullgrism2.jpg', 56, 100),
(16, '6958242062280122', 3, 'T-shit vert', 't-shirt de couleur verte', 'vert', 3, 'm', '/A2_Cours/site/photo/6958242062280122-13_88-g-77_vert.png', 32, 100),
(17, '9862899144513554', 4, 'pantalon gris', 'pantalon de couleur grise', 'gris', 4, 'm', '/A2_Cours/site/photo/9862899144513554-30_img1.jpeg', 57, 130),
(18, '5471716408288914', 2, 'pull gris', 'pull gris ', 'gris', 3, 'm', '/A2_Cours/site/photo/5471716408288914-pullgrism2.jpg', 45, 150),
(24, '497-927', 1, 'pull', 'pull ', 'bleu', 1, 'm', '/A2_Cours/site/photo/497-927-11-d-23_bleu.jpg', 24, 80),
(30, '7731647265624367', 1, 'chemise bleu', 'chemise de couleur bleu', 'bleu', 4, 'm', '/A2_Cours/site/photo/7731647265624367-30_1098_monbleu.jpg', 123, 300),
(31, '5503141821165202', 3, 'Tshirt vert', 'T-shirt de couleur verte', 'vert', 1, 'm', '/A2_Cours/site/photo/5503141821165202-88-g-77_vert.png', 14, 15);

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`id_status`, `nom`) VALUES
(0, 'membre'),
(1, 'administrateur'),
(2, 'direction');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE `taille` (
  `id_taille` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`id_taille`, `nom`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(7, 'XXL');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`id_taille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id_etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `taille`
--
ALTER TABLE `taille`
  MODIFY `id_taille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
