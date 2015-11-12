-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 12 Novembre 2015 à 14:25
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Cnambook`
--

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `iduser` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date_naissance` date NOT NULL,
  `lien_photo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_inscription` date NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ville_origine` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ville_residence` varchar(100) CHARACTER SET utf8 NOT NULL,
  `idsection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`iduser`);
