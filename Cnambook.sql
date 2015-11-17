-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 17 Novembre 2015 à 17:41
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `cnambook`
--

-- --------------------------------------------------------

--
-- Structure de la table `Amis`
--

CREATE TABLE `Amis` (
  `iduser1` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Compteur`
--

CREATE TABLE `Compteur` (
  `date` date NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL,
  `idstatut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Section`
--

CREATE TABLE `Section` (
  `idsection` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Statut`
--

CREATE TABLE `Statut` (
  `idstatut` int(11) NOT NULL,
  `texte` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Statut`
--

INSERT INTO `Statut` (`idstatut`, `texte`, `date`, `heure`, `iduser`) VALUES
(1, 'Coucou, ceci est un le premier statut de test', '2015-11-12', '2015-11-12 15:48:19', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `lien_photo` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `ville_origine` varchar(100) NOT NULL,
  `ville_residence` varchar(100) NOT NULL,
  `idsection` int(11) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`iduser`, `nom`, `prenom`, `date_naissance`, `lien_photo`, `date_inscription`, `mail`, `ville_origine`, `ville_residence`, `idsection`, `password`) VALUES
(2, 'mondion', 'clément', '1992-10-29', '/home/photo.jpg', '2015-11-12', 'clement.mondion@gmail.com', 'meulan', 'courbevoie', 10, '88d99be46450cfa84e8a3ef90a45d462'),
(3, 'Quie', 'Jo', '1993-03-22', '/home/jo.png', '2015-11-12', 'jonathanquie@hotmail.fr', 'champagne sur oise', 'vincennes', 10, '1a1dc91c907325c69271ddf0c944bc72');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`idsection`);

--
-- Index pour la table `Statut`
--
ALTER TABLE `Statut`
  ADD PRIMARY KEY (`idstatut`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Section`
--
ALTER TABLE `Section`
  MODIFY `idsection` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;