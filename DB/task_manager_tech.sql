-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 26, 2022 at 01:46 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager_tech`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_contact`
--

DROP TABLE IF EXISTS `chat_contact`;
CREATE TABLE IF NOT EXISTS `chat_contact` (
  `Id_chat` int NOT NULL AUTO_INCREMENT,
  `Sender_email` varchar(100) NOT NULL,
  `Destination_email` varchar(100) NOT NULL,
  `Message` varchar(500) NOT NULL,
  `send_date` varchar(20) NOT NULL,
  `is_deleted` int NOT NULL,
  `delete_date` datetime NOT NULL,
  `last_msg` varchar(500) DEFAULT NULL,
  `status_msg` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`Id_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_contact`
--

INSERT INTO `chat_contact` (`Id_chat`, `Sender_email`, `Destination_email`, `Message`, `send_date`, `is_deleted`, `delete_date`, `last_msg`, `status_msg`) VALUES
(305, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'spEw/NTV', '2022-08-22 13:09:41', 0, '0000-00-00 00:00:00', '', 'vu'),
(306, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', 'spEw/MY=', '2022-08-22 13:09:49', 0, '0000-00-00 00:00:00', '', 'vu'),
(307, 'salma.haie@gmail.com', 'mehdibenhmidi15@gmail.com', 'tp8=', '2022-08-22 13:09:59', 0, '0000-00-00 00:00:00', '', 'vu'),
(308, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'qZ9j5puT', '2022-08-22 14:26:55', 0, '0000-00-00 00:00:00', '', 'vu'),
(309, 'salma.haie@gmail.com', 'mehdibenhmidi15@gmail.com', 'pJ0m5g==', '2022-08-22 14:27:03', 0, '0000-00-00 00:00:00', '', 'vu'),
(310, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', '9Mc=', '2022-08-22 14:33:39', 0, '0000-00-00 00:00:00', '', 'vu'),
(311, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', '9Mc=', '2022-08-22 14:34:03', 0, '0000-00-00 00:00:00', '', 'vu'),
(312, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', '9Mc=', '2022-08-22 14:34:33', 0, '2022-08-22 17:35:29', '', 'vu'),
(313, 'salma.haie@gmail.com', 'azeddine.ha15@gmail.com', 'pdQh4ZGK', '2022-08-22 14:35:11', 0, '0000-00-00 00:00:00', '', NULL),
(314, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'rp0=', '2022-08-22 14:44:10', 1, '2022-08-22 17:28:15', '', 'vu'),
(315, 'salma.haie@gmail.com', 'azeddine.ha15@gmail.com', 'qZ9j5Y6K', '2022-08-22 17:32:42', 0, '0000-00-00 00:00:00', '', 'vu'),
(316, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'qJ4=', '2022-08-22 17:38:59', 0, '2022-08-22 17:40:24', '', 'vu'),
(317, 'salma.haie@gmail.com', 'mehdibenhmidi15@gmail.com', '88E=', '2022-08-22 17:39:54', 0, '0000-00-00 00:00:00', '', 'vu'),
(318, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'qZ9j7JY=', '2022-08-23 09:38:10', 0, '0000-00-00 00:00:00', '', NULL),
(319, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', '9sY=', '2022-08-23 09:48:40', 0, '0000-00-00 00:00:00', '', 'vu'),
(320, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', '/8x6sA==', '2022-08-23 09:49:14', 0, '0000-00-00 00:00:00', '', NULL),
(321, 'azeddine.ha15@gmail.com', 'mehdibenhmidi15@gmail.com', 'qZ9j7pGK', '2022-08-23 09:49:41', 0, '0000-00-00 00:00:00', 'qZ9j7pGK', 'vu'),
(322, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'rpUt6dSQUvV6', '2022-08-23 10:49:42', 0, '0000-00-00 00:00:00', '', 'vu'),
(323, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', 'rpUn6dSOV/J3', '2022-08-23 11:46:09', 0, '0000-00-00 00:00:00', '', NULL),
(324, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', '9sY=', '2022-08-23 13:12:30', 0, '0000-00-00 00:00:00', '', NULL),
(325, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', 'pZc=', '2022-08-23 14:40:05', 0, '0000-00-00 00:00:00', '', 'vu'),
(326, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'opst7dSJUuJxiA==', '2022-08-23 14:47:23', 0, '0000-00-00 00:00:00', '', NULL),
(327, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'soc3', '2022-08-23 15:14:09', 0, '0000-00-00 00:00:00', '', 'vu'),
(328, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', 'soci/4bEAPd4', '2022-08-23 15:54:57', 0, '0000-00-00 00:00:00', '', NULL),
(329, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', 'pZdj64I=', '2022-08-23 16:02:56', 0, '0000-00-00 00:00:00', '', 'vu'),
(330, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', '/sM=', '2022-08-23 17:03:00', 0, '0000-00-00 00:00:00', '', 'vu'),
(331, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', '88I=', '2022-08-23 17:12:01', 0, '0000-00-00 00:00:00', '', 'vu'),
(332, 'azeddine.ha15@gmail.com', 'salma.haie@gmail.com', 'spEw/NTRBg==', '2022-08-23 17:12:54', 0, '0000-00-00 00:00:00', 'spEw/NTRBg==', 'vu'),
(333, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'oZw=', '2022-08-23 17:19:22', 0, '0000-00-00 00:00:00', '', 'vu'),
(334, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'qJUn7J3EW/o=', '2022-08-23 17:19:47', 0, '0000-00-00 00:00:00', '', 'vu'),
(335, 'salma.haie@gmail.com', '', '9g==', '2022-08-24 10:32:13', 0, '0000-00-00 00:00:00', '9g==', NULL),
(336, 'mehdibenhmidi15@gmail.com', 'salma.haie@gmail.com', 'pZc=', '2022-08-25 11:01:29', 0, '0000-00-00 00:00:00', '', 'vu'),
(337, 'salma.haie@gmail.com', 'mehdibenhmidi15@gmail.com', 'qYEqqMs=', '2022-08-25 11:01:51', 0, '0000-00-00 00:00:00', 'qYEqqMs=', 'vu');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT 'false',
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID`, `Nom`, `company`, `email`, `active`, `phone`) VALUES
(1, 'Ayoub Houmaid', 'Mawarid Bureau', 'ayoub.mawrid@gmail.com', 'True', ''),
(2, 'Ahmed', 'Lawd Service', 'email@gmail.com', 'True', '0565645343'),
(3, 'Said', 'Renimi Car', 'email@gmail.com', 'false', ''),
(4, 'houssam ', 'lavoi cars', 'lavoi@car.ma', 'True', '056256232'),
(5, 'khalil', 'masterly clean', 'masterly@clean.ma', 'True', '056536536'),
(6, '', '', '', '', ''),
(7, 'kawtar', 'maroc inter survellance', 'contact@maroc-intersurvillience.ma', 'True', '0694293076');

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(120) NOT NULL,
  `Prenom` varchar(120) NOT NULL,
  `jobe` varchar(130) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_delete` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipe`
--

INSERT INTO `equipe` (`ID`, `Nom`, `Prenom`, `jobe`, `photo`, `Mobile`, `Email`, `password`, `is_delete`) VALUES
(1, 'Hissouf', 'Azeddine', 'Full Stack Developper', './assets/images/users/azeddine.png', '+212 638-799913', 'azeddine.ha15@gmail.com', 'az123tech', '0'),
(2, 'Benhmidi', 'El Mehdi', 'Full Stack Developper', './assets/images/users/elmehdi.png', '+212 603-668043', 'mehdibenhmidi15@gmail.com', 'bn123tech', '0'),
(3, 'Hajar', 'Adibia', 'LA RESPONSABLE ADMINISTRATIVE', './assets/images/users/hajar1.png', '+212 626-964732', 'hajarabidia@gmail.com', 'hj123tech', '0'),
(15, 'El Felta ', 'Hassan', 'Graphic Designer', './assets/images/users/62bb08ea348871.59929665.png', '+212 627-460839', 'elfelta99@gmail.com', 'hs12345tech', '0'),
(17, 'Elkalakhi', 'El Mehdi', 'Developper Full Stack', './assets/images/users/62bc5509108ce9.38513885.png', '+212 621-563998', 'elmehdi.elkalakhi@gmail.com', 'kl12345tech', '0'),
(18, 'Haie', 'Salma', 'Responsable Stratégie', './assets/images/users/62bc58ec9feb06.82852959.png', '212650183586', 'salma.haie@gmail.com', 'sl12345tech', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fact_order`
--

DROP TABLE IF EXISTS `fact_order`;
CREATE TABLE IF NOT EXISTS `fact_order` (
  `id_fact` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `adress_client` varchar(1000) NOT NULL,
  `date_fact` datetime NOT NULL,
  `is_deleted` int NOT NULL,
  `date_deleted` datetime NOT NULL,
  `deleted_factby` varchar(100) NOT NULL,
  `created_factby` varchar(100) NOT NULL,
  `updated_factby` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fact_order_detail`
--

DROP TABLE IF EXISTS `fact_order_detail`;
CREATE TABLE IF NOT EXISTS `fact_order_detail` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `id_facture` int NOT NULL,
  `order_id` int NOT NULL,
  `qte` int NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(120) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `last_seen` datetime NOT NULL,
  `active` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `full_name`, `email`, `password`, `type`, `last_seen`, `active`) VALUES
(1, 'azeddine hissouf', 'azeddine.ha15@gmail.com', 'azerty12345', 'admin', '2022-08-24 10:23:30', 'offline'),
(2, 'Elkalakhi El Mehdi', 'elmehdi.elkalakhi@gmail.com', 'kl12345tech', 'user', '2022-08-19 17:24:47', 'offline'),
(3, 'Haie Salma', 'salma.haie@gmail.com', 'sl12345tech', 'admin', '2022-08-24 10:25:12', 'online'),
(4, 'benhmidi el mehdi', 'mehdibenhmidi15@gmail.com', 'bn123tech', 'user', '2022-08-24 14:43:53', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `Id_order` int NOT NULL AUTO_INCREMENT,
  `title_order` varchar(200) NOT NULL,
  `desc_order` varchar(500) DEFAULT NULL,
  `price_order` varchar(40) NOT NULL,
  `date_add` datetime NOT NULL,
  `is_deleted` int NOT NULL,
  `deleted_by` varchar(100) NOT NULL,
  `date_deleted` datetime NOT NULL,
  PRIMARY KEY (`Id_order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `members` varchar(255) NOT NULL,
  `title_projet` varchar(255) NOT NULL,
  `date_debut` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL,
  `id_client` int NOT NULL,
  `is_delete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`),
  KEY `id_client` (`id_client`),
  KEY `id_client_2` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`Id`, `members`, `title_projet`, `date_debut`, `statut`, `deadline`, `id_client`, `is_delete`) VALUES
(1, 'HISSOUF,', 'Mawarid Bureau Digitalisation', '15-04-2022', 'Annulé', '22-09-2022', 1, 0),
(2, 'HISSOUF,BENHMIDI,ABIDIA,EL FELTA,', 'Tech Digital Digitalisation', '01-04-2022', 'en cours', '30-07-2022', 2, 0),
(3, 'HISSOUF,BENHMIDI,EL KALAKHI,ABIDIA,', 'Rhenimi car', '15-04-2022', 'Pas commencé', '22-06-2022', 3, 0),
(6, 'HISSOUF,BENHMIDI,EL KALAKHI,', 'Dar El Kitab', '15-04-2022', 'Annulé', '15-05-2022', 2, 0),
(7, 'NULL', 'Pas important', 'NULL', 'NULL', 'NULL', 6, 0),
(8, 'HISSOUF,BENHMIDI,', 'test', '20-07-2022', 'Annulé', '28-07-2022', 2, 0),
(9, 'EL KALAKHI,ABIDIA,', 'hello', '20-07-2022', 'Pas commencé', '28-07-2022', 1, 0),
(10, 'ABIDIA,', 'q', '20-07-2022', 'en cours', '20-07-2022', 3, 0),
(11, 'BENHMIDI,EL KALAKHI,', 'b', '20-07-2022', 'en cours', '28-07-2022', 2, 0),
(12, 'HISSOUF,BENHMIDI,', 'maroc inter surveillence', '20-07-2022', 'en cours', '31-07-2022', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `ID_task` int NOT NULL AUTO_INCREMENT,
  `desc_task` varchar(255) NOT NULL,
  `status` varchar(155) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `property` varchar(155) NOT NULL,
  `ID_equipe` int NOT NULL,
  `ID_projet` varchar(20) DEFAULT 'Pas De Projet',
  `is_delete` int DEFAULT '0',
  PRIMARY KEY (`ID_task`),
  KEY `ID_equipe` (`ID_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`ID_task`, `desc_task`, `status`, `date_start`, `date_end`, `property`, `ID_equipe`, `ID_projet`, `is_delete`) VALUES
(2, 'projet', 'Annulé', '13-07-2022', '19-07-2022', 'important', 1, '3', 0),
(3, 'papie en tete et logo', 'Pas commencé', '03-06-2022', '20-06-2022', 'urgent', 1, '4', 0),
(4, 'papier en tete', 'en cours', '12-06-2022', '23-06-2022', 'faible', 15, '1', 0),
(5, 'test', 'Pas commencé', '02-06-2022', '11-06-2022', 'important', 1, '4', 0),
(6, 'jadid2', 'en cours', '10-06-2022', '17-06-2022', 'urgent', 3, '6', 0),
(7, 'mehdiii', 'terminé', '01-06-2022', '01-06-2022', 'urgent', 1, '1', 0),
(8, 'mehdiii', 'Annulé', '01-06-2022', '01-06-2022', 'moyen', 1, '6', 0),
(9, 'mehdiii', 'Pas commencé', '01-06-2022', '01-06-2022', 'moyen', 1, '7', 0),
(10, 'domain purchase', 'terminé', '05-07-2022', '07-07-2022', 'moyen', 17, '6', 0),
(11, 'stratégie nouveau projet', 'terminé', '05-07-2022', '06-07-2022', 'moyen', 18, '3', 0),
(12, 'new projet', 'Pas commencé', '11-06-2022', '11-06-2022', 'urgent', 2, '2', 0),
(13, 'site web ', 'Pas commencé', '11-07-2022', '31-07-2022', 'urgent', 1, '7', 0),
(14, 'instagram', 'en cours', '06-07-2022', '26-07-2022', 'important', 3, '3', 0),
(15, 'site securite', 'terminé', '20-07-2022', '21-07-2022', 'important', 2, '7', 0),
(16, 'test', 'Pas commencé', '27-07-2022', '28-07-2022', 'moyen', 1, '1', 0),
(17, '1', 'Pas commencé', '27-07-2022', '28-07-2022', 'urgent', 2, '2', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`ID`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`ID_equipe`) REFERENCES `equipe` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
