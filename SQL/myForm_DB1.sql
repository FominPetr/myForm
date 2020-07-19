-- MySQL dump 10.13  Distrib 5.7.23, for osx10.9 (x86_64)
--
-- Host: localhost    Database: myForm
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`idComment`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (62,1758295,'simbobo@mail.com','2020-07-19 11:11:00'),(63,1758295,'simbobo2@mail.com','2020-07-19 12:00:00'),(82,34,'Проверка всех систем','2020-07-19 14:40:00'),(88,34,'alert(\"sorry\")','2020-07-19 15:49:36'),(90,1758302,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, earum. Eos voluptatum, itaque praesentium rem amet','2020-07-19 17:06:56'),(91,1758303,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, earum. Eos voluptatum, itaque praesentium rem amet','2020-07-19 17:07:54');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1758304 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (33,'Ануфриев ','Дмитрий ','Анатольевич ','anf@yandex.com '),(34,'Фомин ','Петр ','Викторович ','p.fomin@me.com '),(1758295,'Симонов ','Кирилл ','Селеванович ','simbobo@mail.com '),(1758298,'Алферов ','Кирилл ','Селеванович ','lucasdejong@mail.ru '),(1758302,'Иванов','Кирилл','Рудольфович','m@mail.ru'),(1758303,'Сумороков','Иван','Викторович','ivan@mail.ru');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-19 17:16:21
