-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: self_back
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

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
-- Table structure for table `checkpoint`
--

DROP TABLE IF EXISTS `checkpoint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkpoint` (
  `id` int NOT NULL AUTO_INCREMENT,
  `curriculum_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F00F7BE5AEA4428` (`curriculum_id`),
  CONSTRAINT `FK_F00F7BE5AEA4428` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculum` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkpoint`
--

LOCK TABLES `checkpoint` WRITE;
/*!40000 ALTER TABLE `checkpoint` DISABLE KEYS */;
INSERT INTO `checkpoint` VALUES (3,7,'Pirates des Caraïbes',3,'4h00','2022-01-10 00:43:41','2022-01-10 00:43:41',1);
/*!40000 ALTER TABLE `checkpoint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculum`
--

DROP TABLE IF EXISTS `curriculum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `curriculum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkpoints` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculum`
--

LOCK TABLES `curriculum` WRITE;
/*!40000 ALTER TABLE `curriculum` DISABLE KEYS */;
INSERT INTO `curriculum` VALUES (7,'PHP','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d71c000000006808f625','2022-01-10 00:43:39','2022-01-10 00:43:39'),(8,'JS','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d6ff000000006808f625','2022-01-10 00:43:39','2022-01-10 00:43:39'),(9,'DATA','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d6e2000000006808f625','2022-01-10 00:43:39','2022-01-10 00:43:39');
/*!40000 ALTER TABLE `curriculum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20211230031626','2022-01-09 17:11:22',873),('DoctrineMigrations\\Version20220104164243','2022-01-09 17:11:23',30),('DoctrineMigrations\\Version20220106125439','2022-01-09 17:11:23',137),('DoctrineMigrations\\Version20220108112244','2022-01-09 17:11:23',20),('DoctrineMigrations\\Version20220108160643','2022-01-09 17:11:23',149),('DoctrineMigrations\\Version20220108192725','2022-01-09 17:11:24',37),('DoctrineMigrations\\Version20220108193849','2022-01-09 17:11:24',77),('DoctrineMigrations\\Version20220108194056','2022-01-09 17:11:24',86),('DoctrineMigrations\\Version20220108194540','2022-01-09 17:11:24',79),('DoctrineMigrations\\Version20220109153455','2022-01-09 17:11:24',35),('DoctrineMigrations\\Version20220109153957','2022-01-09 17:11:24',88),('DoctrineMigrations\\Version20220109154200','2022-01-09 17:11:24',204),('DoctrineMigrations\\Version20220109160239','2022-01-09 17:11:24',46);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objective`
--

DROP TABLE IF EXISTS `objective`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objective` (
  `id` int NOT NULL AUTO_INCREMENT,
  `checkpoint_id` int NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_bonus` tinyint(1) NOT NULL,
  `number` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B996F101F27C615F` (`checkpoint_id`),
  CONSTRAINT `FK_B996F101F27C615F` FOREIGN KEY (`checkpoint_id`) REFERENCES `checkpoint` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objective`
--

LOCK TABLES `objective` WRITE;
/*!40000 ALTER TABLE `objective` DISABLE KEYS */;
INSERT INTO `objective` VALUES (21,3,'J\'ai réussi à cloner le projet',0,1,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(22,3,'J\'ai réussi à remplir ma base de données',0,2,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(23,3,'J\'ai réussi à téléporter mon bateau',0,3,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(24,3,'J\'ai réussi à faire bouger mon bateau de case en case',0,4,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(25,3,'J\'ai réussi à vérifier si le bateau de sort du cadre',0,5,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(26,3,'J\'ai réussi à afficher un message erreur en cas de sortie de cadre',0,5,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(27,3,'J\'ai réussi à afficher les coordonnées du bateau ainsi que le type du lieu',0,6,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(28,3,'J\'ai réussi à  tirer une île au hasard',0,7,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(29,3,'J\'ai réussi à initialiser le jeu',0,10,'2022-01-10 00:43:41','2022-01-10 00:43:41'),(30,3,'J\'ai réussi à vérifier si j\'ai trouvé un trésor',0,11,'2022-01-10 00:43:41','2022-01-10 00:43:41');
/*!40000 ALTER TABLE `objective` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objective_skill`
--

DROP TABLE IF EXISTS `objective_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `objective_skill` (
  `objective_id` int NOT NULL,
  `skill_id` int NOT NULL,
  PRIMARY KEY (`objective_id`,`skill_id`),
  KEY `IDX_38A9D94473484933` (`objective_id`),
  KEY `IDX_38A9D9445585C142` (`skill_id`),
  CONSTRAINT `FK_38A9D9445585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_38A9D94473484933` FOREIGN KEY (`objective_id`) REFERENCES `objective` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objective_skill`
--

LOCK TABLES `objective_skill` WRITE;
/*!40000 ALTER TABLE `objective_skill` DISABLE KEYS */;
INSERT INTO `objective_skill` VALUES (21,27),(22,28),(22,29),(23,30),(23,31),(24,32),(24,33),(24,34),(25,33),(25,35),(25,36),(26,35),(26,37),(27,28),(27,32),(27,34),(27,38),(28,32),(28,39),(29,31),(29,32),(29,34),(29,35),(30,32),(30,33),(30,35);
/*!40000 ALTER TABLE `objective_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `result` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `serialized` json NOT NULL,
  `created_at` datetime NOT NULL,
  `student` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkpoint_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_136AC113A76ED395` (`user_id`),
  KEY `IDX_136AC113F27C615F` (`checkpoint_id`),
  CONSTRAINT `FK_136AC113A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_136AC113F27C615F` FOREIGN KEY (`checkpoint_id`) REFERENCES `checkpoint` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skill` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objectives` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (27,'Git','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d692000000006808f625','#E7FBBE','2022-01-10 00:43:41','2022-01-10 00:43:41'),(28,'Commandes Symfony','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d68a000000006808f625','#D9D7F1','2022-01-10 00:43:41','2022-01-10 00:43:41'),(29,'initialisation projet Symfony','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d6b2000000006808f625','#D5ECC2','2022-01-10 00:43:41','2022-01-10 00:43:41'),(30,'Manipulation URL ','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d6ad000000006808f625','#FFC4E1','2022-01-10 00:43:41','2022-01-10 00:43:41'),(31,'Manipulation de Routes ','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d699000000006808f625','#92A9BD','2022-01-10 00:43:41','2022-01-10 00:43:41'),(32,'Manipulation Base de données ','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d69d000000006808f625','#EEC373','2022-01-10 00:43:41','2022-01-10 00:43:41'),(33,'Conditions','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d665000000006808f625','#96C7C1','2022-01-10 00:43:41','2022-01-10 00:43:41'),(34,'Données dynamiques Twig','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d661000000006808f625','#94DAFF','2022-01-10 00:43:41','2022-01-10 00:43:41'),(35,'Manipulation de service','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d66d000000006808f625','#FCFFA6','2022-01-10 00:43:41','2022-01-10 00:43:41'),(36,'Injection de dépendances ','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d671000000006808f625','#D57E7E','2022-01-10 00:43:41','2022-01-10 00:43:41'),(37,'affichage erreurs ','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d679000000006808f625','#DE8971','2022-01-10 00:43:41','2022-01-10 00:43:41'),(38,'Création entité','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d641000000006808f625','#E4BAD4','2022-01-10 00:43:41','2022-01-10 00:43:41'),(39,'Manipulation tableaux','Doctrine\\Common\\Collections\\ArrayCollection@000000002698d649000000006808f625','#F2EDD7','2022-01-10 00:43:41','2022-01-10 00:43:41');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (13,'superAdmin@gmail.com','[\"ROLE_SUPER_ADMIN\"]','$2y$13$DnlXa1LQikpIYBRNO3B4X.MFdcNw1v7gElMnQBw2hPXAsemb0Zx0O',1,'Super','Admin','2022-01-10 00:43:39','2022-01-10 00:43:39','Super Admin'),(14,'olivier.chatelin@gmail.com','[\"ROLE_USER\"]','$2y$13$b6fJOHBvxWf4X7fkgZpeIuvtb4A9BuAhnHHaW2lZtyE3G4fBgNTpC',1,'Olivier','Châtelin','2022-01-10 00:43:40','2022-01-10 00:43:40','Olivier Châtelin'),(15,'guillaume.harari@wildcodeschool.com','[\"ROLE_INSTRUCTOR\"]','$2y$13$WIIHkFoxWAxQcyIMzMe5n.T8Lpiu4rF9c/huixhhP7vFFQVSaLkQu',1,'Guillaume','Harari','2022-01-10 00:43:40','2022-01-10 00:43:40','Guillaume Harari'),(16,'vincent.vaur@wildcodeschool.com','[\"ROLE_INSTRUCTOR\"]','$2y$13$4OoZL3jIKHz7YKkV1dm/l./CbPuBuZiMR9CkWyp8IA25w58HUFa26',1,'Vincent','Vaur','2022-01-10 00:43:41','2022-01-10 00:43:41','Vincent Vaur'),(17,'jonathan.siaut@wildcodeschool.com','[\"ROLE_INSTRUCTOR\"]','$2y$13$iX6F..O.4x.nyxvUw/cpQO/bk1DxNPBNt9F/GCdy5KVYVZc6qiajW',1,'Jonathan','Siaut','2022-01-10 00:43:41','2022-01-10 00:43:41','Jonathan Siaut'),(18,'admin.admin@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$OnLYHIQ2O9SpEQ8gLIYA7OsqwOcgmIRu6PeXmTp9oIV/8YJOaLsKq',1,'Simple','Admin','2022-01-10 00:43:41','2022-01-10 00:43:41','Simple Admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-10  0:43:51
