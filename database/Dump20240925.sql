-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: prodaceem
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `annee_universitaires`
--

DROP TABLE IF EXISTS `annee_universitaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `annee_universitaires` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annee_universitaires`
--

LOCK TABLES `annee_universitaires` WRITE;
/*!40000 ALTER TABLE `annee_universitaires` DISABLE KEYS */;
INSERT INTO `annee_universitaires` VALUES (1,'2024-2025',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `annee_universitaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidats`
--

DROP TABLE IF EXISTS `candidats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `mention_id` bigint unsigned DEFAULT NULL,
  `serie_id` bigint unsigned DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_bacc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anne_bacc` year NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_conc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preuve_bacc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('admis','recalé') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_mvola` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode_inscription` enum('local','en_ligne') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vagues_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `candidats_num_bacc_unique` (`num_bacc`),
  UNIQUE KEY `candidats_email_unique` (`email`),
  KEY `candidats_mention_id_foreign` (`mention_id`),
  KEY `candidats_serie_id_foreign` (`serie_id`),
  KEY `candidats_vagues_id_foreign` (`vagues_id`),
  CONSTRAINT `candidats_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `candidats_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE SET NULL,
  CONSTRAINT `candidats_vagues_id_foreign` FOREIGN KEY (`vagues_id`) REFERENCES `vagues` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidats`
--

LOCK TABLES `candidats` WRITE;
/*!40000 ALTER TABLE `candidats` DISABLE KEYS */;
INSERT INTO `candidats` VALUES (1,6,3,'RATOVOARIVONY Ainanirina Sabrino','78961330',2024,'0388922781','001/ConcIE/IèA/24-25','sabrino@gmail.com',NULL,'admis',NULL,NULL,'local','2024-09-05 05:37:30','2024-09-05 05:46:39',NULL,1),(2,6,3,'Voavison Binea','1564313',2024,'0342458915','001/ConcIE/IèA/24-25','voavisonbinea@gmail.com',NULL,'admis',NULL,NULL,'local','2024-09-09 08:18:58','2024-09-09 09:10:35',NULL,2),(4,6,3,'John Doe','4567612',2024,'0344312449','002/ConcIE/IèA/24-25','john@gmail.com',NULL,'admis',NULL,NULL,'local','2024-09-09 10:13:40','2024-09-09 10:14:47',NULL,2),(5,6,3,'Voavy Paulin','876132160',2024,'0346490580','003/ConcIE/IèA/24-25','voavy@gmail.com',NULL,'admis',NULL,NULL,'local','2024-09-09 10:24:11','2024-09-09 10:28:35',NULL,2),(6,3,4,'Henri VE','87613217',2024,'0344312447','001/ConcSS/IèA/24-25','henri@gmail.com',NULL,'admis',NULL,NULL,'local','2024-09-10 03:55:37','2024-09-10 04:01:01',NULL,2),(7,6,2,'Desiré Noel','12345678',2024,'0332589741','004/ConcIE/IèA/24-25','desire@gmail.com',NULL,'admis',NULL,NULL,'local','2024-09-10 04:08:46','2024-09-10 04:13:15',NULL,2),(8,6,2,'Berthrand Aristide','45676129',2024,'0344312445','005/ConcIE/IèA/24-25',NULL,NULL,NULL,NULL,NULL,'local','2024-09-11 05:15:10','2024-09-11 05:15:10',NULL,2);
/*!40000 ALTER TABLE `candidats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concours`
--

DROP TABLE IF EXISTS `concours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `concours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concours`
--

LOCK TABLES `concours` WRITE;
/*!40000 ALTER TABLE `concours` DISABLE KEYS */;
INSERT INTO `concours` VALUES (1,'Concours d\'entrer en L1','2024-09-05 05:27:14','2024-09-05 05:27:14');
/*!40000 ALTER TABLE `concours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `etudiants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidat_id` bigint unsigned DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_nais` date NOT NULL,
  `lieu_nais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situation_matri` enum('celibataire','marier','autre') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'celibataire',
  `num_cin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_cin` date NOT NULL,
  `lieu_cin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quartier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etablissement_origine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession_parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_mvola` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom_parent_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_parent_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_parent_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `centre_interet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_changed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `groupes_id` bigint unsigned DEFAULT NULL,
  `mention_id` bigint unsigned DEFAULT NULL,
  `sous_groupes_id` bigint unsigned DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_frere_soeurs` int NOT NULL,
  `etat_domicile` enum('seul','avec_personne') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `etudiants_matricule_unique` (`matricule`),
  UNIQUE KEY `etudiants_num_cin_unique` (`num_cin`),
  UNIQUE KEY `etudiants_username_unique` (`username`),
  KEY `etudiants_candidat_id_foreign` (`candidat_id`),
  KEY `etudiants_groupes_id_foreign` (`groupes_id`),
  KEY `etudiants_mention_id_foreign` (`mention_id`),
  KEY `etudiants_sous_groupes_id_foreign` (`sous_groupes_id`),
  CONSTRAINT `etudiants_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON DELETE SET NULL,
  CONSTRAINT `etudiants_groupes_id_foreign` FOREIGN KEY (`groupes_id`) REFERENCES `groupes` (`id`) ON DELETE SET NULL,
  CONSTRAINT `etudiants_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `etudiants_sous_groupes_id_foreign` FOREIGN KEY (`sous_groupes_id`) REFERENCES `sous_groupes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiants`
--

LOCK TABLES `etudiants` WRITE;
/*!40000 ALTER TABLE `etudiants` DISABLE KEYS */;
INSERT INTO `etudiants` VALUES (1,1,'photos/rBHS9fKr7DOM2hmYGynBbFQlhHCVq91MJo0gfKik.jpg','1','M','2000-12-15','Antananarivo','celibataire','201011028960','2019-01-09','Fianarantsoa','Lot 266A/3710','67HA','sabrino Lp','Collège Saint François Xavier Ambatomena',NULL,'RATOVOARIVONY Guillaume Marie Germain','Lot 244D/7890','Directeur de Bank Of Africa','0343101807',NULL,'Fianarantsoa',NULL,NULL,NULL,'Dance, TikTok, Lire, Parkour','$2y$12$Lj.mDNp72eK0/kt/2PmRVuf8aX7ZH0Lb1Zql.IHqjz5vAB9HHGf1m','sabrino',0,'2024-09-05 05:46:43','2024-09-05 05:46:43',NULL,NULL,NULL,NULL,'','','',0,'seul'),(2,2,NULL,'2','M','2004-06-08','Antananarivo','celibataire','201468455987','2019-11-21','Fianarantsoa','Lot 266A/3710','Ambohipo','voavy binea','Collège Saint Michelle Mahamasina','example@gmail.com','RATOVOARIVONY Andoniaina','Lot 2584C/7890','Secretaire','0332578945','0345897458','Antananarivo','Andriantefy Tsanta','Secretaire','0332598945','Dance, TikTok, Lire, Ecrire','$2y$12$j1XJhyTZSLYKwZWMTuJzjuJHtNPsws/SKvkeZ2o5H3GjbzKA/.82e','binea',0,'2024-09-09 09:43:12','2024-09-09 09:43:12',NULL,NULL,NULL,NULL,'','','',0,'seul'),(3,4,NULL,'3','M','2004-04-11','Fianarantsoa','celibataire','024897561564','2019-06-12','Fianarantsoa','Lot 266A/3712','Ankadifotsy',NULL,'Collège Saint Michelle Mahamasina',NULL,'RATOVOARIVONY Jean','Lot 2584C/7894','Directeur de BOA','0332577945',NULL,'Fianarantsoa',NULL,NULL,NULL,'Dance, TikTok, Lire','$2y$12$81/O/FG1Pg3nJAfhDC3e1.M5OcBdQ8G9axelUnKVeEp3806dMeuyi','john',0,'2024-09-09 10:17:00','2024-09-09 10:17:00',NULL,NULL,NULL,NULL,'','','',0,'seul'),(4,5,'photos/jc8UWFFKHHziAQrjd2Niv8cJbar366nXbyE0CrS8.jpg','4','M','2002-05-07','Antananarivo','celibataire','201460455987','2020-05-16','Antananarivo','Lot 265A/3712','Andavamamba',NULL,'Collège Saint François Xavier Ambatomena',NULL,'RATOVOARIVONY Voavy','Lot 2574C/7890','Directeur de BNI','0332778945',NULL,'Antananarivo',NULL,NULL,NULL,'Dance, Lire','$2y$12$f6FBeGULFYkecXq.7isF3edAM/jMFaUq8HFscPU88czJXOg4.zGai','voavy',0,'2024-09-09 10:28:40','2024-09-09 10:28:40',NULL,NULL,NULL,NULL,'Test Name','','',0,'seul'),(5,6,NULL,'5','M','2002-03-10','Fianarantsoa','celibataire','201498455987','2020-03-11','Fianarantsoa','Lot 266A/3719','-- Sélectionner --','henri VE','Collège Saint François Xavier Ambatomena',NULL,'RATOVOARIVONY Henri','Lot 2584C/7898','Directeur de BOA','0332577445',NULL,'-- Sélectionner --',NULL,NULL,NULL,'Lire','$2y$12$IeBrgRofXrqMJOOYRBtClOmidg4st9w4anfjvDpOxrZmO2DhK4NZ.','henri',0,'2024-09-10 04:01:02','2024-09-10 04:01:02',NULL,NULL,NULL,NULL,'','','',0,'seul'),(6,7,'photos/IwiLm3YrO3T4xjCkxELnFJDt5AoC1Gp12ZQgaZ6z.jpg','6','M','2003-07-10','Antananarivo','celibataire','024897561567','2019-02-16','Antananarivo','Lot 266A/3718','Anosizato',NULL,'Collège Saint François Xavier Ambatomena',NULL,'RATOVOARIVONY Desiré','Lot 2584C/7899','Directeur de BFV','0332587945',NULL,'Antananarivo',NULL,NULL,NULL,'Dance, TikTok, Lire, Parkour, Dormir','$2y$12$FqcNaKjraPxEnCj4bgJVYusIwnkIeEOVvtPR.31XA8KsYqo37wkgC','desiré',1,'2024-09-10 04:13:17','2024-09-10 04:13:17',NULL,NULL,NULL,NULL,'','','',0,'seul');
/*!40000 ALTER TABLE `etudiants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupes`
--

DROP TABLE IF EXISTS `groupes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groupes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveaux_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groupes_niveaux_id_foreign` (`niveaux_id`),
  CONSTRAINT `groupes_niveaux_id_foreign` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupes`
--

LOCK TABLES `groupes` WRITE;
/*!40000 ALTER TABLE `groupes` DISABLE KEYS */;
INSERT INTO `groupes` VALUES (2,'C1','Communication groupe 01',4,'2024-09-11 02:59:40','2024-09-11 03:04:17'),(3,'D1','Droit 01',5,'2024-09-12 03:51:20','2024-09-12 03:51:20');
/*!40000 ALTER TABLE `groupes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `is_payement_ok` tinyint(1) NOT NULL DEFAULT '0',
  `niveau_id` bigint unsigned DEFAULT NULL,
  `annee_univ_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inscriptions_niveaux_id_foreign` (`niveau_id`),
  KEY `inscriptions_annee_univ_id_foreign` (`annee_univ_id`),
  KEY `inscriptions_matricule_id_foreign` (`matricule_id`),
  CONSTRAINT `inscriptions_annee_univ_id_foreign` FOREIGN KEY (`annee_univ_id`) REFERENCES `annee_universitaires` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inscriptions_matricule_id_foreign` FOREIGN KEY (`matricule_id`) REFERENCES `matricules` (`id`) ON DELETE SET NULL,
  CONSTRAINT `inscriptions_niveaux_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscriptions`
--

LOCK TABLES `inscriptions` WRITE;
/*!40000 ALTER TABLE `inscriptions` DISABLE KEYS */;
INSERT INTO `inscriptions` VALUES (1,1,5,1,NULL,'2024-09-23 06:13:08',3),(2,1,6,1,NULL,'2024-09-23 06:16:01',2),(3,1,7,1,NULL,'2024-09-24 11:14:56',4),(4,0,5,1,NULL,'2024-09-22 12:34:01',1),(5,0,5,1,NULL,'2024-09-22 12:25:53',5);
/*!40000 ALTER TABLE `inscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matricules`
--

DROP TABLE IF EXISTS `matricules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matricules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `candidat_id` bigint unsigned DEFAULT NULL,
  `etudiant_id` bigint unsigned DEFAULT NULL,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricules_design_unique` (`design`),
  KEY `matricules_candidat_id_foreign` (`candidat_id`),
  KEY `matricules_etudiant_id_foreign` (`etudiant_id`),
  CONSTRAINT `matricules_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON DELETE SET NULL,
  CONSTRAINT `matricules_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matricules`
--

LOCK TABLES `matricules` WRITE;
/*!40000 ALTER TABLE `matricules` DISABLE KEYS */;
INSERT INTO `matricules` VALUES (1,1,1,'001/IE/IèA','2024-09-04 08:34:44','2024-09-04 08:41:28'),(2,2,2,'002/IE/IèA','2024-09-09 09:12:13','2024-09-09 09:43:13'),(3,4,3,'003/IE/IèA','2024-09-09 10:14:58','2024-09-09 10:17:00'),(4,5,4,'004/IE/IèA','2024-09-09 10:25:25','2024-09-09 10:28:41'),(5,6,5,'001/SS/IèA','2024-09-10 03:57:07','2024-09-10 04:01:02'),(6,7,6,'005/IE/IèA','2024-09-10 04:10:53','2024-09-10 04:13:17');
/*!40000 ALTER TABLE `matricules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mention_serie`
--

DROP TABLE IF EXISTS `mention_serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mention_serie` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `serie_id` bigint unsigned NOT NULL,
  `mention_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mention_serie_serie_id_foreign` (`serie_id`),
  KEY `mention_serie_mention_id_foreign` (`mention_id`),
  CONSTRAINT `mention_serie_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mention_serie_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mention_serie`
--

LOCK TABLES `mention_serie` WRITE;
/*!40000 ALTER TABLE `mention_serie` DISABLE KEYS */;
INSERT INTO `mention_serie` VALUES (1,1,1,NULL,NULL),(2,2,1,NULL,NULL),(3,3,1,NULL,NULL),(4,4,1,NULL,NULL),(5,5,1,NULL,NULL),(6,6,1,NULL,NULL),(7,1,2,NULL,NULL),(8,2,2,NULL,NULL),(9,2,3,NULL,NULL),(10,3,3,NULL,NULL),(11,4,3,NULL,NULL),(12,2,4,NULL,NULL),(13,3,4,NULL,NULL),(14,5,4,NULL,NULL),(15,1,5,NULL,NULL),(16,2,5,NULL,NULL),(17,3,5,NULL,NULL),(18,4,5,NULL,NULL),(19,5,5,NULL,NULL),(20,6,5,NULL,NULL),(21,2,6,NULL,NULL),(22,3,6,NULL,NULL),(23,5,6,NULL,NULL),(24,6,6,NULL,NULL),(25,5,2,NULL,NULL);
/*!40000 ALTER TABLE `mention_serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mentions`
--

DROP TABLE IF EXISTS `mentions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mentions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mentions_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mentions`
--

LOCK TABLES `mentions` WRITE;
/*!40000 ALTER TABLE `mentions` DISABLE KEYS */;
INSERT INTO `mentions` VALUES (1,'COMMUNICATION','COM','2024-08-21 16:04:39','2024-08-21 16:04:39',NULL,'Communication'),(2,'DROIT & SCIENCE POLITIQUE','DT','2024-08-21 16:05:41','2024-08-21 16:15:17',NULL,'Droit'),(3,'SCIENCE DE LA SANTE','SS','2024-08-21 16:08:21','2024-08-21 16:14:55',NULL,'Science de la santé'),(4,'SCIENCE ECONOMIQUE & ETUDE DU DEVELOPPEMENT','ECO','2024-08-21 16:11:36','2024-08-21 16:17:53',NULL,'Science Economique et Etude du Développement'),(5,'GESTION','GE','2024-08-21 16:14:41','2024-08-21 16:14:41',NULL,'Gestion'),(6,'INFORMATIQUE & ELECTRONIQUE','IE','2024-08-21 16:16:12','2024-08-21 16:16:12',NULL,'Informatique et Electronique');
/*!40000 ALTER TABLE `mentions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_07_25_060305_create_mentions_table',1),(5,'2024_07_25_060531_create_series_table',1),(7,'2024_07_25_061201_create_etudiants_table',1),(8,'2024_07_25_061202_create_utilisateurs_table',1),(9,'2024_07_25_061203_create_payements_table',1),(10,'2024_07_29_075649_alter_utilisateur',1),(11,'2024_07_30_101133_create_mention_serie_table',1),(13,'2024_08_06_072023_alter_mention_table',1),(14,'2024_08_06_074052_create_parcours_table',1),(15,'2024_08_06_104521_create_niveaux_table',1),(16,'2024_08_14_100321_create_matricules_table',1),(18,'2024_08_16_130950_alter_payement_table',1),(20,'2024_07_31_104302_create_vagues_table',2),(21,'2024_08_16_130655_create_concours_table',2),(23,'2024_08_30_110130_alter_vagues_table',3),(25,'2024_07_25_060533_create_candidats_table',4),(26,'2024_08_21_085351_alter_candidat_table',4),(27,'2024_09_06_055034_add_vague_status',5),(28,'2024_09_10_104556_create_groupes_table',5),(29,'2024_09_10_105819_create_sous_groupes_table',5),(30,'2024_09_15_082349_alter_etudiants_tables',6),(31,'2024_09_20_081750_alter_matricules_table',6),(32,'2024_09_21_102126_create_annee_universitaires_table',6),(33,'2024_09_21_103241_create_inscriptions_table',6),(34,'2024_09_22_132630_add_inscription_foreign_key_to_paiement_table',7),(35,'2024_09_23_071150_drop_column_boolean_from_matricules',8),(36,'2024_09_23_060218_create_reinscription_table',9),(37,'2024_09_23_083120_create_reference_paiements_table',10),(38,'2024_09_23_110745_update_payements_table',11),(39,'2024_09_23_121056_alter_table_annee_universitaires_to_add_date_beg_and_end',12),(40,'2024_09_24_115621_alter_table_payements_set_caissiere_id',13),(41,'2024_09_24_130414_alter_table_payements_change_date_format',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveaux`
--

DROP TABLE IF EXISTS `niveaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `niveaux` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` enum('L1','L2','L3','M1','M2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcours_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `niveaux_parcours_id_foreign` (`parcours_id`),
  CONSTRAINT `niveaux_parcours_id_foreign` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveaux`
--

LOCK TABLES `niveaux` WRITE;
/*!40000 ALTER TABLE `niveaux` DISABLE KEYS */;
INSERT INTO `niveaux` VALUES (4,'L1',NULL,1,'2024-09-10 09:50:49','2024-09-10 09:50:49'),(5,'L1',NULL,2,'2024-09-12 03:50:46','2024-09-12 03:50:46'),(6,'L2',NULL,NULL,NULL,NULL),(7,'L3',NULL,NULL,NULL,NULL),(8,'M1',NULL,NULL,NULL,NULL),(9,'M2',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `niveaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parcours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mention_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parcours_mention_id_foreign` (`mention_id`),
  CONSTRAINT `parcours_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcours`
--

LOCK TABLES `parcours` WRITE;
/*!40000 ALTER TABLE `parcours` DISABLE KEYS */;
INSERT INTO `parcours` VALUES (1,'COMMUNICATION','Communication',1,'2024-09-10 09:26:41','2024-09-10 09:26:41'),(2,'DROIT','Droit',2,'2024-09-10 09:27:05','2024-09-10 09:27:05');
/*!40000 ALTER TABLE `parcours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payements`
--

DROP TABLE IF EXISTS `payements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `utilisateur_id` bigint unsigned DEFAULT NULL,
  `etudiant_id` bigint unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `mode` enum('espece','mvola') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `candidat_id` bigint unsigned DEFAULT NULL,
  `inscription_id` bigint unsigned DEFAULT NULL,
  `reference_paiement_id` bigint unsigned DEFAULT NULL,
  `reinscription_id` bigint unsigned DEFAULT NULL,
  `caissiere_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payements_reference_unique` (`reference`),
  KEY `payements_utilisateur_id_foreign` (`utilisateur_id`),
  KEY `payements_etudiant_id_foreign` (`etudiant_id`),
  KEY `payements_candidat_id_foreign` (`candidat_id`),
  KEY `payements_inscription_id_foreign` (`inscription_id`),
  KEY `payements_reference_paiements_id_foreign` (`reference_paiement_id`),
  KEY `payements_reinscription_id_foreign` (`reinscription_id`),
  KEY `payements_caissiere_id_foreign` (`caissiere_id`),
  CONSTRAINT `payements_caissiere_id_foreign` FOREIGN KEY (`caissiere_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payements_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payements_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payements_inscription_id_foreign` FOREIGN KEY (`inscription_id`) REFERENCES `inscriptions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payements_reference_paiements_id_foreign` FOREIGN KEY (`reference_paiement_id`) REFERENCES `reference_paiements` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payements_reinscription_id_foreign` FOREIGN KEY (`reinscription_id`) REFERENCES `reinscriptions` (`id`) ON DELETE SET NULL,
  CONSTRAINT `payements_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payements`
--

LOCK TABLES `payements` WRITE;
/*!40000 ALTER TABLE `payements` DISABLE KEYS */;
INSERT INTO `payements` VALUES (1,NULL,NULL,'2024-09-04 00:00:00','concours',50000.00,'espece','ref-018','2024-09-04 08:34:10','2024-09-05 05:44:19',NULL,1,NULL,NULL,NULL,NULL),(2,NULL,NULL,'2024-09-09 00:00:00','concours salon',25000.00,'espece','ref-012','2024-09-09 09:09:35','2024-09-09 09:09:35',NULL,2,NULL,NULL,NULL,NULL),(3,NULL,NULL,'2024-09-09 00:00:00','concours',50000.00,'espece','ref-011','2024-09-09 10:14:29','2024-09-09 10:14:29',NULL,4,NULL,NULL,NULL,NULL),(4,NULL,NULL,'2024-09-09 00:00:00','concours salon',25000.00,'espece','ref-0149','2024-09-09 10:24:47','2024-09-09 10:24:47',NULL,5,NULL,NULL,NULL,NULL),(5,NULL,NULL,'2024-09-10 00:00:00','concours',50000.00,'espece','ref-0201','2024-09-10 03:56:30','2024-09-10 03:56:30',NULL,6,NULL,NULL,NULL,NULL),(6,NULL,NULL,'2024-09-10 00:00:00','concours salon',25000.00,'espece','ref-0188','2024-09-10 04:10:24','2024-09-10 04:10:24',NULL,7,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,'concours',50000.00,'espece','ref-0184','2024-09-11 09:49:11','2024-09-24 12:48:04','Helo orlwlrds',8,NULL,NULL,NULL,NULL),(18,NULL,NULL,'2024-09-23 00:00:00','droit d\'inscription',250000.00,'espece','123456','2024-09-23 06:13:08','2024-09-23 06:13:08','Hello',4,1,1,NULL,16),(19,NULL,NULL,'2024-09-23 00:00:00','frais generaux',300000.00,'espece','123457','2024-09-23 06:13:08','2024-09-23 06:13:08','World',4,1,3,NULL,16),(22,NULL,NULL,'2024-09-23 00:00:00','droit d\'inscription',250000.00,'espece','1234567','2024-09-23 06:16:01','2024-09-23 06:16:01',NULL,2,2,1,NULL,16),(23,NULL,NULL,'2024-09-23 00:00:00','frais generaux',300000.00,'espece','1234568','2024-09-23 06:16:01','2024-09-23 06:16:01',NULL,2,2,3,NULL,16),(32,NULL,NULL,'2024-09-23 00:00:00','droit de reinscription',250000.00,'espece','32423423','2024-09-23 13:06:50','2024-09-23 13:06:50',NULL,NULL,NULL,4,2,16),(33,NULL,NULL,'2024-09-23 00:00:00','frais generaux',300000.00,'espece','34234235','2024-09-23 13:06:50','2024-09-23 13:06:50',NULL,NULL,NULL,3,2,16),(34,NULL,NULL,'2024-09-24 00:00:00','droit de reinscription',250000.00,'espece','54786528','2024-09-24 10:41:10','2024-09-24 10:41:10',NULL,NULL,NULL,4,3,16),(35,NULL,NULL,'2024-09-24 00:00:00','frais generaux',300000.00,'espece','54457','2024-09-24 10:41:10','2024-09-24 10:41:10',NULL,NULL,NULL,3,3,16),(45,NULL,NULL,'2024-09-24 13:14:56','droit d\'inscription',250000.00,'espece','01000343','2024-09-24 11:14:56','2024-09-24 13:06:24','Voavy',5,3,1,NULL,16),(46,NULL,NULL,'2024-09-24 13:14:56','frais generaux',300000.00,'espece','01002352','2024-09-24 11:14:56','2024-09-24 13:06:24','Paulin',5,3,3,NULL,16),(49,NULL,4,'2024-09-24 15:33:03','droit de reinscription',250000.00,'espece','34234','2024-09-24 13:33:03','2024-09-24 13:44:51','Simple payement',NULL,NULL,4,5,16),(50,NULL,4,'2024-09-24 15:33:03','frais generaux',300000.00,'espece','2535235','2024-09-24 13:33:03','2024-09-24 13:44:51','With comment',NULL,NULL,3,5,16);
/*!40000 ALTER TABLE `payements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reference_paiements`
--

DROP TABLE IF EXISTS `reference_paiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reference_paiements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequence` enum('unique','multiple','tranche') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reference_paiements`
--

LOCK TABLES `reference_paiements` WRITE;
/*!40000 ALTER TABLE `reference_paiements` DISABLE KEYS */;
INSERT INTO `reference_paiements` VALUES (1,'DRTINSC','Droit d\'inscription','unique',250000,NULL,NULL),(3,'FRAIGEN','Frais généraux','unique',300000,NULL,NULL),(4,'DRTREINSC','Droit de réinscription','unique',250000,NULL,NULL),(5,'DTSTENT','Droit test ou entretien','unique',50000,NULL,NULL);
/*!40000 ALTER TABLE `reference_paiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reinscriptions`
--

DROP TABLE IF EXISTS `reinscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reinscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `etudiant_id` bigint unsigned DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_payement_ok` tinyint(1) NOT NULL DEFAULT '0',
  `is_valid` tinyint(1) NOT NULL DEFAULT '1',
  `status` enum('passant','redoublant') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'passant',
  `niveau_id` bigint unsigned DEFAULT NULL,
  `annee_univ_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sco_ok` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `reinscriptions_etudiant_id_foreign` (`etudiant_id`),
  KEY `reinscriptions_niveau_id_foreign` (`niveau_id`),
  KEY `reinscriptions_annee_univ_id_foreign` (`annee_univ_id`),
  CONSTRAINT `reinscriptions_annee_univ_id_foreign` FOREIGN KEY (`annee_univ_id`) REFERENCES `annee_universitaires` (`id`) ON DELETE SET NULL,
  CONSTRAINT `reinscriptions_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL,
  CONSTRAINT `reinscriptions_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaux` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reinscriptions`
--

LOCK TABLES `reinscriptions` WRITE;
/*!40000 ALTER TABLE `reinscriptions` DISABLE KEYS */;
INSERT INTO `reinscriptions` VALUES (2,NULL,'001/IE/Iem','RAKOTONDRANAIVO Anderson',1,1,'passant',6,1,NULL,'2024-09-23 13:06:50',NULL,1),(3,NULL,'002/IE/IIem','Voavison Binea',1,1,'passant',7,1,NULL,'2024-09-24 10:41:10',NULL,1),(4,NULL,'003/DT/Iem','Steve Malikh',0,1,'passant',8,1,NULL,'2024-09-24 13:32:14',NULL,1),(5,4,'004/ECO/Iem','Jhon Doe',1,1,'redoublant',5,1,NULL,'2024-09-24 13:33:03',NULL,1);
/*!40000 ALTER TABLE `reinscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
INSERT INTO `series` VALUES (1,'BACC A','2024-08-21 15:53:01','2024-08-21 15:53:01'),(2,'BACC D','2024-08-21 15:53:12','2024-08-21 15:53:12'),(3,'BACC C','2024-08-21 15:53:20','2024-08-21 15:53:20'),(4,'BACC S','2024-08-21 15:53:27','2024-08-21 15:53:27'),(5,'BACC A2','2024-08-21 15:53:40','2024-08-21 15:53:40'),(6,'BACC TECHNIQUE','2024-08-21 15:55:02','2024-08-21 15:55:02');
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('eCDdPGWnAYEnuKqPpWN6qk2USI7FEwfuPbF0O100',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlBkZnR6eEU2R093cE12VTFiQ0V5d0p2TXVEdGZsdTY4ODY3OWQyeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1726130605),('EMVY21S5Fx9mHjKHxSGF00XMo1HmuHminNj7Qzub',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFVicmpxY1dMZXhSNFIwN2Z0TGJpU05vM0JDaTdXQXVYNjFyQUtiNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=',1726219891);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sous_groupes`
--

DROP TABLE IF EXISTS `sous_groupes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sous_groupes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groupes_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sous_groupes_groupes_id_foreign` (`groupes_id`),
  CONSTRAINT `sous_groupes_groupes_id_foreign` FOREIGN KEY (`groupes_id`) REFERENCES `groupes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sous_groupes`
--

LOCK TABLES `sous_groupes` WRITE;
/*!40000 ALTER TABLE `sous_groupes` DISABLE KEYS */;
INSERT INTO `sous_groupes` VALUES (2,'Groupe 01','Groupe 01 1ère année',2,'2024-09-11 03:35:33','2024-09-11 04:46:37'),(3,'Groupe 02','Groupe Communication 02',2,'2024-09-12 03:51:56','2024-09-12 03:51:56'),(4,'Groupe 01','Groupe droit 01',3,'2024-09-12 03:52:20','2024-09-12 03:53:37'),(5,'Groupe 02','Groupe Droit 02',3,'2024-09-12 03:52:36','2024-09-12 03:52:36');
/*!40000 ALTER TABLE `sous_groupes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_changed` tinyint(1) NOT NULL DEFAULT '0',
  `etudiant_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `utilisateurs_etudiant_id_foreign` (`etudiant_id`),
  CONSTRAINT `utilisateurs_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'Siaceem','$2y$12$EU65CYAdtETc56sTZdl6yOSubsndKCOyULOYbmok1sWWevhmtnRa2','siaceem','SI Admin',1,NULL,'2024-08-21 11:16:56','2024-08-21 11:16:56',NULL,1),(2,'Caisse','$2y$12$I/mT/E3pqXONIHjUTRvD/ORJgjZWvKTiyHXDn.246G5c.5sDwRbCW','caisse','Caisse',1,NULL,'2024-08-21 15:47:29','2024-08-21 15:47:29',NULL,1),(3,'Acceuil','$2y$12$62uyUkQ9bGiliv1xDzQBz.IiVt.aOA7rqstNwGksW80pLhgSrv.xm','acceuil','Accueil',1,NULL,'2024-08-21 15:47:55','2024-08-26 09:44:29','2024-08-26 09:44:29',1),(4,'Inscription','$2y$12$hN/ryw/9RpyKrH4YJh33te2Jo9vdOavI/snk/1KmtaSc8H4nR7MY.','inscription','Inscription',1,NULL,'2024-08-21 15:48:21','2024-08-21 15:48:21',NULL,1),(5,'Caisse Candidat ACEEM','$2y$12$54H444nlJaB4xJ6t5KU45uiFe/2GGpob4PBWe9tYbXwMuvIBt5XOO','CA','CA',1,NULL,'2024-08-23 09:07:28','2024-08-23 09:07:28',NULL,1),(8,'Accueil','$2y$12$IIrIklfR9As9JGDYuUVwuu8hTAPvZl2cUZxgnQ/dJsGM5nAn/SZJK','accueil','Accueil',1,NULL,'2024-08-26 09:49:07','2024-08-26 09:49:07',NULL,1),(10,'RATOVOARIVONY Ainanirina Sabrino','$2y$12$2K9pWuJZHdIjOxK2myr09OGAHIUhJD.aCUec2CdiOUPPQ5IxygqQy','sabrino','Etudiant',1,1,'2024-09-05 05:46:43','2024-09-05 05:47:14',NULL,1),(11,'Voavison Binea','$2y$12$gxX6CVHe6wu40o2yohBaP.0Ffs.MGChCSvwYzkWZMptwgZXtbJugi','binea','Etudiant',1,2,'2024-09-09 09:43:14','2024-09-09 09:43:45',NULL,1),(12,'John Doe','$2y$12$Hst3dbLfz3mLeHRZKTJcn.anhLeXqkaTKiPwkEZU0Gj2ONF6GwY9y','john','Etudiant',1,3,'2024-09-09 10:17:00','2024-09-09 10:17:44',NULL,1),(13,'Voavy Paulin','$2y$12$mt.uCAnBCDwU5hUcTY2io.FgDEODFZdg4OIiyu/OMlaGchdlpn.66','voavy','Etudiant',1,4,'2024-09-09 10:28:41','2024-09-09 10:29:13',NULL,1),(14,'Henri VE','$2y$12$j6V/u7PJ5e7Ea6AeP9fivO6zkxKs6LU5r4LQA3ng1KdDneDIFwsse','henri','Etudiant',1,5,'2024-09-10 04:01:02','2024-09-10 04:03:53',NULL,1),(15,'Desiré Noel','$2y$12$FqcNaKjraPxEnCj4bgJVYusIwnkIeEOVvtPR.31XA8KsYqo37wkgC','desiré','Etudiant',1,6,'2024-09-10 04:13:17','2024-09-10 04:13:17',NULL,1),(16,'Wendi','$2y$12$d3kqGGQwM08xf36ZqsYX1.TuERNnOG8OxCdwNuktqJTSzUsLgqfuK','Wendi','Caisse',1,NULL,'2024-09-18 11:38:38','2024-09-18 11:39:02',NULL,1);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagues`
--

DROP TABLE IF EXISTS `vagues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vagues` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deb_insc` date NOT NULL,
  `fin_insc` date DEFAULT NULL,
  `deb_conc` date NOT NULL,
  `fin_conc` date DEFAULT NULL,
  `concours_id` bigint unsigned DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `vagues_concours_id_foreign` (`concours_id`),
  CONSTRAINT `vagues_concours_id_foreign` FOREIGN KEY (`concours_id`) REFERENCES `concours` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagues`
--

LOCK TABLES `vagues` WRITE;
/*!40000 ALTER TABLE `vagues` DISABLE KEYS */;
INSERT INTO `vagues` VALUES (1,'1er Vague','2024-09-05 05:27:14','2024-09-05 05:27:14',NULL,'2024-09-02','2024-09-08','2024-09-09','2024-09-11',1,0),(2,'2eme Vague','2024-09-05 05:27:39','2024-09-09 07:23:08',NULL,'2024-09-09','2024-09-15','2024-09-16','2024-09-18',1,0);
/*!40000 ALTER TABLE `vagues` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-25 13:23:23
