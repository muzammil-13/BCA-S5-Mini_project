-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2023 at 03:16 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_games`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`email`, `pass`) VALUES
('admin@mail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filename`) VALUES
(1, 'Valorant Screenshot 2022.11.27 - 17.10.34.33.png'),
(2, 'Valorant Screenshot 2022.12.13 - 20.13.28.63.png'),
(3, 'Valorant Screenshot 2022.12.02 - 15.32.04.57.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

DROP TABLE IF EXISTS `tbproduct`;
CREATE TABLE IF NOT EXISTS `tbproduct` (
  `idproduct` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(70) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `genre` varchar(30) NOT NULL,
  `console` varchar(30) DEFAULT NULL,
  `descp` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`idproduct`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`idproduct`, `pname`, `price`, `photo`, `genre`, `console`, `descp`) VALUES
(2, 'Death Stranding', 4499, 'img/product/2.jpg', 'Ação', 'Playstation', 'From legendary game creator Hideo Kojima comes an all-new, genre-defying open world action adventure, starring Norman Reedus, Mads Mikkelsen, Léa Seydoux and Lindsay Wagner.'),
(3, 'God of War', 2999, 'img/product/3.jpg', 'Aventura', 'Playstation', 'Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply pers'),
(4, 'Skyrim', 599, 'img/product/4.jpg', 'RPG', 'Pc Gamer', 'Winner of more than 200 Game of the Year Awards, Skyrim Special Edition brings the epic fantasy to life in stunning detail.'),
(5, 'Fortnite', 149, 'img/product/5.jpg', 'Multiplayer', 'Pc Gamer', 'needs to be updated'),
(6, 'Minecraft', 5499, 'img/product/6.jpg', 'Multiplayer', 'Pc Gamer', 'needs to be updated'),
(7, ' Dota 2', 1199, 'img/product/7.jpg', 'Multiplayer', 'Pc Gamer', 'needs to be updated'),
(8, 'Diablo III', 2499, 'img/product/8.jpg', 'Multiplayer', 'Pc Gamer', 'needs to be updated'),
(9, 'Toram online', 759, 'img/product/9.jpg', 'RPG', 'Mobile', 'needs to be updated'),
(10, 'Free Fire', 489, 'img/product/10.jpg', 'Multiplayer', 'Mobile', 'needs to be updated'),
(11, 'Fifa 2019', 5599, 'img/product/11.jpg', 'Esportes', 'Xbox', 'needs to be updated'),
(12, 'A Way Out', 579, 'img/product/12.jpg', 'Aventura', 'Pc Gamer', 'A Way Out is an exclusively co-op adventure where you play the role of one of two prisoners making their daring escape from prison'),
(13, 'Hollow Knight', 1479, 'img/product/13.jpg', 'Aventura', 'Nintendo', 'needs to be updated'),
(18, 'knf;lk', 251, '', 'trail', 'trail', 'trail'),
(19, 'trual', 52, '', 'dfdsf', 'dsfZS', 'dsgdgdsfg'),
(20, 'dgdfg', 53, 'Valorant Screenshot 2022.11.27 - 17.10.34.33.png', 'fghdf', 'ghdfghd', 'hfhdh'),
(21, 'fhdf', 645, '', 'fhdh', 'fdhdfh', 'fhdzfhdfhdfh');

-- --------------------------------------------------------

--
-- Table structure for table `tbsale`
--

DROP TABLE IF EXISTS `tbsale`;
CREATE TABLE IF NOT EXISTS `tbsale` (
  `idsale` int(11) NOT NULL AUTO_INCREMENT,
  `datesale` date NOT NULL,
  `price` double NOT NULL,
  `idclient` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  PRIMARY KEY (`idsale`),
  KEY `idproduct` (`idproduct`),
  KEY `idclient` (`idclient`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsale`
--

INSERT INTO `tbsale` (`idsale`, `datesale`, `price`, `idclient`, `idproduct`) VALUES
(1, '2023-01-18', 4565, 2, 2),
(7, '2023-01-19', 149, 11, 5),
(9, '2023-01-19', 599, 11, 4),
(17, '2023-02-08', 5499, 11, 6),
(15, '2023-01-20', 1199, 11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idclient`, `name`, `email`, `pass`) VALUES
(5, 'Milton Souza', 'tioname2@yahoo.com', '12345678'),
(11, 'DrUnkeNSoUL096', 'mathewsshajibca@mac.edu.in', '1234567890'),
(2, 'Beatriz Vitória', 'beatrizvika@gmail.com', '12345678'),
(1, 'Vitor Carmo', 'vitorv0071@gmail.com', '12345678'),
(3, 'Julio Conceição', 'juliokun@yahoo.com', '12345678'),
(4, 'Brendo Carmo', 'brendo_carmo@gmail.com', '12345678');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
