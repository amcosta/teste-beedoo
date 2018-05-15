-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: beedoo_dev_test
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.17.10.1

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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `groups_team_id_foreign` (`team_id`),
  CONSTRAINT `groups_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Funeral Attendant',1,'1991-05-24 18:16:53',NULL),(2,'Textile Cutting Machine Operator',1,'1976-06-30 04:10:02',NULL),(3,'Welder',1,'1993-10-15 23:47:00',NULL),(4,'Commercial and Industrial Designer',1,'2014-04-17 16:57:05',NULL),(5,'Interior Designer',1,'2009-08-01 07:32:09',NULL),(6,'Irradiated-Fuel Handler',2,'1972-09-20 08:08:01',NULL),(7,'Self-Enrichment Education Teacher',2,'2010-01-31 21:19:15',NULL),(8,'Warehouse',2,'2003-08-09 02:09:33',NULL),(9,'Forest Fire Fighter',2,'1980-07-03 04:59:01',NULL),(10,'Boat Builder and Shipwright',2,'1982-12-20 13:42:34',NULL),(11,'Separating Machine Operators',3,'1992-02-12 14:03:26',NULL),(12,'Graduate Teaching Assistant',3,'1986-08-13 22:46:05',NULL),(13,'Advertising Manager OR Promotions Manager',3,'1979-08-09 09:14:53',NULL),(14,'General Practitioner',3,'2008-05-03 17:22:19',NULL),(15,'Physical Scientist',3,'1978-02-06 03:25:42',NULL),(16,'Human Resources Specialist',4,'1990-11-28 02:38:31',NULL),(17,'Photoengraving Machine Operator',4,'1976-04-26 09:26:36',NULL),(18,'Career Counselor',4,'2011-07-16 06:08:13',NULL),(19,'Economics Teacher',4,'1993-04-30 15:32:57',NULL),(20,'Chemistry Teacher',4,'1981-01-05 19:44:16',NULL),(21,'Veterinarian',5,'1996-04-14 22:38:49',NULL),(22,'Floor Layer',5,'2013-01-25 16:15:09',NULL),(23,'Medical Sales Representative',5,'1972-12-30 10:04:44',NULL),(24,'Construction',5,'2006-03-14 22:11:30',NULL),(25,'Photoengraving Machine Operator',5,'1987-03-14 20:23:10',NULL),(26,'Well and Core Drill Operator',6,'2009-05-14 06:37:00',NULL),(27,'Law Clerk',6,'1983-01-15 20:44:16',NULL),(28,'Social Science Research Assistant',6,'2004-02-13 06:02:49',NULL),(29,'Audio and Video Equipment Technician',6,'1977-08-02 20:32:30',NULL),(30,'Engineer',6,'2001-01-29 10:26:44',NULL),(31,'Forging Machine Setter',7,'1983-11-14 17:08:09',NULL),(32,'Life Science Technician',7,'2005-11-13 13:37:50',NULL),(33,'Central Office',7,'1980-07-22 00:19:15',NULL),(34,'Train Crew',7,'2008-11-01 00:37:27',NULL),(35,'Nursery Manager',7,'2014-08-24 12:54:29',NULL),(36,'Electrical Engineering Technician',8,'2002-10-08 13:27:59',NULL),(37,'Railroad Yard Worker',8,'1976-05-28 08:58:30',NULL),(38,'Environmental Engineering Technician',8,'2011-08-24 17:49:14',NULL),(39,'Typesetting Machine Operator',8,'1971-05-09 18:04:04',NULL),(40,'Geoscientists',8,'1994-07-08 00:30:57',NULL),(41,'Musical Instrument Tuner',9,'1982-02-06 05:17:52',NULL),(42,'Embossing Machine Operator',9,'1998-07-29 22:08:44',NULL),(43,'Entertainer and Performer',9,'2013-11-14 08:21:46',NULL),(44,'Jewelry Model OR Mold Makers',9,'1993-02-18 15:52:59',NULL),(45,'Recreational Therapist',9,'1979-01-06 01:09:53',NULL),(46,'Aerospace Engineer',10,'2017-05-16 21:06:00',NULL),(47,'Roustabouts',10,'2010-12-14 23:56:49',NULL),(48,'Central Office Operator',10,'1992-03-03 09:38:44',NULL),(49,'Paperhanger',10,'1994-03-22 15:30:45',NULL),(50,'Amusement Attendant',10,'2012-10-19 11:59:28',NULL),(51,'Segmental Paver',11,'2012-07-11 20:03:46',NULL),(52,'Nuclear Power Reactor Operator',11,'2014-07-26 16:46:47',NULL),(53,'Solderer',11,'1993-03-02 15:37:25',NULL),(54,'Foreign Language Teacher',11,'1971-10-19 23:32:41',NULL),(55,'Segmental Paver',11,'1994-09-02 02:54:54',NULL),(56,'Welfare Eligibility Clerk',12,'2012-10-28 09:39:24',NULL),(57,'Law Teacher',12,'1986-09-19 06:30:12',NULL),(58,'Installation and Repair Technician',12,'2018-02-03 21:09:33',NULL),(59,'Textile Knitting Machine Operator',12,'2002-06-16 22:10:24',NULL),(60,'Metal Fabricator',12,'1985-11-06 13:06:18',NULL),(61,'Transportation Equipment Maintenance',13,'1995-09-24 00:25:56',NULL),(62,'Bulldozer Operator',13,'2012-12-18 07:11:54',NULL),(63,'Buyer',13,'2017-09-03 00:46:35',NULL),(64,'Librarian',13,'1982-05-22 12:28:57',NULL),(65,'Prepress Technician',13,'1980-07-24 05:48:12',NULL),(66,'Pipe Fitter',14,'1995-07-10 20:47:00',NULL),(67,'Physical Therapist',14,'1980-06-22 18:21:31',NULL),(68,'Sound Engineering Technician',14,'1973-12-02 06:52:22',NULL),(69,'Plating Operator',14,'1992-03-13 23:39:50',NULL),(70,'Commercial Pilot',14,'1973-06-23 16:31:41',NULL),(71,'Precious Stone Worker',15,'1985-07-04 21:15:53',NULL),(72,'Industrial Safety Engineer',15,'1985-10-16 06:26:26',NULL),(73,'Supervisor of Police',15,'1997-03-19 02:34:22',NULL),(74,'Washing Equipment Operator',15,'1983-09-17 07:22:39',NULL),(75,'Irradiated-Fuel Handler',15,'1972-01-13 12:06:17',NULL);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-14 16:22:09
