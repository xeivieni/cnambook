-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Sam 21 Novembre 2015 à 18:09
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
  `idamitie` int(11) NOT NULL,
  `iduser1` int(11) NOT NULL,
  `iduser2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Amis`
--

INSERT INTO `Amis` (`idamitie`, `iduser1`, `iduser2`) VALUES
(1, 2, 3),
(3, 4, 5),
(8, 6, 2),
(9, 2, 4),
(10, 8, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `idcomm` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idstatut` int(11) NOT NULL,
  `texte` varchar(250) NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Likes`
--

CREATE TABLE `Likes` (
  `idlike` int(11) NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL,
  `idstatut` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Likes`
--

INSERT INTO `Likes` (`idlike`, `heure`, `iduser`, `idstatut`) VALUES
(1, '2015-11-19 12:17:45', 2, 4),
(4, '2015-11-21 14:00:53', 6, 15),
(6, '2015-11-21 14:12:02', 6, 7),
(8, '2015-11-21 15:07:22', 6, 6),
(10, '2015-11-21 15:27:33', 2, 14),
(11, '2015-11-21 16:43:20', 2, 19);

-- --------------------------------------------------------

--
-- Structure de la table `Section`
--

CREATE TABLE `Section` (
  `idsection` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Section`
--

INSERT INTO `Section` (`idsection`, `nom`, `annee`) VALUES
(1, 'SETI3', 2016),
(2, 'SETI3', 2016),
(3, 'STN3', 2016),
(4, 'STN3', 2016),
(5, 'EPRM3', 2016),
(6, 'EPRM3', 2016),
(7, 'SESF3', 2016),
(8, 'SESF3', 2016),
(9, 'IDEE3', 2016),
(10, 'IDEE3', 2016),
(11, 'MECA3', 2016),
(12, 'MECA3', 2016),
(13, 'SETI2', 2016),
(14, 'SETI2', 2016),
(15, 'STN2', 2016),
(16, 'STN2', 2016),
(17, 'SESF2', 2016),
(18, 'SESF2', 2016),
(19, 'MECA2', 2016),
(20, 'MECA2', 2016);

-- --------------------------------------------------------

--
-- Structure de la table `Statut`
--

CREATE TABLE `Statut` (
  `idstatut` int(11) NOT NULL,
  `texte` text NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Statut`
--

INSERT INTO `Statut` (`idstatut`, `texte`, `heure`, `iduser`) VALUES
(1, 'Coucou, ceci est un le premier statut de test', '2015-11-12 15:48:19', 2),
(2, 'Compte tenu de l''inconstance induite, il ne faut pas s''interdire d''imaginer certaines améliorations réalisables, avec toute la prudence requise.', '2015-11-19 12:10:32', 3),
(3, 'Eu égard à l''inconstance intrinsèque, je recommande d''appréhender chacune des actions réalisables, parce que nous ne faisons plus le même métier.', '2015-11-19 12:10:34', 3),
(4, 'Considérant l''inconstance générale, il convient d''imaginer certaines solutions possibles, à court terme.', '2015-11-19 12:11:48', 4),
(5, 'Tant que durera l''orientation conjoncturelle, nous sommes contraints de prendre en considération les principales issues optimales, à long terme.', '2015-11-19 12:11:51', 4),
(6, 'Tant que durera l''inertie présente, on ne peut se passer d''anticiper l''ensemble des hypothèses réalisables, parce que la nature a horreur du vide.\r\n', '2015-11-19 12:12:15', 2),
(7, 'Quelle que soit cette inflexion de l''époque actuelle, je préconise un audit afin d''examiner la majorité des synergies imaginables, à l''avenir.\r\n', '2015-11-19 12:12:16', 2),
(8, 'Nonobstant l''inconstance actuelle, il serait bon de considérer chacune des alternatives réalisables, parce qu''il est temps d''agir.', '2015-11-19 12:12:41', 4),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus purus vitae tempor pellentesque. Morbi lorem eros, dictum sit amet efficitur et, hendrerit vel quam. Vivamus et interdum nisl. Suspendisse semper tincidunt pellentesque. Integer vitae urna ipsum. Suspendisse ac diam sit amet nisi condimentum maximus. Donec ut justo est. Cum.', '2015-11-19 12:12:43', 4),
(11, 'Je m''appel bob', '2015-11-19 12:14:59', 4),
(12, 'Je suis une étoile de mer', '2015-11-19 12:15:16', 5),
(14, 'coucou', '2015-11-21 12:11:13', 3),
(15, 'Bonsoir les enfants', '2015-11-21 13:58:09', 6),
(16, 'J''ai la dalle', '2015-11-21 15:20:58', 6),
(17, 'Salut je suis nouvelle ici, comment ca marche pour les gang bang ?', '2015-11-21 15:35:05', 8),
(18, 'et les caractÃ¨res spÃ©ciaux ?', '2015-11-21 15:39:05', 8),
(19, 'Imaginons que je veuilles utiliser des caractÃ¨res spÃ©ciaux, que ce passe t il ? ', '2015-11-21 16:42:17', 2);

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
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mail` varchar(100) NOT NULL,
  `ville_origine` varchar(100) NOT NULL,
  `ville_residence` varchar(100) NOT NULL,
  `idsection` int(11) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`iduser`, `nom`, `prenom`, `date_naissance`, `lien_photo`, `date_inscription`, `mail`, `ville_origine`, `ville_residence`, `idsection`, `password`) VALUES
(2, 'mondion', 'clément', '1992-10-29', 'clem.jpg\r\n', '2015-11-11 23:00:00', 'clement.mondion@gmail.com', 'meulan', 'courbevoie', 10, '88d99be46450cfa84e8a3ef90a45d462'),
(3, 'Quie', 'Jo', '1993-03-22', 'jo.png', '2015-11-11 23:00:00', 'jonathanquie@hotmail.fr', 'champagne sur oise', 'vincennes', 10, '1a1dc91c907325c69271ddf0c944bc72'),
(4, 'L''éponge', 'Bob', '2014-08-12', 'bob.png', '2015-11-18 23:00:00', 'bob.leponge@gmail.com', 'sous la mer', 'ananas', 10, 'bob'),
(5, 'L''étoile', 'Patrick', '2014-08-12', 'pat.png', '2015-11-18 23:00:00', 'patrick.letoile@gmail.com', 'sous la mer', 'caillou', 10, 'pat'),
(6, 'Mouse', 'Mickey', '2004-05-30', 'mickey.jpg', '2019-11-14 23:00:00', 'mickey.mouse@gmail.com', 'disney', 'land', 0, '4d5257e5acc7fcac2f5dcd66c4e78f9a'),
(8, 'L''Ã©cureuil', 'Sandy', '2004-10-28', 'sandy.jpg', '2019-11-14 23:00:00', 'sandy.lecureuil@gmail.com', 'paris', 'sous l''eau', 0, 'd686a53fb86a6c31fa6faa1d9333267e');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Amis`
--
ALTER TABLE `Amis`
  ADD PRIMARY KEY (`idamitie`);

--
-- Index pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`idcomm`);

--
-- Index pour la table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`idlike`);

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
  ADD PRIMARY KEY (`iduser`),
  ADD FULLTEXT KEY `search` (`nom`,`prenom`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Amis`
--
ALTER TABLE `Amis`
  MODIFY `idamitie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `idcomm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Section`
--
ALTER TABLE `Section`
  MODIFY `idsection` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `Statut`
--
ALTER TABLE `Statut`
  MODIFY `idstatut` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;