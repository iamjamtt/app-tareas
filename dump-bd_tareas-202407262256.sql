-- MySQL dump 10.13  Distrib 8.2.0, for macos13 (arm64)
--
-- Host: localhost    Database: bd_tareas
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_adjuntos`
--

DROP TABLE IF EXISTS `tb_adjuntos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_adjuntos` (
  `id_adjuntos` int NOT NULL AUTO_INCREMENT,
  `nombre_adjuntos` varchar(100) NOT NULL,
  `ruta_adjuntos` varchar(255) NOT NULL,
  `id_tarea` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_adjuntos`),
  KEY `id_tarea` (`id_tarea`),
  CONSTRAINT `tb_adjuntos_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tb_tarea` (`id_tarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_adjuntos`
--

LOCK TABLES `tb_adjuntos` WRITE;
/*!40000 ALTER TABLE `tb_adjuntos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_adjuntos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_comentario`
--

DROP TABLE IF EXISTS `tb_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `contenido_comentario` text NOT NULL,
  `id_tarea` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  KEY `id_tarea` (`id_tarea`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_comentario_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tb_tarea` (`id_tarea`),
  CONSTRAINT `tb_comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_comentario`
--

LOCK TABLES `tb_comentario` WRITE;
/*!40000 ALTER TABLE `tb_comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tarea`
--

DROP TABLE IF EXISTS `tb_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tarea` (
  `id_tarea` int NOT NULL AUTO_INCREMENT,
  `nombre_tarea` varchar(100) NOT NULL,
  `descripcion_tarea` text,
  `estado_tarea` tinyint DEFAULT '1',
  `fecha_inicio_tarea` date DEFAULT NULL,
  `fecha_fin_tarea` date DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tarea`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_tarea_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tarea`
--

LOCK TABLES `tb_tarea` WRITE;
/*!40000 ALTER TABLE `tb_tarea` DISABLE KEYS */;
INSERT INTO `tb_tarea` VALUES (1,'Tarea 1','Tarea 1',1,'2024-07-25','2024-07-26',1,'2024-07-25 18:10:28','2024-07-25 18:10:28'),(2,'Tarea 2','Tarea 2',1,'2024-07-25','2024-07-25',1,'2024-07-25 18:23:42','2024-07-25 18:23:42'),(3,'Tarea 3','Tarea 3',1,'2024-07-25','2024-07-25',1,'2024-07-25 18:24:13','2024-07-25 18:24:35'),(4,'Tarea 4','Tarea 4',1,'2024-07-25','2024-07-25',1,'2024-07-25 18:27:13','2024-07-25 18:27:13');
/*!40000 ALTER TABLE `tb_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `contrasenia_usuario` varchar(255) NOT NULL,
  `foto_usuario` text,
  `estado_usuario` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_usuario` (`email_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Webmaster','webmaster@unia.edu.pe','$2y$10$Piv4DqIDULAMRlPFumbJqeIk9vreVIVZ4PJJdzHhEkeAD57YuBVJu',NULL,1,'2024-07-25 17:03:37','2024-07-25 17:03:37');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bd_tareas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-26 22:56:20
