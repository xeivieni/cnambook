-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 25 Novembre 2015 à 17:55
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Amis`
--

INSERT INTO `Amis` (`idamitie`, `iduser1`, `iduser2`) VALUES
(1, 2, 3),
(3, 4, 5),
(8, 6, 2),
(9, 2, 4),
(10, 8, 2),
(11, 2, 10),
(12, 12, 3),
(13, 12, 2),
(14, 12, 4),
(15, 12, 5),
(17, 2, 11),
(18, 2, 14),
(19, 2, 13),
(20, 16, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Commentaires`
--

INSERT INTO `Commentaires` (`idcomm`, `iduser`, `idstatut`, `texte`, `heure`) VALUES
(1, 11, 20, 'Test de commentaire', '2015-11-22 17:48:30'),
(2, 11, 20, 'Test de commentaire', '2015-11-22 17:51:03'),
(3, 2, 19, 'coucou', '2015-11-22 19:43:22'),
(4, 2, 11, 'C''est trop cool ta vie bob', '2015-11-22 19:51:54'),
(5, 2, 11, 'Franchement imotep', '2015-11-22 19:53:38'),
(6, 2, 21, 'Tu veux voir ma ...', '2015-11-22 20:01:07'),
(7, 2, 21, '?', '2015-11-22 20:01:15'),
(8, 3, 21, 'Boloss', '2015-11-22 20:36:35'),
(9, 3, 1, 'Ca marche', '2015-11-22 20:36:49'),
(10, 2, 3, 'Va faire du vÃ©lo', '2015-11-22 20:39:04'),
(11, 2, 1, 'boloss', '2015-11-23 17:45:46'),
(12, 2, 23, 'Tout a l''air de fonctionner au mieux, tu peux aller te coucher', '2015-11-23 23:00:06');

-- --------------------------------------------------------

--
-- Structure de la table `Likes`
--

