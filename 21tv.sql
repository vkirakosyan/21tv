-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: 21tv
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `about_uses`
--

DROP TABLE IF EXISTS `about_uses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_uses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mainpic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header1_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header1_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header1_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1_en` text COLLATE utf8mb4_unicode_ci,
  `text1_ru` text COLLATE utf8mb4_unicode_ci,
  `text1_am` text COLLATE utf8mb4_unicode_ci,
  `header2_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header2_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header2_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2_en` text COLLATE utf8mb4_unicode_ci,
  `text2_ru` text COLLATE utf8mb4_unicode_ci,
  `text2_am` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_uses`
--

LOCK TABLES `about_uses` WRITE;
/*!40000 ALTER TABLE `about_uses` DISABLE KEYS */;
INSERT INTO `about_uses` VALUES (1,'2018-09-19 02:28:01','2018-09-19 02:30:59','15373386595ba1ed2339c19.jpg','dr gdfg dfg','df gdf gdf','g dfg df gdfgdf','df dfgdf g dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdf gdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gd fgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df   dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdf','df dfgdf g dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdf gdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gd fgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df   dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdf','df dfgdf g dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdf gdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gd fgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df   dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdf','df sfsfdsf dsf ds fd','sdf ds fdsfdsfds','ds fsd fdsf sdfds','df dfgdf g dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdf gdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gd fgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df   dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdf','df dfgdf g dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdf gdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gd fgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df   dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdf','df dfgdf g dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdf gdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gd fgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df   dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdfg dfg df gdfgdf');
/*!40000 ALTER TABLE `about_uses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
INSERT INTO `abouts` VALUES (1,'2018-09-19 02:33:55','2018-09-19 02:33:55','edf dsfds  fds','f sd fsdf','dsf ds  fdsfsdf sdfh','d sfsd fsd fsd','dsf dsfsdf ds fsd','fsdds fsdfdsfsd','!1m18!1m12!1m3!1d3048.336195053459!2d44.50742395125341!3d40.179330977865604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x406abcfc00757369%3A0x36edd08cb8e3cc0!2zNyBBbWlyeWFuIFN0LCBZZXJldmFuIDAwMDEsINCQ0YDQvNC10L3QuNGP!5e0!3m2!1sru!2s!4v1536589839542','+37410111213','akhhs@skd.com');
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'default','App\\Role model has been created',1,'App\\Role',1,'App\\User','[]','2018-09-24 06:14:41','2018-09-24 06:14:41');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archives`
--

DROP TABLE IF EXISTS `archives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archives`
--

LOCK TABLES `archives` WRITE;
/*!40000 ALTER TABLE `archives` DISABLE KEYS */;
INSERT INTO `archives` VALUES (6,'2018-09-25 08:08:23','2018-09-25 08:08:23',3,'sad asds','sad sad saad','d sad sad','7eVPIKdR_2Y','15378771795baa24bb431a8.jpg','2018-09-25 01:00:00','anons');
/*!40000 ALTER TABLE `archives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'2018-09-18 01:33:50','2018-09-18 01:33:50','dfgvfdgv','fdgfdgfdg','dgfdg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `choices`
--

DROP TABLE IF EXISTS `choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `choices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questions_id` int(11) NOT NULL,
  `choice_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice_am` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `choices`
--

LOCK TABLES `choices` WRITE;
/*!40000 ALTER TABLE `choices` DISABLE KEYS */;
INSERT INTO `choices` VALUES (5,13,'df gdf gdf','gfd gdf','gdf gfdg dfg',0,'2018-09-18 07:15:16','2018-09-18 07:15:16');
INSERT INTO `choices` VALUES (6,13,'fd gdf gdfg','dfgfdg fdgfd gfdg fd','gfd gdf gfdgdf gdfg',0,'2018-09-18 07:15:16','2018-09-18 07:15:16');
/*!40000 ALTER TABLE `choices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `episodes`
--

DROP TABLE IF EXISTS `episodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `episodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `episodes`
--

