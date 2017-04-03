-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 03 Avril 2017 à 09:15
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

-- -----------------------------------------------------------
--        Script MySQL.
-- -----------------------------------------------------------

-- Deletes database if it already exists and (re)creates it.
DROP DATABASE IF EXISTS `db_manageclass`;
CREATE DATABASE IF NOT EXISTS `db_manageclass` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_manageclass`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Structure de la table `t_absence`
--

CREATE TABLE `t_absence` (
  `idAbsence` int(11) NOT NULL,
  `absNbBlocks` int(11) NOT NULL,
  `absDate` date NOT NULL,
  `fkUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_block`
--

CREATE TABLE `t_block` (
  `idBlock` int(11) NOT NULL,
  `bloSemester` int(1) NOT NULL,
  `bloWeekDay` varchar(10) NOT NULL,
  `bloStartTime` time NOT NULL,
  `bloEndTime` time NOT NULL,
  `fkSubject` int(11) NOT NULL,
  `fkClass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_class`
--

CREATE TABLE `t_class` (
  `idClass` int(11) NOT NULL,
  `claName` varchar(6) NOT NULL,
  `claYear` int(1) NOT NULL,
  `fkUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_subject`
--

CREATE TABLE `t_subject` (
  `idSubject` int(11) NOT NULL,
  `subName` varchar(25) NOT NULL,
  `subIsTheory` tinyint(1) NOT NULL,
  `fkUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useLogin` varchar(25) NOT NULL,
  `usePassword` varchar(50) NOT NULL,
  `useSurname` varchar(30) NOT NULL,
  `useName` varchar(30) NOT NULL,
  `useBirthday` date NOT NULL,
  `useEmail` varchar(150) NOT NULL,
  `useIsTeacher` tinyint(1) NOT NULL,
  `fkClass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_absence`
--
ALTER TABLE `t_absence`
  ADD PRIMARY KEY (`idAbsence`),
  ADD KEY `fkUser` (`fkUser`);

--
-- Index pour la table `t_block`
--
ALTER TABLE `t_block`
  ADD PRIMARY KEY (`idBlock`),
  ADD KEY `fkSubject` (`fkSubject`),
  ADD KEY `fkClass` (`fkClass`);

--
-- Index pour la table `t_class`
--
ALTER TABLE `t_class`
  ADD PRIMARY KEY (`idClass`),
  ADD KEY `fkUser` (`fkUser`);

--
-- Index pour la table `t_subject`
--
ALTER TABLE `t_subject`
  ADD PRIMARY KEY (`idSubject`),
  ADD KEY `fkUser` (`fkUser`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `fkClass` (`fkClass`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_block`
--
ALTER TABLE `t_block`
  MODIFY `idBlock` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_class`
--
ALTER TABLE `t_class`
  MODIFY `idClass` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_subject`
--
ALTER TABLE `t_subject`
  MODIFY `idSubject` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_absence`
--
ALTER TABLE `t_absence`
  ADD CONSTRAINT `t_absence_ibfk_1` FOREIGN KEY (`fkUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_block`
--
ALTER TABLE `t_block`
  ADD CONSTRAINT `t_block_ibfk_1` FOREIGN KEY (`fkSubject`) REFERENCES `t_subject` (`idSubject`),
  ADD CONSTRAINT `t_block_ibfk_2` FOREIGN KEY (`fkClass`) REFERENCES `t_class` (`idClass`);

--
-- Contraintes pour la table `t_class`
--
ALTER TABLE `t_class`
  ADD CONSTRAINT `t_class_ibfk_1` FOREIGN KEY (`fkUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_subject`
--
ALTER TABLE `t_subject`
  ADD CONSTRAINT `t_subject_ibfk_1` FOREIGN KEY (`fkUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`fkClass`) REFERENCES `t_class` (`idClass`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