CREATE TABLE `Likes` (
  `idlike` int(11) NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL,
  `idstatut` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Likes`
--

INSERT INTO `Likes` (`idlike`, `heure`, `iduser`, `idstatut`) VALUES
(1, '2015-11-19 12:17:45', 2, 4),
(4, '2015-11-21 14:00:53', 6, 15),
(10, '2015-11-21 15:27:33', 2, 14),
(13, '2015-11-21 18:09:29', 2, 18),
(15, '2015-11-21 18:24:18', 2, 17),
(16, '2015-11-21 18:24:21', 2, 16),
(17, '2015-11-21 18:24:24', 2, 5),
(18, '2015-11-21 18:24:26', 2, 8),
(19, '2015-11-21 18:24:30', 2, 2),
(22, '2015-11-22 19:44:59', 2, 21),
(23, '2015-11-22 19:45:10', 2, 15),
(24, '2015-11-22 20:36:38', 3, 1),
(25, '2015-11-22 22:28:06', 2, 3),
(26, '2015-11-22 22:28:07', 2, 22),
(27, '2015-11-23 22:59:47', 2, 23);

-- --------------------------------------------------------

--
-- Structure de la table `Section`
--

CREATE TABLE `Section` (
  `idsection` int(11) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `annee` int(11) NOT NULL,
  `promotion` year(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Section`
--

INSERT INTO `Section` (`idsection`, `filiere`, `annee`, `promotion`) VALUES
(1, 'SETI', 2, 2016),
(2, 'SETI', 3, 2016),
(3, 'STN', 3, 2016),
(4, 'STN', 2, 2016),
(5, 'EPRM', 3, 2016),
(6, 'EPRM', 2, 2016),
(7, 'EPRM', 2, 2016),
(8, 'SESF', 3, 2016),
(9, 'IDEE', 2, 2016),
(10, 'IDEE', 3, 2016),
(11, 'MECA', 3, 2016),
(12, 'MECA', 2, 2016),
(13, 'SETI', 1, 2016),
(15, 'STN', 1, 2016),
(17, 'SESF', 2, 2016),
(18, 'SESF', 1, 2016),
(19, 'MECA', 1, 2016),
(20, 'IDEE', 1, 2016),
(21, 'test', 2, 2002),
(22, 'Prof', 0, 2015),
(26, 'SETI', 3, 2015),
(30, 'SETI', 2, 2015),
(31, 'prof', 3, 2016),
(32, 'section test', 12, 2018);

-- --------------------------------------------------------

--
-- Structure de la table `Statut`
--

CREATE TABLE `Statut` (
  `idstatut` int(11) NOT NULL,
  `texte` text NOT NULL,
  `heure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Statut`
--

INSERT INTO `Statut` (`idstatut`, `texte`, `heure`, `iduser`) VALUES
(1, 'Coucou, ceci est un le premier statut de test', '2015-11-12 15:48:19', 2),
(11, 'Je m''appel bob', '2015-11-19 12:14:59', 4),
(12, 'Je suis une étoile de mer', '2015-11-19 12:15:16', 5),
(14, 'coucou', '2015-11-21 12:11:13', 3),
(15, 'Bonsoir les enfants', '2015-11-21 13:58:09', 6),
(16, 'J''ai la dalle', '2015-11-21 15:20:58', 6),
(17, 'Salut je suis nouvelle ici, comment ca marche pour les gang bang ?', '2015-11-21 15:35:05', 8),
(18, 'et les caractÃ¨res spÃ©ciaux ?', '2015-11-21 15:39:05', 8),
(19, 'Imaginons que je veuilles utiliser des caractÃ¨res spÃ©ciaux, que ce passe t il ? ', '2015-11-21 16:42:17', 2),
(20, 'Gros test', '2015-11-22 17:43:27', 11),
(21, 'Coucou', '2015-11-22 18:56:53', 12),
(22, 'J''ai pas d''ami, ni de curly....', '2015-11-22 20:09:10', 13),
(23, 'Dernier statut et au dodo', '2015-11-23 22:59:40', 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`iduser`, `nom`, `prenom`, `date_naissance`, `lien_photo`, `date_inscription`, `mail`, `ville_origine`, `ville_residence`, `idsection`, `password`) VALUES
(2, 'Mondion', 'ClÃ©ment', '1992-10-29', '../img/users/clem.jpg', '2015-11-11 23:00:00', 'clement.mondion@gmail.com', 'meulan', 'courbevoie', 2, '88d99be46450cfa84e8a3ef90a45d462'),
(3, 'QuiÃ©', 'Jo', '1993-03-22', '../img/users/lance.jpg', '2015-11-11 23:00:00', 'jonathanquie@hotmail.fr', 'champagne sur oise', 'vincennes', 2, '1a1dc91c907325c69271ddf0c944bc72'),
(4, 'L''Ã©ponge', 'Bob', '2014-08-12', '../img/users/bob.png', '2015-11-18 23:00:00', 'bob.leponge@gmail.com', 'sous la mer', 'ananas', 10, '9f9d51bc70ef21ca5c14f307980a29d8'),
(5, 'L''Ã©toile', 'Patrick', '2014-08-12', 'pat.png', '2015-11-18 23:00:00', 'patrick.letoile@gmail.com', 'sous la mer', 'caillou', 10, '7852341745c93238222a65a910d1dcc5'),
(6, 'Mouse', 'Mickey', '2004-05-30', 'mickey.jpg', '2019-11-14 23:00:00', 'mickey.mouse@gmail.com', 'disney', 'land', 1, '4d5257e5acc7fcac2f5dcd66c4e78f9a'),
(8, 'L''Ã©cureuil', 'Sandy', '2004-10-28', 'sandy.jpg', '2019-11-14 23:00:00', 'sandy.lecureuil@gmail.com', 'paris', 'sous l''eau', 3, 'd686a53fb86a6c31fa6faa1d9333267e'),
(9, 'Cuzuel', 'Popo', '1996-05-26', '../img/users/Madamecatastrophe.jpg', '2019-11-14 23:00:00', 'popo.cucu@gmail.com', 'Poissy', 'Courbevoie', 4, '3b2285b348e95774cb556cb36e583106'),
(10, 'Aimez', 'Camille', '1991-10-05', '../img/users/cam.jpg', '2019-11-14 23:00:00', 'caimez@me.com', 'Uccle', 'Courbevoie', 2, '3a22c9ea9a3039d180e0a514a5a3b619'),
(11, 'Merouane', 'Mehdi', '1992-01-01', '../img/users/mehdi.jpg', '2019-11-14 23:00:00', 'mehdi.merouane@gmail.com', 'Houilles', 'Houilles', 1, '7f7d49795dcf0a82605fb1103ed20d28'),
(12, 'Rafidison', 'Mickael', '1992-02-01', '../img/users/michou.jpg', '2019-11-14 23:00:00', 'mickael.rafidison@gmail.com', 'Madagascar city', 'Loin', 3, '862752f50fa68ebf41d03f0b00bef0a8'),
(13, 'Hulot', 'Thibaut', '1990-01-01', '../img/users/130821153453-pavel-13-horizontal-large-gallery.jpg', '2019-11-14 23:00:00', 'titi.hulot@gmail.com', 'Fourqueux', 'Fourqueux', 2, '5d933eef19aee7da192608de61b6c23d'),
(14, 'Yildirim', 'HervÃ©', '1992-02-01', '../img/users/turc.jpg', '2019-11-14 23:00:00', 'herve.yildirim@gmail.com', 'Istanbul', 'Paris', 2, 'eefde70a4a3c5afdde3f2deac5a4954a'),
(15, 'test', 'test', '3221-04-09', '../img/users/default.jpg', '2019-11-14 23:00:00', 'test@test.fr', 'test', 'test', 21, '098f6bcd4621d373cade4e832627b4f6'),
(16, 'cyril', 'boyer', '3444-02-03', '../img/users/default.jpg', '2019-11-14 23:00:00', 'cyril.boyer@gmail.com', 'paris', 'paris', 2, '9b22e8ac450bf8dabd90915b1b00a15c'),
(17, 'Grossetti', 'Quentin', '1990-01-02', '../img/users/prof.jpg', '2019-11-14 23:00:00', 'quentin.grossetti@gmail.com', 'paris', 'paris', 26, 'c7f413a4f6f4a658c24f0a437666089e'),
(18, 'testtt', 'testttt', '2009-04-03', '../img/users/default.jpg', '2019-11-14 23:00:00', 'test2@test.fr', 'cvgubhinj', 'ctfvygubhinj', 32, '098f6bcd4621d373cade4e832627b4f6');

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
  MODIFY `idamitie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `idcomm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `idlike` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `Section`
--
ALTER TABLE `Section`
  MODIFY `idsection` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `Statut`
--
ALTER TABLE `Statut`
  MODIFY `idstatut` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;