LOCK TABLES `episodes` WRITE;
/*!40000 ALTER TABLE `episodes` DISABLE KEYS */;
INSERT INTO `episodes` VALUES (1,'2018-09-26 01:54:05','2018-09-26 01:54:05',3,'sadf dsfds','f fsds fds','f ds fdsfds','tJj_Zdy8yuw','15379412455bab1efd7a696.jpg','2018-09-26 01:00:00','anons');
INSERT INTO `episodes` VALUES (2,'2018-09-26 01:54:28','2018-09-26 01:54:28',3,'sadf dsfds','f fsds fds','f ds fdsfds','tJj_Zdy8yuw','15379412685bab1f14589c3.jpg','2018-09-27 01:00:00','anons');
INSERT INTO `episodes` VALUES (3,'2018-09-26 01:54:39','2018-09-26 01:54:39',3,'sadf dsfds','f fsds fds','f ds fdsfds','tJj_Zdy8yuw','15379412795bab1f1fb315b.jpg','2018-09-27 01:00:00','episode');
INSERT INTO `episodes` VALUES (4,'2018-09-26 06:13:29','2018-09-26 06:13:29',3,'df dsdsf','dsf sd f','sd fdsf ds','7eVPIKdR_2Y','15379568095bab5bc923036.jpg','2018-09-26 01:00:00','episode');
INSERT INTO `episodes` VALUES (5,'2018-09-26 06:15:30','2018-09-26 06:15:30',3,'fdgfdgfdg','fdgfdgfdg','fdgfdgfd','xHRNKHqPm1c','15379569305bab5c420804a.png','2018-09-26 01:01:00','anons');
INSERT INTO `episodes` VALUES (6,'2018-09-26 09:37:13','2018-09-26 09:37:13',5,'fdgfdgfdg','fdgfdgfdg','fdgfdgfd','xHRNKHqPm1c','15379690335bab8b898fdbd.jpg','2018-09-27 01:01:00','anons');
INSERT INTO `episodes` VALUES (7,'2018-09-26 09:37:28','2018-09-26 09:37:28',5,'fdgfdgfdg','fdgfdgfdg','fdgfdgfd','xHRNKHqPm1c','15379690485bab8b9860476.jpg','2018-09-28 05:01:00','anons');
INSERT INTO `episodes` VALUES (8,'2018-09-26 09:37:53','2018-09-26 09:37:53',3,'fdgfdgfdg','fdgfdgfdg','fdgfdgfd','xHRNKHqPm1c','15379690735bab8bb1a71b6.png','2018-09-28 01:01:00','anons');
INSERT INTO `episodes` VALUES (9,'2018-09-26 10:01:14','2018-09-26 10:01:14',9,'fdgfdgfdg','fdgfdgfdg','fdgfdgfd','xHRNKHqPm1c','15379704745bab912a54266.jpg','2018-09-28 01:02:00','anons');
INSERT INTO `episodes` VALUES (10,'2018-09-26 10:01:36','2018-09-26 10:01:36',10,'fdgfdgfdg','fdgfdgfdg','fdgfdgfd','xHRNKHqPm1c','15379704965bab914060f1b.jpg','2018-09-28 01:02:00','anons');
INSERT INTO `episodes` VALUES (11,'2018-09-26 10:05:09','2018-09-26 10:05:09',3,'karapetyan1','karapetyan1','karapetyan1','tJj_Zdy8yuw','15379707095bab9215d1186.png','2018-09-26 01:00:00','anons');
INSERT INTO `episodes` VALUES (12,'2018-09-26 10:05:41','2018-09-26 10:05:41',11,'karapetyan2','karapetyan2','karapetyan2','7eVPIKdR_2Y','15379707415bab92358888a.png','2018-09-26 01:00:00','anons');
INSERT INTO `episodes` VALUES (13,'2018-09-26 10:06:18','2018-09-26 10:06:31',12,'karapetyan3','karapetyan3','karapetyan3','xHRNKHqPm1c','15379707785bab925a02b1b.jpg','2018-09-26 01:00:00','anons');
/*!40000 ALTER TABLE `episodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facebooks`
--

DROP TABLE IF EXISTS `facebooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facebooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebooks`
--

LOCK TABLES `facebooks` WRITE;
/*!40000 ALTER TABLE `facebooks` DISABLE KEYS */;
/*!40000 ALTER TABLE `facebooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=399 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (369,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` VALUES (370,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` VALUES (371,'2016_01_01_193651_create_roles_permissions_tables',1);
INSERT INTO `migrations` VALUES (372,'2018_08_03_054825_create_activity_log_table',1);
INSERT INTO `migrations` VALUES (374,'2018_08_03_123045_create_categories_table',1);
INSERT INTO `migrations` VALUES (375,'2018_08_03_124252_create_programmes_table',1);
INSERT INTO `migrations` VALUES (377,'2018_08_03_143256_create_photosessions_table',1);
INSERT INTO `migrations` VALUES (378,'2018_08_03_143715_create_abouts_table',1);
INSERT INTO `migrations` VALUES (379,'2018_08_06_150911_create_questions_table',1);
INSERT INTO `migrations` VALUES (380,'2018_08_07_063926_create_polls_table',1);
INSERT INTO `migrations` VALUES (381,'2018_08_07_112819_create_top__images_table',1);
INSERT INTO `migrations` VALUES (382,'2018_08_08_073614_add_category_to_news',1);
INSERT INTO `migrations` VALUES (383,'2018_08_09_141023_create_choices_table',1);
INSERT INTO `migrations` VALUES (385,'2018_09_10_100727_create_polls_candidates_table',1);
INSERT INTO `migrations` VALUES (386,'2018_09_10_131853_create_about_uses_table',1);
INSERT INTO `migrations` VALUES (387,'2018_09_10_144724_create_vacant_jobs_table',1);
INSERT INTO `migrations` VALUES (390,'2018_09_17_145157_create_facebooks_table',1);
INSERT INTO `migrations` VALUES (391,'2018_08_09_143038_create_text_answers_table',2);
INSERT INTO `migrations` VALUES (393,'2018_08_03_124428_create_episodes_table',3);
INSERT INTO `migrations` VALUES (394,'2018_09_25_094424_create_archives_table',3);
INSERT INTO `migrations` VALUES (395,'2018_08_03_081400_create_news_table',4);
INSERT INTO `migrations` VALUES (397,'2018_09_17_112448_create_yes_or_no_answers_table',5);
INSERT INTO `migrations` VALUES (398,'2018_09_17_084858_create_polls_answers_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `header_en` text COLLATE utf8mb4_unicode_ci,
  `header_ru` text COLLATE utf8mb4_unicode_ci,
  `header_am` text COLLATE utf8mb4_unicode_ci,
  `first_text_en` text COLLATE utf8mb4_unicode_ci,
  `first_text_ru` text COLLATE utf8mb4_unicode_ci,
  `first_text_am` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `text_am` text COLLATE utf8mb4_unicode_ci,
  `mainpic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fasc_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'2018-10-01 02:03:45','2018-10-01 10:37:07','fg gh','gg','f d dfgdf','fd  gdf','gdfgdfg dfgdfg','df gdf gfdg','cv bcvb cv b','cbc bvc bvc','bvcbvc bvc b','15384043065bb22fd2f1887.jpg','[\"15384046275bb2311326253.png\",\"15383738255bb1b8c11bc69.jpg\",\"15383738255bb1b8c16fe19.jpg\",\"15383738255bb1b8c187db0.jpg\"]','tJj_Zdy8yuw',NULL);
INSERT INTO `news` VALUES (2,'2018-10-01 10:41:28','2018-10-01 11:05:45','g dgdfgdf','gdf gdf g','df gdfgdf g','fd gdf gdf','gdfgdfg dfg','df gdf gdfgdfgdf','xc xccfd','sdvxcvcxv xc','vxcv xc v','15384063455bb237c9a8996.jpg','[\"15384048885bb232187fae3.jpg\",\"15384048885bb232188cf06.jpg\",\"15384048885bb23218928e7.jpg\",\"15384048885bb232189991f.jpg\"]','dfg dfgdfg df g',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photosessions`
--

DROP TABLE IF EXISTS `photosessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photosessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mainpic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photos` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photosessions`
--

LOCK TABLES `photosessions` WRITE;
/*!40000 ALTER TABLE `photosessions` DISABLE KEYS */;
INSERT INTO `photosessions` VALUES (1,'2018-09-19 01:19:40','2018-09-24 04:13:51','sd fdsf sdf','гф хфгххгхгх гфх гх','գֆհ ֆգհ ֆգհ գֆ հֆգհ ֆ','15373343805ba1dc6ca47e3.png','[\"15373344775ba1dccd4c368.jpg\",\"15373344775ba1dccd4c411.jpg\",\"15373344775ba1dccd4c46c.jpg\",\"15373343805ba1dc6ca3b4b.png\",\"15373343805ba1dc6ca3c28.png\",\"15373343805ba1dc6ca3c8d.png\",\"15373343805ba1dc6ca3d05.png\"]','2018-09-19');
INSERT INTO `photosessions` VALUES (2,'2018-09-19 02:01:39','2018-09-24 04:13:33','asd fdsfdsf d','хфгх гфх гфхгфх фгхгхгф','դֆ գհֆհ ֆգհ ֆգհ ֆգ հ','15373368995ba1e64339b66.jpg','[\"15373368995ba1e64338c98.jpg\",\"15373368995ba1e6433910e.jpg\",\"15373368995ba1e64339288.jpg\"]','2018-09-19');
INSERT INTO `photosessions` VALUES (3,'2018-09-19 02:02:03','2018-09-24 04:13:17','dfv sdfds','дфг дгхгфх гфх фгх фгх гф','գֆհֆգհ ֆգհ ֆգհ ֆգհ ֆգ','15373369235ba1e65b09d12.jpg','[\"15373369235ba1e65b08b3b.jpg\",\"15373369235ba1e65b08c75.jpg\",\"15373369235ba1e65b090d0.jpg\",\"15373369235ba1e65b09245.jpg\"]','2018-09-19');
INSERT INTO `photosessions` VALUES (4,'2018-09-19 02:02:24','2018-09-24 04:13:01','ds  fsdf ds','г гхфгх фггф хфгх фг х','ֆգ ֆգհ գհգգֆհգհգհ','15373369445ba1e67053b31.jpg','[\"15373369445ba1e670537ef.jpg\",\"15373369445ba1e6705387f.jpg\",\"15373369445ba1e670538d9.jpg\",\"15373369445ba1e6705393a.jpg\"]','2018-09-19');
INSERT INTO `photosessions` VALUES (5,'2018-09-19 02:03:03','2018-09-24 04:12:44','rd t gh','гфх фгх г фг хгфхгфхгфхфг','դ ֆսդֆգդֆգֆդ տերտ','15373369835ba1e697bb84b.jpg','[\"15373369835ba1e697bb299.jpg\",\"15373369835ba1e697bb3a2.jpg\",\"15373369835ba1e697bb44f.jpg\",\"15373369835ba1e697bb4d3.jpg\"]','2018-09-19');
INSERT INTO `photosessions` VALUES (6,'2018-09-19 02:03:21','2018-09-24 04:12:25','fdg dg','гдф гфдг фдг дфг дфгдф','ֆդ գդֆգֆդ ֆդգ ֆդգ','15373370015ba1e6a942314.jpg','[\"15373370015ba1e6a941c30.jpg\",\"15373370015ba1e6a941d71.jpg\",\"15373370015ba1e6a941e48.jpg\",\"15373370015ba1e6a941ee5.jpg\"]','2018-09-19');
INSERT INTO `photosessions` VALUES (7,'2018-10-01 10:08:52','2018-10-01 10:23:22','fg hf hfg','h g','gggf','15384029325bb22a74381f7.jpg','[\"15384038025bb22ddaae960.jpeg\",\"15384038025bb22ddac2707.jpg\",\"15384038025bb22ddac8e0e.jpg\",\"15384038025bb22ddacb638.jpg\",\"15384038025bb22ddace28e.jpg\",\"15384029325bb22a742deaf.jpg\",\"15384029325bb22a7431f9f.jpg\"]','2018-10-01');
/*!40000 ALTER TABLE `photosessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polls`
--

DROP TABLE IF EXISTS `polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options_en` text COLLATE utf8mb4_unicode_ci,
  `options_ru` text COLLATE utf8mb4_unicode_ci,
  `options_am` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polls`
--

LOCK TABLES `polls` WRITE;
/*!40000 ALTER TABLE `polls` DISABLE KEYS */;
INSERT INTO `polls` VALUES (1,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','g jghjhg j gh jhg hg','gh jhgj ghfg gf f fg','fgh fg hfgh');
INSERT INTO `polls` VALUES (2,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','fg hghjhg gkhjj','jhkjkjhkh','fhftg fg hggfh gf k');
INSERT INTO `polls` VALUES (3,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','fgh ghgfhgfhgfh gfh','fgh ghjhgjg hjghhg jhg jhg jg h','hghgjghj hg  hhg jhg jgh');
INSERT INTO `polls` VALUES (4,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','gh jghj hgj hgjghj hgj','hg jhg jhgj hgj hgj hgj gh','hg jhgj hg jhgj hgj');
INSERT INTO `polls` VALUES (5,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','fgh gfhgfhfgh fg','hgfh fg hg f hfg','h gfh gf hgf hgfh');
INSERT INTO `polls` VALUES (6,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','fg hfgh fdgfdg df gfd','g fdgfdgf dgfdg fd gdf  fd','dfg fd gfd gfdg fd gdfg f');
INSERT INTO `polls` VALUES (7,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','df gfd gdfg fdg fd gdf','g fdgdf gdfg fd g','fd gfd gfdg fd g');
INSERT INTO `polls` VALUES (8,'2018-09-18 02:10:14','2018-09-18 02:10:14','hot10','fd gfdg fdg fd','gfdg fd','gdf gfdgfd');
INSERT INTO `polls` VALUES (11,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','sd df gdfgfdg dfg fd','gdf gfdg fd gfd','dfgfd gfd gdf g');
INSERT INTO `polls` VALUES (12,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','df gfd gfdgfdg fd gfd','fd gfd gfd gfdg','fd gdfgdfgfd');
INSERT INTO `polls` VALUES (14,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','gfd gfdgfdgdf','gfdgfdgfdgfd','gdfgf dgfdg fdg fd g');
INSERT INTO `polls` VALUES (15,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','gdfg df','dfgfdgfdg','fdgfdgfdg');
INSERT INTO `polls` VALUES (16,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','fdgfdgf dgfd gfd g','fdgfdgf dgfd gfd g','fdgfdgf dgfd gfd g');
INSERT INTO `polls` VALUES (17,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','fgf dfgdf gdf','gfdgdfg','fdgdfgdfg');
INSERT INTO `polls` VALUES (18,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','f dgdf g','fdgdfg','dfgdfgdfg');
INSERT INTO `polls` VALUES (19,'2018-09-18 02:11:10','2018-09-18 02:11:10','hay10','f dgdf gdfg fd','gfd gfd','gdfgfdgfdgdfg');
/*!40000 ALTER TABLE `polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polls_answers`
--

DROP TABLE IF EXISTS `polls_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polls_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `condidate` tinyint(1) NOT NULL,
  `polls_id` int(11) NOT NULL,
  `useruuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `polls_answers_useruuid_unique` (`useruuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polls_answers`
--

LOCK TABLES `polls_answers` WRITE;
/*!40000 ALTER TABLE `polls_answers` DISABLE KEYS */;
INSERT INTO `polls_answers` VALUES (3,'2018-10-02 09:35:33','2018-10-02 09:35:33',0,4,'1096135997223039','Hovo  Mkrtchyan');
/*!40000 ALTER TABLE `polls_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polls_candidates`
--

DROP TABLE IF EXISTS `polls_candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polls_candidates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options_en` text COLLATE utf8mb4_unicode_ci,
  `options_ru` text COLLATE utf8mb4_unicode_ci,
  `options_am` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polls_candidates`
--

LOCK TABLES `polls_candidates` WRITE;
/*!40000 ALTER TABLE `polls_candidates` DISABLE KEYS */;
INSERT INTO `polls_candidates` VALUES (1,'2018-09-18 02:11:23','2018-09-18 02:11:23','hot10','dsfdsf dsf ds dsfds f','ds fdsf dsf ds fdsf','sd fsdf dsf sdf sdf');
INSERT INTO `polls_candidates` VALUES (2,'2018-09-18 02:11:30','2018-09-18 02:11:30','hot10','sd fds fds','f dsfdsf ds fsdf','dsfdsf dsf sdfsd');
INSERT INTO `polls_candidates` VALUES (5,'2018-09-18 02:11:53','2018-09-18 02:11:53','hay10','sdf dsfds fdsf','dsfds fd fsdf','fds sd fdsf dsf sdsd');
/*!40000 ALTER TABLE `polls_candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programmes`
--

DROP TABLE IF EXISTS `programmes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programmes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_am` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programmes`
--

LOCK TABLES `programmes` WRITE;
/*!40000 ALTER TABLE `programmes` DISABLE KEYS */;
INSERT INTO `programmes` VALUES (3,'2018-09-24 04:01:27','2018-09-24 04:01:27','File Pro','File Pro','File Pro','15377760875ba899d724397.jpeg');
INSERT INTO `programmes` VALUES (4,'2018-09-24 04:16:43','2018-09-24 04:16:43','Star duet','Star дует','Star ԴՈՒԵՏ','15377770035ba89d6bc1295.jpg');
INSERT INTO `programmes` VALUES (5,'2018-09-24 04:21:33','2018-09-24 04:21:33','fsdf sdf sdf sd fsdf sd','сдф сдф сдф дс фсдф','սդֆ դսֆ դսֆ դսֆ սդ','15377772935ba89e8d28f6e.jpg');
INSERT INTO `programmes` VALUES (6,'2018-09-24 04:21:50','2018-09-24 04:21:50','fsdf s sd fsdf sd','сдф сдф сдф дс ф','սդֆ դսդսֆ սդ','15377773105ba89e9e6c4bf.jpg');
INSERT INTO `programmes` VALUES (7,'2018-09-24 04:22:33','2018-09-24 04:22:33','dfg fd gdfg df g','фд гдф гдф гфд','րտ ըտր ըտր ըրտ ըրտ','15377773535ba89ec949a33.jpg');
INSERT INTO `programmes` VALUES (8,'2018-09-25 09:11:09','2018-09-25 09:11:09','ddsffsdf','sdf sd fd','dsfsdf sf','15378810695baa33edd1258.jpg');
INSERT INTO `programmes` VALUES (9,'2018-09-25 09:12:02','2018-09-25 09:12:02','dsfdsfdsf','dsfdsfdsf','fdsfdsfdsf','15378811225baa3422d0cb2.png');
INSERT INTO `programmes` VALUES (10,'2018-09-26 08:26:37','2018-09-26 08:26:37','dfdsfdsfd','fsdfdsf','sdfdsfdsf','15379647975bab7afdba666.png');
INSERT INTO `programmes` VALUES (11,'2018-09-26 10:03:43','2018-09-26 10:03:43','test1','test1','test1','15379706235bab91bf91c1e.jpg');
INSERT INTO `programmes` VALUES (12,'2018-09-26 10:04:14','2018-09-26 10:04:14','test2','test2','test2','15379706545bab91dea37be.jpg');
INSERT INTO `programmes` VALUES (13,'2018-09-27 05:07:13','2018-09-27 05:07:13','sdf sd fsd','sd fsdf','sd fsdf sdfsd fds','15380392335bac9dc108f26.png');
INSERT INTO `programmes` VALUES (14,'2018-09-27 07:13:38','2018-09-27 07:13:38','test image','test image','test image','15380468185bacbb62798e9.png');
INSERT INTO `programmes` VALUES (15,'2018-09-27 07:15:19','2018-09-27 07:15:19','test image 1','test image 1','test image 1','15380469195bacbbc7c9214.png');
INSERT INTO `programmes` VALUES (16,'2018-09-27 07:16:22','2018-09-27 07:16:22','fdgfdgfdg','sdfwe vrfes fsdf','d sfsd fsdfsdfsd','15380469825bacbc066346d.jpg');
INSERT INTO `programmes` VALUES (17,'2018-09-27 07:18:14','2018-09-27 07:18:14','ff hghgf','h gf hfg hfg','h fg hgfg hf','15380470945bacbc761f87e.jpg');
INSERT INTO `programmes` VALUES (18,'2018-09-27 07:19:34','2018-09-27 07:21:34','cxgfsd  fsfsdf','ds fdsf ds fds fsd','f dsfdsfdsfsdf','15380472945bacbd3ea8f62.jpg');
INSERT INTO `programmes` VALUES (19,'2018-09-27 08:08:07','2018-09-27 08:08:07','ds sfsdf','sd fsdf d','sf sdfsdf','15380500875bacc8275c3c4.jpg');
INSERT INTO `programmes` VALUES (20,'2018-09-27 09:01:39','2018-09-27 09:01:39','r dfgfdg','dfgdf gdf','gdfgdfgdfgdf','15380532995bacd4b30f217.jpg');
INSERT INTO `programmes` VALUES (21,'2018-09-27 09:04:00','2018-09-27 09:04:00','sd fsdfdsfds','f dsfdsfdsfd','s fdsfdsf','15380534405bacd540d38fc.jpg');
INSERT INTO `programmes` VALUES (22,'2018-09-27 09:10:01','2018-09-27 09:10:01','sd fdsfdsfds','f sdfdsfdsf','dsfdsfsd','15380538005bacd6a8ea0fc.jpg');
INSERT INTO `programmes` VALUES (23,'2018-09-27 09:10:32','2018-09-27 09:10:32','sdf fsd frdsf ds','f  sd fsdf','sdfsdfsdfsdf','15380538325bacd6c802bfe.jpg');
INSERT INTO `programmes` VALUES (24,'2018-09-27 09:11:09','2018-09-27 09:11:09','fg ddsfdf ds','fdsfdsf','dsfdsfdsf','15380538695bacd6ed1171e.jpg');
INSERT INTO `programmes` VALUES (25,'2018-09-27 09:12:03','2018-09-27 09:12:03','fd gdfg','df gdf gdf','gdfgdfg','15380539235bacd7230eabf.jpg');
INSERT INTO `programmes` VALUES (26,'2018-09-27 09:13:00','2018-09-27 09:13:00','fd gdfg dfg df','g dfg dfg','dfg df gdfg','15380539805bacd75c7860f.jpg');
INSERT INTO `programmes` VALUES (27,'2018-09-27 09:20:44','2018-09-27 09:20:44','df gdfgfd gdf','g fdg df gdf','gdfgdfgdfgdfg','15380544445bacd92c7d4bb.jpg');
INSERT INTO `programmes` VALUES (29,'2018-09-27 09:22:23','2018-09-27 09:22:23','d fdsfsdf','dsfsdf sd','f sdfsdf','15380545435bacd98fca84d.jpg');
INSERT INTO `programmes` VALUES (31,'2018-09-27 09:26:09','2018-09-27 09:26:09','cv cxvb vcb cv','cv cvb cvb cvb','vcb cvb cvb cvb','15380547695bacda7194671.jpg');
INSERT INTO `programmes` VALUES (32,'2018-09-27 09:37:00','2018-09-27 09:37:00','g dfg fd gdfg','df gdfg df','dfg dfgdfg','15380554205bacdcfc5e282.jpg');
INSERT INTO `programmes` VALUES (33,'2018-09-27 10:11:33','2018-09-27 10:11:33','dsfdsf ds','f dsf dsf d sf','dsf sdf sdfsdfs','15380574935bace51507a3f.jpg');
INSERT INTO `programmes` VALUES (34,'2018-09-27 10:11:57','2018-09-27 10:11:57','fdgfd gdfgfd','gdf gdf g','dfg dfgdfg','15380575175bace52d53cd7.png');
INSERT INTO `programmes` VALUES (35,'2018-09-27 10:12:24','2018-09-27 10:12:24','fd gdfg df g','fd gdfg df','gdf gdfgdfg','15380575435bace547f1eac.jpg');
INSERT INTO `programmes` VALUES (38,'2018-09-27 10:54:36','2018-09-27 10:54:36','sdf sdf dsfds','dsf sd fdsf ds fds','f dsf dsf ds fsd fsd','15380600765bacef2c216e6.png');
INSERT INTO `programmes` VALUES (39,'2018-09-27 11:39:29','2018-09-27 11:39:29','sdad as dsad','sad sadas','dasdasdasd','15380627695bacf9b12448d.jpg');
INSERT INTO `programmes` VALUES (40,'2018-10-01 09:35:26','2018-10-01 09:40:56','cxzvf sdf','ds fdsf sdf','sdf sdf dsfsdfsd','15384012565bb223e818a25.jpg');
/*!40000 ALTER TABLE `programmes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_en` text COLLATE utf8mb4_unicode_ci,
  `question_ru` text COLLATE utf8mb4_unicode_ci,
  `question_am` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (8,'2018-09-18 07:13:39','2018-09-19 02:58:11','yesno','gf hgdf','gdf gdf gdfgfd gdfg dfg','fd gdfgdfg fdgdf',0);
INSERT INTO `questions` VALUES (9,'2018-09-18 07:13:48','2018-09-19 02:58:11','yesno','df gfd gdf','df gdfgdf g','gdf gdfgdf',0);
INSERT INTO `questions` VALUES (10,'2018-09-18 07:13:55','2018-09-19 02:58:11','yesno','dfg fdg fd gdfg','dfgdfg  dfgdfg dfg fd df','fdgfd gfdg df',0);
INSERT INTO `questions` VALUES (11,'2018-09-18 07:14:04','2018-09-19 01:47:12','text','dfg fdg fd gfdg fd','gfdg fdg fd gfdg','fdg fdg fdg df',1);
INSERT INTO `questions` VALUES (12,'2018-09-18 07:14:12','2018-09-19 02:58:11','yesno','df gfdg f fdg','fd gdfg fdg fdg','ffdg fd gfd gdf',1);
INSERT INTO `questions` VALUES (13,'2018-09-18 07:15:16','2018-09-19 02:58:11','multiplechoice','fdg dfg sd','gfdg df gdf','gdf gdf gdf g',0);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'fghfdgfdg','fdgfdgf','2018-09-24 06:14:40','2018-09-24 06:14:40');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `text_answers`
--

DROP TABLE IF EXISTS `text_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `text_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `text_answers`
--

LOCK TABLES `text_answers` WRITE;
/*!40000 ALTER TABLE `text_answers` DISABLE KEYS */;
INSERT INTO `text_answers` VALUES (1,'gfh fghg hfghf g','dfg fdg fd gfdg fd','2018-09-19 01:47:23','2018-09-19 01:47:23');
INSERT INTO `text_answers` VALUES (2,'m,l','dfg fdg fd gfdg fd','2018-09-21 08:20:43','2018-09-21 08:20:43');
INSERT INTO `text_answers` VALUES (3,'ghfghgfhfg','dfg fdg fd gfdg fd','2018-09-24 04:34:58','2018-09-24 04:34:58');
/*!40000 ALTER TABLE `text_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `top__images`
--

DROP TABLE IF EXISTS `top__images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `top__images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `top__images`
--

LOCK TABLES `top__images` WRITE;
/*!40000 ALTER TABLE `top__images` DISABLE KEYS */;
INSERT INTO `top__images` VALUES (1,'2018-09-19 01:41:03','2018-09-19 01:41:03','15373356635ba1e16f3a953.jpg','15373356635ba1e16f43393.jpg','15373356635ba1e16f43411.jpg');
/*!40000 ALTER TABLE `top__images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'hovo','hovo.h15@mail.ru','$2y$10$Tq8SBtenEYLpzoRHSdFO1O4GcIxqXAfE0vLX1YIvRY3bhBKtIsT.q',NULL,'2018-09-25 02:22:54','2018-09-25 02:22:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vacant_jobs`
--

DROP TABLE IF EXISTS `vacant_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vacant_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `header_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `header_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `header_am` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `small_text_en` text COLLATE utf8_unicode_ci,
  `small_text_ru` text COLLATE utf8_unicode_ci,
  `small_text_am` text COLLATE utf8_unicode_ci,
  `text_en` text COLLATE utf8_unicode_ci,
  `text_ru` text COLLATE utf8_unicode_ci,
  `text_am` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vacant_jobs`
--

LOCK TABLES `vacant_jobs` WRITE;
/*!40000 ALTER TABLE `vacant_jobs` DISABLE KEYS */;
INSERT INTO `vacant_jobs` VALUES (1,'2018-09-19 02:36:45','2018-09-19 02:36:45','d sa dsasdf','dfgd fgfdg fdg fd ggdf gfd gd f','fd gfd fd fdg fdg fdg dfg df gdf','fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf');
INSERT INTO `vacant_jobs` VALUES (2,'2018-09-19 02:37:26','2018-09-19 02:37:26','fdg dgdfgdf','g fdgfd gfdg','df gdf gdf gfd g','2 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','2 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','2 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','2 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','2 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','2 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf');
INSERT INTO `vacant_jobs` VALUES (3,'2018-09-19 02:37:48','2018-09-19 02:37:48','fg drgdf gfd','g df gfd g','df gdf gdfgdfgf','3 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','3 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','3 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','3 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','3 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','3 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf');
INSERT INTO `vacant_jobs` VALUES (4,'2018-09-19 02:38:29','2018-09-19 02:38:29','dgdf gdf g','df gdfgdfgfd','df dg df gfdg fd','4 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','4 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','4 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','4 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','4 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','4 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf');
INSERT INTO `vacant_jobs` VALUES (5,'2018-09-19 02:38:55','2018-09-19 02:38:55','df fdg fdg fdg','fd gfdg fd gfdg','dfg fdg fdg fdg','5 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','5 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','5 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','5 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','5 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf','5 fd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdffd gfd fd fdg fdg fdg dfg df gdf');
/*!40000 ALTER TABLE `vacant_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `yes_or_no_answers`
--

DROP TABLE IF EXISTS `yes_or_no_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yes_or_no_answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `useruuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `yes_or_no_answers_useruuid_unique` (`useruuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yes_or_no_answers`
--

LOCK TABLES `yes_or_no_answers` WRITE;
/*!40000 ALTER TABLE `yes_or_no_answers` DISABLE KEYS */;
INSERT INTO `yes_or_no_answers` VALUES (3,'2018-10-02 09:34:32','2018-10-02 09:34:32','fd gdfg fdg fdg','ДА','1096135997223039','Hovo  Mkrtchyan');
/*!40000 ALTER TABLE `yes_or_no_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database '21tv'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-02 18:20:05
