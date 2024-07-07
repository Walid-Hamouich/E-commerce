-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 avr. 2023 à 14:33
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecomm`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` smallint(6) NOT NULL,
  `nom_cat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `id_command` smallint(6) NOT NULL,
  `date_command` date DEFAULT NULL,
  `id_pannier` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte_client`
--

CREATE TABLE `compte_client` (
  `id_client` smallint(6) NOT NULL,
  `nom_client` varchar(20) DEFAULT NULL,
  `prenom_client` varchar(20) DEFAULT NULL,
  `date_creation` date DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `passwordd` varchar(20) DEFAULT NULL,
  `sexe` varchar(20) DEFAULT NULL CHECK (`sexe` in ('HOMME','FEMME')),
  `tele` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte_client`
--

INSERT INTO `compte_client` (`id_client`, `nom_client`, `prenom_client`, `date_creation`, `email`, `passwordd`, `sexe`, `tele`) VALUES
(1, 'oussama', 'bouchnaif', '2023-04-27', 'oussama@gmail.com', '123', 'HOMME', '0687489611'),
(2, 'amin', 'bachri', '2023-04-28', 'amin@gmail.com', 'amin123', 'FEMME', '0687415230'),
(4, 'yassin', 'chidmi', '2023-04-28', 'yass@gmail.com', 'yas123', 'HOMME', '0687415230'),
(5, 'walid', 'hamouich', '2023-04-28', 'walid@gmail.com', 'walid123', 'HOMME', '0668412510');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` smallint(6) NOT NULL,
  `id_command` smallint(6) DEFAULT NULL,
  `date_creation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_livraison` smallint(6) NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `id_command` smallint(6) DEFAULT NULL,
  `mod_livraison` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` smallint(6) NOT NULL,
  `id_command` smallint(6) DEFAULT NULL,
  `type_paiement` varchar(20) DEFAULT NULL,
  `date_paiement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pannier`
--

CREATE TABLE `pannier` (
  `id_pannier` smallint(6) NOT NULL,
  `id_client` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pannier`
--

INSERT INTO `pannier` (`id_pannier`, `id_client`) VALUES
(1, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `pannier_produit`
--

CREATE TABLE `pannier_produit` (
  `id_pp` smallint(6) NOT NULL,
  `id_produit` smallint(6) DEFAULT NULL,
  `id_pannier` smallint(6) DEFAULT NULL,
  `qte_produit` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` smallint(6) NOT NULL,
  `id_cat` smallint(6) DEFAULT NULL,
  `nom_produit` varchar(20) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id_command`),
  ADD KEY `id_pannier` (`id_pannier`);

--
-- Index pour la table `compte_client`
--
ALTER TABLE `compte_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_livraison`),
  ADD KEY `id_command` (`id_command`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_command` (`id_command`);

--
-- Index pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD PRIMARY KEY (`id_pannier`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `pannier_produit`
--
ALTER TABLE `pannier_produit`
  ADD PRIMARY KEY (`id_pp`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_pannier` (`id_pannier`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_cat` (`id_cat`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `command`
--
ALTER TABLE `command`
  MODIFY `id_command` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `compte_client`
--
ALTER TABLE `compte_client`
  MODIFY `id_client` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id_livraison` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pannier`
--
ALTER TABLE `pannier`
  MODIFY `id_pannier` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pannier_produit`
--
ALTER TABLE `pannier_produit`
  MODIFY `id_pp` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `command`
--
ALTER TABLE `command`
  ADD CONSTRAINT `command_ibfk_1` FOREIGN KEY (`id_pannier`) REFERENCES `pannier` (`id_pannier`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`id_command`) REFERENCES `command` (`id_command`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_command`) REFERENCES `command` (`id_command`);

--
-- Contraintes pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD CONSTRAINT `pannier_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `compte_client` (`id_client`);

--
-- Contraintes pour la table `pannier_produit`
--
ALTER TABLE `pannier_produit`
  ADD CONSTRAINT `pannier_produit_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `pannier_produit_ibfk_2` FOREIGN KEY (`id_pannier`) REFERENCES `pannier` (`id_pannier`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
