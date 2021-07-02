-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Février 2017 à 00:46
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ges_stagiaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id_s` int(11) DEFAULT NULL,
  `id_m` int(11) DEFAULT NULL,
  `id_abs` int(11) NOT NULL,
  `date_a` datetime DEFAULT NULL,
  `h_abs` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id_e` int(11) NOT NULL,
  `date_e` datetime DEFAULT NULL,
  `type` varchar(55) DEFAULT NULL,
  `id_module` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`id_e`, `date_e`, `type`, `id_module`) VALUES
(12, '2017-02-01 00:00:00', 'control 1', 3),
(11, '2017-02-22 00:00:00', 'efm', 2),
(10, '2017-02-03 00:00:00', 'control 2', 2),
(9, '2016-11-18 00:00:00', 'control 1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `exam_pass`
--

CREATE TABLE `exam_pass` (
  `id` int(11) DEFAULT NULL,
  `note` float DEFAULT NULL,
  `id_exam` int(11) DEFAULT NULL,
  `id_stg` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `filliere`
--

CREATE TABLE `filliere` (
  `code_f` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `filliere`
--

INSERT INTO `filliere` (`code_f`) VALUES
('technique de commerce et vente'),
('technique de developpement informatique'),
('technique de secrÃ©tariat et developpement');

-- --------------------------------------------------------

--
-- Structure de la table `group_`
--

CREATE TABLE `group_` (
  `code_g` varchar(55) NOT NULL,
  `id_filliere` varchar(55) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `group_`
--

INSERT INTO `group_` (`code_g`, `id_filliere`) VALUES
('TDI', 'technique de developpement informatique'),
('TCE', 'technique de commerce et vente'),
('TSD', 'technique de secrÃ©tariat et developpement');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `code_m` int(11) NOT NULL,
  `intitule` varchar(55) NOT NULL,
  `horaire` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `module`
--

INSERT INTO `module` (`code_m`, `intitule`, `horaire`) VALUES
(2, 'langage c', 72),
(3, 'bureautique', 46);

-- --------------------------------------------------------

--
-- Structure de la table `semain`
--

CREATE TABLE `semain` (
  `id_s` int(11) NOT NULL,
  `date_d` datetime DEFAULT NULL,
  `date_f` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stagiaire`
--

CREATE TABLE `stagiaire` (
  `cne` int(11) NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  `prenom` varchar(55) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `age` datetime DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `groups` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stagiaire`
--

INSERT INTO `stagiaire` (`cne`, `nom`, `prenom`, `ville`, `age`, `genre`, `groups`) VALUES
(1234, 'anass', 'mounjim', 'el jadida', '2017-02-08 00:00:00', 'homme', 'TDI'),
(212222, 'hoda', 'radi', 'el jadida', '2017-02-09 00:00:00', 'femme', 'TDI'),
(12, 'hind', 'rabii', 'el jadida', '2017-02-07 00:00:00', 'femme', 'TCE'),
(111, 'mehdi', 'zawi', 'el jadida', '2017-02-14 00:00:00', 'homme', 'TDI'),
(1, 'anass', 'mounjim', 'el jadida', '2017-02-09 00:00:00', 'homme', ''),
(1022, 'fatima ezzahrae', 'hadi', 'el jadida', '2017-02-08 00:00:00', 'femme', 'TDI'),
(3333, 'SAMI', 'SORI', 'CASA', '2017-02-21 00:00:00', 'homme', 'TDI'),
(5555, 'fatima ezzahrae', 'filo', 'el jadida', '2017-02-20 00:00:00', 'femme', 'TDI');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_abs`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_e`);

--
-- Index pour la table `filliere`
--
ALTER TABLE `filliere`
  ADD PRIMARY KEY (`code_f`);

--
-- Index pour la table `group_`
--
ALTER TABLE `group_`
  ADD PRIMARY KEY (`code_g`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`code_m`);

--
-- Index pour la table `stagiaire`
--
ALTER TABLE `stagiaire`
  ADD PRIMARY KEY (`cne`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_abs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `code_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
