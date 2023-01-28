SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `user` (
  `idclient` int(11) NOT NULL PRIMARY KEY,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL
) ;

INSERT INTO `user` (`idclient`, `name`, `email`,`pass`) VALUES
(1, 'Vitor Carmo', 'vitorv0071@gmail.com', '12345678'),
(2, 'Beatriz Vitória', 'beatrizvika@gmail.com','12345678'),
(3, 'Julio Conceição', 'juliokun@yahoo.com','12345678'),
(4, 'Brendo Carmo', 'brendo_carmo@gmail.com','12345678'),
(5, 'Milton Souza', 'tioname2@yahoo.com','12345678');


CREATE TABLE `tbproduct` (
  `idproduct` int(11) NOT NULL PRIMARY KEY,
  `pname` varchar(70) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `genre` varchar(30) NOT NULL,
  `console` varchar(30) DEFAULT NULL,
  `descp` varchar(1000) 
) ;

INSERT INTO `tbproduct` (`idproduct`, `pname`, `price`, `photo`, `genre`, `console`,`descp`) VALUES
(2, 'Death Stranding', 4499, 'img/product/2.jpg', 'Ação', 'Playstation',"From legendary game creator Hideo Kojima comes an all-new, genre-defying open world action adventure, starring Norman Reedus, Mads Mikkelsen, Léa Seydoux and Lindsay Wagner."),
(3, 'God of War', 2999, 'img/product/3.jpg', 'Aventura', 'Playstation',"Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply pers"),
(4, 'Skyrim', 599, 'img/product/4.jpg', 'RPG', 'Pc Gamer',"Winner of more than 200 Game of the Year Awards, Skyrim Special Edition brings the epic fantasy to life in stunning detail."),
(5, 'Fortnite', 149,  'img/product/5.jpg', 'Multiplayer', 'Pc Gamer',"needs to be updated"),
(6, 'Minecraft', 5499, 'img/product/6.jpg', 'Multiplayer', 'Pc Gamer',"needs to be updated"),
(7, ' Dota 2',1199, 'img/product/7.jpg', 'Multiplayer', 'Pc Gamer',"needs to be updated"),
(8, 'Diablo III', 2499, 'img/product/8.jpg', 'Multiplayer', 'Pc Gamer',"needs to be updated"),
(9, 'Toram online',759, 'img/product/9.jpg', 'RPG', 'Mobile',"needs to be updated"),
(10, 'Free Fire',489, 'img/product/10.jpg', 'Multiplayer', 'Mobile',"needs to be updated"),
(11, 'Fifa 2019', 5599, 'img/product/11.jpg', 'Esportes', 'Xbox',"needs to be updated"),
(12, 'A Way Out', 579, 'img/product/12.jpg', 'Aventura', 'Pc Gamer',"A Way Out is an exclusively co-op adventure where you play the role of one of two prisoners making their daring escape from prison"),
(13, 'Hollow Knight', 1479, 'img/product/13.jpg', 'Aventura', 'Nintendo',"needs to be updated");

CREATE TABLE `tbsale` (
  `idsale` int(11) NOT NULL PRIMARY KEY,
  `datesale` date NOT NULL,
  `price` double NOT NULL,
  `idclient` int(11) NOT NULL,
  `idproduct`int(11) NOT NULL,
  FOREIGN KEY (`idproduct`) REFERENCES  `tbproduct`(`idproduct`) ON DELETE CASCADE,
  FOREIGN KEY (`idclient`) REFERENCES `user`(`idclient`) ON DELETE CASCADE
);

ALTER TABLE `user`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `tbproduct`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `tbsale`
  MODIFY `idsale` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

