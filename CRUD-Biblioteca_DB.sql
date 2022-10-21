CREATE DATABASE  IF NOT EXISTS `crud-biblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crud-biblioteca`;
-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: crud-biblioteca
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `book_author`
--

DROP TABLE IF EXISTS `book_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_author`
--

LOCK TABLES `book_author` WRITE;
/*!40000 ALTER TABLE `book_author` DISABLE KEYS */;
INSERT INTO `book_author` (`id_author`, `name`, `surname`) VALUES (1,'Other','Other'),(2,'Unknow','Unknow'),(3,'Juan','Escutia'),(4,'Tsun','Tzu');
/*!40000 ALTER TABLE `book_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_genre`
--

DROP TABLE IF EXISTS `book_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `genre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_genre`
--

LOCK TABLES `book_genre` WRITE;
/*!40000 ALTER TABLE `book_genre` DISABLE KEYS */;
INSERT INTO `book_genre` (`id_genre`, `genre`) VALUES (1,'Thriller'),(2,'	Military art'),(3,'Science'),(4,'Drama'),(5,'Fantasy'),(6,'Science fiction'),(7,'History'),(8,'Religion'),(9,'Fairy tale'),(10,'Adventure'),(11,'Poetry'),(12,'Romance'),(13,'Mystery'),(14,'Fable'),(15,'Crime'),(16,'Comic'),(17,'Mythology'),(18,'Graphic novel'),(19,'Technical'),(20,'Horror '),(21,'Children\'s tale'),(22,'Psychology'),(23,'Self-help'),(24,'Relationships'),(25,'Non-fiction'),(26,'Politics'),(27,'Fiction');
/*!40000 ALTER TABLE `book_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pagecount` int(6) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `cover` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id_book`),
  KEY `fk_author_idx` (`id_author`),
  KEY `fk_genre_idx` (`id_genre`),
  CONSTRAINT `fk_author` FOREIGN KEY (`id_author`) REFERENCES `book_author` (`id_author`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_genre` FOREIGN KEY (`id_genre`) REFERENCES `book_genre` (`id_genre`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id_book`, `title`, `pagecount`, `id_author`, `id_genre`, `cover`) VALUES (17,'Los hombres son de venus y las mujeres son de marte',324,3,24,'uploads/books/1666232020_3cd971218c227305e6856cd39cc41243.webp'),(18,'Así habló Zarathustra',355,2,1,'uploads/books/1666232043_81HRnQJn0CL.jpg'),(20,'El arte de la guerra',272,4,2,'uploads/books/1666232202_61aTf+8b6qL.jpg'),(22,'El caballero de la armadura oxidada',250,2,27,'uploads/books/1666383810_71NY1Sg4-RL.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrows`
--

DROP TABLE IF EXISTS `borrows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrows` (
  `id_borrow` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `date_borrow` date NOT NULL,
  `date_return` date DEFAULT NULL,
  PRIMARY KEY (`id_borrow`),
  KEY `fk_user_idx` (`id_user`),
  KEY `fk_book_idx` (`id_book`),
  CONSTRAINT `fk_book` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrows`
--

LOCK TABLES `borrows` WRITE;
/*!40000 ALTER TABLE `borrows` DISABLE KEYS */;
INSERT INTO `borrows` (`id_borrow`, `id_user`, `id_book`, `date_borrow`, `date_return`) VALUES (1,2,17,'2022-10-19','2022-10-21'),(2,3,20,'2022-10-20','2022-10-22'),(4,2,18,'2022-09-28','2022-10-28');
/*!40000 ALTER TABLE `borrows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phonenum` varchar(15) NOT NULL,
  `location` varchar(255) NOT NULL,
  `photo` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `name`, `surname`, `gender`, `phonenum`, `location`, `photo`) VALUES (2,'Johany','Lara','Masculino','7331082332','Morelos, México.','uploads/users/1666234582_Johany Lara 2.png'),(3,'Paola','Sánchez','Femenino','7772183332','Cuernavaca, Morelos','uploads/users/1666236315_DSC01512_BLUE.jpg'),(4,'Tadeo','Mora','Femenino','7772589632','Jiutepec, Morelos.','uploads/users/1666385591_Tadeo.jpg');
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

-- Dump completed on 2022-10-21 17:47:28
