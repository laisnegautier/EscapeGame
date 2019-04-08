-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 26 mars 2019 à 22:39
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `escape`
--

-- --------------------------------------------------------

--
-- Structure de la table `gamemasters`
--

DROP TABLE IF EXISTS `gamemasters`;
CREATE TABLE IF NOT EXISTS `gamemasters` (
  `idGM` int(11) NOT NULL AUTO_INCREMENT,
  `nameGM` varchar(25) NOT NULL,
  `passwordGM` varchar(255) NOT NULL,
  `connected` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`idGM`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gamemasters`
--

INSERT INTO `gamemasters` (`idGM`, `nameGM`, `passwordGM`, `connected`) VALUES
(1, 'TheEscapee', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 1),
(2, 'The Master Of The Game', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 0);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `idGame` int(11) NOT NULL AUTO_INCREMENT,
  `titleGame` varchar(255) NOT NULL,
  `descriptionGame` text NOT NULL,
  `timeMaxGame` int(11) NOT NULL,
  `locationBack1` varchar(20) NOT NULL,
  `locationBack2` varchar(20) NOT NULL,
  `locationMusic` varchar(20) NOT NULL,
  PRIMARY KEY (`idGame`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `games`
--

INSERT INTO `games` (`idGame`, `titleGame`, `descriptionGame`, `timeMaxGame`, `locationBack1`, `locationBack2`, `locationMusic`) VALUES
(1, 'Atmospheria', 'Saurez-vous franchir toutes les portes ? Retrouverez-vous le chemin vers la sortie ? Entrez dès à présent dans ce 8 clos.', 1800, 'game1back1.jpg', 'game1back2.png', 'game1.mp3'),
(2, 'Tempo', 'Incarnez une fourmi qui se retrouve enfermée dans les mains d\'un jeune enfant insousciant. Le convaincrez-vous de vous relacher ?', 600, 'game2back1.jpg', 'game2back2.png', 'game2.mp3');

-- --------------------------------------------------------

--
-- Structure de la table `gamestates`
--

DROP TABLE IF EXISTS `gamestates`;
CREATE TABLE IF NOT EXISTS `gamestates` (
  `idGamestate` int(11) NOT NULL AUTO_INCREMENT,
  `demandDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validationState` tinyint(4) DEFAULT NULL,
  `validationDate` timestamp NULL DEFAULT NULL,
  `timer` tinyint(4) DEFAULT NULL,
  `endGameDate` timestamp NULL DEFAULT NULL,
  `lastStepValidated` int(11) DEFAULT NULL,
  `gameFinished` tinyint(4) DEFAULT NULL,
  `victory` tinyint(4) DEFAULT NULL,
  `gameReview` int(11) DEFAULT NULL,
  `idTeam` int(11) NOT NULL,
  `idGame` int(11) NOT NULL,
  `idGM` int(11) NOT NULL,
  PRIMARY KEY (`idGamestate`),
  KEY `FKidTeam_gamestates` (`idTeam`),
  KEY `FKidGame_gamestates` (`idGame`),
  KEY `FKidGM_gamestates` (`idGM`)
) ENGINE=MyISAM AUTO_INCREMENT=190 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gamestates`
--

INSERT INTO `gamestates` (`idGamestate`, `demandDate`, `validationState`, `validationDate`, `timer`, `endGameDate`, `lastStepValidated`, `gameFinished`, `victory`, `gameReview`, `idTeam`, `idGame`, `idGM`) VALUES
(40, '2019-02-27 10:38:38', NULL, '1999-12-31 22:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(41, '2019-02-27 10:47:27', 0, '2019-02-27 10:53:24', 1, NULL, NULL, NULL, NULL, 1, 1, 1, 1),
(42, '2019-02-27 10:53:04', 1, '2019-02-27 10:53:29', 1, NULL, 1, 1, NULL, 3, 1, 1, 1),
(43, '2019-02-27 11:49:17', 1, '2019-02-27 11:49:22', 1, NULL, 0, 1, 0, NULL, 1, 1, 1),
(44, '2019-02-28 08:29:16', 1, '2019-02-28 08:29:21', 1, NULL, 0, 1, 0, 4, 1, 2, 1),
(45, '2019-02-28 08:31:30', 1, '2019-02-28 08:31:34', 1, NULL, NULL, 1, 0, 5, 1, 1, 1),
(46, '2019-02-28 08:38:29', 1, '2019-02-28 08:38:33', 1, NULL, NULL, 1, 0, 1, 1, 2, 1),
(47, '2019-02-28 08:39:19', 1, '2019-02-28 08:39:21', 1, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(48, '2019-02-28 08:45:57', 1, '2019-02-28 08:45:59', 1, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(49, '2019-02-28 08:48:18', 1, '2019-02-28 08:48:21', 1, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(50, '2019-02-28 08:49:41', 1, '2019-02-28 08:49:43', 1, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(51, '2019-02-28 08:50:48', 1, '2019-02-28 08:50:52', 0, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(52, '2019-02-28 08:52:49', 1, '2019-02-28 08:52:52', 1, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(53, '2019-02-28 08:53:15', 1, '2019-02-28 08:53:18', 0, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(54, '2019-02-28 09:47:49', 1, '2019-02-28 09:47:57', 0, NULL, 4, 1, NULL, NULL, 1, 1, 1),
(55, '2019-02-28 12:38:52', 1, '2019-02-28 12:39:00', 1, NULL, 10, 1, NULL, NULL, 1, 1, 1),
(56, '2019-02-28 13:33:45', 1, '2019-02-28 13:33:49', 1, NULL, 10, 1, NULL, NULL, 1, 1, 1),
(57, '2019-03-02 07:04:10', 0, '2019-03-02 07:04:52', 1, NULL, NULL, 1, 0, NULL, 1, 1, 1),
(58, '2019-03-02 07:05:22', 1, '2019-03-02 07:05:29', 1, NULL, 0, 1, 0, 4, 1, 1, 1),
(59, '2019-03-02 07:29:14', 1, '2019-03-02 07:29:17', 1, NULL, 2, 1, NULL, NULL, 1, 1, 1),
(60, '2019-03-03 12:52:34', 1, '2019-03-03 12:52:46', 1, NULL, 0, 1, 0, 3, 1, 2, 1),
(61, '2019-03-03 13:40:31', 1, '2019-03-03 13:40:40', 0, '2019-03-03 14:18:06', 4, 1, 1, NULL, 1, 1, 1),
(62, '2019-03-03 14:18:17', NULL, '1999-12-31 22:00:00', 1, '2019-03-03 14:18:39', NULL, NULL, NULL, NULL, 1, 2, 1),
(63, '2019-03-03 14:18:52', NULL, '1999-12-31 22:00:00', 1, '2019-03-03 14:20:06', NULL, NULL, NULL, NULL, 1, 2, 1),
(64, '2019-03-03 14:20:12', NULL, '1999-12-31 22:00:00', 1, '2019-03-03 14:27:15', NULL, NULL, NULL, NULL, 1, 2, 1),
(65, '2019-03-03 14:27:38', 1, '2019-03-03 14:27:51', 1, '2019-03-03 14:29:19', 0, 1, 1, NULL, 1, 2, 1),
(66, '2019-03-03 14:30:15', NULL, '1999-12-31 22:00:00', 0, '2019-03-03 14:30:15', NULL, NULL, NULL, NULL, 1, 1, 1),
(67, '2019-03-03 14:31:32', 0, '2019-03-03 14:47:28', 1, '2019-03-03 14:31:32', NULL, NULL, NULL, NULL, 1, 1, 1),
(68, '2019-03-03 14:31:50', NULL, '1999-12-31 22:00:00', 1, '2019-03-03 14:33:23', NULL, NULL, NULL, NULL, 1, 1, 1),
(69, '2019-03-03 14:36:50', 1, '2019-03-03 14:37:04', 1, NULL, 4, 1, 1, NULL, 1, 1, 1),
(70, '2019-03-03 14:47:23', 1, '2019-03-03 14:47:30', 1, NULL, 4, 1, 1, NULL, 1, 1, 1),
(71, '2019-03-03 14:49:01', 1, '2019-03-03 14:49:05', 1, NULL, 3, 1, 1, NULL, 1, 1, 1),
(72, '2019-03-04 16:10:44', NULL, '1999-12-31 22:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(73, '2019-03-04 16:10:53', 1, '2019-03-04 16:14:13', 0, NULL, 3, 1, 1, NULL, 1, 1, 1),
(74, '2019-03-04 18:49:11', 1, '2019-03-04 18:49:20', 1, NULL, 1, 1, 0, NULL, 1, 1, 1),
(75, '2019-03-04 19:21:11', 1, '2019-03-04 19:21:20', 1, NULL, 1, 1, NULL, NULL, 1, 1, 1),
(76, '2019-03-04 19:40:07', 1, '2019-03-04 19:40:13', 0, NULL, 2, 1, NULL, NULL, 1, 1, 1),
(77, '2019-03-05 09:40:53', 1, '2019-03-05 09:40:56', 1, NULL, 3, 1, 1, NULL, 1, 1, 1),
(78, '2019-03-05 11:00:37', 1, '2019-03-05 11:00:54', 1, NULL, 0, 1, 0, NULL, 1, 1, 1),
(79, '2019-03-05 12:36:57', 1, '2019-03-05 12:37:02', 1, NULL, 1, 1, 0, NULL, 1, 1, 1),
(80, '2019-03-06 19:12:29', 1, '2019-03-06 19:12:34', 1, NULL, 3, 1, 1, NULL, 1, 1, 1),
(81, '2019-03-07 08:12:25', 1, '2019-03-07 08:12:33', 1, NULL, 2, 1, NULL, NULL, 1, 1, 1),
(82, '2019-03-07 08:50:33', 1, '2019-03-07 08:50:36', 1, NULL, 0, 1, 0, NULL, 1, 1, 1),
(83, '2019-03-07 09:20:57', 1, '2019-03-07 09:21:07', 1, NULL, 0, 1, 0, NULL, 1, 1, 1),
(84, '2019-03-10 20:49:35', NULL, '1999-12-31 22:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(85, '2019-03-10 20:58:26', NULL, '1999-12-31 22:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(86, '2019-03-10 21:04:12', NULL, '1999-12-31 22:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(87, '2019-03-10 21:11:48', 0, '2019-03-10 21:14:53', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(88, '2019-03-10 21:15:10', 1, '2019-03-10 21:15:13', 1, NULL, 0, 1, NULL, NULL, 1, 1, 1),
(89, '2019-03-11 10:38:54', 1, '2019-03-11 10:38:58', 1, NULL, 2, 1, NULL, NULL, 1, 1, 1),
(90, '2019-03-11 12:58:29', 1, '2019-03-11 12:58:40', 1, NULL, 4, 1, 1, NULL, 1, 1, 1),
(91, '2019-03-11 16:41:28', 1, '2019-03-11 16:42:25', 1, NULL, 4, 1, 1, NULL, 1, 1, 1),
(92, '2019-03-12 13:27:52', 1, '2019-03-12 13:27:56', 1, NULL, 0, 1, NULL, NULL, 1, 1, 1),
(93, '2019-03-12 13:45:07', 1, '2019-03-12 13:45:11', 0, NULL, 0, 1, NULL, NULL, 3, 2, 1),
(94, '2019-03-12 14:59:08', 1, '2019-03-12 14:59:11', 1, NULL, 0, 1, NULL, NULL, 1, 1, 1),
(95, '2019-03-15 12:28:50', 1, '2019-03-15 12:28:57', 0, NULL, 0, 1, NULL, NULL, 1, 2, 1),
(96, '2019-03-15 12:30:22', 1, '2019-03-15 12:30:26', 1, NULL, 0, 1, NULL, NULL, 1, 1, 1),
(97, '2019-03-15 12:56:14', 1, '2019-03-15 12:56:20', 1, NULL, 0, 1, 0, NULL, 1, 2, 1),
(98, '2019-03-18 13:28:07', 1, '2019-03-18 13:28:10', 1, NULL, 4, 1, 1, NULL, 1, 1, 1),
(99, '2019-03-21 10:03:56', 1, '2019-03-21 10:04:00', 1, NULL, 0, 1, NULL, NULL, 1, 1, 1),
(100, '2019-03-21 20:57:53', 1, '2019-03-21 20:58:15', 1, NULL, 0, 1, NULL, NULL, 1, 1, 1),
(101, '2019-03-22 06:53:26', NULL, '1999-12-31 23:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(102, '2019-03-22 07:08:41', NULL, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(103, '2019-03-23 11:26:29', 1, '2019-03-23 11:26:42', 1, NULL, 0, 1, 0, NULL, 1, 2, 1),
(104, '2019-03-23 11:43:34', 1, '2019-03-23 12:10:47', 1, NULL, 0, 1, 0, NULL, 1, 2, 1),
(105, '2019-03-23 12:10:38', 1, '2019-03-23 12:10:52', 1, NULL, 0, 1, NULL, NULL, 1, 2, 1),
(106, '2019-03-23 13:02:32', 1, '2019-03-23 13:02:38', 0, NULL, 0, 1, 1, NULL, 1, 2, 1),
(107, '2019-03-23 13:39:52', NULL, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(108, '2019-03-23 13:44:35', NULL, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(109, '2019-03-23 13:51:37', NULL, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 2),
(110, '2019-03-23 13:57:59', NULL, '1999-12-31 23:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(111, '2019-03-23 14:03:26', 1, '2019-03-23 14:08:28', 1, NULL, NULL, 1, NULL, NULL, 1, 2, 2),
(112, '2019-03-23 14:12:22', 0, '2019-03-23 14:13:04', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(113, '2019-03-23 14:14:50', 1, '2019-03-23 14:14:53', 1, NULL, NULL, 1, NULL, NULL, 1, 1, 1),
(114, '2019-03-23 14:15:01', 0, '2019-03-23 14:15:04', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(115, '2019-03-23 14:18:19', 0, '2019-03-23 14:18:22', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(116, '2019-03-23 14:25:55', NULL, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(117, '2019-03-23 14:26:12', NULL, '1999-12-31 23:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(118, '2019-03-23 14:33:00', 0, '2019-03-23 14:35:35', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(119, '2019-03-23 14:36:15', 0, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(120, '2019-03-23 14:38:23', 1, '2019-03-23 14:38:28', 1, NULL, NULL, 1, NULL, NULL, 1, 1, 1),
(121, '2019-03-23 14:38:34', 0, '2019-03-23 14:38:38', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(122, '2019-03-23 14:38:58', 0, '2019-03-23 14:39:02', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(123, '2019-03-23 14:39:09', 0, '2019-03-23 14:41:45', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(124, '2019-03-23 17:24:41', NULL, '1999-12-31 23:00:00', 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(125, '2019-03-23 18:16:51', 0, '2019-03-23 18:19:52', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(126, '2019-03-23 18:17:37', 0, '2019-03-23 18:19:54', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(127, '2019-03-23 18:17:44', 1, '2019-03-23 18:19:55', 0, NULL, 0, 1, NULL, NULL, 1, 2, 1),
(128, '2019-03-23 18:35:49', 1, '2019-03-23 18:35:53', 1, NULL, 0, 1, 1, NULL, 1, 2, 1),
(129, '2019-03-23 18:49:01', 1, '2019-03-23 18:49:07', 1, NULL, 1, 1, 0, NULL, 1, 1, 1),
(130, '2019-03-23 19:47:10', NULL, '1999-12-31 23:00:00', 1, NULL, NULL, NULL, NULL, NULL, 1, 2, 1),
(131, '2019-03-23 20:40:53', 1, '2019-03-23 20:41:03', 1, NULL, NULL, 1, NULL, NULL, 1, 2, 1),
(132, '2019-03-23 20:41:44', 1, '2019-03-23 20:41:51', 1, NULL, 0, 1, NULL, NULL, 1, 2, 1),
(133, '2019-03-23 20:45:24', 1, '2019-03-23 20:45:30', 0, NULL, 6, 1, NULL, NULL, 1, 2, 1),
(134, '2019-03-23 22:02:05', 1, '2019-03-23 22:02:58', 1, NULL, 7, 1, NULL, NULL, 1, 2, 1),
(135, '2019-03-23 22:07:38', 1, '2019-03-23 22:07:42', 0, NULL, 4, 1, 1, NULL, 1, 1, 1),
(136, '2019-03-23 22:09:28', 1, '2019-03-23 22:09:31', 0, NULL, 6, 1, NULL, NULL, 1, 2, 1),
(137, '2019-03-23 22:15:57', 1, '2019-03-23 22:16:02', 0, '2019-03-23 23:38:08', 4, 1, 0, 3, 1, 2, 1),
(138, '2019-03-23 23:38:45', 1, '2019-03-23 23:38:58', 1, '2019-03-23 23:39:07', 0, 1, 0, 5, 1, 2, 1),
(139, '2019-03-23 23:39:40', 1, '2019-03-23 23:39:44', 1, '2019-03-23 23:40:06', 0, 1, 0, 5, 1, 2, 1),
(140, '2019-03-23 23:42:14', 1, '2019-03-23 23:42:20', 1, '2019-03-23 23:45:59', 4, 1, 0, 5, 1, 2, 1),
(141, '2019-03-24 15:57:45', 1, '2019-03-24 15:57:50', 1, '2019-03-24 16:06:18', 4, 1, 0, 5, 1, 2, 1),
(142, '2019-03-24 16:08:21', 1, '2019-03-24 16:08:25', 0, '2019-03-24 16:09:42', 0, 1, 0, NULL, 1, 2, 1),
(143, '2019-03-24 16:12:10', 1, '2019-03-24 16:12:19', 1, '2019-03-24 15:22:09', 4, 1, 0, NULL, 1, 2, 1),
(144, '2019-03-24 16:36:27', 1, '2019-03-24 16:36:33', 1, '2019-03-24 15:39:33', 5, 1, 1, NULL, 1, 2, 1),
(145, '2019-03-24 16:39:55', 1, '2019-03-24 16:39:58', 1, '2019-03-24 15:40:36', 5, 1, 1, 1, 1, 2, 1),
(146, '2019-03-24 16:41:46', 1, '2019-03-24 16:41:50', 0, '2019-03-24 16:52:13', 4, 1, 0, NULL, 1, 2, 1),
(147, '2019-03-24 16:52:20', 1, '2019-03-24 16:52:22', 0, '2019-03-24 16:54:24', 5, 1, 0, NULL, 1, 2, 1),
(148, '2019-03-24 16:54:29', 1, '2019-03-24 16:54:32', 1, '2019-03-24 16:55:46', 5, 1, 0, NULL, 1, 2, 1),
(149, '2019-03-24 16:55:54', 1, '2019-03-24 16:55:57', 1, '2019-03-24 16:57:09', 5, 1, 0, NULL, 1, 2, 1),
(150, '2019-03-24 16:57:16', 1, '2019-03-24 16:57:19', 0, '2019-03-24 15:57:56', 4, 1, 1, 5, 1, 2, 1),
(151, '2019-03-24 16:58:12', 1, '2019-03-24 16:58:16', 1, '2019-03-24 15:59:01', 4, 1, 1, NULL, 1, 2, 1),
(152, '2019-03-24 17:02:51', 1, '2019-03-24 17:02:57', 1, '2019-03-24 16:05:49', 4, 1, 1, 5, 1, 2, 1),
(153, '2019-03-24 17:44:26', 1, '2019-03-24 17:44:49', 0, '2019-03-24 17:02:45', 4, 1, 1, 5, 1, 2, 1),
(154, '2019-03-25 11:35:48', 1, '2019-03-25 11:35:52', 0, '2019-03-25 10:44:13', 4, 1, 1, 5, 1, 2, 1),
(155, '2019-03-25 11:45:45', 1, '2019-03-25 11:46:12', 1, '2019-03-25 10:52:29', 4, 1, 1, 4, 1, 2, 1),
(156, '2019-03-26 13:03:16', 1, '2019-03-25 11:53:19', 1, '2019-03-26 13:03:16', 0, 1, 0, 1, 1, 2, 1),
(157, '2019-03-25 17:56:11', 1, '2019-03-25 17:56:16', 1, '2019-03-25 16:57:48', 4, 1, 1, 4, 1, 2, 1),
(158, '2019-03-25 18:21:49', 1, '2019-03-25 18:18:06', 0, '2019-03-25 18:21:11', 4, 1, 1, 4, 1, 1, 1),
(159, '2019-03-25 19:03:01', 1, '2019-03-25 19:00:33', 1, '2019-03-25 19:02:50', 4, 1, 1, 5, 1, 2, 1),
(160, '2019-03-25 20:00:57', 1, '2019-03-25 19:11:07', 0, '2019-03-25 20:00:57', 4, 1, 1, NULL, 1, 2, 1),
(161, '2019-03-25 20:02:08', 1, '2019-03-25 20:01:29', 1, '2019-03-25 20:02:01', 4, 1, 1, 5, 1, 2, 1),
(162, '2019-03-25 20:11:12', 1, '2019-03-25 20:02:21', 1, '2019-03-25 20:11:12', 4, 1, 1, NULL, 1, 2, 1),
(163, '2019-03-25 20:26:29', 1, '2019-03-25 20:11:29', 1, NULL, 0, 1, 0, NULL, 1, 2, 1),
(164, '2019-03-26 13:01:35', 1, '2019-03-25 20:28:33', 0, '2019-03-25 20:46:36', 4, 1, 0, 1, 1, 2, 1),
(165, '2019-03-26 13:01:35', 1, '2019-03-25 20:46:50', 1, NULL, 3, 1, NULL, NULL, 1, 1, 1),
(166, '2019-03-26 13:01:35', 1, '2019-03-25 20:50:41', 0, '2019-03-25 20:51:55', 2, 1, 0, NULL, 1, 2, 1),
(167, '2019-03-26 13:01:35', 1, '2019-03-25 20:52:05', 1, '2019-03-25 20:55:37', 0, 1, 0, NULL, 1, 2, 1),
(168, '2019-03-26 13:01:35', 1, '2019-03-25 20:55:48', 0, '2019-03-25 21:11:49', 0, 1, 0, NULL, 1, 2, 1),
(169, '2019-03-26 13:01:35', 1, '2019-03-25 21:18:38', 1, NULL, 0, 1, NULL, NULL, 1, 2, 1),
(170, '2019-03-26 13:01:35', 1, '2019-03-25 21:22:34', 0, NULL, 0, 1, NULL, NULL, 1, 2, 1),
(171, '2019-03-26 13:00:38', 1, '2019-03-25 21:48:15', 1, '2019-03-26 13:00:38', 4, 1, 0, NULL, 1, 2, 1),
(173, '2019-03-26 13:19:29', 1, '2019-03-26 13:03:44', 1, '2019-03-26 13:19:17', 4, 1, 0, 5, 1, 2, 1),
(174, '2019-03-26 13:24:23', 1, '2019-03-26 13:19:40', 0, '2019-03-26 13:24:14', 0, 0, 0, 5, 1, 2, 1),
(175, '2019-03-26 13:47:18', 1, '2019-03-26 13:28:29', 1, '2019-03-26 12:47:16', 2, 1, 1, 5, 1, 1, 1),
(176, '2019-03-26 14:17:46', 1, '2019-03-26 14:02:01', 0, '2019-03-26 14:17:39', 2, 0, 0, 5, 1, 2, 1),
(177, '2019-03-26 14:44:11', 1, '2019-03-26 14:18:02', 0, '2019-03-26 14:44:11', 1, 0, 0, NULL, 1, 2, 1),
(178, '2019-03-26 14:49:55', 1, '2019-03-26 14:48:59', 0, '2019-03-26 13:49:51', 4, 1, 1, 5, 1, 2, 1),
(179, '2019-03-26 15:05:06', 1, '2019-03-26 15:03:32', 1, NULL, 1, 0, NULL, NULL, 4, 2, 1),
(180, '2019-03-26 15:11:47', 1, '2019-03-26 15:11:23', 0, '2019-03-26 15:11:45', 0, 0, 0, 5, 4, 1, 1),
(181, '2019-03-26 15:17:19', 1, '2019-03-26 15:15:15', 1, '2019-03-26 14:17:14', 4, 1, 1, 3, 4, 2, 1),
(182, '2019-03-26 21:33:41', 1, '2019-03-26 21:31:38', 1, '2019-03-26 20:33:38', 2, 1, 1, 5, 1, 1, 1),
(183, '2019-03-26 21:35:49', 1, '2019-03-26 21:34:59', 0, '2019-03-26 20:35:47', 5, 1, 1, 5, 1, 2, 1),
(184, '2019-03-26 21:58:54', 1, '2019-03-26 21:49:49', 1, '2019-03-26 20:52:07', 5, 1, 1, 5, 1, 2, 1),
(185, '2019-03-26 21:59:07', 0, '2019-03-26 21:59:07', 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 1),
(186, '2019-03-26 22:10:17', 1, '2019-03-26 21:59:18', 0, '2019-03-26 21:10:17', 3, 1, 1, NULL, 1, 1, 1),
(187, '2019-03-26 22:16:18', 1, '2019-03-26 22:10:30', 1, '2019-03-26 22:16:17', 2, 0, 0, 5, 1, 2, 1),
(188, '2019-03-26 22:32:22', 1, '2019-03-26 22:16:27', 0, '2019-03-26 22:32:20', 4, 0, 0, 5, 1, 2, 1),
(189, '2019-03-26 22:33:42', 1, '2019-03-26 22:32:30', 1, '2019-03-26 21:33:35', 5, 1, 1, 5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `help`
--

DROP TABLE IF EXISTS `help`;
CREATE TABLE IF NOT EXISTS `help` (
  `idHelp` int(11) NOT NULL AUTO_INCREMENT,
  `questionHelp` text,
  `helpDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answerHelp` text,
  `idGamestate` int(11) NOT NULL,
  PRIMARY KEY (`idHelp`),
  KEY `FKidGamestate_help` (`idGamestate`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `help`
--

INSERT INTO `help` (`idHelp`, `questionHelp`, `helpDate`, `answerHelp`, `idGamestate`) VALUES
(1, 'A l&#039;aide svp !!', '2019-03-23 12:11:48', NULL, 105),
(2, NULL, '2019-03-23 12:12:09', 'Je suis la haa', 105),
(3, 'osdfusdkjfnksdf', '2019-03-23 12:12:22', NULL, 105),
(4, 'fg', '2019-03-23 12:12:36', NULL, 105),
(5, 'Demandez de l&#039;aide !', '2019-03-23 18:50:26', NULL, 129),
(6, 'Hello', '2019-03-23 18:50:32', NULL, 129),
(7, 'Demandez de l&#039;aide !', '2019-03-24 17:44:58', NULL, 153),
(8, NULL, '2019-03-25 11:55:10', 'kuy', 156),
(9, 'Demandez de l&#039;aide !', '2019-03-25 11:55:18', NULL, 156),
(10, 'kjhkj', '2019-03-25 11:55:26', NULL, 156),
(11, NULL, '2019-03-25 11:55:29', '', 156),
(12, 'Demandez de l&#039;aide !', '2019-03-25 17:56:47', NULL, 157),
(13, 'HO HO HO', '2019-03-26 15:05:24', NULL, 179);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `idPlayer` int(11) NOT NULL AUTO_INCREMENT,
  `namePlayer` varchar(25) NOT NULL,
  `idTeam` int(11) NOT NULL,
  PRIMARY KEY (`idPlayer`),
  KEY `FKidTeam_players` (`idTeam`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `players`
--

INSERT INTO `players` (`idPlayer`, `namePlayer`, `idTeam`) VALUES
(1, 'testJoueur1', 1),
(2, 'testJoueur2', 1),
(3, '', 1),
(4, 'Joueur1', 2),
(5, 'dfgdfg', 2),
(6, 'dfgfdgdfg', 2),
(7, 'bl', 3),
(8, 'dsfdsfsdf', 4),
(9, 'dsf', 4),
(10, 'sdf', 4),
(11, 'dsfsdfsdf', 4);

-- --------------------------------------------------------

--
-- Structure de la table `resolutions`
--

DROP TABLE IF EXISTS `resolutions`;
CREATE TABLE IF NOT EXISTS `resolutions` (
  `idResolution` int(11) NOT NULL AUTO_INCREMENT,
  `startDateResolution` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idGamestate` int(11) NOT NULL,
  `idRiddle` int(11) NOT NULL,
  PRIMARY KEY (`idResolution`),
  KEY `FKidGamestate_resolution` (`idGamestate`),
  KEY `FKidRiddle_resolution` (`idRiddle`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `resolutions`
--

INSERT INTO `resolutions` (`idResolution`, `startDateResolution`, `idGamestate`, `idRiddle`) VALUES
(1, '2019-03-26 21:49:51', 184, 6),
(2, '2019-03-26 21:49:53', 184, 6),
(3, '2019-03-26 21:50:11', 184, 6),
(4, '2019-03-26 21:50:12', 184, 6),
(5, '2019-03-26 21:50:29', 184, 7),
(6, '2019-03-26 21:50:57', 184, 8),
(7, '2019-03-26 21:51:22', 184, 9),
(8, '2019-03-26 21:51:29', 184, 10),
(9, '2019-03-26 21:59:21', 186, 1),
(10, '2019-03-26 21:59:22', 186, 1),
(11, '2019-03-26 22:00:11', 186, 2),
(12, '2019-03-26 22:01:03', 186, 3),
(13, '2019-03-26 22:01:13', 186, 3),
(14, '2019-03-26 22:01:23', 186, 3),
(15, '2019-03-26 22:10:33', 187, 6),
(16, '2019-03-26 22:10:34', 187, 6),
(17, '2019-03-26 22:10:43', 187, 7),
(18, '2019-03-26 22:11:10', 187, 7),
(19, '2019-03-26 22:11:20', 187, 7),
(20, '2019-03-26 22:11:50', 187, 7),
(21, '2019-03-26 22:12:14', 187, 8),
(22, '2019-03-26 22:13:01', 187, 8),
(23, '2019-03-26 22:31:04', 188, 10),
(24, '2019-03-26 22:31:15', 188, 10),
(25, '2019-03-26 22:31:30', 188, 10),
(26, '2019-03-26 22:32:32', 189, 6),
(27, '2019-03-26 22:32:48', 189, 7),
(28, '2019-03-26 22:33:08', 189, 8),
(29, '2019-03-26 22:33:17', 189, 9),
(30, '2019-03-26 22:33:28', 189, 10);

-- --------------------------------------------------------

--
-- Structure de la table `riddles`
--

DROP TABLE IF EXISTS `riddles`;
CREATE TABLE IF NOT EXISTS `riddles` (
  `idRiddle` int(11) NOT NULL AUTO_INCREMENT,
  `titleRiddle` varchar(255) NOT NULL,
  `descriptionRiddle` text NOT NULL,
  `answerRiddle` varchar(255) NOT NULL,
  `step` int(11) NOT NULL,
  `tip` text,
  `idGame` int(11) NOT NULL,
  PRIMARY KEY (`idRiddle`),
  KEY `FKidGame_riddles` (`idGame`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `riddles`
--

INSERT INTO `riddles` (`idRiddle`, `titleRiddle`, `descriptionRiddle`, `answerRiddle`, `step`, `tip`, `idGame`) VALUES
(1, 'Porte Une', '<em>Le Troisième fut un jour le Premier,\r\n<br/>\r\nEn comprenant le Premier je comprendrai le Troisième.</em>\r\n\r\n<br /><br />\r\nOh pdlwuh gh 25 vrogdwv\r\n\r\n<br /><br/>\r\nQu\'est-il écrit ?', 'Le maître de 25 soldats', 1, 'Une histoire de décalage...', 1),
(2, 'Porte Deux', '<em>*La communication semble... couper...*</em>\r\n<br/><br/>\r\n... .- -. ... <br/> .-.. ..- .. <br/> .--. .- .-. .. ... <br/> ... . .-. .- <br/> .--. .-. .. ...\r\n<br /><br/>\r\nQuel est le message écrit ?', 'Sans lui Paris sera pris', 2, 'Bip bip biiiiip', 1),
(3, 'Porte Trois', '<br /><em>Pour débloquer la Troisième Porte,\r\n<br/>\r\nLe retour dans le Temps est nécessaire,\r\n<br /><br />\r\nCependant,\r\n<br />\r\nCelui-ci n\'est pas patient.\r\n</em>', 'A', 3, 'L\'Amour avec un grand A', 1),
(6, 'L\'enfant et la fourmi', 'L\'enfant décide de jouer avec les feuilles, <br />L\'enfant décide de jouer avec les mots.\r\n<br />L\'enfant capture la fleur,\r\n<br />La fourmi s\'enfuit de sitôt.\r\n<br /><br />\r\nJ\'ai des feuilles, dit l\'enfant,\r\n<br />Mais je ne suis pas un arbre.\r\n<br />J\'ai une couverture, \r\n<br />Mais je ne suis pas un lit.\r\n<br /><br />\r\nQui suis-je ? Demande l\'enfant à la fourmi.', 'livre', 1, 'Je ne m\'ouvre qu\'avec les doigts, et ne dévoile mes secrets qu\'aux plus audacieux. Je suis né dans une imprimerie.', 2),
(7, 'L\'ami perdu', 'La fourmi a le mot juste,\r\n<br />La fourmi est robuste.\r\n<br /><br />Puis-je partir ? Quémande-t-elle.\r\n<br />Je ne veux pas te laisser t\'enfuir, pleure l\'enfant,\r\n<br />Tu vas faire comme mon précédent ami,\r\n<br />Je ne sais où il est passé...\r\n<br />Malgré qu\'il soit parti,\r\n<br />Je veux le regagner !\r\n<br /><br />\r\nAvec les lettres de son nom je peux écrire celui de sa maison. \r\n<br /><br />Peux-tu retrouver mon ami ?', 'chien', 2, 'Fidèle aux humains mais surtout à la famille, il se réchauffe dans sa niche quand la maisonnée s\'éteint.', 2),
(8, 'Souvenirs', 'Mon chien reviendra bientôt ! se promet l\'enfant.\r\n<br /><br />\r\nLa fourmi s\'agite,\r\n<br />Ses parents l\'attendent.\r\n<br />Entre les doigts elle se faufile,\r\n<br />Mais l\'enfant n\'est pas tendre.\r\n<br /><br />\r\nNon, reste ! S\'énerve-t-il.\r\n<br />Fais la discution avec moi.\r\n<br />En attendant mon ami le chien,\r\n<br />Sous cet arbre, sous son ombre on se placera,\r\n<br />Je te partagereai mes souvenirs.\r\n<br />Ainsi me comptait mamie :\r\n<br /><br />\r\nMon premier est de la même couleur,\r\n<br /> \r\nMon second n\'est pas faible, \r\n<br />\r\nMon troisième est un meuglement,\r\n<br />\r\nMon tout est un vêtement. Papi l\'a toujours eu.\r\n<br /><br />Devineras-tu ?', 'uniforme', 3, 'Papi intégra l\'armée, il devint vétéran. Ses souvenirs ornent toujours la maison, mais aussi ce qu\'il portait au quotidien.', 2),
(9, 'La nuit est claire', 'La fourmi se rassure,\r\n<br />\r\nL\'étang parait plus clair, la lune est montante.\r\n<br />\r\nL\'enfant lui murmure :\r\n<br />\r\nOh fourmi, si on s\'éclaire, seras-tu contente ?\r\n\r\n<br /><br />La fourmi lève ses pattes,\r\n<br />Elle frétille en approbation.\r\n<br />Souriant, l\'enfant emmène sa nouvelle amie,\r\n<br />L\'emmène à sa maison.\r\n<br /><br />\r\nMamie me disait toujours de ne pas trop parler,\r\n<br />Papi pensait que j\'étais un allié,\r\n<br />Ils ont fait ce que je suis,\r\n<br />Mais si on te dit ce que je suis,\r\n<br />Je ne serai plus ce que j\'étais.\r\n\r\n<br /><br />Devine ce que je suis, sourit l\'enfant.', 'secret', 4, 'On le trouve dans des livres, dans des boîtes, dans des lieux insolites; on le veut mais une fois entendu il n\'existe plus.', 2),
(10, 'Les retrouvailles d\'un matin', 'Toute la nuit durant,\r\n<br />\r\nLes nouveaux compagnons s\'émerveillent.\r\n<br />Ils ne sentent pas leurs paupières tomber,\r\n<br />A travers les mots ils sentent qu\'ils sont pareils.\r\n\r\n<br /><br />\r\nLa lune descend,\r\n<br />La rosée se ressent,\r\n<br />Un aboiement s\'entend,\r\n<br />Tandis que l\'ami perdu se rend.\r\n\r\n<br /><br />\r\nTe revoilà ! S\'exclame l\'enfant.\r\n<br />Mon chien, viens jouer avec moi !\r\n<br /><br />\r\nL\'enfant tend les bras vers son ami,\r\n<br />\r\nLa fourmi tombe, se blesse mais sourit.\r\n<br />La fourmi est libre,\r\n<br />Mais se demande si elle était vraiment prisonière.\r\n<br />La fourmi voudrait se reposer sur les doigts de l\'enfant,\r\n<br />Mais sa famille l\'attend.\r\n<br /><br />L\'enfant ne voit plus la fourmi,\r\n<br />Où es-tu ? Pleure-t-il.\r\n<br />Pourquoi ne restes-tu pas ?\r\n<br />Mon chien t\'appréciera et Mamie t\'aimera !\r\n<br /><br />\r\nL\'enfant comprend,\r\n<br />Un seul mot peut briser ce qu\'il entend.', 'silence', 5, 'En étant prononcé, la notion de ce mot disparait. Pourtant, même en le brisant, il revient un jour ou l\'autre.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `idTeam` int(11) NOT NULL AUTO_INCREMENT,
  `nameTeam` varchar(25) NOT NULL,
  `passwordTeam` varchar(255) NOT NULL,
  PRIMARY KEY (`idTeam`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `teams`
--

INSERT INTO `teams` (`idTeam`, `nameTeam`, `passwordTeam`) VALUES
(1, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3'),
(2, 'Les Nouveaux', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99'),
(3, 'Bl', 'f55fb78160b93a5368e129ce16f85548eb77df5f'),
(4, 'sdf', '9a6747fc6259aa374ab4e1bb03074b6ec672cf99');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
