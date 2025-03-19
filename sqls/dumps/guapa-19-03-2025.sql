/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.5.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: guapa
-- ------------------------------------------------------
-- Server version	10.5.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `g_inquilinos`
--

DROP TABLE IF EXISTS `g_inquilinos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `g_inquilinos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `num_pasaporte` varchar(50) DEFAULT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `email` varchar(65) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `cbu` varchar(24) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g_inquilinos`
--

LOCK TABLES `g_inquilinos` WRITE;
/*!40000 ALTER TABLE `g_inquilinos` DISABLE KEYS */;
/*!40000 ALTER TABLE `g_inquilinos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_propietarios`
--

DROP TABLE IF EXISTS `g_propietarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `g_propietarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `celular` varchar(16) NOT NULL,
  `email` varchar(65) NOT NULL,
  `cbu` varchar(24) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g_propietarios`
--

LOCK TABLES `g_propietarios` WRITE;
/*!40000 ALTER TABLE `g_propietarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `g_propietarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `g_usuarios`
--

DROP TABLE IF EXISTS `g_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `g_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user` varchar(65) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(74) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(90) NOT NULL,
  `task` int(11) NOT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `g_usuarios`
--

LOCK TABLES `g_usuarios` WRITE;
/*!40000 ALTER TABLE `g_usuarios` DISABLE KEYS */;
INSERT INTO `g_usuarios` VALUES (1,'Administrador','root@gmail.com','$2y$10$aQZkHEtETwLtmRXr4RTF7ez7uDhHqrCofPEiZVeyv7T1.Jaes0/Bu','root@gmail.com',1,NULL,1);
/*!40000 ALTER TABLE `g_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-19 14:35:21
