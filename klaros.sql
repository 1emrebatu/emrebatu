CREATE DATABASE  IF NOT EXISTS `klaros` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `klaros`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: klaros
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `sepet`
--

DROP TABLE IF EXISTS `sepet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepet`
--

LOCK TABLES `sepet` WRITE;
/*!40000 ALTER TABLE `sepet` DISABLE KEYS */;
/*!40000 ALTER TABLE `sepet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sepet_urunler`
--

DROP TABLE IF EXISTS `sepet_urunler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepet_urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sepet_id` int(11) DEFAULT NULL,
  `urun_kodu` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `miktar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepet_urunler`
--

LOCK TABLES `sepet_urunler` WRITE;
/*!40000 ALTER TABLE `sepet_urunler` DISABLE KEYS */;
/*!40000 ALTER TABLE `sepet_urunler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urun`
--

DROP TABLE IF EXISTS `urun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `fiyati` decimal(10,0) DEFAULT NULL,
  `aciklama` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `odeme_geldi` tinyint(1) DEFAULT NULL,
  `urun_kodu` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `urun_resim1` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `urun_resim2` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `cinsiyet` tinyint(1) DEFAULT NULL,
  `kategori_id` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urun`
--

LOCK TABLES `urun` WRITE;
/*!40000 ALTER TABLE `urun` DISABLE KEYS */;
INSERT INTO `urun` VALUES (1,'Melek Kolye',40,'Aciklama alani burasi',1,1,'0092501','img/3.png',NULL,NULL,NULL),(2,'Bileklik',20,'Burasi aciklama alani',1,NULL,'0003344','img/2.png',NULL,NULL,NULL),(3,'Küpe',5,'açıklamalarrrrr',1,NULL,'0111556','img/1.png',NULL,NULL,NULL),(4,'Yüzük',20,'yüzükkkkk',1,NULL,'0223387','img/1.jpg',NULL,NULL,NULL),(5,'Yüzük',17,'bu da yüzük',1,NULL,'1892323','img/5.jpg',NULL,NULL,NULL);
/*!40000 ALTER TABLE `urun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uye`
--

DROP TABLE IF EXISTS `uye`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `pass` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `mail` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uyecol` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tel` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tel2` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `adres` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ilce` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `il` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `uye_adi` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `uye_soyadi` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uye`
--

LOCK TABLES `uye` WRITE;
/*!40000 ALTER TABLE `uye` DISABLE KEYS */;
/*!40000 ALTER TABLE `uye` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-16 10:55:01
